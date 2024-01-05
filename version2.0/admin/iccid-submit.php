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
	<title>Add ICCID</title>
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
</head>
<body class="main-body leftmenu">
<?php
$select = mysqli_query($con, "select * from ICCID where ICCID='".$_GET['iccid']."'");
$row = mysqli_fetch_assoc($select);

$plan_detail = "";
$plan = mysqli_query($con, "select * from plans where id='".$row['plan']."'");
$planrow = mysqli_fetch_assoc($plan);

if(!empty($row['ICCID'])){ $plan_detail .= 'eSIM ICCID: '.$row['ICCID'].'<br>'; }
if(!empty($row['Camel_MSISDN'])){ $plan_detail .= 'UK: '.$row['Camel_MSISDN'].'<br>'; }
if(!empty($planrow['plan_name'])){ $plan_detail .= 'Plan Name: '.$planrow['plan_name'].'<br>'; }
if(!empty($planrow['GB'])){ $plan_detail .= 'GB: '.$planrow['GB'].'<br>'; }
if(!empty($planrow['Mins'])){ $plan_detail .= 'Mins: '.$planrow['Mins'].'<br>'; }
if(!empty($planrow['SMS'])){ $plan_detail .= 'SMS: '.$planrow['SMS'].'<br>'; }
if(!empty($planrow['Days'])){ $plan_detail .= 'Days: '.$planrow['Days'].'<br>'; }
if(!empty($planrow['USD'])){ $plan_detail .= 'USD: '.$planrow['USD'].'<br>'; }

$message = '
<html>
<head>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<style type="text/css">
  		body{ font-family: Roboto,RobotoDraft,Helvetica,Arial,sans-serif; }
  	</style>
</head>
<body style="margin: 0px;padding: 0px">
<table style="width: 100%;" border="0">
	<thead style="padding: 28px 0 20px 0;">
		<tr>
			<td style="padding: 0px 10px;margin: 0;color: #4c4c4c;font-weight: 400;font-size: 13px;line-height: 1.5;">
				Dear Customer,<br><br>
				Here is the QR image to scan for your eSIM from gsm2go.<br>
				Please scan an activate prior to travel.<br>
				Please see install guide below.</td>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td style="padding:20px 0px 0px 10px;margin: 0;color: #4c4c4c;font-weight: 400;font-size: 13px;line-height: 1.5;">
				<u>Your eSIM data:</u><br>'
				.$plan_detail.'
			</td>
		</tr>
		<tr>
			<td style="background: #fff;padding: 50px 10px;color: #000;text-align: left">
				<img src="http://103.154.185.150/~gsm2go/public_html/v2/admin/assets/qr/'.$row['qrcode'].'" style="max-width:250px">
			</td>
		</tr>
		<tr>
			<td style="padding: 15px 10px;margin: 0;color: #4c4c4c;font-weight: 400;font-size: 13px;line-height: 1.5;">
				<b>Safe Travels from</b> <span style="color:rgb(0,112,192)">gsm</span><span style="color:rgb(0,176,80)">2go</span><br>
				<span style="color:rgb(0,112,192)">gsm</span><span style="color:rgb(0,176,80)">2go</span> global roaming MVNO<br>
				UK +44.20.3696.2554 | IL: 072.275.0300 | US: +1.917.210.1233<br>
				<a href="mailto:cs@gsm2go.com">cs@gsm2go.com</a><br>
				WhatsApp: +972544778221
			</td>
		</tr>
		<tr>
			<td style="padding: 0px 10px;margin: 0;color: #4c4c4c;font-weight: 400;font-size: 13px;line-height: 1.5;">
				---
			</td>
		</tr>
		<tr>
			<td style="padding: 15px 10px;margin: 0;color: #4c4c4c;font-weight: 400;font-size: 13px;line-height: 1.5;">
				eSIM setup guide (under 5 minutes):
			</td>
		</tr>
		<tr>
			<td style="padding: 0px 10px;margin: 0;color: #4c4c4c;font-weight: 400;font-size: 13px;line-height: 1.5;">
				<u>iPhone eSIM install guide (iPhone 10XS or newer):</u>
				<ul style="margin-top:0px">
					<li>Settings / Cellular / Add Cellular Plan</li>
					<li>Scan the eSIM QR code</li>
					<li>Your iPhone tells you that a new cellular plan is detected. Tap on <b>Continue</b> to proceed</li>
					<li>Choose labels for your cellular plans and tap on Continue to proceed</li>
					<li>Select your default line. Your default line is used to call and message people who are not on your iPhone’s contacts. The default line is also used for iMessage.  Select your home carrier (local SIM) as default line.</li>
					<li>Mobile Data: Select the BST/gsm2go eSIM for Mobile Data.</li>
				</ul>
			</td>
		</tr>
		<tr>
			<td style="padding: 0px 10px;margin: 0;color: #4c4c4c;font-weight: 400;font-size: 13px;line-height: 1.5;">
				<u>Android (Samsung S20 or newer):</u>
				<ul style="margin-top:0px">
					<li>Settings > Connections</li>
					<li>SIM card manager</li>
					<li>Add mobile plan</li>
					<li>Go at the bottom of the page ‘Other ways to add plans’ and choose “Add using QR code”
					<li>Position the QR Code within the guided lines to scan it</li>
					<li>Add new mobile plan? [Add]</li>
					<li>Turn on new mobile plan? [OK]</li>
					<li>Once you have activated your eSIM, you can view it in <b>SIM card manager</b></li>
					<li>In <b>SIM card manager</b> in the Preferred SIM card section, tap on Mobile data and select your new eSIM as preferred.</li>
					<li>Back in the <b>Connections</b> menu, tap on <b>Mobile networks</b> and put the <b>Data roaming</b> feature ON</li>
					<li>Then you need to set up the APN settings: Name: mobiledata   APN: mobiledata</li>
					<li>Then disable WiFi in the connections menu (for testing mobile data on the new eSIM)</li>
				</ul>
			</td>
		</tr>
	</tbody>
