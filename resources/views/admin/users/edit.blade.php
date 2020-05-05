@extends('layouts.admin')
@section('content')
<div class="row justify-content-center">
	<div class="col-sm-8">
		<div class="card shadow mb-4">
			<div class="card-header py-3">
				<h4 class="m-0 font-weight-bold text-primary text-center">Edit User</h4>
			</div>
			<div class="card-body">
				<div class="row justify-content-center">
					<div class="col-sm-4">
						<img src="{{$user->photo->file ?? $user->user_photo_placeholder()}}"  height="260" width="300" alt="photo" class="img-fluid rounded-circle">
					</div>
				</div>
				<div class="row justify-content-center">
					<div class="col-sm-8">
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
							{!! Form::label('password','Password:')!!}
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
	</div>
</div>
</div>
@endsection