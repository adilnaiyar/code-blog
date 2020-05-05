@extends('layouts.admin')
@section('content')
<div class="row justify-content-center">
	<div class="col-sm-12">
		<div class="card shadow mb-4">
			<div class="card-body">
				<div class="row justify-content-center">
					<div class="col-sm-4">
						<div class="card-header py-3">
							<h4 class="m-0 font-weight-bold text-primary text-center">Create Category</h4>
						</div>
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
					<div class="col-sm-8">
						<div class="card-header py-3">
							<h4 class="m-0 font-weight-bold text-primary text-center">Categories List</h4>
						</div>
						@include('includes.session_error')
						@if(count($categories)>0)
						<div class="table-responsive mt-2">
							<table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
								<thead>
									<th>Sr.no</th>
									<th>Name</th>
									<th>Created</th>
									<th>Updated</th>
									<th>Action</th>
								</thead>
								<tbody>
									@foreach($categories as $key => $categorie)
									<tr>
										<td> {{ ++$key }}</td>
										<td> {{ $categorie->name}} </td>
										<td> {{ $categorie->created_at->diffForHumans()}}</td>
										<td> {{ $categorie->updated_at->diffForHumans()}}</td>
										<td>
											{!! Form::open(['method' => 'delete', 'action'=>['AdminCategoriesController@destroy', $categorie->id]]) !!}
											<a href="{{route('categories.edit', $categorie->id)}}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
											{!! Form::button('<i class="fas fa-trash-alt" aria-hidden="true"></i>', ['class' => 'btn btn-sm btn-danger', 'type' => 'submit']) !!}
											
											{!! Form::close() !!}
										</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
						@else
						<em><h4 class="text-center"> No Categories</h4></em>
						@endif
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection