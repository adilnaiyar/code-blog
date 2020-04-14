@extends('layouts.admin')


@section('content')

	<h1 class="page-header">Users List</h1>

	@include('includes.session_error')

    @if(count($users)>0) 
	<table class="table table-striped table-dark">
	    <thead class="bg-success text-white">
	        <th>Sr.no</th>
	        <th>Photo</th>
	        <th>Name</th>
	        <th>Email </th>
	        <th>Role</th>
	        <th>Status</th>
	        <th>Created At</th>
	        <th>Updated At</th>
	        <th>Action</th>
	    </thead>
        <tbody>

            @foreach($users as $key => $user)
            <tr>
            	<td> {{ $key + $users->firstItem()}} </td>
                <td> <img src="{{$user->photo->file ?? $user->user_photo_placeholder()}}" height="50" alt="photo" class="img-fluid img-thumbnails"> </td>
                <td> {{ $user->name }} </td>
                <td> {{ $user->email }} </td>
                <td> {{ $user->role->name ?? 'No role'}}</td>
                <td> {{ $user->is_active == 1? 'Active' : 'Inactive'}}</td>
                <td> {{ $user->created_at->diffForHumans()}}</td>
                <td> {{ $user->updated_at->diffForHumans()}}</td>
                <td>  
                	{!! Form::open(['method' => 'delete', 'action'=>['AdminUsersController@destroy', $user->id]]) !!}

                    <a href="{{route('users.edit', $user->id)}}" class="btn btn-sm btn-warning"> Edit </a>

                    {!! Form::submit('Delete', ['class' => 'btn btn-sm btn-danger']) !!}
				
					{!! Form::close() !!}
			    </td>
            </tr>
            @endforeach

        </tbody>
        <tfoot>
        </tfoot>
   	</table>

   	@else
        <em><h4 class="text-center"> No User</h4></em>   
    @endif

   	{{$users->render()}}

@endsection