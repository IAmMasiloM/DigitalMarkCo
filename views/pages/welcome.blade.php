@extends('main')

@section('page_descrip')

<meta name="description" content="Web Design - Graphic Design - SEO - Social Media Marketing - Project Mangement... all at an affordable price.">



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

@section('title','| Home')

@section('banner')

	

		<div class=" container-fluid header-image-bg">
		<div class="row">
		
            

        		<div class="col-lg-12"><br><br><br>
			<h1 class="text-center display-1 text-success">Digital Market Co.</h1>
			<h2 class="text-center text-white">Connecting people!</h2>

	<br><br>
    		</div>

    				
    		

    </div>

    		<div class="row">
    	<div class="col-lg-3 col-md-2 col-lg-offset-3 col-md-offset-2"></div>
    	<div class="col-lg-6 col-md-8">
    		
    		<a href="{{ url('/contact')}}" class="btn btn-success btn-lg btn-block"> DM Us For A Quote </a><br><br><br>

    	</div>
    </div>

         </div>

  





@endsection


@section('content')

	<div class="row">
	
<div class="col-md-6 col-lg-4 col-sm-6"><br>
	<h3>Get to know us...</h3>
<p><strong>Digital Market Company</strong> is a digital agency that seeks to provide digital solutions to small and medium businesses, and individuals.</p>
<a href="{{url('/about')}}" class="btn btn-success"> Explore</a>
</div>

<div class="col-md-6 col-lg-4 col-sm-6"><br>
	<h3>What we offer...</h3>
<p>Services such as Web Design, Graphic Design, Search Engine Optimization, Content Writing,Web Application Development and Project Management.</p>

<a href="{{url('/service')}}" class="btn btn-success">Explore</a>

</div>

<div class="col-md col-lg-4"><br>

	<h3>Stories by us...</h3>
	
	<p>What you need to know and when you need to know it. Get the latest news updates from us for you. </p>
<a href="{{url('/blog')}}" class="btn btn-success">Explore</a>

</div>

</div><br><br>	




@endsection

@section('articles')

<div class="container-fluid" id="home-page-article">
	<div class="container">

<div class="row">
	<div class="col-md"><br>
		<h3 class="display-4 text-white">Most Recent Articles</h3><br>

	</div>
		

</div>

<div class="row">

@if(count($posts)>0)
	 @foreach($posts as $post)
<div class="col-lg-3 col-md-6 col-sm-6">
	


<div class="card border-dark" style="margin-top: 10px;">
	<div class="card-header bg-dark">
 <h5 class="card-title text-white"> {{ substr($post->title,0,20)}}{{strlen($post->title) > 20 ? "..." : ""}}</h5>
 
 </div>
 <div class="card-body">
 <p class="card-text"><strong>{{ $post->user->name }} Says...</strong> {{ substr($post->body,0,50)}}{{strlen($post->body) > 50 ? "..." : ""}} </p>

 
 	<div class="container">
<div class="row">

	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-6"><strong><small class="text-muted text-left">{{  $post->created_at->diffForHumans() }}</small></strong></div>
 	
<div class="col-lg-4 col-md-4 col-sm-4 col-xs-6"><a href="{{  url('blog/' .$post->slug) }}" class="btn btn-success btn-sm ">Read</a> </div>
	

</div>
	</div>	

</div>

 </div>

</div>
@endforeach


<br>



@else


<div class="col-lg-3 col-md-6 ">
	
<h4 class="text-white">No Articles Available</h4>

</div>

@endif


</div>	
</div><br><br><br>
</div>
@endsection

@section('gallery')

<div class="row">
	
	<div class="col-lg"><br><br>
		
<h4 class="display-4">Our Most Recent projects</h4><br><br>

	</div>

</div>
<div class="row">
	

<br><br>

	
<div class=" col-lg-4 col-md-4 col-sm-6"><br>
 	<div class="card" >
	
    <img src="img/portfolio/artwork-1.jpg" class="img-fluid port-img" style="">

</div>
 </div>	
 <div class=" col-lg-4 col-md-4 col-sm-6"><br>
 	<div class="card">

		
    <img src="img/portfolio/artwork-2.jpg" class="img-fluid port-img" style="">
   

</div>
 </div>	
 <div class=" col-lg-4 col-md-4"><br>
 	<div class="card">

		
    <img src="img/portfolio/artwork-3.jpg" class="img-fluid port-img" style="">

</div>
 </div>	
</div>


<div class="row">
	

<br><br>

	
<div class=" col-lg-4 col-md-4 col-sm-6"><br>
 	<div class="card">

		
    <img src="img/portfolio/artwork-4.jpg" class="img-fluid port-img">
   

</div>
 </div>	
 <div class=" col-lg-4 col-md-4 col-sm-6"><br>
 	<div class="card">

		
    <img src="img/portfolio/artwork-5.jpg" class="img-fluid port-img">
   
 
</div>
 </div>	
 <div class=" col-lg-4 col-md-4"><br>
 	<div class="card">
	
		
    <img src="img/portfolio/artwork-6.jpg" class="img-fluid port-img">

</div>
 </div>	
</div><br><br>


@endsection

@section('form')

<div class="container-fluid" id="home-page-form">
<div class="row" >
	
	<div class="col-lg-2 col-lg-offset-2"></div>
	<div class="col-lg-8"><br><br>

<div class="card border-dark">
	<div class="card-header bg-dark">
		<div class="card-title">
			
			<h1 class="display-3 text-center text-white"><em>DM Us For A Quote...</em></h1>

		</div>
	</div>
	

		<form action="{{url('/qoute')}}" class="form-horizontal bg-dark card-body" method="POST">
			{{ csrf_field()}}

			<div class="form-row">
			<div class="col-lg">
				
				{{ Form::label('name',"Name:",['class'=>'text-white form-spacing-top'])}}

				{{ Form::text('name',null,['class'=>'form-control','placeholder'=>'Name'])}}

			</div>
			<div class="col-lg">
				
              {{ Form::label('email',"Email:",['class'=>'text-white form-spacing-top'])}}
              {{ Form::text('email',null,['class'=>'form-control','placeholder'=>'Email'])}}
			</div>
			</div>
				<div class="form-row">
				<div class="col-lg">
					{{ Form::label('subject',"Subject:",['class'=>'text-white form-spacing-top'])}}
				{{ Form::text('subject',null,['class'=>'form-control','placeholder'=>'Subject'])}}

				</div>
				
			</div>

			<div class="form-row">
				<div class="col-lg">
					{{ Form::label('bodyMessage',"Message:" ,['class'=>'text-white form-spacing-top'])}}
				{{ Form::textarea('bodyMessage',null,['class'=>'form-control', 'rows'=>'5','placeholder'=>'Leave a message'])}}

				</div>
				
			</div>
			
			
			<div class="form-row">
				<div class="col-lg">
					
						{{ Form::submit('Submit',['class'=>'btn btn-success btn-block form-spacing-top'])}}


				</div>
			
			</div>
	


			


		</form>

		<div class="card-footer bg-dark">
		
	</div>
		</div>
		
	</div>
</div>
<br><br>
</div>	
@endsection

@section('scripts')

<script src="{{url('js/parsley.js')}}">
	

</script>

<script type="text/javascript">
	
	$('#form').parsley();
</script>

@endsection

