@extends('main')

@section('title','| View Post')


@section('content')


<div class="row">


	<!--<div class="col-md-2 col-md-offset-2"></div>-->
	<div class="col-md-7 col-sm-6">

@if($post->image !=null)
<img src="{{asset('img/'.$post->image)}}" class="img-fluid" style="width:640px; height: 320px;">
@endif
<h1>{{ $post->title}}</h1>

<p>{{ $post->body}}</p>
<hr>
<div class="tags">
	<span><strong>Tags:</strong> </span>
@foreach($post->tags as $tag )

<span class=" bg-dark text-white " style="border-radius: 5px; padding: 3px; font-size: 14px;">#{{ $tag->name }}</span>


@endforeach


</div>

</div>

<div class="col-md-5 col-sm-6">
	<div class="card">

		<div class="card-header">
			

		</div>

		<div class="card-body">
			
			<ul class="list-inline list-unstyled">

				<li class="row">
					<span class="col-md-4 col-xs-6"> <strong> URL:</strong></span>
					<span class="col-md-8 col-xs-6"> <a href="{{  url('blog/' .$post->slug) }}">{{  url('blog/' .$post->slug) }}</a> </span>
				</li>

				<li class="row">
					<span class="col-md-4 col-xs-6"> <strong> Category: </strong></span>
					<span class="col-md-8 col-xs-6"> {{ $post->category->name}} </span>
				</li> 

				<li class="row">
					<span class="col-md-4 col-xs-6"> <strong> Created At:</strong></span>
					<span class="col-md-8 col-xs-6"> {{  date('M j, Y H:i', strtotime($post->created_at)) }} </span>
				</li>

				<li class="row">
					<span class="col-md-4"> <strong> Updated At:</strong></span>
					<span class="col-md-8"> {{ date('M j, Y H:i', strtotime($post->updated_at)) }} </span>
				</li>


			</ul>
			<hr>

			<div class="row">
				
				<div class="col-sm-6"> <a href="{{route('posts.edit',$post->id)}}" class="btn btn-primary btn-block btn-spacer"> Edit</a></div>

				<div class="col-sm-6"> 

					{!! Form::open(['route'=>['posts.destroy',$post->id], 'method' =>'DELETE'])!!}


					

					<!-- Button trigger modal -->
					<button type="button" class="btn btn-danger  btn-block btn-spacer" data-toggle="modal" data-target="#exampleModalCenter">
  							Delete
				    </button>

				    <!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Delete Confirmation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you want to delete this post?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
       <!-- <button type="button" class="btn btn-primary">Save changes</button>-->
        {{ Form::submit('Yes',['class'=>'btn btn-danger'])}}
      </div>
    </div>
  </div>
</div>

					{!! Form::close()!!}
				</div>

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

<div class="row">
	<!--<div class="col-md-2 col-md-offset-2"></div>-->
	<div class="col-md">
		

	<div id="backend-comments" style="margin-top: 50px;">
		
		<h3>Comments <small>{{ $post->comments()->count()}} total</small></h3>

		<div class="table-responsive">
			
			<table class="table table-bordered">
				
				<thead class="thead-dark">
					
					<tr>
						
						<th>Name</th>
						<th>Email</th>
						<th>Comment</th>
						<th></th>
					</tr>
				</thead>

				<tbody>

					@if(count($post->comments)>0)

					@foreach($post->comments as $comment)
					<tr>
						<td>{{$comment->name}}</td>
						<td>{{$comment->email}}</td>
						<td>{{ substr($comment->comment,0,50)}}{{strlen($comment->comment) > 50 ? "..." : ""}}</td>
						<td>
							
							<a href="{{route('comments.edit',$comment->id)}}" class="btn btn-sm btn-primary"><span></span>Edit</a>
							<a href="{{route('comments.delete', $comment->id)}}" class="btn btn-sm btn-danger">Delete</a>

							
						</td>
					</tr>
					@endforeach

					@else

					<tr>
						
						<td colspan="4">No Comments Available</td>
						
					</tr>

					@endif


				</tbody>


			</table>

		</div>

	</div>


	</div>


</div>


@endsection