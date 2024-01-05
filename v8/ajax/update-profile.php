<?php
session_start();
include("../includes/config.php");

$fname  = mysqli_real_escape_string($con,$_POST['fname']);
$lname  = mysqli_real_escape_string($con,$_POST['lname']);
$mobile = mysqli_real_escape_string($con,$_POST['mobile']);
$email  = mysqli_real_escape_string($con,$_POST['email']);

if (empty($email)) {
	echo "<script>alert('Invalid code')</script>";
}
elseif (empty($fname)) {
	echo "<script>alert('Enter first name')</script>";
}
elseif (empty($lname)) {
	echo "<script>alert('Enter last name')</script>";
}
elseif (empty($mobile)) {
	echo "<script>alert('Enter mobile number')</script>";
}
else
{
	$update_profile = mysqli_query($con, "update users set fname='$fname', lname='$lname', mobile='$mobile' where email='$email' AND role='U'");
	if($update_profile)
	{
		echo "<script>alert('Profile updated successfully')</script>";
	}
}
?>
