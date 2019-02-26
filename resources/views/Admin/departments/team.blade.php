@extends('Admin.layouts.index')
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
								<li class="breadcrumb-item"><a href="{{Route('designations.index')}}">Designation</a></li>
								<li class="breadcrumb-item active" aria-current="page">Add TeamLead</li>
							</ol>
						</nav>
					</div>
					<div class="col-md-6 col-sm-12 text-right">
						<div class="dropdown">
							<a class="btn btn-primary " href="{{ route('designations.index')}}" role="button" >
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
						<h4 class="text-blue">Add TeamLead</h4>
						<p class="mb-30 font-14"></p>
					</div>
				</div>

				@if($team==null)

				{!! Former::open()->route('departments.team_leads.store',$department_id) !!}

				@csrf

				{!!	Former::select('team_lead_id')->options($team_lead)->placeholder('Select one option...') !!}

				{!!	Former::multiselect('member_id')->options($member_id)->class('selectpicker')->placeholder('Select one option...') !!}

				{!! Former::submit('btn_team')->class('btn btn-outline-success')->value('save') !!}
				
				{!! Former::close() !!}

				@else

				{!! Former::open()->route('departments.team_leads.store',$department_id) !!}

				@csrf

				{!!	Former::select('team_lead_id')->options($team_lead)->select($team_leads) !!}

				{!!	Former::multiselect('member_id')->options($member_id)->class('selectpicker')->select($team_members) !!}

				{!! Former::submit('btn_team')->class('btn btn-outline-success')->value('save') !!}

				{!! Former::close() !!}

				@endif

			</div>
		</div>
	</div>
</div>
@endsection