<?php
session_start();
if( isset($_SESSION['user']) && isset($_SESSION['role']) && ($_SESSION['role']=="A")){
	header('Location:iccid.php');
} else {
    header('Location:signin.php');
}
?>