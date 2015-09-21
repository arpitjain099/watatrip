<?php
use Illuminate\Http\Response;

class SettingController extends BaseController {
    
    public function getIndex() {
        $data = array();
        return View::make('airlines.setting', $data);
    }
    
    public function postSave() {
        //$this->template = '';
        $data = array();
        $settingObj = NEW Setting();
        
        if($settingObj->saveSetting()) {
            echo 'yes';
        } else {
            echo 'no';
        }
        
    }
    
    public function postSaveGlobal() {
        
        //$this->template = '';
        $data = array();
        $settingObj = NEW Setting();
        
        if($settingObj->saveSetting()) {
            echo 'yes';
        } else {
            echo 'no';
        }
        
    }
    
    public function postUpdateFlight() {
        $settingObj = NEW Setting();
        
        if($settingObj->updateFlightSetting()) {
            echo 'yes';
        } else {
            echo 'no';
        }
    }
    
    
    
    public function getFlightSetting() {
        $data = array();
        
        $settingObj = NEW Setting();
        $flights = $settingObj->getSetting();
        
        $data['FLIGHTS'] = $flights ;
        
        return View::make('airlines.flight_setting', $data);
    }
    
}
