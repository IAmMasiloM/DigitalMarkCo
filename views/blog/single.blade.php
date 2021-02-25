@extends('main')
<?php $titleTag=htmlspecialchars( $post->title) ?>
@section('title'," |  $titleTag")


@section('content')

<div class="row">

	<div class="col-md-2 col-md-offset-2"></div>
	<div class="col-md-8">

		@if($post->image !=null)
		<img src="{{asset('img/' . $post->image)}}" class="img-fluid" style="width:640px; height: 320px;">
		@endif
		<h1> {{ $post->title}}</h1>
		<h6 class="text-muted">Published On: {{  date('M j, Y H:i', strtotime($post->created_at)) }}</h6>

<p> {{ $post->body}}</p>

<p><strong>Posted On:</strong> {{ $post->category->name}}</p>

	<hr>	


	</div>
	


</div>

<div class="row">
	
<div class="col-md-2 col-md-offset-2"></div>
<div class="col-md-8 "> 
	<h3><img src="{{url("svg/comment-discussion.svg")}}" height="35" width="35" class="iconic"> {{ $post->comments()->count()}} Comments</h3>
	@foreach($post->comments as $comment)

	<div class="comment border-success">
		<div class="author-info">
			<img src="{{"https://www.gravatar.com/avatar/".md5(strtolower(trim($comment->email))) . "?=50&d=mm"}}" class="author-image rounded-circle">
			<div class="author-name">
				
			<h5>{{ $comment->name}}</h5>
			<p class="author-time text-muted"> {{  date('M j, Y H:i', strtotime($comment->created_at)) }}</p>

			</div>
			
		</div>

		<div class="comment-content">

			{{ $comment->comment}}
			

		</div>

		

	</div>
	
	

	@endforeach


 </div>

</div>

<div class="row">
	<div class="col-md-2 col-md-offset-2"></div>
	<div id="comment-form" class="col-md-8" style="margin-top: 25px;">
		
		{!! Form::open(['route'=> ['comments.store', $post->id], 'method'=>'POST'])!!}

		
			
				<div class="row">
				
	            <div class="col-md">
	            	
	            	{{ Form::label('name','Name:')}}
	            	{{ Form::text('name',null,['class'=>'form-control','placeholder'=>'What is your name?'])}}

	            </div>

	            <div class="col-md">
	            	
	            	{{ Form::label('email',' Email:')}}
	            	{{ Form::text('email',null,['class'=>'form-control','placeholder'=>'What is your email?'])}}


	            </div>

	            <div class="col-md-12">
	            	
	            	{{ Form::label('comment','Comment:')}}
	            	{{ Form::textarea('comment',null, ['class'=>'form-control','rows'=>'4','placeholder'=>'What\'s on your mind?'])}}

	            	{{ Form::submit('Add Comment',['class'=>'btn btn-success btn-block','style'=>'margin-top:15px;'])}}
	            </div>
	         


		       </div>


		{!! Form::close()!!}

	</div>
</div>



@endsection