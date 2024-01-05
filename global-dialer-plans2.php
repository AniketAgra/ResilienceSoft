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
    <title>gsm2go eSIM | Dialer Plans </title>
    <?php include("includes/logrocket.php"); ?>
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="node_modules/%40fortawesome/fontawesome-free/css/all.min.css">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="node_modules/animate.css/animate.min.css">
    <!-- Fancybox CSS -->
    <link rel="stylesheet" href="node_modules/%40fancyapps/fancybox/dist/jquery.fancybox.min.css">    
    <!-- OWL carousel CSS -->
    <link rel="stylesheet" href="node_modules/owl.carousel/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="node_modules/owl.carousel/dist/assets/owl.theme.default.min.css">
    <!-- Main CSS -->
    <link rel="stylesheet" href="assets/css/style.min.css">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;subset=latin-ext" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i,900,900i&amp;subset=latin-ext" rel="stylesheet">
    <style>
        body, .nav-link, ul{ font-family:arial !important; }
        .fa-ul{margin-left: 1em;}
        .table th, .table td{ padding: .100rem }
        input[type=checkbox]{ zoom:1.5; }
        figure .flag{ max-height:20px }
        .total{border: none;padding: 0px;width: 25px;font-weight: 600;}
        .line-height li{line-height: 1.4; }
        .desktop-menu{display:none}
        figure .flag{ position:absolute;left:0;bottom:50%; }
        figure p{ font-size:13px;font-weight:600;margin-left:38px;overflow-wrap: break-word; }
    </style>
</head>
<body>
<?php include("includes/header.php"); ?>



<!-- Content -->
<div class="main-content py-0">
    
    <div class="container">
        <div class="row py-4">
            <div class="col-md-10 offset-md-1 col-lg-8 offset-lg-2 col-xl-6 offset-xl-3">
                <div class="text-center">
                    <h2 class="h1 section-title-3 font-weight-800 mb-0">Global Dialer Plans</h2>
                    <div class="lead-sm pt-2">
                        Info box style two with various options
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-5">
            <?php
            $i = 0;
            $x = 0;
            $color = array('bg-dark','bg-danger','bg-primary','bg-warning','bg-info','bg-rose','bg-success');
            $img = array('blog-thumbnail-21.jpg','info-box-19.jpg','blog-thumbnail-13.jpg','info-box-21.jpg');
            $json = file_get_contents('https://uk3.gsm2go.com/a2b/customer/android/plans_website.php');
            $data = json_decode($json,true);
            foreach($data as $val){
                if($i==5){ $i=0; }
                if($x==4){ $x=0; }
            ?>  
            <div class="col-md-6 col-lg-4">
                <div class="card info-box-2 border-0 shadow">
                    <img class="card-img" src="assets/images/upload/<?php echo $img[$x++]; ?>" alt="Info box">
                    <div class="card-img-overlay d-flex align-items-end">
                        <div class="info-box-details w-100 <?php echo $color[$i++]; ?>">
                            <div class="info-box-caption">
                                <h5 class="card-title text-white font-weight-700 mb-0"><?php echo $val['plan']; ?></h5>
                                <p class="card-text text-white-75"><?php echo $val['description']; ?></p>
                            </div>
                            <div class="info-box-btn pt-3" style="margin-bottom: -54.5px;">
                                <form method="post">
                                    <div class="info-box-btn-inner d-flex justify-content-between">
                                        <input type="hidden" name="planid" value="<?php echo $val['planid']; ?>">
                                        <?php if(isset($_SESSION['user'],$_SESSION['role']) && $_SESSION['role']=="U"){ ?>
                                        <button type="submit" formaction="checkout" class="btn btn-round btn-dark btn-sm mb-2">Buy <?php echo $val['cost']; ?>$</button>
                                        <?php } else{ ?>
                                        <button type="submit" formaction="login" class="btn btn-round btn-dark btn-sm mb-2">Buy <?php echo $val['cost']; ?>$</button>
                                        <?php } ?>
                                        <a href="#" class="btn btn-round btn-icon-only btn-outline-light btn-sm mb-2"><i class="fas fa-paper-plane"></i></a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>

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