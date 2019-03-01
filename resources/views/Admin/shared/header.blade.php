<div class="pre-loader"></div>
<div class="header clearfix">
	<div class="header-right">

		<div class="menu-icon">
			<span></span>
			<span></span>
			<span></span>
			<span></span>
		</div>
		<div class="user-info-dropdown">
			<div class="dropdown">
				<a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
					<span class="user-icon"><i class="fa fa-user-o"></i></span>
					<span class="user-name">{!! Auth::user()->fname !!}</span>
				</a>
				<div class="dropdown-menu dropdown-menu-right">
					<a class="dropdown-item" href="{!! route('users.my_profile') !!}"><i class="fa fa-user-md" aria-hidden="true"></i>Profile</a>
					<a class="dropdown-item" href="{!! route('site_setting.edit') !!}"><i class="fa fa-cog" aria-hidden="true"></i>Site Setting</a>
					<a class="dropdown-item" href="faq.php"><i class="fa fa-question" aria-hidden="true"></i> Help</a>
					<a class="dropdown-item" href="{{Route('logout')}}" onclick="event.preventDefault();
					document.getElementById('logout-form').submit();" class="dropdown-item">
					Logout
				</a>
				<form id="logout-form" action="{{Route('logout')}}" method="POST" style="display: none;">
					@csrf
				</form>
			</div>
		</div>
	</div>
	<div class="user-notification">
		<div class="dropdown">
			<a class="dropdown-toggle no-arrow" href="#" role="button" data-toggle="dropdown">
				<i class="fa fa-bell" aria-hidden="true"></i>
				<span class="badge notification-active"></span>
			</a>
		</div>
	</div>
</div>
</div>
