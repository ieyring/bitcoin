<?php

class coindesk extends bitcoinbase {
    
    /**
    * Gets current Bitcoinrate
    * 
    * @returns array 
    * {"time":{
    *   "updated":"Oct 17, 2019 12:38:00 UTC",
    *   "updatedISO":"2019-10-17T12:38:00+00:00",
    *   "updateduk":"Oct 17, 2019 at 13:38 BST"},
    *   "disclaimer":"This data was produced from the CoinDesk Bitcoin Price Index (USD). Non-USD currency data converted using hourly conversion rate from openexchangerates.org",
    *   "bpi":{
    *       "USD":{
    *           "code":"USD",
    *           "rate":"8,044.2417","description":"United States Dollar","rate_float":8044.2417},
    *       "EUR":{
    *           "code":"EUR",
    *           "rate":"7,236.6159",
    *           "description":"Euro",
    *           "rate_float":7236.6159
    *       }
    *   }
    * }
    * 
    */
    public function rate(){
        $currency = 'eur';
        $url = 'https://api.coindesk.com/v1/bpi/currentprice/'.$currency.'.json';
        $this->getJson($url);
        return $this->_jsonArray;
    }
    
    
}