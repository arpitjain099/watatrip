@extends('layouts.admin_default')



@section('content')

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Flight Setting</h3>
                </div><!-- /.box-header -->

                <div class="box-body">

                <div class="input-group"> <span class="input-group-addon">Filter</span>
                <input id="filter" type="text" class="form-control" placeholder="Type here...">
                </div>
                    <table class="table table-bordered table-hover dataTable" >

                    <tr>
                        <th> Flight No. </th> 
                        <th> From </th>
                        <th> To </th>
                        <th> Mode</th>
                        <th>Retail Price(%)</th>
                        <th>Edit Retail Price(%)</th>
                    </tr>
                    
                    <tbody class="searchable">    
                    @foreach ($FLIGHTS as $key => $row)
                        <tr>
                            <td> {{ $row->flightno }} </td> 
                            <td> {{ $row->from1 }} </td> 
                            <td> {{ $row->to1 }} </td> 
                            <td> {{ $row->mode }} </td> 
                            <td> {{ $row->price_discount }} </td> 
                            <td><input type="text" name="price_discount__{{ $row->flightno }}" id="price_discount__{{ $row->flightno }}" ></td> 
                            <td><input class="btn btn-danger" id="id__{{ $row->flightno }}" type="button" value="Apply"></td>
                        </tr>
                        @endforeach
                     </tbody>   
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->

        </div><!-- /.col -->
    </div>
</section>


<script>
    $(".btn-danger").on("click", function() {
        id = $(this).attr('id');

        var arr = id.split('__');
        var flightno = arr[1];

        var formAction = '/setting/update-flight';
        price_discount_selector = '#price_discount__' + flightno;
        postArray = {
            flightno: flightno,
            price_discount: $(price_discount_selector).val()
        };

        $.post(formAction, postArray, function(data) {
            if (data == 'yes') {
                window.location.href = "/setting/flight-setting";
            }
        });
    });

</script>

@stop