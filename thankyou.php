<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="assets/favicon.ico">
    <title>gsm2go eSIM | Checkout</title>
    <?php include("includes/logrocket.php"); ?>
    <link rel="stylesheet" href="node_modules/%40fortawesome/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="node_modules/animate.css/animate.min.css">
    <link rel="stylesheet" href="node_modules/%40fancyapps/fancybox/dist/jquery.fancybox.min.css">
    <link rel="stylesheet" href="node_modules/owl.carousel/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="node_modules/owl.carousel/dist/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="assets/css/style.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;subset=latin-ext" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i,900,900i&amp;subset=latin-ext" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Style+Script&display=swap" rel="stylesheet">

    <style>

    .thank-section{
        padding: 100px 0;
    }
    /* .thank-content {
    width: 700px;
    max-width: 100%;
    margin: 0 auto;
    background-color: #efefef;
    padding: 20px;
    border-radius: 15px;
} */
    
    .thank-detail{
        text-align: center;
    }
    .thank-title {
    font-family: 'Style Script', cursive;
    font-size: 100px;
    margin: 0;
    text-align: center;
    color: #79af37;
    }
    .footer-bottom {
    position: fixed !important;
    bottom: 0;
    left: 0;
    width: 100%;
    background-color: #10161d;
}
.topcorner {
    position: absolute !important;
    right: 30px !important;
    top: 50% !important;
    transform: translateY(-50%);
}
@media(max-width: 575px){
    .thank-title {
    font-size: 54px;
}
.thank-section {
    padding: 50px 0;
}
}
    </style>


</head>
<body>

<?php include("includes/header.php"); ?>

<!-- thank section start  -->

<section class="thank-section">
    <div class="container">
        <div class="thank-content">
            <div class="thank-detail">
                <h2 class="thank-title">Thank You</h2>
                <a href="https://dev.mysimaccess.com/" class="btn btn-secondary">Back To Home</a>
            </div>
        </div>
    </div>
</section>

<!-- thank section end  -->

<!-- Button trigger modal -->

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Select languages</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="fa-solid fa-xmark"></i></button>
                </div>
                <div class="modal-body d-flex flex-wrap">
                    <div class="row">
                        <div class="col-3">
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

<!-- Go to top -->
<div class="go-to-top">
    <a href="#" class="rounded-circle"><i class="fas fa-chevron-up"></i></a>
</div>
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