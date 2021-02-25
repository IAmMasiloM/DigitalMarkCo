@extends('main')

@section('title','| Edit Role')

@section('content')

<div class="row">
	
	<div class="col-md-2 col-md-offest-2"></div>
	<div class="col-md-8">
		<h1 class="display-4"> Edit Users</h1>

		<div class="card">
			<div class="card-header">Manage {{ $user->name}}</div>
			<div class="card-body">

				<form action="{{ route('admin.users.update',['user'=>$user->id])}}" method="POST">

					@csrf

					{{ method_field('PUT')}}

					@foreach($roles as $role)

					<div class="form-check">
						
						<input type="checkbox" name="roles[]" value="{{$role->id}}"
						{{  $user->hasAnyRole($role->name)?'checked' :'' }}>
						<label>{{ $role->name}}</label>
					</div>

					@endforeach
					
					<input type="submit" name="Update" class="btn btn-primary">
				</form>
			</div>

		</div>

		
		</div>



	</div>




@endsection