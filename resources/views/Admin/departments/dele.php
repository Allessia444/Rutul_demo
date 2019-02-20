@extends('Admin.layouts.index')
@section('content')

<div class="main-container">
	<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
		<div class="min-height-200px">
			<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">


				<div class="clearfix mb-20">
					<div class="pull-left">
						<h4 class="text-blue">Industry Display</h4>

					</div>
					<div class="pull-right">
							<a href="{{ route('industries.create')}}" class="btn btn-outline-success">Add Industry</a>

					</div>
				

				</div>

				<table  class="table">
					<thead>
						<th>Industry Id</th>
						<th>Name</th>
						<th>Action</th>
						<th>Delete</th>

					</thead>
					<tbody>

						@foreach($industries as $industry)

						<tr>

							<td>{{ $industry->id }}</td>
							<td>{{ $industry->name}}</td>
							

							<td><a href="/admin/industries/{{$industry->id}}/edit">Update</a>/<a href="{{ route('industries.show', $industry->id) }}" >Show</a></td>


			<td>
									<form method="post" action="/admin/industries/{{ $industry->id }}">

				@method('delete')
				@csrf

			<input type="submit" class="btn btn-outline-success" name="btndelindustry" value="Delete Industry"/>

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