@extends('layouts.admin')
@section('content')
<div class="row justify-content-center">
	<div class="col-sm-8">
		<div class="card shadow mb-4">
			<div class="card-header py-3">
				<h4 class="m-0 font-weight-bold text-primary text-center">Edit Post</h4>
			</div>
			<div class="card-body">
				<div class="row justify-content-center">
					<div class="col-sm-8">
						<img src="{{$post->photo->file ?? $post->photo_placeholder()}}" width="500" alt="photo" class="img-fluid rounded">
					</div>
				</div>
				<div class="row justify-content-center">
					<div class="col-sm-8">
						@include('includes.form_errors')
						{!! Form::model($post, ['method' => 'put', 'action'=>['AdminPostsController@update', $post->id], 'files'=>true]) !!}
						<input type="hidden" name="user_id" value="{{$post->user_id}}">
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
							{!! Form::textarea('body', null, ['id'=>'mytextarea', 'class' => 'form-control', 'rows'=>8] )!!}
						</div>
						<div class="form-group">
							{!! Form::submit('Update Post', ['class' => 'btn btn-sm btn-info']) !!}
							<a class="btn btn-sm btn-danger btn-close" href="{{ route('posts.index') }}">Cancel</a>
						</div>
						{!! Form::close() !!}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
@endsection