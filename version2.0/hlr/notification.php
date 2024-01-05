<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
include('../include/config.php');
$jsonContent = file_get_contents('php://input');
$obj = json_decode($jsonContent);
$postParams = stdToArray($obj);
$type = $postParams['RequestType'];
$message = $postParams['Message'];
$status = $postParams['Status'];

if(isset($postParams['Reference']) && $type = 'PROVIDE' && $status = 'SUCCESS') {
	$workId = $postParams['WorkItemId'];
	$reference = $postParams['Reference'];
	
	mysqli_query($con, "update ICCID set `Status`='PROVISIONED' where workItemId='".$workId."' AND apiReference='".$reference."'");
	
	$resultMsisdn = mysqli_query($con, "select * from ICCID where workItemId='".$workId."' AND apiReference='".$reference."'");
	$row =  mysqli_fetch_array($resultMsisdn);
	mysqli_query($con, "update MSISDN set `Status`='PROVISIONED' where MSISDNs='".$row['Camel_MSISDN']."'");

}
file_put_contents($url."logfilegsmPost.txt", $jsonContent.PHP_EOL,FILE_APPEND);

function stdToArray($obj){
	$reaged = (array)$obj;
	foreach($reaged as $key => &$field){
		if(is_object($field))$field = stdToArray($field);
	}
	return $reaged;
}
?>