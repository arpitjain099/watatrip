@extends('layouts.admin_default')

@section('content')

<section class="content">
    <div class="row">

         <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Flights added</h3>
                </div><!-- /.box-header -->

                <div class="box-body">
                    <table class="table table-bordered table-hover dataTable" >
                    <tr>
                        <th>Flight No.</th>
                        <th> From </th> 
                        <th> To </th>
                        <th> Action </th>
                    </tr>
                      
                    @foreach($flights as $flight1)

                    <tr><td> {{$flight1->flightno}} </td><td> {{$flight1->from1}}</td> <td> {{$flight1->to1}} </td>
                        <td><a href="{{{ URL::to('/airlines/view-flights/'.$flight1->flightno) }}}"><i title="View" class="fa fa-pencil-square-o"> View</i></a>&nbsp;&nbsp;<a href="{{{ URL::to('/airlines/edit-flights/'.$flight1->flightno) }}}"><i title="Edit" class="fa fa-list-alt"> Edit</i></a>&nbsp;&nbsp;<a href="{{{ URL::to('/airlines/disable-flights/'.$flight1->flightno) }}}"><i title="Disable" class="fa fa-times"> Disable</i></a></td>
                    </tr>

                    @endforeach

                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>    
            
    </div>
</section>


@stop