@extends('layouts.admin_default')
@section('header')
       
        <link href="../css/xcharts.min.css" rel="stylesheet">
        <link href="../css/style.css" rel="stylesheet">

        <!-- Include bootstrap css -->
        <link href="../css/daterangepicker.css" rel="stylesheet">
       <link href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.2.2/css/bootstrap.min.css" rel="stylesheet" /> 

@stop


@section('content')
 <div id="content">

            <form class="form-horizontal">
              <fieldset>
                <div class="input-prepend">
                  <span class="add-on"><i class="icon-calendar"></i></span>
                  <input type="text" name="range" id="range" />
                </div>
              </fieldset>
            </form>

            <div id="placeholder">
                <figure id="chart"></figure>
            </div>
            

        </div>

       

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>

    <!-- xcharts includes -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/d3/2.10.0/d3.v2.js"></script>
    <script src="../js/xcharts.min.js"></script>

    <!-- The daterange picker bootstrap plugin -->
    <script src="../js/sugar.min.js"></script>
    <script src="../js/daterangepicker.js"></script>

    <!-- Our main script file -->
    <script src="../js/script.js"></script>
   

@stop