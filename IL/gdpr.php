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
    <title>gsm2go eSIM | GDPR</title>
    <?php include("includes/logrocket.php"); ?>
    <link rel="stylesheet" href="node_modules/%40fortawesome/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="node_modules/animate.css/animate.min.css">
    <link rel="stylesheet" href="node_modules/%40fancyapps/fancybox/dist/jquery.fancybox.min.css">
    <link rel="stylesheet" href="node_modules/owl.carousel/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="node_modules/owl.carousel/dist/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="assets/css/style.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;subset=latin-ext" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i,900,900i&amp;subset=latin-ext" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
     <!-- new css link start -->
    
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- new css link end  -->

<body>

<?php include("includes/header.php"); ?>
<?php
$select = mysqli_query($con, "Select * from pages where id='2'");
$row = mysqli_fetch_assoc($select);
?>
    <style>
    body{ font-family: calibri,sans-serif;font-size:11pt; }
    @media only screen and (min-width: 992px){
        .fixed-footer{ position:fixed !important;left:0!important;right:0!important;bottom:0!important;}
    }
.MsoNormal{
            
            font-size: 11pt; 
            font-family: Calibri, sans-serif; 
            caret-color: rgb(0, 0, 0); 
            color: rgb(0, 0, 0);
}
.navik-header-container{
    display:flex;
    align-items: center;
    justify-content: space-between;
}
.navik-menu {
    direction: rtl;
}
@media(max-width: 991px){
    .topcorner {
    left: 50%;
}
}
@media(max-width: 575px){
    .topcorner {
    left: 30%;
}
}
@media(max-width: 400px){
    .topcorner {
    left: 20%;
}
}
    </style>


</head>
<div class="container">
<!-- Page title -->
<div class="d-flex flex-column w-100">
    <div class="page-title d-flex align-items-center bg-image" data-img-src="assets/images/banner/<?php echo $row['image']; ?>">
        <div class="container page-title-container">
            <div class="row">
                <div class="col text-center">

                    <h1 class="display-5 font-weight-800 text-white mb-0">
                        <?php echo $row['title']; ?>
                    </h1>
                    
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- Content -->
<div class="main-content py-0">

    <!-- Info section -->
    <div class="section text-right" class="direction: rtl;">
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

                <div class="col-lg-6 d-none">
                    <div class="text-center mb-3 mb-lg-0">
                        <img src="assets/images/upload/service-single-tab-img-01.jpg" alt="image" class="img-fluid">
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="pl-xl-5">
                        <?php echo $row['content']; ?>
                    </div>
                </div>

            </div>

        </div>
    </div>



</div>
<!-- Button trigger modal -->

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Select languages</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex flex-wrap">
                    <div class="row">
                        <div class="col-3 d-flex">
                            <a href="https://dev.mysimaccess.com/" class="select-languages">
                                <h2>English</h2>
                            </a>
                            <a href="https://dev.mysimaccess.com/IL/index" class="select-languages">
                                <h2>Hebrew</h2>
                            </a>
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