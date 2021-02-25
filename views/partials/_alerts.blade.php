@if(session('success'))


<div class="alert alert-success" role="alert">
	
{{ session('success') }}

</div>



@endif

@if(session('warning'))


<div class="alert alert-warning" role="alert">
	
{{ session('warning') }}

</div>



@endif


@if(count($errors)>0)


<div class="alert alert-danger" role="alert">

	<strong>Errors: </strong>
	<ul>
@foreach($errors->all() as $error)

	<li>{{ $error}}</li>


@endforeach

</ul>
</div>



@endif

