<!doctype html>
<html lang="en">
<head>

	
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <!-- CSS are placed here -->
        {{ HTML::style('app/views/css/bootstrap.css') }}
        {{ HTML::style('app/views/css/bootstrap-theme.css') }}
          
            {{ HTML::style('app/views/font-awesome-4.1.0/css/font-awesome.min.css') }}

	<meta charset="UTF-8">
	<title>WATaTRIP.com - Airline Dashboard</title>

<style>
        @section('styles')
            body {
                padding-top: 60px;
            }
        @show
        </style>

        {{ HTML::script('app/views/js/jquery-1.11.1.min.js') }}
        {{ HTML::script('app/views/js/bootstrap.min.js') }}

@yield('header')
</head>

<body>

 <!-- Navbar -->
        <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <a class="navbar-brand" href="#">WATaTRIP</a>
                </div>
                <!-- Everything you want hidden at 940px or less, place within here -->
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="{{{ URL::to('/airlines') }}}">Home</a></li>
                    </ul> 
                    <ul class="nav navbar-nav">
                        <li><a href="{{{ URL::to('/airlines/addflights') }}}">Add Flights</a></li>
                    </ul> 
                    <ul class="nav navbar-nav">
                        <li><a href="{{{ URL::to('/airlines/browse') }}}">Browse Bookings</a></li>
                    </ul> 
                    <ul class="nav navbar-nav">
                        <li><a href="{{{ URL::to('/airlines/review') }}}">Review Bookings</a></li>
                    </ul> 
                    <ul class="nav navbar-nav">
                        <li><a href="{{{ URL::to('/') }}}">Users</a></li>
                    </ul> 


                </div>
            </div>
        </div> 

<div class="container">

@yield('content')

@yield('footer')

<br><br>

</div>



</body>
</html>
