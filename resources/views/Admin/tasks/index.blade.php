@extends('Admin.layouts.index')
@section('title','Tasks')
@section('content')
<div class="main-container">
	<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
		<div class="min-height-200px">
			<div class="page-header">
				<div class="row">
					<div class="col-md-6 col-sm-12">
						<div class="title">
							<h4>Tasks</h4>
						</div>
						<nav aria-label="breadcrumb" role="navigation">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{Route('home')}}">Home</a></li>
								<li class="breadcrumb-item active" aria-current="page">Task</li>
							</ol>
						</nav>
					</div>
					<div class="col-md-6 col-sm-12 text-right">
						<div class="dropdown">
							<a class="btn btn-primary " href="{{ route('project.tasks.create',$project_id)}}" role="button" >
								<i class="fa fa-plus"></i>
								Add Task
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
								<th></th>
								<th>Task Id</th>
								<th>Name</th>
								<th>Task Category</th>
								<th>Start Date</th>
								<th>End Date</th>
								<th class="datatable-nosort">Action</th>
								<th>Task Log</th>
							</tr>
						</thead>
						<tbody>
							@foreach($tasks as $task)
							<tr>
								<td><input type="checkbox"  name="complete" class="complete" value="{!! $task->id !!}"></td>
								<td>{{ $task->id }}</td>
								<td>{{ $task->name }}</td>
								<td>{{ $task->task_category->name }}</td>
								<td>{{ $task->start_date }}</td>
								<td>{{ $task->end_date }}</td>
								<td>
									<div class="dropdown">
										<a class="btn btn-outline-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
											<i class="fa fa-ellipsis-h"></i>
										</a>
										<div class="dropdown-menu dropdown-menu-right">
											<a class="dropdown-item" href="{{ route('project.tasks.show',[$project_id ,$task->id]) }}"><i class="fa fa-eye"></i> View</a>
											<a class="dropdown-item" href="{!! route('project.tasks.edit',[$project_id ,$task->id]) !!}"><i class="fa fa-pencil"></i> Edit</a>
											<form action="{{route('project.tasks.destroy',[$project_id ,$task->id])}}" method="POST">
												@method('DELETE')
												@csrf
												<button class="dropdown-item" type="submit"><i class="fa fa-trash"></i>Delete</button> 
											</form>
										</div>
									</div>
								</td>
								<td>
									<a class="dropdown-item" href="{!! route('project.tasks.task_logs.index',[$project_id,$task->id]) !!}"><i class="fa fa-pencil"></i>Task Log</a>
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


	$('.complete').click(function(){
		var id = $(this).val();
		alert(id);
		$.ajax({
			url: "{!! route('taskcomplete') !!}",
			type: 'post',
			data:{
				'id': id, 
				"_token": "{!! csrf_token() !!}",
			},
			success:function(response) {
				location.reload();

			},
			error: function(data) {
				console.log(data);
			}
		});
	});


</script>






@endsection