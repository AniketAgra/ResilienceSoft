<?php
session_start();
include("includes/config.php");
if(isset($_SESSION['user'],$_SESSION['type']))
{
    $value = $_GET['value'];
    $id    = $_GET['id'];
    
    if(!empty($value) && !empty($id))
    {
        if($value == 'Admin')
        {
            $delete = mysqli_query($con, "UPDATE users SET deleteflag='1' WHERE id='$id' AND type='$value'");
            if($delete)
            {
                echo "<script>alert('Admin Deleted Successfully')</script>";
                echo "<script>window.location.replace('users.php')</script>";
            }
        }
        
        if($value == 'Dealer')
        {
            $delete = mysqli_query($con, "UPDATE users SET deleteflag='1' WHERE id='$id' AND type='$value'");
            if($delete)
            {
                echo "<script>alert('Dealer Deleted Successfully')</script>";
                echo "<script>window.location.replace('dealers.php')</script>";
            }
        }
        
        if($value == 'User')
        {
            $delete = mysqli_query($con, "UPDATE users SET deleteflag='1' WHERE id='$id' AND type='$value'");
            if($delete)
            {
                echo "<script>alert('User Deleted Successfully')</script>";
                echo "<script>window.location.replace('users.php')</script>";
            }
        }
        
        if($value == 'Vendor')
        {
            $delete = mysqli_query($con, "UPDATE vendors SET deleteflag='1' WHERE id='$id'");
            if($delete)
            {
                echo "<script>alert('Vendor Deleted Successfully')</script>";
                echo "<script>window.location.replace('vendors.php')</script>";
            }
        }
        
        if($value == 'Brand')
        {
            $delete = mysqli_query($con, "UPDATE brands SET deleteflag='1' WHERE id='$id'");
            if($delete)
            {
                echo "<script>alert('Brand Deleted Successfully')</script>";
                echo "<script>window.location.replace('brands.php')</script>";
            }
        }
        
        if($value == 'Plan')
        {
            $delete = mysqli_query($con, "UPDATE plans SET deleteflag='1' WHERE id='$id'");
            if($delete)
            {
                echo "<script>alert('Plan Deleted Successfully')</script>";
                echo "<script>window.location.replace('plans.php')</script>";
            }
        }
        
    }
}
?>