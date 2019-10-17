<?php

require_once('bitcoinbase.php');    
require_once('coindesk.php');    
require_once('bitcoinde.php');    


$rate1 = new coindesk();
$rs = $rate1->rate();
$bpi = $rs['bpi'];

// UTC Unix timestamp to Locale.
function GmtTimeToLocalTime($time) {
    date_default_timezone_set('UTC');
    $new_date = new DateTime($time);
    $new_date->setTimeZone(new DateTimeZone('Europe/Berlin'));
    return $new_date->format("d.m.Y H:i:s");
}

echo $bpi['EUR']['rate'].' '.$bpi['EUR']['symbol'].' '.GmtTimeToLocalTime($rs['time']['updated']);
