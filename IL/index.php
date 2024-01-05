<?php 
session_start();
include("includes/config.php"); ?>
<!DOCTYPE html>
<html lang="en" >
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
   
   
    <!-- new css link start -->
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- new css link end  -->


   
   <style>
h2.h1.section-title-3.font-weight-700.of_con {
    font-size: 1.5rem;
}
        /* slider */
        
        .banner-slides-wrapper:after {
    position: absolute !important;
    content: url(https://dev.mysimaccess.com/assets/images/banner/Header%20design.svg);
    bottom: -10px;
    left: -5px;
    right: -5px;
    z-index: 11;
}
.banner-slides-wrapper.arrow-nav-overflow {
    position: relative !important;
    height: 650px !important;
}
.carousel-nav-lg .carousel-control-next-icon, .carousel-nav-lg .carousel-control-prev-icon {
    width: 50px !important;
    background-color: #fff !important;
    border-radius: 60px;
    border: 3px solid white;
    height: 50px !important;
    box-shadow: 3px 3px 10px #00000063;
    top: 40%;
    position: absolute;
}
a.btn.btn-lg.btn-round.btn-primary.btn-gray-shadow.mx-2.ml-lg-0 i {
    margin-left: 10px;
}
.pl li i {
    margin-left: 10px;
}
.carousel-control-next-icon, .carousel-control-prev-icon {
    background-size: 24px !important;
}
.bn-block {
    background: linear-gradient(280deg, #000000b0, transparent) !important;
}
h4.display-5.mb-0.slide-animate.head-bn.animated.fadeInLeft{
    font-size: 40px !important;
    font-weight: 900 !important;
    color: #white !important;
    padding: 25px;
    margin: 21px 0 !important;
}
h4.display-5.slide-animate.sub-head-bn.animated.fadeInRight {
    color: #white !important;
    font-weight: 400 !important;
    padding: 0 25px;
}
.banner-slides-container .owl-dots{
    bottom: 190px !important;
}
.carousel-nav-lg .carousel-control-next-icon, .carousel-nav-lg .carousel-control-prev-icon {
    background-color: transparent !important;
}
.card-pl .col-md-3 {
    flex: 0 0 31%;
    max-width: 31%;
}   
        
        
        
        
        /* end */
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

/* rtl start  */

.navik-header-container{
    display:flex;
    align-items: center;
    /* flex-direction: row-reverse; */
    justify-content: space-between;
}
/* .topcorner {
    top: 15px;
    left: 50px;
} */
.shoppingbasket {
    width: 40px;
    height: 40px;
    background-color: #fff;
    /* position: absolute; */
    top: 10px;
}
nav.navik-menu ul {
    direction: rtl;
}
.container-fluid.d-none1 .row{
    justify-content: right;
}
.text-block{
    right: 0;
}
h4.display-5.mb-0.slide-animate.head-bn.animated.fadeInLeft {
    text-align: right;
}
.bn-block {
    background: linear-gradient(250deg, #000000b0, transparent) !important;
    text-align: right;
}
h4.display-5.slide-animate.sub-head-bn.animated.fadeInRight {
    text-align: right;
}
.col-xl-12 .row {
    direction: rtl;
}
#plans .row{
    direction: ltr;
}
a.btn.btn-lg.btn-round.btn-primary.btn-gray-shadow.mx-2.ml-lg-0 {
    direction: rtl;
}
.z_n_p {
    text-align: right !important;
}
.pl li {
    text-align: right !important;
}
.starting_price{
    text-align: right !important;
    padding: 0 !important;
    margin-right: 10px !important;
}
/* .footer-bottom-container {
    direction: rtl;
} */
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
 
@media screen and (min-width: 1280px) { 
    .text-world{ padding-top:7px !important;width:35%; }
    .navik-header .burger-menu {
    left: 70px !important;
}
nav.navik-menu ul {
    direction: rtl;
    text-align: right;
}
.navik-header-container {
    display: flex;
    align-items: center;
    /* flex-direction: row-reverse; */
    justify-content: space-between;
}
.body-fixed-sidebar, .navik-header, .navik-header-overlay{
        padding: 0 !important;
    }
}
@media(max-width: 1199px){
    .text-block {
    margin-right: 30px;
    right:0 !important;
}
.banner-slides-container .owl-dots {
    bottom: 0 !important;
}
.section.card-pl .col-md-3 {
    flex: 0 0 28.33% !important;
    max-width: 28.33% !important;
}
.navik-menu {
    background-color: #fff;
    position: absolute;
    z-index: 1;
    width: 100%;
    left: 0;
    top: 0;
}
/* .topcorner {
    left: 0;
} */
.navik-header .burger-menu {
    left: 20px !important;
}
}
@media(max-width: 991px){
    .section.card-pl .col-md-3 {
    flex: 0 0 27.33% !important;
    max-width: 27.33% !important;
}
.d-none1{
    display: block;
}
.text-block {
    margin-right: 20px;
}
h4.display-5.mb-0.slide-animate.head-bn.animated.fadeInLeft {
    font-size: 23px !important;
    padding: 5px;
    margin: -5px 0 !important;
}
.col-lg-6.text-center.text-lg-left.mb-2.mb-lg-0 {
    justify-content: center;
}
.col-lg-6.text-center.text-lg-right {
    justify-content: center;
}
}
@media(max-width: 575px){
    .section.card-pl .col-md-3 {
    flex: 0 0 100% !important;
    max-width: 100% !important;
}
.col-lg-6.text-center.text-lg-left.mb-2.mb-lg-0{
        justify-content: center !important;
    }
    .footer-bottom-container .row{
        margin: 0 !important;
    }
 
.container-fluid.d-none1 h4 br{
    display: none;
}
h4.display-5.slide-animate.sub-head-bn.animated.fadeInRight {
    padding: 0;
}
}
@media(max-width: 1280px){
        .navik-menu {
    background-color: #fff !important;
    position: absolute !important;
    z-index: 1 !important;
    width: 100%;
    left: 0;
    top: 0;
}
/* .topcorner {
    top: 0 !important;
    left: 100px;
} */
nav.navik-menu ul {
    direction: rtl;
    padding-top: 70px;
}
.body-fixed-sidebar, .navik-header, .navik-header-overlay{
        padding: 0 !important;
    }
.navik-header .logo img {
    width: 150px;
}
        .navik-header .burger-menu {
    left: 30px !important;
    z-index: 2;
    top: 15px;
}
.navik-header-container {
    justify-content: stretch;
}
    }
/* rtl end  */


/* should know section start */


.block_what_should {
    background: white;
    margin: 10px;
    padding: 13px;
    border-radius: 10px;
    /* border-style: double; */
    border-color: green;
    border: 1px solid green;
    height: 310px;
}
.sub_tex_what_should.text-left {
    font-family: 'Arial';
}
.ic_what_should i {
    font-size: 36px;
    margin: 12px 0;
    font-family: "FontAwesome";
    color: #212529;
}
.ti_wh h3 {
    margin: 10px 0 10px 10px;
    font-family: 'Arial';
    font-weight: 500;
    text-align:right;
}
.title_what_should.text-left {
    font-size: 20px;
    font-weight: 500;
    margin: 10px 0;
    color: #212529;
    font-family: 'Arial';
}
.sub_tex_what_should.text-left {
    font-family: 'Arial';
    font-size: 16px;
    color: #212529;
}
.should-know .col-lg-3{
    padding: 0;
}
/* .topcorner {
    top: 15px;
    left: 125px !important;
} */
.navik-header-container{
    padding-right: 0 !important;
}
.navik-header.sticky .logo{
    padding: 0 !important;
}
.card-pl .col-md-3{
    margin: 0 auto !important:
}
 
@media(min-width: 768px){
    .col-md-3{
        margin: 0 auto !important;
    }
}
@media(min-width: 1280px){
    .container.should-know{
        max-width: 1305px;
    }
    /* .faq-section .container{
    max-width: 1339px;
} */
}
/* @media(min-width: 1600px){
    .container.should-know {
    max-width: 1452px;
}
.faq-section .container{
    max-width: 1452px;
}
} */
@media(min-width:1400px){
    .container-fluid {
    max-width: 1340px;
    padding: 0 !important;
    margin: 0 auto;
}
    .footer-bottom .container-fluid{
        max-width: 1274px;
    }
    .navik-menu{
        float:left !important;
    }
}
@media(max-width: 1199px){
    .block_what_should {
    height: 360px;
}
.navik-header-container{
    justify-content: stretch !important;
} 
.sub_tex_what_should.text-left a {
    font-size: 14px;
}
.banner-slides-container .owl-dots{
    bottom: 0 !important;
}
.section.card-pl .col-md-3 {
    flex: 0 0 33% !important;
    max-width: 33% !important;
    margin: 0 !important;
}
.z_n_p {
    font-size: 19px !important;
}
}    
.container.should-know{
    max-width: 1260px;
}
@media(max-width: 991px){
    .section.card-pl .col-md-3 {
    flex: 0 0 33% !important;
    max-width: 33% !important;
}
.navik-header .logo img {
    width: 200px !important;
}
.block_what_should {
    height: 300px;
}
#eSim{
    padding-bottom: 0 !important;
}
}
@media(max-width: 575px){
    .block_what_should {
    height: auto;
}
.section.card-pl .col-md-3 {
    flex: 0 0 100% !important;
    max-width: 100% !important;
}
}
.text-block{
    right: 75px;
}

/* should know section end */



/* new css start  */

.banner-slides-wrapper:after {
    position: absolute !important;
    content: url(https://dev.mysimaccess.com/assets/images/banner/Header%20design.svg);
    bottom: -10px !important;
    left: -5px;
    right: -5px;
    z-index: 11;
}
.container{
    max-width:1400px;
}

.carousel-control-next-icon, .carousel-control-prev-icon {
    background-size: 24px !important;
}
.carousel-nav-lg .carousel-control-next-icon, .carousel-nav-lg .carousel-control-prev-icon {
    background-color: transparent !important;
}
.bn-block {
    background: linear-gradient(91deg, #000000b0, transparent) !important;
}
h4.display-5.mb-0.slide-animate.head-bn.animated.fadeInLeft{
    font-size: 40px !important;
    font-weight: 900 !important;
    color: #white !important;
    padding: 25px;
    margin: 21px 0 !important;
}
h4.display-5.slide-animate.sub-head-bn.animated.fadeInRight {
    color: #white !important;
    font-weight: 400 !important;
    padding: 0 25px;
}
.banner-slides-container .owl-dots{
    bottom: 100px !important;
}
a.btn.btn-primary.recharge-btn{
    z-index: 1;
}
.card-pl .col-md-3 {
    padding-left: 5px !important;
    padding-right: 5px !important;
}
.page-header-block-height {
    min-height: 600px !important;
}
a.btn.btn-primary.recharge-btn {
    left: -15px !important;
}


/* should know section start */


.block_what_should {
    background: white;
    margin: 10px;
    padding: 13px;
    border-radius: 10px;
    /* border-style: double; */
    border-color: green;
    border: 1px solid green;
    height: 310px;
}
.sub_tex_what_should.text-left {
    font-family: 'Arial';
}
.ic_what_should i {
    font-size: 36px;
    margin: 12px 0;
    font-family: "FontAwesome";
    color: #212529;
}
.ti_wh h3 {
    margin: 10px 0 10px 10px;
    font-family: 'Arial';
    font-weight: 500;
}
.title_what_should.text-left {
    font-size: 20px;
    font-weight: 500;
    margin: 10px 0;
    color: #212529;
    font-family: 'Arial';
}
.sub_tex_what_should.text-left {
    font-family: 'Arial';
    font-size: 16px;
    color: #212529;
}
.should-know .col-lg-3{
    padding: 0;
}

/* .topcorner {
    top: 15px;
    right: 0 !important;
} */
@media(min-width: 1280px){
    /* .container.should-know{
        max-width: 1300px;
    } */
    
}
/* @media(min-width: 1600px){
    .container-fluid.banner-container{
        max-width: 1452px;
    }
    .container.should-know {
    max-width: 1452px;
    padding-right: 30px;
}
.faq-section .container{
    max-width: 1500px !important;
    padding-right: 30px;
}
.footer-bottom .container-fluid {
    max-width: 1410px !important;
    padding: 0;
}

} */
@media(max-width: 1440px){
    .navik-header .logo img {
    padding-left: 0;
}
.footer-bottom .container-fluid {
    padding: 0 !important;
}
a.btn.btn-primary.recharge-btn {
    left: 30px !important;
}
/* .topcorner{
    right: 40px !important;
} */
}
 
@media(max-width: 1199px){
    h4.display-5.mb-0.slide-animate.head-bn.animated.fadeInLeft {
    font-size: 23px !important;
}
.page-header-block-height {
    min-height: 500px !important;
}
    .navik-header .burger-menu {
    right: -12px !important;
}
    .banner-slides-wrapper:after {
        display: none;
    }
    a.btn.btn-primary.recharge-btn {
    left: 0 !important;
}
    .block_what_should {
    height: 360px;
}

.text-block {
    position: relative !important;
    left: -40px !important;
}
.text-world.logo.text-right.tagline-slogen {
    width: 40% !important;
}
.navik-header .logo {
    padding-top: 15px !important;
}
.sub_tex_what_should.text-left a {
    font-size: 14px;
}
.banner-slides-container .owl-dots{
    bottom: 0 !important;
}
.section.card-pl .col-md-3 {
    flex: 0 0 33% !important;
    max-width: 33% !important;
    margin: 0 !important;
}
.z_n_p {
    font-size: 19px !important;
}
.logo a {
    padding-left: 0;
}
}    

@media(max-width: 991px){
    .page-header-block-height.d-flex.align-items-center.bg-image {
    background-size: cover;
    background-repeat: no-repeat;
    height: 600px !important;
    width: 100%;
    overflow: hidden;
}
    a.btn.btn-primary.recharge-btn {
    left: 25px !important;
}
    .section.card-pl .col-md-3 {
    flex: 0 0 33% !important;
    max-width: 33% !important;
}
.d-none1{
    display: block !important;
}
.navik-header .logo img {
    width: 200px !important;
}
.block_what_should {
    height: 300px;
}
#eSim{
    padding-bottom: 0 !important;
}
.banner-container {
    padding: 0 24px 0 24px !important;
}
}
@media(max-width: 575px){
    a.btn.btn-primary.recharge-btn {
    left: 50% !important;
    transform: translateX(-50%);
}
    .block_what_should {
    height: auto;
}
.section.card-pl .col-md-3 {
    flex: 0 0 100% !important;
    max-width: 100% !important;
}
h4.display-5.mb-0.slide-animate.head-bn.animated.fadeInLeft {
    font-size: 20px !important;
    padding: 5px 20px;
    margin: 0 !important;
}
a.btn.btn-lg.btn-round.btn-primary.btn-gray-shadow.mx-2.ml-lg-0 {
    margin-left: 20px !important;
    padding: 5px;
}
.page-header-block-height.d-flex.align-items-center.bg-image {
    background-size: cover;
    background-repeat: no-repeat;
    height: 400px !important;
    width: 100%;
    overflow: hidden;
}
.banner-slides-wrapper:after {
    position: absolute !important;
    content: url(https://dev.mysimaccess.com/assets/images/banner/Header%20design.svg);
    bottom: -34px;
    left: -5px;
    right: -5px;
    z-index: 11;
    display: none;
}
a.btn.btn-primary.recharge-btn {
    position: absolute !important;
    top: 50% !important;
    left: 50% !important;
    transform: translateX(-50%);
    padding: 5px 30px;
}
.logo a {
    padding-left: 0;
}
}
.container-fluid.px-5 {
    padding: 0 12px !important;
}
.banner-container {
    padding: 0 15px 0 15px !important;
}
.accordion-title{color:#000}
       .accordion .card .card-header{ 
		background-color: transparent;
		height:auto;
    background-color:transparent;
    border: 1px solid #d5e7ff;
    transition: 0.5s;
    position: relative;
	 }
     .accordion .card .card-header .right-icon{
        position: absolute;
        top:50%;
        transform: translateY(-50%);
        left: 15px;
     }
	 .accordion .card .card-header:hover{
    padding-left: 2.5625rem;
}
.box {
        /* width: 200px; */
        height: 100px;
        border: 1px solid #ccc;
        display: flex;
        justify-content: center;
        align-items: center;
        /* margin: 10px; */
        text-decoration: none;
    color: #000;
    border-radius: 4px;
    transition: 0.4s;
    }
    .box:hover {
      background-color: rgb(246, 246, 246);
    color: #000;

    }
    .box:focus {
      background-color: #eefff5;
      border: 1px solid #48EC86;
    }
    .modal-body {
        height: 60vh;
        overflow-y: auto;
    }
    .plans-recommended{
        width: 98%;
        margin: 0 auto;
    }
    .plans-recommended h3{
        background-color: #143cb6;
        text-align: center;
        color: #fff;
        padding: 4px 0;
        width: 100%;
    }

/* should know section end */
        
        
        
        
        /* end */
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
@media(min-width:1400px){
    /* .container-fluid{
        max-width: 1400px;
        padding: 0 !important;
        margin: 0 auto;
    } */
    .banner-slides-wrapper:after {
    bottom: -72%;
}
    /* .footer-bottom .container-fluid{
        max-width: 1390px !important;
        padding: 0 !important;
    } */
    .navik-menu{
        float:left !important;
    }
    /* div#eSim{
        max-width: 1404px !important;
    } */
}
.navik-header .logo img {
    padding-left: 0 !important;
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

.quick-recharge{
    padding: 50px 0;
}
.quick-recharge-content {
    width: 345px;
    max-width: 100%;
}
.recharge-btn{
    margin-top: 20px;
    width: 100%;
}

h3.quick-recharge-title {
    text-align: center;
    margin-bottom: 25px;
    color:#000;
}


@media(max-width: 1199px){
    .quick-recharge {
    padding: 30px 0 0;
}
}
.select-languages {
        height: 100px;
        width: 120px;
        border: 1px solid #ccc;
        display: flex;
        justify-content: center;
        align-items: center;
        text-decoration: none;
        color: #000;
        border-radius: 4px;
        transition: 0.4s;
        margin-bottom: 20px;
    }

    .select-languages:hover {
        background-color: rgb(246, 246, 246);
        color: #000;

    }

    .select-languages:focus {
        background-color: #eefff5;
        border: 1px solid #48EC86;
    }

    .modal-body {
        height: 60vh;
        overflow-y: auto;
    }
    .navbar-brand{
        z-index: 1;
    }
    .navbar-brand img{
        height: auto;
        width: 150px;
    }
    @font-face {
font-family: SnellBT-Regular;
src: url('assets/SnellBT-Regular.otf');
}
.tagline {
font-family: SnellBT-Regular;
font-size:11pt;
}
.tagline2 {

font-family: calibri light;
font-size:14pt;
}
.navbar-expand-lg .nav-item {
    margin-right: 0 !important;
}
.navbar-expand-lg .navbar-nav .nav-link {
    padding-right: 8px !important;
    padding-left: 8px !important;
}
.navbar{
    width: 100%;
    z-index: 5 !important;
}
.navik-menu.submenu-scale li:hover > ul {
    z-index: 2;
}
.nav-link{
    color: #000 !important;
}
.topcorner {
    position: absolute;
    top: 50%;
    right: 0%;
    transform: translateY(-50%);
    z-index: 1;
}
.shoppingbasket div img{
    height: 100%;
    width: 100%;
}
.navbar-toggler-icons{
    height: 3px;
    width: 25px;
    display: block;
    background-color: #000;
    margin-bottom: 5px;
    border-radius: 10px;
}
.navbar-toggler {
    position: relative;
    z-index: 10;
    transition: .3s all ease-in-out;
}
.navbar-toggler:focus{
    outline: 0;
    box-shadow: none;
}
.nav-link{
    position: relative;
}
@media(max-width: 1280px){
    nav.navik-menu ul {
    direction: rtl;
    padding-top: 0;
    width: 100%;
    left: 0;
    position: relative!important;
    top: 0;
    background-color: #fff;
}
.tagline-slogen{
        display: none;
    }
    .navbar-expand-lg .navbar-nav .dropdown-menu {
    position: absolute;
    left: 59% !important;
}
}

@media(min-width: 992px){
    .navbar-expand-lg .navbar-nav .dropdown-menu {
    position: absolute;
    left: 59% !important;
}
}
@media (max-width: 991px){
nav .navbar-nav {
   padding: 0 !important;
}
nav .navbar-nav {
    padding-top: 70px !important;
    position: fixed;
    top: 0;
    left: 0;
    background-color: #fff;
    width: 100%;
    padding-left: 20px !important;
    transition: .3s all ease-in-out;
}
.navbar-nav .nav-link {
    padding-top: 0.6875rem;
    padding-bottom: 0 !important;
    font-size: 0.875rem;
}
.nav-link{
    padding: 0 !important;
}
.navbar-expand-lg .navbar-nav .dropdown-menu {
    position: static;
}
.dropdown-toggle{
    justify-content: end ;
}
}
@media(max-width: 575px){
    .accordion .card .card-header {
    height: auto !important;
    }
    /* .navbar-toggler{
        margin-left: 140px;
    } */
}
.navbar-nav{
    direction: rtl;
}
h4.display-5.mb-0.slide-animate.head-bn.animated.fadeInLeft {
    font-size: 28px !important;
    padding: 20px;
    margin: 0 !important;
}
h4.display-5.slide-animate.sub-head-bn.animated.fadeInRight {
    padding: 0 25px;
    font-size: 25px;
}
.header .container{
    display: flex;
    align-items: center;
}
@media(max-width: 991px){
    .topcorner {
    left: 84%;
}
}
@media(max-width: 575px){
    .topcorner {
    left: 74%;
}
h4.display-5.mb-0.slide-animate.head-bn.animated.fadeInLeft {
    font-size: 18px !important;
    padding: 10px;
}
h4.display-5.slide-animate.sub-head-bn.animated.fadeInRight {
    padding: 0 10px;
    font-size: 19px;
}
}
@media(max-width: 400px){
    .topcorner {
    left: 70%;
}
}
.open-menu{
    overflow: hidden;
}
/* new css end  */









    </style>
</head>
<body>




<!-- header start  -->

<header class="header">
    <div class="container">
        <nav class="navbar navbar-expand-lg">
            <a class="navbar-brand" href="#">  
                 <img src="assets/logo.png" alt="logo"/> 
             </a>
             <a href="cart2">   
                <div class="topcorner">
                    <!-- id="cartpopup" onclick="togglePopup()" -->
                    <div class="shoppingbasket"> 
                        <div><img src="assets/images/sp.png" class="cart-img"></div>
                        <div class="basketitems" id="basketitems"><?php echo $totalrows;?></div>
                    </div>
                 </div>
            </a>
             <div class="logo text-center tagline-slogen" style="width:32%;">
               <!-- <span class="tagline">The World's Best </span><span class="tagline2"><i>eSIM</i></span> -->
               <span class="tagline"><font color="#133cb6">ה eSIM היחידי שכולל גם דאטא וגם מספר טלפון ושיחות

</font>
				 <!--  <font color="#76ad33">eSIM</font>-->
				 </span>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icons"></span>
                <span class="navbar-toggler-icons"></span>
                <span class="navbar-toggler-icons"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                <a class="nav-link" href="https://dev.mysimaccess.com/IL/index#eSim">חבילות</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="virtual-numbers">מספרים מחו"ל</a>
                </li>
				<li class="nav-item">
                <a class="nav-link" href="guide">מדריך</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="FAQ">FAQ</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="about-us">אודות</a>
                </li>
                <li class="nav-item">
                <?php if(isset($_SESSION['user']) && ($_SESSION['role']=="U") ){?>
                                <a href="#" class="nav-link dropdown-toggle"  id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"><?php echo $_SESSION['fname']; ?></a>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li><a href="orders" class="dropdown-item"><i class="fa fa-home"></i> My Orders</a></li>
                                    <li><a href="profile" class="dropdown-item"><i class="fa fa-user"></i> My Profile</a></li>
                                    <li><a href="logout" class="dropdown-item"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
                                </ul>
                                <?php } else{ ?>
                                <a class="nav-link" href="login">אזור אישי</a>
                                <?php } ?>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop1"> <i class="fa-solid fa-globe"></i></a>
                </li>
            </ul>
            </div>
        </nav>
    </div>
</header>


<!-- header end  -->


<!-- Button trigger modal -->

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
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

<!-- Banner slides -->
<div class="container">
<div class="banner-slides-wrapper arrow-nav-overflow" data-dots="true" data-nav="true" style="min-height:auto !important">


    <div class="banner-slides-container owl-carousel owl-theme owl-dot-light-1">

        <!-- Slide item -->
        <?php
        $select = mysqli_query($con, "select * from sliders where status='A'");
        while($row=mysqli_fetch_assoc($select)){
        ?>
        <div class="d-flex flex-column">
            
            <div class="page-header-block-height d-flex align-items-center bg-image" data-img-src="assets/images/upload/<?php echo $row['image']; ?>" >
                
                
                
                <div class="container-fluid d-none1">
                    
                       
                    <div class="row justify-content-right">
                        
                        <div class="col-lg-8 col-xl-6 text-center text-lg-left py-5">
                            <div class="px-md-5 pr-xl-0 py-5 overflow-hidden">
                                <div class="text-block bn-block<?php if($row['box']=="NO"){ echo 'd-none';} ?>">
                                <h4 class="display-5 mb-0 add-animate slide-animate head-bn" data-animated="fadeInLeft">
									<?php echo $row['first_title_il']; ?></h4>
                                <h4 class="display-5 add-animate slide-animate sub-head-bn" data-animated="fadeInRight"><?php echo $row['second_title_il']; ?></h4>
                                <h4 class="display-5 pb-3 add-animate slide-animate des-bn" data-animated="fadeInLeft"><?php echo $row['short_desc_il']; ?>
                                </h4>
                                <?php if($row['button']=="YES"){ ?>
                                <a href="<?php echo $row['btn_url']; ?>" class="btn btn-lg btn-round btn-primary btn-gray-shadow mx-2 ml-lg-0"><i class="fas fa-wallet"></i><?php echo $row['btn_title_il']; ?></a>
                                <?php } ?>
                                
                                </div>
                                
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
</div>
<!-- Content -->
<div class="main-content py-0">

    <div class="section"><?php include("includes/plans5.php"); ?></div>

    <div class="bg-indigo"></div>

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
$(document).ready(function(){
    $('.navbar-toggler').click(function(){
        $('body').toggleClass('open-menu');
    })
})
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