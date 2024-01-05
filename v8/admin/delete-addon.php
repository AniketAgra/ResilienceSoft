<?php
if(isset($_GET['del'])) {
	require_once('include/config.php');

	$delete = mysqli_query($con, "delete from addons where id='".$_GET['del']."'");
	if($delete)
	{
		$message = "Addons Deleted Successfully";
		echo '<script>alert("'.$message.'"); window.location="addons.php";</script>';
	}
}
?>