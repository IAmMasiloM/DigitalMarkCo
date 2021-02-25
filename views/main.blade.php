<!doctype html>
<!--<html lang="en">-->
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @yield('page_descrip')
    @yield('page_script')

    <!-- Bootstrap CSS -->
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">-->

    <title>Digital Market Co. @yield('title')</title>

     <link rel="stylesheet" type="text/css" href="{{ url('css/bootstrap.min.css') }}">
      <link rel="stylesheet" type="text/css" href="{{ url('css/bootstrap-social.css') }}">
      <link rel="stylesheet" type="text/css" href="{{ url('css/docs.css') }}">
      <link rel="stylesheet" type="text/css" href="{{ url('css/font-awesome.css') }}">
      <link rel="stylesheet" type="text/css" href="{{ url('css/styles.css') }}">
      <link rel="stylesheet" type="text/css" href="{{ url('css/select2.min.css') }}">
     <link rel="stylesheet" type="text/css" href="{{ url('css/ekko-lightbox.css')}}">
    <link rel="icon" type="image/png" href="{{ asset('img/The-digital-market-Co.png')}}">
<script src="{{url('js/jquery.js')}}"></script>
  <script src="{{url('js/parallax.min.js')}}"></script>
  <script src="{{ url('js/docs.js')}}"></script>

  <script>
    
    $('.parallax-window').parallax({imageSrc: 'img/apple-keyboard-ballpen-black-and-white-934062.jpg'});


  </script>

<style>
	
  .parallax-window {
    min-height: 100%;
    background: transparent;

}
  .window{
    
    background: #ffffff;
    height:100%;
    
  }


</style>

  </head>
  <body>

@include('partials._navbar')

@yield('banner')

<div class="container">
  
<div class="row">


  <div class="col-md"><br>
@include('partials._alerts')

</div>
</div>
@yield('content')



</div><br>


    @yield('articles')


</div>
<div class="container">
  @yield('gallery')

</div>


  <div class="bg-white">
  @yield('form')

</div>

 
 <div class="bg-dark" style="border-top: 3px solid #28a745;">
<div class="container" >
    
      @include('partials._footer')

    </div>
  	</div>	

 @include('partials._scripts')

 @yield('scripts')

  </body>
</html>