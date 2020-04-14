@extends('layouts.admin')


@section('content')

	<h1 class="page-header">Comments List</h1>

	@include('includes.session_error')

	@if(count($comments)>0)
	<table class="table table-striped table-dark">
	    <thead class="bg-success text-white">
	        <th>Sr.no</th>
	    	<th>Author</th>
	        <th>Email</th>
	        <th>Body</th>
	        <th>Created At</th>
	        <th>Permission</th>
	        <th>Post</th>
	        <th>Reply</th>
	        <th>Action</th>
	    </thead>
        <tbody>

            @foreach($comments as $key => $comment)
            <tr>
            	<td> {{ $key + $comments->firstItem()}} </td>
            	<td> {{ $comment->author }} </td>
            	<td> {{ $comment->email }} </td>
            	<td> {{ $comment->body }} </td>
                <td> {{ $comment->created_at->diffForHumans() ?? 'No Date'}}</td>
                <td>
                	@if($comment->is_active == 1)

             		{!! Form::open(['method' => 'put', 'action'=> ['PostCommentsController@update',$comment->id]]) !!}
						
						<input type="hidden" name="is_active" value="0">

						<div class="form-group">
							{!! Form::submit('Un-Approve', ['class' => 'btn btn-sm btn-warning']) !!}	
						</div>

					{!! Form::close() !!}

					@else

					{!! Form::open(['method' => 'put', 'action'=> ['PostCommentsController@update',$comment->id]]) !!}
						
						<input type="hidden" name="is_active" value="1">

						<div class="form-group">
							{!! Form::submit('Approve', ['class' => 'btn btn-sm btn-success']) !!}	
						</div>

					{!! Form::close() !!}

					@endif
                </td>

                <td> <a href="{{route('home.post', $comment->post->slug)}}" class="btn btn-sm btn-info">View Post</a> </td>
                
                <td> <a href="{{route('replies.show', $comment->id)}}" class="btn btn-sm btn-primary">View Reply</a> </td>

                <td>
					{!! Form::open(['method' => 'delete', 'action'=> ['PostCommentsController@destroy',$comment->id]]) !!}

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
   		<em><h4 class="text-center"> No Comment</h4></em>
   	@endif

   	{{$comments->render()}}

@endsection

