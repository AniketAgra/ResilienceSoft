<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Origin, Content-Type, Accept, Authorization, X-Request-With, X-CLIENT-ID, X-CLIENT-SECRET");
header('Access-Control-Allow-Credentials: true');

// $method = $_SERVER['REQUEST_METHOD'];
// $json_post_body = json_decode(file_get_contents('php://input'), true);

// $SERVICE = $json_post_body['service'];
// $METHOD = $json_post_body['method'];
// $REALM = $json_post_body['realm'];
// $AUTH_INFO = $json_post_body['auth_info'];
// $I_ENV = $json_post_body['i_env'];
// $PARAMS = $json_post_body['params'];

$SERVICE = "Account";
$METHOD = "update_account";

$post_body = array();

if ($SERVICE && $METHOD) {

    $post_body['auth_info'] = json_encode(array('login' => 'esimAPI', 'password' => '$0%6YrU$jJRh'));
    $params = array('account_info' => array("i_account" => 44859360, "firstname" => "Samin_Test", "lastname" => "Samin_LastName_Test", "subscriber_email" => "samin@gvc.com", "email" => "samin2@gvc.com"));
    $post_body['params'] = json_encode($params);

    // if ($json_post_body['params']) {
    //     $post_body['params'] = json_encode($params);
    // }

    $port = 443;

    // if ($REALM == 'Account') {
    //     $port = 8443;
    // }

    // if ($AUTH_INFO) {
    //     $post_body['auth_info'] = json_encode($AUTH_INFO);
    // }



    // if ($_POST['auth_info']) {
    //     $post_body['auth_info'] = $_POST['auth_info'];
    // }

    // if ($REALM == 'isReseller') {
    //     $port = 8442;
    // }

    // if ($REALM == "isAdmin") {
    //     $port = 443;
    // }
    $URL = "https://mybilling.globalvoiceconnect.com:" . $port . "/rest/" . $SERVICE . "/" . $METHOD;

    $response = sendCurlPost($URL, $post_body);
    http_response_code($response['info']['http_code']);
    echo $response['data'];
}


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