<?php
session_start();
ob_start();
error_reporting(0);
if(isset($_SESSION['user']) && ($_SESSION['role']=="U")){
include("includes/config.php");
require('mailer.php');

$base_url = ( isset($_SERVER['HTTPS']) && $_SERVER['HTTPS']=='on' ? 'https' : 'http' ) . '://' .  $_SERVER['HTTP_HOST'];
$array = explode('?', $base_url . $_SERVER["REQUEST_URI"])[0].'/'.explode('=', $base_url . $_SERVER["REQUEST_URI"])[1];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="assets/favicon.ico">
    <title>gsm2go eSIM | Order Detail</title>
    <?php include("includes/logrocket.php"); ?>
    <link rel="stylesheet" href="node_modules/%40fortawesome/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="node_modules/animate.css/animate.min.css">
    <link rel="stylesheet" href="node_modules/%40fancyapps/fancybox/dist/jquery.fancybox.min.css">
    <link rel="stylesheet" href="assets/css/style.min.css">
    <link rel="stylesheet" href="assets/email.multiple.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;subset=latin-ext" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i,900,900i&amp;subset=latin-ext" rel="stylesheet">
    <style>
        .table td, .table th{ padding:0.5rem;}
        .h-57{ height:57px}
        @page {
            margin: 20mm;
            /*size: 297mm 210mm;*/
        }
        .main-content{ min-height:48em; }
        .fa-2x{ font-size:2em !important; }
        @media only screen and (max-width: 767px)
        {
            .print{ display: none; }
        }
        @media only screen and (max-width: 992px){
            .d-xs-none{ display:block; }
        }

        .main-content .row{
            direction: rtl;
        }
        
             /* rtl start  */

             .navik-header-container{
    display:flex;
    align-items: center;
    flex-direction: row-reverse;
    justify-content: space-between;
}
.topcorner {
    position: absolute;
    top: 15px;
    left: 50px;
}
.shoppingbasket {
    width: 40px;
    height: 40px;
    background-color: #fff;
    position: absolute;
    top: 10px;
    left: -40px;
}
nav.navik-menu ul {
    direction: rtl;
}
.container-fluid.d-none1 .row{
    justify-content: right;
}
.footer-bottom-container {
    direction: rtl;
}
.col-lg-6.text-center.text-lg-right {
    display: flex;
    justify-content: end;
    direction: rtl;
}
.col-lg-6.text-center.text-lg-left.mb-2.mb-lg-0 {
    display: flex;
    align-items: start;
    direction: rtl;
}
.navik-header.sticky .logo{
    padding: 0;
}
.btn.btn-lg.btn-round.btn-outline-light.mb-0 i{
    margin-left: 10px;
    direction: rtl;
}
.section.mt-up75 .row{
    direction: rtl;
}
.list-group-item span{
    font-size: 15px;
}
@media(max-width: 1280px){
    .topcorner {
    left: 100px;
}
.navik-menu {
    background-color: #fff;
    position: absolute;
    z-index: 1;
    width: 100%;
    left: 0;
    top: 0;
}
.navik-header-container {
    justify-content: stretch;
}
nav.navik-menu ul {
    direction: rtl;
    padding-top: 70px;
}
.navik-header .logo img {
    width: 150px;
    margin-left: 70px;
}
.body-fixed-sidebar, .navik-header, .navik-header-overlay{
        padding: 0 !important;
    }
        }

        @media(max-width: 991px){
.col-lg-6.text-center.text-lg-left.mb-2.mb-lg-0 {
    justify-content: center;
}
.col-lg-6.text-center.text-lg-right {
    justify-content: center;
}
.breadcrumb {
    justify-content: right !important;
}

}
 

        @media(max-width: 575px){
    .col-lg-6.text-center.text-lg-left.mb-2.mb-lg-0{
        justify-content: center !important;
    }
    .footer-bottom-container .row{
        margin: 0 !important;
    }
    .body-fixed-sidebar, .navik-header, .navik-header-overlay{
        padding: 0 !important;
    }
    .info-section{
        padding: 0 !important;
    }
    .main-content{
        padding-left: 0 !important;
        padding-right: 0 !important;
        padding-bottom: 20px !important;
    }
 }


    </style>
</head>
<body class="bg-image bg-fixed" style="background:lightgray">
<?php include("includes/header.php"); ?>
<?php
$select = mysqli_query($con, "select * from orders where id='".$_GET['id']."' AND userId='".$_SESSION['userId']."'");
if(mysqli_num_rows($select)==1)
{
    $row = mysqli_fetch_assoc($select);
    
    $select_order = mysqli_query($con, "select plans.plan_name,plans.zone_id,plans.plan_name,plans.USD as planCharge,orders.USD,ICCID.ICCID from orders LEFT JOIN plans on orders.plan_id=plans.id LEFT JOIN ICCID on ICCID.id = orders.inventoryId where orders.id='".$_GET['id']."' ");
    $order_row = mysqli_fetch_array($select_order);
    
    $select_zone = mysqli_query($con, "select zone_name from zones where id='".$order_row['zone_id']."'");
    $zone_row = mysqli_fetch_array($select_zone);
    
    $select_user = mysqli_query($con, "select fname,lname from users where id='".$row['userId']."'");
    $user_row = mysqli_fetch_assoc($select_user);
    $esimValue = '';
    if($order_row['esimLive'] != 0) {
        $date = $order_row['date'];
        $nextDate = '1st '.date('M Y', strtotime($date. ' + 2 month'));
        $esimValue = 'eSIM Live Subscription Charge: $'.$order_row['esimLive'].'[This is monthly charge and next charge will be on 1st Oct 2022 of $'.$order_row['esimLive'].']';
    }
    
    $message = '
    <html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style type="text/css">
            body{ font-family: calibri; }
        </style>
    </head>
    <body style="margin: 0px;padding: 0px">
    <table style="width: 100%;" border="0" class="text-right">
        <thead style="padding: 28px 0 20px 0;">
            <tr>
                <td style="padding: 0px 10px;margin: 0;color: #000;font-weight: 400;font-size: 13px;">
                    Dear '.$user_row['fname'].' '.$user_row['lname'].',
                </td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="padding: 0px 10px;margin: 0;color: #000;font-weight: 400;font-size: 13px;">
                    Thank you for purchasing a gsm2go eSIM. <br>Below you will find QR code and a brief installation guide
                </td>
            </tr>
            <tr>
                <td style="padding:0px 10px;margin: 0;color: #000;font-weight: 400;font-size: 13px;">
                    <u>Your Plan Details:</u><br>
                    Zone Name: '.$zone_row['zone_name'].'<br>
                    Plan Name: '.$order_row['plan_name'].'<br>
                    Plan Charge: $'.$order_row['planCharge'].'<br>
                    Order ID: '.$row['id'].'<br>
                    '.$esimValue.'
                </td>
            </tr>
            <tr>
                <td style="padding:0px 10px;margin: 0;color: #000;font-weight: 400;font-size: 13px;">
                    When your usage reaches 65%, You will receive an email (and we will also send a text message) with a link for renewal, if you so desire.<br>
                </td>
            </tr>
            <tr>
                <td style="padding: 15px 10px;margin: 0;color: #000;font-weight: 400;font-size: 13px;line-height: 1.5;">
                    <b>Safe Travels from</b> <span style="color:rgb(0,112,192)">gsm</span><span style="color:rgb(0,176,80); font-style: italic;">2go</span><br>
                    <span style="color:rgb(0,112,192)">gsm</span><span style="color:rgb(0,176,80); font-style: italic;">2go</span> global roaming MVNO<br>
                    UK +44.20.3696.2554 | IL: 072.275.0300 | US: +1.917.210.1233<br>
                    <a href="mailto:esim@gsm2go.com">esim@gsm2go.com</a><br>
                </td>
            </tr>
            <tr>
                <td style="padding: 0px 10px; border:1px solid; margin: 0;color: #000;font-weight: 400;font-size: 13px;line-height: 1.5;">
    
                </td>
            </tr>
            <tr>
                <td style="padding:20px 0px 0px 10px;margin: 0;color: #000;font-weight: 400;font-size: 13px;line-height: 1.5;">
                    Here is the QR Image to scan for your eSIM from gsm2go.<br>
                    Please scan an activate prior to travel.<br>
                    Please see install guide below.</td>
            </tr>
            <tr>
                <td style="padding:20px 0px 0px 10px;margin: 0;color: #000;font-weight: 400;font-size: 13px;line-height: 1.5;">
                    <u>Your eSIM data:</u><br>
                    eSIM ICCID: '.$order_row['ICCID'].'<br>
                    UK: '.$row['msisdn'].'<br>
                    Customer ID: '.$row['customerId'].'<br>
                    Subscriber ID: '.$row['subscriberId'].'<br>
                    Status: '.$row['status'].'
                </td>
            </tr>
            <tr>
                <td style="background: #fff;padding: 10px 10px;color: #000;text-align: right">
                    <img src="'.constant("SITEURL").'qr/'.$order_row['ICCID'].'.png" style="max-width:250px">
                </td>
            </tr>
            <tr>
                <td style="padding: 25px 10px;margin: 0;color: #000;font-weight: 400;font-size: 13px;line-height: 1.5;">
                    eSIM setup guide (under 5 minutes):
                </td>
            </tr>
            <tr>
                <td style="padding: 0px 10px;margin: 0;color: #000;font-weight: 400;font-size: 13px;line-height: 1.5;">
                    <u>iPhone eSIM install guide (iPhone 10XS or newer):</u>
                    <ul style="margin-top:0px">
                        <li>Open the camera, scan the QR code (from your PC or tablet or another device.) Tap on [Cellular Plan] (the yellow tag that appeared when you point the camera at the QR code)</li>
                        <li><u>Install Cellular Plan</u> screen:  Tap on [Continue]. Now your handset is verifying the QR Code; Your phone needs to be on WiFi or Cellular Data active for this to work.</li>
                        <li><u>Add Cellular Plan</u> screen:- Tap on [Add Cellular Plan]</li>
                        <li><u>Cellular Plan Labels</u>: Label the new plan (the one you just added) “<span style="color:rgb(0,112,192)">gsm</span><span style="color:rgb(0,176,80)">2go</span> eSIM” (or any other name you like for it which distinguishes it from your home SIM card). Tap on [Continue]</li>
                        <li><u>Default Line</u> (for voice calls).  Change to your <span style="color:rgb(0,112,192)">gsm</span><span style="color:rgb(0,176,80)">2go</span> eSIM when you travel. (You can do that now, or later, and you can always change back and forth).  Tap on [Continue]</li>
                        <li><u>iMessage & FaceTime</u>: Change to your <span style="color:rgb(0,112,192)">gsm</span><span style="color:rgb(0,176,80)">2go</span> eSIM when you travel. Tap on [Continue]</li>
                        <li><u>Cellular Data</u>: Select the <span style="color:rgb(0,112,192)">gsm</span><span style="color:rgb(0,176,80)">2go</span> eSIM for cellular data when you travel. (We recommend that you do not allow Cellular Data Switching to avoid roaming charges from your home service provider).Tap on [Continue]</li>
                        <li><u>Making sure everything is ready</u>:<br>
                            Go to Settings/Cellular/<br>
                            Here you can see which SIM is active. <span style="color:rgb(0,112,192)">gsm</span><span style="color:rgb(0,176,80)">2go</span> should be selected for Cellular Data and Voice when you travel<br>
                            <u>Under Settings/Cellular – Cellular Plans, click on <span style="color:rgb(0,112,192)">gsm</span><span style="color:rgb(0,176,80)">2go</span> eSIM</u><br>
                            <span style="color:#FF0505">- Switch Data Roaming On</span>
                        </li>
                    </ul>
                </td>
            </tr>
            <tr>
                <td style="padding: 0px 10px;margin: 0;color: #000;font-weight: 400;font-size: 13px;line-height: 1.5;">
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
                        <li>Your new <span style="color:rgb(0,112,192)">gsm</span><span style="color:rgb(0,176,80)">2go</span> eSIM is ready.</li>
                    </ul>
                </td>
            </tr>
        </tbody>
    </table>
    </body>
    </html>';
} else{
    $message = "Invalid Order";
}
?>
<!-- Page title -->
<!--<div class="d-flex flex-column w-100">-->
<!--    <div class="d-flex align-items-center bg-image py-2">-->
<!--        <div class="container page-title-container">-->
<!--            <div class="row align-items-center py-3">-->
<!--            </div>-->
<!--            <div data-height="40px"></div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->

<!-- Content -->
<div class="main-content pt-0 px-lg-5">

    <div class="section mt-4">
        <div class="container-fluid">
            <div class="row">

                <!-- Sidebar -->
                <div class="col-lg-3 d-xs-none">
                    <div class="pb-3 mb-3">
                        <div class="bg-white rounded-xl shadow-sm py-5">
                            <div class="px-4 px-md-5 px-lg-4 px-xl-5 text-right">
                                <div data-height="1px"></div>
                                <h5 class="font-weight-700 mb-0"><?php echo $_SESSION['name']; ?></h5>
                                <small><?php echo $_SESSION['user']; ?></small>
                            </div>

                            <div class="text-center">
                                <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                                    <i class="fas fa-bars fa-lg text-dark mt-4"></i>
                                </button>
                            </div>

                            <div id="sidebarMenu" class="d-lg-block collapse">

                                <h5 class="font-weight-700 px-4 px-md-5 px-lg-4 px-xl-5 pt-3 mt-4 mb-3 text-right">Account</h5>
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
                            <div class="row">
                                <div class="col-md-6 col-6 mb-4 mb-md-0">
                                    <h5 class="font-weight-700 section-title-4 text-right pb-2">
                                        <?php
                                        if(isset($title)){ echo $title; } else{ echo "Order - ".$row['id']; }
                                        ?>
                                        <div class="title-divider-round mt-3"></div>
                                    </h5>
                                </div>
                                <div class="col-md-6 col-6 mb-4 mb-md-0 text-left">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <button type="button" class="btn btn-sm btn-primary print" onclick="printDiv('printableArea')"><i class="fas fa-2x fa-print"></i></button>
                                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#exampleModal" id="mail-model"><i class="fa fa-2x fa-envelope"></i></button>
                                    </div>
                                    <!--<ul class="nav justify-content-end">-->
                                    <!--    <li class="nav-item">-->
                                    <!--        <button type="button" class="btn btn-primary pr-3 pl-5 py-1 text-white" style="border-top-left-radius:40px" onclick="printDiv('printableArea')" ><i class="fas fa-2x fa-print"></i></button>-->
                                    <!--    </li>-->
                                    <!--    <li class="nav-item">-->
                                    <!--        <button type="button" data-toggle="modal" data-target="#exampleModal" id="mail-model" class="btn btn-primary pl-3 pr-5 py-1 text-white" style="border-bottom-right-radius:40px"><i class="fa fa-2x fa-envelope"></i></button>-->
                                    <!--    </li> -->
                                    <!--</ul>-->
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-xl-12 mb-4 mb-md-0" id="printableArea">
                                    <?php echo $message; ?>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<?php include("includes/footer.php"); ?>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-white">
                <h6 class="modal-title">Email eSim instructions</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body py-2">
                <div class="form-group mb-0">
                    <label for="email" class="font-weight-600">To: </label>
                    <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $_GET['id']; ?>">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Enter email">
                </div>
                <div id="error-msg" class="text-center"></div>
                <!--<div class="form-group">-->
                <!--    <label for="cc" class="font-weight-600">CC :</label>-->
                <!--    <div class="mail-id-row">-->
                <!--        <input type="text" id="cc1" class="form-control" placeholder="Enter CC Email Address">-->
                <!--    </div>-->
                <!--</div>-->
            </div>
            <div class="modal-footer pt-1 pb-2 text-center d-block" id="sent-footer">
                <button type="button" name="sent" id="sent" class="btn btn-primary mb-0 py-2">Send</button>
            </div>
        </div>
    </div>
</div>


<!-- jQuery -->
<script src="assets/js/vendor/jquery-3.5.1.min.js"></script>
<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="components/navik-navigation-menu/dist/js/navik.menu.js"></script>
<script src="node_modules/isotope-layout/dist/isotope.pkgd.min.js"></script>
<script src="node_modules/imagesloaded/imagesloaded.pkgd.min.js"></script>
<script src="node_modules/%40fancyapps/fancybox/dist/jquery.fancybox.min.js"></script>
<script src="assets/js/custom.js"></script>
<script src="assets/jquery.email.multiple.js"></script>
<script>
$(document).ready(function($){
    $("#cc").email_multiple();
});
</script>
<script type="text/javascript">
// $(document).ready(function (){
//     history.pushState("", "", "<?php echo $array; ?>");
// });

function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;
     document.body.innerHTML = printContents;
     window.print();
     document.body.innerHTML = originalContents;
}
$('#mail-model').click(function() {
    $("#email").focus();
});

$('#sent').click(function() {
   var id    = $('#id').val();
   var email = $('#email').val();
   //var cc    = $('#cc1').val();

    $.ajax({
        url: "ajax/send-mail.php",
        type: "POST",
        data: { id:id,email:email },
        success: function(data){
            $("#error-msg").html(data);
        }
    });
});
</script>
</body>
</html>
<?php } else{ include("login.php"); } ?>