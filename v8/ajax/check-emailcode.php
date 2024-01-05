<?php
session_start();
include("../includes/config.php");

$ecode  = mysqli_real_escape_string($con,$_POST['ecode']);
$userid = mysqli_real_escape_string($con,$_POST['userid']);

if (empty($userid)) { }
elseif(strlen($ecode)!=6){
    //echo '<script>$(".error1").text("Enter a valid email");</script>';
}
else
{
	$check = mysqli_query($con, "select * from users where id='$userid' AND emailCode='$ecode'");
	if(mysqli_num_rows($check)==1)
	{
	    $update = mysqli_query($con, "update users set verifyEmail='YES' where id='$userid'");
	    if($update)
	    {
    	    echo '<script>$(".error1").text("Verified");$(".error1").attr("style", "color: #66bb6a !important");</script>';
    	    echo '<script>$("#ecode").attr("disabled", "disabled")</script>';
    	    echo '<script>$(".ecode").attr("style", "display: none !important");</script>';
    	    echo '<script>$(".custom-checkbox").attr("style", "display: none !important");</script>';
    	    echo "<script>$('.checkout').prop('disabled',false);</script>";
	    }
	}
	else
	{
	    echo '<script>$(".error1").text("Enter a valid");$(".error1").attr("style", "color: #e53935 !important");</script>';
	}
}
?>