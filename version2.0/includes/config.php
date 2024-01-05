<?php
$localhost = "localhost";
$username  = "gsm2gouser";
$password  = "14fBLJ4FAd2d#";
$database  = "gsm2go_esima2k";

$con = @mysqli_connect($localhost,$username,$password,$database) or die("Database Connection Error");

$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
define("SITEURL",$protocol.$_SERVER['HTTP_HOST'].'/version2.0/');
?>