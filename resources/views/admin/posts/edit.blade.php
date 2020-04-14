@extends('layouts.admin')


@section('content')

	<h1 class="page-header">Edit Post</h1>

	<div class="row">

		<div class="col-sm-2">
			
			<img src="{{$post->photo->file ?? $post->photo_placeholder()}}"  height="160" alt="photo" class="img-responsive img-rounded"> 
		</div>

		<div class="col-sm-9">

			@include('includes.form_errors')

			{!! Form::model($post, ['method' => 'put', 'action'=>['AdminPostsController@update', $post->id], 'files'=>true]) !!}
		
				<div class="form-group">
					{!! Form::label('title','Title:')!!}
					{!! Form::text('title', null, ['class' => 'form-control'] )!!}
				</div>
				<div class="form-group">
					{!! Form::label('category_id','Category:')!!}
					{!! Form::select('category_id',$category, null, ['class' => 'form-control'] )!!}
				</div>
				<div class="form-group">
					{!! Form::label('photo_id','Photo:')!!}
					{!! Form::file('photo_id', ['class' => 'form-control'] )!!}
				</div>
				<div class="form-group">
					{!! Form::label('body','Description:')!!}
					{!! Form::textarea('body', null, ['class' => 'form-control', 'rows'=>8] )!!}
				</div>
				<div class="form-group">
					{!! Form::submit('Update Post', ['class' => 'btn btn-sm btn-info']) !!}
					<a class="btn btn-sm btn-danger btn-close" href="{{ route('posts.index') }}">Cancel</a>		
				</div>

			{!! Form::close() !!}

		</div>

	</div>

@endsection

