@extends('Admin.layouts.index')
@section('title','Blogs')
@section('content')
<div class="main-container">
	<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
		<div class="min-height-200px">
			<div class="page-header">
				<div class="row">
					<div class="col-md-6 col-sm-12">
						<div class="title">
							<h4>Blogs</h4>
						</div>
						<nav aria-label="breadcrumb" role="navigation">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{Route('home')}}">Home</a></li>
								<li class="breadcrumb-item active" aria-current="page">Blog</li>
							</ol>
						</nav>
					</div>
					<div class="col-md-6 col-sm-12 text-right">
						<div class="dropdown">
							<a class="btn btn-primary " href="{{ route('blogs.create')}}" role="button" >
								<i class="fa fa-plus"></i>
								Add Blog
							</a>
						</div>
						<div id="container">
							<a id="pickfiles" href="javascript:;" class="btn btn-primary"><span class="fa fa-cloud-upload">Import Blog Data</span></a> 
						</div>
						<form id="formdata">
							<input type="hidden" name="file" id="file">
						</form>
						<a id="pickfiles" href="{!! route('blogs.export') !!}" class="btn btn-primary"><span class="fa fa-cloud-download">Export Blog Data</span></a> 
					</div>
				</div>
			</div>
			<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
				<div class="clearfix mb-20">
				</div>
				<div class="row">
					<table class="data-table stripe hover nowrap">
						<thead>
							<tr>
								<th>Blog Id</th>
								<th>Name</th>
								<th>Blog Category</th>
								<th>User Name</th>
								<th class="datatable-nosort">Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach($blogs as $blog)
							<tr>
								<td>{{ $blog->id }}</td>
								<td>{{ $blog->name}}</td>
								<td>{{ $blog->blog_category_id ==  '' ? '' : $blog->blog_category->name }}</td>
								<td>{{ $blog->user->fname }}</td>
								<td>
									<div class="dropdown">
										<a class="btn btn-outline-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
											<i class="fa fa-ellipsis-h"></i>
										</a>
										<div class="dropdown-menu dropdown-menu-right">
											<a class="dropdown-item" href="{{ route('blogs.show',$blog->id) }}"><i class="fa fa-eye"></i> View</a>
											<a class="dropdown-item" href="/admin/blogs/{{$blog->id}}/edit"><i class="fa fa-pencil"></i> Edit</a>
											<form action="{{route('blogs.destroy',$blog->id)}}" method="POST">
												@method('DELETE')
												@csrf
												<button class="dropdown-item" type="submit"><i class="fa fa-trash"></i>Delete</button> 
											</form>
										</div>
									</div>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('script')
<script>
	$('document').ready(function(){
		$('.data-table').DataTable({
			scrollCollapse: true,
			autoWidth: false,
			responsive: true,
			pageLength: 5,
			columnDefs: [{
				targets: "datatable-nosort",
				orderable: false,
			}],
			"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
			"language": {
				"info": "_START_-_END_ of _TOTAL_ entries",
				searchPlaceholder: "Search"
			},
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
			        max_file_size : '20mb',
			        mime_types: [
			            {title : "Image files", extensions : "jpg,gif,png,xlsx,xlsm"},
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
					console.log(file.name);
				});

				$.ajax({
					type: "POST",
					url: "{{ route('blogs.import') }}",
					data: $('#formdata').serialize(),
				})
				.done(function(response) {
				//$('.import_success').show();
				// location.reload();
			})
				.fail(function(response) {
					console.log(response);
					// alert(response);
				});
			},
			Error: function(up, err) {
				alert(err.message);
			}
		}
	});
	uploader.init();




</script>
@endsection