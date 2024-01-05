<?php
session_start();
include('../includes/config.php');

$id     = $_POST['dealer'];
$qty    = $_POST['qty'];
$notes  = $_POST['note'];
$userid = $_SESSION['userId'];

if (empty($id)) {
    echo '<span class="text-primary">Please Select Dealer</span>';
} 
elseif (empty($qty)) {
    echo '<span class="text-primary">Please Enter Quantity</span>';
} 
elseif (empty($userid)) {} 
else
{
    echo '<script>$("#add-qty").attr("disabled","disabled")</script>';
	$insert = mysqli_query($con,"insert into inventory (dealerId,qty,notes,userId) values ('$id','$qty','$notes','$userid')");
	if($insert)
	{
    	echo '<span class="text-success">Quantity Added Successully</span>';
    	echo "<script>window.setTimeout(function(){location.reload()},3000)</script>";
	}
}


