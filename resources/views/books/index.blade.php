@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
	<div class="col-md-12">
		<div class="card">

			<div class="container" style="margin-top: 1em;">
				<a href="{{ route('books.create') }}" class="btn btn-primary">Add Book</a>
				<a href="{{ route('categories.create') }}" class="btn btn-secondary">Add Category</a>
			</div>

			<div class="container" style="margin-top: 1em;">
				<form method="GET" action="{{ route('home') }}">
					<div class="form-row">
						<div class="form-group col-md-3">
							<input type="text" name="book_name" class="form-control" placeholder="Search by name...">
						</div>

						<div class="form-group col-md-3">
							<select class="combobox form-control" name="user_id">
								<option value="" selected="selected">Select a user</option>
								@foreach($users as $user)
									<option value="{{ $user->id }}">{{ $user->name }}</option>
								@endforeach
							</select>
						</div>

						<div class="form-group col-md-3">
							<select class="combobox form-control" name="category_id">
								<option value="" selected="selected">Select a category</option>
								@foreach($categories as $category)
									<option value="{{ $category->id }}">{{ $category->id }} - {{ $category->name }}</option>
								@endforeach
							</select>
						</div>

						<div class="form-group">
							<button type="submit" class="btn btn-outline-primary">Filter</button>
						</div>
					</div>
				</form>
			</div>

			<div class="card-body">
				<table class="table">
					<thead>
						<tr>
							<th scope="col">Name</th>
							<th scope="col">Author</th>
							<th scope="col">Published Date</th>
							<th scope="col">Categories</th>
							<th scope="col">User</th>
							<th scope="col">Status</th>
							<th scope="col">Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($books as $book)
							<tr>
								<th>{{ $book->name }}</th>
								<th>{{ $book->author }}</th>
								<th>{{ $book->publishedDate }}</th>
								<th>
									@foreach($book->categories as $bookCategory)
										{{ $bookCategory->name }}, 
									@endforeach
								</th>
								<th>{{ isset($book->user->name) ? $book->user->name : '--' }}</th>
								<th>
									<button type="button" class="btn {{ isset($book->user_id) ? 'btn-danger' : 'btn-success' }}" data-toggle="modal" data-target="#exampleModal{{ $book->id }}">{{ isset($book->user_id) ? 'Not available' : 'Available' }}</button>
									@include('layouts.modal', ['book' => $book])
								</th>
								<th>
									<a href="{{ route('books.edit', $book->id) }}" class="btn btn-outline-secondary">Edit</a>
									<a href="{{ route('books.destroy', $book->id) }}" class="btn btn-outline-danger" onClick="event.preventDefault();document.getElementById('delete-form{{ $book->id }}').submit();">Delete</a>

									<form id="delete-form{{ $book->id }}" method="POST" action="{{ route('books.destroy', $book->id) }}">
										@csrf
										@method('DELETE')
									</form>
								</th>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>

	<div style="margin-top: 1em;">
		{{ $books->links() }}
	</div>
</div>

<script>
	$(document).ready(function(){
		$('.combobox').combobox({ bsVersion: '4' });
	});
</script>
@endsection