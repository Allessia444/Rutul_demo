@extends('Admin.layouts.index')
@section('title','Task Details')
@section('content')
<style type="text/css">

</style>
<div class="main-container">
	<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
		<div class="min-height-200px">

			<div>
				<select>
					<option>plz Select</option>
					@foreach( $task_categories as $key => $value )
					<option value="{!! route('get-task',$key) !!}">{{ $value }}</option>
					@endforeach
				</select>
			</div>

			<div id="task"></div>

			<div id="task-display"></div>

		</div>
	</div>
</div>
@endsection
@section('script')

<script>
	$(document).ready(function(){

		$("select").change(function(){

				var url = $("select").val();
				// alert(url);

				$.get(url, function(data){
					console.log(data);
					$("#task").html("");
					$("#task").append(data);
				});

			});
		});
	
		$(document).on('change','#tasks', function(){

			var url1 = $("#tasks").val();
			// alert(url1);

			$.get(url1, function(data){
				console.log(data);
				$("#task-display").html("");
				$("#task-display").append(data);
			});

		});
	</script>
	@endsection
