<?php 
include("../../include/db.php");
$name   = mysqli_real_escape_string($con, $_POST['name']);
$mobile = mysqli_real_escape_string($con, $_POST['mobile']);
$email  = mysqli_real_escape_string($con, $_POST['email']);
$user   = mysqli_real_escape_string($con, $_POST['user']);
$pass   = mysqli_real_escape_string($con, $_POST['pass']);
$rpass  = mysqli_real_escape_string($con, $_POST['rpass']);

if(empty($name)){
	echo '<div class="alert alert-danger col-12" role="alert">Please Enter Name</div>';
}
elseif(empty($mobile)){
	echo '<div class="alert alert-danger col-12" role="alert">Please Enter Mobile Numbar</div>';
}
elseif(empty($email)){
	echo '<div class="alert alert-danger col-12" role="alert">Please Enter E-Mail</div>';
}
elseif(empty($user)){
	echo '<div class="alert alert-danger col-12" role="alert">Please Enter UserId</div>';
}
elseif(empty($pass)){
	echo '<div class="alert alert-danger col-12" role="alert">Please Enter Password</div>';
}
elseif(empty($rpass)){
	echo '<div class="alert alert-danger col-12" role="alert">Please Enter Repeat Password</div>';
}
elseif ($pass != $rpass){
	echo '<div class="alert alert-danger col-12" role="alert">Password Not Matching</div>';
}
else
{
	$check_user = mysqli_query($con, "select * from users where user='$user'");
	if(mysqli_num_rows($check_user)==1)
	{
		echo '<div class="alert alert-danger col-12" role="alert">This User ID Already Exits</div>';
	}
	else
	{
		$insert = mysqli_query($con, "insert into users (name,mobile,email,user,pass) values ('$name','$mobile','$email','$user',MD5($pass))");
		echo '<div class="alert alert-success col-12" role="alert"> User Added Successfully </div>';
		echo "<script>$('#myForm').trigger('reset');</script>";
	}
}
?>