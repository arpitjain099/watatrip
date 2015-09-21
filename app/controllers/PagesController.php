<?php

class PagesController extends BaseController {

    function home() {
        $flights = Flights::all();
        return View::make('users.hello')->with('flights', $flights);
    }

    function form() {
        return View::make('users.form');
    }
    
    function flights() {
        
        $date1 = date('Y-m-d', strtotime(Input::get('datepicker')));
               
        $flights = Flights::where('from1', '=', Input::get('from1'))->where('to1', '=', Input::get('to1'))->get();
//        $flights = DB::table('flights')->where('from1', '=', Input::get('from1'))->where('to1', '=', Input::get('to1'))->get();

        return View::make('users.flights')->with('flights', $flights)->with('date1', $date1);
    }

    function storeFlights() {
        
        /// calculate duration
        $deptime1 = Input::get('deptime');
        $arrtime2 = Input::get('arrtime');
        $duration = $this->calculateduration($deptime1,$arrtime2);
        /*list($hours, $minutes) = explode(':', $deptime1);
        $startTimestamp = mktime($hours, $minutes);

        list($hours, $minutes) = explode(':', $arrtime2);
        $endTimestamp = mktime($hours, $minutes);

        $seconds = $endTimestamp - $startTimestamp;
        $minutes = ($seconds / 60) % 60;
        $hours = floor($seconds / (60 * 60));
        $duration= sprintf("%02d",$hours).":".sprintf("%02d",$minutes); */
        /// calculate duration ends here
                
        $day = implode(Input::get('day'), ',');
        $flight = new Flights();
        $flight->airline = Input::get('airline');
        $flight->from1 = Input::get('from1');
        $flight->to1 = Input::get('to1');
        $flight->flightno = Input::get('flightno');
        $flight->deptime = Input::get('deptime');
        $flight->arrtime = Input::get('arrtime');
//        $flight->duration = Input::get('duration');
        $flight->duration = $duration;
        $flight->days = $day;
        $flight->save();
        
        $this->daterun($day);

        return Redirect::to('/airlines/add-flights');
    }

    function daterun($days) {
        $days_arr = explode(',', $days);
        
        $date1 = date('Y-m-d');
        $day_no="";
        for ($i = 0; $i < 30; $i++) {
            $timestamp = strtotime($date1);
            $day_no = date('w', $timestamp); // (0 to 6, 0 being sunday, and 6 being saturday) 
                if(in_array($day_no, $days_arr) && $day_no!="") {  // check the day is in the list
                        DB::table('fdetails')->insert(
                        array('airline'=> Input::get('airline'),'flightno' => Input::get('flightno'), 'date1' => $date1));
                }

                $date1 = date('Y-m-d', strtotime("$date1 +1 day"));
                $day_no="";
        }

        return;
    }
    
    

    function daterunall() {

//        $flights = Flights::where('airline', '=', 'Air India')->get();
        $flights = Flights::get();
       
        foreach ($flights as $flight) {
          
           $days_arr = explode(',', $flight->days);
        
        $date1 = date('Y-m-d');
        $day_no="";
        for ($i = 0; $i < 30; $i++) {
            $timestamp = strtotime($date1);
            $day_no = date('w', $timestamp); // (0 to 6, 0 being sunday, and 6 being saturday) 
                if(in_array($day_no, $days_arr) && $day_no!="") {  // check the day is in the list
         
//                    $num_rows = Fdetails::where('flightno', '=', $flight->flightno)->where('date1', '=', $date1)->count();
                    $num_rows = DB::table('fdetails')->where('flightno', '=', $flight->flightno)->where('date1', '=', $date1 )->count();
                    
                    if($num_rows == 0)
                    {
                        echo "update";
                         DB::table('fdetails')->insert(array('airline'=>$flight->airline, 'flightno' => $flight->flightno, 'date1' => $date1));

                    }
                    echo "<br>";
                }
                else
                {
                    $num_rows = DB::table('fdetails')->where('flightno', '=', $flight->flightno)->where('date1', '=', $date1 )->count();
                    echo $num_rows;
                    if($num_rows > 0)
                    {
                        echo 'disable';
                         
                     DB::table('fdetails')->where('flightno', '=', $flight->flightno)->where('date1', '=', $date1 )
                    ->update(array('status' => 0));   
                    }
                    echo "<br>";
                }

                $date1 = date('Y-m-d', strtotime("$date1 +1 day"));
                $day_no="";
               
        } 
          
            
//            $date1 = date('Y-m-d');
//            $flightno = $flight->flightno;
//
//            for ($i = 0; $i < 30; $i++) {
//
//                DB::table('fdetails')->insert(array('airline'=>$flight->airline, 'flightno' => $flightno, 'date1' => $date1, 'retailprice' => rand(3000, 7000), 'watno' => "1"));
//                $date1 = date('Y-m-d', strtotime("$date1 +1 day"));
//            }
        }

        return 'Done';
    }
    
    
    function updateFlights() {
        
          /// calculate duration
        $deptime1 = Input::get('deptime');
        $arrtime2 = Input::get('arrtime');
        $duration = $this->calculateduration($deptime1,$arrtime2);
        /// calculate duration ends here
                
        $day = implode(Input::get('day'), ',');
        
        
        
        DB::table('flights')->where('flightno', '=', Input::get('flightno'))
                    ->update(array('airline' => Input::get('airline'),
        'from1' => Input::get('from1'),
        'to1' => Input::get('to1'),
        'deptime' => Input::get('deptime'),
        'arrtime' => Input::get('arrtime'),
        'duration' => $duration,
        'days' => $day));   
        

        return Redirect::to('/airlines/edit-flights/'.Input::get('flightno'));
    }
    
    
    
