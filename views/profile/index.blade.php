@extends('main')
<?php $titleTag=htmlspecialchars( auth()->user()->name) ?>

@section('title', '| $titleTag ')

@section('content')

<div class="row">
	
	

	<h1>{{ $user->name }}</h1>


</div>


@endsection