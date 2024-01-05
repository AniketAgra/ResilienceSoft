<?php
session_start();
include("../include/config.php");

$planid   = mysqli_real_escape_string($con,$_POST['planid']);
$permonth = mysqli_real_escape_string($con,$_POST['permonth']);
$addoneid = mysqli_real_escape_string($con,$_POST['addoneid']);
$esim     = mysqli_real_escape_string($con,$_POST['esim']);
$total    = mysqli_real_escape_string($con,$_POST['total']);
$email    = mysqli_real_escape_string($con,$_POST['email']);
$pass     = mysqli_real_escape_string($con,$_POST['pass']);

if (empty($email)) {
	echo '<span class="text-danger">Email is required</span>';
}
elseif (empty($pass)) {
	echo '<span class="text-danger">Password is required</span>';
}
else
{
	$login = mysqli_query($con, "select * from users where email='$email' And password='$pass' AND role='U'");
	if (mysqli_num_rows($login)===1) 
	{
	    $select_addon = mysqli_query($con, "select * from addons where id='$addoneid'");
	    $addon_row = mysqli_fetch_assoc($select_addon);
	    $select_plan = mysqli_query($con, "select * from plans where id='$planid'");
	    $plan_row = mysqli_fetch_assoc($select_plan);
	    $insert_orders = mysqli_query($con, "insert into orders (email,plan_id,GB,add_GB,Mins,SMS,Days,esimLive,USD,status) values ('$email','$planid','".$plan_row['GB']."','".$addon_row['Value']."','".$plan_row['Mins']."','".$plan_row['SMS']."','".$plan_row['Days']."','$esim','$total','D')");
		$row = mysqli_fetch_array($login);
		
		$_SESSION['user'] = $row['email'];
		$_SESSION['name'] = $row['fname'];
		$_SESSION['role'] = $row['role'];
		$_SESSION['orderid'] = mysqli_insert_id($con);
        echo "<script>window.location.reload()</script>";
	}
	else
	{
		echo '<span class="text-danger">Please enter correct password</span>';
	}
}
?>