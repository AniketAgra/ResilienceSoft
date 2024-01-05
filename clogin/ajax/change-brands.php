<?php
session_start();
include('../includes/config.php');

$brand_id = $_POST['brand_id'];
$result = mysqli_query($con, "select * from plans where brandId='$brand_id'");
if (mysqli_num_rows($result) > 0)
{
    echo '<option value="">Select Plan</option>';
    while($row = mysqli_fetch_array($result)) 
    {
    	echo '<option value="'.$row['id'].'">'.$row['planName'].'</option>';
    }
} else {
    echo '<option value="">First Select Brand</option>';
}
?>