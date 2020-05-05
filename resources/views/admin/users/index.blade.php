@extends('layouts.admin')
@section('content')
<div class="row justify-content-center">
    <div class="col-sm-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h4 class="m-0 font-weight-bold text-primary text-center">Users List</h4>
            </div>
            <div class="card-body">
                @include('includes.session_error')
                @if(count($users)>0)
                <div class="table-responsive">
                    <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
                        <thead>
                            <th>Sr.no</th>
                            <th>Photo</th>
                            <th>Name</th>
                            <th>Email </th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Created</th>
                            <th>Updated</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach($users as $key => $user)
                            <tr>
                                <td> {{ ++$key }} </td>
                                <td> <img src="{{$user->photo->file ?? $user->user_photo_placeholder()}}" height="50" width="50" alt="photo" class="img-fluid img-thumbnails"> </td>
                                <td> {{ $user->name }} </td>
                                <td> {{ $user->email }} </td>
                                <td> {{ $user->role->name ?? 'No role'}}</td>
                                <td> {{ $user->is_active == 1? 'Active' : 'Inactive'}}</td>
                                <td> {{ $user->created_at->diffForHumans()}}</td>
                                <td> {{ $user->updated_at->diffForHumans()}}</td>
                                <td>
                                    {!! Form::open(['method' => 'delete', 'action'=>['AdminUsersController@destroy', $user->id]]) !!}
                                    <a href="{{route('users.edit', $user->id)}}" class="btn btn-sm btn-warning"> <i class="fas fa-edit"></i></a>
                                    {!! Form::button('<i class="fas fa-trash-alt" aria-hidden="true"></i>', ['class' => 'btn btn-sm btn-danger', 'type' => 'submit']) !!}
                                    
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                <em><h4 class="text-center"> No User</h4></em>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection