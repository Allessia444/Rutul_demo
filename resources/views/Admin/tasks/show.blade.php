@extends('Admin.layouts.index')
@section('content')
<div class="main-container">
	<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
		<div class="min-height-200px">
			<div class="page-header">
				<div class="row">
					<div class="col-md-6 col-sm-12">
						<div class="title">
							<h4>Form</h4>
						</div>
						<nav aria-label="breadcrumb" role="navigation">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{Route('home')}}">Home</a></li>
								<li class="breadcrumb-item"><a href="{{Route('tasks.index')}}">Task </a></li>
								<li class="breadcrumb-item active" aria-current="page">Show Task </li>
							</ol>
						</nav>
					</div>
					<div class="col-md-6 col-sm-12 text-right">
						<div class="dropdown">
							<a class="btn btn-primary " href="{{ route('tasks.index')}}" role="button" >
								Back
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
				<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
					<div class="clearfix">
						<div class="pull-left">
							<h4 class="text-blue">Task Details</h4>
							<p class="mb-30 font-14"></p>
						</div>
					</div>
					<table class="table">
						<tr>
							<th>Id</th>
							<td>{{ $task->id }}</td>
						</tr>
						<tr>
							<th>Task Name</th>
							<td>{{ $task->name }}</td>
						</tr>
						<tr>
							<th>Task Category</th>
							<td>{{ $task->task_category->name }}</td>
						</tr>
						<tr>
							<th>Notes</th>
							<td>{{ $task->notes }}</td>
						</tr>
						<tr>
							<th>Start Date</th>
							<td>{{ $task->start_date }}</td>
						</tr>
						<tr>
							<th>End Date</th>
							<td>{{ $task->end_date }}</td>
						</tr>
					</table>
				</div>
			</div>
		</div>
	</div>
	@endsection