@extends('layouts.admin_default')

@section('content')

<section class="content">
    <div class="row">

        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header">
                <h3 class="box-title">View Flights</h3>
                </div>
                <div class="box-body">
                 <?php $days_arr = explode(',', $flights->dates); ?>
                    
                {{ Form::open(array('url' => '/storeflights')); }}
                    <div>
                            {{ Form::label('airline', 'Airline '); }}
                            {{ Form::text('airline', $flights->airline ,array('class' => 'form-control')); }}
                    </div>

                    <div>
                            {{ Form::label('from1', 'From '); }}
                            {{ Form::text('from1',$flights->from1,array('class' => 'form-control')); }}
                    </div>

                    <div>
                            {{ Form::label('to1', 'To '); }}
                            {{ Form::text('to1', $flights->to1 ,array('class' => 'form-control')); }}
                    </div>

                    <div>
                            {{ Form::label('flightno', 'Flight No. '); }}
                            {{ Form::text('flightno', $flights->flightno ,array('class' => 'form-control')); }}
                    </div>

                    <div>
                            {{ Form::label('deptime', 'Dep. Time '); }}
                            {{ Form::text('deptime', $flights->deptime ,array('class' => 'form-control')); }}
                    </div>

                    <div>
                            {{ Form::label('arrtime', 'Arr. Time '); }}
                            {{ Form::text('arrtime', $flights->arrtime ,array('class' => 'form-control')); }}
                    </div>

                    <div>
                            {{ Form::label('duration', 'Duration '); }}
                            {{ Form::text('duration', $flights->duration ,array('class' => 'form-control')); }}
                    </div>
                
                    <div>
                            {{ Form::label('days', 'Days '); }}<br>
                            
                            {{ Form::label('day', 'Sun '); }} {{ Form::checkbox('day[]', '0', in_array('0', $days_arr) ? 'true' : ''  ); }}&nbsp;&nbsp;
                            {{ Form::label('day', 'Mon '); }} {{ Form::checkbox('day[]', '1', in_array('1', $days_arr) ? 'true' : '' ); }}&nbsp;&nbsp;
                            {{ Form::label('day', 'Tue '); }} {{ Form::checkbox('day[]', '2', in_array('2', $days_arr) ? 'true' : '' ); }}&nbsp;&nbsp;
                            {{ Form::label('day', 'Wed '); }} {{ Form::checkbox('day[]', '3', in_array('3', $days_arr) ? 'true' : '' ); }}&nbsp;&nbsp;
                            {{ Form::label('day', 'Thurs '); }} {{ Form::checkbox('day[]', '4', in_array('4', $days_arr) ? 'true' : '' ); }}&nbsp;&nbsp;
                            {{ Form::label('day', 'Fri '); }} {{ Form::checkbox('day[]', '5', in_array('5', $days_arr) ? 'true' : '' ); }}&nbsp;&nbsp;
                            {{ Form::label('day', 'Sat '); }} {{ Form::checkbox('day[]', '6', in_array('6', $days_arr) ? 'true' : '' ); }}&nbsp;&nbsp;
                           
                            
                    </div>

                    <!--<div> 
                        <br> {{ Form::submit('Submit',array('class' => 'btn btn-danger')); }}
                    </div>-->

                    {{ Form::close(); }}
                </div>
            </div>  
        </div>

                  
    </div>
</section>


@stop