<!doctype html>
<html lang="en">
<head>



        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <!-- CSS are placed here -->
        <!--  {{ HTML::style('app/views/css/bootstrap.css') }}
         {{ HTML::style('app/views/css/bootstrap-theme.css') }}
           
             {{ HTML::style('app/views/font-awesome-4.1.0/css/font-awesome.min.css') }} -->

        <meta charset="UTF-8">
        <title>WATaTRIP.com </title>

        <meta name="author" content="">
        <meta name="keywords" content="">
        <meta name="description" content="">        

        <!-- Mobile Specific Metas -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">       

        <!-- Libs CSS -->
        <link href="/front/css/bootstrap.css" rel="stylesheet">
        <link href="/front/css/simple-line-icons.css" rel="stylesheet">
        <link href="/front/css/font-awesome.min.css" rel="stylesheet">
        <link href="/front/css/prettyPhoto.css" rel="stylesheet" type="text/css" media="all" />

        <!-- Template CSS -->
        <link href="/front/css/style.css" rel="stylesheet"> 



        <!-- Google Fonts -->
        <link href='http://fonts.googleapis.com/css?family=Raleway:400,700,800&amp;subsetting=all' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,800,700,300' rel='stylesheet' type='text/css'>
        <link href="//code.ionicframework.com/ionicons/1.5.2/css/ionicons.min.css" rel="stylesheet" type="text/css" />

        <!--[if lt IE 9]>
            <script src="./js/html5shiv.js"></script>
            <script src="./js/respond.js"></script>
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <![endif]-->




        <!-- Start Js Files -->
        <script type="text/javascript" src="http://code.jquery.com/jquery-2.1.0.min.js"></script>

 <!-- <script type="text/javascript">window.jQuery || document.write('<script src="/front/js/jquery-2.1.0.min.js"><\/script>')</script> -->
        <script src="/front/js/bootstrap.min.js" type="text/javascript"></script><!--Packed with many functionalies such as carousel slider, responsivity, tabs, drop downs, buttons, and many other features-->
        <script src="/front/js/modernizr.min.js" type="text/javascript"></script><!--Modernizr is an open-source JavaScript library that helps you build the next generation of HTML5 and CSS3-powered websites.-->
        <script src="/front/js/jquery.prettyPhoto.js" type="text/javascript" ></script><!-- Script for Lightbox Image  -->
        <script src="/front/js/custom.js" type="text/javascript"></script><!-- Script File containing all customizations  -->
        <!-- End Js Files  -->


        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/jquery-ui.js"></script>


        @yield('header')
    </head>



<body data-spy="scroll" data-target=".navigation">
    
    <!-- Banner --> 
    <div id="intro" class="section">
        <!-- Start Header -->
        <div id="header">
            <nav class="navbar scroll-fixed-navbar navbar-inverse navbar-fixed-top" role="navigation">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <!-- Start Logo / Text -->
                        <a class="navbar-brand text-logo" href="/laravel1"><i class="ion ion-paper-airplane"></i>WATaTRIP</a>
                        <!-- End Logo / Text -->
                    </div>
                    <!-- Start Navigation -->
                    <div class="navigation navbar-collapse collapse">
                        <ul class="nav navbar-nav menu-right">
                            <li class="active"><a href="/laravel1">Home</a></li>
                            <li><a href="/laravel1/#hiw"  target="_blank">How it Works</a></li>
                            <li><a href="/laravel1/#faq" target="_blank">FAQs</a></li>
                            <li><a href="/laravel1/#contact" target="_blank">Contact Us</a></li>
                          
                        </ul>
                    </div>
                    <!-- End Navigation  -->
                </div>
            </nav>
        </div>
        <!-- End Header -->
                    
     </div>

 

@yield('content')

@yield('footer')

<br><br>





</body>
</html>
