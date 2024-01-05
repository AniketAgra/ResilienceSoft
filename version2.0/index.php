<?php
if(!isset($_COOKIE['a2k_key'])) {
    $myuid = uniqid('a2k.', true);
    $cookieId = base64_encode($myuid);
    setcookie("a2k_key", $cookieId, time()+2592000, "/","", 0);
}
session_start();
include("includes/config.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="assets/favicon.ico">
    <title>gsm2go eSIM | global roaming | The world’s best eSIM</title>
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
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="assets/css/style.min.css">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;subset=latin-ext" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i,900,900i&amp;subset=latin-ext" rel="stylesheet">
    <style>
        .fa-ul{margin-left: 1em;}
        .table th, .table td{ padding: .100rem }
        input[type=checkbox]{ zoom:1.5; }
        figure .flag{ max-height:20px }
        .total{border: none;padding: 0px;width: 25px;font-weight: 600;}
        .line-height li{line-height: 1.4; }
        figure .flag{ position:absolute;left:0;bottom:50%; }
        figure p{ font-size:13px;font-weight:600;margin-left:38px;overflow-wrap: break-word; }
        .text-block {
        position: absolute;
        bottom: 0;
        background: rgb(0, 0, 0);/* Fallback color */
        background: rgba(75, 153, 181, 0.5);/* Black background with opacity */
        color: #ffffff;
        width: 100%;
        padding: 20px;
        min-height:250px;
      }
      .text-dest {
        background-color: orange;
        text-align: center;
        color:white;
        display: table-cell;
        overflow: hidden;
        vertical-align:middle;
    }
    .card-blog-entry figure{ text-align:center;}
    .hover-item:hover .hover-transition{ background-color:rgba(0,0,0,.65); }
    .datepicker{ border:none;color:#003DBD; }
    .datepicker:focus-visible {
        outline: 0px solid blue;
        border: 3px;
    }
    .ui-datepicker{ top: 45vh !important; }
    @media only screen and (min-width: 992px){
        .banner-slides-wrapper{ min-height:80vh; }
    }
    @media screen and (max-width: 992px) {
      .d-none1 {
        display: none;
      }
    }

.columns {
Width: 100%;
}
.column{
  background-image: url('assets/images/frame1.png');
  background-size: contain;
  background-origin: padding-box;
  background-repeat:no-repeat;
  float: left;
  width: 100%;
  height:350px;
  padding-top:50px;
  padding-left:60px;
  margin:10px;
  
}
@media (min-width: 48em) {
  .column {
    width: 50%;
    float:left;
    margin:5px;
  }
  .columns {
    content: "";
    display: table;
    clear: both;
  }
}
    </style>
</head>
<body>
<?php include("includes/header.php"); ?>

<!-- Banner slides -->
<div class="banner-slides-wrapper arrow-nav-overflow" data-dots="true" data-nav="true" style="min-height:auto !important">


    <div class="banner-slides-container owl-carousel owl-theme owl-dot-light-1">

        <!-- Slide item -->
        <?php
        $select = mysqli_query($con, "select * from sliders where status='A'");
        while($row=mysqli_fetch_assoc($select)){
        ?>
        <div class="d-flex flex-column">
            
            <div class="page-header-block-height d-flex align-items-center bg-image" data-img-src="assets/images/upload/<?php echo $row['image']; ?>">
                
                
                
                <div class="container-fluid d-none1">
                    
                       
                    <div class="row">
                        
                        <div class="col-lg-8 offset-lg-1 col-xl-6 offset-xl-1 text-center text-lg-left py-5">
                            <div class="px-md-5 pr-xl-0 py-5 overflow-hidden">
                                <div class="text-block <?php if($row['box']=="NO"){ echo 'd-none';} ?>">
                                <h4 class="display-5 font-weight-300 text-white mb-0 add-animate slide-animate" data-animated="fadeInLeft"><?php echo $row['first_title']; ?></h4>
                                <h4 class="display-5 font-weight-300 text-white add-animate slide-animate" data-animated="fadeInRight"><?php echo $row['second_title']; ?></h4>
                                <h4 class="display-5 font-weight-300 text-white pb-3 add-animate slide-animate" data-animated="fadeInLeft"><?php echo $row['short_desc']; ?>
                                </h4>
                                <?php if($row['button']=="YES"){ ?>
                                <a href="<?php echo $row['btn_url']; ?>" class="btn btn-lg btn-round btn-primary btn-gray-shadow mx-2 ml-lg-0"><i class="fas fa-wallet"></i><?php echo $row['btn_title']; ?></a>
                                <?php } ?>
                                <!--<a href="#" class="btn btn-lg btn-round btn-secondary btn-gray-shadow mx-2"><i class="fas fa-envelope"></i>Quick contact</a>-->
                                </div>
                                <!--<h2 class="h3 font-weight-300 text-white add-animate slide-animate" data-animated="fadeInLeft">A Digital Creative Agency</h2>-->
                                <!--<h1 class="display-4 font-weight-800 text-white mb-3 add-animate slide-animate" data-animated="fadeInRight">We Help Growing<br>Your Business</h1>-->
                                <!--<div class="lead-sm text-white-75 pb-3 mb-2 add-animate slide-animate" data-animated="fadeInLeft">Donec eget est commodo suscipit est tempor blandit enim rhoncus malesuada massa litora rhoncus massa nec lacinia mattis arcu</div>-->
                       <!--         <div class="add-animate slide-animate" data-animated="fadeIn">
                                   <a href="#" class="btn btn-lg btn-round btn-primary btn-gray-shadow mx-2 ml-lg-0"><i class="fas fa-credit-card"></i>Plans & Pricing</a>
                                <a href="#" class="btn btn-lg btn-round btn-secondary btn-gray-shadow mx-2"><i class="fas fa-envelope"></i>Quick contact</a>
                                </div>-->
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            
               
        </div>
        <?php } ?>

    </div>


    <!-- Navigation -->
    <div class="carousel-custom-nav carousel-nav-lg d-none d-lg-block">
        <a class="carousel-control-prev" href="#" data-width="9%">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#" data-width="9%">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

</div>
<!-- Content -->
<div class="main-content py-0">


    <!-- Portfolio section -->
    <div class="section">

        <?php include("includes/plans.php"); ?>

    </div>

    
    <div class="bg-indigo">

        
    </div>


</div>

<?php include("includes/footer.php"); ?>

<!-- jQuery -->
<script src="assets/js/vendor/jquery-3.5.1.min.js"></script>
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="components/navik-navigation-menu/dist/js/navik.menu.js"></script>
<script src="node_modules/isotope-layout/dist/isotope.pkgd.min.js"></script>
<script src="node_modules/imagesloaded/imagesloaded.pkgd.min.js"></script>
<script src="node_modules/%40fancyapps/fancybox/dist/jquery.fancybox.min.js"></script>
<script src="node_modules/owl.carousel/dist/owl.carousel.min.js"></script>
<script src="node_modules/jquery-circle-progress/dist/circle-progress.min.js"></script>
<script src="assets/js/custom.js"></script>
<script type="text/javascript">
$(document).ready(function() {
   readrecords();
});

function readrecords(){ 

   $('.esim').each(function(){
      if ($(this).is(':checked')) {
         var id  = $(this).attr("id");
         var val = $(this).val();
         
         var usd = $(".usd"+val).val();
         var act = $(".activation"+val).val();
         var eamt = $(".esim-amt"+val).val();
         
        $(".display-activa"+val).attr("style", "text-decoration: line-through !important;color:red;padding-right:7px");
         totalSubAmount = Number(usd) + Number(eamt);
         $(".total"+val).val(totalSubAmount);
      }
      else {
            var id  = $(this).attr("id");
            var val = $(this).val();
            
            var usd = $(".usd"+val).val();
            var act = $(".activation"+val).val();
            var eamt = $(".esim-amt"+val).val();

            $(".display-esim"+val).attr("style", "color: #fff !important");
            totalSubAmount = Number(usd) + Number(act) + Number(0);
            $(".total"+val).val(totalSubAmount);
         
      }
   })
}

$(document).ready(function() {

    $(".esim").change(function() {
        if ($(this).is(':checked')) {
            var id  = $(this).attr("id");
            var val = $(this).val();
            
            var usd = $(".usd"+val).val();
            var act = $(".activation"+val).val();
            var eamt = $(".esim-amt"+val).val();

            $(".display-esim"+val).attr("style", "color: #717171 !important");
            totalSubAmount = Number(usd) + Number(eamt);
            $(".total"+val).val(totalSubAmount);
            $(".display-activa"+val).attr("style", "text-decoration: line-through !important;color:red;padding-right:7px");
        } 
        else {
            var id  = $(this).attr("id");
            var val = $(this).val();
            
            var usd = $(".usd"+val).val();
            var act = $(".activation"+val).val();

            $(".display-esim"+val).attr("style", "color: #fff !important");
            totalSubAmount = Number(usd) + Number(act) + Number(0);
            $(".total"+val).val(totalSubAmount);
            $(".display-activa"+val).attr("style", "text-decoration: none !important;padding-right:7px");
         
        }
    });
    
    $(".compatibility").change(function() {
        
        if ($(this).is(":checked")) {
            var val = $(this).val();
            if($('.agree'+val).is(":checked"))
            {
                $('.buy-now'+val).removeAttr("disabled");
            }
        } 
        else {
            var val = $(this).val();
            $('.buy-now'+val).prop('disabled',true);
            $(val).removeAttr("onclick");
        }
    });
    $(".agree").change(function() {
        if ($(this).is(":checked")) {
            var val = $(this).val();
            if($('.compatibility'+val).is(":checked"))
            {
                $('.buy-now'+val).removeAttr("disabled");
            }
        } else {
            var val = $(this).val();
            $('.buy-now'+val).prop('disabled',true);
            $(val).removeAttr("onclick");
        }
    });

});

</script>
<script type="text/javascript">
$(".datepicker").datepicker({
    dateFormat:"dd-M-yy (D)",
    maxDate:'+15d',
    minDate: '+0d',
    defaultDate:<?php echo date('m/d/Y', strtotime("+1 day")); ?>
});
</script>
</body>
</html>