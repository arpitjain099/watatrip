<!doctype html>
<html lang="en">
<head>

	
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <!-- CSS are placed here -->
        {{ HTML::style('app/views/css/bootstrap.css') }}
        {{ HTML::style('app/views/css/bootstrap-theme.css') }}

	<meta charset="UTF-8">
	<title>WATaTRIP.com</title>

<style>
        @section('styles')
            body {
                padding-top: 60px;
            }
        @show
        </style>

        {{ HTML::script('app/views/js/jquery-1.11.1.min.js') }}
        {{ HTML::script('app/views/js/bootstrap.min.js') }}

<script>
   
    $(function(){
         $(".flash_message").fadeOut(3000);
        });
</script>

@yield('header')
</head>

<body>

 <!-- Navbar -->
        <div class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <a class="navbar-brand" href="#">
                        <img alt="Brand" src="app/views/images/logo3.png">
                    </a>
                </div>
                <!-- Everything you want hidden at 940px or less, place within here -->
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="{{{ URL::to('/') }}}">Home</a></li>
                    </ul> 
                    <ul class="nav navbar-nav">
                        <li><a href="{{{ URL::to('/about') }}}">About</a></li>
                    </ul> 
                    <ul class="nav navbar-nav">
                        <li><a href="{{{ URL::to('/how-it-works') }}}">How it works</a></li>
                    </ul> 
                   
                    
                    @if (Auth::check())
                    <ul class="nav navbar-nav">
                        <li><a href="{{{ URL::to('/logout') }}}">Logout</a></li>
                    </ul> 
                    @else
                      <ul class="nav navbar-nav">
                        <li><a href="{{{ URL::to('/login') }}}">Sign In</a></li>
                    </ul> 
                    @endif

                    <ul class="nav navbar-nav">
                        <li><a href="{{{ URL::to('/contact-us') }}}">Contact Us</a></li>
                    </ul> 
        

                     <ul class="nav navbar-nav">
                        <li><a href="{{{ URL::to('/airlines') }}}">Airlines</a></li>
                    </ul> 

                </div>
            </div>
        </div> 

<div class="container">

@if(Session::get('flash_message'))
<div class="alert alert-success">
 <button type="button" class="close" data-dismiss="alert">&times;</button>
{{ Session::get('flash_message') }}
</div>
@endif

@yield('content')

@yield('footer')

<br><br>

</div>



</body>
</html>
