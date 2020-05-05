@extends('layouts.admin')
@section('upload_css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/min/dropzone.min.css" rel="stylesheet">
@endsection
@section('content')
<div class="row justify-content-center">
	<div class="col-sm-10">
		<div class="card shadow mb-4">
			<div class="card-header py-3">
				<h4 class="m-0 font-weight-bold text-primary text-center">Upload Media</h4>
			</div>
			<div class="card-body">
				@include('includes.form_errors')
				{!! Form::open(['method' => 'post', 'action'=>'AdminMediaController@store', 'class' => 'dropzone']) !!}
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>
@endsection
@section('upload_js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/min/dropzone.min.js"></script>
@endsection