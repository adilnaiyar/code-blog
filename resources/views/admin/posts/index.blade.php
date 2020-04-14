@extends('layouts.admin')


@section('content')

	<h1 class="page-header">Posts List</h1>

    @include('includes.session_error')

    @if(count($posts)>0) 
	<table class="table table-striped table-dark">
	    <thead class="bg-success text-white text-center">
	        <th>Sr.no </th>
	        <th>Photo</th>
	        <th>Title</th>
	        <th>Owner</th>
	        <th>Category</th>
	        <th>Created At</th>
	        <th>Updated At</th>
	        <th>Comment</th>
            <th>Action</th>
	    </thead>
        <tbody>

            @foreach($posts as $key => $post)
            <tr>
            	<td> {{ $key + $posts->firstItem()}} </td>
                <td> <img src="{{$post->photo->file ?? $post->photo_placeholder()}}" height="50" width="100" alt="photo" class="img-fluid img-thumbnails"> </td>
                <td> {{ $post->title}}</td>
                <td> {{ $post->user->name}} </td>
                <td> {{ $post->category->name ?? 'Uncategorised'}} </td>
                <td> {{ $post->created_at->diffForHumans()}}</td>
                <td> {{ $post->updated_at->diffForHumans()}}</td>
                <td> <a href="{{route('comments.show', $post->id)}}" class="btn btn-sm btn-primary">View Comment</a> </td>
                <td> 
                	{!! Form::open(['method' => 'delete', 'action'=>['AdminPostsController@destroy', $post->id]]) !!}

                	<a href="{{route('home.post', $post->slug)}}" class="btn btn-sm btn-info">View Post</a>

                    <a href="{{route('posts.edit', $post->id)}}" class="btn btn-sm btn-warning"> Edit </a>

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
        <em><h4 class="text-center"> No Post</h4></em>   
    @endif

    {{$posts->render()}}

@endsection