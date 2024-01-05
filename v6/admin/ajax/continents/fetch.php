<?php 	

include("../../include/db.php");

$id = $_POST['user_id'];
$result = mysqli_query($con, "SELECT * FROM users WHERE id = '$id'");

if(mysqli_num_rows($result) > 0) 
{ 
 	$row = mysqli_fetch_array($result);
}

$con->close();
echo json_encode($row);