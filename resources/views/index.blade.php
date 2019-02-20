<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<a class="dropdown-item" href="{{Route('logout')}}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" class="dropdown-item">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{Route('logout')}}" method="POST" style="display: none;">
                                    	@csrf
                                    </form>

</body>
</html>