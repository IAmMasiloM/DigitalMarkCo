@extends('main')

@section('title','| ')


@section('content')

<div class="row">
	
<div class="col-md">
	
<h1 class="display-4">Articles</h1>
<hr>
</div>

</div>

<div class="row">
	
	<div class="col-md">
		
		<div class="card">
		
		<img src="{{'../img/4k-wallpaper-astronomy-evening-2085998.jpg'}}" style="height: 320px; width: 100%;">

	</div>

	</div>

</div><br>


<div class="row">

<div class="col-lg-8">
	
@if(count($posts)>0)
	 @foreach($posts as $post)

	@if($post->image !=null)
		<img src="{{asset('img/' . $post->image)}}" class="img-fluid" style="width:640px; height: 320px;"><br>
		@endif


<br>
 <h3 > {{ substr($post->title,0,50)}}{{strlen($post->title) > 50 ? "..." : ""}}</h3>
 <h6 class="text-muted">Published {{  $post->created_at->diffForHumans() }}</h6>
 
 <p> {{ substr($post->body,0,250)}}{{strlen($post->body) > 250 ? "..." : ""}} </p>
<div class="container-fluid">
 <div class="row">
<div class="col-lg-9 col-md-9 col-sm-9 ">
 <a href="{{  url('blog/' .$post->slug) }}" class="btn btn-success btn-sm mr-auto"> Read More</a>
</div>
<div class="col-lg-3 col-md-2 col-sm-3">
	
	@if($post->comments()->count()==1)
	<small class="text-muted text-right">{{ $post->comments()->count()}} comment</small>

	@else

	<small class="text-muted text-right">{{ $post->comments()->count()}} comments</small>
	@endif

</div>



 </div>
 </div>
 <br><br>


@endforeach
<br>
{{$category->posts()->links()}}

</div>

@else
<div class="col-lg-4">
 <!--('layouts.sidebar')--> <!-- layouts.sidebar-->

 </div>

 @endif
</div>
@endsection