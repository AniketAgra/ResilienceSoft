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
	<title>Pages</title>
	<link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
	<link href="assets/plugins/web-fonts/icons.css" rel="stylesheet"/>
	<link href="assets/plugins/web-fonts/font-awesome/font-awesome.min.css" rel="stylesheet">
	<link href="assets/plugins/web-fonts/plugin.css" rel="stylesheet"/>
	<link href="assets/plugins/datatable/dataTables.bootstrap4.min.css" rel="stylesheet" />
	<link href="assets/plugins/datatable/responsivebootstrap4.min.css" rel="stylesheet" />
	<link href="assets/plugins/datatable/fileexport/buttons.bootstrap4.min.css" rel="stylesheet" />
	<link href="assets/css/style.css" rel="stylesheet">
	<link href="assets/css/skins.css" rel="stylesheet">
	<link href="assets/css/dark-style.css" rel="stylesheet">
	<link href="assets/css/colors/default.css" rel="stylesheet">
	<link id="theme" rel="stylesheet" type="text/css" media="all" href="assets/css/colors/color.css">
	<link href="assets/plugins/select2/css/select2.min.css" rel="stylesheet">
	<link href="assets/css/sidemenu/sidemenu.css" rel="stylesheet">
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
	<?php include('include/sidebar.php'); ?>
	<!-- End Sidemenu -->

	<!-- Main Header-->
	<?php include('include/header.php'); ?>
	<!-- End Main Header-->

	<!-- Main Content-->
	<div class="main-content side-content pt-0">

		<div class="container-fluid">
			<div class="inner-body">

				<!-- Page Header -->
				<div class="page-header my-1">
					<div>
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="index"><i class="fa fa-home"></i></a></li>
							<li class="breadcrumb-item active" aria-current="page">Pages</li>
						</ol>
					</div>
					<div class="d-flex">
						<div class="justify-content-center">
							<a href="add-page.php" class="btn btn-primary my-2 btn-icon-text">
							  <i class="fa fa-plus mr-2"></i> Add Page
							</a>
						</div>
					</div>
				</div>
				<!-- End Page Header -->

				<!-- Row -->
				<div class="row row-sm">
					<div class="col-lg-12">
						<div class="card custom-card overflow-hidden">
							<div class="card-body">
								<div class="table-responsive">
									<table class="table">
										<thead>
											<tr class="text-center">
												<th class="wd-5p">#</th>
												<th class="wd-25p text-left">Page Title</th>
												<th class="wd-30p">Image</th>
												<th class="wd-15p">Action</th>
											</tr>
										</thead>
										<tbody>
										    <tr class="text-center">
												<td>1</td>
												<td class="text-left">Slider</td>
												<td>No Images</td>
												<td>
													<a href="sliders.php" title="Page Update" class="btn btn-sm btn-info"><i class="fa fa-pen"></i></a>
												</td>
											</tr>
											<tr class="text-center">
												<td>2</td>
												<td class="text-left">FAQ</td>
												<td>No Images</td>
												<td>
													<a href="faq.php" title="Page Update" class="btn btn-sm btn-info"><i class="fa fa-pen"></i></a>
												</td>
											</tr>
											<?php
											$i = 3;
											$select = mysqli_query($con, "select * from pages");
											while($row = mysqli_fetch_assoc($select)){
											?>
											<tr class="text-center">
												<td><?php echo $i++; ?></td>
												<td class="text-left"><?php echo $row['title']; ?></td>
												<td><img src="../assets/images/banner/<?php echo $row['image']; ?>" height="50"></td>
												<td>
													<a href="edit-page.php?edit=<?php echo $row['id']; ?>" title="Page Update" class="btn btn-sm btn-info"><i class="fa fa-pen"></i></a>
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
	<?php include('include/footer.php'); ?>
	<!--End Footer-->


</div>
<!-- End Page -->

<!-- Back-to-top -->
<a href="#top" id="back-to-top"><i class="fe fe-arrow-up"></i></a>

<!-- Jquery js-->
<script src="assets/plugins/jquery/jquery.min.js"></script>

<!-- Bootstrap js-->
<script src="assets/plugins/bootstrap/js/popper.min.js"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>

<!-- Select2 js-->
<script src="assets/plugins/select2/js/select2.min.js"></script>

<!-- Internal Data Table js -->
<script src="assets/plugins/datatable/jquery.dataTables.min.js"></script>
<script src="assets/plugins/datatable/dataTables.bootstrap4.min.js"></script>
<script src="assets/plugins/datatable/dataTables.responsive.min.js"></script>
<script src="assets/plugins/datatable/fileexport/dataTables.buttons.min.js"></script>
<script src="assets/plugins/datatable/fileexport/buttons.bootstrap4.min.js"></script>
<script src="assets/js/table-data.js"></script>
<script src="assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="assets/plugins/sidemenu/sidemenu.js"></script>
<script src="assets/plugins/sidebar/sidebar.js"></script>
<script src="assets/js/sticky.js"></script>
<script src="assets/js/custom.js"></script>
</body>
</html>
<?php } ?>