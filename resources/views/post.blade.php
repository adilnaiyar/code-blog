@extends('layouts.blog-post')


@section('content')

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
	<img class="img-responsive" src="{{$posts->photo->file}}" alt="">

	<hr>

	<!-- Post Content -->
	<p class="lead">{{$posts->body}}</p>

	<hr>

	<!-- Blog Comments -->

	@if(Auth::check())

	<!-- Comments Form -->
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

	<!-- Posted Comments -->

	@if(count($comments)>0)

		@foreach($comments as $comment)

			@if($comment->is_active == 1)

			<!-- Comment -->
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
@endif

@endsection

@section('scripts')

<script type="text/javascript">

  $(".comment-reply-container .toogle-reply").click(function(){
  	$(this).next().slideToggle("slow");
  });

   $(".alert.flash").fadeTo(1000, 500).slideUp("slow", function(){
        $(".alert.flash").slideUp("slow");
    });

</script>

@endsection