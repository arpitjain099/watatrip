<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Fdetails extends Eloquent implements UserInterface, RemindableInterface {

    public $timestamps = false;

    use UserTrait,
        RemindableTrait;

    protected $table = 'fdetails';
    protected $hidden = array('password', 'remember_token');

    public function watprice() {
        $watprice = $watprice = $this->retailprice/2;
        $flight = DB::table('flights')->where('flightno', $this->flightno)->first();
        
        if (!empty($flight)) {
            $price_discount = $flight->price_discount;
            if (!empty($price_discount)) {
                $watprice = ($this->retailprice * $price_discount)/100;
            } 
        }
        return $watprice;
    }

}
