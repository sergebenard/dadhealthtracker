@extends('layout')

@section('head')
<link rel="stylesheet" href="/css/bootstrap-datepicker.standalone.css">
@stop

@section('footerScripts')
<script src="/js/bootstrap-datepicker.min.js"></script>
<script>

function setSelect() {
	switch ( $('#typePicker option:selected').val() ) {
		case 'bp':
			$('#amount2-group').show();
			changeAddonText(
				'systolic',
				'Enter systolic value here',
				'distolic',
				'Enter dystolic value here' );
		break;
		case 'input':
			$('#amount2-group').hide();
			changeAddonText('ml', 'How much did you drink, in milliliters');
		break;
		case 'output':
			$('#amount2-group').hide();
			changeAddonText('ml', 'How much did you expel, in milliliters');
		break;
	}
}

function changeAddonText( amount1, placeholder1, amount2 = null, placeholder2 = null ) {
	$('#amount1-addon').text( amount1 );
	$('#amount1').attr('placeholder', placeholder1);
	$('#amount2-addon').text( amount2 );
	$('#amount2').attr('placeholder', placeholder2);

}
$('#datePicker').datepicker({
	maxViewMode: 2,
    todayBtn: "linked",
    autoclose: true,
    todayHighlight: true
});

$('#typePicker').change(function(){
	setSelect( );
});

$(document).ready( function(){
	setSelect()
})


</script>
@stop

@section('pageTitle')
Edit Entry
@stop

@section('content')

<h1>Make Changes to Activity</h1>

<form method="POST" action="/edit/{{ $activity['id'] }}">
	{{ csrf_field() }}
	{{ method_field('patch') }}
	<div class="form-group">

		<select class="form-control" name="type" id="typePicker">
		    <option value="input"@if('input' == $activity['type']) selected @endif>Water Input</option>
		    <option value="output"@if('output' == $activity['type']) selected @endif>Water Output</option>
		    <option value="bp"@if('bp' == $activity['type']) selected @endif>Blood Pressure</option>
		</select>
		<div class="input-group">
			<input max="3" maxlength="3" class="form-control" name="amount1" id="amount1" 
				aria-describedby="amount1-addon" placeholder="" value="{{ $activity['amount1'] }}" autocomplete="off">
			<span class="input-group-addon" id="amount1-addon"></span>
		</div>
		<div class="input-group" id="amount2-group">
			<input max="3" maxlength="3" class="form-control" name="amount2" id="amount2"
				aria-describedby="amount2-addon" placeholder="" value="{{ $activity['amount2'] }}" autocomplete="off">
			<span class="input-group-addon" id="amount2-addon"></span>
		</div>
		<textarea class="form-control" name="notes" placeholder="Enter your notes here">{{ $activity['notes'] }}</textarea>
		<div class="input-group">
			<input class="form-control" width="5" name="saved_at" aria-describedby="date-addon" id="datePicker"
				value="{{ date( 'm/d/Y', strtotime( $activity['saved_at'] ))}}" autocomplete="off">
			<span class="input-group-addon" id="date-addon">Date</span>
		</div>
		
		<button type="submit" class="btn btn-primary">Save Changes</button><a href="/" class="btn btn-default pull-right">Cancel</a>
	</div>
</form>

@stop