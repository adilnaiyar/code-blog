@extends('layouts.admin')


@section('content')

	<h1>Media List</h1>

	@if ($message = Session::get('success'))
	    <div class="alert alert-danger">
	        <p>{{ $message }}</p>
	    </div>
	@endif

	<table class="table table-striped table-dark">
	    <thead class="bg-success text-white">
	        <th>Id </th>
	    	<th>Name</th>
	        <th>Created At</th>
	        <th>Action</th>
	    </thead>
        <tbody>

            @foreach($photos as $photo)
            <tr>
            	<td> {{ $photo->id }} </td>
                <td> <img src="{{$photo->file ?? asset('/images/avatar2.png')}}" height="50" alt="photo" class="img-fluid img-thumbnails"></td>
                <td> {{ $photo->created_at->diffForHumans() ?? 'No Date'}}</td>
                <td>
                	{!! Form::open(['method' => 'delete', 'action'=>['AdminMediaController@destroy', $photo->id]]) !!}

                    {!! Form::submit('Delete', ['class' => 'btn btn-sm btn-danger']) !!}
				
					{!! Form::close() !!}
                </td>
            </tr>
            @endforeach

        </tbody>
        <tfoot>
        </tfoot>
   	</table>
@endsection