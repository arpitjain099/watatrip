<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class import extends Eloquent {

    public function importPriceEngine() {
        
        $query = 'SELECT * FROM city_code';
        $results = DB::select(($query));
        
        $ch = curl_init();// set url
        
        curl_setopt($ch, CURLOPT_URL, 'http://flights.makemytrip.com/makemytrip/service/fareTrend/DEL-IXR/15-03-2015/L2-R3.json');
        //return the as a string
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        // echo output string
        $output = curl_exec($ch);
        $output = json_decode($output);
        $data = array();
        foreach ($output as $key => $row) {
            /*
            $data = array(
                'from'=>
                'to'=>
                'date'=>
                'fno'=>
                'dept'=>
                'arvt'=>
                'aln'=>
            );
             * 
             */
            
        }
        
        return $output;
        curl_close($ch);
        
    }
    
    
    public function watprice() {
        
        $query = 'SELECT * FROM fdetails';
        $fdetails = DB::select(($query));
        foreach($fdetails as $row) {
            $flight = DB::table('flights')->where('flightno', $row->flightno)->first();
            if(!empty($flight)) {
                //calculate Watprice
                $price_discount = $flight->price_discount;
                if(!empty($price_discount)) {
                    $watprice = ($row->retailprice*$price_discount);
                } else {
                    $watprice = $row->retailprice;
                }
                $data = array(
                    'watprice'=>$watprice
                );
                
                DB::table('fdetails')->where('flightno', $row->flightno)->update($data);
            }
            
        }
        echo 'Successfully Updated';
    }
    
}
