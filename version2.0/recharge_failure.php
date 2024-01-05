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
    <title>gsm2go eSIM | Order Detail</title>
    <?php include("includes/logrocket.php"); ?>
    <link rel="stylesheet" href="node_modules/%40fortawesome/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="node_modules/animate.css/animate.min.css">
    <link rel="stylesheet" href="node_modules/%40fancyapps/fancybox/dist/jquery.fancybox.min.css">
    <link rel="stylesheet" href="node_modules/owl.carousel/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="node_modules/owl.carousel/dist/assets/owl.theme.default.min.css">
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
    </style>
</head>
<body class="bg-image bg-fixed" style="background:lightgray">
<?php include("includes/header.php"); ?>

<?php
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
                                                                <img src="'.constant("SITEURL").'images/logo1.png"
                                                                    style="border: 0px; margin: 0px; height: 40px;" />
                                                            </td>
                                                            <td width="250" valign="top" align="right"><div style="margin: 0px; font-size: 20px; font-family: arial, sans-serif;">Recharge Not Possible</div></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="padding-left: 0px; padding-top: 9px; padding-bottom: 9px;">
                                                <div style="margin: 0px; font-size: 18px; font-family: arial, sans-serif;">
                                                    The requested recharge url for the number is not purchased by you
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
<div class="px-5">

    <div class="section mt-4">
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
                            <div class="row">
                                <div class="col-md-8 col-xl-8 mb-4 mb-md-0">
                                    <h5 class="font-weight-700 section-title-4 text-left pb-2">
                                        Recharge Failed
                                        <div class="title-divider-round mt-3"></div>
                                    </h5>
                                </div>
                                <div class="col-md-4 col-xl-4 mb-4 mb-md-0">
                                    <ul class="nav justify-content-end">
                                        <li class="nav-item">
                                            <button type="button" class="bg-primary pr-4 pl-5 py-2 text-white" style="background:#fff;border:none;border-top-left-radius:40px" onclick="printDiv('printableArea')" ><i class="fas fa-2x fa-print"></i></button>
                                        </li>
                                        <li class="nav-item">
                                            <button type="button" data-toggle="modal" data-target="#exampleModal" id="mail-model" class="bg-primary pl-4 pr-5 py-2 text-white" style="background:#fff;border:none;border-bottom-right-radius:40px"><i class="fa fa-2x fa-envelope"></i></button>
                                        </li> 
                                    </ul>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-xl-12 mb-4 mb-md-0" id="printableArea">
                                    <div id="error-msg"></div>
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

<!-- Go to top -->
<div class="go-to-top">
    <a href="#" class="rounded-circle"><i class="fas fa-chevron-up"></i></a>
</div>


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
            <form method="get">
                <div class="modal-body py-2">
                    <div class="form-group">
                        <label for="email" class="font-weight-600">To: </label>
                        <input type="hidden" class="form-control" name="email" id="id" value="<?php echo $_GET['orderId']; ?>">
                        <input type="email" class="form-control" name="email" id="email" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="cc" class="font-weight-600">CC :</label>
                        <div class="mail-id-row">
                            <input type="text" id="cc" class="form-control" placeholder="Enter CC Email Address">
                        </div>
                    </div>
                </div>
                <div class="modal-footer pt-1 pb-2 h-57" id="sent-footer">
                    <button type="button" name="sent" id="sent" class="btn btn-primary mb-0 py-2">Send</button>
                </div>
            </form>
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
<script src="node_modules/owl.carousel/dist/owl.carousel.min.js"></script>
<script src="node_modules/jquery-circle-progress/dist/circle-progress.min.js"></script>
<script src="assets/js/custom.js"></script>
<script src="assets/jquery.email.multiple.js"></script>
<script>
$(document).ready(function($){
    $("#cc").email_multiple();
});
</script>
<script type="text/javascript">

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
   var cc    = $('#cc').val();
   
    $.ajax({
        url: "ajax/send-mail.php",
        type: "POST",
        data: { id:id,email:email,cc:cc },
        success: function(data){
            $("#error-msg").html(data);
        }
    });
});
</script>
</body>
</html>
<?php } else{ include("login.php"); } ?>