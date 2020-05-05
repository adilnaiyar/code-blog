@extends('layouts.admin')
@section('content')
<div class="row justify-content-center">
	<div class="col-sm-8">
		<div class="card shadow mb-4">
			<div class="card-header py-3">
				<h4 class="m-0 font-weight-bold text-primary text-center">Edit Category</h4>
			</div>
			<div class="card-body">
				<div class="row justify-content-center">
					<div class="col-sm-8">
						
						@include('includes.form_errors')
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
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection