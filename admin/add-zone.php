<?php
session_start();
if( isset($_SESSION['admin_user']) && isset($_SESSION['admin_role']) && ($_SESSION['admin_role']=="A")){
	include("include/config.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
	<link rel="icon" href="assets/img/brand/favicon.ico" type="image/x-icon"/>
	<title>Add Zone</title>
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
	<link rel="stylesheet" href="assets/plugins/fileuploads/css/fileupload.css" type="text/css"/>
	<link rel="stylesheet" href="assets/plugins/fancyuploder/fancy_fileupload.css" />
	<link rel="stylesheet" href="assets/css/sidemenu/sidemenu.css">
	<link rel="stylesheet" href="assets/css/styles.css">
	<style type="text/css">
	tbody { display: block;height: 260px;overflow: auto; }
	thead, tbody tr { display: table;width: 100%;table-layout: fixed; }
	thead { width: calc( 100% - 1em ) }
	input[type="checkbox"]{ height:20px;width:20px}
	</style>
</head>
<body class="main-body leftmenu">
<?php
if(isset($_POST['submit']))
{
	$name    = $_POST['name'];
	$country = implode(",", $_POST['country']);
	$status  = $_POST['status'];
	$pos     = $_POST['pos'];
	$url     = $_POST['url'];
	$tags    = $_POST['tags'];
	$keys    = $_POST['keys'];
	$desc    = $_POST['desc'];

	$img  = $_FILES['image']['name'];
	$tmp  = $_FILES['image']['tmp_name'];

	$new = @end(explode(".", $img));
	$new_img = time().".".$new;
	if(move_uploaded_file($tmp, "../assets/images/continent/$new_img"))
	{
		$insert = mysqli_query($con, "insert into zones (zone_name,image,countries,zone_url,tags,status,position,meta_keys,meta_desc) values ('$name','$new_img','$country','$url','$tags','$status','$pos','$keys','$desc')");
		if($insert)
		{
			echo "<script>alert('Zone Added Successfully')</script>";
		}
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
							<li class="breadcrumb-item"><a href="zone.php">Zone</a></li>
							<li class="breadcrumb-item active" aria-current="page">Add Zone</li>
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
										<div class="col-md-12">
											<div class="form__div">
												<input type="text" class="form__input required" id="name" name="name" placeholder=" " >
											    <label for="name" class="form__label">Enter Zone Name</label>
											</div>
										</div>
										<div class="col-md-7">
										    <div class="row">
										        <div class="col-md-12">
        											<div class="form-group">
        												<label>Zone Image</label>
        												<input type="file" class="form-control dropify" data-height="100" name="image" required="required">
        											</div>
        										</div>
        										<div class="col-md-6">
        											<div class="form-group">
        												<select class="form-control" name="status" required="required">
        													<option value="">Select Status</option>
        													<option value="A">Active</option>
        													<option value="D">Deactive</option>
        												</select>
        											</div>
        										</div>
        										<div class="col-md-6">
        											<div class="form__div">
        		                                        <input type="number" class="form__input required" id="pos" name="pos" placeholder=" " >
        											    <label for="pos" class="form__label">Position</label>
        											</div>
        										</div>
        										<div class="col-md-12">
        											<div class="form__div">
        												<input type="text" class="form__input required" id="url" name="url" placeholder=" ">
        											    <label for="url" class="form__label">Enter Url</label>
        											</div>
        											<div class="form__div">
        												<input type="text" class="form__input required" name="tags" value="<?php echo $row['tags']; ?>" placeholder=" " required="required">
        											    <label for="tags" class="form__label">Tags</label>
        											</div>
        											<div class="form__div">
        												<input type="text" class="form__input required" id="keys" name="keys" placeholder=" " required="required">
        											    <label for="keys" class="form__label">Meta Keywords</label>
        											</div>
        											<div class="form__div">
        												<textarea class="form__input required" rows="3" name="desc" id="desc" placeholder=" "></textarea>
        											    <label for="desc" class="form__label">Meta Description</label>
        											</div>
        										</div>
        									</div>
										</div>
										<div class="col-md-5">
											<div class="form-group">
												<label>Supported Countries</label>
												<div class="table-responsive border">
													<table class="table">
														<thead>
															<tr>
																<th>#</th>
																<th>Country</th>
																<th>Flag</th>
															</tr>
														</thead>
														<tbody>
															<?php
															$select_country = mysqli_Query($con, "select * from countries");
															while($country_row = mysqli_fetch_assoc($select_country)){
															?>
															<tr>
																<td><input type="checkbox" name="country[]" value="<?php echo $country_row['id']; ?>"></td>
																<td><?php echo $country_row['country_name']; ?></td>
																<td><img src="../assets/images/flag/<?php echo $country_row['flag']; ?>" height="30"></td>
															</tr>
															<?php } ?>
														</tbody>
													</table>
												</div>
											</div>
										</div>
										<div class="col-md-12">
											<div class="form-group">
												<div class="col-sm-3 mx-auto">
													<button class="btn btn-block btn-primary" name="submit">Submit</button>
												</div>
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
<script src="assets/plugins/summernote/summernote-bs4.js"></script>
<script src="assets/plugins/fileuploads/js/fileupload.js"></script>
<script src="assets/plugins/fileuploads/js/file-upload.js"></script>
<script src="assets/plugins/fancyuploder/jquery.ui.widget.js"></script>
<script src="assets/plugins/fancyuploder/jquery.fileupload.js"></script>
<script src="assets/plugins/fancyuploder/jquery.iframe-transport.js"></script>
<script src="assets/plugins/fancyuploder/jquery.fancy-fileupload.js"></script>
<script src="assets/plugins/fancyuploder/fancy-uploader.js"></script>
<script src="assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="assets/plugins/sidemenu/sidemenu.js"></script>
<script src="assets/plugins/sidebar/sidebar.js"></script>
<script src="assets/js/sticky.js"></script>
<script src="assets/js/custom.js"></script>
<script type="text/javascript">
$(document).ready(function() {
  	$('#summernote').summernote({
  		minHeight: 150,
  		focus: true
  	});
});
</script>
</body>
</html>
<?php } else{ include("signin.php"); } ?>