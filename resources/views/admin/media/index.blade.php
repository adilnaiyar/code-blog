@extends('layouts.admin')
@section('content')
<div class="row justify-content-center">
    <div class="col-sm-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h4 class="m-0 font-weight-bold text-primary text-center">Media List</h4>
            </div>
            <div class="card-body">
                @include('includes.session_error')
                
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
                    
                    
                    <div class="table-responsive">
                        <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
                            <thead>
                                <th><input type="checkbox" id="options"></th>
                                <th>Sr.no</th>
                                <th>Name</th>
                                <th>Created</th>
                                <!--  <th>Action</th> -->
                            </thead>
                            <tbody>
                                @foreach($photos as $key => $photo)
                                <tr>
                                    <td><input class="checkBoxes" type="checkbox" name="checkBoxArray[]" value="{{$photo->id}}"></td>
                                    <td>{{ ++$key }}</td>
                                    <td> <img src="{{$photo->file ?? asset('/images/avatar2.png')}}" height="50" width="100" alt="photo" class="img-fluid img-thumbnails"></td>
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
                        </table>
                    </div>
                </form>
                @else
                <em><h4 class="text-center"> No Photo</h4></em>
                @endif
            </div>
        </div>
    </div>
</div>
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