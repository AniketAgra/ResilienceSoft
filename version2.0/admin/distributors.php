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
	<title>All Distributors</title>
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
	<link href="assets/css/sidemenu/sidemenu.css" rel="stylesheet">
</head>
<body class="main-body leftmenu">
<?php
if(isset($_POST['submit']))
{
    $distributor = $_POST['distributor'];
    $moniker     = $_POST['moniker'];
    $status      = $_POST['status'];

    $insert = mysqli_query($con, "insert into distributors (distributor,distributor_moniker,status) values ('$distributor','$moniker','$status')");
    if($insert) 
    {
        echo "<script>alert('Distributor Added Successfully')</script>";
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
					<div class="row w-100">
					    <div class="col-sm-6">
					        <div>
    					        <ol class="breadcrumb my-2">
        							<li class="breadcrumb-item"><a href="index"><i class="fa fa-home"></i></a></li>
        							<li class="breadcrumb-item active" aria-current="page">Distributors</li>
        						</ol>
        					</div>
					    </div>
					    <div class="col-sm-6 text-right">
					        <a data-effect="effect-newspaper" data-toggle="modal" href="#modaldemo8" class="btn btn-primary"><i class="fa fa-plus"></i></a>
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
									<table class="table" id="example1">
										<thead>
											<tr>
												<th class="wd-5p text-center">#</th>
												<th class="wd-10p">Distributor</th>
												<th class="wd-10p text-left">Moniker</th>
												<th class="wd-10p text-center">Status</th>
												<th class="wd-10p text-center">Created Date</th>
												<th class="wd-10p text-center">Action</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$i = 1;
											$select = mysqli_query($con, "select * from distributors");
											while($row = mysqli_fetch_assoc($select)){
											?>
											<tr>
												<td class="text-center"><?php echo $i++; ?></td>
												<td><?php echo $row['distributor']; ?></td>
												<td class="text-left"><?php echo $row['distributor_moniker']; ?></td>
												<td class="text-center">
												    <?php 
												    if($row['status']=='Active'){ echo '<span class="text-success">Active</span>'; }
												    else{ echo '<span class="text-danger">Deactive</span>'; }
												    ?>
												</td>
												<td class="text-center"><?php echo date('d-m-Y',strtotime($row['createdAt'])); ?></td>
												<td class="text-center">
													<button class="btn btn-sm btn-info"><i class="fa fa-pen"></i></button>
													<button class="btn btn-sm btn-secondary"><i class="fa fa-times"></i></button>
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

<div class="modal" id="modaldemo8">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">Add Distributor</h6>
                <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body py-1">
                <form method="post">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Distributor Name</label>
                                <input type="text" class="form-control" name="distributor" required>
                            </div>
                            <div class="form-group">
                                <label>Moniker</label>
                                <input type="text" class="form-control" name="moniker" required="required">
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <select class="form-control" name="status" required="required">
                                    <option value="">Select Status</option>
                                    <option>Active</option>
                                    <option>Deactive</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-6 mx-auto">
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
<?php } else{ include("signin.php"); } ?>