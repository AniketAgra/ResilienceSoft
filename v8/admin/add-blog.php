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
	<title>Add Blog</title>
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
							<li class="breadcrumb-item active" aria-current="page">Add Blogs</li>
						</ol>
					</div>
					<div class="d-flex">
						<div class="justify-content-center">
							<a href="view-blogs.php" class="btn btn-primary btn-block"><i class="fa fa-plus mr-2"></i> View Blogs</a>
						</div>
					</div>
				</div>
				<!-- End Page Header -->

				<!-- Row -->
				<div class="row row-sm">
					<div class="col-lg-12 col-md-12">
						<div class="card custom-card">
							<div class="card-header"><h6>Blogs</h6></div>
							<div class="card-body">
								<form method="post" enctype="multipart/form-data">
									<div class="row">
										<div class="col-md-8">
											<div class="form-group">
												<input type="text" class="form-control" name="name" placeholder="Blog Name" required="required">
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<select class="form-control" name="category" required="required">
													<option value="">Select Category</option>
													<option value="A">Active</option>
													<option value="D">Deactive</option>
												</select>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Blog Image</label>
												<input type="file" class="form-control dropify" data-height="100" name="image" required="required">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Gallery</label>
												<input id="demo" type="file" name="files" accept=".jpg, .png, image/jpeg, image/png" multiple>
											</div>
										</div>
										<div class="col-md-12">
											<div class="form-group">
												<textarea id="summernote" name="desc"></textarea>
											</div>
											<div class="form-group">
												<select class="form-control" name="status" required="required">
													<option value="">Select Status</option>
													<option value="A">Active</option>
													<option value="D">Deactive</option>
												</select>
											</div>
											<div class="form-group">
												<div class="col-sm-4 mx-auto">
													<button class="btn btn-block btn-primary" name="Submit">Submit</button>
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

	<!-- Main Footer-->
	<?php include("include/footer.php"); ?>
	<!--End Footer-->

	<!-- Sidebar -->
	<?php include("include/right-sidebar.php"); ?>
	<!-- End Sidebar -->

</div>
<!-- End Page -->

<div class="modal" id="modaldemo8">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content modal-content-demo">
			<div class="modal-header">
				<h6 class="modal-title">Add Blog Category</h6>
				<button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">×</span></button>
			</div>
			<div class="modal-body">
				<form method="post" enctype="multipart/form-data">
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<input type="text" class="form-control" name="name" placeholder="Enter Category Name" required="required">
							</div>
							<div class="form-group">
								<select class="form-control" name="status" required="required">
									<option value="">Select Status</option>
									<option value="A">Active</option>
									<option value="D">Deactive</option>
								</select>
							</div>
							<div class="form-group">
								<div class="col-sm-6 mx-auto">
									<button class="btn btn-block btn-primary" name="Submit">Submit</button>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>




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