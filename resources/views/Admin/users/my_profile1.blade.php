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
								<li class="breadcrumb-item"><a href="{{Route('users.index')}}">User</a></li>
								<li class="breadcrumb-item active" aria-current="page">Edit User</li>
							</ol>
						</nav>
					</div>
				</div>
			</div>
			<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
				<div class="clearfix">
					<div class="pull-left">
						<h4 class="text-blue">Edit User</h4>
						<p class="mb-30 font-14"></p>
					</div>
				</div>
				{!! Former::open()->method('PATCH')->action(route('users.update_my_profile',$user->id)) !!}

				@csrf

				{!! Former::input('fname')->class('form-control')->label('First name') !!}

				{!! Former::input('lname')->class('form-control')->label('Last name') !!}

				{!! Former::email('email')->class('form-control')->label('Email Address')->readonly() !!}

				{!! Former::text('mobile_number')->class('form-control')->label('Mobile Number') !!}

				<div class="form-group row">
					<label class="col-sm-12 col-md-2 col-form-label">Status</label>
					<div class="col-sm-12 col-md-10">
						<input  type="radio" name="status" {!! $user->user_profile->status ==  0 ? 'checked' : '' !!} value="0">Active
						<input  type="radio" name="status" {!! $user->user_profile->status == 1 ? 'checked' : '' !!} value="1">Inactive
					</div>
				</div>
				<img src="{!! asset('/photo/'.$user->user_profile->photo) !!}">
				<div id="container">
					<div id="previewDiv"></div>
					<input type="hidden" name="photo" value="{!! $user->user_profile->photo !!}" id="file">
					<a id="pickfiles" href="javascript:;">[Select files]</a> 
					<a id="uploadfiles" href="javascript:;">[Upload files]</a>
					<ul id="filelist"></ul>
				</div>

				{!! Former::text('phone')->class('form-control')->label('Phone')->value($user->user_profile->phone) !!}

				{!! Former::textarea('address1')->class('form-control')->label('Address1')->value($user->user_profile->address1) !!}

				{!! Former::textarea('address2')->class('form-control')->label('Address2')->value($user->user_profile->address2) !!}

				{!! Former::text('city')->class('form-control')->label('city')->value($user->user_profile->city) !!}

				{!! Former::text('state')->class('form-control')->label('state')->value($user->user_profile->state) !!}

				{!! Former::text('country')->class('form-control')->label('country')->value($user->user_profile->country) !!}

				{!! Former::number('zipcode')->class('form-control')->label('zipcode')->value($user->user_profile->zipcode) !!}

				{!! Former::date('dob')->class('form-control')->label('dob')->value($user->user_profile->dob) !!}

				<div class="form-group row">
					<label class="col-sm-12 col-md-2 col-form-label">Gender</label>
					<div class="col-sm-12 col-md-10">
						<input  type="radio" name="gender" {!! $user->user_profile->gender == 'male' ? 'checked' : '' !!} value="male">Male
						<input  type="radio" name="gender" {!! $user->user_profile->gender == 'female' ? 'checked' : '' !!} value="female">Female
					</div>
				</div>

				{!!	Former::select('marital_status')->options(['single' => 'single', 'married' => 'married'])->value($user->user_profile->marital_status) !!}

				{!! Former::text('pan_number')->class('form-control')->label('pan_number')->value($user->user_profile->pan_number) !!}

				{!! Former::text('management_level')->class('form-control')->label('management_level')->value($user->user_profile->management_level) !!}

				{!! Former::date('join_date')->class('form-control')->label('join_date')->value($user->user_profile->join_date) !!}

				<div id="container1">
					<input type="hidden" name="attach" value="{!! $user->user_profile->attach !!}" id="file1">
					<a id="pickfiles1" href="javascript:;">[Select files]</a> 
					<a id="uploadfiles1" href="javascript:;">[Upload files]</a>
					<ul id="filelist1"></ul>
				</div>

				{!! Former::text('google')->class('form-control')->label('google')->value($user->user_profile->google) !!}

				{!! Former::text('facebook')->class('form-control')->label('facebook')->value($user->user_profile->facebook) !!}

				{!! Former::text('website')->class('form-control')->label('website')->value($user->user_profile->website) !!}

				{!! Former::text('skype')->class('form-control')->label('skype')->value($user->user_profile->skype) !!}

				{!! Former::text('linkedin')->class('form-control')->label('linkedin')->value($user->user_profile->linkedin) !!}

				{!! Former::text('twitter')->class('form-control')->label('twitter')->value($user->user_profile->twitter) !!}

				{!!	Former::select('department_id')->options($department) !!}

				{!!	Former::select('designation_id')->options($designation) !!}
				<div class="form-group row">
					<label class="col-sm-12 col-md-2 col-form-label">Team Lead</label>
					<div class="col-sm-12 col-md-10">
						<input  type="radio" name="team_lead" {!! $user->team_lead == 0 ? 'checked' : '' !!} value="0">yes
						<input  type="radio" name="team_lead" {!! $user->team_lead == 1 ? 'checked' : '' !!} value="1">no
					</div>
				</div>
				{!! Former::submit('btnuseredit')->class('btn btn-outline-success')->value('Update') !!}
			</div>
			{!! Former::close() !!}
		</div>
	</div>
