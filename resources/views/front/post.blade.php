@include('includes.post_header')
	<!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Post Content Column -->

            <div class="col-lg-8">

				<!-- Title -->
				<h1 id="hello">{{$posts->title}}</h1>

				<!-- Author -->
				<p class="lead">
				    by <a href="#">{{$posts->user->name}}</a>
				</p>

				<hr>

				<!-- Date/Time -->
				<p><span class="glyphicon glyphicon-time"></span> Posted on {{$posts->created_at->diffForHumans()}}</p>

				<hr>

				<!-- Preview Image -->
				<img class="img-responsive" src="{{$posts->photo->file ?? asset('/images/blog001.jpg')}}" alt="photo">

				<hr>

				<!-- Post Content -->
				<p class="lead">{{$posts->body}}</p>

				<hr>

					<!-- Blog Comments -->

					<!-- @if(Auth::check())

					<div class="well">

						@if ($message = Session::get('comment_message'))
						    <div class="alert alert-success alert-dismissible flash">
						    	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    			<span aria-hidden="true">&times;</span>
					  			</button>
						        <p>{{ $message }}</p>
						    </div>
						@endif

						@include('includes.form_errors')
						
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
						    	<a class="pull-left" href="#">
						        	<img class="media-object" src="{{Auth::user()->gravatar ?? asset('/images/avatar2.png')}}" height="50" alt="photo" class="img-fluid img-thumbnails">
						    	</a>
						    	<div class="media-body">
						        	<h4 class="media-heading">{{ $comment->author}}
						            	<small>{{ $comment->created_at->diffForHumans() }}</small>
						        	</h4>
						        	<p>{{ $comment->body }}</p>		        	

					        		@if(count($comment->reply)>0)

										@foreach($comment->reply as $replies)

											@if($replies->is_active == 1)

									        <div id = "nested-reply" class="media">
									        	<h4 class="media-heading">Replies</h4>
									            <a class="pull-left" href="#">
									                <img class="media-object" src="{{Auth::user()->gravatar ?? asset('/images/avatar2.png')}}" height="50" alt="photo" class="img-fluid img-thumbnails" alt="">
									            </a>
									            <div class="media-body">
									                <h4 class="media-heading">{{ $replies->author}}
									                    <small>{{ $replies->created_at->diffForHumans() }}</small>
									                </h4>

									                <p>{{ $replies->body }}</p>

									                <div class="comment-reply-container">

														<button class="toogle-reply btn btn-primary pull-right ">Reply</button>

														<div class="comment-replies col-sm-11">

											               @if ($message = Session::get('comment_reply'))
															    <div class="alert alert-success alert-dismissible flash">
															    	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
																		<span aria-hidden="true">&times;</span>
																		</button>
															        <p>{{ $message }}</p>
															    </div>
															@endif

															@include('includes.form_errors')

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
									            	</div>
									        	</div>
									    	</div>
							    		@endif
					        	@endforeach
					        	@endif 
					    	</div>
						</div>
						@endif
					@endforeach
					@endif -->

					<div id="disqus_thread"></div>
						<script>

						/**
						*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
						*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
						/*
						var disqus_config = function () {
						this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
						this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
						};
						*/
						(function() { // DON'T EDIT BELOW THIS LINE
						var d = document, s = d.createElement('script');
						s.src = 'https://codehacking-adil.disqus.com/embed.js';
						s.setAttribute('data-timestamp', +new Date());
						(d.head || d.body).appendChild(s);
						})();

						</script>

						<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a>
						</noscript>

						<script id="dsq-count-scr" src="//codehacking-adil.disqus.com/count.js" async></script>
			</div>
			
	@include('includes.post_footer')