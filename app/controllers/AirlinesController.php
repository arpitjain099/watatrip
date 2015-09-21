<?php
use Illuminate\Http\Response;
class AirlinesController extends BaseController {
    
    
    public function getDashboard() {
        if (Helpers::checkAirlinesLogin()) {
            $data = array();
            $bookingObj = NEW Bookings();

            $todayBookingDetailcount = $bookingObj->getTodayBookingDetailcount();
            $todayExpiryCount = $bookingObj->getTodayExpiryCount();
            $todayRevenue = $bookingObj->getTodayRevenue();
            $revenueExpiringcount = $bookingObj->getRevenuesExpiringCount();

    //        $date1 = '2014-11-01';
    //        $date1 = date('Y-m-d');
     /*       $date1 = date('Y-01-01');
            $airline_name = Session::get('airline_name');

    //        while ($date1 != '2015-01-30') {
            while ($date1 != date('Y-m-d')) {

    //            $count = Bookings::where('date1', '=', $date1)->where('airline', '=', $airline_name)->count();

                $airstats = Airstats::where('date1', '=', $date1)->where('airline', '=', $airline_name)->firstorfail();

                $airstats->bookings = $count;
                $airstats->save();
                $date1 = date('Y-m-d', strtotime("$date1 +1 day"));
            } */

            $data = array(
                'booking_detail_count' =>$todayBookingDetailcount,
                'today_expiry_count' =>$todayExpiryCount,
                'today_revenue' =>$todayRevenue,
                'revenu_expiring_count' =>$revenueExpiringcount
            );

            return View::make('airlines.hello', $data);

        } else {
            return Redirect::to('/airlines/login');
        }
    }
    
    public function getIndex() {
        if (Helpers::checkAirlinesLogin()) {
            return Redirect::to('/airlines/dashboard');
        } else {
            return Redirect::to('/airlines/login');
        }
    }
    
    public function getLogin() {
        if (Helpers::checkAirlinesLogin()) {
            return Redirect::to('/airlines/dashboard');
        } else {
            Session::flush();
            return View::make('/airlines/login');
        }
    }
    
    public function postValidate() {

        $GLOBALS = array();
        $rules = array(
            'email' => 'required', // make sure the email is an actual email
            'password' => 'required|alphaNum|min:3'  // password can only be alphanumeric and has to be greater than 3 characters
        );

        // run the validation rules on the inputs from the form
        $validator = Validator::make(Input::all(), $rules);
        
        if ($validator->fails()) {
            return Redirect::to('/airlines/login')->withErrors($validator); // send back all errors to the login form
        } else {
            // create our user data for the authentication
            $pass = Input::get('password');
            $pass = md5($pass);
            $email = Input::get('email');
            
            $userdata = array(
                'email' => Input::get('email'),
                'password' => Input::get('password')
            );

            $airlinesObj = new Airlines();
            if ($airlinesObj->validateUser($email, $pass)) {
                return Redirect::to('/airlines/dashboard');
               
            } else {
                return Redirect::to('/airlines/login')->with('message', 'Login Failed');
                Session::flash('message', array(
                    'class' => 'alert-box success',
                    'content' => 'Invalid Email/Password'
                ));
            }
            return $return;
        }
    }
    
    function getAddFlights() {
        
        if (Helpers::checkAirlinesLogin()) {
            return View::make('airlines.addflights');
        } else {
            Session::flush();
            return View::make('/airlines/login');
        }
        
        
    }
    
    function getEditFlights($flight_no) {
        
        if (Helpers::checkAirlinesLogin()) {
            $flights = Flights::where('flightno', '=', $flight_no)->first();
            return View::make('airlines.editflights')->with('flights', $flights);
        } else {
            Session::flush();
            return View::make('/airlines/login');
        }
        
        
    }
    function getDisableFlights($flight_no) {
        
        if (Helpers::checkAirlinesLogin()) {
            DB::table('flights')->where('flightno', '=', $flight_no)
                    ->update(array('status' => 0 ));
            return Redirect::to('/airlines/list-flights');
        } else {
            Session::flush();
            return View::make('/airlines/login');
        }
        
        
    }
    
