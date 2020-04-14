@extends('layouts.admin')

@section('content')
	<div class="row">

		<div class="col-sm-6 ">

			<h1 class="page-header">Create Category</h1>

			@include('includes.form_errors')

			{!! Form::open(['method' => 'post', 'action'=>'AdminCategoriesController@store']) !!}
		
				<div class="form-group">
					{!! Form::label('name','Name:')!!}
					{!! Form::text('name', null, ['class' => 'form-control'] )!!}
				</div>
				<div class="form-group">
					{!! Form::submit('Submit Category', ['class' => 'btn btn-sm btn-info']) !!}	
				</div>

			{!! Form::close() !!}

		</div>

		<div class="col-sm-6">

			<h1 class="page-header">Categories List</h1>

			@include('includes.session_error')

			@if(count($categories)>0)

			<table class="table table-striped table-dark">
			    <thead class="bg-success text-white">
			        <th>Sr.no</th>
			        <th>Name</th>  
			        <th>Created At</th>
			        <th>Updated At</th>
			        <th>Action</th>
			    </thead>
		        <tbody>

		            @foreach($categories as $key => $categorie)
		            <tr>
		            	<td> {{ $key + $categories->firstItem()}}</td>  
		                <td> {{ $categorie->name}} </td>
		                <td> {{ $categorie->created_at->diffForHumans()}}</td>
		                <td> {{ $categorie->updated_at->diffForHumans()}}</td>
		                <td> 
		                	{!! Form::open(['method' => 'delete', 'action'=>['AdminCategoriesController@destroy', $categorie->id]]) !!}

		                    <a href="{{route('categories.edit', $categorie->id)}}" class="btn btn-sm btn-warning"> Edit </a>

		                    {!! Form::submit('Delete', ['class' => 'btn btn-sm btn-danger']) !!}
						
							{!! Form::close() !!}
			    		</td>
		            </tr>
		            @endforeach

		        </tbody>
		        <tfoot>

		        </tfoot>
		   	</table>

		   	@else
   				<em><h4 class="text-center"> No Categories</h4></em>
   			@endif

		   	{{$categories->render()}}
		   	
	   </div>
	</div>

@endsection