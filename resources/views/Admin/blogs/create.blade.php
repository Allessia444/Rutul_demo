@extends('Admin.layouts.index')
@section('title','Add Blog')
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
								<li class="breadcrumb-item"><a href="{{Route('blogs.index')}}">Blog</a></li>
								<li class="breadcrumb-item active" aria-current="page">Add Blog</li>
							</ol>
						</nav>
					</div>

					<div class="col-md-6 col-sm-12 text-right">
						<div class="dropdown">
							@if(Auth::user()->role=="admin")

							<a class="btn btn-primary " href="{{ route('blogs.index')}}" role="button" >
								Back
							</a>
							@else

							<a class="btn btn-primary " href="{{ route('blogs.user_blog')}}" role="button" >
								Back
							</a>
							@endif
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
						<h4 class="text-blue">Add Blog</h4>
						<p class="mb-30 font-14"></p>
					</div>

				</div>

				{!! Former::open()->route('blogs.store') !!}

				@csrf

				{!!	Former::select('blog_category_id')->options($blog_category) !!}

				{!! Former::input('name')->class('form-control')->label('Blog name') !!}

				{!! Former::textarea('description')->class('form-control')->label('Blog Description') !!}

				<div id="container">
					<div id="previewDiv"></div>
					<input type="hidden" name="photo" id="file">
					<a id="pickfiles" href="javascript:;">[Select files]</a> 
					<a id="uploadfiles" href="javascript:;">[Upload files]</a>
					<ul id="filelist"></ul>
				</div>

				<div class="form-group row">
					<label class="col-sm-12 col-md-2 col-form-label">Status</label>
					<div class="col-sm-12 col-md-10">
						<input  type="radio" name="status" checked value="0">InActive
						<input  type="radio" name="status" value="1">Active
					</div>
				</div>

				{!! Former::submit('btn_add_blog')->class('btn btn-outline-success')->value('Add') !!}

				{!! Former::close() !!}

			</div>
		</div>	
	</div>
</div>
</div>
@endsection
@section('script')

    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script src="/vendor/unisharp/laravel-ckeditor/adapters/jquery.js"></script>
    <script>
        $('textarea').ckeditor();
        // $('.textarea').ckeditor(); // if class is prefered.
    </script>
    
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

</script>





@endsection





