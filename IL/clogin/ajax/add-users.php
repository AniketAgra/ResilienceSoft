<?php
session_start();
include("../includes/config.php");
if(isset($_SESSION['user'],$_SESSION['type']) AND ($_SESSION['type']=='Admin' || $_SESSION['type']=='Dealer' || $_SESSION['type']=='User'))
{
    $name  = mysqli_real_escape_string($con, $_POST['name']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $pass  = mysqli_real_escape_string($con, $_POST['pass']);
    $type  = mysqli_real_escape_string($con, $_POST['type']);
    
    if($type=="Admin")
    {
        $check = mysqli_query($con, "select * from users where email='$email' AND deleteflag='0'");
        if(mysqli_num_rows($check)==0)
        {
            $add_admin = mysqli_query($con,"insert into users (name,email,phone,password,logo,type) values ('$name','$email','$phone','$pass','logo.png','$type')");
            if($add_admin)
            {
                echo '<script>$("#admin-form")[0].reset();</script>';
                echo '<script>$("#error").html("Admin Successully Added");$("#error").attr("style", "color: #3ec845 !important");</script>';
            }
        }
        else
        {
            echo '<script>$("#error").html("This Email Already Exists. Please Enter Other Email Address");$("#error").attr("style", "color: #e53935 !important");</script>';
        }
    }
    
    if($type=="User")
    {
        $check = mysqli_query($con, "select id from users where email='$email' AND deleteflag='0'");
        if(mysqli_num_rows($check)==0)
        {
            $select = mysqli_query($con, "select id,dealer,logo from users where id='".$_POST['dealer']."'");
            if(mysqli_num_rows($select)==1)
            {
                $dealerrow = mysqli_fetch_assoc($select);
                $add_user = mysqli_query($con,"insert into users (dealerId,dealer,name,email,phone,password,logo,type) values ('".$dealerrow['id']."','".$dealerrow['dealer']."','$name','$email','$phone','$pass','".$dealerrow['logo']."','$type')");
                if($add_user)
                {
                    echo '<script>$("#user-form")[0].reset();</script>';
                    echo '<script>$("#error1").html("Dealer User Successully Added");$("#error1").attr("style", "color: #3ec845 !important");</script>';
                }
            }
            else
            {
                echo '<script>$("#error1").html("Please Select Dealer");$("#error1").attr("style", "color: #e53935 !important");</script>';
            }
        }
        else
        {
            echo '<script>$("#error1").html("This Email Already Exists. Please Enter Other Email Address");$("#error1").attr("style", "color: #e53935 !important");</script>';
        }
    }
}
?>