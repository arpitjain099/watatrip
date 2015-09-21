<!doctype html>
<html lang="en">
<head>

	
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <!-- CSS are placed here -->
        {{ HTML::style('app/views/css/bootstrap.css') }}
        {{ HTML::style('app/views/css/bootstrap-theme.css') }}
        {{ HTML::style('app/views/css/default.css') }}
        {{ HTML::style('app/views/css/fonts.css') }}
        <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet" />


	<meta charset="UTF-8">
	<title>WATaTRIP.com</title>

<style>
        @section('styles')
            body {
                padding-top: 0px;
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


<div id="header-wrapper">
    <div id="header" class="container">
        <div id="logo">
            {{ HTML::image('app/views/images/logo5.png') }} 
           
        </div>
        <div id="menu">
            <ul>
                <li class="current_page_item"><a href="#" accesskey="1" title="">Homepage</a></li>
                <li><a href="#" accesskey="2" title="">Our Clients</a></li>
                <li><a href="#" accesskey="3" title="">About Us</a></li>
                <li><a href="#" accesskey="4" title="">Careers</a></li>
                <li><a href="#" accesskey="5" title="">Contact Us</a></li>
            </ul>
        </div>
    </div>
</div>
<div id="header-featured" > 

@yield('content')

</div>


</div>

</div>
<div id="banner-wrapper">
    <div id="banner" class="container">
        <p>This is <strong>Escalier</strong>, a free, fully standards-compliant CSS template designed by <a href="http://templated.co" rel="nofollow">TEMPLATED</a>. The photos in this template are from <a href="http://fotogrph.com/"> Fotogrph</a>. This free template is released under the <a href="http://templated.co/license">Creative Commons Attribution</a> license, so you're pretty much free to do whatever you want with it (even use it commercially) provided you give us credit for it. Have fun :) </p>
    </div>
</div>
<div id="wrapper">
    <div id="featured-wrapper">
        <div id="featured" class="container">
            <div class="column1"> <span class="icon icon-key"></span>
                <div class="title">
                    <h2>Maecenas lectus sapien</h2>
                </div>
                <p>In posuere eleifend odio. Quisque semper augue mattis wisi. Pellentesque viverra vulputate enim. Aliquam erat volutpat.</p>
            </div>
            <div class="column2"> <span class="icon icon-legal"></span>
                <div class="title">
                    <h2>Praesent scelerisque</h2>
                </div>
                <p>In posuere eleifend odio. Quisque semper augue mattis wisi. Pellentesque viverra vulputate enim. Aliquam erat volutpat.</p>
            </div>
            <div class="column3"> <span class="icon icon-unlock"></span>
                <div class="title">
                    <h2>Fusce ultrices fringilla</h2>
                </div>
                <p>In posuere eleifend odio. Quisque semper augue mattis wisi. Pellentesque viverra vulputate enim. Aliquam erat volutpat.</p>
            </div>
            <div class="column4"> <span class="icon icon-wrench"></span>
                <div class="title">
                    <h2>Etiam posuere augue</h2>
                </div>
                <p>In posuere eleifend odio. Quisque semper augue mattis wisi. Pellentesque viverra vulputate enim. Aliquam erat volutpat.</p>
            </div>
        </div>
        <div id="extra" class="container">
            <h2>Maecenas vitae orci vitae tellus feugiat eleifend</h2>
            <span>Quisque dictum integer nisl risus, sagittis convallis, rutrum id, congue, and nibh</span> </div>
            
        <div id="extra2" class="container">
            <div id="ebox1">
                <div class="title">
                    <h2>Fusce ultrices fringilla</h2>
                    <span class="byline">Integer sit amet pede vel arcu aliquet pretium</span>
                </div>
                <p>Integer nisl risus, sagittis convallis, rutrum id, elementum congue, nibh. Suspendisse dictum porta lectus. Donec placerat odio vel elit. Nullam ante orci, pellentesque eget, tempus quis, ultrices in, est. Sed vel tellus. Curabitur sem urna, consequat vel, suscipit in, mattis placerat, nulla. Sed ac leo. Pellentesque imperdiet.</p>
                <a href="#" class="button">Etiam posuere</a>
            </div>      

            <div id="ebox2">
                <div class="title">
                    <h2>Donec dictum metus</h2>
                    <span class="byline">Integer sit amet pede vel arcu aliquet pretium</span>
                </div>
                <p>Integer nisl risus, sagittis convallis, rutrum id, elementum congue, nibh. Suspendisse dictum porta lectus. Donec placerat odio vel elit. Nullam ante orci, pellentesque eget, tempus quis, ultrices in, est. Sed vel tellus. Curabitur sem urna, consequat vel, suscipit in, mattis placerat, nulla. Sed ac leo. Pellentesque imperdiet.</p>
                <a href="#" class="button">Etiam posuere</a>
            </div>      

        </div>  

    </div>
</div>
<div id="copyright" class="container">
    <p>&copy; Untitled. All rights reserved. | Photos by <a href="http://fotogrph.com/">Fotogrph</a> | Design by <a href="http://templated.co" rel="nofollow">TEMPLATED</a>.</p>
</div>

<div class="container">

@if(Session::get('flash_message'))
<div class="alert alert-success">
 <button type="button" class="close" data-dismiss="alert">&times;</button>
{{ Session::get('flash_message') }}
</div>
@endif

/*@yield('content1')*/

@yield('footer')

<br><br>

</div>



</body>
</html>
