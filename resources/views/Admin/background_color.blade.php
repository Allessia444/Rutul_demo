@extends('Admin.layouts.index')
@section('content')
<style type="text/css">

</style>
<div class="main-container">
	<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
		<div class="min-height-200px">
			<h1>25/02/2019</h1>

			<h1>Give div's all element selected background.</h1>

			<select>
				<option value="orange">Orange</option>
				<option value="pink">Pink</option>
				<option value="blue">Blue</option>
			</select>

			<div>
				<p>Hello</p>
				<p>How are you ?</p>
			</div>

			<div></div>

		</div>
	</div>
</div>
@endsection
@section('script')

<script>
	$(document).ready(function(){

		$("select").change(function(){

		
			var value=$("select").val();
			alert(value);
			$("p").css("background",value);

			$("p:last").parent().next().append("<p>"+ value +  " color applied </p>");

			setTimeout(function(){ 
				window.location.reload(); 
			}, 3000);

		});

		
	});
</script>
@endsection