<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
include("include/config.php");
$orderId = 0;
require('../mailer.php');

if(isset($_GET['orderId']))
{
	$orderId = $_GET['orderId'];
}

if($orderId != 0 && $orderId != '') {
	$sucessFlag = 0;
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

    $createSimRequest='<delete-sim version="1">
    <authentication>
    <username>'.$apiUser.'</username>
    <password>'.$apiPassword.'</password>
    </authentication>
    <iccid>'.$row['ICCID'].'</iccid>
    </delete-sim>';
	curl_setopt($curl_handle, CURLOPT_POSTFIELDS,$createSimRequest);
	//$createSimResponse = curl_exec($curl_handle);
	$createSimResponse = '';
	//$createSim_xml=simplexml_load_string($createSimResponse);
	$apiDetails .= "API Request \n ".$createSimRequest."\n API RESPONSE \n".$createSimResponse;
		if((strpos($createSimResponse,'error') === false)) {
			$createDirRequest='<delete-directory-number version="1"><authentication><username>'.$apiUser.'</username><password>'.$apiPassword.'</password></authentication>
			<directory-number>'.$row['Camel_MSISDN'].'</directory-number></delete-directory-number>';
    		curl_setopt($curl_handle, CURLOPT_POSTFIELDS,$createDirRequest);
			//$createDirResponse = curl_exec($curl_handle);
			$createDirResponse = '';
			//$createDir_xml=simplexml_load_string($createDirResponse);
			$apiDetails .= "API Request \n ".$createDirRequest."\n API RESPONSE \n".$createDirResponse;
			
			if((strpos($createDirResponse,'error') === false)) {
			    $transferCusRequest='<close-customer version="1"><authentication><username>'.$apiUser.'</username><password>'.$apiPassword.'</password></authentication> 
                <subscriberid>'.$orderRow['subscriberId'].'</subscriberid></close-customer>';
        		
        		curl_setopt($curl_handle, CURLOPT_POSTFIELDS,$transferCusRequest);
    			$transferCusResponse = curl_exec($curl_handle);
    			$transferCus_xml=simplexml_load_string($transferCusResponse);
    			$apiDetails .= "API Request \n ".$transferCusRequest."\n API RESPONSE \n".$transferCusResponse;
    			
    			if((strpos($transferCusResponse,'error') === false)) {
    			    $subCusRequest='<set-customer-details version="1"><authentication><username>'.$apiUser.'</username><password>'.$apiPassword.'</password></authentication>
                    <subscriberid>'.$orderRow['subscriberId'].'</subscriberid><notes>eSIM created date: '.date('d-m-Y',strtotime($orderRow['date'])).' and reclaimed on '.date('d-m-Y').' by '.$_SESSION['admin_user'].' order_id: '.$orderId.'. </notes></set-customer-details>';
            		curl_setopt($curl_handle, CURLOPT_POSTFIELDS,$subCusRequest);
        			$subCusResponse = curl_exec($curl_handle);
        			$transferCus_xml=simplexml_load_string($subCusResponse);
        			$apiDetails .= "API Request \n ".$subCusRequest."\n API RESPONSE \n".$subCusResponse;
        			
        			if((strpos($subCusResponse,'error') === false)) {
        			    $sucessFlag = 1;
        			}
    			}
			}
		}
	if($sucessFlag == 1) {
	    $QRpath = '../qr/'.$row['ICCID'].'.png';
	    if (file_exists($QRpath)) {
            unlink($QRpath);
        }
		mysqli_query($con, "update orders set `status`='RECLAIMED',reclaimApi='".$apiDetails."',reclaimDate='".date('Y-m-d H:i:s')."' where id='".$orderId."'");

    	mysqli_query($con, "update ICCID set `status`='PROVISIONED' where id='".$row['id']."'");
    	echo "<script>alert('Reclaim succesfully done'); window.location.href = 'orders.php'</script>";
	} else {
	    mysqli_query($con, "update orders set reclaimApi='".$apiDetails."' where id='".$orderId."'");
    	echo "<script>alert('Reclaim Failed, Check the API details'); window.location.href = 'orders.php'</script>";
	}
}