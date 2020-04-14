@include('includes.post_header')

	<!-- Page Content -->
    <div class="container">
        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-8">

            	@include('includes.session_error')

            	@include('includes.form_errors')
				<!-- Title -->
				<h1 id="hello">{{$posts->title}}</h1>
				<!-- Author -->
				<p class="lead">
				    by {{$posts->user->name}}
				</p>
				<hr>
				<!-- Date/Time -->
				<p><span class="glyphicon glyphicon-time"></span> Posted on {{$posts->created_at->diffForHumans()}}</p>
				<hr>
				<!-- Preview Image -->
				<img class="img-responsive" src="{{$posts->photo->file ?? $posts->photo_placeholder()}}" alt="photo">
				<hr>
				<!-- Post Content -->
				<p class="lead">{!! $posts->body !!}</p>
				<hr>

					<!-- Blog Comments -->
					@if(Auth::check())

					<div class="well">
						
					    <h4>Leave a Comment:</h4>

					    {!! Form::open(['method' => 'post', 'action'=>'PostCommentsController@store']) !!}
							
					    	<input type="hidden" name="post_id" value="{{$posts->id}}">

							<div class="form-group">
								{!! Form::textarea('body', null, ['class' => 'form-control', 'rows' => 4] )!!}
							</div>
							<div class="form-group">
								{!! Form::submit('Submit Comment', ['class' => 'btn btn-sm btn-info']) !!}	
							</div>
						{!! Form::close() !!}

					</div>

					@endif

					<hr>

					@if(count($comments)>0)

						@foreach($comments as $comment)

							@if($comment->is_active == 1)

								<div class="media">
								<h4 class="media-heading"><em>Comment:</em></h4>

								@if(Auth::check())
								<button class="toogle-reply btn btn-info pull-right ">Reply</button>
								@endif

						    	<a class="pull-left" href="#">
						        	<img class="media-object" src="{{$posts->user->photo->file?? $posts->user->user_photo_placeholder()}}" height="50" alt="photo" class="img-fluid img-thumbnails">
						    	</a>
						    	<div class="media-body">
						        	<h4 class="media-heading">{{ $comment->author}}
						            	<small>{{ $comment->created_at->diffForHumans() }}</small>
						        	</h4>
						        	<p>{{ $comment->body }}</p>

						        	<div class="comment-replies ">
										<h4>Reply:</h4>

						                {!! Form::open(['method' => 'post', 'action'=>'CommentRepliesController@createReply']) !!}
							
											<input type="hidden" name="comment_id" value="{{$comment->id}}">

											<div class="form-group">
												{!! Form::textarea('body', null, ['class' => 'form-control', 'rows' => 2] )!!}
											</div>
											<div class="form-group">
												{!! Form::submit('Submit Reply', ['class' => 'btn btn-sm btn-info']) !!}	
											</div>
										{!! Form::close() !!}
									</div>

					        		@if(count($comment->reply)>0)

					        			<h4 class="media-heading "><em>Replies:</em></h4>

										@foreach($comment->reply as $replies)

											@if($replies->is_active == 1)

									        <div id = "nested-reply" class="media">
									            <a class="pull-left" href="#">
									                <img class="media-object" src="{{$posts->user->photo->file ?? $posts->user->user_photo_placeholder()}}" height="50" alt="photo" class="img-fluid img-thumbnails" alt="">
									            </a>
									            <div class="media-body">
									                <h4 class="media-heading">{{ $replies->author}}
									                    <small>{{ $replies->created_at->diffForHumans() }}</small>
									                </h4>
									                <p>{{ $replies->body }}</p>
									        	</div>
									    	</div>
							    			@endif
					        			@endforeach
					        		@endif 
					    		</div>
							</div>
							@endif
						@endforeach
					@endif			
				</div>
@include('includes.post_footer')