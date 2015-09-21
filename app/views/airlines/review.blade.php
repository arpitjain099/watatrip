@extends('layouts.admin_default')

@section('content')

<h1> Search Bookings</h1>
<br/>

 <?php $airlines = Airlines::lists('aname', 'aname'); ?>
<div class="row">
		<div class="col-md-4 tabbable">
			<ul class="nav nav-tabs">
			    <li class="active"><a href="#tab1" data-toggle="tab">Search</a></li>
			    <li><a href="#tab2" data-toggle="tab">By Flight No.</a></li>
			    <li><a href="#tab3" data-toggle="tab">By Booking Date</a></li>
			   
			 </ul>

		  <div class="tab-content">
			    <div class="tab-pane active" id="tab1">

					<br>
					{{ Form::open(array('url' => '/airlines/search', 'method' => 'get')); }}
						
						<div>
							{{ Form::label('airline', 'Airline '); }}
                            {{ Form::text('airline', Session::get('airline_name') ,array('class' => 'form-control','width' => '40%')); }}
							<!--{{ Form::select('airline',$airlines,'',array('class' => 'form-control')); }}-->
						</div>

						<div>
							{{ Form::label('from1', 'From'); }}
							{{ Form::text('from1','',array('class' => 'form-control','width' => '40%')); }}

							{{ Form::label('to1', 'To'); }}
							{{ Form::text('to1','',array('class' => 'form-control', 'width' => '40%')); }}
						</div>

						<div>
							{{ Form::label('date1', 'Date'); }}
							{{ Form::text( 'datepicker', '', array(
							    'id' => 'datepicker',
							    'class' => 'form-control',
							    'placeholder' => 'Enter Date',
							        
							) ) }}
						</div>

						<br>
					{{Form::hidden('caseid','1')}}	
					{{ Form::submit('Search',array('class' => 'btn btn-danger')) }}
					{{ Form::close(); }}

				</div>

			<div class="tab-pane" id="tab2">
		      	<br>
					{{ Form::open(array('url' => '/airlines/search', 'method' => 'get')); }}
						
						<div>
							{{ Form::label('airline', 'Airline '); }}
                            {{ Form::text('airline', Session::get('airline_name') ,array('class' => 'form-control','width' => '40%')); }}
							<!--{{ Form::select('airline',$airlines,'',array('class' => 'form-control')); }}-->
						</div>

						<div>
							{{ Form::label('flightno', 'Flight No.'); }}
							{{ Form::text('flightno','',array('class' => 'form-control','width' => '40%')); }}

						</div>

						<br>
					{{Form::hidden('caseid','2')}}	
					{{ Form::submit('Search',array('class' => 'btn btn-danger')) }}
					{{ Form::close(); }}
		    </div>

		    <div class="tab-pane" id="tab3">
			      <br>
					{{ Form::open(array('url' => '/airlines/search', 'method' => 'get')); }}
						
						<div>
							{{ Form::label('airline', 'Airline '); }}
                            {{ Form::text('airline', Session::get('airline_name') ,array('class' => 'form-control','width' => '40%')); }}
							<!--{{ Form::select('airline',$airlines,'',array('class' => 'form-control')); }}-->
						</div>

						<div>
							{{ Form::label('date1', 'Date'); }}
							{{ Form::text( 'datepicker1', '', array(
							    'id' => 'datepicker1',
							    'class' => 'form-control',
							    'placeholder' => 'Enter Date',
							        
							) ) }}
						</div>
						<br>

					{{Form::hidden('caseid','3')}}	
					{{ Form::submit('Search',array('class' => 'btn btn-danger')) }}
					{{ Form::close(); }}


						<br>
			 </div>

		 </div>
	</div>
	
	@if (empty($_GET)) 
	<div class="col-md-8">
	<h3>Nada!</h3></div>
	@else
	<div class="col-md-8">

		<h4> List of Bookings</h4>
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-aqua">
                    <div class="inner">
                    <strong>
                       {{ $vacantseats}}
                     </strong>
                    <p>
                        Vacant Seats 
                    </p>
                </div>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-green">
                     <div class="inner">
                    <strong>
                       {{ $retailprice }}
                    </strong>
                    <p>
                        Retail Price
                    </p>
                </div>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-yellow">
                     <div class="inner">
                    <strong>
                        {{ $watno }}
                    </strong>
                    <p>
                        Total Wats Booked
                    </p>
                </div>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                 <div class="small-box bg-red">
                      <div class="inner">
                    <strong>
                        {{ $approved }}
                    </strong>
                    <p>
                        Total Approved
                    </p>
                </div>
                 </div>
            </div>
        
        
        
        </div>
        
		<div class="input-group"> <span class="input-group-addon">Filter</span>

		    <input id="filter" type="text" class="form-control" placeholder="Type here...">
		</div>

		<table class="table table-hover"><tr><th>From</th><th>To</th><th> Flight No.</th><th> Date</th>
		<th> Retail Price</th><th> WAT No.</th><th>WAT Price</th><th>Status</th><th>Approve</th></tr>

		{{ Form::open(array('url' => '/airlines/approve', 'method' => 'get')); }}

        <?php $i=1; ?>
		@foreach ($bookings as $booking)

		 <tbody class="searchable">
		<tr>

		<td> {{ $booking->from1}}</td>
		<td> {{ $booking->to1}}</td>
		<td> {{ $booking->flightno}} </td>
		<td> {{ $booking->date1}} </td>
		<td> {{ $booking->retailprice}} </td>
		<td> {{ $booking->watno}} </td> 
		<td> {{ $booking->watprice}} </td> 
		<td> {{ $booking->status}} </td> 
		<td> {{ Form::checkbox('aid'.$i,$booking->tid);}} </td> 
		<?php $i++; ?>
		</tr>
		</tbody>

		@endforeach


		</table>
		<p align="right">
		{{ Form::submit('Submit',array('class' => 'btn btn-danger')) }}
		</p>
		{{ Form::close(); }}


	</div>
		@endif

</div>


<script>
  $(function() {
    $( "#datepicker" ).datepicker({
      numberOfMonths: 2,
      showButtonPanel: true
    });
  });

 </script>
 <script>
  $(function() {
    $( "#datepicker1" ).datepicker({
      numberOfMonths: 2,
      showButtonPanel: true
    });
  });

 </script>
 
 

@stop