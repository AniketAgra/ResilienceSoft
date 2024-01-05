<?php 
include("../../include/db.php");

$id     = mysqli_real_escape_string($con, $_POST['edit_id']);
$name   = mysqli_real_escape_string($con, $_POST['edit_name']);
$mobile = mysqli_real_escape_string($con, $_POST['edit_mobile']);
$email  = mysqli_real_escape_string($con, $_POST['edit_email']);
$user   = mysqli_real_escape_string($con, $_POST['edit_user']);
$pass   = mysqli_real_escape_string($con, $_POST['edit_pass']);
$rpass  = mysqli_real_escape_string($con, $_POST['edit_rpass']); 

if(empty($name))
{
	echo '<div class="alert alert-danger col-12" role="alert">Please Enter Name</div>';
}
elseif(empty($mobile))
{
	echo '<div class="alert alert-danger col-12" role="alert">Please Enter Mobile Numbar</div>';
}
elseif(empty($email))
{
	echo '<div class="alert alert-danger col-12" role="alert">Please Enter E-Mail</div>';
}
elseif(empty($user))
{
	echo '<div class="alert alert-danger col-12" role="alert">Please Enter User Id</div>';
}
elseif(!empty($pass) AND empty($rpass))
{
	echo '<div class="alert alert-danger col-12" role="alert">Please Enter Repeat Password</div>';
}
elseif(!empty($pass) AND !empty($rpass))
{
	if ($pass != $rpass) 
	{
		echo '<div class="alert alert-danger col-12" role="alert">Password Not Matching</div>';
	} 
	else
	{
		$update = mysqli_query($con, "update users set name='$name', mobile='$mobile', email='$email', pass=MD5($pass) where id='$id'");
		if ($update) 
		{
			echo '<div class="alert alert-success col-12" role="alert">User Updated Successfully</div>';
		}
	}
}
else
{
	$update = mysqli_query($con, "update users set name='$name', mobile='$mobile', email='$email' where id='$id'");
	if ($update) 
	{
		echo '<div class="alert alert-success col-12" role="alert">User Updated Successfully</div>';
	}
}
?>