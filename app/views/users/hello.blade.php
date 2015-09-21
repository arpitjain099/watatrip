@extends('users.layouts.default')

@section('header')
<script>
$(function(){
	$("#h1").click(function(){
		$("li").hide(1000);
	});

	$("#s1").click(function(){
		$("li").show(1000);	
	});

	$('#g1').click(function(){
		alert("Page Title" + $("h1").text());
	});

	$("#s1").click(function(){
		$("#head1").hide();
	});

	$("#ola").click(function(){
		$("#div1").load("app/views/users/demo_test.txt");
	});
});

</script>

@stop

@section('content')
	

<h1 id="head1"> List of Flights</h1>
<h2>  </h2>
<br/>
@foreach ($flights as $flight)

<li> {{ $flight->airline.": ".$flight->from1." - ".$flight->to1 }} </li>

@endforeach
<div id="div1"></div>
<i class="icon-calendar"></i>


<!-- {{ Form::open(array('url' => '/flights')); }} -->

<button id="h1"> Hide </button>
<button id="s1"> Show </button>
<button id="g1"> Get </button>
<button id="s1"> Set </button>
<button id="ola"> Ola! </button>
<!-- {{Form::close()}} -->




@stop