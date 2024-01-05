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
	<title>Add Plan</title>
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
	$name       = $_POST['name'];
	$tags       = $_POST['tags'];
	$continent  = $_POST['continent'];
	$data       = $_POST['data'];
	$voice      = $_POST['voice'];
	$validity   = $_POST['validity'];
	$amt        = $_POST['amt'];
	$moniker    = $_POST['moniker'];
	$status     = $_POST['status'];
	$desc       = $_POST['desc'];
	$shelf_time = $_POST['shelf_time'];
    $notes      = $_POST['notes'];

	$insert = mysqli_query($con, "insert into plans (plan_name,zone_id,GB,Mins,Days,content,USD,Moniker,shelf_time,tags,status,notes) values ('$name','$continent','$data','$voice','$validity','$desc','$amt','$moniker','$shelf_time','$tags','$status','$notes')");
	if($insert)
	{
		echo "<script>alert('Plan Added Successfully')</script>";
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
							<li class="breadcrumb-item"><a href="view-plan.php">Plans</a></li>
							<li class="breadcrumb-item active" aria-current="page">Add Plan</li>
						</ol>
					</div>
				</div>
				<!-- End Page Header -->

				<!-- Row -->
				<div class="row row-sm">
					<div class="col-lg-12 col-md-12">
						<div class="card custom-card">
							<div class="card-body">
								<form method="post" enctype="multipart/form-data">
									<div class="row">
										<div class="col-md-4">
											<div class="form-group">
												<label>Plan Name</label>
												<input type="text" class="form-control" name="name" placeholder="Enter Plan Name" required="required">
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
											    <label for="tags">Tags</label>
                                                <input type="text" name="tags" class="form-control" placeholder="Enter Tags" required />
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label>Continent</label>
												<select class="form-control" name="continent" required="required">
													<option value="">Select Continent</option>
												<?php
												$select1 = mysqli_query($con, "select * from zones where status='A'");
												while($row1 = mysqli_fetch_array($select1)){
												?>
												<option value="<?php echo $row1['id']; ?>"><?php echo $row1['zone_name']; ?></option>
												<?php } ?>
												</select>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label>GB</label>
												<input type="text" class="form-control" onkeypress="return isNumberKey(event)" name="data">
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label>Mins</label>
												<input type="number" class="form-control" name="voice">
											</div>
										</div>
										<div class="col-md-4">
											<div class="inputContainer">
                                                <label for="sms">SMS</label>
												<input type="number" class="form-control" id="sms" name="validity">
                                            </div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label>Days</label>
												<input type="number" class="form-control" name="validity" required="required">
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label>USD</label>
												<input type="number" class="form-control" name="amt" required="required">
											</div>
										</div>
										<div class="col-md-4">
											<div class="inputContainer">
                                                <label for="moniker">Moniker</label>
												<input type="number" class="form-control" name="moniker" placeholder="Moniker" required="required">
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
										<div class="col-md-8">
											<div class="form-group">
												<label>Description</label>
												<input type="text" class="form-control" name="desc" placeholder="Enter Description">
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label for="shelf_time">Shelf Time</label>
												<input type="number" class="form-control" id="shelf_time" name="shelf_time" placeholder="Enter Shelf Time" required="required">
											</div>
										</div>
										<div class="col-md-8">
											<div class="form-group">
											    <label for="notes">Internal Notes</label>
                                                <textarea id="notes" name="notes" class="form-control" rows="3" value=""></textarea>
                                                
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
<script language=Javascript>
function isNumberKey(evt)
{
  var charCode = (evt.which) ? evt.which : evt.keyCode;
  if (charCode != 46 && charCode > 31 
    && (charCode < 48 || charCode > 57))
     return false;

  return true;
}
</script>
</body>
</html>
<?php } else{ include("signin.php"); } ?>