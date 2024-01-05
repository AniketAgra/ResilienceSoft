<?php
session_start();
error_reporting(0);
if(isset($_SESSION['user']) && ($_SESSION['role']=="U")){
include("includes/config.php");
require('mailer.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="assets/favicon.ico">
    <title>gsm2go | Dashboard</title>
    <link rel="stylesheet" href="node_modules/%40fortawesome/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="node_modules/animate.css/animate.min.css">
    <link rel="stylesheet" href="node_modules/%40fancyapps/fancybox/dist/jquery.fancybox.min.css">
    <link rel="stylesheet" href="node_modules/owl.carousel/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="node_modules/owl.carousel/dist/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="assets/css/style.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;subset=latin-ext" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i,900,900i&amp;subset=latin-ext" rel="stylesheet">
    <style>
        .table td, .table th{ padding:0.5rem;}
        @media only screen and (min-width: 992px){
            .fixed-footer{ position:fixed !important;left:0!important;right:0!important;bottom:0!important;}
        }
    </style>
</head>
<body class="bg-image bg-fixed" style="background:lightgray">
<?php include("includes/header.php"); ?>

<!-- Page title -->
<div class="d-flex flex-column w-100">
    <div class="d-flex align-items-center bg-image py-2">
        <div class="container page-title-container">
            <div class="row align-items-center py-3">
            </div>
            <div data-height="40px"></div>
        </div>
    </div>
</div>

<!-- Content -->
<div class="px-5 height">

    <div class="section mt-up75">
        <div class="container-fluid">
            <div class="row">

                <!-- Sidebar -->
                <div class="col-lg-3">
                    <div class="pb-3 mb-3">
                        <div class="bg-white rounded-xl shadow-sm py-5">

                            <div class="px-4 px-md-5 px-lg-4 px-xl-5">
                                <div data-height="1px"></div>
                                <h5 class="font-weight-700 mb-0"><?php echo $_SESSION['name']; ?></h5>
                                <small><?php echo $_SESSION['user']; ?></small>

                            </div>

                            <div class="text-center d-lg-none">
                                <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                                    <i class="fas fa-bars fa-lg text-dark mt-4"></i>
                                </button>
                            </div>

                            <div id="sidebarMenu" class="d-lg-block collapse">

                                <h5 class="font-weight-700 px-4 px-md-5 px-lg-4 px-xl-5 pt-3 mt-4 mb-3">Account</h5>

                                <ul class="list-group list-group-flush pt-0">
                                    <a href="orders" class="list-group-item list-group-item-action active d-flex align-items-center px-4 px-md-5 px-lg-4 px-xl-5">
                                        <img src="assets/svg/upload/account-user-info.svg" alt="icon" class="mr-2" data-width="16px" data-height="16px">
                                        <span>Orders</span>
                                    </a>
                                    <a href="profile" class="list-group-item list-group-item-action d-flex align-items-center px-4 px-md-5 px-lg-4 px-xl-5">
                                        <img src="assets/svg/upload/account-user-info.svg" alt="icon" class="mr-2" data-width="16px" data-height="16px">
                                        <span>Personal information</span>
                                    </a>
                                    <a href="profile-password" class="list-group-item list-group-item-action d-flex align-items-center px-4 px-md-5 px-lg-4 px-xl-5">
                                        <img src="assets/svg/upload/account-preferences.svg" alt="icon" class="mr-2" data-width="16px" data-height="16px">
                                        <span>Password</span>
                                    </a>
                                    <a href="logout" class="list-group-item list-group-item-action d-flex align-items-center px-4 px-md-5 px-lg-4 px-xl-5">
                                        <img src="assets/svg/upload/account-logout.svg" alt="icon" class="mr-2" data-width="16px" data-height="16px">
                                        <span>Log out</span>
                                    </a>
                                </ul>


                            </div>

                        </div>
                    </div>
                </div>

                <!-- Content body -->
                <div class="col-lg-9">

                    <div class="pb-3 mb-3">
                        <div class="bg-white rounded-xl shadow-sm px-4 py-5 py-md-3">

                            <h5 class="font-weight-700 section-title-4 text-left pb-2">
                                Order History
                                <div class="title-divider-round mt-3"></div>
                            </h5>
                                <?php if(isset($_GET['noti']) && $_GET['noti'] == 'yes') { 
									if($_GET['type'] == 1) {
										$cls = 'alert-success';
									} else if($_GET['type'] == 2) {
										$cls = 'alert-info';
									} else {
										$cls = 'alert-danger';
									}?>
									<div class="alert <?php echo $cls; ?>" role="alert">
										<?php echo base64_decode($_GET['msg']); ?>
									</div>
								<?php } ?>

                            <!-- Message item -->
                            <div class="row">
                                <div class="col-md-12 col-xl-12 mb-4 mb-md-0">
                                    <table class="table table-hover mb-0">
                                        <thead>
                                            <tr class="bg-indigo">
                                                <th scope="col">Order #</th>
                                                <th scope="col">Order Type</th>
                                                <th scope="col">Plan Name</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">QR</th>
                                                <th scope="col">Date</th>
                                                <th scope="col">Total</th>
                                                <th scope="col"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 1;
                                            $select_order = mysqli_query($con, "select plans.plan_name,orders.id,orders.plan_id,orders.add_GB,orders.esimLive, orders.GB, orders.Mins, orders.SMS, orders.Days, orders.status, orders.date, orders.USD,orders.orderType,ICCID.LPA_Value,ICCID.Camel_MSISDN,ICCID.ICCID from orders INNER JOIN plans on orders.plan_id=plans.id LEFT JOIN ICCID on ICCID.id = orders.inventoryId where orders.userId='".$_SESSION['userId']."' ORDER BY orders.id DESC");
                                            while($order_row = mysqli_fetch_assoc($select_order)){
                                            ?>
                                            <tr>
                                                <td><?php echo $order_row['id']; ?></td>
                                                <td><?php echo $order_row['orderType']; ?></td>
                                                <td><?php echo $order_row['plan_name']; ?></td>
                                                <td><?php 
                                                if($order_row['status']=="PENDING PAYMENT"){ ?>
                                                    <span class="badge badge-warning">PENDING PAYMENT</span><br /> 
                                                    <?php if($order_row['orderType'] != 'Recharge') { ?>
                                                        <a href="javascript:void(0);" onClick="retryPayment('<?php echo $order_row['plan_id']; ?>','<?php echo $order_row['add_GB']; ?>','<?php echo $order_row['esimLive']; ?>','<?php echo $order_row['USD']; ?>','<?php echo $order_row['id']; ?>');">Retry Payment</a>
                                                    <?php } ?>
                                                <?php } else if($order_row['status']=="ACTIVE"){ ?>
												    <span class="badge badge-success">ACTIVE</span>
												<?php } else if($order_row['status']=="IN PROGRESS"){ ?>
												    <span class="badge badge-success">IN PROGRESS</span>
												<?php } else { ?>
                                                    <span class="badge badge-danger">PAYMENT FAILED</span><br />
                                                    <?php if($order_row['orderType'] != 'Recharge') { ?>
                                                        <a href="javascript:void(0);" onClick="retryPayment('<?php echo $order_row['plan_id']; ?>','<?php echo $order_row['add_GB']; ?>','<?php echo $order_row['esimLive']; ?>','<?php echo $order_row['USD']; ?>','<?php echo $order_row['id']; ?>');">Retry Payment</a>
                                                    <?php } ?>
                                                <?php } ?>
                                                </td>
												<td>
													<?php if($order_row['status']=="ACTIVE"){ ?>
													<a href="qr.php?data=<?php echo base64_encode($order_row['LPA_Value']); ?>&sd=<?php echo base64_encode($order_row['ICCID']); ?>&ud=<?php echo base64_encode($order_row['Camel_MSISDN']); ?>" target="_blank">VIEW</a>
													<?php } ?>
												</td>
                                                <td><?php echo date("d M Y H:m", strtotime($order_row['date'])); ?></td>
                                                <td>$ <?php echo $order_row['USD']; ?></td>
                                                <td>
                                                    <?php if($order_row['status']=="IN PROGRESS"){ ?>
                                                    <a href="order?orderId=<?php echo $order_row['id']; ?>" class="btn btn-sm btn-primary">View</a>
                                                    <?php } ?>
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

            </div>
        </div>
    </div>
    
    <form id="retryPaymentForm" action="checkout.php?retrypayment=yes" method="post">
        <input type="hidden" name="direct" id="planid" value="" />
        <input type="hidden" name="addonid" id="addonid" value="" />
        <input type="hidden" name="esim" id="per_month" value="" />
        <input type="hidden" name="USD" id="USD" value="" />
        <input type="hidden" name="orderId" id="orderId" value="" />
    </form>

</div>

<!-- Footer -->
<?php include("includes/footer.php"); ?>



<!--<div class="modal fade show" id="modalLogin" tabindex="-1" role="dialog" aria-modal="true" style="padding-right: 17px; display: block;">-->
<!--    <div class="modal-dialog modal-dialog-centered" role="document">-->
<!--        <div class="modal-content">-->
<!--            <div class="modal-header py-2">-->
<!--                <h5 class="modal-title">Congratulations</h5>-->
<!--                <button type="button" class="close" data-dismiss="modal" aria-label="Close">-->
<!--                    <span aria-hidden="true"></span>-->
<!--                </button>-->
<!--            </div>-->
<!--            <div class="modal-body py-0">-->

<!--                <div class="row">-->
<!--                    <div class="col-lg-12">-->
<!--                        <p></p>Your credit card payment has been accepted.   Please check your inbox for an email from esim@gsm2go.com with your new eSIM.</p>-->
<!--                        <p>You are five minutes away from using your new eSIM.</p>-->
                        
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="modal-footer py-2">-->
<!--                <button type="button" class="btn btn-success py-2 m-0" data-dismiss="modal" aria-label="Close">-->
<!--                    OK.  Great.  Can’t Wait-->
<!--                </button>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->



<!-- Go to top -->
<div class="go-to-top">
    <a href="#" class="rounded-circle"><i class="fas fa-chevron-up"></i></a>
</div>

<!-- jQuery -->
<script src="assets/js/vendor/jquery-3.5.1.min.js"></script>
<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="components/navik-navigation-menu/dist/js/navik.menu.js"></script>
<script src="node_modules/isotope-layout/dist/isotope.pkgd.min.js"></script>
<script src="node_modules/imagesloaded/imagesloaded.pkgd.min.js"></script>
<script src="node_modules/%40fancyapps/fancybox/dist/jquery.fancybox.min.js"></script>
<script src="node_modules/owl.carousel/dist/owl.carousel.min.js"></script>
<script src="node_modules/jquery-circle-progress/dist/circle-progress.min.js"></script>
<script src="assets/js/custom.js"></script>
<script>
    $(function () {

        $('.tooltip-btn').tooltip()

    })
</script>
<script>
function retryPayment(planId,addonId,perMonth,usd,orderId) {
    $('#planid').val(planId);
    $('#addonid').val(addonId);
    $('#per_month').val(perMonth);
    $('#USD').val(usd);
    $('#orderId').val(orderId);
    var r = confirm("Are you sure want to retry payment?");
    if (r == true) {
        $('#retryPaymentForm').submit();
    }
}
</script>
<?php
if(isset($_GET['typeId']) && $_GET['type'] == 1) 
{ 
    $select_order = mysqli_query($con, "select plans.plan_name,orders.id,orders.userId,orders.email,orders.plan_id,orders.add_GB,orders.esimLive, orders.GB, orders.Mins, orders.SMS, orders.Days, orders.status, orders.date, orders.USD,ICCID.LPA_Value,ICCID.Camel_MSISDN,ICCID.ICCID from orders INNER JOIN plans on orders.plan_id=plans.id LEFT JOIN ICCID on ICCID.id = orders.inventoryId where orders.id='".$_GET['typeId']."'");
    $order_row = mysqli_fetch_array($select_order);

    $select_user = mysqli_query($con, "select fname,lname from users where id='".$order_row['userId']."'");
    $user_row = mysqli_fetch_assoc($select_user);
    include("qr1.php");
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
                    Dear '.$user_row['fname'].' '.$user_row['lname'].' ,<br><br>
                    Here is the QR image to scan for your eSIM from gsm2go.<br>
                    Please scan an activate prior to travel.<br>
                    Please see install guide below.</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="padding:20px 0px 0px 10px;margin: 0;color: #4c4c4c;font-weight: 400;font-size: 13px;line-height: 1.5;">
                    <u>Your eSIM data:</u><br>
                    eSIM ICCID: '.$order_row['ICCID'].'<br>
                    UK: '.$order_row['Camel_MSISDN'].'<br>
                    Plan Name: '.$order_row['plan_name'].'<br>
                    Status: '.base64_decode($_GET['msg']).'
                </td>
            </tr>
            <tr>
                <td style="background: #fff;padding: 10px 10px;color: #000;text-align: left">
                    <img src="https://qr2.gsm2go.com/v6/qr/'.$order_row['ICCID'].'.png" style="max-width:250px">
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
                        <li>Go at the bottom of the page ‘Other ways to add plans’ and choose “Add using QR code”</li>
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

    $to = $order_row['email'];
    $fromEmail = 'esim@mysimaccess.com';
    $fromName = "eSIM Support";
    $subject = "gsm2go eSim: ".$order_row['ICCID']." / ".$order_row['Camel_MSISDN'];
    $cc = '';
    $attachments = '';
    $mailer=new Email();
    $mailSent = $mailer->Mailer($to,$subject,$message,$cc,$attachments,$fromEmail,$fromName);
} 
?>

<?php
if(isset($_GET['typeId']) && $_GET['type'] == 2) 
{ 
    $select_order = mysqli_query($con, "select plans.plan_name,orders.id,orders.userId,orders.email,orders.plan_id,orders.add_GB,orders.esimLive, orders.GB, orders.Mins, orders.SMS, orders.Days, orders.status, orders.date, orders.USD,ICCID.LPA_Value,ICCID.Camel_MSISDN,ICCID.ICCID from orders INNER JOIN plans on orders.plan_id=plans.id LEFT JOIN ICCID on ICCID.id = orders.inventoryId where orders.id='".$_GET['typeId']."'");
    $order_row = mysqli_fetch_array($select_order);

    $select_user = mysqli_query($con, "select fname,lname from users where id='".$order_row['userId']."'");
    $user_row = mysqli_fetch_assoc($select_user);
    include("qr1.php");

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
                    Dear '.$user_row['fname'].' '.$user_row['lname'].' ,<br><br>
                    Here is the QR image to scan for your eSIM from gsm2go.<br>
                    Please scan an activate prior to travel.<br>
                    Please see install guide below.</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="padding:20px 0px 0px 10px;margin: 0;color: #4c4c4c;font-weight: 400;font-size: 13px;line-height: 1.5;">
                    <u>Your eSIM data:</u><br>
                    eSIM ICCID: '.$order_row['ICCID'].'<br>
                    UK: '.$order_row['Camel_MSISDN'].'<br>
                    Plan Name: '.$order_row['plan_name'].'<br>
                    Status: '.base64_decode($_GET['msg']).'
                </td>
            </tr>
            <tr>
                <td style="background: #fff;padding: 10px 10px;color: #000;text-align: left">
                    <img src="https://qr2.gsm2go.com/v6/qr/'.$order_row['ICCID'].'.png" style="max-width:250px">
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
                        <li>Go at the bottom of the page ‘Other ways to add plans’ and choose “Add using QR code”</li>
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

    $to = $order_row['email'];
    $fromEmail = 'esim@mysimaccess.com';
    $fromName = "eSIM Support";
    $subject = "gsm2go eSim: ".$order_row['ICCID']." / ".$order_row['Camel_MSISDN'];
    $cc = '';
    $attachments = '';
    $mailer=new Email();
    $mailSent = $mailer->Mailer($to,$subject,$message,$cc,$attachments,$fromEmail,$fromName);
} 
?>

<?php
if(isset($_GET['typeId']) && $_GET['type'] == 3) 
{ 
    $select_order = mysqli_query($con, "select plans.plan_name,orders.id,orders.userId,orders.email,orders.plan_id,orders.add_GB,orders.esimLive, orders.GB, orders.Mins, orders.SMS, orders.Days, orders.status, orders.date, orders.USD,ICCID.LPA_Value,ICCID.Camel_MSISDN,ICCID.ICCID from orders INNER JOIN plans on orders.plan_id=plans.id LEFT JOIN ICCID on ICCID.id = orders.inventoryId where orders.id='".$_GET['typeId']."'");
    $order_row = mysqli_fetch_array($select_order);

    $select_user = mysqli_query($con, "select fname,lname from users where id='".$order_row['userId']."'");
    $user_row = mysqli_fetch_assoc($select_user);
    // $message = '
    //     <html>
    //     <head>
    //         <meta charset="utf-8">
    //         <meta name="viewport" content="width=device-width, initial-scale=1">
    //         <style type="text/css">
    //             body{ font-family: Roboto,RobotoDraft,Helvetica,Arial,sans-serif; }
    //         </style>
    //     </head>
    //     <body style="margin: 0px;padding: 0px">
    //     <table style="width: 100%;" border="0">
    //         <thead style="padding: 28px 0 20px 0;">
    //             <tr>
    //                 <td style="padding: 0px 10px;margin: 0;color: #4c4c4c;font-weight: 400;font-size: 13px;line-height: 1.5;">
    //                     Dear '.$user_row['fname'].' '.$user_row['lname'].' ,<br><br>
    //                     Here is the QR image to scan for your eSIM from gsm2go.<br>
    //                     Please scan an activate prior to travel.<br>
    //                     Please see install guide below.</td>
    //             </tr>
    //         </thead>
    //         <tbody>
    //             <tr>
    //                 <td style="padding:20px 0px 0px 10px;margin: 0;color: #4c4c4c;font-weight: 400;font-size: 13px;line-height: 1.5;">
    //                     <u>Your eSIM data:</u><br>
    //                     eSIM ICCID: '.$order_row['ICCID'].'<br>
    //                     UK: '.$order_row['Camel_MSISDN'].'<br>
    //                     Plan Name: '.$order_row['plan_name'].'<br>
    //                     Status: '.base64_decode($_GET['msg']).'
    //                 </td>
    //             </tr>
    //             <tr>
    //                 <td style="padding: 15px 10px;margin: 0;color: #4c4c4c;font-weight: 400;font-size: 13px;line-height: 1.5;">
    //                     <b>Safe Travels from</b> <span style="color:rgb(0,112,192)">gsm</span><span style="color:rgb(0,176,80)">2go</span><br>
    //                     <span style="color:rgb(0,112,192)">gsm</span><span style="color:rgb(0,176,80)">2go</span> global roaming MVNO<br>
    //                     UK +44.20.3696.2554 | IL: 072.275.0300 | US: +1.917.210.1233<br>
    //                     <a href="mailto:cs@gsm2go.com">cs@gsm2go.com</a><br>
    //                     WhatsApp: +972544778221
    //                 </td>
    //             </tr>
    //             <tr>
    //                 <td style="padding: 0px 10px;margin: 0;color: #4c4c4c;font-weight: 400;font-size: 13px;line-height: 1.5;">
    //                     ---
    //                 </td>
    //             </tr>
    //             <tr>
    //                 <td style="padding: 15px 10px;margin: 0;color: #4c4c4c;font-weight: 400;font-size: 13px;line-height: 1.5;">
    //                     eSIM setup guide (under 5 minutes):
    //                 </td>
    //             </tr>
    //             <tr>
    //                 <td style="padding: 0px 10px;margin: 0;color: #4c4c4c;font-weight: 400;font-size: 13px;line-height: 1.5;">
    //                     <u>iPhone eSIM install guide (iPhone 10XS or newer):</u>
    //                     <ul style="margin-top:0px">
    //                         <li>Settings / Cellular / Add Cellular Plan</li>
    //                         <li>Scan the eSIM QR code</li>
    //                         <li>Your iPhone tells you that a new cellular plan is detected. Tap on <b>Continue</b> to proceed</li>
    //                         <li>Choose labels for your cellular plans and tap on Continue to proceed</li>
    //                         <li>Select your default line. Your default line is used to call and message people who are not on your iPhone’s contacts. The default line is also used for iMessage.  Select your home carrier (local SIM) as default line.</li>
    //                         <li>Mobile Data: Select the BST/gsm2go eSIM for Mobile Data.</li>
    //                     </ul>
    //                 </td>
    //             </tr>
    //             <tr>
    //                 <td style="padding: 0px 10px;margin: 0;color: #4c4c4c;font-weight: 400;font-size: 13px;line-height: 1.5;">
    //                     <u>Android (Samsung S20 or newer):</u>
    //                     <ul style="margin-top:0px">
    //                         <li>Settings > Connections</li>
    //                         <li>SIM card manager</li>
    //                         <li>Add mobile plan</li>
    //                         <li>Go at the bottom of the page ‘Other ways to add plans’ and choose “Add using QR code”</li>
    //                         <li>Position the QR Code within the guided lines to scan it</li>
    //                         <li>Add new mobile plan? [Add]</li>
    //                         <li>Turn on new mobile plan? [OK]</li>
    //                         <li>Once you have activated your eSIM, you can view it in <b>SIM card manager</b></li>
    //                         <li>In <b>SIM card manager</b> in the Preferred SIM card section, tap on Mobile data and select your new eSIM as preferred.</li>
    //                         <li>Back in the <b>Connections</b> menu, tap on <b>Mobile networks</b> and put the <b>Data roaming</b> feature ON</li>
    //                         <li>Then you need to set up the APN settings: Name: mobiledata   APN: mobiledata</li>
    //                         <li>Then disable WiFi in the connections menu (for testing mobile data on the new eSIM)</li>
    //                     </ul>
    //                 </td>
    //             </tr>
    //         </tbody>
    //     </table>
    //     </body>
    //     </html>';

    $message = '<table align="center" cellspacing="0" cellpadding="0" style="width: 540px; margin: 0px auto; font-family: Helvetica; letter-spacing: normal; text-indent: 0px; text-transform: none; word-spacing: 0px; text-decoration: none;">
                    <tbody>
                        <tr>
                            <td>
                                <table cellspacing="0" cellpadding="0" style="width: 500px; margin: 0px 20px;">
                                    <tbody>
                                        <tr>
                                            <td style="border-bottom-width: 1px; border-bottom-style: solid; border-bottom-color: rgb(234, 234, 234); padding: 10px 0px 0px 0px;">
                                                <table cellspacing="0" cellpadding="0">
                                                    <tbody>
                                                        <tr>
                                                            <td width="250">
                                                                <img src="https://qr2.gsm2go.com/images/logo1.png"
                                                                    style="border: 0px; margin: 0px; height: 40px;" />
                                                            </td>
                                                            <td width="250" valign="top" align="right"><div style="margin: 0px; font-size: 20px; font-family: arial, sans-serif;">Verify your account</div></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="padding-left: 0px; padding-top: 9px; padding-bottom: 9px;">
                                                <div style="margin: 0px; font-size: 18px; font-family: arial, sans-serif;">
                                                    Alternatively you can click here the below to continue.
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="padding-left: 0px; padding-top: 30px; padding-bottom: 9px;">
                                                <div style="margin: 0px; font-size: 20px; font-family: arial, sans-serif;">Thank you!</div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>';

    $to = $order_row['email'];
    $fromEmail = 'esim@mysimaccess.com';
    $fromName = "eSIM Support";
    $subject = "gsm2go eSim: Payment Failed";
    $cc = '';
    $attachments = '';
    $mailer=new Email();
    $mailSent = $mailer->Mailer($to,$subject,$message,$cc,$attachments,$fromEmail,$fromName);
}
?>
</body>
</html>
<?php } else{ include("login.php"); } ?>