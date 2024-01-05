<?php
session_start();
include("../includes/config.php");

$email = mysqli_real_escape_string($con,$_POST['email']);

if (empty($email)) {
    echo '<script>$(".error1").text("Enter email address");</script>';
}
else
{
	$check = mysqli_query($con, "select * from users where email='$email'");
	if(mysqli_num_rows($check)===0)
	{
	    //echo '<script>$(".error1").text("This email is available");$(".error1").attr("style", "color: #66bb6a !important");</script>';
	    echo '<script>$(".error1").html("");$(".error1").attr("style", "color: #66bb6a !important");</script>';
	    echo '<script>$(".input-group-inner .form-control:focus ~ .input-focus-bg").attr("style", "border-color: #66bb6a !important;border-radius: 22px;padding-left:80px");</script>';
	    echo "<script>$('#exist').val('0')</script>";
	}
	else
	{
	    //echo '<script>$(".error1").html("Already registered, <a href=\"login?q='.$_POST['email'].'\">Login?<a>")</script>';
	    echo '<script>$(".error1").html("Already registered, <a href=\"login\">Login?<a>");$(".error1").attr("style", "color: #fe0000 !important");</script>';
	    echo '<script>$(".input-group-inner .form-control:focus ~ .input-focus-bg").attr("style", "border-color: #fe0000 !important;border-radius: 22px;padding-left:80px");</script>';
	    $_SESSION['q'] = $email;
	    echo "<script>$('#exist').val('1')</script>";
	}
}
?>
