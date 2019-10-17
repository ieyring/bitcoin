<?php
/**
* 
Orderbook
Abfrage aller Kauf- und Verkaufsangebote (bids und asks).
https://bitcoinapi.de/v1/YOUR_API_KEY/orderbook.json
Rückgabewerte:

    Typ (bids/asks)
    Preis pro Bitcoin (Euro)
    Anzahl BTC

Rate
Abfrage des gewichteten Durchschnittskurses der letzten 3 Stunden und der letzten 12 Stunden.
https://bitcoinapi.de/v1/YOUR_API_KEY/rate.json

Der Wert “rate_weighted” gibt in der Regel den gewichtete Durchschnittskurs der letzten 3 Stunden an. Wird eine kritische Masse an Trades in den letzten 3 Stunden unterschritten, dann wird hier der 12 Stunden Durchschnitt zurückgegeben.
Rückgabewerte:

    rate_weighted
    rate_weighted_3h
    rate_weighted_12h


*     
*/


class bitcoinde {

    protected $_your_api_key;
    
    /**
    * Tradehistory
    Abfrage erfolgreich abgeschlossener Trades. Wenn kein Parameter gesetzt wird, werden alle erfolgreich abgeschlossenen Trades der letzten 7 Tage zurückgeliefert.
    https://bitcoinapi.de/v1/YOUR_API_KEY/trades.json
    Über den Parameter “since” können inkrementelle Daten ab einer bestimmten ID abgefragt werden.
    https://bitcoinapi.de/v1/YOUR_API_KEY/trades.json?since=123
    Rückgabewerte:

    Datum (Unixtimestamp)
    Preis pro Bitcoin (Euro)
    Anzahl BTC
    Eindeutige ID
    * 
    */
    public function rate($since=false){
        $url = 'https://bitcoinapi.de/v1/'.$this->_your_api_key.'/trades.json';
        if(!empty($since)){
            $url .= '?since='.$since;
        }
        $this->getJson($url);
        return $this->_jsonArray;
    }
    public function tradehistory(){}
    public function orderbook(){}
    
    
    
}