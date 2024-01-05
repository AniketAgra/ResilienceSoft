<?php 
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
<div class="banner-slides-wrapper arrow-nav-overflow" data-dots="true" data-nav="true">


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

    <!-- Highlight info -->
    <!--<div class="section py-5 pt-lg-0">-->
    <!--    <div class="container">-->
    <!--        <div class="row pb-4 my-5 mt-lg-0">-->

    <!--            <div class="col-lg-7 align-self-end order-2 order-lg-1">-->

    <!--                <div class="d-none d-lg-block" data-height="120px"></div>-->

    <!--                <div class="row">-->

    <!--                    <div class="col-md-6">-->
    <!--                        <div class="pr-xl-2">-->

    <!--                            <div class="icon-info-4 hover-item hover-box-shadow">-->
    <!--                                <div class="hover-inner-wrap bg-white rounded-ultra shadow px-4 py-5">-->
    <!--                                    <div class="px-3">-->
    <!--                                        <a class="icon-info-link" href="#">-->
    <!--                                            <div class="icon-element mb-4">-->
    <!--                                                <img src="assets/svg/upload/service-icon-13.svg" alt="icon" class="add-animate faster" data-animated="zoomIn" data-width="58px" data-height="58px">-->
    <!--                                            </div>-->
    <!--                                            <div class="icon-info-text pt-1">-->
    <!--                                                <h5 class="font-weight-700 mb-3">Profitable Idea</h5>-->
    <!--                                                <p class="mb-0">Fusce sem massa congue in vitae neque rhoncus viverra odio</p>-->
    <!--                                            </div>-->
    <!--                                        </a>-->
    <!--                                    </div>-->
    <!--                                </div>-->
    <!--                            </div>-->

    <!--                            <div data-height="46px"></div>-->

    <!--                            <div class="icon-info-4 hover-item hover-box-shadow">-->
    <!--                                <div class="hover-inner-wrap bg-white rounded-ultra shadow px-4 py-5">-->
    <!--                                    <div class="px-3">-->
    <!--                                        <a class="icon-info-link" href="#">-->
    <!--                                            <div class="icon-element mb-4">-->
    <!--                                                <img src="assets/svg/upload/service-icon-15.svg" alt="icon" class="add-animate faster" data-animated="zoomIn" data-width="58px" data-height="58px">-->
    <!--                                            </div>-->
    <!--                                            <div class="icon-info-text pt-1">-->
    <!--                                                <h5 class="font-weight-700 mb-3">Task Planning</h5>-->
    <!--                                                <p class="mb-0">Magna viverra vitae pellentesque Consequat sem curabitur</p>-->
    <!--                                            </div>-->
    <!--                                        </a>-->
    <!--                                    </div>-->
    <!--                                </div>-->
    <!--                            </div>-->

    <!--                            <div data-height="46px"></div>-->

    <!--                        </div>-->
    <!--                    </div>-->

    <!--                    <div class="col-md-6">-->
    <!--                        <div class="pl-xl-2">-->
                                
    <!--                            <div class="d-none d-md-block" data-height="80px"></div>-->

    <!--                            <div class="icon-info-4 hover-item hover-box-shadow">-->
    <!--                                <div class="hover-inner-wrap bg-white rounded-ultra shadow px-4 py-5">-->
    <!--                                    <div class="px-3">-->
    <!--                                        <a class="icon-info-link" href="#">-->
    <!--                                            <div class="icon-element mb-4">-->
    <!--                                                <img src="assets/svg/upload/service-icon-14.svg" alt="icon" class="add-animate faster" data-animated="zoomIn" data-width="58px" data-height="58px">-->
    <!--                                            </div>-->
    <!--                                            <div class="icon-info-text pt-1">-->
    <!--                                                <h5 class="font-weight-700 mb-3">Creative Design</h5>-->
    <!--                                                <p class="mb-0">Vulputate neca imperdiet neque fringilla purus orci mattis</p>-->
    <!--                                            </div>-->
    <!--                                        </a>-->
    <!--                                    </div>-->
    <!--                                </div>-->
    <!--                            </div>-->

    <!--                            <div data-height="46px"></div>-->

    <!--                            <div class="icon-info-4 hover-item hover-box-shadow">-->
    <!--                                <div class="hover-inner-wrap bg-white rounded-ultra shadow px-4 py-5">-->
    <!--                                    <div class="px-3">-->
    <!--                                        <a class="icon-info-link" href="#">-->
    <!--                                            <div class="icon-element mb-4">-->
    <!--                                                <img src="assets/svg/upload/service-icon-16.svg" alt="icon" class="add-animate faster" data-animated="zoomIn" data-width="58px" data-height="58px">-->
    <!--                                            </div>-->
    <!--                                            <div class="icon-info-text pt-1">-->
    <!--                                                <h5 class="font-weight-700 mb-3">Data Analytics</h5>-->
    <!--                                                <p class="mb-0">Dolor class aptent taciti sociosqu amet neca condimentum</p>-->
    <!--                                            </div>-->
    <!--                                        </a>-->
    <!--                                    </div>-->
    <!--                                </div>-->
    <!--                            </div>-->

    <!--                        </div>-->
    <!--                    </div>-->

    <!--                </div>-->

    <!--            </div>-->

    <!--            <div class="col-lg-5 order-1 order-lg-2">-->
    <!--                <div class="pl-xl-3 pb-5 pb-lg-0">-->
    <!--                    <div class="position-relative z-index-1 rounded-ultra shadow-lg px-4 py-5 p-md-5 px-lg-4 p-xl-5 mb-5 mb-lg-0 text-white-75 mt-lg-up100 bg-image" data-img-src="assets/images/upload/services-info-box-bg.jpg">-->
    <!--                        <div class="p-3">-->

    <!--                            <div class="d-none d-md-block" data-height="32px"></div>-->

    <!--                            <h5 class="font-weight-400 text-white-75 mb-3">Business Solutions</h5>-->

    <!--                            <h2 class="h1 section-title-3 title-light-1 text-left font-weight-800">What We Do</h2>-->

    <!--                            <div class="lead-sm pt-2">-->
    <!--                                Duis pretium nec cursus molestie magna consequat semper malesuada curabitur semper malesuada sapien phasellus ante sem cursus metus a gravida neque mauris porttitor neque nec aliquam laoreet diam rutrum iaculis massa-->
    <!--                            </div>-->

    <!--                            <div data-height="180px"></div>-->

    <!--                            <div class="text-right">-->
    <!--                                <a href="#" class="btn btn-lg btn-round btn-secondary btn-gray-shadow"><i class="fas fa-paper-plane"></i>Get started now</a>-->
    <!--                            </div>-->

    <!--                        </div>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->

    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->

    <!-- Benefits section -->
    <!--<div class="section">-->
    <!--    <div class="container-fluid p-0">-->
    <!--        <div class="row no-gutters">-->

    <!--            <div class="col-lg-6 bg-image" data-img-src="assets/images/upload/startup-benefits-img-03.jpg">-->
    <!--                <div class="d-lg-none" data-height="70vw"></div>-->
    <!--            </div>-->

    <!--            <div class="col-lg-6 bg-light">-->
    <!--                <div class="py-5">-->
    <!--                    <div class="row no-gutters">-->
    <!--                        <div class="col-md-10 offset-md-1 px-4">-->

    <!--                            <div data-height="7vw"></div>-->

    <!--                            <h5 class="font-weight-400 mb-3">Make Your Business Shine</h5>-->

    <!--                            <h2 class="h1 section-title-3 font-weight-800 text-left">Build Your Audience</h2>-->

    <!--                            <div class="lead-sm pt-2 mb-5">-->
    <!--                                Curabitur ipsum nulla pellentesque vitae in dolor condimentum sapien aptent taciti ornare malesuada sociosqu himenaeos conubia litora torquent nostra consequa-->
    <!--                            </div>-->

    <!--                            <div data-height="10px"></div>-->

    <!--                            <a href="#" class="btn btn-lg btn-round btn-primary mb-0"><i class="fas fa-paper-plane"></i>Get started now</a>-->

    <!--                            <div data-height="7vw"></div>-->

    <!--                        </div>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->

    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->

    <!-- Mobile features section -->
    <!-- <div class="section py-5 pb-lg-0">
        <div class="container">
            <div class="row my-5">
                <div class="col-md-10 offset-md-1 col-lg-8 offset-lg-2">
                    <div class="text-center mt-3 mb-4">
                        <h2 class="h1 section-title-3 font-weight-800">Creative App Showcase</h2>
                        <div class="lead-sm pt-2">
                            Aliquam tristique sapien odio mollis massa imperdiet donec ac massa vitae ipsum aliquam consectetur mattis dolor amet dolor aliquam mattis orci nec ipsum congue
                        </div>
                    </div>
                </div>
            </div>

            <div class="row align-items-lg-center">

                <div class="col-md-6 col-lg-4 order-2 order-lg-1">
                    <div class="px-4 px-lg-0 pl-xl-4 pr-xl-5">

                        <div class="icon-info-3 pb-2 mb-5 add-animate" data-animated="fadeInLeft">
                            <div class="icon-title d-flex justify-content-start justify-content-lg-end align-items-center mb-3">
                                <img src="assets/svg/upload/service-icon-27.svg" alt="icon" class="mr-3 mr-lg-0 ml-lg-3 order-lg-2" data-width="50px" data-height="50px">
                                <h5 class="mb-0 font-weight-700 text-lg-right order-lg-1">Designed to Sell</h5>
                            </div>
                            <div class="text-lg-right">
                                <p>Aenean sed mattis arcu rhoncus risus duis cursus nec pretium eget purus</p>
                            </div>
                        </div>

                        <div class="icon-info-3 pb-2 mb-5 add-animate" data-animated="fadeInLeft">
                            <div class="icon-title d-flex justify-content-start justify-content-lg-end align-items-center mb-3">
                                <img src="assets/svg/upload/service-icon-29.svg" alt="icon" class="mr-3 mr-lg-0 ml-lg-3 order-lg-2" data-width="50px" data-height="50px">
                                <h5 class="mb-0 font-weight-700 text-lg-right order-lg-1">Client Targeting</h5>
                            </div>
                            <div class="text-lg-right">
                                <p>Magna nec semper magna quis malesuada dolor nullam ornare in risus</p>
                            </div>
                        </div>
                        <div class="d-none d-lg-block" data-height="125px"></div>
                    </div>
                </div>

                <div class="col-lg-4 order-1 order-lg-2">
                    <div class="text-center px-4 pb-4 mb-5 pb-lg-0 mb-lg-0">
                        <img src="assets/images/upload/phone-mockup-05.png" alt="image" class="img-fluid add-animate" data-animated="fadeInUp">
                    </div>
                </div>

                <div class="col-md-6 col-lg-4 order-3 order-lg-3">
                    <div class="px-4 px-lg-0 pl-xl-5 pr-xl-4">
                        <div class="icon-info-3 pb-2 mb-5 add-animate" data-animated="fadeInRight">
                            <div class="icon-title d-flex justify-content-start align-items-center mb-3">
                                <img src="assets/svg/upload/service-icon-28.svg" alt="icon" class="mr-3" data-width="50px" data-height="50px">
                                <h5 class="mb-0 font-weight-700">Growth Strategy</h5>
                            </div>
                            <div>
                                <p>Vestibulum sem ipsum primis metus neca charetra justo sapien purus cursus</p>
                            </div>
                        </div>

                        <div class="icon-info-3 pb-2 mb-5 add-animate" data-animated="fadeInRight">
                            <div class="icon-title d-flex justify-content-start align-items-center mb-3">
                                <img src="assets/svg/upload/service-icon-30.svg" alt="icon" class="mr-3" data-width="50px" data-height="50px">
                                <h5 class="mb-0 font-weight-700">Configuration</h5>
                            </div>
                            <div>
                                <p>Hendrerit volutpat in laoreet elementum luctus a consequat bibendum</p>
                            </div>
                        </div>

                        <div class="d-none d-lg-block" data-height="125px"></div>

                    </div>
                </div>

            </div>

        </div>
    </div> -->

    <!-- Number counter section -->
    <!--<div class="section py-5 mt-lg-up100 mt-xl-up125 bg-image" data-img-src="assets/images/upload/number-counter-bg.jpg">-->
    <!--    <div class="container">-->

    <!--        <div class="d-none d-lg-block" data-height="110px"></div>-->

    <!--        <div class="row pt-5 pb-2 py-lg-2 my-5 mt-lg-0 my-xl-5">-->
                
    <!--            <div class="col-md-6 col-xl-3 mb-5 mb-xl-0">-->
    <!--                <div class="num-counter">-->
    <!--                    <h2 class="count-value count-run display-4 font-weight-800 text-center text-white mb-4">950</h2>-->
    <!--                    <div class="icon-info-3">-->
    <!--                        <div class="icon-title d-flex justify-content-center align-items-end mb-2">-->
    <!--                            <img src="assets/svg/upload/counter-icon-12.svg" alt="icon" class="mr-2" data-width="34px" data-height="34px">-->
    <!--                            <h4 class="mb-0 text-white font-weight-700">Happy Clients</h4>-->
    <!--                        </div>-->
    <!--                        <div class="text-center text-white-75">-->
    <!--                            <p>Vestibulum ante ipsum primis</p>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->

    <!--            <div class="col-md-6 col-xl-3 mb-5 mb-xl-0">-->
    <!--                <div class="num-counter">-->
    <!--                    <h2 class="count-value count-run display-4 font-weight-800 text-center text-white mb-4">427</h2>-->
    <!--                    <div class="icon-info-3">-->
    <!--                        <div class="icon-title d-flex justify-content-center align-items-end mb-2">-->
    <!--                            <img src="assets/svg/upload/counter-icon-13.svg" alt="icon" class="mr-2" data-width="34px" data-height="34px">-->
    <!--                            <h4 class="mb-0 text-white font-weight-700">Expert Workers</h4>-->
    <!--                        </div>-->
    <!--                        <div class="text-center text-white-75">-->
    <!--                            <p>Fusce sem massa congue vitae</p>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->

    <!--            <div class="col-md-6 col-xl-3 mb-5 mb-md-0">-->
    <!--                <div class="num-counter">-->
    <!--                    <h2 class="count-value count-run display-4 font-weight-800 text-center text-white mb-4">850</h2>-->
    <!--                    <div class="icon-info-3">-->
    <!--                        <div class="icon-title d-flex justify-content-center align-items-end mb-2">-->
    <!--                            <img src="assets/svg/upload/counter-icon-14.svg" alt="icon" class="mr-2" data-width="34px" data-height="34px">-->
    <!--                            <h4 class="mb-0 text-white font-weight-700">Project Done</h4>-->
    <!--                        </div>-->
    <!--                        <div class="text-center text-white-75">-->
    <!--                            <p>Consequat eu dolor nulla eget</p>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->

    <!--            <div class="col-md-6 col-xl-3">-->
    <!--                <div class="num-counter">-->
    <!--                    <h2 class="count-value count-run display-4 font-weight-800 text-center text-white mb-4">245</h2>-->
    <!--                    <div class="icon-info-3">-->
    <!--                        <div class="icon-title d-flex justify-content-center align-items-end mb-2">-->
    <!--                            <img src="assets/svg/upload/counter-icon-15.svg" alt="icon" class="mr-2" data-width="34px" data-height="34px">-->
    <!--                            <h4 class="mb-0 text-white font-weight-700">Offices Worldwide</h4>-->
    <!--                        </div>-->
    <!--                        <div class="text-center text-white-75">-->
    <!--                            <p>Aliquam odio posuere lobortis</p>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->

    <!--        </div>-->

    <!--        <div data-height="80px"></div>-->

    <!--    </div>-->
    <!--</div>-->

    <!-- Skills section -->
    <!--<div class="section pb-5 bg-image" data-img-src="assets/images/upload/skills-bg-image-02.jpg">-->
    <!--    <div class="container">-->

    <!--        <div class="bg-transparent" data-height="4px"></div>-->

    <!--        <div class="row no-gutters">-->
    <!--            <div class="col overflow-hidden rounded-ultra shadow-lg mt-up75">-->
    <!--                <div class="row no-gutters">-->

    <!--                    <div class="col-lg-6 bg-viridian-500 p-4 px-md-5">-->

    <!--                        <div data-height="20px"></div>-->

    <!--                        <div class="icon-info-1">-->
    <!--                            <a class="icon-info-link" href="#">-->
    <!--                                <div class="icon-element">-->
    <!--                                    <img src="assets/svg/upload/contact-icon-23.svg" alt="icon" class="img-fluid add-animate fast" data-animated="zoomIn" data-width="48px" data-height="48px">-->
    <!--                                </div>-->
    <!--                                <div class="icon-info-text text-white-50 pl-4">-->
    <!--                                    <h4 class="font-weight-700 text-white mb-1">Explore Our Projects</h4>-->
    <!--                                    <p class="mb-0">Cursus nunc commodo vestibulum iaculis</p>-->
    <!--                                </div>-->
    <!--                            </a>-->
    <!--                        </div>-->

    <!--                        <div data-height="19px"></div>-->

    <!--                    </div>-->
    
    <!--                    <div class="col-lg-6 bg-white p-4 px-md-5">-->

    <!--                        <div data-height="20px"></div>-->

    <!--                        <div class="icon-info-1">-->
    <!--                            <a class="icon-info-link" href="#">-->
    <!--                                <div class="icon-element">-->
    <!--                                    <img src="assets/svg/upload/contact-icon-24.svg" alt="icon" class="img-fluid add-animate fast" data-animated="zoomIn" data-width="48px" data-height="48px">-->
    <!--                                </div>-->
    <!--                                <div class="icon-info-text pl-4">-->
    <!--                                    <h4 class="font-weight-700 mb-1">Request a Free Quote</h4>-->
    <!--                                    <p class="mb-0">Nunc tincidunt dolor cursus orci maximus</p>-->
    <!--                                </div>-->
    <!--                            </a>-->
    <!--                        </div>-->

    <!--                        <div data-height="19px"></div>-->

    <!--                    </div>-->

    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->

    <!--        <div data-height="40px"></div>-->

    <!--        <div class="row my-5">-->
    <!--            <div class="col-md-10 offset-md-1 col-lg-8 offset-lg-2">-->
    <!--                <div class="text-center py-4">-->

    <!--                    <h2 class="h1 section-title-3 title-light-1 font-weight-800">Skills Expertise</h2>-->

    <!--                    <div class="lead-sm text-white-75 pt-2">-->
    <!--                        Vestibulum convallis arcui molestie neca massa scelerisque iuspendisse neque rhoncus condimentum consequat molestie arcu viverra erat aliquam odio efficitur-->
    <!--                    </div>-->

    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->

    <!--        <div class="row mb-4">-->

    <!--            <div class="col-md-6 col-lg-3">-->
    <!--                <div class="circle-progress mb-5 px-5 px-lg-0 px-xl-4">-->
    <!--                    <div class="circle-progress-inner progress-light-1 trigger-progress" data-value="0.75" data-fill="{&quot;color&quot;: &quot; #2196f3 &quot;}">-->
    <!--                        <span></span>-->
    <!--                        <div class="circle-progress-label">Graphic Design</div>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->

    <!--            <div class="col-md-6 col-lg-3">-->
    <!--                <div class="circle-progress mb-5 px-5 px-lg-0 px-xl-4">-->
    <!--                    <div class="circle-progress-inner progress-light-1 trigger-progress" data-value="0.8" data-fill="{&quot;color&quot;: &quot; #2196f3 &quot;}">-->
    <!--                        <span></span>-->
    <!--                        <div class="circle-progress-label">Web Design</div>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->

    <!--            <div class="col-md-6 col-lg-3">-->
    <!--                <div class="circle-progress mb-5 px-5 px-lg-0 px-xl-4">-->
    <!--                    <div class="circle-progress-inner progress-light-1 trigger-progress" data-value="0.7" data-fill="{&quot;color&quot;: &quot; #2196f3 &quot;}">-->
    <!--                        <span></span>-->
    <!--                        <div class="circle-progress-label">Multimedia</div>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->

    <!--            <div class="col-md-6 col-lg-3">-->
    <!--                <div class="circle-progress mb-5 px-5 px-lg-0 px-xl-4">-->
    <!--                    <div class="circle-progress-inner progress-light-1 trigger-progress" data-value="0.85" data-fill="{&quot;color&quot;: &quot; #2196f3 &quot;}">-->
    <!--                        <span></span>-->
    <!--                        <div class="circle-progress-label">Online Marketing</div>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->

    <!--        </div>-->

    <!--    </div>-->
    <!--</div>-->

    <!-- Portfolio section -->
    <div class="section">

        <!--<div class="container">-->

        <!--    <div class="row my-5">-->
        <!--        <div class="col-md-10 offset-md-1 col-lg-8 offset-lg-2">-->
        <!--            <div class="text-center mt-3 mb-4">-->

        <!--                <h5 class="font-weight-400 mb-3">Drive More Customers</h5>-->

        <!--                <h2 class="h1 section-title-3 font-weight-800">Get Your Project Done</h2>-->

        <!--                <div class="lead-sm pt-2">-->
        <!--                    Mauris pulvinar metus sem nibh iaculis sem congue lacus ultrices nec vestibulum consequa scelerisque quis interdum nec tincidunt amet luctus blandit amet molestie-->
        <!--                </div>-->

        <!--            </div>-->
        <!--        </div>-->
        <!--    </div>-->

        <!--    <div class="row pb-4 mb-5">-->
        <!--        <div class="col-lg-10 offset-lg-1">-->
        <!--            <div class="text-center">-->
        <!--                <img src="assets/images/upload/benefits-graphic.png" alt="image" class="img-fluid add-animate" data-animated="fadeIn">-->
        <!--            </div>-->
        <!--        </div>-->
        <!--    </div>-->

        <!--</div>-->

        <?php include("includes/plans.php"); ?>

    </div>

    <!-- Pricing and plans section -->
    <!--<div class="section">-->
    <!--    <div class="container">-->

    <!--        <div class="row mt-4 mb-5 my-md-5">-->
    <!--            <div class="col-md-10 offset-md-1 col-lg-8 offset-lg-2">-->
    <!--                <div class="text-center mt-3 mb-4">-->

    <!--                    <h5 class="font-weight-400 mb-3">Let's Start Your Project</h5>-->

    <!--                    <h2 class="h1 section-title-3 font-weight-800">Choose Pricing Plan</h2>-->

    <!--                    <div class="lead-sm pt-2">-->
    <!--                        Pellentesque et justo purus donec eget est commodo suscipit est tempor blandit nulla enim vulputate in varius tincidunt ut massa magna rhoncus et orci eget lacinia mattis-->
    <!--                    </div>-->

    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->

    <!--        <div class="row mb-5">-->

    <!--            <div class="col-md-8 offset-md-2 col-lg-4 offset-lg-0">-->
    <!--                <div class="card card-price-table border-0 shadow-lg rounded-ultra text-center add-animate" data-animated="fadeInLeft">-->
    <!--                    <div class="card-body">-->
    <!--                        <div class="card-price d-flex justify-content-center mt-3">-->
    <!--                            <div class="currency align-self-start">$</div>-->
    <!--                            <div class="price text-primary">359</div>-->
    <!--                            <div class="term align-self-end">/ year</div>-->
    <!--                        </div>-->
    <!--                        <h5 class="card-price-title text-uppercase"><i class="fas fa-paper-plane text-primary"></i>Standard</h5>-->
    <!--                        <ul class="card-price-list">-->
    <!--                            <li>Lorem ipsum dolor</li>-->
    <!--                            <li>Aliquam ullamcorper</li>-->
    <!--                            <li>Maecenas rutrum nunc</li>-->
    <!--                            <li>Vestibulum porta</li>-->
    <!--                            <li>Morbi nunc pretium</li>-->
    <!--                        </ul>-->
    <!--                        <a href="#" role="button" class="btn btn-primary btn-lg btn-round mb-4">Get a Quote</a>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->

    <!--            <div class="col-md-8 offset-md-2 col-lg-4 offset-lg-0">-->
    <!--                <div class="card card-price-table border-0 shadow-lg rounded-ultra text-center text-white-75 bg-indigo add-animate" data-animated="fadeInUp">-->
    <!--                    <div class="card-body">-->
    <!--                        <div class="card-price d-flex justify-content-center mt-3">-->
    <!--                            <div class="currency align-self-start text-white-75">$</div>-->
    <!--                            <div class="price text-white">759</div>-->
    <!--                            <div class="term align-self-end">/ year</div>-->
    <!--                        </div>-->
    <!--                        <h5 class="card-price-title text-uppercase text-white"><i class="fas fa-rocket text-white"></i>Premium</h5>-->
    <!--                        <ul class="card-price-list">-->
    <!--                            <li>Lorem ipsum dolor</li>-->
    <!--                            <li>Aliquam ullamcorper</li>-->
    <!--                            <li>Maecenas rutrum nunc</li>-->
    <!--                            <li>Vestibulum porta</li>-->
    <!--                            <li>Morbi nunc pretium</li>-->
    <!--                        </ul>-->
    <!--                        <a href="#" role="button" class="btn btn-secondary btn-lg btn-round btn-gray-shadow mb-4">Get a Quote</a>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->

    <!--            <div class="col-md-8 offset-md-2 col-lg-4 offset-lg-0">-->
    <!--                <div class="card card-price-table border-0 shadow-lg rounded-ultra text-center add-animate" data-animated="fadeInRight">-->
    <!--                    <div class="card-body">-->
    <!--                        <div class="card-price d-flex justify-content-center mt-3">-->
    <!--                            <div class="currency align-self-start">$</div>-->
    <!--                            <div class="price text-primary">979</div>-->
    <!--                            <div class="term align-self-end">/ year</div>-->
    <!--                        </div>-->
    <!--                        <h5 class="card-price-title text-uppercase"><i class="fas fa-gem text-primary"></i>Diamond</h5>-->
    <!--                        <ul class="card-price-list">-->
    <!--                            <li>Lorem ipsum dolor</li>-->
    <!--                            <li>Aliquam ullamcorper</li>-->
    <!--                            <li>Maecenas rutrum nunc</li>-->
    <!--                            <li>Vestibulum porta</li>-->
    <!--                            <li>Morbi nunc pretium</li>-->
    <!--                        </ul>-->
    <!--                        <a href="#" role="button" class="btn btn-primary btn-lg btn-round mb-4">Get a Quote</a>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->

    <!--        </div>-->

    <!--    </div>-->
    <!--</div>-->

    <!-- Testimonials section -->
    <!-- <div class="section pt-5">
        <div class="container">
            <div class="row">
                
                <div class="col-lg-8 offset-lg-2 col-xl-6 offset-xl-0 align-self-end order-2 order-xl-1">
                    <div class="text-center px-md-5">
                        <div class="px-3">
                            <img src="assets/images/upload/testimonial-thumb-up.png" alt="image" class="img-fluid add-animate" data-animated="fadeIn">
                        </div>
                    </div>
                </div>

                <div class="col-lg-10 offset-lg-1 col-xl-6 offset-xl-0 align-self-center order-1 order-xl-2">
                    <div class="pb-4 pb-md-5 mb-xl-5">

                        <div class="text-center text-xl-left">
                            <h5 class="font-weight-400 mb-3">Satisfied Customers</h5>
                            <h2 class="h1 font-weight-800 mb-4">What Clients Say</h2>
                        </div>

                        <div class="carousel-component mb-5 mb-xl-4" data-carousel-gutter="30" data-autoplay="true" data-dots="true" data-nav="false" data-carousel-col="1" data-carousel-col-sm="1" data-carousel-col-md="1" data-carousel-col-lg="1" data-carousel-col-xl="1">
                            <div class="carousel-component-inner owl-carousel owl-theme">
                            
                                <div class="carousel-component-item">

                                    <div class="py-2"></div>

                                    <div class="testimonial-2 my-5">
                                        <div class="testimonial-image">
                                            <figure>
                                                <img class="img-fluid" src="assets/images/upload/testimonial-thumbnail-1.jpg" alt="testimonial">
                                            </figure>
                                        </div>
                                        <div class="testimonial-details">
                                            <div class="font-italic">
                                                <p>Condimetum tricies enim adipiscing neque at rutrum duis imperdiet neca tristique suspendise mattis.</p>
                                            </div>
                                            <div class="tesimonial-name">
                                                Bruce Romero
                                            </div>
                                        </div>
                                    </div>

                                    <div class="py-2"></div>

                                </div>
        
                                <div class="carousel-component-item">

                                    <div class="py-2"></div>

                                    <div class="testimonial-2 my-5">
                                        <div class="testimonial-image">
                                            <figure>
                                                <img class="img-fluid" src="assets/images/upload/testimonial-thumbnail-2.jpg" alt="testimonial">
                                            </figure>
                                        </div>
                                        <div class="testimonial-details">
                                            <div class="font-italic">
                                                <p>Nullam lectus neque, imperdiet fringilla purus mattis consequat mauris curabitur neca pellentesque.</p>
                                            </div>
                                            <div class="tesimonial-name">
                                                Dionne Brown
                                            </div>
                                        </div>
                                    </div>

                                    <div class="py-2"></div>

                                </div>

                                <div class="carousel-component-item">
                                    <div class="py-2"></div>
                                    <div class="testimonial-2 my-5">
                                        <div class="testimonial-image">
                                            <figure>
                                                <img class="img-fluid" src="assets/images/upload/testimonial-thumbnail-3.jpg" alt="testimonial">
                                            </figure>
                                        </div>
                                        <div class="testimonial-details">
                                            <div class="font-italic">
                                                <p>Cras lectus lacus, tristique at vestibulum nec cursus integer purus nec arcu elit porta varius donec.</p>
                                            </div>
                                            <div class="tesimonial-name">
                                                Daniel Jones
                                            </div>
                                        </div>
                                    </div>

                                    <div class="py-2"></div>

                                </div>
        
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div> -->

    <div class="bg-indigo">

        <!-- Subscribe section -->
        <!-- <div class="section">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="bg-white rounded-ultra shadow-lg px-4 py-5 p-md-5 mt-up100">
                            <div class="row my-4">
                                <div class="col-lg-10 offset-lg-1 col-xl-8 offset-xl-2">
                                    <div class="text-center">
    
                                        <h2 class="h1 font-weight-800">Subscribe to Our Newsletter</h2>
            
                                        <div class="lead-sm mb-5">
                                            Mauris porttitor neque massa aliquam laoreet diam ipsum rutrum
                                        </div>
    
                                        <div class="row">
                                            <div class="col-lg-10 offset-lg-1">
                                                <form class="px-md-4 mb-1">
                                                    <div class="input-group input-group-lg input-group-round">
                                                        <div class="input-group-inner">
                                                            <input type="email" class="form-control form-control-lg" placeholder="Your email address">
                                                            <div class="input-group-append">
                                                                <button class="btn btn-lg btn-round btn-primary mb-0" type="button">Subscribe Now</button>
                                                            </div>
                                                            <div class="input-focus-bg"></div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
            
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->

        <!-- Brand section -->
        <!--<div class="section">-->
        <!--    <div class="container">-->
        <!--        <div class="row align-items-center py-5">-->
        <!--            <div class="col-6 col-md-4 col-lg-2">-->
        <!--                <div class="text-center px-2">-->
        <!--                    <img class="img-fluid" src="assets/svg/upload/brand-logo-white-01.svg" alt="brand">-->
        <!--                </div>-->
        <!--            </div>-->
        <!--            <div class="col-6 col-md-4 col-lg-2">-->
        <!--                <div class="text-center px-2">-->
        <!--                    <img class="img-fluid" src="assets/svg/upload/brand-logo-white-02.svg" alt="brand">-->
        <!--                </div>-->
        <!--            </div>-->
        <!--            <div class="col-6 col-md-4 col-lg-2">-->
        <!--                <div class="text-center px-2">-->
        <!--                    <img class="img-fluid" src="assets/svg/upload/brand-logo-white-03.svg" alt="brand">-->
        <!--                </div>-->
        <!--            </div>-->
        <!--            <div class="col-6 col-md-4 col-lg-2">-->
        <!--                <div class="text-center px-2">-->
        <!--                    <img class="img-fluid" src="assets/svg/upload/brand-logo-white-04.svg" alt="brand">-->
        <!--                </div>-->
        <!--            </div>-->
        <!--            <div class="col-6 col-md-4 col-lg-2">-->
        <!--                <div class="text-center px-2">-->
        <!--                    <img class="img-fluid" src="assets/svg/upload/brand-logo-white-05.svg" alt="brand">-->
        <!--                </div>-->
        <!--            </div>-->
        <!--            <div class="col-6 col-md-4 col-lg-2">-->
        <!--                <div class="text-center px-2">-->
        <!--                    <img class="img-fluid" src="assets/svg/upload/brand-logo-white-06.svg" alt="brand">-->
        <!--                </div>-->
        <!--            </div>-->
        <!--        </div>-->
        <!--    </div>-->
        <!--</div>-->

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
        //if ($(".esim").is(":checked")) {
        //if($(".esim").prop('checked') == true){
        if ($(this).is(':checked')) {
            var id  = $(this).attr("id");
            var val = $(this).val();
            
            var usd = $(".usd"+val).val();
            var act = $(".activation"+val).val();
            var eamt = $(".esim-amt"+val).val();

            //var v = $(".total"+val).val("15");
            //$(".display-esim"+val).css("display", "none !important");
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

            //var v = $(".total"+val).val("15");
            //$(".display-esim"+val).css("display", "none !important");
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
                $('#buybutton_'+val).attr("onclick","sendDetails("+val+")");
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
                $('#buybutton_'+val).attr("onclick","sendDetails("+val+")");
            }
        } else {
            var val = $(this).val();
            $('.buy-now'+val).prop('disabled',true);
            $(val).removeAttr("onclick");
        }
    });

});

$(".buybutton").click(function() {
  sendDetails(this.id);
});

function sendDetails(planId) {
    var esim = 0;
    if ($('#esim'+planId).is(":checked")) {
        var esim = 1;
    }
    var totalamount = $('#totalValue_'+planId).val();
    window.location.replace("pay_now.php?direct="+planId+"&esim="+esim+"&charge="+totalamount);
}
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