    function getViewFlights($flight_no) {
               
        if (Helpers::checkAirlinesLogin()) {
          $flights = Flights::where('flightno', '=', $flight_no)->first();
          return View::make('airlines.viewflights')->with('flights', $flights);
        } else {
            Session::flush();
            return View::make('/airlines/login');
        }
        
        
    }
    
    function getListFlights() {
        
        if (Helpers::checkAirlinesLogin()) {
            $flights = DB::table('flights')->where('airline','=',Session::get('airline_name'))->get(); 
            return View::make('airlines.listflights')->with('flights', $flights);
            
        } else {
            Session::flush();
            return View::make('/airlines/login');
        }
        
        
    }

    function getSearch() {
        if (Helpers::checkAirlinesLogin()) {
            
            $vacantseats=0;
            $retailprice=0;
            $watno=0;
            $approved=0;
            
            
            $bookings = DB::table('bookings')->where('airline','=',Input::get('airline'))->get();
        
			if(Input::get('caseid')=="1")
				{
				$date1 = date('Y-m-d', strtotime(Input::get('datepicker')));
				$bookings = DB::table('bookings')->where('airline','=',Input::get('airline'))->where('from1','=',Input::get('from1'))->where('to1','=',Input::get('to1'))->where('date1','=',$date1)->get(); 
                $retailprice= DB::table('bookings')->where('airline','=',Input::get('airline'))->where('from1','=',Input::get('from1'))->where('to1','=',Input::get('to1'))->where('date1','=',$date1)->sum('retailprice'); 
				$watno = DB::table('bookings')->where('airline','=',Input::get('airline'))->where('from1','=',Input::get('from1'))->where('to1','=',Input::get('to1'))->where('date1','=',$date1)->count(); 
				$approved = DB::table('bookings')->where('airline','=',Input::get('airline'))->where('from1','=',Input::get('from1'))->where('to1','=',Input::get('to1'))->where('date1','=',$date1)->where('status','=','Approved')->count(); 
				}
			elseif (Input::get('caseid')=="2") 
				{
				$bookings = DB::table('bookings')->where('airline','=',Input::get('airline'))->where('flightno','=',Input::get('flightno'))->get(); 
				$retailprice= DB::table('bookings')->where('airline','=',Input::get('airline'))->where('flightno','=',Input::get('flightno'))->sum('retailprice'); 
				$watno = DB::table('bookings')->where('airline','=',Input::get('airline'))->where('flightno','=',Input::get('flightno'))->count(); 
				$approved = DB::table('bookings')->where('airline','=',Input::get('airline'))->where('flightno','=',Input::get('flightno'))->where('status','=','Approved')->count(); 
				}
			elseif (Input::get('caseid')=="3") 
				{
				$date1 = date('Y-m-d', strtotime(Input::get('datepicker1')));
				$bookings = DB::table('bookings')->where('created_at','=',$date1)->where('airline','=',Input::get('airline'))->get();
                $retailprice= DB::table('bookings')->where('created_at','=',$date1)->where('airline','=',Input::get('airline'))->sum('retailprice'); 
				$watno = DB::table('bookings')->where('created_at','=',$date1)->where('airline','=',Input::get('airline'))->count(); 
				$approved = DB::table('bookings')->where('created_at','=',$date1)->where('airline','=',Input::get('airline'))->where('status','=','Approved')->count(); 
				}

			return View::make('airlines.review')->with('bookings', $bookings)->with( 'vacantseats', $vacantseats)->with('retailprice', $retailprice)->with('watno', $watno)->with('approved',$approved);
        } else {
            Session::flush();
            return View::make('/airlines/login');
        }
        
        
    }

    function getBrowse() {
        if (Helpers::checkAirlinesLogin()) {
            return View::make('airlines.browse');
        } else {
            Session::flush();
            return View::make('/airlines/login');
        }
        
    }
    

    function getApprove() {
        $aids = Input::all();
//        echo "<pre>";
//         print_r($aids);
//         die();
        foreach ($aids as $aid) {
            $booking = Bookings::where('tid', '=', $aid)->firstorfail();
            $booking->status = "Approved";

            $booking->save();
        }

        return View::make('airlines.approve')->with('aids', $aids);
    }

