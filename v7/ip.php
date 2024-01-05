<?php
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


$res = json_decode(file_get_contents('http://ip-api.com/json/'.$ip));
if($res->status=="success")
{
    $country = $res->country;
    $countryCode = $res->countryCode;
}
?>