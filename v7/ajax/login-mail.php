<?php
session_start();
include("../includes/config.php");

$email = mysqli_real_escape_string($con,$_POST['email']);

if (empty($email)) {
    //echo '<script>$(".err1").text("Please enter username");$(".err1").attr("style", "color: #e53935 !important");</script>';
    echo '<script>$(".err1").html("");</script>';
}
else
{
	$check = mysqli_query($con, "select * from users where email='$email'");
	if(mysqli_num_rows($check)===0)
	{
	    //echo '<script>$(".err1").html("<a href=\"signup?q='.$_POST['email'].'\">Not registered, Signup?<a>");$(".err1").attr("style", "color: #e53935 !important");</script>';
	    echo '<script>$(".err1").html("Not registered, <a href=\"signup\">signup?<a>");$(".err1").attr("style", "color: #fe0000 !important");</script>';
	    echo '<script>$(".input-group-inner .form-control:focus ~ .input-focus-bg").attr("style", "border-color: #fe0000 !important;border-radius: 22px;padding-left:80px");</script>';
	    echo '<script>$("#username ~ .input-focus-bg").attr("style", "border-color: #fe0000 !important;");</script>';
	    $_SESSION['q'] = $email;
	}
 	else
 	{
 	    echo '<script>$(".err1").text("");</script>';
	    
 	}
}
?>
