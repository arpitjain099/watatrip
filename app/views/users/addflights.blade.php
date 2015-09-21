@extends('users.layouts.default')

@section('content')

<h1> Add Flights</h1>
<br/>

{{ Form::open(array('url' => '/storeflights')); }}
	<div>
		{{ Form::label('airline', 'Airline '); }}
		{{ Form::text('airline','',array('class' => 'form-control')); }}
	</div>

	<div>
		{{ Form::label('from1', 'From '); }}
		{{ Form::text('from1','',array('class' => 'form-control')); }}
	</div>

	<div>
		{{ Form::label('to1', 'To '); }}
		{{ Form::text('to1','',array('class' => 'form-control')); }}
	</div>

	<div>
		{{ Form::label('flightno', 'Flight No. '); }}
		{{ Form::text('flightno','',array('class' => 'form-control')); }}
	</div>

	<div>
		{{ Form::label('deptime', 'Dep. Time '); }}
		{{ Form::text('deptime','',array('class' => 'form-control')); }}
	</div>

	<div>
		{{ Form::label('arrtime', 'Arr. Time '); }}
		{{ Form::text('arrtime','',array('class' => 'form-control')); }}
	</div>

	<div>
		{{ Form::label('duration', 'Duration '); }}
		{{ Form::text('duration','',array('class' => 'form-control')); }}
	</div>

	<div> <br> {{ Form::submit('Submit',array('class' => 'btn btn-danger')); }}
	</div>

{{ Form::close(); }}


@stop