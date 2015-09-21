<?php

class UserController extends BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    //protected $layout = 'layouts.base';

    public function __construct() {
        
    }
    
    public function getIndex() {
        
        if (Helpers::checkUserLogin()) {
            return Redirect::to('/airlines');
        } else {
            return View::make('/admin/login');
        }
    }

    public function getLogin() {
        // echo phpinfo();die;
        if (Helpers::checkUserLogin()) {
            return Redirect::to('/airlines');
        } else {
            //Session::flush();
             return View::make('/admin/login');
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
            return Redirect::to('/user/login')->withErrors($validator); // send back all errors to the login form
        } else {
            // create our user data for the authentication
            $pass = Input::get('password');
            $pass = md5($pass);
            $email = Input::get('email');

            $userdata = array(
                'email' => Input::get('email'),
                'password' => Input::get('password')
            );

            $user = new User();
            if ($user->validateUser($email, $pass)) {
                
                $policyObj = NEW PolicyAgreement();
                $policyAgreement = $policyObj->getLatestPolicyVersion();
                
                $employeeObj = NEW Employee();
                $employeeId = $employeeObj->getEmployeeFromEmail($email);
                
                if(!empty($policyAgreement)) {
                    $policyAgreementId = $policyAgreement->policy_agreement_id;
                    
                    $employeePolicyStatus = $policyObj->isEmployeeAcceptPolicyAgreement($policyAgreementId, $employeeId);
                    
                    if($employeePolicyStatus == 1) {
                         // Redirect To Dashboard Page 
                        // Add To session and Redirect to dashboard
                        $employeeObj->addEmployeeIntoSession($employeeId);
                        $return['result'] = 'dashboard';
                    } else {
                         // Display and Accept Policy Aggrenet 
                        // Show Policy Form and accept after then redirect to dashboard
                        
                        $return['result'] = 'yes';
                        $data = array(
                            'POLICY'=>$policyAgreement,
                            'EMPLOYEE_ID' => $employeeId
                        );
                        $return ['html'] = View::make('/policy_agreement/policy', $data)->render();
                    }
                } else {
                    // Redirect To Dashboard 
                    // Add Employee To session And redirect Dashboard without Policy 
                    
                    $employeeObj->addEmployeeIntoSession($employeeId);
                    $this->layout = '';
                    $return['result'] = 'dashboard';
                }
                echo json_encode($return);
            } else {
                $this->layout = '';
                if (isset($GLOBALS ['error']) && !empty($GLOBALS ['error'])) {
                    //die('Global Error'); 
                    $e = $GLOBALS ['error'];
                    Session::flash('message', array(
                        'class' => 'alert-box success',
                        'content' => 'Invalid Email/Password'
                    ));
                    $return['result'] = 'no';
                    
                } else {
                    $this->layout = '';
                    Session::flash('message', array(
                        'class' => 'alert-box success',
                        'content' => 'Invalid Email/Password'
                    ));
                    
                    $return['result'] = 'no';
                    
                }
                echo json_encode($return);
            }
        }
    }
    
    
    public function getLogout() {

        Session::flush();
        return Redirect::to('/user/login');
    }

    
}
