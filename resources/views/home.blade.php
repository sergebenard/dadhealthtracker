@extends('layout')

@section('pageTitle')
Welcome
@stop

@section('content')

@if (session('message'))
    <div class="alert alert-success alert-dismissable">
        {{ session('message') }}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger alert-dismissable">
        {{ session('error') }}
    </div>
@endif

<h1>Welcome</h1>

<div class="row">
	
	<div class="col-md-6">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Water Input</h3>
			</div> <!-- /.panel-heading -->
			<div class="panel-body">
				<ul class="list-group">
				@if ( count($inputsw) >= 1 )
					
					@foreach ($inputsw as $inputw)
						<li class="list-group-item">
							<a href="/activity/{{ $inputw->id }}">{{ $inputw->amount1 }}ml</a>
							
							<span class="pull-right" title="{{ $inputw->saved_at }}">{{ $inputw->saved_at->diffForHumans() }}</span>
						</li>
					@endforeach
					
						<li class="list-group-item">
							<a class="btn btn-default" href="/input/today">View Today's Inputs</a>
						</li>
				@else
					<li class="list-group-item list-group-item-warning">There are no activities to display.</li>
				@endif
				</ul>
			</div><!-- /.panel-body -->
			<div class="panel-footer">
				<form method="POST" action="/input">
					{{ csrf_field() }}
					<div class="form-group">
						<div class="input-group">
							<input max="5" maxlength="5" class="form-control" width="5" name="amount1"
								placeholder="How much did you drink, in milliliters" aria-describedby="input-addon" autocomplete="off">
							<span class="input-group-addon" id="input-addon">ml</span>
						</div>
						
						<button type="submit" class="btn btn-primary">Add Input</button><a href="/input" class="btn btn-default pull-right">Enter More Information</a>
					</div>
				</form>
			</div><!-- /.panel-footer -->
		</div><!-- /.panel panel-default -->
	</div><!-- /.col-md-6 -->

	<div class="col-md-6">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Water Output</h3>
			</div> <!-- /.panel-heading -->
			<div class="panel-body">
				<ul class="list-group">
				@if ( count($outputsw) >= 1 )
					
					@foreach ($outputsw as $outputw)
						<li class="list-group-item">
							<a href="/activity/{{ $outputw->id }}">{{ $outputw->amount1 }}ml</a>
							
							<span class="pull-right" title="{{ $outputw->saved_at }}">{{ $outputw->saved_at->diffForHumans() }}</span>
						</li>
					@endforeach
					
						<li class="list-group-item">
							<a class="btn btn-default" href="/output/today">View Today's Outputs</a>
						</li>
				@else
					<li class="list-group-item list-group-item-warning">There are no activities to display.</li>
				@endif
				</ul>
			</div><!-- /.panel-body -->
			<div class="panel-footer">
				<form method="POST" action="/output">
					{{ csrf_field() }}
					<div class="form-group">
						<div class="input-group">
							<input max="5" maxlength="5" class="form-control" name="amount1"
								placeholder="How much did you expel, in milliliters" aria-describedby="output-addon" autocomplete="off">
							<span class="input-group-addon" id="output-addon">ml</span>
						</div>
						<button type="submit" class="btn btn-primary">Add Output</button><a href="/output" class="btn btn-default pull-right">Enter More Information</a>
					</div>
				</form>
			</div><!-- /.panel-footer -->
		</div><!-- /.panel panel-default -->
	</div><!-- /.col-md-6 -->
</div> <!-- /.row -->

<div class="row">
	<div class="col-md-6">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">BP Reading</h3>
			</div> <!-- /.panel-heading -->
			<div class="panel-body">
				<ul class="list-group">
				@if ( count($bpsw) >= 1 )
					
					@foreach ($bpsw as $bpw)
						<li class="list-group-item">
							<a href="/activity/{{ $bpw->id }}">{{ $bpw->amount1 }} / {{ $bpw->amount2 }}</a>
							
							<span class="pull-right" title="{{ $bpw->saved_at }}">{{ $bpw->saved_at->diffForHumans() }}</span>
						</li>
					@endforeach
					
						<li class="list-group-item">
							<a class="btn btn-default" href="/bp/today">View Today's Readings</a>
						</li>
				@else
					<li class="list-group-item list-group-item-warning">There are no activities to display.</li>
				@endif
				</ul>
			</div><!-- /.panel-body -->
			<div class="panel-footer">
				<form method="POST" action="/bp">
					{{ csrf_field() }}
					<div class="form-group">
						<input max="3" maxlength="3" class="form-control" name="amount1" placeholder="Enter systolic" autocomplete="off">
						<input max="3" maxlength="3" class="form-control" name="amount2" placeholder="Enter distolic" autocomplete="off">
						<button type="submit" class="btn btn-primary">Add Reading</button><a href="/bp" class="btn btn-default pull-right">Enter More Information</a>
					</div>
				</form>
			</div><!-- /.panel-footer -->
		</div><!-- /.panel panel-default -->
		
	</div><!-- /.col-md-6 -->

</div> <!-- ./row -->
@stop