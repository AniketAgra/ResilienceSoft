<?php
session_start();
include("../includes/config.php");
if(isset($_SESSION['user'],$_SESSION['type']) AND ($_SESSION['type']=='Admin'))
{
    $dealer = $_POST['dealer'];
    $name   = $_POST['name'];
    $email  = $_POST['email'];
    $phone  = $_POST['phone'];
    $pass   = $_POST['pass'];
    
    $temp = explode(".", $_FILES["logo"]["name"]);
    $newfilename = round(microtime(true)).'.'.end($temp);
    move_uploaded_file($_FILES["logo"]["tmp_name"], "assets/images/logos/".$newfilename);
    
    if(empty($dealer))
    {
        echo '<script>$("#error").html("Please Enter Dealer");$("#error").attr("style", "color: #e53935 !important");</script>';
    }
    elseif(empty($name))
    {
        echo '<script>$("#error").html("Please Enter Name");$("#error").attr("style", "color: #e53935 !important");</script>';
    }
    elseif(empty($email)){
        echo '<script>$("#error").html("Please Enter Email Address");$("#error").attr("style", "color: #e53935 !important");</script>';
    }
    elseif(empty($phone)){
        echo '<script>$("#error").html("Please Enter Phone Number");$("#error").attr("style", "color: #e53935 !important");</script>';
    }
    elseif(empty($_FILES["logo"]["name"])){
        echo '<script>$("#error").html("Please Select Dealer Logo");$("#error").attr("style", "color: #e53935 !important");</script>';
    }
    elseif(empty($pass)){
        echo '<script>$("#error").html("Please Enter Password");$("#error").attr("style", "color: #e53935 !important");</script>';
    }
    elseif( strlen($pass) < 5 ){
        echo '<script>$("#error").html("Please Enter Password");$("#error").attr("style", "color: #e53935 !important");</script>';
    }
    else
    {
        $check = mysqli_query($con, "select * from users where email='$email' AND deleteflag='0'");
        if(mysqli_num_rows($check)==0)
        {
            $insert = mysqli_query($con,"insert into users (name,email,phone,password,dealer,logo,type) values ('$name','$email','$phone','$password','$dealer','$newfilename','Dealer')");
            if($insert)
            {
                echo '<script>$("#dealer-form")[0].reset();</script>';
                echo '<script>$("#error").html("Dealer Successully Added");$("#error").attr("style", "color: #3ec845 !important");</script>';
            }
        }
        else
        {
            echo '<script>$("#error").html("This Email Already Exists. Please Enter Other Email Address");$("#error").attr("style", "color: #e53935 !important");</script>';
        }
    }
}
?>