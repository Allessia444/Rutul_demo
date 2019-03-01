@extends('Admin.layouts.index')
@section('title','Add Task Log')
@section('content')
<div class="main-container">
	<div class="pd-ltr-20 customscroll-10-p height-100-p xs-pd-20-10">
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
								<li class="breadcrumb-item"><a href="">Task Log</a></li>
								<li class="breadcrumb-item active" aria-current="page">Add Task Log</li>
							</ol>
						</nav>
					</div>
					<div class="col-md-6 col-sm-12 text-right">
						<div class="dropdown">
							<a class="btn btn-primary " href="{{ route('project.tasks.index',$project_id)}}" role="button" >
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
				<div class="clearfix">
					<div class="pull-left">
						<h4 class="text-blue">Add Task</h4>
						<p class="mb-30 font-14"></p>
					</div>
				</div>
				{!! Former::open()->route('project.tasks.task_logs.store',[$project_id,$task_id]) !!}

				@csrf

				{!! Former::date('date')->class('form-control')->label('Date') !!}

				{!! Former::time('start_time')->class('form-control')->label('Start Time') !!}

				{!! Former::time('end_time')->class('form-control')->label('End Time') !!}

				{!! Former::textarea('description')->class('form-control')->label('Description') !!}

				<div class="form-group row">
					<label class="col-sm-12 col-md-2 col-form-label">Billable</label>
					<div class="col-sm-12 col-md-10">
						<input  type="radio" name="billable" checked value="0">Non Billable
						<input  type="radio" name="billable" value="1">Billable
					</div>
				</div>

				{!! Former::submit('btn_add_task_log')->class('btn btn-outline-success')->value('Add') !!}

				{!! Former::close() !!}
			</div>

		</div>
	</div>
</div>
</div>
@endsection




