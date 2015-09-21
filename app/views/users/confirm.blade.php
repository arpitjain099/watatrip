@extends('users.layouts.default_next')

@section('content')

<div class="container">
        <div class="row">
          <!-- Start Header Text -->
          <div class="col-md-2 col-sm-2">
         <img src="/front/img/ad111.png">

         </div>

          <div class="col-md-10 col-sm-10">	

<h2> WAT Booked</h1> <h3> ID - {{$bookings->tid}} </h2>


<?php $flight = Flights::where('flightno','=',$bookings->flightno)->firstorfail(); ?>

<table class="table table-striped">
<tr>
<td> Airline: {{$flight->airline}}</td> <td> Flight Number: {{$flight->flightno}} </td> 
</tr>
<tr>
    <td> Name: {{$bookings->pfname}}&nbsp;{{$bookings->plname}} </td> <td> Date: {{$bookings->date1}} </td>
</tr>
<tr>
<td> From: {{$flight->from1}} </td> <td> To: {{$flight->to1}} </td>
</tr>
<tr>
<td> Departure: {{$flight->deptime}} </td> <td> Arrival: {{$flight->arrtime}} </td>
</tr>
<tr>
<td> WAT No: {{$bookings->watno}} </td> <td> WAT Price: {{$bookings->watprice}} </td>
</tr>
</table>

<i class="icon-search"></i>

</div>

@stop