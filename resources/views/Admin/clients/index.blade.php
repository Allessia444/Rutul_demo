@extends('Admin.layouts.index')
@section('title','Clients')
@section('content')
<div class="main-container">
	<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
		<div class="min-height-200px">
			<div class="page-header">
				<div class="row">
					<div class="col-md-6 col-sm-12">
						<div class="title">
							<h4>Clients</h4>
						</div>
						<nav aria-label="breadcrumb" role="navigation">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{Route('home')}}">Home</a></li>
								<li class="breadcrumb-item active" aria-current="page">Client</li>
							</ol>
						</nav>
					</div>
					<div class="col-md-6 col-sm-12 text-right">
						<div class="dropdown">
							<a class="btn btn-primary " href="{{ route('clients.create')}}" role="button" >
							<i class="fa fa-plus"></i>
								Add Client
							</a>
							<div class="dropdown-menu dropdown-menu-right">
								<a class="dropdown-item" href="#">Export List</a>
								<a class="dropdown-item" href="#">Policies</a>
								<a class="dropdown-item" href="#">View Assets</a>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
				<div class="clearfix mb-20">

				</div>
				<div class="row">
					<table class="data-table stripe hover nowrap">
						<thead>
							<tr>

								<th>Client Id</th>
								<th>Name</th>
								<th>Email</th>
								<th>Website</th>
								<th>Phone</th>
								<th>Address1</th>
								<th>Fax</th>

								<th class="datatable-nosort">Action</th>

							</tr>
						</thead>
						<tbody>

							@foreach($clients as $client)
							<tr>


								<td>{{ $client->id }}</td>
								<td>{{ $client->name}}</td>
								<td>{{ $client->email }}</td>
								<td>{{ $client->website }}</td>
								<td>{{ $client->phone }}</td>
								<td>{{ $client->address1 }}</td>
								<td>{{ $client->fax }}</td>

								<td>
									<div class="dropdown">
										<a class="btn btn-outline-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
											<i class="fa fa-ellipsis-h"></i>
										</a>
										<div class="dropdown-menu dropdown-menu-right">
											<a class="dropdown-item" href="{{ route('clients.show', $client->id) }}"><i class="fa fa-eye"></i> View</a>
											<a class="dropdown-item" href="/admin/clients/{{$client->id}}/edit"><i class="fa fa-pencil"></i> Edit</a>
											<form action="{{route('clients.destroy',$client->id)}}" method="POST">
												@method('DELETE')
												@csrf
												<button class="dropdown-item" type="submit"><i class="fa fa-trash"></i>Delete</button> 
											</form>
										</div>
									</div>
								</td>

							</tr>
							@endforeach
						</tbody>

					</table>
				</div>
			</div>

		</div>

	</div>
</div>

@endsection
@section('script')
<script>
	$('document').ready(function(){
		$('.data-table').DataTable({
			scrollCollapse: true,
			autoWidth: false,
			responsive: true,
			 pageLength: 5,
			columnDefs: [{
				targets: "datatable-nosort",
				orderable: false,
			}],
			"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
			"language": {
				"info": "_START_-_END_ of _TOTAL_ entries",
				searchPlaceholder: "Search"
			},
		});



	});
</script>
@endsection