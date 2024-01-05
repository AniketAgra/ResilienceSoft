<?php
session_start();
include("../includes/config.php");

$id = $_POST['edit_id'];
$select = mysqli_query($con, "select * from activation where id='$id'");
$row = mysqli_fetch_assoc($select);
echo '<img src="qr/'.$row['ICCID'].'.png" class="box-2">';
?>