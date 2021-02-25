@extends('main')

@section('title','| All Categories')


@section('content')


<div class="row">

	<!--<div class="col-md-2 col-md-offset-2"></div>-->
	<div class="col-md">
		
		<h1 class="display-4">All Categories</h1>

	</div>


</div><br>


<div class="row">
	
<div class="col-md-8">
	
	<div class="responsive">
		
		
		<table class="table table-bordered">
			<thead class="thead-dark">
				<tr>
				<th>#</th>
				<th>Name</th>
				</tr>
			</thead>

			<tbody>
				@foreach($categories as $category)
				<tr>
				<td>{{$category->id}}</td>
				<td>{{$category->name}}</td>
				</tr>
				@endforeach
			</tbody>



		</table>

		
	</div>


</div>

<div class="col-md-4">
	
	<div class="card">
		<div class="card-header">
			
		</div>

		<div class="card-body">
			<h3 class="card-title">New Category</h3>
		
		{!! Form::open(['route'=>'categories.store','method'=>'POST']) !!}

		
		{{ Form::label('name','Name:')}}
		{{ Form::text('name',null,['class'=>'form-control ','placeholder'=>'Create New Category'])}}

		{{ Form::submit('Create New Category',['class'=>'btn btn-primary btn-block form-spacing-top'])}}
		{!! Form::close()!!}

		</div>


	</div>


</div>

</div>



@endsection