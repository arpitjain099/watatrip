@extends('users.layouts.default')

@section('header')

 <link rel="stylesheet" href="//code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script> 
  <link rel="stylesheet" href="/resources/demos/style.css"> 
  <script>
  $(function() {
    $( "#datepicker" ).datepicker({
      numberOfMonths: 2,
      showButtonPanel: true
    });
  });
</script>

@stop
 

 

@section('content')

<div class="row">

<div class="col-md-6 column">
<br><br><br>

{{ HTML::image('app/views/images/info.png') }}
</div>

<div class="col-md-5 column">
	<br><br>
	<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Search Flights</h3>
  </div>
  <div class="panel-body">
   
<table>
<tr><td>
<?php $cities = Cities::lists('city','city'); ?>


{{ Form::open(array('url' => '/flights')); }}
{{ Form::label('from1', 'From'); }}
{{ Form::text('from1','',array('class' => 'form-control','width' => '40%')); }} </td>

<td width="10%"></td>
<td>
{{ Form::label('to1', 'To'); }}
{{ Form::text('to1','',array('class' => 'form-control', 'width' => '40%')); }}

<!-- {{ Form::label('datepicker', 'Date'); }}
{{ Form::text('datepicker', '', 
array('class' => 'form-control','data-datepicker' => 'datepicker')) }} -->
</td></tr>
<tr><td colspan="3">
<br>

{{ Form::label('date1', 'Date'); }}
{{ Form::text( 'datepicker', '', array(
    'id' => 'datepicker',
    'class' => 'form-control',
    'placeholder' => 'Enter Date',
        'required' => true,
) ) }}

</td>
</tr>

<tr>
<td colspan="3"> 
<br>

{{ Form::submit('Search',array('class' => 'btn btn-danger')) }}
{{ Form::close(); }}
</td></tr></table>
</div>

<div class="col-md-1 column">
</div>

</div>

</div>

@stop
