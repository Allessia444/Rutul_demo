@extends('Admin.layouts.index')
@section('title','Edit Industry')
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
								<li class="breadcrumb-item"><a href="{{Route('industries.index')}}">Industry</a></li>
								<li class="breadcrumb-item active" aria-current="page">Update Industry</li>
							</ol>
						</nav>
					</div>
					<div class="col-md-6 col-sm-12 text-right">
						<div class="dropdown">
							<a class="btn btn-primary " href="{{ route('industries.index')}}" role="button" >
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
						<h4 class="text-blue">Update Industry</h4>
						<p class="mb-30 font-14"></p>
					</div>
				</div>

				{!! Former::open()->method('PATCH')->action(route('industries.update',$industry->id)) !!}

				@csrf

				{!! Former::input('name')->class('form-control')->label('Industry name') !!}

				{!! Former::submit('btneditindustry')->class('btn btn-outline-success')->value('Update industry') !!}

				{!! Former::close() !!}
			</div>
		</div>
	</div>
</div>
</div>
@endsection




