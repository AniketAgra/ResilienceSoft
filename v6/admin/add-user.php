<?php
session_start();
if( isset($_SESSION['user']) && isset($_SESSION['role']) && ($_SESSION['role']=="A")){
	include("include/config.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
	<link rel="icon" href="assets/img/brand/favicon.ico" type="image/x-icon"/>
	<title>Add User</title>
	<link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css"/>
	<link rel="stylesheet" href="assets/plugins/web-fonts/icons.css"/>
	<link rel="stylesheet" href="assets/plugins/web-fonts/font-awesome/font-awesome.min.css">
	<link rel="stylesheet" href="assets/plugins/web-fonts/plugin.css"/>
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/skins.css">
	<link rel="stylesheet" href="assets/css/dark-style.css">
	<link rel="stylesheet" href="assets/css/colors/default.css">
	<link rel="stylesheet" href="assets/css/colors/color.css">
	<link rel="stylesheet" href="assets/css/sidemenu/sidemenu.css">
</head>
<body class="main-body leftmenu">
<?php
if(isset($_POST['submit']))
{
	$fname  = $_POST['fname'];
	$lname  = $_POST['lname'];
	$mobile = $_POST['mobile'];
	$email  = $_POST['email'];
	$pass   = $_POST['pass'];
	$role   = $_POST['role'];
	$status = $_POST['status'];

	$check = mysqli_query($con, "select * from users where email='$email'");
	if(mysqli_num_rows($check)===0)
	{
		$insert = mysqli_query($con, "insert into users (fname,lname,mobile,email,password,role,status) values ('$fname','$lname','$mobile','$email','$pass','$role','$status')");
		if($insert)
		{
			echo "<script>alert('User Added Successfully')</script>";
		}
	}
	else
	{
		echo "<script>alert('This Email Already Register')</script>";
	}	
}
?>

<!-- Loader -->
<div id="global-loader">
	<img src="assets/img/loader.svg" class="loader-img" alt="Loader">
</div>
<!-- End Loader -->

<!-- Page -->
<div class="page">

	<!-- Sidemenu -->
	<?php include("include/sidebar.php"); ?>
	<!-- End Sidemenu -->

	<!-- Main Header-->
	<?php include("include/header.php"); ?>
	<!-- End Main Header-->

	<!-- Main Content-->
	<div class="main-content side-content pt-0">

		<div class="container-fluid">
			<div class="inner-body">

				<!-- Page Header -->
				<div class="page-header my-1">
					<div>
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="index.php"><i class="fa fa-home"></i></a></li>
							<li class="breadcrumb-item"><a href="view-users.php">Users</a></li>
							<li class="breadcrumb-item active" aria-current="page">Add User</li>
						</ol>
					</div>
				</div>
				<!-- End Page Header -->

				<!-- Row -->
				<div class="row row-sm">
					<div class="col-lg-12 col-md-12">
						<div class="card custom-card">
							<div class="card-body">
								<form method="post">
									<div class="row">
										<div class="col-md-4">
											<div class="form-group">
												<label>First Name</label>
												<input type="text" class="form-control" name="fname" placeholder="Enter First Name" required="required">
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label>Last Name</label>
												<input type="text" class="form-control" name="lname" placeholder="Enter Last Name" required="required">
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label>Mobile</label>
												<input type="number" class="form-control" name="mobile" placeholder="Enter Mobile Number" required="required">
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label>Email</label>
												<input type="email" class="form-control" name="email" placeholder="Enter Email" required="required">
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label>Password</label>
												<input type="text" class="form-control" name="pass" placeholder="Enter Password" required="required">
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label>Role</label>
												<select class="form-control" name="role" required="required">
													<option value="">Select Role</option>
													<option value="A">Admin</option>
													<option value="U">User</option>
												</select>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label>Status</label>
												<select class="form-control" name="status" required="required">
													<option value="">Select Status</option>
													<option value="A">Active</option>
													<option value="D">Deactive</option>
												</select>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-4 mx-auto">
											<div class="form-group">
												<button class="btn btn-block btn-primary" name="submit">Submit</button>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>

				</div>
				<!-- End Row -->



			</div>
		</div>
	</div>
	<!-- End Main Content-->


</div>
<!-- End Page -->




<!-- Jquery js-->
<script src="assets/plugins/jquery/jquery.min.js"></script>
<script src="assets/plugins/bootstrap/js/popper.min.js"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="assets/plugins/sidemenu/sidemenu.js"></script>
<script src="assets/plugins/sidebar/sidebar.js"></script>
<script src="assets/js/sticky.js"></script>
<script src="assets/js/custom.js"></script>
</body>
</html>
<?php } else{ include("signin.php"); } ?>