<?php
session_start();
include("../includes/config.php");

$mcode  = mysqli_real_escape_string($con,$_POST['mcode']);
$userid = mysqli_real_escape_string($con,$_POST['userid']);


if (empty($userid)) { }
elseif(strlen($mcode)!=4){
    //echo '<script>$(".error2").text("Enter valid mobile code");</script>';
}
else
{
	$check = mysqli_query($con, "select * from users where id='$userid' AND mobileCode='$mcode'");
	if(mysqli_num_rows($check)==1)
	{
	    $update = mysqli_query($con, "update users set verifyMobile='YES' where id='$userid'");
	    if($update)
	    {
    	    echo '<script>$(".error2").text("Verified");$(".error2").attr("style", "color: #66bb6a !important");</script>';
    	    echo '<script>$("#mcode").attr("disabled", "disabled")</script>';
    	    echo '<script>$(".mcode").attr("style", "display: none !important");</script>';
    	    echo '<script>$(".custom-checkbox").attr("style", "display: none !important");</script>';
    	    echo "<script>$('.checkout').prop('disabled',false);</script>";
	    }
	}
	else
	{
	    echo '<script>$(".error2").attr("style", "color: #e53935 !important");</script>';
	    echo '<script>$(".error2").html("Enter valid code")</script>';
	}
}
?>