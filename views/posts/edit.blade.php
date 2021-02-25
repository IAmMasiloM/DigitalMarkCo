@extends('main')


@section('title', '| Edit Blog Post')


@section('content')

<div class="row">
	
<h1 class="display-4">Edit Post</h1>

</div>

<div class="row">

	<!--<div class="col-md-2 col-md-offset-2"></div>-->

	<div class="col-md-7 col-sm-6">

{!! Form::model($post, ['route'=>['posts.update',$post->id], 'method'=>'PUT','files'=>true])!!}

{{ Form::label('title','Title: ')}}
{{ Form::text('title',null,['class'=>'form-control input-lg'])}}

{{ Form::label('slug','Slug: ', ['class'=>'form-spacing-top'])}}
{{ Form::text('slug',null,['class'=>'form-control input-lg'])}}

{{Form::label('category_id','Category:' ,['class'=>'form-spacing-top'])}}

{{Form::select('category_id',$categories, null,['class'=>'form-control'])}}


{{Form::label('tags','Tags:',['class'=>'form-spacing-top'])}}

{{Form::select('tags[]',$tags, null,['class'=>'form-control select2-multi','multiple'=>'multiple'])}}

{{ Form::label('featured_image','Upload Featured Image:',['class'=>'form-spacing-top'])}}
{{ Form::file('featured_image')}}<br>		

{{ Form::label('body','Body: ' ,['class'=>'form-spacing-top'])}}
{{ Form::textarea('body',null,['class'=>'form-control'])}}

</div>

<div class="col-md-5 col-sm-6">
	<div class="card">

		<div class="card-header">
			

		</div>

		<div class="card-body">
			
			<ul class="list-inline list-unstyled">

				<label> <strong> URL:</strong></label>
				<li>
				<a href="{{  url('blog/' .$post->slug) }}">{{  url('blog/' .$post->slug) }}</a>
				</li><br> 

				<label>
					 <strong> Category: </strong>
				</label> 
				<li> {{ $post->category->name}}</li>

				

			</ul>
			<hr>

			<div class="row">
				
				<div class="col-sm-6"> <a href="{{route('posts.index')}}" class="btn btn-danger btn-block btn-sm btn-spacer">Cancel</a></div>

				<div class="col-sm-6"> {{ Form::submit('Save Changes', ['class'=> 'btn btn-success btn-block btn-sm btn-spacer'])}}</div>

			</div>

			<div class="row">
				<div class="col-sm">
				<a href="{{route('posts.index')}}" class="btn btn-outline-dark btn-sm btn-block btn-spacer"> <<< View All Posts</a>
				</div>
			</div>
		

		</div>


		


	</div>

</div>

</div>

{!! Form::close()!!}

@endsection

@section('scripts')
<script type="text/javascript">
	


$('.select2-multi').select2();
//$('.select2-multi').select2().val().trigger('change');

</script>

@endsection