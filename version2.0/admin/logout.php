<?php
session_start();
if( isset($_SESSION['admin_user']) && isset($_SESSION['admin_role']) && ($_SESSION['admin_role']=="A"))
{
	session_destroy();
	header("location:signin.php");
}
else
{
	header("location:signin.php");
}
?>