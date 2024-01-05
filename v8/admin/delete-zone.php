<?php
if(isset($_GET['id'])) {
	require_once('include/config.php');

	$delete = mysqli_query($con, "delete from zones where id='".$_GET['id']."'");
	if($delete)
	{
		$message = "Zone Deleted Successfully";
		echo '<script>alert("'.$message.'"); window.location="zone.php";</script>';
	}
}
?>