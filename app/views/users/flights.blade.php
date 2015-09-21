@extends('users.layouts.default_next')

@section('content')
<div class="container">
        <div class="row">
          <!-- Start Header Text -->
          <div class="col-md-2 col-sm-2">
         <img src="/front/img/ad111.png">

         </div>

          <div class="col-md-10 col-sm-10">
<h4> {{$flights->first()->from1}} - {{$flights->first()->to1}} </h4>
 <h5> {{ date("d F Y",strtotime($date1))}}  </h5>

<table class="table table-hover" data-sort-name="name" data-sort-order="desc"><tr><th>Airline</th><th>Dep Time</th><th>Arr. Time</th>
<th> Retail Price</th><th> WAT No.</th><th>Chances</th><th data-sortable="true">WAT Price</th><th></th></tr>

<?php $fdetail = new Fdetails(); ?>

@foreach ($flights as $flight)
{{ Form::open(array('url' => '/bookings')); }}
<?php $fdetail = Fdetails::where('flightno','=', $flight->flightno)->where('date1','=',$date1)->get();
if(!empty($fdetail) && count($fdetail)> 0) {
?>



<tr>
<td> {{ $flight->airline}} {{ Form::hidden('airline',$flight->airline)}} <p> {{ $flight->flightno}} {{ Form::hidden('flightno',$flight->flightno)}} </p>
{{ Form::hidden('from1',$flight->from1)}} {{ Form::hidden('to1',$flight->to1)}} {{ Form::hidden('date1',$date1)}}

</td>



<td> {{ $flight->deptime}}</td>
<td> {{ $flight->arrtime}}</td>
<td> {{ $fdetail->first()->retailprice}} {{ Form::hidden('retailprice',$fdetail->first()->retailprice)}}</td>
<td> {{ $fdetail->first()->watno}} {{ Form::hidden('watno',$fdetail->first()->watno)}}</td> 
<td> {{ max(96-$fdetail->first()->watno,20)}}%</td>

<td> <h2>{{ round($fdetail->first()->watprice())}} {{ Form::hidden('watprice',round($fdetail->first()->watprice()))}}</h2></td> 
<td> {{ Form::submit('Book',array('class'=>'btn btn-small btn-primary')) }} </td>
</tr>
<?php } ?>

 {{ Form::close() }}
@endforeach


</table>

</div>


@stop