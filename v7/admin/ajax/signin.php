<?php
session_start();

include("../include/config.php");

$email   = mysqli_real_escape_string($con,$_POST['email']);
$pass    = mysqli_real_escape_string($con,$_POST['pass']);

if (empty($email)) {
	echo "Email is Required";
}
elseif (empty($pass)) {
	echo "Password is Required";
}
else
{
	$login = mysqli_query($con, "select * from users where email='$email' And password='$pass'");
	if (mysqli_num_rows($login)===1) 
	{
		$row = mysqli_fetch_array($login);
		$_SESSION['name'] = $row['fname']." ".$row['lname'];
		$_SESSION['role'] = $row['role'];
		$_SESSION['user'] = $row['email'];
		$_SESSION['adminUserId'] = $row['id'];
        echo "<script>window.location.reload()</script>";
	}
	else
	{
		echo "Please Enter Correct Password";
	}
}
?>