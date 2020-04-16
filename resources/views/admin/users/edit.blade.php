@extends('layouts.admin')

@section('content')

	<h1 class="page-header">Edit User</h1>

	<div class="row">

		<div class="col-sm-2">
			<img src="{{$user->photo->file ?? $user->user_photo_placeholder()}}"  height="160" alt="photo" class="img-fluid img-thumbnails">
		</div>

		<div class="col-sm-9">

		@include('includes.form_errors')

		{!! Form::model($user, ['method' => 'put', 'action'=>['AdminUsersController@update', $user->id], 'files'=>true]) !!}
		
			<div class="form-group">
				{!! Form::label('name','Name:')!!}
				{!! Form::text('name', null, ['class' => 'form-control'] )!!}
			</div>
			<div class="form-group">
				{!! Form::label('email','Email:')!!}
				{!! Form::email('email', null, ['class' => 'form-control'] )!!}
			</div>

			@if(Auth::User()->role->name == "Administrator")
			<div class="form-group">
				{!! Form::label('role_id','Role:')!!}
				{!! Form::select('role_id', $roles, null, ['class' => 'form-control'] )!!}
			</div>
			<div class="form-group">
				{!! Form::label('is_active','Status:')!!}
				{!! Form::select('is_active', array(1 => 'Active', 0 => 'Not Active'), null, ['class' => 'form-control'] )!!}
			</div>
			@endif
			
			<div class="form-group">
				{!! Form::label('photo_id','Photo:')!!}
				{!! Form::file('photo_id', ['class' => 'form-control'] )!!}
			</div>
			<div class="form-group">
				{!! Form::label('password','Password')!!}
				{!! Form::password('password', ['class' => 'form-control'] )!!}
			</div>
			<div class="form-group">
				{!! Form::submit('Submit User', ['class' => 'btn btn-sm btn-info']) !!}
				<a class="btn btn-sm btn-danger btn-close" href="{{ route('users.index') }}">Cancel</a>	
			</div>
		{!! Form::close() !!}

		</div>
	</div>

@endsection