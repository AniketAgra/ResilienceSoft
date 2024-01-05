<?php
session_start();
if( isset($_SESSION['user']) && isset($_SESSION['role']) && ($_SESSION['role']=="A"))
{
	session_destroy();
	header("location:signin.php");
}
else
{
	header("location:signin.php");
}
?>