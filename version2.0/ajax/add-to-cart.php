<?php
session_start();
include("../includes/config.php");

$planId   = mysqli_real_escape_string($con,$_POST['planId']);
$esimLive  = mysqli_real_escape_string($con,$_POST['esimLive']);

$cookieValue = base64_decode($_COOKIE['a2k_key']);
if(isset($_SESSION['userId'])) {
    $userId = $_SESSION['userId'];
} else {
    $userId = 0;
}
$currentDate = date('Y-m-d H:i:s');
$insert = mysqli_query($con, "insert into cart_items (cookie_id,user_id,plan_id,quantity,esim_live,createdDate,updatedDate) values ('$cookieValue','$userId','$planId','1','$esimLive','$currentDate','$currentDate')");

$result = mysqli_query($con, "select * from cart_items where cookie_id = '$cookieValue'");

echo mysqli_num_rows($result);
?>
