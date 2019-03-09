@extends('layouts.app')

@section('title', 'Create Category')

@section('content')
<div class="row justify-content-center">
	<div class="col-md-8">
		<div class="card">
			<div class="card-header">Create a new Category</div>

			<div class="card-body">
				<form method="POST" action="{{ route('categories.store') }}">
					@csrf

					<div class="form-group row">
						<label class="col-md-4 col-form-label text-md-right">Name</label>

						<div class="col-md-6">
							<input id="name" name="name" type="text" value="{{ old('name') }}" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" required autofocus></input>

							@include('layouts.errors', ['error' => 'name'])
						</div>
					</div>

					<div class="form-group row">
						<label class="col-md-4 col-form-label text-md-right">Description</label>

						<div class="col-md-6">
							<input id="description" name="description" type="text" value="{{ old('description') }}" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" required autofocus></input>

							@include('layouts.errors', ['error' => 'description'])
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
@endsection