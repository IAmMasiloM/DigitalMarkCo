@extends('main')

@section('title','| Create Post')

@section('banner')


@endsection

@section('content')

<div class="row">
	
	<div class=" col-md-offset-2 col-md-2">

	
		
	</div>

	<div class="col-md-8">
		
		<h1 class="display-4">Create New Post</h1>
		<hr>

		{!! Form::open(['route'=>'posts.store','files'=>true])!!}

		{{ Form::label('title','Title:' ,['class'=>'form-spacing-top'])}}
		{{ Form::text('title',null, ['class'=>'form-control' ,'placeholder'=>'Enter Your title here...'])}}

		{{ Form::label('slug','Slug:',['class'=>'form-spacing-top'])}}
		{{ Form::text('slug',null, ['class'=>'form-control' ,'placeholder'=>'Enter Your Slug URL here...'])}}

		{{ Form::label('category_id','Category:')}}
		<select class="form-control" name="category_id">
			
			@foreach($categories as $category)
			<option value="{{$category->id}}">{{$category->name}}</option>

			@endforeach
		</select>
       <div class="form-group">
		{{Form::label('tags','Tags:',['class'=>'form-spacing-top'])}}
     
		<select class="form-control select2-multi" name="tags[]" multiple="multiple">
			
			@foreach($tags as $tag)
			<option value="{{$tag->id}}">{{$tag->name}}</option>

			@endforeach
		</select><br>
        </div>

		{{Form::label('featured_image','Upload Featured Image:',['class'=>'form-spacing-top'])}}
		{{Form::file('featured_image')}}<br>

		{{ Form::label('body','Body:' ,['class'=>'form-spacing-top'])}}

		{{ Form::textarea('body',null, ['class'=>'form-control','placeholder'=>'What\'s on your mind?'])}}
	

		{{ Form::submit('Create Post',['class' =>'btn btn-success btn-block' ,'id'=>'create-post-btn'])}}

		{{ Form::close()}}

	</div>

</div>




@endsection

@section('scripts')
<script type="text/javascript">
	


$('.select2-multi').select2();

</script>

@endsection