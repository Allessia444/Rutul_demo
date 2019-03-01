@extends('Admin.layouts.index')
@section('title','Edit TAsk')
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
								<li class="breadcrumb-item"><a href="{{Route('project.tasks.index',$project_id)}}">Task</a></li>
								<li class="breadcrumb-item active" aria-current="page">Update Task</li>
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
						<h4 class="text-blue">Update Task</h4>
						<p class="mb-30 font-14"></p>
					</div>
				</div>
				{!! Former::open()->method('PATCH')->action(route('project.tasks.update',[$project_id,$task->id])) !!}

				@csrf

				{!!	Former::select('task_category_id')->options($task_category) !!}

				{!! Former::input('name')->class('form-control')->label('Task name') !!}

				{!! Former::textarea('notes')->class('form-control')->label('Notes') !!}

				{!! Former::date('start_date')->class('form-control')->label('Start Date') !!}

				{!! Former::date('end_date')->class('form-control')->label('End Date') !!}

				<div class="form-group row">
					<label class="col-sm-12 col-md-2 col-form-label">Priority</label>
					<div class="col-sm-12 col-md-10">
						<input  type="radio" name="priority" {!! $task->priority ==  'none' ? 'checked' : '' !!} value="none">None
						<input  type="radio" name="priority" {!! $task->priority ==  'low' ? 'checked' : '' !!}  value="low">low
						<input  type="radio" name="priority" {!! $task->priority ==  'medium' ? 'checked' : '' !!}  value="medium">medium
						<input  type="radio" name="priority"  {!! $task->priority ==  'high' ? 'checked' : '' !!}  value="high">high
					</div>
				</div>

				{!! Former::submit('btn_edit_task')->class('btn btn-outline-success')->value('Save') !!}

			</div>

			{!! Former::close() !!}

		</div>
	</div>
</div>
</div>
@endsection




