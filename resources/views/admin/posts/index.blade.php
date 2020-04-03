@extends('layouts.admin')


@section('content')

	<h1>Posts List</h1>

	@if ($message = Session::get('success'))
	    <div class="alert alert-success">
	        <p>{{ $message }}</p>
	    </div>
	@endif

	<table class="table table-striped table-dark">
	    <thead class="bg-success text-white">
	        <th>Id </th>
	        <th>Photo</th>
	        <th>Owner</th>
	        <th>Category-Id</th>
	        <th>Title</th>
	        <th>Body</th>
	        <th>Created At</th>
	        <th>Updated At</th>
	        <th>Action</th>
	    </thead>
        <tbody>

            @foreach($posts as $post)
            <tr>
            	<td> {{ $post->id }} </td>
                <td> <img src="{{$post->photo->file ?? asset('/images/avatar2.png')}}" height="50" alt="photo" class="img-fluid img-thumbnails"> </td>
                <td> {{ $post->user->name}} </td>
                <td> {{ $post->category->name ?? 'Uncategorised'}} </td>
                <td> {{ $post->title}}</td>
                <td> {{ $post->body}}</td>
                <td> {{ $post->created_at->diffForHumans()}}</td>
                <td> {{ $post->updated_at->diffForHumans()}}</td>
                <td>  
                    <a href="" class="btn btn-sm btn-warning"> Edit </a>
			    </td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>

        </tfoot>
   	</table>
@endsection