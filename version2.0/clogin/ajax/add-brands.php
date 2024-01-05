<?php
session_start();
include("../includes/config.php");

$name   = mysqli_real_escape_string($con,$_POST['name']);
$vendor = mysqli_real_escape_string($con,$_POST['vendor']);
$note   = mysqli_real_escape_string($con,$_POST['note']);

if (empty($name)) {
    echo '<script>$("#error").html("Please Enter Brand Name");$("#error").attr("style", "color: #e53935 !important");</script>';
} 
elseif (empty($vendor)) {
    echo '<script>$("#error").html("Please Select Vendor");$("#error").attr("style", "color: #e53935 !important");</script>';
} 
else
{
    $insert = mysqli_query($con,"insert into brands (brandName,vendorId,notes,createdBy) values ('$name','$vendor','$note','".$_SESSION['userId']."')");
    if($insert)
    {
        echo '<script>$("#brand-form")[0].reset();</script>';
        echo '<script>$("#error").html("Brand Successully Added");$("#error").attr("style", "color: #3ec845 !important");</script>';
    }
}
?>    
