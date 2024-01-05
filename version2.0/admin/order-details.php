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
	<title>Edit Plan</title>
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
	<style type="text/css">
	.inputContainer { position: relative;margin-bottom: 20px;}
    .inputContainer input { padding: 10px 15px;margin-top: 10px;border: 2px solid #efefef;width: 100%;border-radius: 5px; }
    .inputContainer label { position: absolute;top: 22px;left: 10px;transform-origin: 0 0;transition: all 0.3s ease;color: #666;font-weight: 200 }
    .inputContainer input:focus+label,.inputContainer input:valid+label { transform: translateY(-35px) scale(.950);}

    .inputContainer textarea { padding: 10px 15px;margin-top: 10px;border: 2px solid #efefef;width: 100%;border-radius: 5px; }
    .inputContainer textarea:focus+label,.inputContainer textarea:valid+label { transform: translateY(-35px) scale(.950);}

    .inputContainer select { padding: 10px 15px;margin-top: 10px;border: 2px solid #efefef;width: 100%;border-radius: 5px; }
    .inputContainer select:focus+label,.inputContainer select:valid+label { transform: translateY(-35px) scale(.950);}
	</style>
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
							<li class="breadcrumb-item"><a href="orders.php">Orders</a></li>
							<li class="breadcrumb-item active" aria-current="page">Orders Detail</li>
						</ol>
					</div>
				</div>
				<!-- End Page Header -->
				<?php
				$select = mysqli_query($con, "select * from orders where id='".$_GET['orderId']."'");
				$row = mysqli_fetch_array($select);
				?>
				<!-- Row -->
				<div class="row row-sm">
					<div class="col-lg-12 col-md-12">
						<div class="card custom-card">
							<div class="card-body">
								<form method="post">
									<div id="error-msg"></div>
									<div class="row">
										<div class="col-md-4">
											<div class="inputContainer">
                                                <input type="hidden" id="id" value="<?php echo $row['id']; ?>" />
                                                <input type="text" id="name" value="<?php echo $row['plan_name']; ?>" required />
                                                <label for="name">Plan Name</label>
                                            </div>
										</div>
										<div class="col-md-4">
											<div class="inputContainer">
												<select id="zone" required="required">
												<?php
												$select1 = mysqli_query($con, "select * from zones where status='A'");
												while($row1 = mysqli_fetch_array($select1)){
												if($row1['id']==$row['zone_id']){
												?>
												<option value="<?php echo $row1['id']; ?>" selected><?php echo $row1['zone_name']; ?></option>
												<?php	} else{ ?>
												<option value="<?php echo $row1['id']; ?>"><?php echo $row1['zone_name']; ?></option>
												<?php } } ?>
												</select>
												<label for="zone">Continent <span>*</span></label>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<div class="inputContainer">
                                                    <input type="number" id="gb" value="<?php echo $row['GB']; ?>" required />
                                                    <label for="gb">GB</label>
                                                </div>
											</div>
										</div>
										<div class="col-md-4">
											<div class="inputContainer">
                                                <input type="number" id="mins" value="<?php echo $row['Mins']; ?>" required />
                                                <label for="mins">Mins</label>
                                            </div>
										</div>
										<div class="col-md-4">
											<div class="inputContainer">
                                                <input type="number" id="sms" value="<?php echo $row['SMS']; ?>" required />
                                                <label for="sms">SMS</label>
                                            </div>
										</div>
										<div class="col-md-4">
											<div class="inputContainer">
                                                <input type="number" id="days" value="<?php echo $row['Days']; ?>" required />
                                                <label for="days">Days</label>
                                            </div>
										</div>
										<div class="col-md-4">
											<div class="inputContainer">
                                                <input type="number" id="usd" value="<?php echo $row['USD']; ?>" required />
                                                <label for="usd">USD</label>
                                            </div>
										</div>
										<div class="col-md-4">
											<div class="inputContainer">
                                                <input type="text" id="moniker" value="<?php echo $row['Moniker']; ?>" required />
                                                <label for="moniker">Moniker</label>
                                            </div>
										</div>
										<div class="col-md-4">
											<div class="inputContainer">
												<select id="status" required="required">
													<?php if($row['status']=="A"){ ?>
													<option value="A" selected>Active</option>
													<option value="D">Deactive</option>
													<?php } else{ ?>
													<option value="A">Active</option>
													<option value="D" selected>Deactive</option>
													<?php } ?>
												</select>
												<label for="status">Status <span>*</span></label>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-2 mx-auto">
											<div class="form-group">
												<button type="button" class="btn btn-block btn-primary" id="edit-plan">Update</button>
											</div>
										</div>
										<div class="col-md-2 mx-auto">
											<div class="form-group">
												<button type="button" class="btn btn-block btn-primary" id="re-send">Re Send</button>
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
<script type="text/javascript">
$("#re-send" ).click(function(){

   	var id = $("#id").val();

   	$.ajax({
      	url: "ajax/orders/re-send.php",
      	type: "POST",
      	data: { id:id },
      	success:function(data,status)
      	{
      		alert(data);
         	$("#error-msg").html(data);
      	}
   	});
});
</script>
</body>
</html>
<?php } else{ include("signin.php"); } ?>