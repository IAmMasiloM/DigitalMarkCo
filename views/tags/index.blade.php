@extends('main')


@section('title','| All Tags')

@section('content')

<dvi class="row">
	
	<div class="col-md">
		
		<h1 class="display-4">All Tags</h1>

		<table class="table table-bordered">
			<thead class="thead-dark">
				
				<tr>
					<th>#</th>
					<th>Name</th>

				</tr>

			</thead>

			<tbody>
				

				@if(count($tags)>0)
				@foreach($tags as $tag)
				<tr>
					<td>{{ $tag->id}}</td>
					<td> <a href="{{route('tags.show',$tag->id)}}">{{ $tag->name}}</a></td>
				</tr>

				@endforeach

				@else

				<tr>
					<td></td>
					<td>No Tags Available</td>
				</tr>

				@endif

			</tbody>

		</table>

	</div>

	<div class="col-md-4">
		
		<div class="card">

			<div class="card-header">
			
		</div>

		<div class="card-body">
			<h3 class="card-title">New Tag</h3>
		
		{!! Form::open(['route'=>'tags.store','method'=>'POST']) !!}

		
		{{ Form::label('name','Name:')}}
		{{ Form::text('name',null,['class'=>'form-control ','placeholder'=>'Create New Tag'])}}
		{{ Form::label('slug','Slug: ')}}
		{{ Form::text('slug',null,['class'=>'form-control' ,'placeholder'=>'Create New Slug' ])}}

		{{ Form::submit('Create New Tag',['class'=>'btn btn-primary btn-block form-spacing-top'])}}
		{!! Form::close()!!}

		</div>

			

		</div>

	</div>

</dvi>


@endsection