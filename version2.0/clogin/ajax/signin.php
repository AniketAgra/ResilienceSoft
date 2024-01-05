<?php
session_start();
include("../../includes/config.php");

$email   = mysqli_real_escape_string($con,$_POST['email']);
$pass    = mysqli_real_escape_string($con,$_POST['pass']);

if (empty($email)) {
    echo '<script>$("#error").html("Please Enter Email Address");$("#error").attr("style", "color: #e53935 !important");</script>';
} 
elseif (empty($pass)) {
	echo '<script>$("#error").html("Please Enter Password");$("#error").attr("style", "color: #e53935 !important");</script>';
} 
else
{
    $checkuser = mysqli_query($con, "select * from users where email='$email' AND password='$pass'");
	if (mysqli_num_rows($checkuser)===1) 
	{
		$row = mysqli_fetch_assoc($checkuser);
		if($row['status']=="A")
		{
		    $_SESSION['userId']  = $row['id'];
		    $_SESSION['dealer']  = $row['dealer'];
		    $_SESSION['name']    = $row['fname'].' '.$row['lname'];
    		$_SESSION['user']    = $row['email'];
    		$_SESSION['mobile']  = $row['mobile'];
    		$_SESSION['company'] = $row['company'];
    		$_SESSION['role']    = $row['role'];
    		
		    if($row['role']=="A")
		    {
		        echo "<script>window.location.reload(true)</script>";
		    }
		    if($row['role']=="Dealer")
		    {
		        echo "<script>window.location.reload(true)</script>";
		    }
		    if($row['role']=="User")
		    {
		        $_SESSION['dealerId'] = $row['dealerId'];
		        echo "<script>window.location.reload(true)</script>";
		    }
		}
		else
		{
		    echo '<script>$("#error").html("Your Account is Inactive").attr("style", "color: #e53935 !important");</script>';
		}
	}
	else
	{
		echo '<script>$("#error").html("Please enter correct Username or Password").attr("style", "color: #e53935 !important");</script>';
	}
    
}
?>    
