@extends('layouts.admin_default')

@section('content')

<section class="content">
    <div class="row">

        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header">
                <h3 class="box-title">Add Flights</h3>
                </div>
                <div class="box-body">
                {{ Form::open(array('url' => '/storeflights')); }}
                    <div>
                            {{ Form::label('airline', 'Airline '); }}
                            {{ Form::text('airline','',array('class' => 'form-control')); }}
                    </div>

                    <div>
                            {{ Form::label('from1', 'From '); }}
                            {{ Form::text('from1','',array('class' => 'form-control')); }}
                    </div>

                    <div>
                            {{ Form::label('to1', 'To '); }}
                            {{ Form::text('to1','',array('class' => 'form-control')); }}
                    </div>

                    <div>
                            {{ Form::label('flightno', 'Flight No. '); }}
                            {{ Form::text('flightno','',array('class' => 'form-control')); }}
                    </div>

                    <div>
                            {{ Form::label('deptime', 'Dep. Time '); }}
                            {{ Form::text('deptime','',array('class' => 'form-control')); }}
                    </div>

                    <div>
                            {{ Form::label('arrtime', 'Arr. Time '); }}
                            {{ Form::text('arrtime','',array('class' => 'form-control')); }}
                    </div>

                    <!--<div>
                            {{ Form::label('duration', 'Duration '); }}
                            {{ Form::text('duration','',array('class' => 'form-control')); }}
                    </div>-->
                
                    <div>
                            {{ Form::label('days', 'Days '); }}<br>
                            
                            {{ Form::label('day', 'Sun '); }} {{ Form::checkbox('day[]', '0', true); }}&nbsp;&nbsp;
                            {{ Form::label('day', 'Mon '); }} {{ Form::checkbox('day[]', '1', true); }}&nbsp;&nbsp;
                            {{ Form::label('day', 'Tue '); }} {{ Form::checkbox('day[]', '2', true); }}&nbsp;&nbsp;
                            {{ Form::label('day', 'Wed '); }} {{ Form::checkbox('day[]', '3', true); }}&nbsp;&nbsp;
                            {{ Form::label('day', 'Thurs '); }} {{ Form::checkbox('day[]', '4', true); }}&nbsp;&nbsp;
                            {{ Form::label('day', 'Fri '); }} {{ Form::checkbox('day[]', '5', true); }}&nbsp;&nbsp;
                            {{ Form::label('day', 'Sat '); }} {{ Form::checkbox('day[]', '6', true); }}&nbsp;&nbsp;
                           
                            
                    </div>

                    <div> 
                        <br> {{ Form::submit('Submit',array('class' => 'btn btn-danger')); }}
                    </div>

                    {{ Form::close(); }}
                </div>
            </div>
        </div>

                  
    </div>
</section>


@stop