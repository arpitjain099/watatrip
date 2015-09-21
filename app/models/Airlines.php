<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Airlines extends Eloquent implements UserInterface, RemindableInterface {

public $timestamps = false;
use UserTrait, RemindableTrait;
	protected $table = 'airlines';

	protected $hidden = array('password', 'remember_token');


      public function validateUser($email, $pass) {
            $GLOBALS = array();
            $return = false;

            $query = "SELECT user.* FROM user".
                    " WHERE user.email= '" . $email . "'" .
                    " AND user.password = '" . $pass . "' ";

            $result = DB::select(($query));
            
            if (count($result) > 0) {
                Session::put('airline', $result[0]);
                Session::put('airline_name', $result[0]->airline);
                $return = true;
            } else {
                $return = false;
            }

            return $return;
        }  
        

}
