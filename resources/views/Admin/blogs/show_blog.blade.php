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
		</div>
	</div>
</li>	
@endforeach
</ul>