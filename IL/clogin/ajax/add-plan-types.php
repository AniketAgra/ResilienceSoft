<?php
session_start();
include("../includes/config.php");

$type = mysqli_real_escape_string($con,$_POST['type']);
$note = mysqli_real_escape_string($con,$_POST['note']);

if (empty($type)) {
    echo '<script>$("#error").html("Please Enter Plan Type");$("#error").attr("style", "color: #e53935 !important");</script>';
} 
else
{
    $insert = mysqli_query($con, "insert into planType (type,notes,createdBy) values ('$type','$note','".$_SESSION['userId']."')");
    if($insert)
    {
        echo '<script>$("#plantype-form")[0].reset();</script>';
        echo '<script>$("#error").html("Plan Type Successully Added");$("#error").attr("style", "color: #3ec845 !important");</script>';
    }
}
?>    
