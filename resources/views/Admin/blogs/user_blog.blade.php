@extends('Admin.layouts.index')
@section('title','User Blog')
@section('content')
<div class="main-container">
	<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
		<div class="min-height-200px">
			<div class="page-header">
				<div class="row">
					<div class="col-md-12 col-sm-12 text-right">
						<div class="dropdown">
							<a class="btn btn-primary " href="{{ route('blogs.create')}}" role="button" >
								<i class="fa fa-plus"></i>
								Add Blog
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
			<div class="container pd-0">
				<div class="contact-directory-list" id="blog-list">
					<ul class="row">
						@foreach($blogs as $blog)
						<li class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
							<div class="contact-directory-box">
								<div class="contact-dire-info text-center">
									<div class="contact-avatar">
										<span>
											<img src="{!! $blog->photo_url('small') !!}" alt="">
										</span>
									</div>
									<div class="contact-name">
										<h4>{!! $blog->name !!}</h4>
										<p class="text-right">- {!! $blog->user->fname !!}</p>
										<!-- 	<div class="work text-success"><i class="ion-android-person"></i> Freelancer</div> --> 
									</div>
									<div class="contact-skill">
										<span class="badge badge-pill"><a href="{{ route('blogs.show', $blog->id) }}">Blog Details</a></span>

										<span class="badge badge-pill">
											<a href="javascript:;" id="edit-blog" class="edit-avatar" data-url="{!! route('blog-edit',$blog->id) !!}">Edit Blog</a>
										</span>
										<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
											<div class="modal-dialog modal-dialog-centered" role="document">
												<div class="modal-content">
													<div class="modal-body pd-5" id="blog-append" >
														<!-- data append -->
													</div>
													<div class="modal-footer">
														<!-- 	<input type="submit" value="Update" id="update" class="btn btn-primary"> -->
														<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
													</div>
												</div>
											</div>
										</div>

										<span class="badge badge-pill">
											<form action="{{route('blogs.destroy',$blog->id)}}" method="POST">
												@method('DELETE')
												@csrf
												<button class="dropdown-item" type="submit"><i class="fa fa-trash"></i>Delete</button> 
											</form>
										</span>
									</div>
									<!-- <div class="profile-sort-desc">
										{!! $blog->description !!}
									</div> -->
								</div>
							</div>
						</li>	
						@endforeach
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('script')
<script>
	$(document).ready(function(){


		$('#edit-blog').on('click',function(){

			var url = $(this).data('url');
			
			$.get(url, function(data){
				// alert( "success" );
			})
			.done(function(data) {
				$('#modal').modal('show');
				$('#blog-append').html("");
				$('#blog-append').append(data);
					   // data:form.serialize(),
					})
			.fail(function() {
				alert( "error" );
			})
		});

		

	});

	$(document).on('click','#update-blog', function(e){

			e.preventDefault();
			
			var formdata = $('#MyForm').serialize();
			console.log(formdata);
			var blog_id=$("#blog-id").val();
		

			$.post("{!! route('blog-update') !!}",formdata, function(data){
		
				console.log(data);
				alert( "success" );
			})
			.done(function(data) {
				
				$('#modal').modal('hide');

			})
			.fail(function() {
				alert( "error" );
			})

			// $.get("{!! route('blogs.user_blog') !!}", function(data){
			// 	// alert( "success" );
			// })
			// .done(function(data) {
			// 	$('#blog-list').html("");
			// 	$('#blog-list').append(data);
			// 		   // data:form.serialize(),
			// 		})
			// .fail(function() {
			// 	alert( "error" );
			// })


		});


</script>
@endsection