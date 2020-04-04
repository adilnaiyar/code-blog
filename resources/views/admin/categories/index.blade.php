@extends('layouts.admin')


@section('content')


	<div class="row">

		<div class="col-sm-6">

			<h2>Create Categories</h2>
			
			{!! Form::open(['method' => 'post', 'action'=>'AdminCategoriesController@store']) !!}
		
				<div class="form-group">
					{!! Form::label('name','Name:')!!}
					{!! Form::text('name', null, ['class' => 'form-control'] )!!}
				</div>
				<div class="form-group">
					{!! Form::submit('Submit Category', ['class' => 'btn btn-sm btn-info']) !!}	
				</div>

			{!! Form::close() !!}

			@include('includes.form_errors')
		</div>

		<div class="col-sm-6">

			<h2>Categories List</h2>

			@if ($message = Session::get('success'))
			    <div class="alert alert-success">
			        <p>{{ $message }}</p>
			    </div>
			@endif

			<table class="table table-striped table-dark">
			    <thead class="bg-success text-white">
			        <th>Id </th>
			        <th>Name</th>  
			        <th>Created At</th>
			        <th>Updated At</th>
			        <th>Action</th>
			    </thead>
		        <tbody>
		            @foreach($categories as $categorie)
		            <tr>
		            	<td> {{ $categorie->id }} </td>  
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
	   </div>
	</div>

@endsection