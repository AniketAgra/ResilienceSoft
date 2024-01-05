<?php
$post_body = array();
$post_body['auth_info'] = json_encode(array('login' => 'esimAPI', 'password' => '$0%6YrU$jJRh'));
$params = array('id' => '8997212330099714200');
$post_body['params'] = json_encode($params);
$URL = "https://mybilling.globalvoiceconnect.com:443/rest/Account/get_account_info";
$response = sendCurlPost($URL, $post_body);
http_response_code($response['info']['http_code']);
$iccidresult = json_decode($response['data'],true); 
echo "<pre>";
print_r($iccidresult);
echo $iaccount    = $iccidresult['account_info']['i_account'];
echo "<br>";
echo $iaccount    = $iccidresult['account_info']['i_master_account'];


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
    return array('data'=>$res, 'info'=>$info);
}