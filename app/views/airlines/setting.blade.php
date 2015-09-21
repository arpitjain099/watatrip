@extends('layouts.admin_default')
@section('content')

<div class="row">
    <!--<div class="col-md-6">
        Coming Soon Short Description
    </div>-->
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Add Setting</h3>
            </div><!-- /.box-header -->
            <!-- form start -->

            <!--<form role="form" action="" method="post" name="settingForm" id="settingForm">-->
            {{ Form::open(array('url' => '', 'method' => 'post', 'id' => 'settingForm' )); }}
                <div class="box-body">
                    <img src="admin/img/retail.png">
                    <div class="form-group">
                        <label>Retail Price(%)</label>
                        <div class="row">
                        <div class="col-lg-1 col-xs-6"></div>
                        <div class="col-lg-2 col-xs-6">    
                            <label>30+</label>
                            <input type="text" class="form-control" readonly>
                            <label>x-10</label>
                        </div>
                        <div class="col-lg-2 col-xs-6">
                            <label>21-30</label>
                            <input type="text" class="form-control" readonly>
                            <label>x-5</label>
                        </div>
                        <div class="col-lg-2 col-xs-6">
                            <label>11-20</label>
                            <input type="text" class="form-control" readonly>
                            
                            <label></label>
                        </div>
                        <div class="col-lg-2 col-xs-6">
                            <label>6-10</label>
                            <input type="text"  class="form-control" readonly>
                            <label>x+5</label>
                        </div>
                        <div class="col-lg-2 col-xs-6">
                            <label>1-5</label>
                            
                            {{ Form::text( 'price_discount', '', array(
							    'id' => 'price_discount',
							    'class' => 'form-control',
							    'placeholder' => 'x%',
							        
							) ) }}
                            <label>x+10</label>
                        </div>
                        <div class="col-lg-1 col-xs-6"></div>
                        </div>
                    </div>

                    <!--<div class="form-group">
                        <label>Weightage(%)</label>
                        <input type="text" placeholder="Enter price Weightage" name="weightage" id="weightage" class="form-control">
                    </div>  -->

                </div>

                <div class="box-footer">
                    <!--<input class="btn btn-danger" id="apply_to_all_flights" type="button" value="Apply To all Flights">
                    <input class="btn btn-danger" id="apply_flights_to_global" type="button" value="Apply to Flights at global setting">-->
                    {{ Form::button('Apply To all Flights',array('class' => 'btn btn-danger', 'id' => 'apply_to_all_flights')) }}
                    {{ Form::button('Apply to Flights at global setting',array('class' => 'btn btn-danger', 'id' => 'apply_flights_to_global' )) }}

                </div>
            <!--</form>-->
            {{ Form::close(); }}
        </div><!-- /.box -->
    </div>
   
</div>




<script>
$( "#apply_to_all_flights" ).on( "click", function() {
    
    var formAction = '/setting/save';
    
    postArray = {
        price_discount : $('#price_discount').val(),
//        weightage : $('#weightage').val(),
        ClickFrom : 'apply_to_all_flights'
    };
    
    $.post(formAction, postArray, function(data) {
        if(data =='yes') {
            window.location.href = "/setting/flight-setting";
        }
    });
});

$( "#apply_flights_to_global" ).on( "click", function() {
    
    var formAction = '/setting/save-global';
    
    postArray = {
        price_discount : $('#price_discount').val(),
//        weightage : $('#weightage').val(),
        ClickFrom : 'apply_flights_to_global'
    };
    
    $.post(formAction, postArray, function(data) {
        if(data =='yes') {
            window.location.href = "/setting/flight-setting";
        }
    });
});

</script>

@stop