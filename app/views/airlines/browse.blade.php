@extends('layouts.admin_default')
  
@section('content')


<?php $airlines = Airlines::lists('aname', 'aname'); ?>

<section class="content">
    <div class="row">
        <div class="col-md-4">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Flight List</h3>
                </div>
                <div class="box-body">
                  {{ Form::open(array('url' => '/airlines/browse', 'method' => 'get')); }}
                  
                    <div class="col-md-9">

                      {{ Form::text( 'datepicker', '', array(
                          'id' => 'datepicker',
                          'class' => 'form-control',
                          'placeholder' => 'Enter Date',

                      ) ) }}
                    </div>
                    <div class="col-md-3">
                      {{ Form::submit('Go',array('class' => 'btn btn-danger')) }}
                      {{ Form::close(); }}

                  </div>
                    <?php 
                    if(empty($_GET))
                            { $date1 = date('Y-m-d', time()+86400);}
                    else
                            { $date1 = date('Y-m-d', strtotime(Input::get('datepicker')));}
//                  $flists = Fdetails::where('airline','=','Air India')->where('date1','=',$date1)->get(); 
                    $flists = DB::table('fdetails')->where('airline','=', Session::get('airline_name'))->where('date1','=',$date1)->where('watno','!=','NULL')->get(); 

                    $vacantseats=0;
                   $retailprice= DB::table('bookings')->where('date1','=',$date1)->where('airline','=',Session::get('airline_name'))->sum('retailprice'); 
                   $watno = DB::table('bookings')->where('date1','=',$date1)->where('airline','=',Session::get('airline_name'))->count(); 
                   $approved = DB::table('bookings')->where('date1','=',$date1)->where('airline','=',Session::get('airline_name'))->where('status','=','Approved')->count();
                    
                    
                    ?>


                  <div class="row">
                    <div class="col-md-12">
                    <p id='displaydate' style="display:none;"> {{$date1}} </p>
                    @foreach ($flists as $flist)
                                <button type="button" class="btn btn-large btn-block" id={{$flist->flightno}} >{{$flist->flightno}} - WATs Booked = {{$flist->watno-1}}
                             </button> 
                    @endforeach
                    </div>
                  </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="box box-primary">
                <div class="box-header">
                <h3 class="box-title">List of Bookings</h3>
                </div>
                
                
                <div class="row" id="extrainfo" style="padding: 0 10px 0 10px;">
                            <div class="col-lg-3 col-xs-6">
                                <div class="small-box bg-aqua">
                                    <div class="inner">
                                    <strong>
                                       {{ $vacantseats}}
                                     </strong>
                                    <p>
                                        Vacant Seats 
                                    </p>
                                </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-xs-6">
                                <div class="small-box bg-green">
                                     <div class="inner">
                                    <strong>
                                       {{ $retailprice }}
                                    </strong>
                                    <p>
                                        Retail Price
                                    </p>
                                </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-xs-6">
                                <div class="small-box bg-yellow">
                                     <div class="inner">
                                    <strong>
                                        {{ $watno }}
                                    </strong>
                                    <p>
                                        Total Wats Booked
                                    </p>
                                </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-xs-6">
                                 <div class="small-box bg-red">
                                      <div class="inner">
                                    <strong>
                                        {{ $approved }}
                                    </strong>
                                    <p>
                                        Total Approved
                                    </p>
                                </div>
                                 </div>
                            </div>
                </div>
                
                <div class="box-body">
                  <p align="right"><input type='checkbox' id="selectall"> Select All </p>


		<div class="input-group"> <span class="input-group-addon">Filter</span>

		    <input id="filter" type="text" class="form-control" placeholder="Type here...">
		</div>



		{{ Form::open(array('url' => '/airlines/approve', 'name'=>'bookingList' , 'method' => 'GET')); }}

		<table class="table table-hover" id="bd1"><tr><th>From</th><th>To</th><th> Flight No.</th><th> Date</th>
		<th> Retail Price</th><th> WAT No.</th><th>WAT Price</th><th>Status</th><th>Approve</th></tr>

		

		<tbody class="searchable" id="bdall">
		
		</tbody>

		


		</table>
		
		<p align="right">
		{{ Form::submit('Submit',array('class' => 'btn btn-danger')) }}
		</p>

		{{ Form::close(); }}

		
		
                </div>
            </div>
        </div>
    </div>    
</section>






