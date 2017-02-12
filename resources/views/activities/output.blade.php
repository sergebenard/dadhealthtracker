@extends('layout')

@section('head')
<link rel="stylesheet" href="/css/bootstrap-datepicker.standalone.css">
@stop

@section('footerScripts')
<script src="/js/bootstrap-datepicker.min.js"></script>
<script>
$('#datePicker').datepicker({
	maxViewMode: 2,
    todayBtn: "linked",
    autoclose: true,
    todayHighlight: true
});
</script>
@stop

@section('pageTitle')
Enter a New Water Output Entry
@stop

@section('content')

<h1>Enter a New Water Output Entry</h1>

<form method="POST" action="/output">
	{{ csrf_field() }}
	<div class="form-group">
		<div class="input-group">
			<input max="3" maxlength="3" class="form-control" name="amount1"
				placeholder="How much did you expel, in milliliters" aria-describedby="input-addon" autocomplete="off">
			<span class="input-group-addon" id="input-addon">ml</span>
		</div>
		<textarea name="notes" class="form-control" placeholder="Enter notes here."></textarea>
		
		<div class="input-group">
			<input max="3" maxlength="3" class="form-control" name="saved_at"
				aria-describedby="input-addon" id="datePicker" autocomplete="off">
			<span class="input-group-addon" id="input-addon">Date</span>
		</div>
		
		<button type="submit" class="btn btn-primary">Add Output</button><a href="/" class="btn btn-default pull-right">Cancel</a>
	</div>
</form>

@stop