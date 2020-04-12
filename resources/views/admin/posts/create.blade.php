@extends('layouts.admin')

@section('content')

	<h1>Create Post</h1>

	{!! Form::open(['method' => 'post', 'action'=>'AdminPostsController@store', 'files'=>true]) !!}
	
		<div class="form-group">
			{!! Form::label('title','Title:')!!}
			{!! Form::text('title', null, ['class' => 'form-control'] )!!}
		</div>
		<div class="form-group">
			{!! Form::label('category_id','Category:')!!}
			{!! Form::select('category_id', ['' => 'Choose Categories']+$category, null, ['class' => 'form-control'] )!!}
		</div>
		<div class="form-group">
			{!! Form::label('photo_id','Photo:')!!}
			{!! Form::file('photo_id', ['class' => 'form-control'] )!!}
		</div>
		<div class="form-group">
			{!! Form::label('body','Description:')!!}
			{!! Form::textarea('body', null, ['class' => 'form-control','rows'=>8] )!!}
		</div>
		<div class="form-group">
			{!! Form::submit('Submit User', ['class' => 'btn btn-sm btn-info']) !!}
			<a class="btn btn-sm btn-danger btn-close" href="{{ route('posts.index') }}">Cancel</a>		
		</div>

	{!! Form::close() !!}

	@include('includes.form_errors')

@endsection

@section('tiny')

<script>
	
 	// tinymce.init({
  //   	selector: '#mytextarea'
  // 	});
   
	var editor_config = {
	    path_absolute : "{{ url('/') }}/",
	    selector: "textarea",
	    plugins: [
	      "advlist autolink lists link image charmap print preview hr anchor pagebreak",
	      "searchreplace wordcount visualblocks visualchars code fullscreen",
	      "insertdatetime media nonbreaking save table contextmenu directionality",
	      "emoticons template paste textcolor colorpicker textpattern"
	    ],
	    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
	    relative_urls: false,
	    file_browser_callback : function(field_name, url, type, win) {
	      var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
	      var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

	      var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
	      if (type == 'image') {
	        cmsURL = cmsURL + "&type=Images";
	      } else {
	        cmsURL = cmsURL + "&type=Files";
	      }

	      tinyMCE.activeEditor.windowManager.open({
	        file : cmsURL,
	        title : 'Filemanager',
	        width : x * 0.8,
	        height : y * 0.8,
	        resizable : "yes",
	        close_previous : "no"
	      });
	    }
	  };

	  tinymce.init(editor_config);
	  
</script>

@endsection