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
	<link rel="icon" href="assets/img/brand/favicon.ico" type="image/x-icon"/>
	<title>Edit Slider</title>
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
<?php
$select = mysqli_query($con, "select * from sliders where id='".$_GET['edit']."'");
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
							<li class="breadcrumb-item"><a href="sliders.php">Sliders</a></li>
							<li class="breadcrumb-item active" aria-current="page">Edit Slider</li>
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
												<input type="hidden" name="id" value="<?php echo $_GET['edit']; ?>">
												<input type="text" class="form-control" name="first-title" value="<?php echo $row['first_title']; ?>" placeholder="Enter First Title">
											</div>
											<div class="form-group">
												<label class="font-weight-bold">First Title IL</label>
												<input type="hidden" name="id" value="<?php echo $_GET['edit']; ?>">
												<input type="text" class="form-control" name="first-title-il" value="<?php echo $row['first_title_il']; ?>" placeholder="Enter First Title IL">
											</div>
										</div>
										<div class="col-lg-12">
											<div class="form-group">
												<label class="font-weight-bold">Second Title</label>
												<input type="text" class="form-control" name="second-title" value="<?php echo $row['second_title']; ?>" placeholder="Enter Second Title">
											</div>
											<div class="form-group">
												<label class="font-weight-bold">Second Title IL</label>
												<input type="text" class="form-control" name="second-title-il" value="<?php echo $row['second_title_il']; ?>" placeholder="Enter Second Title IL">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-6">
											<div class="form-group">
												<label class="font-weight-bold">Image</label>
												<input type="file" class="dropify" data-default-file="../assets/images/upload/<?php echo $row['image']; ?>" name="image" data-height="200" />
											</div>
										</div>
										<div class="col-lg-6">
										    <div class="row">
        										<div class="col-md-6">
        											<div class="form-group">
        												<label class="font-weight-bold">Box View</label>
        												<select class="form-control" name="box-view">
        													<?php echo $row['box']; if($row['box']=="YES"){ ?>
        													<option value="YES">YES</option>
        													<option value="NO">NO</option>
        													<?php } else{ ?>
        													<option value="NO">NO</option>
        													<option value="YES">YES</option>
        													<?php } ?>
        												</select>
        											</div>
        										</div>
        										<div class="col-md-6">
        											<div class="form-group">
        												<label class="font-weight-bold">Button View</label>
        												<select class="form-control" name="btn-view">
        													<?php if($row['button']=="YES"){ ?>
        													<option value="YES">YES</option>
        													<option value="NO">NO</option>
        													<?php } else{ ?>
        													<option value="NO">NO</option>
        													<option value="YES">YES</option>
        													<?php } ?>
        												</select>
        											</div>
        										</div>
    										</div>
											<div class="form-group">
												<label class="font-weight-bold">Button Title</label>
												<input type="text" class="form-control" name="btn-title" value="<?php echo $row['btn_title']; ?>" placeholder="Enter Button Title">
											</div>
											<div class="form-group">
												<label class="font-weight-bold">Button Title IL</label>
												<input type="text" class="form-control" name="btn-title-il" value="<?php echo $row['btn_title_il']; ?>" placeholder="أدخل عنوان الزر">
											</div>
											<div class="form-group">
												<label class="font-weight-bold">Button URL</label>
												<input type="url" class="form-control" name="btn-url" value="<?php echo $row['btn_url']; ?>" placeholder="Enter Button URL">
											</div>
											<div class="form-group">
												<label class="font-weight-bold">Status</label>
												<select class="form-control" name="status">
												    <?php if($row['status']=="A"){ ?>
													<option value="A">Active</option>
													<option value="D">Deactive</option>
													<?php } else{ ?>
													<option value="A">Active</option>
													<option value="D">Deactive</option>
													<?php } ?>
												</select>
											</div>
										</div>
									</div>
									<div class="row">
									    <div class="col-lg-12">
									        <div class="form-group">
												<label class="font-weight-bold">Short Description</label>
												<textarea class="form-control" name="short-desc" rows="3" placeholder="Enter Short Description"><?php echo $row['short_desc']; ?></textarea>
											</div>
											<div class="form-group">
												<label class="font-weight-bold">Short Description IL</label>
												<textarea class="form-control" name="short-desc-il" rows="3" placeholder="أدخل وصفًا قصيرًا"><?php echo $row['short_desc_il']; ?></textarea>
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
$('#insert').click(function() {
	var formData = new FormData($("#blog-form")[0]);
   	$.ajax({
      	url: "ajax/sliders/edit-slider.php",
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