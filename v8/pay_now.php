<?php
session_start();
if(!isset($_SESSION['user']) && ($_SESSION['role']!="U")){
    header("Location: signup.php");
}
include("includes/config.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="assets/favicon.ico">
    <title>gsm2go eSIM | Checkout</title>
    <link rel="stylesheet" href="node_modules/%40fortawesome/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="node_modules/animate.css/animate.min.css">
    <link rel="stylesheet" href="node_modules/%40fancyapps/fancybox/dist/jquery.fancybox.min.css">
    <link rel="stylesheet" href="node_modules/owl.carousel/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="node_modules/owl.carousel/dist/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="assets/css/style.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;subset=latin-ext" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i,900,900i&amp;subset=latin-ext" rel="stylesheet">
</head>
<body class="bg-image bg-fixed" data-img-src="assets/images/bgimg.jpeg">

<?php
$plan_detail = mysqli_query($con, "select * from plans where id='".$_SESSION['direct']."'");
$row = mysqli_fetch_assoc($plan_detail);
?>
<?php include("includes/header.php"); ?>

<!-- Page title -->
<div class="d-flex flex-column w-100">
    <div class="d-flex align-items-center bg-image py-2">
        <div class="container page-title-container">

            <div class="row align-items-center py-5">

                <div class="col-lg-8 col-xl-9 text-center text-lg-left">
                    <h1 class="display-5 font-weight-800 mb-0" style="color:midnightblue;">
                        <?php echo $row['plan_name']; ?>
                    </h1>
                </div>

            </div>

            <div data-height="40px"></div>

        </div>
    </div>
</div>

<!-- Content -->
<div class="pt-0">

    <div class="section mt-up75">
        <div class="container">
            <div class="row">

                <!-- Sidebar -->
                <div class="col-lg-4">
                    <div class="pb-3 mb-3">
                        <div class="bg-white rounded-xl shadow-sm py-5">
                            <div class="text-center px-4 px-md-5 px-lg-3 px-xl-2">
                                <div data-height="1px"></div>
                                <div class="pb-2 px-4 mb-4">
                                    <?php
                                    $zone_detail = mysqli_query($con, "select * from zones where id='".$row['zone_id']."'");
                                    $zonerow = mysqli_fetch_assoc($zone_detail);
                                    ?>
                                    <img src="assets/images/continent/<?php echo $zonerow['image']; ?>" class="shadow" style="width:-webkit-fill-available; width:100%;">
                                </div>
                                <span class="badge badge-pill badge-success mb-4 text-capitalize">Selected Plan</span>
                                <h5 class="font-weight-700 mb-0"><?php echo $row['plan_name']; ?></h5>
                            </div>


                            <div class="d-lg-block">
                                <h5 class="font-weight-700 px-4 px-md-5 px-lg-4 px-xl-5 pt-3 mt-4 mb-3">Plan Detail</h5>
                                <ul class="list-group list-group-flush py-0">
                                    <?php if(!empty($row['GB'])){ ?>
                                    <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center px-4 px-md-5 px-lg-4 px-xl-5">
                                        <div class="d-flex align-items-center">
                                            <span>GB</span>
                                        </div>
                                        <small class="text-white font-weight-600 text-uppercase bg-primary rounded-xl px-2"><?php echo $row['GB']; ?></small>
                                    </a>
                                    <?php } ?>
                                    <?php if(!empty($row['Mins'])){ ?>
                                    <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center px-4 px-md-5 px-lg-4 px-xl-5">
                                        <div class="d-flex align-items-center">
                                            <span>Mins</span>
                                        </div>
                                        <small class="text-white font-weight-600 text-uppercase bg-primary rounded-xl px-2"><?php echo $row['Mins']; ?></small>
                                    </a>
                                    <?php } ?>
                                    <?php if(!empty($row['SMS'])){ ?>
                                    <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center px-4 px-md-5 px-lg-4 px-xl-5">
                                        <div class="d-flex align-items-center">
                                            <span>SMS</span>
                                        </div>
                                        <small class="text-white font-weight-600 text-uppercase bg-primary rounded-xl px-2"><?php echo $row['SMS']; ?></small>
                                    </a>
                                    <?php } ?>
                                    <?php if(!empty($row['Days'])){ ?>
                                    <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center px-4 px-md-5 px-lg-4 px-xl-5">
                                        <div class="d-flex align-items-center">
                                            <span>Days</span>
                                        </div>
                                        <small class="text-white font-weight-600 text-uppercase bg-primary rounded-xl px-2"><?php echo $row['Days']; ?></small>
                                    </a>
                                    <?php } ?>
                                    <?php if(isset($_POST['esim']) && $_POST['esim'] == 1) { ?>
                                    <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center px-4 px-md-5 px-lg-4 px-xl-5">
                                        <div class="d-flex align-items-center">
                                            <span>eSIM Live</span>
                                        </div>
                                        <small class="text-white font-weight-600 text-uppercase bg-primary rounded-xl px-2">1</small>
                                    </a>
                                    <?php } ?>
                                </ul>

                            </div>

                        </div>
                    </div>
                </div>

                <!-- Content body -->
                <div class="col-lg-8">

                    <div class="pb-3 mb-3">
                        <div class="bg-white rounded-xl shadow-sm px-4 py-5 p-md-5">
                            <form action="checkout.php" method="post">
                                <input type="hidden" name="USD" value="<?php echo $_POST['charge']; ?>" />
                                <input type="hidden" name="planid" value="<?php echo $_POST['direct']; ?>" />
                                <input type="hidden" name="esimlive" value="<?php echo $_POST['esim']; ?>" />
                                <button class="btn btn-link p-0 mb-0 checkoutForm" id="checkoutForm" type="submit"></button>
                            </form>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>

</div>

<?php include("includes/footer.php"); ?>

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
    });
    $(document).ready(function(){
        $("#checkoutForm").submit();
    });
</script>
</body>
</html> 