<?php
session_start();
include("../includes/config.php");

$userid = mysqli_real_escape_string($con,$_POST['userid']);
$ecode  = mysqli_real_escape_string($con,$_POST['ecode']);
$mcode  = mysqli_real_escape_string($con,$_POST['mcode']);

$select = mysqli_query($con, "select * from users where id='$userid'");
$row = mysqli_fetch_assoc($select);

if (mysqli_num_rows($select)===1) 
{
    $_SESSION['userId'] = $row['id'];
	$_SESSION['user']   = $row['email'];
	$_SESSION['phone'] = $row['mobile'];
	$_SESSION['fname']  = $row['fname'];
	$_SESSION['lname'] = $row['lname'];
	$_SESSION['name']   = $row['fname'].' '.$row['lname'];
	$_SESSION['role']   = $row['role'];
	
    if(isset($_SESSION['direct']) && isset($_SESSION['esim']))
    {
    	echo "<script>window.location.href='checkout';</script>";
    }
    else{
        echo "<script>window.location.href='orders';</script>";
    }
	
}
?>
