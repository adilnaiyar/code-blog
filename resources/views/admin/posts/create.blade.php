@extends('layouts.admin')


@section('content')

	<h1>Create Post</h1>

	{!! Form::open(['method' => 'post', 'action'=>'AdminPostsController@store', 'files'=>true]) !!}
	
		<div class="form-group">
			{!! Form::label('title','Title:')!!}
			{!! Form::text('title', null, ['class' => 'form-control'] )!!}
		</div>
		<div class="form-group">
			{!! Form::label('category_id','Category:')!!}
			{!! Form::select('category_id', ['' => 'Choose Categories']+$category, null, ['class' => 'form-control'] )!!}
		</div>
		<div class="form-group">
			{!! Form::label('photo_id','Photo:')!!}
			{!! Form::file('photo_id', ['class' => 'form-control'] )!!}
		</div>
		<div class="form-group">
			{!! Form::label('body','Description:')!!}
			{!! Form::textarea('body', null, ['class' => 'form-control', 'rows'=>8] )!!}
		</div>
		<div class="form-group">
			{!! Form::submit('Submit User', ['class' => 'btn btn-sm btn-info']) !!}
			<a class="btn btn-sm btn-danger btn-close" href="{{ route('posts.index') }}">Cancel</a>		
		</div>

	{!! Form::close() !!}

	@include('includes.form_errors')

@endsection