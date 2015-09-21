<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Flights extends Eloquent implements UserInterface, RemindableInterface {

    public $timestamps = false;

    use UserTrait,RemindableTrait;

    protected $table = 'flights';
    protected $hidden = array('password', 'remember_token');
    
    public function addFlights() {
        
        
    }
    
    

}
