<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if(!empty($_SERVER['HTTP_CLIENT_IP']))
{
	$ip = $_SERVER['HTTP_CLIENT_IP'];
}
else if(!empty($_SERVER['HTTP_FORWARDED_FOR']))
{
	$ip = $_SERVER['HTTP_FORWARDED_FOR'];
}
else
{
	$ip = $_SERVER['REMOTE_ADDR'];
}

if (!$data = @file_get_contents('http://ip-api.com/json/'.$ip, false, $context)) {
            $error = error_get_last();
           echo "HTTP request failed. Error was: " . $error['message'];
    }
    
$res = json_decode(file_get_contents('http://ip-api.com/json/'.$ip));
print_r($res); die;
//if($res->status=="success")
//{
//    $country = $res->country;
//    $countryCode = $res->countryCode;
//}
?>
