<div class="clearfix">
	<div class="pull-left">
		<h4 class="text-blue">Update Blog</h4>
		<p class="mb-30 font-14"></p>
	</div>

</div>

{!! Former::open()->id('MyForm') !!}

@csrf

<input type="hidden" name="blog_id" id="blog-id" value="{!! $blog->id !!}">

{!!	Former::select('blog_category_id')->options($blog_category)->id('blog_cat') !!}

{!! Former::input('name')->class('form-control')->label('Blog name') !!}

{!! Former::textarea('description')->class('form-control')->label('Blog Description') !!}

<img src="{!! asset('/uploads/blog/'.$blog->photo) !!}"> 

<div id="container">
	<div id="previewDiv"></div>
	<input type="hidden" value="{!! $blog->photo !!}" name="photo" id="file">
	<a id="pickfiles" href="javascript:;">[Select files]</a> 
	<a id="uploadfiles" href="javascript:;">[Upload files]</a>
	<ul id="filelist"></ul>
</div>

<div class="form-group row">
	<label class="col-sm-12 col-md-2 col-form-label">Status</label>
	<div class="col-sm-12 col-md-10">
		<input  type="radio" name="status" {!! $blog->status ? '' : 'checked' !!} value="0">InActive
		<input  type="radio" name="status" {!! $blog->status ? 'checked' : '' !!} value="1">Active
	</div>
</div>

{!! Former::submit('btn_edit_blog')->class('btn btn-outline-success')->value('Save')->id('update-blog') !!}

{!! Former::close() !!}

