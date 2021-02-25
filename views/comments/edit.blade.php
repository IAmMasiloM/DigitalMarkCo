@extends('main')

@section('title',' | Edit Comment')

@section('content')

<div class="row">
	<div class="col-md-2 col-md-offset-2"></div>
<div class="col-md-8">
	
<h1 class="display-4">Edit Comments</h1>

	{!!Form::model($comment, ['route'=>['comments.update', $comment->id], 'method'=>'PUT'])!!}

	{{Form::label('name','Name:')}}
	{{Form::text('name',null,['class'=>'form-control', 'disabled'=>'disabled'])}}

	{{Form::label('email','Email:')}}
	{{Form::text('email',null,['class'=>'form-control', 'disabled'=>'disabled'])}}

	{{ Form::label('comment','Comment:')}}
	{{ Form::textarea('comment',null, ['class'=>'form-control','rows'=>'4','placeholder'=>'What\'s on your mind?'])}}

	{{Form::submit('Update Comment',['class'=>'btn btn-success btn-success btn-block','style'=>'margin-top:15px;'])}}

	{!!Form::close()!!}

</div>

</div>


@endsection