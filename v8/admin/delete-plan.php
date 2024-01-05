<?php
if(isset($_GET['del'])) {
	require_once('include/config.php');

	$delete = mysqli_query($con, "delete from plans where id='".$_GET['del']."'");
	if($delete)
	{
		$message = "Plan Deleted Successfully";
		echo '<script>alert("'.$message.'"); window.location="view-plan.php";</script>';
	}
}
?>