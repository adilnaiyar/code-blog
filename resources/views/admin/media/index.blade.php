@extends('layouts.admin')


@section('content')

	<h1 class="page-header">Media List</h1>

    @if(count($photos)>0) 

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
   
    @include('includes.session_error')
    
	<table class="table table-striped table-dark">
	    <thead class="bg-success text-white">
            <th><input type="checkbox" id="options"></th>
            <th>Sr.no</th>
	    	<th>Name</th>
	        <th>Created At</th>
	       <!--  <th>Action</th> -->
	    </thead>
        <tbody>

            @foreach($photos as $key => $photo)
            <tr>
                <td><input class="checkBoxes" type="checkbox" name="checkBoxArray[]" value="{{$photo->id}}"></td>
                <td>{{ $key + $photos->firstItem()}}</td>
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

        @else
            <em><h4 class="text-center"> No Photo</h4></em>  
        @endif

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