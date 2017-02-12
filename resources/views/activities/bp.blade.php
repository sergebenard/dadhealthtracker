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
Enter a New Blood Pressure Reading
@stop

@section('content')

<h1>Enter a New Blood Pressure Reading</h1>

<form method="POST" action="/bp">
	{{ csrf_field() }}
	<div class="form-group">
		<div class="input-group">
			<input max="3" maxlength="3" class="form-control" name="amount1"
				aria-describedby="bp-systolic" placeholder="Enter systolic" autocomplete="off">
			<span class="input-group-addon" id="bp-systolic">Systolic</span>
		</div>
		<div class="input-group">
			<input max="3" maxlength="3" class="form-control" name="amount2"
				aria-describedby="bp-dystolic" placeholder="Enter dystolic" autocomplete="off">
			<span class="input-group-addon" id="bp-dystolic">Dystolic</span>
		</div>
		<div class="input-group">
			<input class="form-control" width="5" name="saved_at"
				aria-describedby="input-addon" id="datePicker" autocomplete="off">
			<span class="input-group-addon" id="input-addon">Date</span>
		</div>
		
		<button type="submit" class="btn btn-primary">Add Output</button><a href="/" class="btn btn-default pull-right">Cancel</a>
	</div>
</form>

@stop