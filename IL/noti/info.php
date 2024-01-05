<?php
ini_set('display_errors', 1); 
error_reporting(E_ALL);
include("../includes/config.php");

//setting UTC time
date_default_timezone_set('UTC');

$xml_post = @file_get_contents('php://input');
$xml_content=simplexml_load_string($xml_post);

echo "Received";

$fileName = "scode.txt";
	$xml_file = $fileName;
	$fh       = fopen($xml_file, 'w') or die();
	fwrite($fh, $xml_post);
	fclose($fh);

if ($xml_post) {
	foreach ($xml_content->xpath('//PromotionAlert') as $xml) {
	    $customerId=$xml->Customer['ID'];
	    $customerRef=$xml->{'CustomerReference'};
	    $distributorid = $xml->Distributor['ID'];
		$alertType = $xml->{'AlertType'};
		
		$promotion = $xml->{'Promotion'};
		$moniker=$promotion->{'Moniker'};
		$desc=$promotion->{'Description'};
		$initial = $promotion->{'InitialQuantity'};
		$remaining = $promotion->{'RemainingQuantity'};
		$start = $promotion->{'StartTime'};
		$end = $promotion->{'EndTime'};
		$alertDate = date('Y-m-d H:i:s');
		
		mysqli_query($con, "INSERT INTO promotionAlerts (customerId,customerRef,distId,alertType,moniker,`desc`,initial,remaining,start,end,alertDate) VALUES ('$customerId','$customerRef','$distributorid','$alertType','$moniker','$desc','$initial','$remaining','$start','$end','$alertDate')");
		$last_id = mysqli_insert_id($con);
		
		$order_row = mysqli_fetch_assoc(mysqli_query($con, "select * from orders where status='ACTIVE' and customerId = '$customerId'"));
	
		$curl_handle = curl_init();
		if (!$curl_handle) {
		die('fail to initialize');
		}
		//target URL setup
		curl_setopt($curl_handle, CURLOPT_URL, "http://api.s.im/pip/api/execute.mth");                                                     
		//mime type setup, change if necessary
		curl_setopt($curl_handle, CURLOPT_HTTPHEADER, array("Content-Type: application/xml"));
		//curl_setopt($curl_handle, CURLOPT_INTERFACE, "50.63.75.192");
		curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl_handle, CURLOPT_FAILONERROR, 1);
		curl_setopt($curl_handle, CURLOPT_POST, 1);

        $userName = 'samin.api';
        $password = 'apple';
        if(isset($order_row['msisdn']) && $order_row['msisdn'] != '') {
            $msisdn = $order_row['msisdn'];
            $url = "https://gsm2go.com/new-recharge?utmtype=1&utmsource=".$customerId;

    		mysqli_query($con, "UPDATE promotionAlerts set url = '$url' where alertId = '$last_id'");
            $textMessage = 'Recharge using the below https://gsm2go.com/u/?v='.$last_id;
            
    		$sendRequest='<send-system-short-message version="1"><authentication><username>'.$userName.'</username><password>'.$password.'</password></authentication><number>'.$msisdn.'</number><transport>sms</transport><message-text>'.$textMessage.'</message-text><data-coding-scheme>0</data-coding-scheme></send-system-short-message>';
    		curl_setopt($curl_handle, CURLOPT_POSTFIELDS,$sendRequest);
    		$sentResponse = curl_exec($curl_handle);
    		$sentResponse=simplexml_load_string($sentResponse);
        }
		
	}
}
?>