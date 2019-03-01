@extends('Admin.layouts.index')
@section('title','Site Setting')
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
								<li class="breadcrumb-item active" aria-current="page">Site Setting</li>
							</ol>
						</nav>
					</div>
					<div class="col-md-6 col-sm-12 text-right">
						<div class="dropdown">
							<a class="btn btn-primary " href="{{ route('home')}}" role="button" >
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
						<h4 class="text-blue">Site Setting</h4>
						<p class="mb-30 font-14"></p>
					</div>
				</div>
					{!! Former::open()->route('site_setting.update') !!}

				@csrf

				{!! Former::input('title')->class('form-control')->label('Title') !!}

				{!! Former::email('email')->class('form-control')->label('Email')  !!}

				{!! Former::input('phone_1')->class('form-control')->label('Phone 1') !!}

				{!! Former::input('phone_2')->class('form-control')->label('Phone 2') !!}

				{!! Former::input('copy_right')->class('form-control')->label('Copy Right') !!}

				{!! Former::input('site_visitors')->class('form-control')->label('Site Visitors') !!}

				{!! Former::submit('btn_edit_site_setting')->class('btn btn-outline-success')->value('Update') !!}

				{!! Former::close() !!}
			</div>
			</div>
		</div>
	</div>
</div>
@endsection




