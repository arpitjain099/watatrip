<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Airstats extends Eloquent implements UserInterface, RemindableInterface {

public $timestamps = false;
use UserTrait, RemindableTrait;
		protected $table = 'airstats';

	protected $hidden = array('password', 'remember_token');

    public function getAirstatsDetailsBetweenSelectedDates($start, $end) {
        
        
        $results = DB::table('airstats')
                ->where('date1', '>=', $start)
                ->where('date1', '<=', $end)
                 ->orderBy('date1', 'desc')
                ->get();
        
        return $results;
    }


}


