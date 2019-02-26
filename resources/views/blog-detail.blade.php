<!DOCTYPE html>
<html>
<head>
	<link href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,500,600,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
	<script type="text/javascript" async="" src="https://www.google-analytics.com/analytics.js"></script>
	<script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
	<link rel="stylesheet" type="text/css" href="/css/main.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script type="text/javascript" src="/js/main.js"></script>
</head>
<body>
	<div class="container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<div class="title">
								<h4>Blog Detail</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="{!! route('blog') !!}">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Blog Detail</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
				<div class="blog-wrap">
					<div class="container pd-0">
						<div class="row">
							<div class="col-md-8 col-sm-12">
								<div class="blog-detail mb-30">
									<div class="blog-img">
										<img src="{!! $blog->photo_url('large') !!}" alt="">
									</div>
									<div class="blog-caption">
										<h4 class="mb-10">{!! $blog->name !!}</h4>									
										<p>{!! $blog->description !!}</p>
									</div>
								</div>
							</div>
							<div class="col-md-4 col-sm-12">
								<div class="bg-white border-radius-4 box-shadow mb-30">
									<h5 class="pd-20">Categories</h5>
									<div class="list-group">
										<a href="#" class="list-group-item d-flex align-items-center justify-content-between">HTML <span class="badge badge-primary badge-pill">7</span></a>
										<a href="#" class="list-group-item d-flex align-items-center justify-content-between">Css <span class="badge badge-primary badge-pill">10</span></a>
										<a href="#" class="list-group-item d-flex align-items-center justify-content-between active">Bootstrap <span class="badge badge-primary badge-pill">8</span></a>
										<a href="#" class="list-group-item d-flex align-items-center justify-content-between">jQuery <span class="badge badge-primary badge-pill">15</span></a>
										<a href="#" class="list-group-item d-flex align-items-center justify-content-between">Design <span class="badge badge-primary badge-pill">5</span></a>
									</div>
								</div>
								<div class="bg-white border-radius-4 box-shadow mb-30">
									<h5 class="pd-20">Latest Post</h5>
									<div class="latest-post">
										<ul>
											<li>
												<h4><a href="#">Ut enim ad minim veniam, quis nostrud exercitation ullamco</a></h4>
												<span>HTML</span>
											</li>
											<li>
												<h4><a href="#">Lorem ipsum dolor sit amet, consectetur adipisicing elit</a></h4>
												<span>Css</span>
											</li>
											<li>
												<h4><a href="#">Ut enim ad minim veniam, quis nostrud exercitation ullamco</a></h4>
												<span>jQuery</span>
											</li>
											<li>
												<h4><a href="#">Lorem ipsum dolor sit amet, consectetur adipisicing elit</a></h4>
												<span>Bootstrap</span>
											</li>
											<li>
												<h4><a href="#">Lorem ipsum dolor sit amet, consectetur adipisicing elit</a></h4>
												<span>Design</span>
											</li>
										</ul>
									</div>
								</div>
								<div class="bg-white border-radius-4 box-shadow">
									<h5 class="pd-20">Archives</h5>
									<div class="list-group">
										<a href="#" class="list-group-item d-flex align-items-center justify-content-between">January 2018</a>
										<a href="#" class="list-group-item d-flex align-items-center justify-content-between">February 2018</a>
										<a href="#" class="list-group-item d-flex align-items-center justify-content-between">March 2018</a>
										<a href="#" class="list-group-item d-flex align-items-center justify-content-between">April 2018</a>
										<a href="#" class="list-group-item d-flex align-items-center justify-content-between">May 2018</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>