    function calculateduration($deptime1,$arrtime2)
    {
        list($hours, $minutes) = explode(':', $deptime1);
        $startTimestamp = mktime($hours, $minutes);

        list($hours, $minutes) = explode(':', $arrtime2);
        $endTimestamp = mktime($hours, $minutes);

        $seconds = $endTimestamp - $startTimestamp;
        $minutes = ($seconds / 60) % 60;
        $hours = floor($seconds / (60 * 60));
        if($hours<0){ $hours= 24 + $hours; }
        $duration= sprintf("%02d",$hours).":".sprintf("%02d",abs($minutes));
        return $duration;
    }

    function bookings() {
        $booking = new Bookings();
        $booking->airline = Input::get('airline');
        $booking->flightno = Input::get('flightno');
        $booking->from1 = Input::get('from1');
        $booking->to1 = Input::get('to1');
        $booking->date1 = Input::get('date1');
        $booking->btime = time();
        $booking->watno = Input::get('watno');
        $booking->watprice = Input::get('watprice');
        $booking->retailprice = Input::get('retailprice');
        $booking->tid = 'WAT' . rand(1000, 1000000);
        $booking->status = 'Pending';

        $booking->save();

        return View::make('users.bookings')->with('booking', $booking);
    }

    function confirm() {
        $bookings = Bookings::where('tid', '=', Input::get('tid'))->firstorfail();
        $bookings->title = Input::get('title');
//        $bookings->pname = Input::get('pname');
        $bookings->pfname = Input::get('pfname');
        $bookings->plname = Input::get('plname');
        $bookings->pemail = Input::get('pemail');
        $bookings->pphone = Input::get('pphone');
        $bookings->paddress = Input::get('paddress');

        $bookings->save();


        $fdetail = Fdetails::where('flightno', '=', $bookings->flightno)->where('date1', '=', $bookings->date1)->increment('watno');

        return View::make('users.confirm')->with('bookings', $bookings);
    }

    function autocomplete() {
        $term = Input::get('from1');

        $results = array();

        $queries = DB::table('cities')->where('city', 'LIKE', '%' . $term . '%')->take(5)->get();

        foreach ($queries as $query) {
            $results[] = [ 'value' => $query->city];
        }
        return Response::json($results);
    }
    
    function cheapestprice() {
            //$list=array('AMD','BHO','BLR','BOM','CCU','DEL','GOI','HYD','LKO','MAA','PNQ','VTZ');
            // $datelist=array('03-04-2015','08-04-2015','13-04-2015','18-04-2015','23-04-2015','28-04-2015');
                  
            $datelist= array(); 
            $datelist[]= $date1=  date('d-m-Y');
            for($i=0;$i<=5;$i++)//get list of date in next 30 days
            {
                $datelist[] = $date1= date('d-m-Y', strtotime("$date1 +5 day"));
            }
            
            $result =DB::table('city_pair')->get();// get all the pairs of city 
             
            foreach ($result as $value) {
                for($z=0;$z<count($datelist);$z++){
 
                     $url='http://flights.makemytrip.com/makemytrip/service/fareTrend/'.$value->from1.'-'.$value->to1.'/'.$datelist[$z].'/L2-R3.json';


                $curl = curl_init();
                curl_setopt_array($curl, array(
                CURLOPT_RETURNTRANSFER => 1,
                CURLOPT_URL => $url
            ));	               //'http://flights.makemytrip.com/makemytrip/service/fareTrend/IXR-DEL/29-01-2015/L2-R3.json'
            $result = curl_exec($curl);
            $json = json_decode($result);
            
            $date2="";
            foreach ($json as $jsonlist) {
                echo $date2 = gmdate("Y-m-d", ($jsonlist->day)/1000); 
                echo "<br>";
                echo $jsonlist->flt->adf;
                echo "<br>";
                if(isset($jsonlist->flt->adf) && $jsonlist->flt->adf!=""){
                    $num_rows = DB::table('cheapest_price')->where('from1', '=', $value->from1)->where('to1', '=', $value->to1)->where('date1', '=', $date2 )->get();
                    if(count($num_rows)==0){
                        DB::table('cheapest_price')->insert( array('date1'=> $date2,'from1' => $value->from1, 'to1' => $value->to1, 'cheap_price' =>$jsonlist->flt->adf ));
                        echo "inserted<br>";
                     }
                 }

            }
        
          }   
        
        }
    } 

}
