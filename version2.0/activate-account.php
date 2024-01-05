<?php 
session_start();
include("include/config.php");
include("ip.php");
?>
<!DOCTYPE html>
<html lang="en-US">
<head>
    <title>gsm2go eSIM | Activate Account</title>
    <meta name="author" content="" />
    <meta name="robots" content="" />
    <meta name="googlebot" content="" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="images/icons/favicon.ico" />
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700%7CPoppins:400,500,600" rel="stylesheet" />
    <link rel="stylesheet" href="js/vendor/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="fonts/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" href="css/plugins.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/responsive.css" />
    <style type="text/css">
        #center{ margin-right: auto;margin-left: auto;float: inherit; }
        .image-block.gfort-block-style-4 .gfort-block-head { height:120px;width:150px; }
        .image-block.gfort-block-style-4 .gfort-block-container{ border:none; }
        .breadcrumb{ background-color: #fff; }
    </style>
    <script src="js/vendor/modernizr-custom.js"></script>
</head>
<body>
<?php
$id = base64_decode($_GET['id']);
if(isset($_GET['id']) && isset($_GET['type']) && $_GET['type'] == 'verify')
{
    $update = mysqli_query($con, "update users set status='A' where id='$id'");
}
?>
<a href="#" class="btn-gfort-top"><i class="fa fa-angle-up"></i></a>

<div id="main-wrapper">
    <?php include("include/header.php"); ?>

    <div class="page-title-section page-title-section-wide">
        <div class="section-container">
            <div class="container">
                <ol class="breadcrumb">
                    <li><a href="index.php" title="Home"><i class="fa fa-home"></i></a></li>
                    <li class="active">Activate Account</li>
                </ol>
            </div>
        </div>
    </div>

    <div class="page-body">
        <div class="main-content">
            <div class="main-content-container">
                <div class="gfort-section">
                    <div class="section-container">
                        <div class="container">
                            <div class="row">

                                <div class="col-md-7" id="center">
                                    <div class="gfort-block image-block gfort-block-style-4 wow flipInX" data-wow-duration="1.5s" data-wow-delay="0.25s">
                                        <div class="gfort-block-container">
                                            <div class="gfort-block-head">
                                                <img src="images/misc/ty.jpeg">
                                            </div>
                                            <div class="gfort-block-body">
                                                <div class="gfort-block-content">
                                                    <?php if(isset($_GET['id']) && isset($_GET['type']) && $_GET['type'] == 'verify') { ?>
                                                        <p>Email Verified successfully</p>
                                                        <p>Kindly wait, we are logging into your account.</p>
                                                        <img src="images/loader.gif" width="50px">
                                                    <?php } else { ?>
                                                        <p>Kindly check your Inbox to verify your email and to proceed with payment/activaton of our eSim.</p>
                                                        <p>Waiting for email verification to proceed</p>
                                                        <img src="images/loader.gif" width="50px">
                                                    <?php }?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                  
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<script type="text/javascript" src="js/vendor/jquery.min.js"></script>
<script type="text/javascript" src="js/vendor/bootstrap/js/bootstrap.min.js"></script>
<script>
    
    var intervalId = window.setInterval(function(){
        verifyAccount();
    }, 5000);
    
    function verifyAccount() {
        var userId = '<?php echo $id; ?>';
        <?php if(isset($_GET['direct']) && $_GET['direct'] != '') { ?>
            var directUrl = 'pay-now.php?id=<?php echo $_GET['direct']; ?>';
        <?php } else { ?> 
            var directUrl = 'index.php';
        <?php } ?>
    
        $.ajax({
            url: "ajax/verifyaccount.php",
            type: "POST",
            data: { userId:userId },
            success:function(data,status)
            {
                if(data == 'verified') {
                    window.location.href = directUrl;
                }
            }
        });
    }
</script>
</body>
</html>