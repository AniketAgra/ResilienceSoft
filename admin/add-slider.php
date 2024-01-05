<?php 
session_start();
if(!isset($_SESSION['admin_user']))
{
   include("signin.php");
} else{
   include("include/config.php"); 
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
	<title>Add Slider</title>
	<link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css"/>
	<link rel="stylesheet" href="assets/plugins/web-fonts/icons.css"/>
	<link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="assets/plugins/web-fonts/font-awesome/font-awesome.min.css">
	<link rel="stylesheet" href="assets/plugins/web-fonts/plugin.css"/>
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/skins.css">
	<link rel="stylesheet" href="assets/plugins/upload/image-uploader.min.css">
	<link rel="stylesheet" href="assets/plugins/summernote/summernote-bs4.css">
	<link rel="stylesheet" href="assets/css/dark-style.css">
	<link rel="stylesheet" href="assets/css/colors/default.css">
	<link rel="stylesheet" href="assets/css/colors/color.css">
	<link rel="stylesheet" href="assets/plugins/fileuploads/css/fileupload.css"/>
	<link rel="stylesheet" href="assets/css/sidemenu/sidemenu.css">
</head>
<body class="main-body leftmenu">

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
							<li class="breadcrumb-item"><a href="sliders.php">Sliders</a></li>
							<li class="breadcrumb-item active" aria-current="page">Add Slider</li>
						</ol>
					</div>
				</div>
				<!-- End Page Header -->


				<!-- Row -->
				<div class="row row-sm">
					<div class="col-lg-12 col-md-12">
						<div class="card custom-card">
							<div class="card-body">
								<form id="blog-form">
									<div class="row">
										<div class="col-lg-12" id="result"></div>
										<div class="col-lg-12">
											<div class="form-group">
												<label class="font-weight-bold">First Title</label>
												<input type="text" class="form-control" name="first-title" placeholder="Enter First Title">
											</div>
										</div>
										<div class="col-lg-12">
											<div class="form-group">
												<label class="font-weight-bold">Second Title</label>
												<input type="text" class="form-control" name="second-title" placeholder="Enter Second Title">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-6">
											<div class="form-group">
												<label class="font-weight-bold">Image</label>
												<input type="file" class="dropify" name="image" data-height="200" />
											</div>
										</div>
										<div class="col-lg-6">
										    <div class="row">
        										<div class="col-md-6">
        											<div class="form-group">
        												<label class="font-weight-bold">Box View</label>
        												<select class="form-control" name="box-view">
        													<option value="">Select Box View</option>
        													<option value="YES">YES</option>
        													<option value="NO">NO</option>
        												</select>
        											</div>
        										</div>
        										<div class="col-md-6">
        											<div class="form-group">
        												<label class="font-weight-bold">Button View</label>
        												<select class="form-control" name="btn-view">
        													<option value="">Select Button View</option>
        													<option value="YES">YES</option>
        													<option value="NO">NO</option>
        												</select>
        											</div>
        										</div>
    										</div>
											<div class="form-group">
												<!--<label class="font-weight-bold">Button Title</label>-->
												<input type="text" class="form-control" name="btn-title" placeholder="Enter Button Title">
											</div>
											<div class="form-group">
												<!--<label class="font-weight-bold">Button URL</label>-->
												<input type="url" class="form-control" name="btn-url" placeholder="Enter Button URL">
											</div>
											<div class="form-group">
												<!--<label class="font-weight-bold">Status</label>-->
												<select class="form-control" name="status">
													<option value="">Select Status</option>
													<option value="A">Active</option>
													<option value="D">Deactive</option>
												</select>
											</div>
										</div>
									</div>
									<div class="row">
									    <div class="col-lg-12">
									        <div class="form-group">
												<label class="font-weight-bold">Short Description</label>
												<textarea class="form-control" name="short-desc" rows="3" placeholder="Enter Short Description"></textarea>
											</div>
									    </div>
									</div>
									<div class="row">
										<div class="col-lg-4 mx-auto">
											<div class="form-group">
												<button type="button" id="insert" class="btn btn-block btn-primary">Submit</button>
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

	<!-- Main Footer-->
	<?php include("include/footer.php"); ?>
	<!--End Footer-->


</div>
<!-- End Page -->


<!-- Jquery js-->
<script src="assets/plugins/jquery/jquery.min.js"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/plugins/fileuploads/js/fileupload.js"></script>
<script src="assets/plugins/fileuploads/js/file-upload.js"></script>
<script src="assets/plugins/upload/image-uploader.min.js"></script>
<script src="assets/plugins/summernote/summernote-bs4.js"></script>
<script src="assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="assets/plugins/sidemenu/sidemenu.js"></script>
<script src="assets/plugins/sidebar/sidebar.js"></script>
<script src="assets/js/sticky.js"></script>
<script src="assets/js/custom.js"></script>
<script type="text/javascript">
//insert Records
$('#insert').click(function() {
	var formData = new FormData($("#blog-form")[0]);
   	$.ajax({
      	url: "ajax/sliders/add-slider.php",
      	type: "POST",
      	data: formData,
      	cache: false,
      	processData:false,
      	contentType:false,
      	success:function(data, status){
         	$("#result").html(data);
      	}
   	});
});
</script>
</body>
</html>
<?php } ?>