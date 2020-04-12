@extends('layouts.admin')


@section('content')

	<h1>Media List</h1>

    <form action="{{ route('delete.media') }}" method="POST" class="form-inline">

        {{ csrf_field() }}

        {{method_field('delete')}}

        <div class="form-group">
            <select name="checkBoxArray" id="" class="form-control">
                <option value="">Delete</option>
            </select>
            <div class="form-group">
                <input type="submit" name="delete_all" value="Submit" class="btn btn-danger">
            </div>
        </div>
   
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
            <th><input type="checkbox" id="options"></th>
            <th>Id</th>
	    	<th>Name</th>
	        <th>Created At</th>
	       <!--  <th>Action</th> -->
	    </thead>
        <tbody>

            @foreach($photos as $key => $photo)
            <tr>
                <td><input class="checkBoxes" type="checkbox" name="checkBoxArray[]" value="{{$photo->id}}"></td>
                <td>{{$photo->id}}</td>
                <td> <img src="{{$photo->file ?? asset('/images/avatar2.png')}}" height="50" alt="photo" class="img-fluid img-thumbnails"></td>
                <td> {{ $photo->created_at->diffForHumans() ?? 'No Date'}}</td>
                <!-- <td>
                    <form action="{{ route('delete.media') }}" method="POST" class="form-inline">

                	<input type="hidden" name="photo" value="{{$photo->id}}">

                    <input type="submit" name="delete_single" value="Delete" class="btn btn-danger">

                    </form>

                </td> -->
            </tr>
            @endforeach

        </tbody>

        <tfoot>

        </tfoot>

   	</table>

    </form>

    {{$photos->render()}}

@endsection


@section('scripts')

    <script type="text/javascript">

        $(document).ready(function(){
            
            $('#options').click(function(){

                if(this.checked){

                    $('.checkBoxes').each(function(){

                        this.checked = true;
                    });

                }else{

                    $('.checkBoxes').each(function(){

                        this.checked = false;
                    });
                }

            });
        });

    </script>

@endsection