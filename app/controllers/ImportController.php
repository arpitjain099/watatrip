<?php

use Illuminate\Http\Response;

class ImportController extends BaseController {
    
    public function getPriceEngine() {
        
        $importObj = New import();
        $importObj->importPriceEngine();
    }
    
    public function getWatprice() {
        $importObj = New import();
        $importObj->watprice();
    }
    
    
}
