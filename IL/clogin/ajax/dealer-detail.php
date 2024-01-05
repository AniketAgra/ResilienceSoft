<?php 	
session_start();
include('../includes/config.php');

$id = $_POST['edit_id'];
$result = mysqli_query($con,"select * from users where id='$id'");

if(mysqli_num_rows($result) > 0) 
{ 
 	$row = mysqli_fetch_assoc($result);
}

echo json_encode($row);