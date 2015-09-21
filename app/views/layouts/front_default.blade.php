<!doctype html>
<html lang="en">
<head>
@include('includes.header')
</head>

<body data-spy="scroll" data-target=".navigation">
    
    <!-- Banner --> 
    <div id="banner" class="bg-blur">
        <!-- Start Header -->
        <div id="header">
            @include('includes.nav')
        </div>
        <!-- End Header -->

        @yield('content')

        @yield('footer')
        <!-- Start Js Files -->
    <script type="text/javascript" src="http://code.jquery.com/jquery-2.1.0.min.js"></script>
   
    <!-- <script type="text/javascript">window.jQuery || document.write('<script src="/front/js/jquery-2.1.0.min.js"><\/script>')</script> -->
    <script src="/front/js/bootstrap.min.js" type="text/javascript"></script><!--Packed with many functionalies such as carousel slider, responsivity, tabs, drop downs, buttons, and many other features-->
    <script src="/front/js/modernizr.min.js" type="text/javascript"></script><!--Modernizr is an open-source JavaScript library that helps you build the next generation of HTML5 and CSS3-powered websites.-->
    <script src="/front/js/jquery.prettyPhoto.js" type="text/javascript" ></script><!-- Script for Lightbox Image  -->
    <script src="/front/js/custom.js" type="text/javascript"></script><!-- Script File containing all customizations  -->
    <!-- End Js Files  -->
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/jquery-ui.js"></script>

            <!-- Start Js Files -->
    <script type="text/javascript" src="http://code.jquery.com/jquery-2.1.0.min.js"></script><!--jQuery is a Javascript library that greatly reduces the amount of code that you must write.-->
    <script type="text/javascript">window.jQuery || document.write('<script src="/front/js/jquery-2.1.0.min.js"><\/script>')</script>
    <script src="/front/js/bootstrap.min.js" type="text/javascript"></script><!--Packed with many functionalies such as carousel slider, responsivity, tabs, drop downs, buttons, and many other features-->
    <script src="/front/js/modernizr.min.js" type="text/javascript"></script><!--Modernizr is an open-source JavaScript library that helps you build the next generation of HTML5 and CSS3-powered websites.-->
    <script src="/front/js/jquery.prettyPhoto.js" type="text/javascript" ></script><!-- Script for Lightbox Image  -->
    <script src="/front/js/custom.js" type="text/javascript"></script><!-- Script File containing all customizations  -->
    <!-- End Js Files  -->
    </div>

</body>
</html>
