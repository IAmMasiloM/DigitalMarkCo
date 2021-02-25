@extends('main')

@section('page_descrip')

<meta name="description" content=" Digital market Co. is a digital agency that provides digital solutions to to indviduals and small-to-medium businesses.">



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

@section('title','| About Us')


@section('content')


<div class="row">
	<div class="col-md-8">
		<h1 class="display-4">About Us</h1>
		<h3><small>Who Are We?</small></h3>	
		<p>Digital Market Company or Digital market Co. is a digital agency that provides digital solutions to to indviduals and small-to-medium businesses. </p>
		<h3><small>What Do We Do?</small></h3>	
		<p> We Provides services such as Web Design, Web Development & Maintainence, Search Engine Optimization, Project Management, graphic Design, Content Writing , Web Audits and Social Media Marketing. </p>
		<h3><small>Why Do We Do What We Do?</small></h3>	
		<p>Our goal is to assist individuals, businesses and organizations get their digital footprint out on the web and or market at an affordable rate.</p>
		<h3><small>How Will We Achieve This?</small></h3>	
		<p>We will work together with our clients and guide them throughout the whole development process until we exceed our clients' expectations.</p>

	
	</div>

</div>

@endsection