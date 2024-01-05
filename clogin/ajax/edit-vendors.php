<?php
session_start();
include("../includes/config.php");

$id     = mysqli_real_escape_string($con,$_POST['vendorid']);
$vendor = mysqli_real_escape_string($con,$_POST['vendor']);
$status = mysqli_real_escape_string($con,$_POST['status']);
$note   = mysqli_real_escape_string($con,$_POST['note']);
$userid = $_SESSION['userId'];
$date   = date('Y-m-d h:i:s');

if (empty($id)) {
    echo '<script>$("#error").html("Please Enter Brand Id");$("#error").attr("style", "color: #e53935 !important");</script>';
}
elseif (empty($vendor)) {
    echo '<script>$("#error").html("Please Select Vendor");$("#error").attr("style", "color: #e53935 !important");</script>';
} 
elseif (empty($status)) {
    echo '<script>$("#error").html("Please Select Status");$("#error").attr("style", "color: #e53935 !important");</script>';
} 
else
{
    $update = mysqli_query($con,"UPDATE vendors SET vendorName='$vendor', notes='$note', status='$status', modifyBy='$userid', modifyAt='$date' where id='$id'");
    if($update)
    {
        //echo '<script>$("#vendor-form")[0].reset();</script>';
        echo '<script>$("#error").html("Vendor Successully Update");$("#error").attr("style", "color: #3ec845 !important");</script>';
    }
}
?>    
