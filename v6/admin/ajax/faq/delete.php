<?php 
include("../../../includes/config.php");

$id = mysqli_real_escape_string($con, $_POST['del']);
$check_status = mysqli_query($con, "select status from faq where id='$id'");
if(mysqli_num_rows($check_status)==1)
{
	$status_row = mysqli_fetch_assoc($check_status);
	if($status_row['status']=="A")
	{
		$update = mysqli_query($con,"update faq set status='D' where id='$id'");
	}
	else
	{
		$update = mysqli_query($con,"update faq set status='A' where id='$id'");
	}
}
?>