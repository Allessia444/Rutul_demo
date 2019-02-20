<div class="left-side-bar">
	<div class="brand-logo">
		<a href="{{Route('home')}}">
			<img src="/images/deskapp-logo.png" alt="">
		</a>
	</div>
	<div class="menu-block customscroll">
		<div class="sidebar-menu">
		
			@if(Auth::user()->role == "admin")
			
			<ul id="accordion-menu">
				<li>
					<a href="{{route('users.index')}}" class="dropdown-toggle no-arrow">
						<span class="fa fa-user"></span><span class="mtext">User</span>
					</a>
				</li>
				<li>
					<a href="{{route('designations.index')}}" class="dropdown-toggle no-arrow">
						<span class="fa fa-clone"></span><span class="mtext">Designation</span>
					</a>
				</li>
				<li>
					<a href="{{route('departments.index')}}" class="dropdown-toggle no-arrow">
						<span class="fa fa-sitemap"></span><span class="mtext">Department</span>
					</a>
				</li>
				<li>
					<a href="{{route('industries.index')}}" class="dropdown-toggle no-arrow">
						<span class="fa fa-desktop"></span><span class="mtext">Industry</span>
					</a>
				</li>
				<li>
					<a href="{{route('task_categories.index')}}" class="dropdown-toggle no-arrow">
						<span class="fa fa-map-o"></span><span class="mtext">TaskCategory</span>
					</a>
				</li>
				<li>
					<a href="{{route('projects.index')}}" class="dropdown-toggle no-arrow">
						<span class="fa fa-sitemap"></span><span class="mtext">Project</span>
					</a>
				</li>
				<li>
					<a href="{{route('project_categories.index')}}" class="dropdown-toggle no-arrow">
						<span class="fa fa-list"></span><span class="mtext">Project Category</span>
					</a>
				</li>
				<li>
					<a href="{{route('clients.index')}}" class="dropdown-toggle no-arrow">
						<span class="fa fa-sitemap"></span><span class="mtext">Client</span>
					</a>
				</li>
				<li>
					<a href="{{route('blogs.index')}}" class="dropdown-toggle no-arrow">
						<span class="fa fa-sitemap"></span><span class="mtext">Blog</span>
					</a>
				</li>
				<li>
					<a href="{{route('blog_categories.index')}}" class="dropdown-toggle no-arrow">
						<span class="fa fa-map-o"></span><span class="mtext">Blog Category</span>
					</a>
				</li>
			</ul>

			@else
			<ul>
				<li>
					<a href="{!! route('users.my_profile') !!}" class="dropdown-toggle no-arrow">
						<span class="fa fa-user"></span><span class="mtext">Edit Profile</span>
					</a>
				</li>
				<li>
					<a href="{!! route('blogs.user_blog') !!}" class="dropdown-toggle no-arrow">
						<span class="fa fa-user"></span><span class="mtext">Blog</span>
					</a>
				</li>
			</ul>
			
		@endif
		</div>
	</div>
</div>

