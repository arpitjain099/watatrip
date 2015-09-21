@extends('layouts.admin_default')

@section('content')

<section class="content">

    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3>
                        {{ $booking_detail_count ? $booking_detail_count : 0 }}

                    </h3>
                    <p>
                        Bookings today
                    </p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="search?airline={{ Session::get('airline_name') }}&datepicker1=<?php echo date('Y-m-d') ?>&caseid=3" class="small-box-footer">
                    More info <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div><!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>
                        {{ $today_expiry_count ? $today_expiry_count : 0 }}
                    </h3>
                    <p>
                        Expiring today
                    </p>
                </div>
                <div class="icon">
                    <i class="ion ion-asterisk"></i>
                </div>
                <a href="browse?datepicker=<?php echo date("Y-m-d", strtotime("tomorrow")) ?>" class="small-box-footer">
                    More info <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div><!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3>
                        {{ $today_revenue ? $today_revenue : 0 }}

                    </h3>
                    <p>
                        Revenues today
                    </p>
                </div>
                <div class="icon">
                    <i class="ion ion-pin"></i>
                </div>
                <a href="search?airline={{ Session::get('airline_name') }}&datepicker1=<?php echo date('Y-m-d') ?>&caseid=3" class="small-box-footer">
                    More info <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div><!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
                <div class="inner">
                    <h3>
                        {{ $revenu_expiring_count ? $revenu_expiring_count : 0 }}
                    </h3>
                    <p>
                        Revenues expiring 
                    </p>
                </div>
                <div class="icon">
                    <i class="ion ion-load-c"></i>
                </div>
                <a href="browse?datepicker=<?php echo date("Y-m-d", strtotime("tomorrow")) ?>" class="small-box-footer">
                    More info <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div><!-- ./col -->
    </div><!-- /.row -->


    <div class="row">
        <h3> Booking Statistics </h3>
        <form class="form-horizontal">
            <fieldset>
                <div class="input-prepend">
                    <span class="add-on"><i class="icon-calendar"></i></span><input name="range" id="range" type="text">
                </div>
            </fieldset>
        </form>
        <br>

        <div id="placeholder" style="width: 1070px; height: 280px;">
            <figure id="chart" style="width: 1050px; height: 250px;"></figure>
        </div>

    </div>
</section>

<section class="content">
    <div class ="row">
        <div class="box" style="width:98%">
            <div >
                <h3 class="box-title">Most Active Flights</h3>
            </div>
            <div class="box-body">
                <div id="example2_wrapper" class="dataTables_wrapper form-inline" role="grid">
                    <div class="row">
                        
                <?php
                $airline_name = Session::get('airline_name');
                $airFlights = Flights::where('airline', '=', $airline_name)->get();

                foreach ($airFlights as $airFlight) {

                    $airBookings = Bookings::where('airline', '=', $airFlight->airline)->where('flightno', '=', $airFlight->flightno)->count();
                    $stats[$airFlight->flightno] = $airBookings;
                }
                arsort($stats);
                ?>

        <table id="example2" class="table table-bordered table-hover dataTable" aria-describedby="example2_info">

            <tr><th> Flight No. </th> 
                <th> From </th>
                <th> To </th>
                <th> Number of Bookings </th>
                @foreach ($stats as $key => $value)

                @if ($value<>0)

            <tr><td> {{ $key }} </td> 

                <td> <?php $flight1 = Flights::where('flightno', '=', $key)->firstorfail() ?> {{$flight1->from1}}</td>

                <td> {{$flight1->to1}} </td>
                <td> {{ $value }}</td> </tr> 

            @endif

            @endforeach

        </table>


                    </div>
                </div>
            </div>
        </div>
    </div>
        
</section>

  @stop

