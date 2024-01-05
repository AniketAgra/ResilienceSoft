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
	<title>Blogs</title>
	<link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
	<link href="assets/plugins/web-fonts/icons.css" rel="stylesheet"/>
	<link href="assets/plugins/web-fonts/font-awesome/font-awesome.min.css" rel="stylesheet">
	<link href="assets/plugins/web-fonts/plugin.css" rel="stylesheet"/>
	<link href="assets/css/style.css" rel="stylesheet">
	<link href="assets/css/skins.css" rel="stylesheet">
	<link href="assets/css/dark-style.css" rel="stylesheet">
	<link href="assets/css/colors/default.css" rel="stylesheet">
	<link id="theme" rel="stylesheet" type="text/css" media="all" href="assets/css/colors/color.css">
	<link href="assets/plugins/select2/css/select2.min.css" rel="stylesheet">
	<link href="assets/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
	<link href="assets/plugins/fileuploads/css/fileupload.css" rel="stylesheet" type="text/css"/>
	<link href="assets/plugins/fancyuploder/fancy_fileupload.css" rel="stylesheet" />
	<link rel="stylesheet" href="assets/plugins/telephoneinput/telephoneinput.css">
	<link href="assets/css/sidemenu/sidemenu.css" rel="stylesheet">
</head>
<body class="main-body leftmenu">
<?php
if(isset($_GET['del']))
{
	$del = base64_decode($_GET['del']);
	if(!empty($del))
	{
		$delete = mysqli_query($con, "delete from blogs where id='$del'");
		if($delete)
		{
			header("location:view-blogs.php");
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
							<li class="breadcrumb-item active" aria-current="page">Blogs</li>
						</ol>
					</div>
					<div class="d-flex">
						<div class="justify-content-center">
							<a href="add-blog.php" class="btn btn-primary btn-block"><i class="fa fa-plus mr-2"></i> Add Blogs</a>
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
								<div class="table-responsive">
									<table class="table">
										<thead>
											<th>#</th>
											<th>Blog Name</th>
											<th>Category</th>
											<th>Image</th>
											<th>Status</th>
											<th>Date</th>
											<th>Action</th>
										</thead>
										<tbody>
											<?php
											$i = 1;
											$select = mysqli_query($con, "select * from blogs INNER JOIN blog_category ON blog_category.id=blogs.cat_id");
											while ($row = mysqli_fetch_array($select)) {
											?>
											<tr>
												<td><?php echo $i++; ?></td>
												<td><?php echo $row['blog_name']; ?></td>
												<td><?php echo $row['category_name']; ?></td>
												<td><img src="../images/blog/<?php echo $row['image']; ?>" style="max-width: 80px;"></td>
												<td><?php if($row['status']=="A"){ echo "Active"; } else{ echo "Deactive"; } ?></td>
												<td><?php echo $row['date']; ?></td>
												<td>
													<a href="#" class="text-info mr-2"><i class="fa fa-pen"></i></a>
													<a href="blog-category.php?del=<?php echo base64_encode($row['id']); ?>" class="text-danger"><i class="fa fa-trash"></i></a>
												</td>
											</tr>
											<?php } ?>
										</tbody>
									</table>
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
<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/plugins/jquery-ui/ui/widgets/datepicker.js"></script>
<script src="assets/plugins/bootstrap-daterangepicker/moment.min.js"></script>
<script src="assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="assets/plugins/fileuploads/js/fileupload.js"></script>
<script src="assets/plugins/fileuploads/js/file-upload.js"></script>
<script src="assets/plugins/fancyuploder/jquery.ui.widget.js"></script>
<script src="assets/plugins/fancyuploder/jquery.fileupload.js"></script>
<script src="assets/plugins/fancyuploder/jquery.iframe-transport.js"></script>
<script src="assets/plugins/fancyuploder/jquery.fancy-fileupload.js"></script>
<script src="assets/plugins/fancyuploder/fancy-uploader.js"></script>
<script src="assets/js/advanced-form-elements.js"></script>
<script src="assets/js/select2.js"></script>
<script src="assets/plugins/telephoneinput/telephoneinput.js"></script>
<script src="assets/plugins/telephoneinput/inttelephoneinput.js"></script>
<script src="assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="assets/plugins/sidemenu/sidemenu.js"></script>
<script src="assets/plugins/sidebar/sidebar.js"></script>
<script src="assets/plugins/select2/js/select2.min.js"></script>
<script src="assets/js/sticky.js"></script>
<script src="assets/js/custom.js"></script>
</body>
</html>
<?php } else{ include("signin.php"); } ?>