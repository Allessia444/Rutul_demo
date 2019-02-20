@extends('portal.layouts.index')
@section('content')




<div class="main-container">
	<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
		<div class="min-height-200px">
			<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">



				<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
					<div class="clearfix">
						<div class="pull-left">
							<h4 class="text-blue">User Details</h4>
							<p class="mb-30 font-14"></p>
						</div>
						
					</div>

					<table class="table">
						<tr>

							<th>Id</th>
							<td>{{ $user->id }}</td>
						</tr>

						<tr>
							<th>Designation</th>
							<td>{{ $user->designation ? $user->designation->name : '-' }}</td>
						</tr>


						<tr>
							<th>Department</th>
							<td>{{ $user->department ? $user->department->name : '-' }}</td>
						</tr>


						<tr>
							<th>Team Lead</th>
							<td>{{ $user->team_lead }}</td>
						</tr>

						<tr>
							<th>Name</th>
							<td>{{ $user->getFullName()}}</td>
						</tr>
						<tr>
							<th>Email</th>
							<td>{{ $user->email }}</td>
						</tr>
						<tr>


							<th>Mobile Number</th>
							<td>{{ $user->mobile_number }}</td>

						</tr>

						<tr>
							<th>Address 1</th>
							<td>{{ $user->user_profile->address1 }}</td>

						</tr>

						<tr>
							<th>Address 2</th>
							<td>{{ $user->user_profile->address2 }}</td>

						</tr>

						<tr>
							<th>Contact</th>
							<td>{{ $user->user_profile->phone }}</td>

						</tr>

						<tr>
							<th>City</th>
							<td>{{ $user->user_profile->city }}</td>

						</tr>

						<tr>
							<th>State</th>
							<td>{{ $user->user_profile->state }}</td>

						</tr>

						<tr>
							<th>Country</th>
							<td>{{ $user->user_profile->country }}</td>

						</tr>

						<tr>
							<th>ZipCode</th>
							<td>{{ $user->user_profile->zipcode }}</td>

						</tr>

						<tr>
							<th>DOB</th>
							<td>{{ $user->user_profile->dob }}</td>

						</tr>

						<tr>
							<th>Gender</th>
							<td>{{ $user->user_profile->gender }}</td>

						</tr>

						<tr>
							<th>marital_status</th>
							<td>{{ $user->user_profile->marital_status }}</td>

						</tr>


						<tr>
							<th>pan_number</th>
							<td>{{ $user->user_profile->pan_number }}</td>

						</tr>

						<tr>
							<th>pan_number</th>
							<td>{{ $user->user_profile->pan_number }}</td>

						</tr>

						<tr>
							<th>pan_number</th>
							<td>{{ $user->user_profile->pan_number }}</td>

						</tr>


						<tr>
							<th>management_level</th>
							<td>{{ $user->user_profile->management_level }}</td>

						</tr>

						<tr>
							<th>join_date</th>
							<td>{{ $user->user_profile->join_date }}</td>

						</tr>

						<tr>
							<th>google</th>
							<td>{{ $user->user_profile->google }}</td>

						</tr>

						<tr>
							<th>facebook</th>
							<td>{{ $user->user_profile->facebook }}</td>

						</tr>

						<tr>
							<th>website</th>
							<td>{{ $user->user_profile->website }}</td>

						</tr>

						<tr>
							<th>skype</th>
							<td>{{ $user->user_profile->skype }}</td>

						</tr>

						<tr>
							<th>linkedin</th>
							<td>{{ $user->user_profile->linkedin }}</td>

						</tr>

						<tr>
							<th>twitter</th>
							<td>{{ $user->user_profile->twitter }}</td>

						</tr>






					</table>


			</div>
		</div>
	</div>

</div>

@endsection