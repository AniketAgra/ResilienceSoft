<?php 
session_start();
include("includes/config.php"); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="assets/favicon.ico">
    <title>gsm2go eSIM | Terms and Conditions</title>
    <link rel="stylesheet" href="node_modules/%40fortawesome/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="node_modules/animate.css/animate.min.css">
    <link rel="stylesheet" href="node_modules/%40fancyapps/fancybox/dist/jquery.fancybox.min.css">
    <link rel="stylesheet" href="node_modules/owl.carousel/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="node_modules/owl.carousel/dist/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="assets/css/style.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;subset=latin-ext" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i,900,900i&amp;subset=latin-ext" rel="stylesheet">
    <style>
       
        body{ font-family: Calibri, sans-serif;
        font-size:11pt; }
        .bg-image{background-color:#008080}
    </style>
</head>
<body>

<?php include("includes/header.php"); ?>
<?php
$select = mysqli_query($con, "Select * from pages where id='1'");
$row = mysqli_fetch_assoc($select);
?>
<!-- Page title -->
<div class="d-flex flex-column w-100">
    <div class="page-title d-flex align-items-center bg-image" data-img-src="assets/images/upload/page-title-bg-01.jpg">
        <div class="container page-title-container">
            <div class="row">
                <div class="col text-center">

                    <h1 class="display-5 font-weight-800 text-white mb-0">
                        <?php echo $row['title']; ?>
                    </h1>

                    <!-- <nav aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-light-2 justify-content-center mb-0">
                            <li class="breadcrumb-item text-uppercase"><a href="#">Homepage</a></li>
                            <li class="breadcrumb-item text-uppercase"><a href="#">Our Services</a></li>
                            <li class="breadcrumb-item text-uppercase text-nowrap active" aria-current="page">Strategic Solutions</li>
                        </ol>
                    </nav> -->
                    
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Content -->
<div class="main-content py-0">

    <!-- Info section -->
    <div class="section">
        <div class="container">

            <!-- <div class="row py-5">
                <div class="col-md-10 offset-md-1 col-lg-8 offset-lg-2">
                    <div class="text-center">

                        <div data-height="3px"></div>

                        <h2 class="h1 section-title-4 font-weight-800">
                            Explore Our Projects
                            <div class="title-divider-round"></div>
                        </h2>

                    </div>
                </div>
            </div> -->

            <div class="row align-items-center py-4">

                <!--<div class="col-lg-6">-->
                <!--    <div class="text-center mb-3 mb-lg-0">-->
                <!--        <img src="assets/images/upload/service-single-tab-img-01.jpg" alt="image" class="img-fluid">-->
                <!--    </div>-->
                <!--</div>-->

                <div class="col-lg-12">
                    <div class="pl-xl-5">
                        
                        <!-- <h3 class="font-weight-700 mt-3 mb-4">Malesuada Neca Rhoncus</h3> -->

                        <?php echo $row['content']; ?>

                    </div>
                </div>

            </div>

        </div>
    </div>



</div>

<?php include("includes/footer.php"); ?>

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
</body>
</html>