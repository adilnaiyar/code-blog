@extends('layouts.admin')


@section('content')

	<h1 class="page-header">Comment Replies</h1>

	@include('includes.session_error')

	@if(count($replies)>0)
	<table class="table table-striped table-dark">
	    <thead class="bg-success text-white">
	        <th>Sr.no</th>
	    	<th>Author</th>
	        <th>Email</th>
	        <th>Body</th>
	        <th>Created At</th>
	        <th>Permission</th>
	        <th>Post</th>
	        <th>Action</th>
	    </thead>
        <tbody>

            @foreach($replies as $key => $reply)
            <tr>
            	<td> {{ $key + $replies->firstItem() }} </td>
            	<td> {{ $reply->author }} </td>
            	<td> {{ $reply->email }} </td>
            	<td> {{ $reply->body }} </td>
                <td> {{ $reply->created_at->diffForHumans() ?? 'No Date'}}</td>
                <td>
                	@if($reply->is_active == 1)

             		{!! Form::open(['method' => 'put', 'action'=> ['CommentRepliesController@update',$reply->id]]) !!}
						
						<input type="hidden" name="is_active" value="0">

						<div class="form-group">
							{!! Form::submit('Un-Approve', ['class' => 'btn btn-sm btn-warning']) !!}	
						</div>

					{!! Form::close() !!}

					@else

					{!! Form::open(['method' => 'put', 'action'=> ['CommentRepliesController@update',$reply->id]]) !!}
						
						<input type="hidden" name="is_active" value="1">

						<div class="form-group">
							{!! Form::submit('Approve', ['class' => 'btn btn-sm btn-success']) !!}	
						</div>

					{!! Form::close() !!}

					@endif
                </td>

                <td> <a href="{{route('home.post', $reply->comment->post->slug)}}" class="btn btn-sm btn-info">View Post</a></td>
                
                <td>
					{!! Form::open(['method' => 'delete', 'action'=> ['CommentRepliesController@destroy',$reply->id]]) !!}

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
   		<em><h4 class="text-center"> No Reply</h4></em>
   	@endif

   	{{$replies->render()}}

@endsection

