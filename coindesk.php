<?php

class coindesk extends bitcoinbase {
    
    /**
    * Gets current Bitcoinrate
    * 
    * @returns array 
    * "time":{"updated":"Sep 18, 2013 17:27:00 UTC","updatedISO":"2013-09-18T17:27:00+00:00"},"disclaimer":"This data was produced from the CoinDesk Bitcoin Price Index. Non-USD currency data converted using hourly conversion rate from openexchangerates.org","bpi":{"USD":{"code":"USD","symbol":"$","rate":"126.5235","description":"United States Dollar","rate_float":126.5235},"GBP":{"code":"GBP","symbol":"£","rate":"79.2495","description":"British Pound Sterling","rate_float":79.2495},"EUR":{"code":"EUR","symbol":"€","rate":"94.7398","description":"Euro","rate_float":94.7398}}}
    * 
    */
    public function rate(){
        $url = 'https://api.coindesk.com/v1/bpi/currentprice.json';
        $this->getJson($url);
        return $this->_jsonArray;
    }
    
    
}