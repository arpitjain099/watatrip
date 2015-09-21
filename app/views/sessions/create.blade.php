@extends('users.layouts.default')

@section('content')

<h1> Login </h1>

<div class = "col-md-4">
{{Form::open(array('route' => 'sessions.store')) }}


	{{Form::label('email','Email')}}
	{{Form::text('email','',array('class' => 'form-control'))}}
	
	{{Form::label('password','Password')}}
	{{Form::password('password',array('class' => 'form-control'))}}
	
<br>
	{{Form::submit('Submit',array('class' => 'btn btn-danger'))}}

{{Form::close()}}
</div>

@stop
