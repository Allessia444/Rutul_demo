<!DOCTYPE html>
<html>
<head>
	<title>{!! App\SiteSetting::first() ? App\SiteSetting::first()->title : 'laravel' !!} | @yield('title')</title>
	<link rel="stylesheet" type="text/css" href="/css/main.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script type="text/javascript" src="/js/main.js"></script>



</head>
<body>
	@include('Admin.shared.header')
	@include('Admin.shared.sidebar')
	@yield('content')
	@yield('script')
	
	<!-- 	@include('Admin.shared.footer') -->

</body>

</html>