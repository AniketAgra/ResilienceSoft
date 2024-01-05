<?php
session_start();
if( isset($_SESSION['user']) && isset($_SESSION['role']) && ($_SESSION['role']=="A"))
{
	header("location:index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="keywords" content="">
	<link rel="icon" href="assets/img/brand/favicon.ico" type="image/x-icon"/>
	<title>Signin</title>
	<link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
	<link href="assets/plugins/web-fonts/icons.css" rel="stylesheet"/>
	<link href="assets/plugins/web-fonts/font-awesome/font-awesome.min.css" rel="stylesheet">
	<link href="assets/plugins/web-fonts/plugin.css" rel="stylesheet"/>
	<link href="assets/css/style.css" rel="stylesheet">
	<link href="assets/css/skins.css" rel="stylesheet">
	<link href="assets/css/dark-style.css" rel="stylesheet">
	<link href="assets/css/colors/default.css" rel="stylesheet">
	<link href="assets/css/colors/color.css">
	<style type="text/css">
		.signpages .details:before{ background-color: #fff; }
	</style>
</head>
<body class="main-body leftmenu">


<!-- Page -->
<div class="container">

	<!-- Row -->
	<div class="row mt-5">
		<div class="col-md-5 mx-auto mt-5">
			<div class="card mt-5">
				<div class="row">
					<div class="card-body px-5 text-center">
						<img src="assets/img/logo.png" class="header-brand-img mb-4" alt="logo">
						<div class="clearfix"></div>
						<form>
							<h5 class="text-left mb-3">Signin to Your Account</h5>
							<div class="input-group mb-3">
								<input id="username" class="form-control" placeholder="Enter your Email" type="email">
								<div class="input-group-prepend">
									<span class="input-group-text" onclick="document.getElementById('username').value = ''"><i class="fa fa-times"></i></span>
								</div>
							</div>
							<div class="input-group mb-3">
								<input id="password" class="form-control" placeholder="Enter your password" type="password">
								<div class="input-group-prepend">
									<span class="input-group-text" onclick="myFunction()"><i class="fa fa-eye"></i></span>
								</div>
							</div>
							<button type="button" class="btn ripple btn-main-primary btn-block" id="signin">Sign In</button>
							<p class="text-center text-danger font-weight-bold pt-2" id="error-msg"></p>
						</form>
						<div class="text-left mt-1 ml-0">
							<div class="mb-1"><a href="forgot-password.php">Forgot password?</a></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Row -->

</div>
<!-- End Page -->

<!-- Jquery js-->
<script src="assets/plugins/jquery/jquery.min.js"></script>
<script src="assets/plugins/bootstrap/js/popper.min.js"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/plugins/select2/js/select2.min.js"></script>
<script src="assets/js/custom.js"></script>
<script>
function myFunction() {
  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
<script type="text/javascript">
$("#signin" ).click(function(){

   	var email   = $("#username").val();
   	var pass    = $("#password").val();

   	$.ajax({
      	url: "ajax/signin.php",
      	type: "POST",
      	data: { email:email,pass:pass },
      	success:function(data,status)
      	{
         	$("#error-msg").html(data);
      	}
   	});
});
</script>
</body>
</html>