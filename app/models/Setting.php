<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Setting extends Eloquent implements UserInterface, RemindableInterface {

    public $timestamps = false;

    use UserTrait,
        RemindableTrait;

    protected $table = 'global_price_setting';
    protected $airline_name;

    public function __construct() {
          parent::__construct();
          $this->airline_name = Session::get("airline_name");
    }
    
    public function saveSetting() {
        $return = false;
        $clickFrom = Input::get('ClickFrom');
        
        $price_discount = Input::get('price_discount');
//        $weightage = Input::get('weightage');
        
        if(!empty($price_discount) && is_numeric($price_discount)) {
            $price_data = array(
                'price_discount'=> $price_discount
            );
            
            $result = DB::table('global_price_setting')->where('airline', $this->airline_name)->first();
            
            if(!empty($result) && count($result)> 0) {
                // Update Price Setting 
                DB::table('global_price_setting')->where('airline', $this->airline_name)->update($price_data);
            } else {
                // Add Price setting
                $price_data['airline'] = $this->airline_name;
                DB::table('global_price_setting')->insertGetId($price_data);
            } 

            /*$flightData = array(
                'price_discount'=> $price_discount,
                'weightage'=> $weightage,
                'mode'=> 'Global'
            );*/
            $flightData = array(
                'price_discount'=> $price_discount,
                'mode'=> 'Global'
            );
            /*
            $result = DB::table('flights')->where('mode', 'Specific')->get();
            if(!empty($result) && count($result)> 0) {
                // Not update Specif mode price
            } else {
                $result = DB::table('flights')->where('airline', 'Air india')->update($flightData);
            }
            */
            if($clickFrom=='apply_to_all_flights')
            {
                $result = DB::table('flights')->where('airline', $this->airline_name)->update($flightData);
            }
            else if($clickFrom=='apply_flights_to_global')
            {
                $result = DB::table('flights')->where('airline', $this->airline_name)->where('mode','!=' ,'Specific')->update($flightData);
            }
            $return = true;
        } else {
            $return = false;
        }
        
        return $return;
    }
    
    
    public function getSetting() {
        $results = DB::table('flights')
            ->where('airline', $this->airline_name)
            ->select('*')
            ->get();
        //Helpers::dump($results);die;
        
        return $results ;
        
    }
    public function updateFlightSetting() {
        //Helpers::dump($_POST);
        $price_discount = Input::get('price_discount');
        $flightno = Input::get('flightno');
        
        if(!empty($price_discount) && is_numeric($price_discount)) {
            
            $flightData = array(
                'price_discount'=> $price_discount,
                'mode'=> 'Specific'
            );
            //Helpers::dump($flightData);die;
            
            $result = DB::table('flights')->where('flightno', $flightno)->update($flightData);
            $return = true;
        } else {
        
            $return = false;
        }
        return $return;
    }
   
}
