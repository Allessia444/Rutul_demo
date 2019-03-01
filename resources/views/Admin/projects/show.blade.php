@extends('Admin.layouts.index')
@section('title','Show Project')
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
								<li class="breadcrumb-item"><a href="{{Route('projects.index')}}">Project</a></li>
								<li class="breadcrumb-item active" aria-current="page">Show Project</li>
							</ol>
						</nav>
					</div>
					<div class="col-md-6 col-sm-12 text-right">
						<div class="dropdown">
							<a class="btn btn-primary " href="{{ route('projects.index')}}" role="button" >
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
							<h4 class="text-blue">ProjectDetails</h4>
							<p class="mb-30 font-14"></p>
						</div>
					</div>
					<table class="table">
						<tr>
							<th>Id</th>
							<td>{{ $project->id }}</td>
						</tr>
						<tr>
							<th>User Name</th>
							<td>{{ $project->user->fname }}</td>
						</tr>
						<tr>
							<th>Name</th>
							<td>{{ $project->name}}</td>
						</tr>
						<tr>
							<th>Slug</th>
							<td>{{ $project->slug }}</td>
						</tr>
						<tr>
							<th>Confirm Hours</th>
							<td>{{ $project->confirm_hours }}</td>
						</tr>
					</table>
				</div>
			</div>
		</div>
	</div>
	@endsection