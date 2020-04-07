@extends('layouts.admin')


@section('content')

	<h1>Media List</h1>

    @if ($message = Session::get('delete'))
        <div class="alert alert-danger alert-dismissible flash">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <p>{{ $message }}</p>
        </div>
    @endif

	<table class="table table-striped table-dark">
	    <thead class="bg-success text-white">
            <th>Sr.No</th>
	    	<th>Name</th>
	        <th>Created At</th>
	        <th>Action</th>
	    </thead>
        <tbody>

            @foreach($photos as $key => $photo)
            <tr>
                <td>{{ $key+ $photos->firstItem()}}</td>
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

    {{$photos->render()}}

@endsection