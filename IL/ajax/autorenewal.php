<?php
session_start();
include("../includes/config.php");

$id  = mysqli_real_escape_string($con,$_POST['id']);
$autorenewal  = mysqli_real_escape_string($con,$_POST['status']);

$query = "UPDATE cart_items SET autorenew = $autorenewal WHERE id = '$id'";
mysqli_query($con,$query);

echo "yes";
exit;
?>
