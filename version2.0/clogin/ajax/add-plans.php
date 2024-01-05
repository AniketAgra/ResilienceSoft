<?php
session_start();
include("../includes/config.php");

$name    = mysqli_real_escape_string($con,$_POST['name']);
$brand   = mysqli_real_escape_string($con,$_POST['brand']);
$sku     = mysqli_real_escape_string($con,$_POST['sku']);
$retail  = mysqli_real_escape_string($con,$_POST['retail']);
$stdrate = mysqli_real_escape_string($con,$_POST['stdrate']);
$note    = mysqli_real_escape_string($con,$_POST['note']);

if (empty($name)) {
    echo '<script>$("#error").html("Please Enter Plan Name");$("#error").attr("style", "color: #e53935 !important");</script>';
} 
elseif (empty($brand)) {
    echo '<script>$("#error").html("Please Select Brand");$("#error").attr("style", "color: #e53935 !important");</script>';
} 
elseif (empty($sku)) {
    echo '<script>$("#error").html("Please Enter SKU");$("#error").attr("style", "color: #e53935 !important");</script>';
} 
elseif (empty($retail)) {
    echo '<script>$("#error").html("Please Enter Retail Rate");$("#error").attr("style", "color: #e53935 !important");</script>';
} 
elseif (empty($stdrate)) {
    echo '<script>$("#error").html("Please Enter Standard Rate");$("#error").attr("style", "color: #e53935 !important");</script>';
} 
else
{
    $check_sku = mysqli_query($con, "select sku from plans where sku='$sku'");
    if(mysqli_num_rows($check_sku) == 0)
    {
        $insert = mysqli_query($con,"insert into plans (planName,brandId,retailRate,stdRate,sku,notes,createdBy) values ('$name','$brand','$retail','$stdrate','$sku','$note','".$_SESSION['userId']."')");
        if($insert)
        {
            echo '<script>$("#plan-form")[0].reset();</script>';
            echo '<script>$("#error").html("Plan Successully Added");$("#error").attr("style", "color: #3ec845 !important");</script>';
        }
    } else{
        echo '<script>$("#error").html("This SKU Already Register. Please Enter Other SKU Value");$("#error").attr("style", "color: #e53935 !important");</script>';
    }
}
?>    