    function thome() {
        if (Helpers::checkAirlinesLogin()) {
            return View::make('airlines.template.index');
        } else {
            Session::flush();
            return View::make('/airlines/login');
        }
        
    }

    function getAjax() {
        if (isset($_GET['start']) AND isset($_GET['end'])) {

            $start = $_GET['start'];
            $end = $_GET['end'];
       
//            $obj = NEW Airstats();
//            $results = $obj->getAirstatsDetailsBetweenSelectedDates($start , $end );
//            $data = array();
//            foreach ($results as $key => $value) {
//                $data[$key]['label'] = $value->date1;
//                $data[$key]['value'] = $value->bookings;
//            }
            $obj = NEW Bookings();
            $results = $obj->getBookingDetailsBetweenSelectedDates($start , $end );
                    
            $data = array();
            foreach ($results as $key => $value) {
                $data[$key]['label'] = $value->date1;
                $data[$key]['value'] = $value->bookings;
            }
            
            return json_encode($data);
        }
    }

    function getAjaxbrowse() {
        
        $flightno = Input::get('flightno');
        $date1 = date('Y-m-d', strtotime(Input::get('jsdate1')));
        
//        $results = Bookings::where('date1', '=', $date1)->where('flightno', '=', $flightno)->get();
        $results = DB::table('bookings')->where('date1', '=', $date1)->where('flightno', '=', $flightno)->get();
               
        $jdata = array();

        // 	$results = ORM::for_table('bookings')->where('flightno', $flightno);

       /* foreach ($results as $key => $value) {
            $jdata[$key]['tid'] = $value['tid'];
            $jdata[$key]['from'] = $value['from1'];
            $jdata[$key]['to'] = $value['to1'];
            $jdata[$key]['flightno'] = $value['flightno'];
            $jdata[$key]['date1'] = $value['date1'];
            $jdata[$key]['retailprice'] = $value['retailprice'];
            $jdata[$key]['watno'] = $value['watno'];
            $jdata[$key]['watprice'] = $value['watprice'];
            $jdata[$key]['status'] = $value['status'];
        } */
        
        
            $i= 0;
	      	 foreach ($results as $value) {
	      	 	$i++;
                
	        echo   	'<tr id="brow"><td>'.$value->from1.
	         		'</td><td>'.$value->to1.
	         		'</td><td>'.$value->flightno.
	         		'</td><td>'.$value->date1.
	         		'</td><td>'.$value->retailprice.
	         		'</td><td>'.$value->watno.
	         		'</td><td>'.$value->watprice.
	         		'</td><td>'.$value->status.
	         		'</td><td><input class ="checkbox1" name="'.$i.'" type="checkbox" value='.$value->tid.'></td></tr>'; 
             } 			                
        
//        return json_encode($jdata);
    }
    
    
    
    function getAjaxextrainfo() {
        
        $flightno = Input::get('flightno');
        $date1 = date('Y-m-d', strtotime(Input::get('jsdate1')));
//        $results = DB::table('bookings')->where('date1', '=', $date1)->where('flightno', '=', $flightno)->get();
        
        $vacantseats=0;
        $retailprice= DB::table('bookings')->where('date1','=',$date1)->where('flightno', '=', $flightno)->sum('retailprice'); 
        $watno = DB::table('bookings')->where('date1','=',$date1)->where('flightno', '=', $flightno)->count(); 
        $approved = DB::table('bookings')->where('date1','=',$date1)->where('flightno', '=', $flightno)->where('status','=','Approved')->count();
               
          echo    '<div class="col-lg-3 col-xs-6">
                                <div class="small-box bg-aqua">
                                    <div class="inner">
                                    <strong>'.$vacantseats.'
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
                                    <strong>'.$retailprice.'
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
                                    <strong>'.$watno.'
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
                                    <strong>'.$approved.'
                                    </strong>
                                    <p>
                                        Total Approved
                                    </p>
                                </div>
                                 </div>
                            </div>';
    }
    
    public function getLogout() {

        Session::flush();
        return Redirect::to('/airlines/login');
    }
    
}
