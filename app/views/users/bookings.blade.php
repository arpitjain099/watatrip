@extends('users.layouts.default_next')


@section('content')
<div class="container">
        <div class="row">
          <!-- Start Header Text -->
          <div class="col-md-2 col-sm-2">
         <img src="/front/img/ad2.png">

         </div>

          <div class="col-md-10 col-sm-10">	
	<h3> Book Tickets </h3>
<br>

{{ Form::open(array('url' => '/confirm')); }}
<?php $flight = Flights::where('flightno','=', $booking->flightno)->get(); ?> 
<h4> Flight Details</h4>

<table class="table table-hover"><tr><strong><th>Airline</th><th>From</th><th>To</th><th> Flight No.</th><th> Date</th><th>Dep Time</th><th>Arr. Time</th>
<th> Retail Price</th><th> WAT No.</th><th>WAT Price</th><th></th></strong></tr>
<tr class="success">
<td> {{ $flight->first()->airline}}</td>
<td> {{ $flight->first()->from1}}</td>
<td> {{ $flight->first()->to1}}</td>
<td> {{ $booking->flightno}} </td>
<td> {{ $booking->date1}} </td>
<td> {{ $flight->first()->deptime}}</td>
<td> {{ $flight->first()->arrtime}}</td>
<td> {{ $booking->retailprice}}</td>
<td> {{ $booking->watno}}</td> 
<td> {{ $booking->bid}}</td>
</tr>
</table>
<br>

<table>
<tr class="form-group">
<td width="8%"> {{Form::label('title','Title')}} {{Form::text('title','',array('class' => 'form-control'))}} </td>
<td width="2%"></td>
<!--<td width="25%"> {{Form::label('pname','Passenger Name')}} {{Form::text('pname','',array('class' => 'form-control'))}} </td>
<td width="5%"></td>-->

<td width="10%"> {{Form::label('pfname','First Name')}} {{Form::text('pfname','',array('class' => 'form-control'))}} </td>
<td width="5%"></td>
<td width="10%"> {{Form::label('plname','Last Name')}} {{Form::text('plname','',array('class' => 'form-control'))}} </td>
<td width="5%"></td>

<td width="25%"> {{Form::label('pemail','Email')}} {{Form::text('pemail','',array('class' => 'form-control'))}} </td>
<td width="45%"></td>
{{Form::hidden('tid',$booking->tid)}}
</tr>
<tr class="form-group" rowspan="2" height="15px"></tr>
<tr class="form-group">
<td colspan="3"> {{Form::label('paddress','Address')}} {{Form::text('paddress','',array('class' => 'form-control'))}} </td>
<td colspan="1"></td>
<td> {{Form::label('pphone','Phone')}} {{Form::text('pphone','',array('class' => 'form-control'))}} </td>
<td></td>
</tr>
  
<tr class="form-group" rowspan="2" height="20px">

  </tr>
  

<tr class="form-group"><td colspan="3"> {{Form::submit('Confirm Booking',array('class'=>'btn btn-danger'))}} </td>
<td colspan="3"></td>
</tr>


 {{ Form::close() }}



</table>
</div>

@stop
