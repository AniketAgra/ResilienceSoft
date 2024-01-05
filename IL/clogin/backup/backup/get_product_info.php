<?php
$post_body['auth_info'] = json_encode(array('login' => 'esimAPI', 'password' => '$0%6YrU$jJRh'));
$params = array('offset'=>0, 'name'=>'SKU_AC_01_Europe_10GB');
$post_body['params'] = json_encode($params);

$URL = "https://mybilling.telinta.com:443/rest/Product/get_product_list";

$response = sendCurlPost($URL, $post_body);
http_response_code($response['info']['http_code']);
//echo $response['data'];

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
    return array('data'=>$res, 'info'=>$info);
}