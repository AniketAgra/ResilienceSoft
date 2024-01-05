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
	<title>eSIM Live</title>
	<link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css"/>
	<link rel="stylesheet" href="assets/plugins/web-fonts/icons.css"/>
	<link rel="stylesheet" href="assets/plugins/web-fonts/font-awesome/font-awesome.min.css">
	<link rel="stylesheet" href="assets/plugins/web-fonts/plugin.css"/>
	<link rel="stylesheet" href="assets/plugins/summernote/summernote-bs4.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/skins.css">
	<link rel="stylesheet" href="assets/css/dark-style.css">
	<link rel="stylesheet" href="assets/css/colors/default.css">
	<link rel="stylesheet" href="assets/css/colors/color.css">
	<link rel="stylesheet" href="assets/css/sidemenu/sidemenu.css">
	<style type="text/css">
		/* Chrome, Safari, Edge, Opera */
	input::-webkit-outer-spin-button,input::-webkit-inner-spin-button {-webkit-appearance: none;margin: 0;}
	/* Firefox */
	input[type=number] { -moz-appearance: textfield; }
	</style>
</head>
<body class="main-body leftmenu">
<?php
if(isset($_POST['update-notes']))
{
	$id    = $_POST['id'];
	$notes = $_POST['notes'];

	$result = mysqli_query($con, "update esimlive set esim_notes='$notes' where id='$id'");
	if($result)
	{
		echo "<script>alert('eSIM Notes Update Successfully')</script>";
	}
	
}
?>
<?php
if(isset($_POST['update-esim-desc']))
{
	$id   = $_POST['id'];
	$desc = $_POST['desc'];

	$result = mysqli_query($con, "update esimlive set short_desc='$desc' where id='$id'");
	if($result)
	{
		echo "<script>alert('eSIM Description Update Successfully')</script>";
	}
	
}
?>
<?php
if(isset($_POST['activation-update']))
{
	$id     = $_POST['id'];
	$name   = $_POST['name'];
	$usd    = $_POST['usd'];
	$status = $_POST['status'];

	$result = mysqli_query($con, "update esimlive set name='$name', USD='$usd', status='$status' where id='$id'");
	if($result)
	{
		echo "<script>alert('Activation Update Successfully')</script>";
	}
	
}
?>
<?php
if(isset($_POST['update']))
{
	$id     = $_POST['id'];
	$name   = $_POST['esimname'];
	$usd    = $_POST['usd'];
	$check  = $_POST['check'];
	$status = $_POST['status'];
	$desc   = $_POST['desc'];

	$result = mysqli_query($con, "update esimlive set name='$name', checked='$check', USD='$usd', short_desc='$desc', status='$status' where id='$id'");
	if($result)
	{
		echo "<script>alert('eSIM Live Update Successfully')</script>";
	}
	
}
?>
<?php
$select = mysqli_query($con,"select * from esimlive LIMIT 1");
$row = mysqli_fetch_assoc($select);
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
							<li class="breadcrumb-item"><a href="view-plan.php">eSIM Live</a></li>
						</ol>
					</div>
				</div>
				<!-- End Page Header -->

				<!-- Row -->
				<div class="row row-sm">
					<div class="col-lg-12 col-md-12">
						<div class="card custom-card">
							<div class="card-header">eSIM Notes</div>
							<div class="card-body pb-2">
								<form method="post">
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<input type="hidden" value="<?php echo $row['id']; ?>" name="id" required="required">
												<textarea class="form-control" name="notes" placeholder="Enter Description" required="required"><?php echo $row['esim_notes']; ?></textarea>
											</div>
										</div>
										<div class="col-md-4 mx-auto">
											<div class="form-group">
												<button type="submit" class="btn btn-block btn-primary" name="update-notes">Update</button>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<!-- End Row -->

				<!-- Row -->
				<div class="row row-sm">
					<div class="col-lg-12 col-md-12">
						<div class="card custom-card">
							<div class="card-header">eSIM Description</div>
							<div class="card-body pb-2">
								<?php
								$esimdesc = mysqli_query($con,"select * from esimlive where id='3'");
								$esimdescrow = mysqli_fetch_assoc($esimdesc);
								?>
								<form method="post">
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<input type="hidden" value="<?php echo $esimdescrow['id']; ?>" name="id" required="required">
												<textarea class="form-control" id="summernote" name="desc" placeholder="Enter Description" required="required"><?php echo $esimdescrow['short_desc']; ?></textarea>
											</div>
										</div>
										<div class="col-md-4 mx-auto">
											<div class="form-group">
												<button type="submit" class="btn btn-block btn-primary" name="update-esim-desc">Update</button>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<!-- End Row -->

				<!-- Row -->
				<div class="row row-sm">
					<div class="col-lg-12 col-md-12">
						<div class="card custom-card">
							<div class="card-header">Activation</div>
							<div class="card-body">
								<?php
								$activation = mysqli_query($con,"select * from esimlive where id='2'");
								$activerow = mysqli_fetch_assoc($activation);
								?>
								<form method="post">
									<div class="row">
										<div class="col-md-4">
											<div class="form-group">
												<label>Name</label>
												<input type="hidden" value="<?php echo $activerow['id']; ?>" name="id" required="required">
												<input type="text" class="form-control" value="<?php echo $activerow['name']; ?>" name="name" required="required">
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label>USD</label>
												<input type="number" class="form-control" value="<?php echo $activerow['USD']; ?>" name="usd" required="required">
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label>Status</label>
												<select class="form-control" name="status" required="required">
													<?php if($activerow['status']=="A"){ ?>
													<option value="A" selected>Active</option>
													<option value="D">Deactive</option>
													<?php } ?>
													<?php if($activerow['status']=="D"){ ?>
													<option value="A">Active</option>
													<option value="D" selected>Deactive</option>
													<?php } ?>
													<?php if($activerow['status']!="A" && $activerow['status']!="D"){ ?>
													<option value="">Select Status</option>
													<option value="A">Active</option>
													<option value="D">Deactive</option>
													<?php } ?>
												</select>
											</div>
										</div>
										<div class="col-md-4 mx-auto">
											<div class="form-group">
												<button type="submit" class="btn btn-block btn-primary" name="activation-update">Update</button>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<!-- End Row -->

				<!-- Row -->
				<div class="row row-sm">
					<div class="col-lg-12 col-md-12">
						<div class="card custom-card">
							<div class="card-header">eSIM Live</div>
							<div class="card-body">
								<form method="post">
									<div class="row">
										<div class="col-md-3">
											<div class="form-group">
												<label>Name</label>
												<input type="hidden" value="<?php echo $row['id']; ?>" name="id" required="required">
												<input type="text" class="form-control" value="<?php echo $row['name']; ?>" name="esimname" required="required">
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label>USD</label>
												<input type="number" class="form-control" value="<?php echo $row['USD']; ?>" name="usd" required="required">
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label>Check Box</label>
												<select class="form-control" name="check" required="required">
													<?php if($row['checked']=="Check"){ ?>
													<option value="Check" selected>Checked</option>
													<option value="Uncheck">Unchecked</option>
													<?php } ?>
													<?php if($row['checked']=="Uncheck"){ ?>
													<option value="Check">Checked</option>
													<option value="Uncheck" selected>Unchecked</option>
													<?php } ?>
													<?php if($row['checked']!="Check" && $row['checked']!="Uncheck"){ ?>
													<option value="">Select Status</option>
													<option value="Check">Checked</option>
													<option value="Uncheck">Unchecked</option>
													<?php } ?>
												</select>
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label>Status</label>
												<select class="form-control" name="status" required="required">
													<?php if($row['status']=="A"){ ?>
													<option value="A" selected>Active</option>
													<option value="D">Deactive</option>
													<?php } ?>
													<?php if($row['status']=="D"){ ?>
													<option value="A">Active</option>
													<option value="D" selected>Deactive</option>
													<?php } ?>
													<?php if($row['status']!="A" && $row['status']!="D"){ ?>
													<option value="">Select Status</option>
													<option value="A">Active</option>
													<option value="D">Deactive</option>
													<?php } ?>
												</select>
											</div>
										</div>
										<div class="col-md-8">
											<div class="form-group">
												<input type="text" class="form-control" name="desc" value="<?php echo $row['short_desc']; ?>" placeholder="Enter Description" required="required">
											</div>
										</div>
										<div class="col-md-4 mx-auto">
											<div class="form-group">
												<button type="submit" class="btn btn-block btn-primary" name="update">Update</button>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<!-- End Row -->

				<!-- Row -->
				<div class="row row-sm">
					<div class="col-lg-12 col-md-12">
						<div class="card custom-card">
							<div class="card-body">
								<div class="row">
									<div class="col-md-12">
										<div class="table-responsive">
											<table class="table">
												<thead>
													<tr>
														<th>#</th>
														<th>Name</th>
														<th>Checkbox</th>
														<th>USD</th>
														<th>Description</th>
														<th>Status</th>
													</tr>
												</thead>
												<tbody>
													<?php
													$i = 1;
													$select = mysqli_query($con, "select * from esimlive");
													while($row1 = mysqli_fetch_array($select)){
													?>
													<tr>
														<td><?php echo $i++; ?></td>
														<td><?php echo $row1['name']; ?></td>
														<td><?php echo $row1['checked']; ?></td>
														<td><?php echo $row1['USD']; ?></td>
														<td><?php echo $row1['short_desc']; ?></td>
														<td><?php if($row1['status']=="A"){ echo "Active"; } else{ echo "Deactive"; } ?></td>
													</tr>
													<?php } ?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
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
<script src="assets/plugins/summernote/summernote-bs4.js"></script>
<script src="assets/plugins/sidemenu/sidemenu.js"></script>
<script src="assets/plugins/sidebar/sidebar.js"></script>
<script src="assets/js/sticky.js"></script>
<script src="assets/js/custom.js"></script>
<script>
$('#summernote').summernote({
    placeholder: 'Enter eSIM Notes',
    height: 100
  });
</script>
</body>
</html>
<?php } else{ include("signin.php"); } ?>