@extends('layouts.admin')

@section('upload_css')

<link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/min/dropzone.min.css" rel="stylesheet">

@endsection

@section('content')

	<h1 class="page-header"> Upload Media</h1>

	@include('includes.form_errors') 

	{!! Form::open(['method' => 'post', 'action'=>'AdminMediaController@store', 'class' => 'dropzone']) !!}
	

	{!! Form::close() !!}

	

@endsection

@section('upload_js')

<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/min/dropzone.min.js"></script>

@endsection