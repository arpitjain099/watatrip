<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Bookings extends Eloquent implements UserInterface, RemindableInterface {

    use UserTrait,
    RemindableTrait;

    protected $table = 'bookings';
    protected $hidden = array('password', 'remember_token');
    protected $airline_name;
    
    public function __construct() {
        parent::__construct();
        $this->airline_name  = Session::get('airline_name');
    }

    protected function getDateFormat() {
        return 'Y-m-d';
    }

    public function getTodayBookingDetailcount() {
        
        $result = Bookings::where('created_at', '=', date("Y-m-d"))->where('airline', '=', $this->airline_name)->count();
        return $result;
    }

    public function getTodayExpiryCount() {
        $result = Bookings::where('date1','=',date("Y-m-d"))->where('airline','=',$this->airline_name)->where('status','=','Pending')->count();
        return $result;
    }

    public function getTodayRevenue() {
        $bookings = Bookings::where('created_at', '=', date("Y-m-d"))
                        ->where('airline', '=', $this->airline_name)
                        ->where('status', '=', 'Pending')->get();
        $data = 0;
        foreach ($bookings as $row) {
            $data = $data + $row->watprice;
        }

        return  $data;
    }
    
    public function getRevenuesExpiringCount() {
        $bookings = Bookings::where('date1','=',  date("Y-m-d"))->where('airline','=',$this->airline_name)->get(); 
        $data = 0;
        foreach ($bookings as $row) {
            $data = $data + $row->watprice;
        }

        return  $data;
    }
    
    public function getMostActiveFlights($param) {
        
    }
    
     public function getBookingDetailsBetweenSelectedDates($start, $end) {
        
        
//        $results = DB::table('bookings')
//                ->whereBetween('date1', [$start, $end])
//                ->orderBy('date1', 'asc')
//                ->groupBy('date1')
//                ->get();
        $sql = "SELECT COUNT(date1) as bookings, date1 FROM bookings WHERE date1 BETWEEN '$start' AND '$end' group by date1 order by date1";
        $results= DB::select($sql);
        
              return $results;
    }
    
}
