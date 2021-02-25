@extends('main')

@section('title','| All Posts')

@section('content')

<div class="row">
	
<div class="col-md-10 col-xs-6">
	
	<h1 class="display-4">All Posts</h1>
	
</div>

<div class="col-md col-xs-6">
	
	<a href="{{route('posts.create')}}" class="btn btn-outline-success" id="create-post-btn"> Create New Post</a>
	
</div>

</div><br>

<div class="row"><br><hr>
	
	<div class="col-md-12">
		
<div class="table-responsive">
		<table class="table  table-bordered">
			
			<thead class="thead-dark">
				
				<tr>
					<th>#</th>
					<th>Title</th>
					<th>Body</th>
					<th>Created At:</th>
					<th></th>

				</tr>

			</thead>

			<tbody>

				@foreach($posts as $post)
				<tr>
					<td>{{ $post->id}}</td>
					<td> {{ $post->title}}</td>
					<td>{{ substr($post->body,0,50)}}{{strlen($post->body) > 50 ? "..." : ""}} </td>

					<td> {{ date('M j, Y H:i', strtotime($post->created_at)) }}</td>
					<td>
						<a href="{{ route('posts.show', $post->id)}}" class="btn btn-primary btn-sm btn-spacer">View</a>
						<a href="{{ route('posts.edit', $post->id)}}" class="btn btn-danger btn-sm btn-spacer">Edit</a>

					</td>

				</tr>
				
				@endforeach

			</tbody>

		</table>

		<div class="text-center ">
			
			<p class="text-center">{{ $posts->links()}} </p>

		</div>
		</div>
	</div>



</div>



@endsection