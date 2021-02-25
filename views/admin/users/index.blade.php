@extends('main')


@section('title', '| All Users ')

@section('content')

<div class="row">
	

	<div class="col-md">
		<h1 class="display-4"> Manages All Users</h1>

		<div class="table-responsive">
			
			<table class="table table-bordered">
				<thead class="thead-dark">
					
					<tr >
						<th scope="col">Name</th>
						<th scope="col">Email</th>
						<th scope="col">Role</th>
						<th scope="col">Actions</th>
					</tr>
				</thead>
				<tbody>
					@foreach($users as $user)
					<tr>
						<td>{{ $user->name}}</td>
						<td>{{ $user->email}}</td>
						<td>{{ implode(', ', $user->roles()->get()->pluck('name')->toArray())}}</td>
						<td>

							<a href="{{route('admin.users.edit',$user->id)}}" class="btn btn-primary btn-sm btn-spacer float-left">Edit</a>

							<a href="{{ route('admin.impersonate',$user->id)}}" class="btn btn-success btn-sm btn-spacer float-left">Impersonate</a>
							<form action="{{ route('admin.users.destroy',$user->id)}}" method="POST">

								@csrf

								{{ method_field('DELETE')}}
								
								<button type="submit" class=" btn btn-danger btn-sm  btn-spacer float-left" >Delete</button>

								<!-- Modal -->



								</form>	

								
						</td>
					</tr>
					@endforeach
				</tbody>


			</table>



		</div>



	</div>


</div>


@endsection