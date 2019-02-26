@extends('Admin.layouts.index')
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
				<div class="contact-directory-list">
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
										<span class="badge badge-pill"><a href="/admin/blogs/{{$blog->id}}/edit">Edit Blog</a></span>
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