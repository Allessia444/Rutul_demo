	@extends('Admin.layouts.index')
	@section('title','Project Categories')
	@section('content')
	<div class="main-container">
		<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>Project Categories</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{Route('home')}}">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Project Category</li>
								</ol>
							</nav>
						</div>
						<div class="col-md-6 col-sm-12 text-right">
							<div class="dropdown">
								<a class="btn btn-primary " href="{{ route('project_categories.create')}}" role="button" >
									<i class="fa fa-plus"></i>
									Add Project Category
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
					<div class="row">
						<table class="data-table stripe hover nowrap">
							<thead>
								<tr>
									<th>Project Id</th>
									<th>Parent Name</th>
									<th>Name</th>
									<th class="datatable-nosort">Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach($project_categories as $project)
								<tr>
									<td>{{ $project->id }}</td>
									<td>{!! $project->parent_id ? $project->parentname->name : '-'  !!}</td>
									<td>{{ $project->name}}</td>
									<td>
										<div class="dropdown">
											<a class="btn btn-outline-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
												<i class="fa fa-ellipsis-h"></i>
											</a>
											<div class="dropdown-menu dropdown-menu-right">
												<a class="dropdown-item" href="{{ route('project_categories.show', $project->id) }}"><i class="fa fa-eye"></i> View</a>
												<a class="dropdown-item" href="/admin/project_categories/{{$project->id}}/edit"><i class="fa fa-pencil"></i> Edit</a>
												<form action="{{route('project_categories.destroy',$project->id)}}" method="POST">
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