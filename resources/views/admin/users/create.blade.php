@extends('layouts.admin')
@section('content')
<div class="row justify-content-center">
	<div class="col-sm-8">
		<div class="card shadow mb-4">
			<div class="card-header py-3">
				<h4 class="m-0 font-weight-bold text-primary text-center">Create User</h4>
			</div>
			<div class="card-body">
				@include('includes.form_errors')
				{!! Form::open(['method' => 'post', 'action'=>'AdminUsersController@store', 'files'=>true]) !!}
				
				<div class="form-group">
					{!! Form::label('name','Name:')!!}
					{!! Form::text('name', null, ['class' => 'form-control'] )!!}
				</div>
				<div class="form-group">
					{!! Form::label('email','Email:')!!}
					{!! Form::email('email', null, ['class' => 'form-control'] )!!}
				</div>
				<div class="form-group">
					{!! Form::label('role_id','Role:')!!}
					{!! Form::select('role_id', ['' => 'Choose Options']+$roles, null, ['class' => 'form-control'] )!!}
				</div>
				<div class="form-group">
					{!! Form::label('is_active','Status:')!!}
					{!! Form::select('is_active', array(1 => 'Active', 0 => 'Not Active'), 0, ['class' => 'form-control'] )!!}
				</div>
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
	</div>
</div>
@endsection