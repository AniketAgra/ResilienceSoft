<?php
if(isset($_GET['del'])) {
	require_once('include/config.php');

	$delete = mysqli_query($con, "delete from countries where id='".$_GET['del']."'");
	if($delete)
	{
		$message = "Country Deleted Successfully";
		echo '<script>alert("'.$message.'"); window.location="view-country.php";</script>';
	}
}
?>