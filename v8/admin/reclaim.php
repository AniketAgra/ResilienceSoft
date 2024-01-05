<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include("include/config.php");
$orderId = 0;

require('../mailer.php');

if(isset($_GET['orderId']))
{
	echo $orderId = $_GET['orderId'];
}

if($orderId != 0 && $orderId != '') {
	$sucessFlag = 0;
	echo $sucessFlag;
    $resultOrders = mysqli_query($con, "select * from orders where id='".$orderId."'");
	$orderRow =  mysqli_fetch_array($resultOrders);

	$resultIccid = mysqli_query($con, "select * from ICCID where id='".$orderRow['inventoryId']."' LIMIT 0,1");
	$row =  mysqli_fetch_array($resultIccid);

	$apiUser = 'samin.api';
	$apiPassword = 'apple';
	$apiDetails = '';
	$apiResponseDetails = '';
	$curl_handle = curl_init();
	if (!$curl_handle) {
		die('fail to initialize');
	}
	//target URL setup
	curl_setopt($curl_handle, CURLOPT_URL, "https://api.s.im/pip/api/execute.mth");                                                     
	//mime type setup, change if necessary
	curl_setopt($curl_handle, CURLOPT_HTTPHEADER, array("Content-Type: application/xml"));
	//curl_setopt($curl_handle, CURLOPT_INTERFACE, "50.63.75.192");
	curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($curl_handle, CURLOPT_FAILONERROR, 1);
	curl_setopt($curl_handle, CURLOPT_POST, 1);

	/*$setSubRequest='<set-subscriber-details version="1">
<authentication>
<username>'.$apiUser.'</username>
<password>'.$apiPassword.'</password>
</authentication>
<iccid>'.$row['ICCID'].'</iccid>
<title></title>
<first-name>Dead eSIM '.$row['Camel_MSISDN'].'</first-name>
<middle-initials></middle-initials>
<surname></surname>
</set-subscriber-details>';
	curl_setopt($curl_handle, CURLOPT_POSTFIELDS,$setSubRequest);
	$setSubResponse = curl_exec($curl_handle);
	$setSub_xml=simplexml_load_string($setSubResponse);
	$apiDetails .= "API Request \n ".$setSubRequest."\n API RESPONSE \n".$setSubResponse;
    	if((strpos($setSubResponse,'error') === false)) {*/
    	    $createSimRequest='<update-sim version="1"> <authentication>
    <username>'.$apiUser.'</username>
    <password>'.$apiPassword.'</password></authentication>
    <iccid>'.$row['ICCID'].'</iccid>
    <identity>
    <set-imsi>'.$row['Camel_IMSI'].'</set-imsi>
    <set-primary-msisdn>'.substr($row['ICCID'], -14).'</set-primary-msisdn>
    </identity>
    </update-sim>';
    		curl_setopt($curl_handle, CURLOPT_POSTFIELDS,$createSimRequest);
    		$createSimResponse = curl_exec($curl_handle);
    		$createSim_xml=simplexml_load_string($createSimResponse);
    		$apiDetails .= "API Request \n ".$createSimRequest."\n API RESPONSE \n".$createSimResponse;
        		if((strpos($createSimResponse,'error') === false)) {
        			$createDirRequest='<delete-directory-number version="1"><authentication><username>'.$apiUser.'</username><password>'.$apiPassword.'</password></authentication>
        			<directory-number>'.$row['Camel_MSISDN'].'</directory-number></delete-directory-number>';
            		curl_setopt($curl_handle, CURLOPT_POSTFIELDS,$createDirRequest);
        			$createDirResponse = curl_exec($curl_handle);
        			$createDir_xml=simplexml_load_string($createDirResponse);
        			$apiDetails .= "API Request \n ".$createDirRequest."\n API RESPONSE \n".$createDirResponse;
        			
        			if((strpos($createDirResponse,'error') === false)) {
        			    $sucessFlag = 1;
        			}
        		}
    	//}
	if($sucessFlag == 1) {
		mysqli_query($con, "update orders set `status`='RECLAIMED',reclaimApi='".$apiDetails."' where id='".$orderId."'");

    	mysqli_query($con, "update ICCID set `status`='PROVISIONED' where id='".$row['id']."'");
    	echo "<script>alert('Reclaim succesfully done'); window.location.href = 'orders.php'</script>";
	} else {
	    mysqli_query($con, "update orders set reclaimApi='".$apiDetails."' where id='".$orderId."'");
    	echo "<script>alert('Reclaim Failed, Check the API details'); window.location.href = 'orders.php'</script>";
	}
}