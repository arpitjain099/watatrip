@extends('layouts.admin_default')

@section('content')
	
<h3> Following Tickets have been approved</h3>

<table class = "table table-hover">
<tr><th> ID </th> <th> Flight No </th> <th> Date </th> <th> From </th> <th> To </th> <th> WAT Price </th> </tr>

@foreach ($aids as $aid)

<?php 

$booking = Bookings::where('tid','=',$aid)->firstorfail();

?>



<tr><td> {{$aid}} </td> <td> {{$booking->flightno}} </td> <td> {{$booking->date1}} </td> <td> {{$booking->from1}} </td> <td> {{$booking->to1}} </td> <td> {{$booking->watprice}} </td> </tr>


@endforeach

@stop