<?php
/*


<div class="row">
	<div class="col-md-4">

		<h4> Flight List </h4>
		      
		{{ Form::open(array('url' => '/airlines/browse', 'method' => 'get')); }}
			
			
		<div class="col-md-4">

			
			{{ Form::text( 'datepicker', '', array(
			    'id' => 'datepicker',
			    'class' => 'form-control',
			    'placeholder' => 'Enter Date',
			        
			) ) }}
			
		</div>
		
		
		{{ Form::submit('Go',array('class' => 'btn btn-danger')) }}
		{{ Form::close(); }}
		
		<br>
		<?php 
		if(empty($_GET))
			{ $date1 = date('Y-m-d', time()+86400);}
		else
			{ $date1 = date('Y-m-d', strtotime(Input::get('datepicker')));}
		$flists = Fdetails::where('airline','=','Air India')->where('date1','=',$date1)->get(); 
		

		?>
		
		

		<div class="col-md-8">
		<p id='displaydate'> {{$date1}} </p>
		@foreach ($flists as $flist)
			<button type="button" class="btn btn-large btn-block" id={{$flist->flightno}}>{{$flist->flightno}} - WATs Booked = {{$flist->watno-1}}
			 </button> 
		@endforeach
		</div>
            </div>
			
		
	
	<div class="col-md-8">

		<h4> List of Bookings  </h4> 

		<p align="right"><input type='checkbox' id="selectall"> Select All </p>


		<div class="input-group"> <span class="input-group-addon">Filter</span>

		    <input id="filter" type="text" class="form-control" placeholder="Type here...">
		</div>



		{{ Form::open(array('url' => '/airlines/approve', 'name'=>'bookingList' , 'method' => 'GET')); }}

		<table class="table table-hover" id="bd1"><tr><th>From</th><th>To</th><th> Flight No.</th><th> Date</th>
		<th> Retail Price</th><th> WAT No.</th><th>WAT Price</th><th>Status</th><th>Approve</th></tr>

		

		<tbody class="searchable" id="bdall">
		
		</tbody>

		


		</table>
		
		<p align="right">
		{{ Form::submit('Submit',array('class' => 'btn btn-danger')) }}
		</p>

		{{ Form::close(); }}

		
		
		

	</div>
 * 
 */
?>
<script>
  $(function() {
    $( "#datepicker" ).datepicker({
      numberOfMonths: 2,
      showButtonPanel: true
    });
  });

 </script>
 
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

  <script>

$(function() { // wrap inside the jquery ready() function

        //Attach an onclick handler to each of your buttons that are meant to "approve"
        $("button").click(function(){
           var id1 = $(this).attr("id");
           var data1 = {};
          $('#bdall').empty();

           data1['flightno']= id1;
           data1['jsdate1'] = $('#displaydate').text();

           //	      url: '/laravel1/airlines/ajaxbrowse', //This is the page where you will handle your SQL insert
               $.ajax({
                  url: '/airlines/ajaxbrowse', //This is the page where you will handle your SQL insert
                  type: "GET",
                  data: data1, //The data your sending to some-page.php
                 // dataType: "json",	
                  success: function(response, status){
                      
                      $('#bdall').html(response);

        //              extrainfo(id1,data1['jsdate1']);
                        /*var i=0;
                     $.each(jsons, function(i, json){
                        var i = i+1;
                        $('#bdall').append('<tr id="brow"><td>' + json.from + 
                            '</td><td>' + json.to +
                            '</td><td>' + json.flightno +
                            '</td><td>' + json.date1 + 
                            '</td><td>' + json.retailprice + 
                            '</td><td>' + json.watno + 
                            '</td><td>' + json.watprice + 
                            '</td><td>' + json.status + 
                            '</td><td>' + '<input class ="checkbox1" name="' + i + '" type="checkbox" value=' + json.tid + '></td></tr>'
                                )
                     }); */



                      console.log( "Status: " + status );
                  },
                  error: function(xhr, status, errorThrown){
                      alert( "Sorry, there was a problem!" + errorThrown +status);
                console.log( "Error: " + errorThrown );
                console.log( "Status: " + status );
                console.dir( xhr );
                  }   
                });
        });



        $("button").click(function(){
           var id1 = $(this).attr("id");
           var data1 = {};
          $('#bdall').empty();

           data1['flightno']= id1;
           data1['jsdate1'] = $('#displaydate').text();
           

           //	      url: '/laravel1/airlines/ajaxbrowse', //This is the page where you will handle your SQL insert
               $.ajax({
                  url: '/airlines/ajaxextrainfo', //This is the page where you will handle your SQL insert
                  type: "GET",
                  data: data1, //The data your sending to some-page.php
                 // dataType: "json",	
                  success: function(response, status){

                      $('#extrainfo').html(response);

                      console.log( "Status: " + status );
                  },
                  error: function(xhr, status, errorThrown){
                      alert( "Sorry, there was a problem!" + errorThrown +status);
                console.log( "Error: " + errorThrown );
                console.log( "Status: " + status );
                console.dir( xhr );
                  }   
                });
        });

});

  </script>

 <script>
$(document).ready(function() {
    $('#selectall').click(function(event) {  //on click 
        if(this.checked) { // check select status
            $('.checkbox1').each(function() { //loop through each checkbox
                this.checked = true;  //select all checkboxes with class "checkbox1"               
            });
        }else{
            $('.checkbox1').each(function() { //loop through each checkbox
                this.checked = false; //deselect all checkboxes with class "checkbox1"                       
            });         
        }
    });
    
});

</script>


@stop
