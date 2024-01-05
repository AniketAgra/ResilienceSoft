<?php 	

include("../../../includes/config.php");

$id = $_POST['bedroom_id'];
$result = mysqli_query($con, "select * from faq where id='$id'");

if(mysqli_num_rows($result) > 0) 
{ 
 	$row = mysqli_fetch_array($result);
}

$con->close();
echo json_encode($row);