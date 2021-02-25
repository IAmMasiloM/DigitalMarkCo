@extends('main')

@section('title','| Edit Tag')


@section('content')

<div class="row">
	<div class="col-md">
{!! Form::model($tag,['route'=> ['tags.update',$tag->id], 'method'=>'PUT']) !!}

	{{ Form::label('name','Title:')}}
	{{ Form::text('name', null,['class'=>'form-control'])}}<br>

	{{ Form::label('slug','Slug: ')}}
		{{ Form::text('slug',null,['class'=>'form-control'])}}<br>


	{{ Form::submit('Save Changes',['class'=>'btn btn-success'])}}

{!! Form::close() !!}
	</div>
</div>
@endsection