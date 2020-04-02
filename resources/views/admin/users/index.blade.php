@extends('layouts.admin')


@section('content')

	<h1>Users List</h1>
	<table class="table table-striped table-dark">
	    <thead class="bg-success text-white">
	        <th>Id </th>
	        <th>Name</th>
	        <th>Email </th>
	        <th>Role</th>
	        <th>Status</th>
	        <th>Photo</th>
	        <th>Created At</th>
	        <th>Updated At</th>
	    </thead>
        <tbody>

            @foreach($users as $user)
            <tr>
            	<td> {{ $user->id }} </td>
                <td> {{ $user->name }} </td>
                <td> {{ $user->email }} </td>
                <td> {{ $user->role->name}}</td>
                <td> {{ $user->is_active == 1? 'Active' : 'Inactive'}}</td>
                <td> {{$user->photo_id}} </td>
                <td> {{ $user->created_at->diffForHumans()}}</td>
                <td> {{ $user->updated_at->diffForHumans()}}</td>
            </tr>
            @endforeach

        </tbody>
        <tfoot>
        </tfoot>
   	</table>
@endsection