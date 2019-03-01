
<select id="tasks">
	<option>plz Select</option>
	@foreach($tasks as $key => $value)
	<option value="{!! route('get-task-details',$key) !!}">{!! $value !!}</option>
	@endforeach
</select>