</div>
</div>
@endsection
@section('script')
<script type="text/javascript" src="{!! asset('/plupload-2.3.6/js/plupload.full.min.js') !!}"></script>

<script type="text/javascript">
// Custom example logic

var uploader = new plupload.Uploader({
	runtimes : 'html5,flash,silverlight,html4',
browse_button : 'pickfiles', // you can pass an id...
container: document.getElementById('container'), // ... or DOM Element itself
url : "{!! asset('/plupload-2.3.6/examples/upload.php') !!}",
flash_swf_url : '../js/Moxie.swf',
silverlight_xap_url : '../js/Moxie.xap',

filters : {
	max_file_size : '10mb',
	mime_types: [
	{title : "Image files", extensions : "jpg,gif,png"},
	{title : "Zip files", extensions : "zip"}
	]
},

init: {
	PostInit: function() {
		document.getElementById('filelist').innerHTML = '';

		document.getElementById('uploadfiles').onclick = function() {
			uploader.start();
			return false;
		};
	},

	FilesAdded: function(up, files) {
		plupload.each(files, function(file) {
			document.getElementById('filelist').innerHTML += '<div id="' + file.id + '">' + file.name + ' (' + plupload.formatSize(file.size) + ') <b></b></div>';
		});
	},

	UploadProgress: function(up, file) {
		document.getElementById(file.id).getElementsByTagName('b')[0].innerHTML = '<span>' + file.percent + "%</span>";
	},
	UploadComplete: function(up, files){
		var tmp_url = '{!! asset('/tmp/') !!}';
		plupload.each(files, function(file) {
			$('#file').val(file.name);
			$('#previewDiv >img').remove();
			$('#previewDiv').append("<img src='" + /tmp/ + file.name +"' height='200' width='200' style='margin-bottom:10px;' class='avatar-photo' />");
		});
		jQuery('#loading').hide();
	},

	Error: function(up, err) {
		document.getElementById('console').appendChild(document.createTextNode("\nError #" + err.code + ": " + err.message));
	}
}
});
uploader.init();

var uploade = new plupload.Uploader({
	runtimes : 'html5,flash,silverlight,html4',
browse_button : 'pickfiles1', // you can pass an id...
container: document.getElementById('container1'), // ... or DOM Element itself
url : "{!! asset('/plupload-2.3.6/examples/upload.php') !!}",
flash_swf_url : '../js/Moxie.swf',
silverlight_xap_url : '../js/Moxie.xap',

filters : {
	max_file_size : '10mb',
	mime_types: [
	{title : "Image files", extensions : "jpg,gif,png"},
	{title : "Zip files", extensions : "zip"}
	]
},

init: {
	PostInit: function() {
		document.getElementById('filelist1').innerHTML = '';

		document.getElementById('uploadfiles1').onclick = function() {
			uploade.start();
			return false;
		};
	},

	FilesAdded: function(up, files) {
		plupload.each(files, function(file) {
			document.getElementById('filelist1').innerHTML += '<div id="' + file.id + '">' + file.name + ' (' + plupload.formatSize(file.size) + ') <b></b></div>';
		});
	},

	UploadProgress: function(up, file) {
		document.getElementById(file.id).getElementsByTagName('b')[0].innerHTML = '<span>' + file.percent + "%</span>";
	},
	UploadComplete: function(up, files){
		var tmp_url = '{!! asset('/tmp/') !!}';
		plupload.each(files, function(file) {

			console.log(  $('#file1').val(file.name));
		});
		jQuery('#loading').hide();
	},

	Error: function(up, err) {
		document.getElementById('console').appendChild(document.createTextNode("\nError #" + err.code + ": " + err.message));
	}
}
});

uploade.init();

</script>
@endsection
