<?php
session_start();
include("../includes/config.php");

$email   = mysqli_real_escape_string($con,$_POST['email']);
$pass    = mysqli_real_escape_string($con,$_POST['pass']);

if (empty($email)) {
    echo '<script>$(".err1").html("Enter Username");$(".err1").attr("style", "color: #e53935 !important");</script>';
} 
elseif (empty($pass)) {
	echo '<script>$(".err2").html("Enter Password");$(".err2").attr("style", "color: #e53935 !important");</script>';
} 
else
{
	$checkuser = mysqli_query($con, "select * from users where email='$email' And role='U'");
	if (mysqli_num_rows($checkuser)===1) 
	{
	    $checkpass = mysqli_query($con, "select * from users where email='$email' And password='$pass' AND role='U'");
    	if (mysqli_num_rows($checkpass)===1) 
    	{
    		$row = mysqli_fetch_array($checkpass);
    		$date = DATE('Y-m-d H-i-s');
    		$update = mysqli_query($con, "update users set last_login='$date' where id='".$row['id']."'");
    		if($update)
    		{
        		$_SESSION['userId'] = $row['id'];
        		$_SESSION['user'] = $row['email'];
        		$_SESSION['phone'] = $row['mobile'];
        		$_SESSION['fname'] = $row['fname'];
        		$_SESSION['lname'] = $row['lname'];
        		$_SESSION['name'] = $row['fname'].' '.$row['lname'];
        		$_SESSION['role'] = $row['role'];
        		$_SESSION['userCompany'] = $row['company'];
        	    echo '<script>
                $( "#login" ).addClass( "onclic");
                setTimeout(function() {
                    $( "#login" ).removeClass( "onclic",350 );
                    $( "#login" ).addClass( "validateBtn",350);
                    setTimeout(function() {
                        window.location.reload();
                    }, 500 );
                }, 500 );
                </script>';
    		}
    	}
    	else
    	{
    	    echo '<script>$("#userid").val("'.$_POST['email'].'");</script>';
    	    echo '<script>$("#forgot-password").show();</script>';
    		echo '<script>$(".err2").text("Please enter correct password");$(".err2").attr("style", "color: #e53935 !important");</script>';
    	    //$url = "forgot-password.php?userid=".$_POST['email'];
    	    //echo '<script>$("#forgot-password").show(); $("#forgot-password").prop("href", "'.$url.'")</script>';
    	}
    
	}
	else
	{
	    echo '<script>$(".err2").text("Please enter correct username");$(".err2").attr("style", "color: #e53935 !important");</script>';
		//echo '<script>$("#forgot-pass").css("display", "inherit")</script>';
	}
}
?>    
