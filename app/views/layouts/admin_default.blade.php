<!doctype html>
<html lang="en">
    <head>
        @include('includes.admin.include_assets')
    </head>

    <body class="skin-blue">
        <div class="wrapper">

            <header class="main-header">
                @include('includes.admin.header')
            </header>
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar">
                <!-- sidebar: style can be found in sidebar.less -->
                @include('includes.admin.sidebar')
                <!-- /.sidebar -->
            </aside>
            <a href="../includes/admin/sidebar.blade.php"></a>
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Dashboard
                        <small>Control panel</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    @yield('content')
                </section><!-- /.content -->
            </div><!-- /.content-wrapper -->
            <footer class="main-footer">
                @include('includes.admin.footer')
            </footer>
        </div><!-- ./wrapper -->
        @include('includes.admin.footer_assets')
    </body>
</html>
