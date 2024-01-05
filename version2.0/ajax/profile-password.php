<?php
session_start();
include("../includes/config.php");

$cpass = mysqli_real_escape_string($con, $_POST['cpass']);
$npass = mysqli_real_escape_string($con, $_POST['npass']);
$rpass = mysqli_real_escape_string($con, $_POST['rpass']);

if(empty($cpass))
{
    echo "<script>alert('Please enter current password')</script>";
}
elseif (strlen($cpass) < 4) 
{
    echo "<script>alert('Current password should be of minimum 5 letters')</script>";    
}
elseif (empty($npass)) 
{
    echo "<script>alert('Please enter New password')</script>";    
}
elseif (strlen($npass) < 4) 
{
    echo "<script>alert('New password should be of minimum 5 letters')</script>";    
}
elseif (empty($rpass)) 
{
    echo "<script>alert('Please re-enter password')</script>";
}
elseif (strlen($rpass) < 4) 
{
    echo "<script>alert('password should be of minimum 5 letters')</script>";    
}
else
{
    if($npass===$rpass)
    {
        $select = mysqli_query($con, "select password from users where email='".$_SESSION['user']."' AND status='A'");
        $row = mysqli_fetch_assoc($select);
        if($row['password']===$cpass)
        {
            $update = mysqli_query($con, "update users set password='$npass' where email='".$_SESSION['user']."' AND status='A'");
            if($update)
            {
                echo "<script>alert('Password updated successfully')</script>";
                echo "<script>$('#password-form').trigger('reset');</script>";
            }
        }
        else
        {
            echo "<script>alert('Current password is incorrect')</script>";
        }
    }
    else
    {
        echo "<script>alert('New password is not matching')</script>";
    }
}
?>