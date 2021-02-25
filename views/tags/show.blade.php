@extends('main')

@section('title'," | $tag->name Tag")



@section('content')

<div class="row">
<div class="col-md-8">
	
<h1 class="display-4">{{ $tag->name}} Tag <small> {{ $tag->posts()->count()}} posts</small></h1>

</div>


<div class="col-md-2">
	
<a href="{{ route('tags.edit',$tag->id)}}" class="btn btn-primary  btn-block" style="margin-top: 14px;">Edit</a>

</div>	

<div class="col-md-2">

	<!-- Button trigger modal -->
<button type="button" class="btn btn-danger btn-block" data-toggle="modal" data-target="#exampleModalCenter" style="margin-top: 14px;">
  Delete
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Confirmation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure you want to delete this tag?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>

        {!! Form::open(['route'=>['tags.destroy',$tag->id],'method'=>'DELETE'])!!}

	    {{ Form::submit('Yes, Delete',['class'=>'btn btn-success'])}}

	     {!! Form::close()!!}
        

      </div>
    </div>
  </div>
</div>
	
	

</div>	

</div>

<div class="row">
	
<div class="col-md">
	
<div class="responsive">
	
<table class="table table-bordered">
	<thead class="thead-dark">
		<tr>
			<th>#</th>
			<th>Title</th>
			<th>Tags</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		@foreach($tag->posts as $post)
		<tr>
			<th>{{$post->id}}</th>
			<td> {{$post->title}}</td>
			<td>
				@foreach($post->tags as $tag)

				<span class=" bg-dark text-white " style="border-radius: 5px; padding: 3px; font-size: 14px;">{{ $tag->name }}</span>

				@endforeach

			</td>
			<td><a href="{{route('posts.show',$post->id)}}" class="btn btn-primary btn-sm">View</a></td>
		</tr>
		@endforeach
	</tbody>

</table>

</div>

</div>

</div>

@endsection