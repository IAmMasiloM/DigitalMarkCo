@extends('main')

@section('page_descrip')

<meta name="description" content="What you need to know and when you need to know about Digital Market Co.">



@endsection

@section('page_script')

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-148472454-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-148472454-1');
</script>



@endsection


@section('title',' | Latest News')


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
	<!--<div class="col-md-1 col-md-offset-2"></div>-->
<div class="col-lg-8 ">
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
{{$posts->links()}}

</div>
<br>

<div class="col-lg-4">




	<!--<div class="card">
		<div class="card-header bg-dark">
			

		</div>

		<div class="card-title text-center"><strong>Archives</strong></div>

		<div class="card-body">
			

		</div>

	</div>-->


	<div class="card">
		<div class="card-header bg-dark">
			

		</div>

		<div class="card-title text-center"><strong>Sort by Category</strong></div>

		<div class="card-body">

			<ul class="list-group list-group-flush">

				@foreach($categories as $category)

			
	<li class="list-group-item"> <a href="{{ route('blog.categories',[$category->name])}}">{{$category->name}}</a></li>

			@endforeach
		
			</ul>
		</div>
		

	</div>

<!--	<div class="card">
		<div class="card-header bg-dark">
			

		</div>

		<div class="card-title text-center"><strong>Sort by Tag</strong></div>
		
		<div class="card-body">
			
			<ul class="list-group list-group-flush">
		   foreach($tags as $tag)
			<li class="list-group-item"><a href=" route('blog.tags',[$tag->name])"> $tag->name </a></li>

			endforeach
			</ul>

		</div>
($tag->posts()->count())

	</div>-->


 </div>

@else

<div class="col-lg-8 ">
	
<h3>No Articles Available</h3>

</div>

@endif


</div>


@endsection

