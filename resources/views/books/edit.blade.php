@extends('layouts.app')

@section('title', 'Edit ' . "$book->name")

@section('content')
<div class="row justify-content-center">
	<div class="col-md-8">
		<div class="card">
			<div class="card-header">Create a new Book</div>

			<div class="card-body">
				<form method="POST" action="{{ route('books.update', $book->id) }}">
					@csrf
					@method('PATCH')

					<div class="form-group row">
						<label class="col-md-4 col-form-label text-md-right">Name</label>

						<div class="col-md-6">
							<input id="name" name="name" type="text" value="{{ old('name') }}" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ $book->name }}" required autofocus></input>

							@include('layouts.errors', ['error' => 'name'])
						</div>
					</div>

					<div class="form-group row">
						<label class="col-md-4 col-form-label text-md-right">Name</label>

						<div class="col-md-6">
							<input id="author" name="author" type="text" value="{{ old('author') }}" class="form-control{{ $errors->has('author') ? ' is-invalid' : '' }}" placeholder="{{ $book->author }}" required autofocus></input>

							@include('layouts.errors', ['error' => 'author'])
						</div>
					</div>

					<div class="form-group row">
						<label class="col-md-4 col-form-label text-md-right">Category</label>

						<div id="dynamic_field" class="col-md-6">
							@foreach($book->categories as $bookCategory)
								<select id="category_id{{ $loop->iteration - 1 }}" name="category_id[{{ $loop->iteration }}]" class="form-control{{ $errors->has('category_id') ? ' is-invalid' : '' }}">
									<option  value="">Select a category</option>
									@foreach($categories as $category)
										<option value="{{ $category->id }}" @if($bookCategory->id == $category->id)selected="selected"@endif>{{ $category->id }} - {{ $category->name }}</option>
									@endforeach
								</select>
							@endforeach

							@include('layouts.errors', ['error' => 'category_id'])
						</div>

						<div>
							<button id="add" class="btn btn-success" type="button">+</button>
							<button id="remove" class="btn btn-danger" type="button">-</button>
						</div>
					</div>

					<div class="form-group row">
						<label class="col-md-4 col-form-label text-md-right">Published Date</label>

						<div class="col-md-6">
							<input id="publishedDate" name="publishedDate" type="date" value="{{ $book->publishedDate }}" class="form-control{{ $errors->has('publishedDate') ? ' is-invalid' : '' }}"></input>

							@include('layouts.errors', ['error' => 'publishedDate'])
						</div>
					</div>

					<div class="form-group row mb-0">
						<div class="col-md-8 offset-md-4">
							<button type="submit" class="btn btn-primary">Update</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		var i="{{ $book->categories->count() }}" - 1;

		$('#add').click(function(){
			i++;
			$('#dynamic_field').append('<select id="category_id'+i+'" name="category_id['+i+']" class="form-control"><option value="" select="selected">Select a category</option>"@foreach($categories as $category)<option value="{{ $category->id }}">{{ $category->id }} - {{ $category->name }}</option>@endforeach"');
		});

		$('#remove').click(function(){
			if(i == 0)
				return;

			$('#category_id'+i+'').remove();
			i--;
		});
	});
</script>
@endsection