@extends('Admin.layouts.index')
@section('content')
<div class="main-container">
	<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
		<div class="min-height-200px">
			<div class="page-header">
				<div class="row">
					<div class="col-md-12 col-sm-12">
						<div class="title">
							<h4>Profile</h4>
						</div>
						<nav aria-label="breadcrumb" role="navigation">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="index.php">Home</a></li>
								<li class="breadcrumb-item active" aria-current="page">Profile</li>
							</ol>
						</nav>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xl-3 col-lg-4 col-md-4 col-sm-12 mb-30">
					<div class="pd-20 bg-white border-radius-4 box-shadow">
						<div class="profile-photo">
							<a href="modal" data-toggle="modal" data-target="#modal" class="edit-avatar"><i class="fa fa-pencil"></i></a>
							<img src="{!!  asset('/photo/'.$user->user_profile->photo) !!}" alt="" class="avatar-photo">
							<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
								<div class="modal-dialog modal-dialog-centered" role="document">
									<div class="modal-content">
										<div class="modal-body pd-5" >
											<div class="img-container" id="previewDiv">
												<img id="image" src="{!! asset('/photo/'.$user->user_profile->photo) !!}" alt="Picture">
												<!-- <div id="profile_photo"></div> -->
											</div>
										</div>
										<div class="modal-footer">
											
											<input type="hidden" name="photo" id="file">
											<div id="container">
												<a id="pickfiles" href="javascript:;" class="btn btn-primary">[Select files]</a> 
											</div>
											<!-- <ul id="filelist"></ul> -->
											<input type="submit" value="Update" id="update" class="btn btn-primary">
											<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
										</div>
									</div>
								</div>
							</div>
						</div>
						<h5 class="text-center">{!! $user_detail->getfullname() !!}</h5>
						<div class="profile-info">
							<h5 class="mb-20 weight-500">Contact Information</h5>
							<ul>
								<li>
									<span>Email Address:</span>
									{!! $user_detail->email !!}
								</li>
								<li>
									<span>Phone Number:</span>
									{!! $user_detail->mobile_number !!}
								</li>
								<li>
									<span>Country:</span>
									{!! $user_detail->user_profile->country !!}
								</li>
								<li>
									<span>Address:</span>
									{!! $user_detail->user_profile->address1 !!}
								</li>
							</ul>
						</div>
						<div class="profile-social">
							<h5 class="mb-20 weight-500">Social Links</h5>
							<ul class="clearfix">
								<li><a href="{!! $user_detail->user_profile->facebook !!}" class="btn" data-bgcolor="#3b5998" data-color="#ffffff"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#" class="btn" data-bgcolor="#1da1f2" data-color="#ffffff"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#" class="btn" data-bgcolor="#007bb5" data-color="#ffffff"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="#" class="btn" data-bgcolor="#f46f30" data-color="#ffffff"><i class="fa fa-instagram"></i></a></li>
								<li><a href="#" class="btn" data-bgcolor="#c32361" data-color="#ffffff"><i class="fa fa-dribbble"></i></a></li>
								<li><a href="#" class="btn" data-bgcolor="#3d464d" data-color="#ffffff"><i class="fa fa-dropbox"></i></a></li>
								<li><a href="#" class="btn" data-bgcolor="#db4437" data-color="#ffffff"><i class="fa fa-google-plus"></i></a></li>
								<li><a href="#" class="btn" data-bgcolor="#bd081c" data-color="#ffffff"><i class="fa fa-pinterest-p"></i></a></li>
								<li><a href="#" class="btn" data-bgcolor="#00aff0" data-color="#ffffff"><i class="fa fa-skype"></i></a></li>
								<li><a href="#" class="btn" data-bgcolor="#00b489" data-color="#ffffff"><i class="fa fa-vine"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-xl-9 col-lg-8 col-md-8 col-sm-12 mb-30">
					<div class="bg-white border-radius-4 box-shadow height-100-p">
						<div class="profile-tab height-100-p">
							<div class="tab height-100-p">
								<ul class="nav nav-tabs customtab" role="tablist">
									<li class="nav-item">
										<a class="nav-link" data-toggle="tab" href="#setting" role="tab">Settings</a>
									</li>
								</ul>
								<div class="tab-content">
									<div class="tab-pane fade show active height-100-p" id="setting" role="tabpanel">
										<div class="profile-setting">
											<form>
												<ul class="profile-edit-list row">
													<li class="weight-500 col-md-12">
														<h4 class="text-blue mb-20">Edit Your Personal Setting</h4>

														{!! Former::open()->method('PATCH')->action(route('users.update_my_profile',$user->id)) !!}

														@csrf

														{!! Former::framework('Nude'); !!}

														{!! Former::input('fname')->class('form-control form-control-lg')->label('First name') !!}

														{!! Former::input('lname')->class('form-control  form-control-lg')->label('Last name') !!}

														{!! Former::email('email')->class('form-control')->label('Email Address')->readonly() !!}

														{!! Former::text('mobile_number')->class('form-control')->label('Mobile Number') !!}

														<div class="form-group row">
															<label class="col-sm-12 col-md-2 col-form-label">Status</label>
															<div class="col-sm-12 col-md-10">
																<input  type="radio" name="status" {!! $user->user_profile->status ==  0 ? 'checked' : '' !!} value="0">Active
																<input  type="radio" name="status" {!! $user->user_profile->status == 1 ? 'checked' : '' !!} value="1">Inactive
															</div>
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
													</li>
												</ul>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
