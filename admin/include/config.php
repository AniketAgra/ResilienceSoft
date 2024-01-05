<?php
$localhost = "localhost";
$username  = "g2gdev_us3r";
$password  = "Yjw?8e899";
$database  = "gsm2go_esim";

$con = @mysqli_connect($localhost,$username,$password,$database) or die("Database Connection Error");
$con -> set_charset("utf8");
?>