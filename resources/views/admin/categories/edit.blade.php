@extends('layouts.admin')


@section('content')

	<div class="row">
		<div class="col-sm-6">
			<h1 class="page-header">Edit Categories</h1>
			
			{!! Form::model($categories, ['method' => 'put', 'action'=>['AdminCategoriesController@update', $categories->id]]) !!}
		
				<div class="form-group">
					{!! Form::label('name','Name:')!!}
					{!! Form::text('name', null, ['class' => 'form-control'] )!!}
				</div>
				<div class="form-group">
					{!! Form::submit('Update Category', ['class' => 'btn btn-sm btn-info']) !!}	
					<a class="btn btn-sm btn-danger btn-close" href="{{ route('categories.index') }}">Cancel</a>	
				</div>

			{!! Form::close() !!}

			@include('includes.form_errors')
		</div>
	</div>

@endsection