@extends('portal.layouts.index')
@section('content')

<div class="main-container">
	<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
		<div class="min-height-200px">
			<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">


				<div class="clearfix mb-20">
					<div class="pull-left">
						<h4 class="text-blue">Users Display</h4>

					</div>
					<div class="pull-right">
							<a href="{{ route('users.create')}}" class="btn btn-outline-success">Add User</a>

					</div>
				

				</div>

				<table  class="table">
					<thead>
						<th>User Id</th>
						<th>Name</th>
						<th>Emailid</th>
						<th>Mobile Number</th>
						<th>Action</th>
						<th>Delete</th>

					</thead>
					<tbody>

						@foreach($user as $user)

						<tr>

							<td>{{ $user->id }}</td>
							<td>{{ $user->getFullName()}}</td>
							<td>{{ $user->email }}</td>
							<td>{{ $user->mobile_number }}</td>

							<td><a href="/admin/users/{{$user->id}}/edit">Update</a>/<a href="{{ route('users.show', $user->id) }}" >Show</a></td>


			<td>
									<form method="post" action="/admin/users/{{ $user->id }}">

				@method('delete')
				@csrf

			<input type="submit" class="btn btn-outline-success" name="btndeluser" value="Delete User"/>

				</form>
		 </td>


						</tr>


						@endforeach

					</tbody>
				</table>




			</div>
		</div>
	</div>

</div>




@endsection