
<!-- Success Message -->
@if ($message = Session::get('success'))
	<div class="alert alert-success alert-dismissible flash">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		<p>{{ $message }}</p>
	</div>
@endif

<!-- Delete Message -->
@if ($message = Session::get('delete'))
	<div class="alert alert-danger alert-dismissible flash">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		<p>{{ $message }}</p>
	</div>
@endif

<!-- Comment Message -->
@if ($message = Session::get('comment_message'))
    <div class="alert alert-success alert-dismissible flash">
    	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
        <p>{{ $message }}</p>
    </div>
@endif

<!-- Reply Message -->
@if ($message = Session::get('comment_reply'))
    <div class="alert alert-success alert-dismissible flash">
    	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
        <p>{{ $message }}</p>
    </div>
@endif