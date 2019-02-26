@extends('Admin.layouts.index')
@section('content')
<style type="text/css">
.highlight {
	background-color: orange;
}
</style>
<div class="main-container">
	<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
		<div class="min-height-200px">
			<div id="me">Please give me some orange colour.</div>
			<div class="section-div">Please give me some orange colour.</div>
			<ul>
				<li>Please give me some orange colour.</li>
				<li>Rutul</li>
				<li></li>
				<li>Please give me some orange colour.</li>
				<li></li>
				<li>Please give me some orange colour.</li>
			</ul>
			<section>
				<p>Treacherous HTML ahead!</p>

				<div id="section-div">
					----- Please give me some orange colour. -----
				</div>

				<div></div>

				<div>----- Please give me some orange colour. -----</div>
			</section>

			<section>

				<p>Can you make this span orange too? <span>----- Please give me some orange -----colour.</span></p>
				<p>But not <span>this one!</span></p>

				<div></div>

				<p>Yes, I know, HTML can be mean sometimes. But it is not on purpose! 
					<span>Or is <i>it?</i> <i>----- Please give me some orange colour.</i></span></p> -----

					<div><div>----- Please give me some orange colour. -----</div></div>
				</section>
			</div>
		</div>
	</div>
	@endsection
	@section('script')
	
	<script>
		$(document).ready(function(){

			$("#me").addClass( "highlight" );
			$(".section-div").addClass( "highlight" );
			$('.main-container').find('ul').addClass( "rutul" );
			$('.main-container').find('ul li:first').addClass( "highlight" );
			$('.rutul').closest('li').addClass("highlight");
			$('.rutul li:last-child').addClass( "highlight" );
			$('.rutul li:nth-child(4)').addClass( "highlight" );
			$('#section-div').addClass( "highlight" );
			$('section:first').find('div:last').addClass( "highlight" );

			$('section:last').find('p:first').find('span').addClass( "highlight" );
			$('section:last').find('div:last').addClass( "highlight" );

			$('section').find('p span > i:last').addClass('highlight');

			$('section:last').addClass('last');
			



		});
	</script>
	@endsection