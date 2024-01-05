<?php
include("../includes/config.php");


$order_row = mysqli_fetch_assoc(mysqli_query($con, "select * from promotionAlerts where alertId='".$_GET['v']."'"));
	
header('Location:'.$order_row['url']);
?>