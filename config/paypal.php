<?php

return array(
/** set your paypal credential **/
'client_id' =>'AYuYF-MWq-Dmk6OVskBaf1T4REPUrHjkZzddWJGCvNskhqzQgwxfd6ote0TnT6XixJC3u1CNTyVsCDuO',
'secret' => 'ENOd8V24LLGjPFRdN4o0BwIbKw9pRjNORTFu_-5fiiFqY2n3GA6PsVR37PBu3hD23no0CKpkoEUvGnjW',
/**
/**
* SDK configuration 
*/
'settings' => array(
/**
* Available option 'sandbox' or 'live'
*/
'mode' => 'sandbox',
/**
* Specify the max request time in seconds
*/
'http.ConnectionTimeOut' => 1000,
/**
* Whether want to log to a file
*/
'log.LogEnabled' => true,
/**
* Specify the file that want to write on
*/
'log.FileName' => storage_path() . '/logs/paypal.log',
/**
* Available option 'FINE', 'INFO', 'WARN' or 'ERROR'
*
* Logging is most verbose in the 'FINE' level and decreases as you
* proceed towards ERROR
*/
'log.LogLevel' => 'FINE'
),
);