</table>
</body>
</html>';
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
								<form method="post">
									<div class="row">
										<div class="col-md-4">
											<div class="form__div">
												<input type="email" name="from" id="from" value="<?php echo $row['fromEmail']; ?>" class="form__input required" placeholder=" " readonly>
												<input type="hidden" name="iccid" id="iccid" value="<?php echo $row['ICCID']; ?>">
											    <label for="from" class="form__label">Sender Id <span class="text-danger">*</span></label>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form__div">
												<input type="email" name="to" id="to" class="form__input" value="<?php echo $row['custEmail']; ?>" placeholder=" " readonly>
												<label for="to" class="form__label">Customer Email <span class="text-danger">*</span></label>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form__div">
												<input type="number" name="mobile" id="mobile" class="form__input" value="<?php echo $row['custMobile']; ?>" placeholder=" " readonly>
												<label for="mobile" class="form__label">Customer Mobile <span class="text-danger">*</span></label>
											</div>
										</div>
										<div class="col-md-12">
											<div class="form__div">
												<input type="text" name="subject" id="subject" class="form__input" value="gsm2go eSIM user guide <?php echo $row['ICCID']; ?> / <?php echo $row['Camel_MSISDN']; ?>" placeholder=" " readonly>
												<label for="subject" class="form__label">Subject <span class="text-danger">*</span></label>
											</div>
										</div>
										<div class="col-md-6">
										    <div class="row row-xs align-items-center mg-b-20">
												<div class="col-md-2">
													<label for="zone" class="mg-b-0">Zone</label>
												</div>
												<div class="col-md-8 mg-t-5 mg-md-t-0">
													<select name="zone" id="zone" class="form-control d-inline">
    												    <?php
    												    $select = mysqli_query($con, "Select * from zones where id='".$row['zone']."'");
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
    												    <?php
    												    $select = mysqli_query($con, "select * from plans where id='".$row['plan']."'");
    												    while($row = mysqli_fetch_assoc($select)){
    												        echo '<option value="'.$row['id'].'">'.$row['plan_name'].'</option>';
    												    }
    												    ?>
    												</select>
												</div>
											</div>
										</div>
										<div class="col-md-12">
											<div class="row row-xs align-items-center mg-b-20">
												<div class="col-md-1">
												    <label for="cc" class="mg-b-0">Cc</label>
												</div>
												<div class="col-md-11 mg-t-5 mg-md-t-0">
													<input type="text" name="cc" id="cc" value="cs@gsm2go.com" value="<?php echo $row['cc']; ?>" class="form-control" readonly>
												</div>
											</div>
										</div>
										<div class="col-md-12">
											<textarea id="summernote" name="editordata"><?php echo @$message; ?></textarea>
										</div>
									</div>
									<div class="row">
										<div class="col-md-3 mx-auto mt-2">
											<button type="button" name="submit" class="btn btn-primary btn-block">Submit</button>
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