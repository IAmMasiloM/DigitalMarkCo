@extends('main')

@section('page_descrip')

<meta name="description" content="For inquires, email us at info@digitalmarketco.co.za">



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

@section('title','| Contact Us')

@section('content')

<div class="row">

	<div class="col-md-1 col-lg-2"></div>
	
<div class=" col-md-offset-1 col-md-10 col-lg-offset-2 col-lg-8">
	<h1 class="display-4">Leave Us A Message</h1>


	<form action="{{url('/contact')}}" class="form-horizontal" method="POST">

		{{ csrf_field()}}
	<div class="form-row">
		
		<div class="col-md">
		{{ Form::label('name','First Name:', ['class'=>'form-spacing-top'])}}

		{{ Form::text('name',null,['class'=>'form-control','placeholder'=>'Enter Your First Name Here...'])}}
		</div>

		<div class="col-md">

		{{ Form::label('surname','Last Name:', ['class'=>'form-spacing-top'])}}

		{{ Form::text('surname',null,['class'=>'form-control','placeholder'=>'Enter Your Last Name Here...']) }}

		</div>


	</div>

		<div class="form-row">
		
		<div class="col-md">
		{{ Form::label('email','Email:', ['class'=>'form-spacing-top'])}}

		{{ Form::email('email',null,['class'=>'form-control','placeholder'=>'Enter Your Email Address Here...'])}}
		</div>

		<div class="col-md">

		{{ Form::label('cell','Cell Number: ', ['class'=>'form-spacing-top'])}}

		{{ Form::tel('cell',null,['class'=>'form-control','placeholder'=>'Enter Your Cell Numbers Here...'])}}

		</div>


	</div>

	<div class="form-row">
		
		<div class="col-md">

		{{ Form::label('subject','Subject: ',['class'=>'form-spacing-top'])}}

		{{ Form::text('subject',null,['class'=>'form-control','placeholder'=>'Enter Your Subject Here...'])}}

		</div>

	</div>

	<div class="form-row">
		
		<div class="col-md">

		{{ Form::label('bodyMessage','Message: ',['class'=>'form-spacing-top'])}}

		{{ Form::textarea('bodyMessage',null,['class'=>'form-control','placeholder'=>'Enter Your Message Here...', 'rows'=>'6'])}}

		</div>

	</div>


	{{ Form::submit('Send Message',['class'=>'btn btn-outline-success form-spacing-top'])}}


	</form>

</div>


</div>




@endsection