
<!-- Bootstrap 3.3.2 JS -->
<script src="/admin/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>    
<!-- Morris.js charts -->
<script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<!--<script src="/admin/plugins/morris/morris.min.js" type="text/javascript"></script>-->
<!-- Sparkline -->
<script src="/admin/plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
<!-- jvectormap -->
<script src="/admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
<script src="/admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
<!-- jQuery Knob Chart -->
<script src="/admin/plugins/knob/jquery.knob.js" type="text/javascript"></script>
<!-- daterangepicker -->
<script src="/admin/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
<!-- datepicker -->
<script src="/admin/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>

<!-- -------------------------------------------------------- -->
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script src="//code.jquery.com/ui/1.11.1/jquery-ui.min.js" type="text/javascript"></script>
        
<link href="/admin/css/xcharts.min.css" rel="stylesheet">
<link href="/admin/css/style.css" rel="stylesheet">-->

<?php if(Route::currentRouteAction()=="AirlinesController@getDashboard"){ ?>
<script src="//cdnjs.cloudflare.com/ajax/libs/d3/2.10.0/d3.v2.js"></script> 
<script src="http://d3js.org/d3.v3.min.js" charset="utf-8"></script>
<script src="/admin/js/xcharts.js"></script>
<script src="/admin/js/sugar.min.js"></script>
<script src="/admin/js/daterangepicker.js"></script>
<script src="/admin/js/script.js"></script>
<?php } ?>
<!-- ------------------------------------------------------------------->

<!-- iCheck -->
<script src="/admin/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
<!-- Slimscroll -->
<script src="/admin/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<!-- FastClick -->
<script src='/admin/plugins/fastclick/fastclick.min.js'></script>
<!-- AdminLTE App -->
<script src="/admin/dist/js/app.min.js" type="text/javascript"></script>

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!--<script src="/admin/dist/js/pages/dashboard.js" type="text/javascript"></script>-->

<!-- AdminLTE for demo purposes -->
<script src="/admin/dist/js/demo.js" type="text/javascript"></script>


<!-- DATA TABES SCRIPT -->

<script src="/admin/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
<script src="/admin/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>


<!--<script src="//code.jquery.com/jquery-1.10.0.js"></script>
<script src="//code.jquery.com/ui/1.10.0/jquery-ui.js"></script>-->

        <!-- Filter -->
<script>
 
  $(document).ready(function () {

    (function ($) {

        $('#filter').keyup(function () {

            var rex = new RegExp($(this).val(), 'i');
            $('.searchable tr').hide();
            $('.searchable tr').filter(function () {
                return rex.test($(this).text());
            }).show();

        })

    }(jQuery));

  });

</script>
