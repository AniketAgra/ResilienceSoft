<?php
session_start();
include("includes/config.php");
if(isset($_SESSION['user'],$_SESSION['type']))
{
    $id     = $_GET['id'];
    $value  = $_GET['value'];
    $status = $_GET['status'];
    
    if(!empty($value) && !empty($id) && !empty($status))
    {
        if($value == 'Admin')
        {
            if($status=="Active")
            {
                $status = mysqli_query($con, "UPDATE users SET status='Inactive' WHERE id='$id' AND type='$value'");
            } else{
                $status = mysqli_query($con, "UPDATE users SET status='Active' WHERE id='$id' AND type='$value'");
            }
            if($status)
            {
                echo "<script>alert('Status Change Successfully')</script>";
                echo "<script>window.location.replace('users.php')</script>";
            }
        }
        
        if($value == 'Dealer')
        {
            if($status=="Active")
            {
                $status = mysqli_query($con, "UPDATE users SET status='Inactive' WHERE id='$id' AND type='$value'");
            } else{
                $status = mysqli_query($con, "UPDATE users SET status='Active' WHERE id='$id' AND type='$value'");
            }
            if($status)
            {
                echo "<script>alert('Status Change Successfully')</script>";
                echo "<script>window.location.replace('dealers.php')</script>";
            }
        }
        
        if($value == 'User')
        {
            if($status=="Active")
            {
                $status = mysqli_query($con, "UPDATE users SET status='Inactive' WHERE id='$id' AND type='$value'");
            } else{
                $status = mysqli_query($con, "UPDATE users SET status='Active' WHERE id='$id' AND type='$value'");
            }
            if($status)
            {
                echo "<script>alert('Status Change Successfully')</script>";
                echo "<script>window.location.replace('users.php')</script>";
            }
        }
        
        if($value == 'Vendor')
        {
            if($status=="Active")
            {
                $status = mysqli_query($con, "UPDATE vendors SET status='Deactive' WHERE id='$id'");
            } else{
                $status = mysqli_query($con, "UPDATE vendors SET status='Active' WHERE id='$id'");
            }
            if($status)
            {
                echo "<script>alert('Status Change Successfully')</script>";
                echo "<script>window.location.replace('vendors.php')</script>";
            }
        }
        
        if($value == 'Brand')
        {
            if($status=="Active")
            {
                $status = mysqli_query($con, "UPDATE brands SET status='Deactive' WHERE id='$id'");
            } else{
                $status = mysqli_query($con, "UPDATE brands SET status='Active' WHERE id='$id'");
            }
            if($status)
            {
                echo "<script>alert('Status Change Successfully')</script>";
                echo "<script>window.location.replace('brands.php')</script>";
            }
        }
        
        if($value == 'Plan')
        {
            if($status=="Active")
            {
                $status = mysqli_query($con, "UPDATE plans SET status='Deactive' WHERE id='$id'");
            } else{
                $status = mysqli_query($con, "UPDATE plans SET status='Active' WHERE id='$id'");
            }
            if($status)
            {
                echo "<script>alert('Status Change Successfully')</script>";
                echo "<script>window.location.replace('plans.php')</script>";
            }
        }
        
    }
}
?>