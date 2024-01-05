<?php
session_start();
include("../../include/config.php");

$id      = $_POST['id'];
$name    = $_POST['name'];
$tags    = $_POST['tags'];
$zone    = $_POST['zone'];
$gb      = $_POST['gb'];
$mins    = $_POST['mins'];
$sms     = $_POST['sms'];
$days    = $_POST['days'];
$usd     = $_POST['usd'];
$moniker = $_POST['moniker'];
$status  = $_POST['status'];
$desc    = $_POST['desc'];
$shelf_time = $_POST['shelf_time'];
$notes  = $_POST['notes'];

if (empty($name)) {
	echo "Enter Plan Name";
}
if (empty($tags)) {
	echo "Enter Tags";
}
elseif (empty($zone)) {
	echo "Select Zone";
}
elseif (empty($gb) && empty($mins) && empty($sms)) {
	echo "Please fill least 1 value in GB, Mins or SMS";
}
elseif (empty($days)) {
	echo "Enter Days";
}
elseif (empty($usd)) {
	echo "Enter USD";
}
elseif (empty($status)) {
	echo "Select Status";
}
else
{
	$update = mysqli_query($con, "update plans set plan_name='$name', zone_id='$zone', GB='$gb', Mins='$mins', SMS='$sms', Days='$days', content='$desc', USD='$usd', Moniker='$moniker', tags='$tags', status='$status', shelf_time='$shelf_time', notes='$notes' where id='$id'");
	if($update)
	{
		echo "Plan Updated Successfully";
	}
}
?>