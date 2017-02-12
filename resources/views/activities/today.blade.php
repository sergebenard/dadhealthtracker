@extends('layout')

@section('pageTitle')
View Activity Details
@stop

@section('footerScripts')
<script type="text/javascript">
	$( ".confirmDelete" ).click(function() {
  		return confirm( "Are you sure you want to delete this activity?" );
	});

	$( ".confirmEdit" ).click(function() {
  		return confirm( "Are you sure you want to edit this activity?\n\nChanging the date on activity entries may affect your treatment if entered incorrectly." );
	});
</script>
@stop

@section('content')
	<h1>View Today's Activity Details</h1>
	
	<div class="row">
		<div class="col-md-12">
		@if( count($activities) >= 1 )
			<table class="table">
				<tr>
					<th>Type</th>
					<th>@if( 'bp' == $activities[0]->type )
					BP Reading
					@else
					Water Amount
					@endif
					</th>
					<th>Notes</th>
					<th>Date</th>
					<th>Action</th>
				</tr>
				@foreach( $activities as $activity )
				<tr>
					<td>@if( 'bp' != $activity->type )
						Water {{ ucfirst( $activity->type ) }}
						@else
						Blood Pressure
						@endif
					</td>
					<td>{{ $activity['amount1'] }}
					@if( 'bp' != $activity->type )
						ml
					@else
					&nbsp;/&nbsp;{{ $activity['amount2'] }}
					@endif
					</td>
					<td title="{{ $activity['notes'] }}">{{ str_limit($activity['notes'], $limit = 20, $end = "...") }}</td>
					<td>{{ date('d/M/Y', strtotime( $activity['saved_at'] )) }}</td>
					<td>
						<a href="delete/{{ $activity['id'] }}" class="confirmDelete">Delete</a>&nbsp;|&nbsp;<a href="/edit/{{ $activity['id'] }}" class="confirmEdit">Edit</a>
					</td>
				</tr>
				@endforeach
			@else
				<tr>
					<td colspan="3">There are no activities today.</td>
				</tr>

			</table>
			@endif
		</div>
	</div>
@stop