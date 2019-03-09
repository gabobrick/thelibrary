@extends('layouts.app')

@section('title', 'Create Book')

@section('content')
<div class="row justify-content-center">
	<div class="col-md-8">
		<div class="card">
			<div class="card-header">Create a new Book</div>

			<div class="card-body">
				<form method="POST" action="{{ route('books.store') }}">
					@csrf

					<div class="form-group row">
						<label class="col-md-4 col-form-label text-md-right">Name</label>

						<div class="col-md-6">
							<input id="name" name="name" type="text" value="{{ old('name') }}" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" required autofocus></input>

							@include('layouts.errors', ['error' => 'name'])
						</div>
					</div>

					<div class="form-group row">
						<label class="col-md-4 col-form-label text-md-right">Author</label>

						<div class="col-md-6">
							<input id="author" name="author" type="text" value="{{ old('author') }}" class="form-control{{ $errors->has('author') ? ' is-invalid' : '' }}" required autofocus></input>

							@include('layouts.errors', ['error' => 'author'])
						</div>
					</div>

					<div class="form-group row">
						<label class="col-md-4 col-form-label text-md-right">Category</label>

						<div id="dynamic_field" class="col-md-6">
							<select id="category_id" name="category_id[0]" class="form-control{{ $errors->has('category_id') ? ' is-invalid' : '' }}">
								<option  value="" selected="selected">Select a category</option>
								@foreach($categories as $category)
									<option value="{{ $category->id }}">{{ $category->id }} - {{ $category->name }}</option>
								@endforeach
							</select>

							@include('layouts.errors', ['error' => 'category_id1'])
						</div>

						<div>
							<button id="add" class="btn btn-success" type="button">+</button>
							<button id="remove" class="btn btn-danger" type="button">-</button>
						</div>
					</div>

					<div class="form-group row">
						<label class="col-md-4 col-form-label text-md-right">Published Date</label>

						<div class="col-md-6">
							<input id="publishedDate" name="publishedDate" type="date" value="{{ old('publishedDate') }}" class="form-control{{ $errors->has('publishedDate') ? ' is-invalid' : '' }}"></input>

							@include('layouts.errors', ['error' => 'publishedDate'])
						</div>
					</div>

					<div class="form-group row mb-0">
						<div class="col-md-8 offset-md-4">
							<button type="submit" class="btn btn-primary">Add</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		var i=0;

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