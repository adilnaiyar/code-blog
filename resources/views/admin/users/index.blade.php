@extends('layouts.admin')


@section('content')

	<h1>Users List</h1>
	<table class="table table-striped table-dark">
	    <thead class="bg-success text-white">
	        <th>Id </th>
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

            @foreach($users as $user)
            <tr>
            	<td> {{ $user->id }} </td>
                <td> <img src="{{$user->photo->file ?? asset('/images/avatar2.png')}}" height="50" alt="photo" class="img-fluid img-thumbnails"> </td>
                <td> {{ $user->name }} </td>
                <td> {{ $user->email }} </td>
                <td> {{ $user->role->name ?? 'No role'}}</td>
                <td> {{ $user->is_active == 1? 'Active' : 'Inactive'}}</td>
                <td> {{ $user->created_at->diffForHumans()}}</td>
                <td> {{ $user->updated_at->diffForHumans()}}</td>
                <td>  
                    <a href="{{route('users.edit', $user->id)}}" class="btn btn-sm btn-warning"> Edit </a>
			    </td>
            </tr>
            @endforeach

        </tbody>
        <tfoot>
        </tfoot>
   	</table>
@endsection