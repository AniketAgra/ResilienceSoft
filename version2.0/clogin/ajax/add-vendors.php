<?php
session_start();
include("../includes/config.php");

$vendor = mysqli_real_escape_string($con,$_POST['vendor']);
$note   = mysqli_real_escape_string($con,$_POST['note']);

if (empty($vendor)) {
    echo '<script>$("#error").html("Please Enter Vendor Name");$("#error").attr("style", "color: #e53935 !important");</script>';
} 
else
{
    $insert = mysqli_query($con, "insert into vendors (vendorName,notes) values ('$vendor','$note')");
    if($insert)
    {
        echo '<script>$("#vendor-form")[0].reset();</script>';
        echo '<script>$("#error").html("Vendor Successully Added");$("#error").attr("style", "color: #3ec845 !important");</script>';
    }
}
?>    
