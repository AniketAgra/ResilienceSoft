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
    <link rel="stylesheet" href="assets/css/producto.css">
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


<div id="btn-menu-movil" class="icono-menu-movil"> <span></span> <span></span> <span></span> <span></span> </div>
      <div class="buscador-header">
        <div href="javascript:void(0);" id="btn-abrir-buscador"> </div>
      </div>
      <div class="carrito">
        <div> <img src="./view-source_https___esim.holafly.com_esim-usa__files/carritook.svg" class="carrito-img" alt="holafly" width="36" style="display: none;"> </div>
      </div>
      <div class="input-buscador-header oculto"> <span id="btn-cerrar-buscador" class="link cerrar-buscador">  </span> </div>
<!-- Content -->
<div class="product__content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-sm-6 col-xs-12">
            <div class="product__breadcrumb">
            <a href="" alt="Holafly">
                <img src="https://cdn-esimholafly2.pressidium.com/wp-content/themes/Holafly_v2-child/recursos/img/home.svg">
            </a>
            <img src="https://cdn-esimholafly2.pressidium.com/wp-content/themes/Holafly_v2-child/recursos/img/breadcrumb.svg">
                        <a href="">
                <span style="font-weight: 600">Destinations</span>
            </a>
            <img src="https://cdn-esimholafly2.pressidium.com/wp-content/themes/Holafly_v2-child/recursos/img/breadcrumb.svg">
            <span>USA</span>
        </div>
        </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
                  <div class="product__image-container product-img-desktop">
                    <div class="product__image-container"> <img src="https://cdn-esimholafly2.pressidium.com/wp-content/uploads/2020/05/esim-usa-1.jpg.webp" alt=""> <img class="product__img-wave" src="./view-source_https___esim.holafly.com_esim-usa__files/product-wave.svg" alt="">
                    </div>
                  </div>
                </div>
				
				
				
				<div class="col-md-8 col-sm-6 col-xs-12">
                  <div class="product__info">
                    <h1 class="product__country"> <span class="product__intro">International travel eSIM for </span> <span style="display: block;"> USA</span> </h1>
                    <div class="product__prices">
                      <p class="price"><span class="woocommerce-Price-amount amount">
                        <bdi><span class="woocommerce-Price-currencySymbol">$</span>19.00</bdi>
                        </span></p>
                    </div>
                    <div class="trustbox-holafly">
                      <!-- TrustBox widget - Micro Star -->
                      
                      <div id="tp-widget-wrapper" class="tp-widget-wrapper visible">
      <a href="#">
        <!-- Human Score -->
        <div id="trust-score" class="tp-widget-trustscore">Excellent</div>
        <!-- Stars -->
        <div id="tp-widget-stars" class="tp-widget-stars"><div class=""><div class="tp-stars tp-stars--4 tp-stars--4--half">
    <div style="position: relative; height: 0; width: 100%; padding: 0; padding-bottom: 18.326693227091635%;">
      
  <svg role="img" aria-labelledby="starRating" viewBox="0 0 251 46" xmlns="http://www.w3.org/2000/svg" style="position: absolute; height: 100%; width: 100%; left: 0; top: 0;">
      <title id="starRating" lang="en">4.5 out of five star rating on Trustpilot</title>
      <g class="tp-star">
          <path class="tp-star__canvas" fill="#dcdce6" d="M0 46.330002h46.375586V0H0z"></path>
          <path class="tp-star__shape" d="M39.533936 19.711433L13.230239 38.80065l3.838216-11.797827L7.02115 19.711433h12.418975l3.837417-11.798624 3.837418 11.798624h12.418975zM23.2785 31.510075l7.183595-1.509576 2.862114 8.800152L23.2785 31.510075z" fill="#FFF"></path>
      </g>
      <g class="tp-star">
          <path class="tp-star__canvas" fill="#dcdce6" d="M51.24816 46.330002h46.375587V0H51.248161z"></path>
          <path class="tp-star__canvas--half" fill="#dcdce6" d="M51.24816 46.330002h23.187793V0H51.248161z"></path>
          <path class="tp-star__shape" d="M74.990978 31.32991L81.150908 30 84 39l-9.660206-7.202786L64.30279 39l3.895636-11.840666L58 19.841466h12.605577L74.499595 8l3.895637 11.841466H91L74.990978 31.329909z" fill="#FFF"></path>
      </g>
      <g class="tp-star">
          <path class="tp-star__canvas" fill="#dcdce6" d="M102.532209 46.330002h46.375586V0h-46.375586z"></path>
          <path class="tp-star__canvas--half" fill="#dcdce6" d="M102.532209 46.330002h23.187793V0h-23.187793z"></path>
          <path class="tp-star__shape" d="M142.066994 19.711433L115.763298 38.80065l3.838215-11.797827-10.047304-7.291391h12.418975l3.837418-11.798624 3.837417 11.798624h12.418975zM125.81156 31.510075l7.183595-1.509576 2.862113 8.800152-10.045708-7.290576z" fill="#FFF"></path>
      </g>
      <g class="tp-star">
          <path class="tp-star__canvas" fill="#dcdce6" d="M153.815458 46.330002h46.375586V0h-46.375586z"></path>
          <path class="tp-star__canvas--half" fill="#dcdce6" d="M153.815458 46.330002h23.187793V0h-23.187793z"></path>
          <path class="tp-star__shape" d="M193.348355 19.711433L167.045457 38.80065l3.837417-11.797827-10.047303-7.291391h12.418974l3.837418-11.798624 3.837418 11.798624h12.418974zM177.09292 31.510075l7.183595-1.509576 2.862114 8.800152-10.045709-7.290576z" fill="#FFF"></path>
      </g>
      <g class="tp-star">
          <path class="tp-star__canvas" fill="#dcdce6" d="M205.064416 46.330002h46.375587V0h-46.375587z"></path>
          <path class="tp-star__canvas--half" fill="#dcdce6" d="M205.064416 46.330002h23.187793V0h-23.187793z"></path>
          <path class="tp-star__shape" d="M244.597022 19.711433l-26.3029 19.089218 3.837419-11.797827-10.047304-7.291391h12.418974l3.837418-11.798624 3.837418 11.798624h12.418975zm-16.255436 11.798642l7.183595-1.509576 2.862114 8.800152-10.045709-7.290576z" fill="#FFF"></path>
      </g>
  </svg>
    </div>
  </div></div></div>
        <!-- Logo -->
        <div id="tp-widget-logo" class="tp-widget-logo"><div class="">
    <div style="position: relative; height: 0; width: 100%; padding: 0; padding-bottom: 24.6031746031746%;">
      
  <svg role="img" aria-labelledby="trustpilotLogo" viewBox="0 0 126 31" xmlns="http://www.w3.org/2000/svg" style="position: absolute; height: 100%; width: 100%; left: 0; top: 0;">
      <title id="trustpilotLogo">Trustpilot</title>
      <path class="tp-logo__text" d="M33.074774 11.07005H45.81806v2.364196h-5.010656v13.290316h-2.755306V13.434246h-4.988435V11.07005h.01111zm12.198892 4.319629h2.355341v2.187433h.04444c.077771-.309334.222203-.60762.433295-.894859.211092-.287239.466624-.56343.766597-.79543.299972-.243048.633276-.430858.999909-.585525.366633-.14362.744377-.220953 1.12212-.220953.288863 0 .499955.011047.611056.022095.1111.011048.222202.033143.344413.04419v2.408387c-.177762-.033143-.355523-.055238-.544395-.077333-.188872-.022096-.366633-.033143-.544395-.033143-.422184 0-.822148.08838-1.199891.254096-.377744.165714-.699936.41981-.977689.740192-.277753.331429-.499955.729144-.666606 1.21524-.166652.486097-.244422 1.03848-.244422 1.668195v5.39125h-2.510883V15.38968h.01111zm18.220567 11.334883H61.02779v-1.579813h-.04444c-.311083.574477-.766597 1.02743-1.377653 1.369908-.611055.342477-1.233221.51924-1.866497.51924-1.499864 0-2.588654-.364573-3.25526-1.104765-.666606-.740193-.999909-1.856005-.999909-3.347437V15.38968h2.510883v6.948968c0 .994288.188872 1.701337.577725 2.1101.377744.408763.922139.618668 1.610965.618668.533285 0 .96658-.077333 1.322102-.243048.355524-.165714.644386-.37562.855478-.65181.222202-.265144.377744-.596574.477735-.972194.09999-.37562.144431-.784382.144431-1.226288v-6.573349h2.510883v11.323836zm4.27739-3.634675c.07777.729144.355522 1.237336.833257 1.535623.488844.287238 1.06657.441905 1.744286.441905.233312 0 .499954-.022095.799927-.055238.299973-.033143.588836-.110476.844368-.209905.266642-.099429.477734-.254096.655496-.452954.166652-.198857.244422-.452953.233312-.773335-.01111-.320381-.133321-.585525-.355523-.784382-.222202-.209906-.499955-.364573-.844368-.497144-.344413-.121525-.733267-.232-1.17767-.320382-.444405-.088381-.888809-.18781-1.344323-.287239-.466624-.099429-.922138-.232-1.355432-.37562-.433294-.14362-.822148-.342477-1.166561-.596573-.344413-.243048-.622166-.56343-.822148-.950097-.211092-.386668-.311083-.861716-.311083-1.436194 0-.618668.155542-1.12686.455515-1.54667.299972-.41981.688826-.75124 1.14434-1.005336.466624-.254095.97769-.430858 1.544304-.541334.566615-.099429 1.11101-.154667 1.622075-.154667.588836 0 1.15545.066286 1.688736.18781.533285.121524 1.02213.320381 1.455423.60762.433294.276191.788817.640764 1.07768 1.08267.288863.441905.466624.98324.544395 1.612955h-2.621984c-.122211-.596572-.388854-1.005335-.822148-1.204193-.433294-.209905-.933248-.309334-1.488753-.309334-.177762 0-.388854.011048-.633276.04419-.244422.033144-.466624.088382-.688826.165715-.211092.077334-.388854.198858-.544395.353525-.144432.154667-.222203.353525-.222203.60762 0 .309335.111101.552383.322193.740193.211092.18781.488845.342477.833258.475048.344413.121524.733267.232 1.177671.320382.444404.088381.899918.18781 1.366542.287239.455515.099429.899919.232 1.344323.37562.444404.14362.833257.342477 1.17767.596573.344414.254095.622166.56343.833258.93905.211092.37562.322193.850668.322193 1.40305 0 .673906-.155541 1.237336-.466624 1.712385-.311083.464001-.711047.850669-1.199891 1.137907-.488845.28724-1.04435.508192-1.644295.640764-.599946.132572-1.199891.198857-1.788727.198857-.722156 0-1.388762-.077333-1.999818-.243048-.611056-.165714-1.14434-.408763-1.588745-.729144-.444404-.33143-.799927-.740192-1.05546-1.226289-.255532-.486096-.388853-1.071621-.411073-1.745528h2.533103v-.022095zm8.288135-7.700208h1.899828v-3.402675h2.510883v3.402675h2.26646v1.867052h-2.26646v6.054109c0 .265143.01111.486096.03333.684954.02222.18781.07777.353524.155542.486096.07777.132572.199981.232.366633.298287.166651.066285.377743.099428.666606.099428.177762 0 .355523 0 .533285-.011047.177762-.011048.355523-.033143.533285-.077334v1.933338c-.277753.033143-.555505.055238-.811038.088381-.266642.033143-.533285.04419-.811037.04419-.666606 0-1.199891-.066285-1.599855-.18781-.399963-.121523-.722156-.309333-.944358-.552381-.233313-.243049-.377744-.541335-.466625-.905907-.07777-.364573-.13332-.784383-.144431-1.248384v-6.683825h-1.899827v-1.889147h-.02222zm8.454788 0h2.377562V16.9253h.04444c.355523-.662858.844368-1.12686 1.477644-1.414098.633276-.287239 1.310992-.430858 2.055369-.430858.899918 0 1.677625.154667 2.344231.475048.666606.309335 1.222111.740193 1.666515 1.292575.444405.552382.766597 1.193145.9888 1.92229.222202.729145.333303 1.513527.333303 2.3421 0 .762288-.099991 1.50248-.299973 2.20953-.199982.718096-.499955 1.347812-.899918 1.900194-.399964.552383-.911029.98324-1.533194 1.31467-.622166.33143-1.344323.497144-2.18869.497144-.366634 0-.733267-.033143-1.0999-.099429-.366634-.066286-.722157-.176762-1.05546-.320381-.333303-.14362-.655496-.33143-.933249-.56343-.288863-.232-.522175-.497144-.722157-.79543h-.04444v5.656393h-2.510883V15.38968zm8.77698 5.67849c0-.508193-.06666-1.005337-.199981-1.491433-.133321-.486096-.333303-.905907-.599946-1.281527-.266642-.37562-.599945-.673906-.988799-.894859-.399963-.220953-.855478-.342477-1.366542-.342477-1.05546 0-1.855387.364572-2.388672 1.093717-.533285.729144-.799928 1.701337-.799928 2.916578 0 .574478.066661 1.104764.211092 1.59086.144432.486097.344414.905908.633276 1.259432.277753.353525.611056.629716.99991.828574.388853.209905.844367.309334 1.355432.309334.577725 0 1.05546-.121524 1.455423-.353525.399964-.232.722157-.541335.97769-.905907.255531-.37562.444403-.79543.555504-1.270479.099991-.475049.155542-.961145.155542-1.458289zm4.432931-9.99812h2.510883v2.364197h-2.510883V11.07005zm0 4.31963h2.510883v11.334883h-2.510883V15.389679zm4.755124-4.31963h2.510883v15.654513h-2.510883V11.07005zm10.210184 15.963847c-.911029 0-1.722066-.154667-2.433113-.452953-.711046-.298287-1.310992-.718097-1.810946-1.237337-.488845-.530287-.866588-1.160002-1.12212-1.889147-.255533-.729144-.388854-1.535622-.388854-2.408386 0-.861716.133321-1.657147.388853-2.386291.255533-.729145.633276-1.35886 1.12212-1.889148.488845-.530287 1.0999-.93905 1.810947-1.237336.711047-.298286 1.522084-.452953 2.433113-.452953.911028 0 1.722066.154667 2.433112.452953.711047.298287 1.310992.718097 1.810947 1.237336.488844.530287.866588 1.160003 1.12212 1.889148.255532.729144.388854 1.524575.388854 2.38629 0 .872765-.133322 1.679243-.388854 2.408387-.255532.729145-.633276 1.35886-1.12212 1.889147-.488845.530287-1.0999.93905-1.810947 1.237337-.711046.298286-1.522084.452953-2.433112.452953zm0-1.977528c.555505 0 1.04435-.121524 1.455423-.353525.411074-.232.744377-.541335 1.01102-.916954.266642-.37562.455513-.806478.588835-1.281527.12221-.475049.188872-.961145.188872-1.45829 0-.486096-.066661-.961144-.188872-1.44724-.122211-.486097-.322193-.905907-.588836-1.281527-.266642-.37562-.599945-.673907-1.011019-.905907-.411074-.232-.899918-.353525-1.455423-.353525-.555505 0-1.04435.121524-1.455424.353525-.411073.232-.744376.541334-1.011019.905907-.266642.37562-.455514.79543-.588835 1.281526-.122211.486097-.188872.961145-.188872 1.447242 0 .497144.06666.98324.188872 1.458289.12221.475049.322193.905907.588835 1.281527.266643.37562.599946.684954 1.01102.916954.411073.243048.899918.353525 1.455423.353525zm6.4883-9.66669h1.899827v-3.402674h2.510883v3.402675h2.26646v1.867052h-2.26646v6.054109c0 .265143.01111.486096.03333.684954.02222.18781.07777.353524.155541.486096.077771.132572.199982.232.366634.298287.166651.066285.377743.099428.666606.099428.177762 0 .355523 0 .533285-.011047.177762-.011048.355523-.033143.533285-.077334v1.933338c-.277753.033143-.555505.055238-.811038.088381-.266642.033143-.533285.04419-.811037.04419-.666606 0-1.199891-.066285-1.599855-.18781-.399963-.121523-.722156-.309333-.944358-.552381-.233313-.243049-.377744-.541335-.466625-.905907-.07777-.364573-.133321-.784383-.144431-1.248384v-6.683825h-1.899827v-1.889147h-.02222z" fill="#191919"></path>
      <path class="tp-logo__star" fill="#00B67A" d="M30.141707 11.07005H18.63164L15.076408.177071l-3.566342 10.892977L0 11.059002l9.321376 6.739063-3.566343 10.88193 9.321375-6.728016 9.310266 6.728016-3.555233-10.88193 9.310266-6.728016z"></path>
      <path class="tp-logo__star-notch" fill="#005128" d="M21.631369 20.26169l-.799928-2.463625-5.755033 4.153914z"></path>
  </svg>
    </div>
  </div></div>
      </a>
    </div>
    
    
                      
                      <!-- End TrustBox widget -->
                    </div>
                    <div class="tabs-product">
                      <div class="tabs row"> <a onClick="openTab(event, &#39;General&#39;)" class="active">General</a> 
                      <a onClick="openTab(event, &#39;Detalle&#39;)">Description</a> 
                      <a onClick="openTab(event, &#39;Compatibles&#39;)">Compatibility</a> 
                      <a class="" onClick="openTab(event, &#39;Ficha&#39;)">Technical Specs</a> </div>
                      <div id="General" class="tabcontent product__bullets default">
                        <ul>
                          <li>Enjoy unlimited data plans for your trip to the USA</li>
                          <li>Reliable connection from the US’s best networks</li>
                          <li>Keep your WhatsApp number on your cellphone</li>
                        </ul>
                        <ul>
                          <li>No registration required. Easy to set up</li>
                          <li>24/7 customer service in English</li>
                          <li>Forget about roaming and searching for public WiFi networks</li>
                        </ul>
                        <div class="product__shipping-info" style="margin-left: -15px; margin-top: 20px"> <img src="https://cdn-esimholafly2.pressidium.com/wp-content/themes/Holafly_v2-child/recursos/img/rocket.svg" alt="You&#39;ll receive an email with your eSIM in seconds, no matter where you are.">
                          <p>You'll receive an email with your eSIM in seconds, no matter where you are.</p>
                        </div>
                      </div>
                      <div id="Detalle" class="tabcontent">
                        <p>Connect to the <strong>Internet in the United States</strong> at 4G / LTE speed with an <strong>international eSIM with unlimited data</strong>. Use your favorite apps to<strong> call all your friends and family</strong>, such as WhatsApp or iMessage, without restrictions. You can keep your usual local SIM card to receive SMS and important calls. This<strong> eSIM for the USA</strong> uses the AT&amp;T network, the fastest in the country.</p>
                        <p>&nbsp;</p>
                        <p>Travel eSIMs are effortless<strong> to set up:</strong> You will receive a QR code immediately in your email. Scan it with your cellphone camera, and in a matter of minutes, you’re connected to the internet in the USA. It’s that easy!</p>
                      </div>
                      <div id="Compatibles" class="tabcontent">
                        <p>All smartphones with eSIM technology enabled.</p>
                        <p>&nbsp;</p>
                        <p><span style="font-size: 11.0pt;">From the iPhone XS, XR onward; Samsung Galaxy S20, S20+, S20 Ultra, Samsung Galaxy Fold, Fold 2, Samsung Galaxy Note 20, Samsung Galaxy Z Flip and onwards; Huawei P40, P0 Pro, Huawei Mate 40 Pro and later models; Google Pixel 3, 3a (some versions do not allow eSIM), Google Pixel 4, 4 XL, 4a, 5 and later models; Oppo Find X3 Pro, Oppo Reno 5A, Motorola Razr (2019) and Motorola Razr 5G (dual SIM).</span></p>
                        <p><span style="font-size: 11.0pt;">&nbsp;</span></p>
                        <p><span style="font-size: 11.0pt;">Check the compatibility of your cell phone by following the steps below:</span></p>
                        <p><span style="font-size: 11.0pt;">&nbsp;</span></p>
                        <p><strong><span style="font-size: 11.0pt;">On iOS devices (Apple iPhone):</span></strong><span style="font-size: 11.0pt;"> go to Settings &gt;&nbsp; Cellular or Mobile Data; if you have the option to “Add Cellular Plan” or “Add Data Plan”, your iPhone supports eSIMs.</span></p>
                        <p><span style="font-size: 11.0pt;">&nbsp;</span></p>
                        <p><strong><span style="font-size: 11.0pt;">On Android devices (Samsung):</span></strong><span style="font-size: 11.0pt;"> go to Settings &gt; Connections &gt; SIM Card Manager; if you have the option to “Add mobile plan”, your smartphone supports eSIMs.</span></p>
                        <p><span style="font-size: 11.0pt;">&nbsp;</span></p>
                        <p><span style="font-size: 11.0pt;">For the Holafly eSIM to work, it is essential that your phone is unlocked (it means that you can use it with any carrier).</span></p>
                        <p><span style="font-size: 11.0pt;">&nbsp;</span></p>
                        <p><span style="font-size: 11.0pt;">Do you have any more questions? Write to us via chat.</span></p>
                      </div>
                      <div id="Ficha" class="tabcontent product__bullets">
                        <ul>
                          <li><strong>Network:</strong> AT&amp;T / T-Mobile</li>
                          <li><strong>Speed:</strong> 4G / LTE</li>
                          <li><strong>Tethering / Hotspot:</strong> No</li>
                          <li><strong>Data Packages:</strong> Unlimited</li>
                          <li><strong>Days of usage:</strong> 5, 10, 15, 20, 20, 30, 60, 90.</li>
                          <li><strong>Phone number:</strong> No</li>
                          <li><strong>Plan type:</strong> Prepaid</li>
                          <li><strong>SMS:</strong> No</li>
                          <li><strong>APN:</strong> drei.at</li>
                          <li><strong>Analog calls:</strong> No, only through apps (VOIP).</li>
                          <li><strong>Activation:</strong> Automatic, activated when connected to a cellular network.</li>
                          <li><strong>Compatibility:</strong> all smartphones with eSIM enabled technology. Functionality on smartwatches and tablets is not guaranteed.</li>
                        </ul>
                        <ul>
                          <li><strong>Coverage:</strong> You will enjoy good coverage and speed in U.S. cities such as New York, Miami, Orlando, Las Vegas, etc. If you travel to mountainous or desert areas such as Page or the Grand Canyon, you may experience unstable coverage. If you require any further assistance, please contact our customer service team.</li>
                          <li><strong>Shipping:</strong> via email.</li>
                          <li><strong>Delivery time:</strong> immediate, after purchase.</li>
                          <li><strong>Installation:</strong> scan a QR code.</li>
                          <li><strong>ID required</strong>: No</li>
                          <li><strong>Technology:</strong> eSIM</li>
                          <li><strong>Designed for:</strong> tourism, backpackers, vacations, digital nomads, and business.</li>
                          <li><strong>Speed reduction:</strong> the eSIM includes unlimited data for the contracted time. However, please note that the carrier may reserve the right to apply a Fair Usage Policy.</li>
                        </ul>
                      </div>
                    </div>
                    <form class="variations_form cart">
                      <div id="bloque-addcart" class="shop-product sp-esim">
                        <h3>How many days are you traveling for?</h3>
                        <div class="shop-product__content">
                          <table class="variations" cellspacing="0">
                            <tbody>
                              <tr class="attribute-tipo">
                                <td class="value"><div class="product-variation">
                                    <input type="radio" name="attribute_tipo" value="5 days unlimited data" id="tipo_v_5 days unlimited data23">
                                    <label for="tipo_v_5 days unlimited data23" class="init"><strong class="variation_days">5 days </strong><span class="variation_data">unlimited data </span></label>
                                    <span><del aria-hidden="true"><span class="woocommerce-Price-amount amount">
                                    <bdi><span class="woocommerce-Price-currencySymbol">$</span>27.00</bdi>
                                    </span></del> <ins><span class="woocommerce-Price-amount amount">
                                    <bdi><span class="woocommerce-Price-currencySymbol">$</span>19.00</bdi>
                                    </span></ins></span></div>
                                  <div class="product-variation">
                                    <input type="radio" name="attribute_tipo" value="10 days unlimited data" id="tipo_v_10 days unlimited data23">
                                    <label for="tipo_v_10 days unlimited data23"><strong class="variation_days">10 days </strong><span class="variation_data">unlimited data </span></label>
                                    <span><del aria-hidden="true"><span class="woocommerce-Price-amount amount">
                                    <bdi><span class="woocommerce-Price-currencySymbol">$</span>44.00</bdi>
                                    </span></del> <ins><span class="woocommerce-Price-amount amount">
                                    <bdi><span class="woocommerce-Price-currencySymbol">$</span>34.00</bdi>
                                    </span></ins></span></div>
                                  <div class="product-variation">
                                    <input type="radio" name="attribute_tipo" value="15 days unlimited data" id="tipo_v_15 days unlimited data23">
                                    <label for="tipo_v_15 days unlimited data23"><strong class="variation_days">15 days </strong><span class="variation_data">unlimited data </span></label>
                                    <span><del aria-hidden="true"><span class="woocommerce-Price-amount amount">
                                    <bdi><span class="woocommerce-Price-currencySymbol">$</span>57.00</bdi>
                                    </span></del> <ins><span class="woocommerce-Price-amount amount">
                                    <bdi><span class="woocommerce-Price-currencySymbol">$</span>47.00</bdi>
                                    </span></ins></span></div>
                                  <div class="product-variation">
                                    <input type="radio" name="attribute_tipo" value="20 days unlimited data" id="tipo_v_20 days unlimited data23">
                                    <label for="tipo_v_20 days unlimited data23"><strong class="variation_days">20 days </strong><span class="variation_data">unlimited data </span></label>
                                    <span><del aria-hidden="true"><span class="woocommerce-Price-amount amount">
                                    <bdi><span class="woocommerce-Price-currencySymbol">$</span>64.00</bdi>
                                    </span></del> <ins><span class="woocommerce-Price-amount amount">
                                    <bdi><span class="woocommerce-Price-currencySymbol">$</span>54.00</bdi>
                                    </span></ins></span></div>
                                  <div class="product-variation">
                                    <input type="radio" name="attribute_tipo" value="30 days unlimited data" id="tipo_v_30 days unlimited data23">
                                    <label for="tipo_v_30 days unlimited data23"><strong class="variation_days">30 days </strong><span class="variation_data">unlimited data </span></label>
                                    <span><del aria-hidden="true"><span class="woocommerce-Price-amount amount">
                                    <bdi><span class="woocommerce-Price-currencySymbol">$</span>76.00</bdi>
                                    </span></del> <ins><span class="woocommerce-Price-amount amount">
                                    <bdi><span class="woocommerce-Price-currencySymbol">$</span>64.00</bdi>
                                    </span></ins></span></div>
                                  <div class="product-variation">
                                    <input type="radio" name="attribute_tipo" value="60 days unlimited data" id="tipo_v_60 days unlimited data23">
                                    <label for="tipo_v_60 days unlimited data23"><strong class="variation_days">60 days </strong><span class="variation_data">unlimited data </span></label>
                                    <span><del aria-hidden="true"><span class="woocommerce-Price-amount amount">
                                    <bdi><span class="woocommerce-Price-currencySymbol">$</span>94.00</bdi>
                                    </span></del> <ins><span class="woocommerce-Price-amount amount">
                                    <bdi><span class="woocommerce-Price-currencySymbol">$</span>84.00</bdi>
                                    </span></ins></span></div>
                                  <div class="product-variation">
                                    <input type="radio" name="attribute_tipo" value="90 days unlimited data" id="tipo_v_90 days unlimited data23">
                                    <label for="tipo_v_90 days unlimited data23"><strong class="variation_days">90 days </strong><span class="variation_data">unlimited data </span></label>
                                    <span><del aria-hidden="true"><span class="woocommerce-Price-amount amount">
                                    <bdi><span class="woocommerce-Price-currencySymbol">$</span>109.00</bdi>
                                    </span></del> <ins><span class="woocommerce-Price-amount amount">
                                    <bdi><span class="woocommerce-Price-currencySymbol">$</span>99.00</bdi>
                                    </span></ins></span></div></td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                        <div class="single_variation_wrap">
                          <div class="woocommerce-variation single_variation" style="display: block;">
                            <div class="woocommerce-variation-description"></div>
                            <div class="woocommerce-variation-price"><span class="price"><del aria-hidden="true"><span class="woocommerce-Price-amount amount">
                              <bdi><span class="woocommerce-Price-currencySymbol">$</span>27.00</bdi>
                              </span></del> <ins><span class="woocommerce-Price-amount amount">
                              <bdi><span class="woocommerce-Price-currencySymbol">$</span>19.00</bdi>
                              </span></ins></span></div>
                            <div class="woocommerce-variation-availability"></div>
                          </div>
                          <div class="woocommerce-variation-add-to-cart variations_button row last woocommerce-variation-add-to-cart-enabled">
                            <div class="cart-add-container add-block-btn">
                              <div class="col-md-3 quantity align-items-center"> <span id="menos-producto" class="btn-qty">-</span>
                                <div class="quantity">
                                  <label class="screen-reader-text" for="quantity_63e3184bd42f7">USA quantity</label>
                                  <input type="text" id="quantity_63e3184bd42f7" class="input-cantidad" name="quantity" value="1" title="Qty" size="4" min="1" max="" step="1" placeholder="" inputmode="numeric" autocomplete="off">
                                </div>
                                <span id="mas-producto" class="btn-qty">+</span> </div>
                              <div class="col-md-9 add-cart">
                                <button type="submit" class="btn-primary-l cta-primary">Add to cart</button>
                              </div>
                            </div>
                            <div class="bloque-seguridad">
                              <div class="add-cart proteger">
                                <div class="pago-seguro"> <img src="https://cdn-esimholafly2.pressidium.com/wp-content/themes/Holafly_v2-child/recursos/img/proteger.svg" alt="">
                                  <p><span>Secure payment</span> guaranteed</p>
                                  <img src="https://cdn-esimholafly2.pressidium.com/wp-content/themes/Holafly_v2-child/recursos/img/visa.svg" alt="Visa"> <img src="https://cdn-esimholafly2.pressidium.com/wp-content/themes/Holafly_v2-child/recursos/img/mastercard.svg" alt="Master Card"> </div>
                                <div class="pago-seguro"> <img class="payment-icon" src="https://cdn-esimholafly2.pressidium.com/wp-content/themes/Holafly_v2-child/recursos/img/ApplePay.svg" alt="Apple Pay"> <img class="payment-icon" src="https://cdn-esimholafly2.pressidium.com/wp-content/themes/Holafly_v2-child/recursos/img/GPay.svg" alt="Google Pay"> <img class="payment-icon" src="https://cdn-esimholafly2.pressidium.com/wp-content/themes/Holafly_v2-child/recursos/img/Paypal.svg" alt="PayPal"> </div>
                              </div>
                            </div>
                            <input type="hidden" name="add-to-cart" value="23">
                            <input type="hidden" name="product_id" value="23">
                            <input type="hidden" name="variation_id" class="variation_id" value="19612">
                          </div>
                          <div class="cart-add-container fixed-add-button hidden">
                            <div class="col-md-3 quantity align-items-center"> <span id="menos-producto" class="btn-qty">-</span>
                              <div class="quantity">
                                <label class="screen-reader-text" for="quantity_63e3184bd4e84">USA quantity</label>
                                <input type="number" id="quantity_63e3184bd4e84" class="input-cantidad" name="quantity" value="1" title="Qty" size="4" min="1" max="" step="1" placeholder="" inputmode="numeric" autocomplete="off">
                              </div>
                              <span id="mas-producto" class="btn-qty">+</span> </div>
                            <div class="col-md-9 add-cart">
                              <button type="submit" class="btn-primary-l cta-primary">Add to cart</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </form>
                    <div class="product_meta"> <span class="sku_wrapper">SKU: <span class="sku">N/A</span></span> <span class="posted_in">Category: <a href="https://esim.holafly.com/esim/" rel="tag">esim</a></span> </div>
                  </div>
                </div>
				
				
				
           </div>
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
<script src="assets/js/producto.js.download"></script>
<script src="assets/js/main.js(2).download"></script>
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