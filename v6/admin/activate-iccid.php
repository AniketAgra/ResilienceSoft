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
	<title>Add ICCID</title>
	<link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css"/>
	<link rel="stylesheet" href="assets/plugins/web-fonts/icons.css"/>
	<link rel="stylesheet" href="assets/plugins/web-fonts/font-awesome/font-awesome.min.css">
	<link rel="stylesheet" href="assets/plugins/web-fonts/plugin.css"/>
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/plugins/summernote/summernote-bs4.css">
	<link rel="stylesheet" href="assets/css/skins.css">
	<link rel="stylesheet" href="assets/css/dark-style.css">
	<link rel="stylesheet" href="assets/css/colors/default.css">
	<link rel="stylesheet" href="assets/css/colors/color.css">
	<link rel="stylesheet" href="assets/css/sidemenu/sidemenu.css">
	<link rel="stylesheet" href="assets/css/styles.css">
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
							<li class="breadcrumb-item"><a href="iccid.php">ICCID</a></li>
							<li class="breadcrumb-item active" aria-current="page">Add ICCID</li>
						</ol>
					</div>
				</div>
				<!-- End Page Header -->

				<!-- Row -->
				<div class="row row-sm">
					<div class="col-lg-12 col-md-12">
						<div class="card custom-card">
							<div class="card-body">
								<form method="post" id="activationForm" action="activate_esim.php">
									<div class="row">
										<div class="col-md-4">
											<div class="form__div">
												<input type="text" name="name" id="name" value="" class="form__input required" placeholder=" " required>
												<input type="hidden" name="iccid" id="iccid" value="<?php echo $_GET['iccid']; ?>">
											    <label for="from" class="form__label">Customer Name <span class="text-danger">*</span></label>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form__div">
												<input type="email" name="to_email" id="to_email" class="form__input" placeholder=" " required>
												<label for="to" class="form__label">Customer Email <span class="text-danger">*</span></label>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form__div">
												<input type="number" name="mobile" id="mobile" class="form__input" placeholder=" " required>
												<label for="mobile" class="form__label">Customer Mobile <span class="text-danger">*</span></label>
											</div>
										</div>
																				<div class="col-md-6">
										    <div class="row row-xs align-items-center mg-b-20">
												<div class="col-md-2">
													<label for="zone" class="mg-b-0">Zone</label>
												</div>
												<div class="col-md-8 mg-t-5 mg-md-t-0">
													<select name="zone" id="zone" class="form-control d-inline">
    												    <option value="">Select Zone</option>
    												    <?php
    												    $select = mysqli_query($con, "Select * from zones where status='A'");
    												    while($row = mysqli_fetch_assoc($select)){
    												        echo '<option value="'.$row['id'].'">'.$row['zone_name'].'</option>';
    												    }
    												    ?>
    												</select>
												</div>
											</div>
										</div>
										<div class="col-md-6">
										    <div class="row row-xs align-items-center mg-b-20">
												<div class="col-md-2">
													<label for="plan" class="mg-b-0">Plans</label>
												</div>
												<div class="col-md-8 mg-t-5 mg-md-t-0">
													<select name="plan" id="plan" class="form-control">
    												    <option value="">Select Plan</option>
    												</select>
												</div>
											</div>
										</div>
										<div class="col-md-12">
											<div class="row row-xs align-items-center mg-b-20">
												<div class="col-md-1">
												    <label for="cc" class="mg-b-0">Subject <span class="text-danger">*</span></label>
												</div>
												<div class="col-md-11 mg-t-5 mg-md-t-0">
													<input type="text" name="subject" id="subject" value="" class="form-control" required>
												</div>
												
											</div>
										</div>
										<div class="col-md-12">
											<div class="row row-xs align-items-center mg-b-20">
												<div class="col-md-1">
												    <label for="cc" class="mg-b-0">Cc</label>
												</div>
												<div class="col-md-11 mg-t-5 mg-md-t-0">
													<input type="text" name="cc" id="cc" value="cs@gsm2go.com" class="form-control">
												</div>
												
											</div>
										</div>
									</div>
									<div class="col-md-12" id="emailContent" style="display:none;">
										<textarea id="summernote" name="editordata"><?php echo @$message; ?></textarea>
									</div>
									<div class="row">
										<div class="col-md-4 mx-auto mt-2">
											<button type="button" onclick="getEmailContent('email');" id="nextButton" class="btn btn-primary btn-block">Next</button>
											<input type="submit" id="orgSubmit" value=" " style="z-index:-1;opacity:0;position:absolute;"/>
											<input type="button" onclick="getEmailContent('submit');" id="submitButton" style="display:none;" class="btn btn-primary btn-block" value="Submit" />
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
<script src="assets/plugins/bootstrap/js/popper.min.js"></script>
<script src="assets/plugins/summernote/summernote-bs4.js"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
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
$(document).ready(function(){
    $("#zone").on("change",function(){
        var zoneid = $(this).val();
        $.ajax({
            url :"ajax/plans.php",
            type:"POST",
            cache:false,
            data:{zoneid:zoneid},
            success:function(data){
                $("#plan").html(data);
            }
        });
    });
});
</script>
<script type="text/javascript">
	function getEmailContent(type) {
		var name    = $("#name").val();
		var iccid   = $("#iccid").val();
		var to      = $("#to_email").val();
		var mobile  = $("#mobile").val();
		var subject = $("#subject").val();
		var zone    = $("#zone").val();
		var plan    = $("#plan").val();
		var cc      = $("#cc").val();
		
		if(name != '' && iccid != '' && to != '' && mobile != '' && subject != '') {
			$.ajax({
				url: "ajax/iccid-update.php",
				type: "POST",
				async: false,
				data: { name:name,iccid:iccid,email:to,mobile:mobile,subject:subject,zone:zone,plan:plan,cc:cc },
				success:function(data,status)
				{
					$('#nextButton').hide();
					$('#submitButton').show();
					$('#emailContent').show();
					$('#summernote').summernote('code', data);
					if(type=='submit') {
						$('#orgSubmit').trigger('click');
					}
				}
			});
		} else {
			alert("Kindly enter all the mantatory fields");
		}
	}
</script>
</body>
</html>
<?php } else{ include("signin.php"); } ?>