</div>
@endsection
@section('script')
<script src="src/plugins/cropperjs/dist/cropper.js"></script>
<script>
	window.addEventListener('DOMContentLoaded', function () {
		var image = document.getElementById('image');
		var cropBoxData;
		var canvasData;
		var cropper;

		$('#modal').on('shown.bs.modal', function () {
			cropper = new Cropper(image, {
				autoCropArea: 0.5,
				dragMode: 'move',
				aspectRatio: 3 / 3,
				restore: false,
				guides: false,
				center: false,
				highlight: false,
				cropBoxMovable: false,
				cropBoxResizable: false,
				toggleDragModeOnDblclick: false,
				ready: function () {
					cropper.setCropBoxData(cropBoxData).setCanvasData(canvasData);
				}
			});
		}).on('hidden.bs.modal', function () {
			cropBoxData = cropper.getCropBoxData();
			canvasData = cropper.getCanvasData();
			cropper.destroy();
		});
	});
</script>

<script type="text/javascript" src="{!! asset('/plupload-2.3.6/js/plupload.full.min.js') !!}"></script>
<script type="text/javascript">
	var uploader = new plupload.Uploader({
		runtimes : 'html5,flash,silverlight,html4',
		browse_button : 'pickfiles',
		container: document.getElementById('container'),
		url : "{!! asset('/plupload-2.3.6/examples/upload.php') !!}",
		multi_selection:false, 
		    filters : {
			        max_file_size : '10mb',
			        mime_types: [
			            {title : "Image files", extensions : "jpg,gif,png"},
			        ]
		    },     
		flash_swf_url : "{{ asset('plupload/Moxie.swf') }}",
		silverlight_xap_url : "{{asset('plupload/Moxie.xap')}}",
		init: {
			PostInit: function() {
				document.getElementById('file').innerHTML = '';
			},
			FilesAdded: function(up, files) {
				uploader.start();
				jQuery('#loading').show();

			

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
				alert(err.message);
			}
		}
	});
	uploader.init();

$("#update").click(function(){
	

	var pic = $('#file').val();


	$.ajax({
	
    url: '{!! route('users.update_photo') !!}',
    type: 'POST',
    data: {
      	photo:pic
  	  },
    success: function (data) {
       $('.modal').modal('hide');

         $('.avatar-photo').attr('src','/photo/' + data['photo_name']);
    }
	});
});


</script>
@endsection