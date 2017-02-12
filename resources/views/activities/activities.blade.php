@extends('layout')

@section('content')
	<h1>All Activities</h1>

	@foreach ($activities as $activity)
		<div>
			<a href="/activities/{{$activity->id}}">{{$activity->type}}</a>
		</div>
	@endforeach
@stop