<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
	<link rel="stylesheet" type="text/css" href="/css/main.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script type="text/javascript" src="/js/main.js"></script>

</head>
<body>
	
	
	@include('Admin.shared.header')
	@include('Admin.shared.sidebar')
	@include('Admin.shared.footer')


	@yield('content')
	@yield('script')

	
</body>
</html>