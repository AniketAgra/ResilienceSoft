<?php 	
session_start();
include('../includes/config.php');

$id = $_POST['plan_id'];
$result = mysqli_query($con, "select retailRate from plans where id='$id'");
if(mysqli_num_rows($result) > 0) 
{ 
 	$row = mysqli_fetch_assoc($result);
 	$retail = $row['retailRate'];
}

$result1 = mysqli_query($con, "select rate from planRate where planId='$id' AND dealerId='".$_SESSION['userId']."'");
if(mysqli_num_rows($result1) > 0) 
{ 
 	$row1 = mysqli_fetch_assoc($result1);
 	$dealerrate = $row1['rate'];
} else{
    $result2 = mysqli_query($con, "select stdRate from plans where id='$id'");
    $row1 = mysqli_fetch_assoc($result2);
 	$dealerrate = $row1['stdRate'];
}

$data = array( "retailRate"=>$retail, "dealerRate"=>$dealerrate );

echo json_encode($data);