<?php 
include("../../include/config.php");

if(isset($_POST['del']))
{
	$del = $_POST['del'];
	$delete = mysqli_query($con, "delete from continents where id='$del'");
}
?>