<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Origin, Content-Type, Accept, Authorization, X-Request-With, X-CLIENT-ID, X-CLIENT-SECRET");
header('Access-Control-Allow-Credentials: true');

$start_date = '2022-07-26 00:00:00';
$end_date   = date('Y-m-d', strtotime("+29 day")).' 00:00:00';

$post_body = array();
$post_body['auth_info'] = json_encode(array('login' => 'esimAPI', 'password' => '$0%6YrU$jJRh'));
$params = array(
	'account_info' => array("i_account" => 44859393,
		"assigned_addons" => [
			array("i_product"=>34139, "addon_effective_from"=>$start_date, "addon_effective_to"=>$end_date)
		]));
// $params = array(
// 	'account_info' => array(
// 		"i_account" => 44859360, 
// 		"firstname" => "Test", 
// 		"lastname" => "Demo", 
// 		"email" => "abc@abc.com", 
// 		"subscriber_email" => "abc@abc.com", 
// 		"assigned_addons" => [array("i_product" => 34139), array("i_product" => 34137)]));



$post_body['params'] = json_encode($params);
$URL = "https://mybilling.telinta.com:443/rest/Account/update_account";
$response = sendCurlPost($URL, $post_body);
http_response_code($response['info']['http_code']);
// echo $response['data'];
$result = json_decode($response['data'],true); 
echo "<pre>";
print_r($result); 

function sendCurlPost($url, $post_body)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post_body);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

    $res = curl_exec($ch);
    $info = curl_getinfo($ch);
    return array('data' => $res, 'info' => $info);
}