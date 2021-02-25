


	<div class="card">
		<div class="card-header bg-dark">
			

		</div>

		<div class="card-title text-center"><strong>Archives</strong></div>

		<div class="card-body">
			

		</div>

	</div>


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

	<div class="card">
		<div class="card-header bg-dark">
			

		</div>

		<div class="card-title text-center"><strong>Sort by Tag</strong></div>
		
		<div class="card-body">
			
			<ul class="list-group list-group-flush">
		@foreach($tags as $tag)
			<li class="list-group-item"><a href="{{url('/blog/tags/' .$tag->name)}}"> {{$tag->name}} </a></li>

			@endforeach
			</ul>

		</div>
<!-- ($tag->posts()->count())-->

<!-- -->
	</div>