@extends('layouts.app')
@section('content')
<div class="page-wrap d-flex flex-row align-items-center">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-12 text-center">
				<div class="error mx-auto" data-text="404">404</div>
				<p class="lead text-gray-800 mb-5">Page Not Found</p>
				<p class="text-gray-500 mb-0">It looks like you found a glitch in the matrix...</p>
				<a href="{{route('home')}}">&larr; Back to Dashboard</a>
			</div>
		</div>
	</div>
</div>
@endsection