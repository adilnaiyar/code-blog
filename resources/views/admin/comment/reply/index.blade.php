@extends('layouts.admin')
@section('content')
<div class="row justify-content-center">
	<div class="col-sm-12">
		<div class="card shadow mb-4">
			<div class="card-header py-3">
				<h4 class="m-0 font-weight-bold text-primary text-center">Replies List</h4>
			</div>
			<div class="card-body">
				@include('includes.session_error')
				@if(count($replies)>0)
				<div class="table-responsive">
					<table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
						<thead>
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
								<td> {{ ++$key }} </td>
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
								<td> <a href="{{route('home.post', $reply->comment->post->slug)}}" class="btn btn-sm btn-info"><i class="fas fa-eye"></i></a> </td>
								<td>
									{!! Form::open(['method' => 'delete', 'action'=> ['CommentRepliesController@destroy',$reply->id]]) !!}
									{!! Form::button('<i class="fas fa-trash-alt" aria-hidden="true"></i>', ['class' => 'btn btn-sm btn-danger', 'type'=>'submit']) !!}
									
									{!! Form::close() !!}
									
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
				@else
				<em><h4 class="text-center"> No Reply</h4></em>
				@endif
			</div>
		</div>
	</div>
</div>
@endsection