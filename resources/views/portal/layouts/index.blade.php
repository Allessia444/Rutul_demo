<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
	<link rel="stylesheet" type="text/css" href="/css/front.css">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script type="text/javascript" src="/js/front.js"></script>

</head>
<body>
	
	
	@include('portal.shared.header')
	@include('portal.shared.sidebar')
	@include('portal.shared.footer')


	@yield('content')
	

	
</body>
</html>