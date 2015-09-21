<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	public $timestamps = false;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');
        
        
        public function validateUser($email, $pass) {
            $GLOBALS = array();
            $return = false;

            $query = "SELECT employee.email, employee.last_name, employee.first_name, employee.branch_id, " .
                    " user.*, probation.start_date, probation.end_date, branch.branch_name " .
                    " FROM employee LEFT join user" .
                    " ON employee.employee_id = user.employee_id" .
                    "   LEFT JOIN probation" .
                    "   ON employee.employee_id = probation.employee_id" .
                    "   LEFT JOIN branch" .
                    "   ON employee.branch_id = branch.branch_id" .
                    " WHERE employee.email= '" . $email . "'" .
                    " AND user.password = '" . $pass . "' ";

            $result = DB::select(($query));

            if (count($result) > 0) {
                $return = true;
            } else {
                $return = false;
                $GLOBALS ['error'] = 'not_matched';
            }

            return $return;
        }

}
