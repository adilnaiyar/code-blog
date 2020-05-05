@extends('layouts.admin')
@section('content')
<div class="row justify-content-center">
    <div class="col-sm-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h4 class="m-0 font-weight-bold text-primary text-center">Posts List</h4>
            </div>
            <div class="card-body">
                @include('includes.session_error')
                @if(count($posts)>0)
                <div class="table-responsive">
                    <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
                        <thead>
                            <th>Sr.no </th>
                            <th>Photo</th>
                            <th>Title</th>
                            <th>Owner</th>
                            <th>Category</th>
                            <th>Created</th>
                            <th>Updated</th>
                            <th>Comment</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach($posts as $key => $post)
                            <tr>
                                <td> {{ ++$key }} </td>
                                <td> <img src="{{$post->photo->file ?? $post->photo_placeholder()}}" height="50" width="100" alt="photo" class="img-fluid img-thumbnails"> </td>
                                <td> {{ $post->title}}</td>
                                <td> {{ $post->user->name}} </td>
                                <td> {{ $post->category->name ?? 'Uncategorised'}} </td>
                                <td> {{ $post->created_at->diffForHumans()}}</td>
                                <td> {{ $post->updated_at->diffForHumans()}}</td>
                                <td> <a href="{{route('comments.show', $post->id)}}" class="btn btn-sm btn-primary"><i class="fas fa-eye "></i></a> </td>
                                <td>
                                    {!! Form::open(['method' => 'delete', 'action'=>['AdminPostsController@destroy', $post->id]]) !!}
                                    <a href="{{route('home.post', $post->slug)}}" class="btn btn-sm btn-info"><i class="fas fa-eye"></i></a>
                                    <a href="{{route('posts.edit', $post->id)}}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                    {!! Form::button('<i class="fas fa-trash-alt" aria-hidden="true"></i>', ['class' => 'btn btn-sm btn-danger', 'type' => 'submit']) !!}
                                    
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                <em><h4 class="text-center"> No Post</h4></em>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection