<?php
session_start();
include("../include/config.php");

    $userId   = mysqli_real_escape_string($con,$_POST['userId']);
    $login = mysqli_query($con, "select * from users where id='$userId' and role='U'");
	if (mysqli_num_rows($login)===1) 
	{
		$row = mysqli_fetch_array($login);
		if($row['status'] == 'A') {
    		$_SESSION['userId'] = $row['id'];
    		$_SESSION['user'] = $row['email'];
    		$_SESSION['phone'] = $row['mobile'];
    		$_SESSION['fname'] = $row['fname'];
    		$_SESSION['lname'] = $row['lname'];
    		$_SESSION['name'] = $row['fname'].' '.$row['lname'];
    		$_SESSION['role'] = $row['role'];
    		$_SESSION['userCompany'] = $row['company'];
    		echo "verified";
		} else {
		    echo "not verified";
		}
	} else {
	    echo "account not available";
	}