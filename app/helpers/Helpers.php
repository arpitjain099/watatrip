<?php

class Helpers {

    public static function dump($array) {

        echo '<pre>';
        print_r($array);
        echo '</pre>';
    }

    

    public static function checkAirlinesLogin() {
        $user = Session::get('airline');

        if ( !empty($user->user_id) ) {
            return 1;
        } else {
            return 0;
        }
    }
    
    public static function getPriceEngine() {
        $ch = curl_init();// set url
        
        curl_setopt($ch, CURLOPT_URL, 'http://flights.makemytrip.com/makemytrip/service/fareTrend/DEL-IXR/15-02-2015/L2-R3.json');
        //return the as a string
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        // echo output string
        $output = curl_exec($ch);
        $output = json_decode($output);
        return $output;
        curl_close($ch);
        
    }
    
    
}
