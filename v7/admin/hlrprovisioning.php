<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
include("include/config.php");

$result = mysqli_query($con, "select * from ICCID where `status`='AVAILABLE' LIMIT 0,1");          
while($r = mysqli_fetch_array($result)) {
	$resultMsisdn = mysqli_query($con, "select * from MSISDN where `Status`='AVAILABLE' LIMIT 0,1");
	$row =  mysqli_fetch_array($resultMsisdn);
	$targetUrl = "https://pplportal.manxtelecom.im/api/provisioning/provide";
	echo $request = '{
		"Subscriber": {
			"Client": "BST",
			"Primary": {
				"Name": "manxcamel",
				"IMSI": "'.$r['Camel_IMSI'].'",
				"MSISDN": "'.$row['MSISDNs'].'",
				"HLRProfile": ""
			},
		},
		"UserName": "samin@blueskytelecom.com",
		"Password": "K3rw5!t7"
	}';
	$curl_handle = curl_init();
	if (!$curl_handle) {
	die('fail to initialize');
	}
	curl_setopt($curl_handle, CURLOPT_URL, $targetUrl);                                                     
	//mime type setup, change if necessary
	curl_setopt($curl_handle, CURLOPT_HTTPHEADER, array("Content-Type: application/json"));
	curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($curl_handle, CURLOPT_FAILONERROR, 1);
	curl_setopt($curl_handle, CURLOPT_POST, 1);
	curl_setopt($curl_handle, CURLOPT_POSTFIELDS,$request);
	echo $response = curl_exec($curl_handle);
	$resData = json_decode($response);
	$workId = $resData->WorkItemId;
	if(isset($resData->Reference) && $resData->Reference != 'INVALID') {
		$reference = $resData->Reference;
		mysqli_query($con, "update MSISDN set `Status`='WAITING HLR RESPONSE' where `Status`='AVAILABLE' and id='".$row['id']."'");
		mysqli_query($con, "update ICCID set Camel_MSISDN='".$row['MSISDNs']."',`Status`='WAITING HLR RESPONSE',apiRequest='".$request."',apiResponse='".$response."',workItemId='".$workId."',apiReference='".$reference."' where `Status`='AVAILABLE' and id='".$r['id']."'");
	} else { 
		mysqli_query($con, "update ICCID set `Status`='HLR FAILED',apiRequest='".$request."',apiResponse='".$response."',workItemId='".$workId."' where `Status`='AVAILABLE' and id='".$r['id']."'");
	}
}