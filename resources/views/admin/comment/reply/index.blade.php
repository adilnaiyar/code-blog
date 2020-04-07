@extends('layouts.admin')


@section('content')

	<h1>Replies List</h1>

	@if ($message = Session::get('comment_reply'))
	    <div class="alert alert-success alert-dismissible flash">
	    	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    			<span aria-hidden="true">&times;</span>
  			</button>
	        <p>{{ $message }}</p>
	    </div>
	@endif
	@if ($message = Session::get('delete'))
	    <div class="alert alert-danger alert-dismissible flash">
	    	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    			<span aria-hidden="true">&times;</span>
  			</button>
	        <p>{{ $message }}</p>
	    </div>
	@endif

	@if(count($replies)>0)
	<table class="table table-striped table-dark">
	    <thead class="bg-success text-white">
	        <th>Id </th>
	    	<th>Author</th>
	        <th>Email</th>
	        <th>Body</th>
	        <th>Created At</th>
	        <th>Permission</th>
	        <th>Post</th>
	        <th>Action</th>
	    </thead>
        <tbody>

            @foreach($replies as $reply)
            <tr>
            	<td> {{ $reply->id }} </td>
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
                <td> <a href="{{route('home.post', $reply->comment->post->id)}}" class="btn btn-sm btn-info">View Post</a> </td>
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
   		<h1 class="text-center"> No reply</h1>
   	@endif

   	{{$replies->render()}}

@endsection

