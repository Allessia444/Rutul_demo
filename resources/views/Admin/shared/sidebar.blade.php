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
						<span class="badge badge-pill badge-light ">{!! App\User::where('role','=','user')->count() !!}</span>
					</a>
				</li>
				<li>
					<a href="{{route('designations.index')}}" class="dropdown-toggle no-arrow">
						<span class="fa fa-clone"></span><span class="mtext">Designation</span>
						<span class="badge badge-pill badge-light">{!! App\Designation::count() !!}</span>
					</a>
				</li>
				<li>
					<a href="{{route('departments.index')}}" class="dropdown-toggle no-arrow">
						<span class="fa fa-sitemap"></span><span class="mtext">Department</span>
						<span class="badge badge-pill badge-light">{!! App\Department::count() !!}</span>
					</a>
				</li>
				<li>
					<a href="{{route('industries.index')}}" class="dropdown-toggle no-arrow">
						<span class="fa fa-desktop"></span><span class="mtext">Industry</span>
						<span class="badge badge-pill badge-light">{!! App\Industry::count() !!}</span>
					</a>
				</li>
				<li>
					<a href="{{route('task_categories.index')}}" class="dropdown-toggle no-arrow">
						<span class="fa fa-map-o"></span><span class="mtext">TaskCategory</span>
						<span class="badge badge-pill badge-light">{!! App\TaskCategory::count() !!}</span>
					</a>
				</li>
				<li>
					<a href="{{route('projects.index')}}" class="dropdown-toggle no-arrow">
						<span class="fa fa-sitemap"></span><span class="mtext">Project</span>
						<span class="badge badge-pill badge-light">{!! App\Project::count() !!}</span>
					</a>
				</li>
				<li>
					<a href="{{route('project_categories.index')}}" class="dropdown-toggle no-arrow">
						<span class="fa fa-list"></span><span class="mtext">Project Category</span>
						<span class="badge badge-pill badge-light">{!! App\ProjectCategory::count() !!}</span>
					</a>
				</li>
				<li>
					<a href="{{route('clients.index')}}" class="dropdown-toggle no-arrow">
						<span class="fa fa-sitemap"></span><span class="mtext">Client</span>
						<span class="badge badge-pill badge-light">{!! App\Client::count() !!}</span>
					</a>
				</li>
				<li>
					<a href="{{route('blogs.index')}}" class="dropdown-toggle no-arrow">
						<span class="fa fa-sitemap"></span><span class="mtext">Blog</span>
						<span class="badge badge-pill badge-light">{!! App\Blog::count() !!}</span>
					</a>
				</li>
				<li>
					<a href="{{route('blog_categories.index')}}" class="dropdown-toggle no-arrow">
						<span class="fa fa-map-o"></span><span class="mtext">Blog Category</span>
						<span class="badge badge-pill badge-light">{!! App\BlogCategory::count() !!}</span>
					</a>
				</li>
				<li>
					<a href="{{ route('color') }}" class="dropdown-toggle no-arrow">
						<span class="fa fa-map-o"></span><span class="mtext">Color</span>
					</a>
				</li>
				<li>
					<a href="{{ route('background_color') }}" class="dropdown-toggle no-arrow">
						<span class="fa fa-map-o"></span><span class="mtext">Background Color</span>
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
						<span class="badge badge-pill badge-light">{!! App\Blog::where('user_id',Auth::user()->id)->count() !!}</span>
					</a>
				</li>
				<li>
					<a href="{{route('tasks.index')}}" class="dropdown-toggle no-arrow">
						<span class="fa fa-map-o"></span><span class="mtext">Task</span>
						<span class="badge badge-pill badge-light">{!! App\Task::where('user_id',Auth::user()->id)->count() !!}</span>
					</a>
				</li>
			</ul>
			
		@endif
		</div>
	</div>
</div>

