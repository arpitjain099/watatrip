<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Bootstrap Admin Theme</title>

    <!-- Bootstrap Core CSS -->
    <!-- <link href="app/views/airlines/template/css/bootstrap.min.css" rel="stylesheet"> -->
     {{ HTML::style('app/views/airlines/template/css/bootstrap.min.css') }}
      
    <!-- MetisMenu CSS -->
    <!-- <link href="app/views/airlines/template/css/plugins/metisMenu/metisMenu.min.css" rel="stylesheet"> -->
     {{ HTML::style('app/views/airlines/template/css/plugins/metisMenu/metisMenu.min.css') }}

    <!-- Timeline CSS -->
    <!-- <link href="app/views/airlines/template/css/plugins/timeline.css" rel="stylesheet"> -->
     {{ HTML::style('app/views/airlines/template/css/plugins/timeline.css') }}

    <!-- Custom CSS -->
    <!-- <link href="app/views/airlines/template/css/sb-admin-2.css" rel="stylesheet"> -->
     {{ HTML::style('app/views/airlines/template/css/sb-admin-2.css') }}

    <!-- Morris Charts CSS -->
    <!-- <link href="app/views/airlines/template/css/plugins/morris.css" rel="stylesheet"> -->
     {{ HTML::style('app/views/airlines/template/css/plugins/morris.css') }}

    <!-- Custom Fonts -->
    <!-- <link href="font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css"> -->
     {{ HTML::style('app/views/airlines/template/font-awesome-4.1.0/css/font-awesome.min.css') }}

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
      

 @yield('header')

</head>

<body>

 <div id="wrapper">
   

         <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>

    @yield('content')

     @yield('footer')
          {{ HTML::script('app/views/airlines/template/js/jquery-1.11.0.js') }}

    <!-- Bootstrap Core JavaScript -->
    <!-- // <script src="js/bootstrap.min.js"></script> -->
    {{ HTML::script('app/views/airlines/template/js/bootstrap.min.js') }}

    <!-- Metis Menu Plugin JavaScript -->
    <!-- // <script src="js/plugins/metisMenu/metisMenu.min.js"></script> -->
    {{ HTML::script('app/views/airlines/template/js/plugins/metisMenu/metisMenu.min.js') }}


    <!-- Morris Charts JavaScript -->
   <!--  // <script src="js/plugins/morris/raphael.min.js"></script>
    // <script src="js/plugins/morris/morris.min.js"></script>
    // <script src="js/plugins/morris/morris-data.js"></script> -->

    {{ HTML::script('app/views/airlines/template/js/plugins/morris/raphael.min.js') }}
    {{ HTML::script('app/views/airlines/template/js/plugins/morris/morris.min.js') }}
    {{ HTML::script('app/views/airlines/template/js/plugins/morris/morris-data.js') }}

    <!-- Custom Theme JavaScript -->
    <!-- // <script src="js/sb-admin-2.js"></script> -->
 {{ HTML::script('app/views/airlines/template/js/sb-admin-2.js"') }}  

</div> 
</body>
</html>
