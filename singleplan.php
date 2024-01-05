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
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
               integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
               crossorigin="anonymous" referrerpolicy="no-referrer" />
          <link href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;subset=latin-ext"
               rel="stylesheet">
          <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i,900,900i&amp;subset=latin-ext"
               rel="stylesheet">
          <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
               integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
               crossorigin="anonymous">
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
          <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
               integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
               crossorigin="anonymous" referrerpolicy="no-referrer"></script>
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
               integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
               crossorigin="anonymous"></script>
          <style>
          i.fa-regular.fa-phone-slash {
               font-family: 'FontAwesome';
          }

          @font-face {
               font-family: Modern Era;
               src: url(/assets/font/Modern Era.woff2.ttf);
          }

          @font-face {
               font-family: 'Arial';
               src: url('webfont/ArialMT.woff2') format('woff2'),
                    url('webfont/ArialMT.woff') format('woff'),
                    url('webfont/ArialMT.ttf') format('truetype');
               font-weight: normal;
               font-style: normal;
               font-display: swap;
          }

          @font-face {
               font-family: 'Times New Roman';
               src: url('webfont/TimesNewRomanPSMT.woff2') format('woff2'),
                    url('webfont/TimesNewRomanPSMT.woff') format('woff'),
                    url('webfont/TimesNewRomanPSMT.ttf') format('truetype');
               font-weight: normal;
               font-style: normal;
               font-display: swap;
          }

          @media(min-width: 1400px) {
               .container {
                    max-width: 1260px;
               }
          }

          .accordion-button::after {
               /* right: 10px; */
               /* right: 50% !important;
               top: 50% !important; */
          }

          .hide {
               display: none;
          }

          .show {
               display: block;
          }

          .modal-content .close {
               display: none !important;
          }

          .modal-content {
               box-shadow: 2px 2px 10px #e1e1e1;
               border: none !important;
               padding: 10px;
          }

          .gsm-breadcrumb a {
               font-size: 17px;
               font-family: 'Arial';
               color: #000;
          }

          .gsm-breadcrumb a:hover {
               font-size: 17px;
               color: #000;
          }

          .breadcrumb-item+.breadcrumb-item::before {
               color: #000;
               font-size: 17px;
          }

          .breadcrumb-item.active a {
               font-size: 17px;
               color: gray;
          }

          .breadcrumb-item.active a:hover {
               font-size: 17px;
               color: gray;
          }

          .country-img1 {
               padding: 0 20px;
          }

          .footer-bottom {
               //position: fixed !important;
               bottom: 0;
               left: 0;
               width: 100%;
               //background-color: rgb(16 22 29) !important;
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

          .should-know .col-lg-3 {
               padding: 0;
          }

          .topcorner {
               top: 15px;
               right: 0 !important;
               z-index: 50 !important;
          }

          @media(max-width: 1199px) {
               .topcorner {
                    position: absolute !important;
                    right: 30px !important;
                    top: 50% !important;
                    transform: translateY(-50%);
               }
          }

          @media(min-width: 1280px) {
               /* .container.should-know{
        max-width: 1300px;
    } */

          }

          .country-show {
               font-size: 20px;
               margin-left: 10px;
               border: 1px dotted gray;
               padding: 2px 10px;
               border-radius: 10px;
               cursor: pointer;
               background-color: #64ae02;
               color: #fff !important;
          }

          .country-hide {
               font-size: 20px;
               margin-left: 10px;
               border: 1px dotted gray;
               padding: 2px 10px;
               border-radius: 10px;
               cursor: pointer;
               background-color: #64ae02;
               color: #fff !important;
          }

          .country-show1 {
               display: none;
          }

          /* .country-show:hover{
    background-color: skyblue;
} */

          .fa-ul {
               margin-left: 1em;
          }

          .table th,
          .table td {
               padding: .100rem
          }

          input[type=checkbox] {
               zoom: 1.5;
          }

          figure .flag {
               max-height: 16px;
          }

          .total {
               border: none;
               padding: 0px;
               width: 25px;
               font-weight: 600;
          }

          .line-height li {
               line-height: 1.4;
          }

          figure .flag {
               position: absolute;
               left: 0;
               bottom: 50%;
          }

          figure p {
               font-size: 12px;
               font-weight: 600;
               margin-left: 38px;
               overflow-wrap: break-word;
          }

          .text-block {
               position: absolute;
               bottom: 0;
               background: rgb(0, 0, 0);
               /* Fallback color */
               background: rgba(75, 153, 181, 0.5);
               /* Black background with opacity */
               color: #ffffff;
               width: 100%;
               padding: 20px;
               min-height: 250px;
          }

          .text-dest {
               background-color: orange;
               text-align: center;
               color: white;
               display: table-cell;
               overflow: hidden;
               vertical-align: middle;
          }

          .card-blog-entry figure {
               text-align: center;
          }

          .hover-item:hover .hover-transition {
               background-color: rgba(0, 0, 0, .65);
          }

          .datepicker {
               border: none;
               color: #003DBD;
          }

          .datepicker:focus-visible {
               outline: 0px solid blue;
               border: 3px;
          }

          .ui-datepicker {
               top: 45vh !important;
          }

          @media only screen and (min-width: 992px) {
               .banner-slides-wrapper {
                    min-height: 80vh;
               }

               .loioi .col-lg-3 {
                    flex: 0 0 auto;
                    width: 30% !important;
               }
          }

          @media screen and (max-width: 992px) {
               .d-none1 {
                    display: none;
               }
          }

          @media only screen and (min-width: 768px) {
               .loioi .col-md-4 {
                    flex: 0 0 auto;
                    width: 30% !important;
               }

          }

          @media(max-width: 1199px) {
               .topcorner {
                    position: absolute !important;
                    right: 30px !important;
                    top: 50% !important;
                    transform: translateY(-50%);
               }
          }


          .columns {
               Width: 100%;
          }

          .column {
               background-image: url('assets/images/frame1.png');
               background-size: contain;
               background-origin: padding-box;
               background-repeat: no-repeat;
               float: left;
               width: 100%;
               height: 350px;
               padding-top: 50px;
               padding-left: 60px;
               margin: 10px;

          }

          .nav-pills .nav-link {
               position: relative;
          }

          .nav-pills .nav-link.active::before {
               content: '';
               position: absolute;
               bottom: 0;
               left: 50%;
               transform: translateX(-50%);
               height: 20px;
               width: 20px;
               background-color: yellow;
          }

          .nav-pills>.nav-item,
          .nav-pills>.nav-link {
               margin-bottom: 0;
          }

          .plans-tab .nav-link {
               border: none;
               padding: 10px 50px;
               background-color: #f5f7f7;
               transition: all 0.2s ease-in-out;
               border-radius: 0;
               box-shadow: 2px 0px 3px #2196f3;
          }

          .plans-tab .nav-link:focus {
               outline: 0;
               box-shadow: none;
          }

          .plans-tab .nav-link::before {
               display: none;
          }

          .plans-tab .nav-tabs::after {
               display: none;
          }

          .plans-tab .nav-link.active {
               color: #fff;
               background-color: #2196f3 !important;
          }

          .plan-city-img img.img-fluid {
               width: 100%;
               height: auto;
               border-radius: 10px;
               box-shadow: 2px 0px 7px #000;
          }

          .plans-title {
               font-size: 40px;
               font-weight: 500 !important;
               font-family: 'Arial';
               text-align: left !important
          }

          .nospace {
               padding-top: 0 !important;
          }

          .color-change {
               font-size: 30px;
               font-family: roboto;
               font-weight: 500 !important;
               border-radius: 0px;
               text-align: center;
               padding: 10px 0 !important;
               margin: 10px 0;
               position: relative;
          }

          .color-change::before {
               content: '';
               position: absolute;
               top: 50%;
               left: 124px;
               height: 10px;
               width: 50px;
               border-top: 5px double green;
          }

          .color-change::after {
               content: '';
               position: absolute;
               top: 50%;
               right: 124px;
               height: 10px;
               width: 50px;
               border-top: 5px double green;
          }

          .plan-charge-title {
               color: black;
               font-weight: 600 !important;
               font-size: 24px;
               font-family: roboto;
          }

          .plan-charge-subtitle {
               color: #76ad4d !important;
               font-size: 24px;
               font-weight: 900;
               font-family: roboto;
          }

          .tab-content {
               padding-top: 0.625rem !important;
          }

          .plan-include-title {
               color: black;
               font-family: Arial;
               font-weight: 400 !important;
          }

          span {
               font-family: Arial !important;
          }

          figure p {
               color: #000 !important;
               font-size: 12px !important;
               font-family: 'Arial';
          }

          .plan-charge-item li {
               list-style: none;
          }

          .plan-charge-item li {
               list-style-type: none;
               color: black;
               font-size: 12px !important;
               margin: 10px 0 10px 0;
               font-weight: 500;
               font-family: 'Arial';
          }

          .plan-charge-item li i {
               margin-right: 10px;
          }

          .green-btn button {
               color: #fff !important;
               background-color: #64ae02 !important;
               box-shadow: 0 12px 35px -10px rgb(33 150 243 / 55%), 0 8px 10px -5px rgb(0 0 0 / 9%), 0 4px 25px -2px rgb(0 0 0 / 14%) !important;
               border-color: #64ae02 !important;
               font-family: 'Arial';
          }

          .green-btn button:disabled {
               color: #fff !important;
               background-color: #64ae02 !important;
               border-color: #64ae02 !important;
               box-shadow: 0 1px 9px 0 rgb(33 150 243 / 50%) !important;
               font-family: 'Arial';
          }

          input[type=checkbox] {
               accent-color: #64ae02;
          }

          span.display-activa8,
          .display-activa8 {
               font-size: 20px;
          }

          .plan-city-img {
               margin-left: 20px;
          }

          .col-12.term-border {
               border: 3px double #64ae02;
               padding: 10px 20px;
               margin-top: 30px;
          }

          .form-check-label {
               font-family: 'Arial';
               font-weight: 500;
          }

          .nav-pills .nav-link.active,
          .nav-pills .nav-link:focus,
          .nav-pills .nav-link:hover {
               color: #000 !important;
               box-shadow: none !important;
               background: #F5FFF9;
               border: 1px solid #48EC86 !important;

          }

          ul#pills-tab {
               display: flex;
               justify-content: space-between;
               background: white;
               padding: 15px;
               box-shadow: 1px 1px 5px #c2c2c2;
               border-radius: 5px;
          }

          .nav-pills .nav-link {
               border-top: 3px solid transparent !important;
               color: #000 !important;
          }

          p.sub-te {
               border: 3px double #64ae02;
               padding: 20px;
               font-size: 15px;
               color: #000;
               background: aliceblue;
               border-radius: 20px;
          }

          .nav-pills .nav-item {
               margin: 0;
          }

          .nav-pills .nav-link {
               padding: 8px 30px;
               border-radius: 0;
               box-shadow: 0;
          }

          tr.t_head {
               box-shadow: 2px 4px 6px #0032c5;
          }

          tr.total_charge {
               box-shadow: 2px 4px 6px #0032c5;
          }

          tr.t_head th {
               background-color: gainsboro;
               padding: 3px 15px;
          }

          tr.display-esim8 td {
               padding-bottom: 10px !important;
               border-bottom: 2px dotted #64ae02;
          }

          tr.display-esim9 td {
               padding-bottom: 10px !important;
               border-bottom: 2px dotted #64ae02;
          }

          tr.display-esim10 td {
               padding-bottom: 10px !important;
               border-bottom: 2px dotted #64ae02;
          }

          tr.t_head td {
               background-color: gainsboro;
               /* text-shadow: 2px 4px 13px #64ae02; */
               font-size: 24px;
               color: green !important;
               font-weight: 800 !important;
               padding: 3px 15px;
          }

          .plan-charge-item li i {
               color: darkblue;
          }

          .table th,
          .table td {
               padding: 0 10px;
          }

          /* tr.total_charge th {
    background-color: gainsboro;
    font-size: 23px;
    padding: 5px 15px;
} */
          tr.total_charge td {
               background-color: gainsboro;
               font-size: 23px;
               padding: 0 15px;
          }

          .sub-up {
               padding: 0px 15px 0 18px;
               width: 95%;
          }

          .total {
               border: none;
               padding: 0;
               height: 20px;
               width: 40px;
               font-weight: 600;
               /* border-radius: 50%; */
               background-color: transparent;
               color: #000;
               /* text-shadow: 2px 4px 3px darkgreen; */
               text-align: center;
          }

          span.display-activa8 {
               color: #64ae02 !important;
               font-size: 20px !important;
          }

          .display-activa9 {
               color: #64ae02 !important;
               font-size: 20px !important;
          }

          .display-activa10 {
               color: #64ae02 !important;
               font-size: 20px !important;
          }

          tr.display-esim8 {
               font-size: 18px;
               color: #000;
          }

          tr.display-esim9 {
               font-size: 18px;
               color: #000;
          }

          tr.display-esim10 {
               font-size: 18px;
               color: #000;
          }

          .esimamt8.display-activa8 {
               color: #64ae02 !important;
               font-size: 20px !important;
          }

          .plans-tab .accordion {
               background-color: transparent;
               cursor: pointer;
               padding: 0;
          }

          .plans-tab .accordion-button {
               padding: 0;
          }

          .plans-tab .accordion-button:focus {
               border-color: transparent;
               outline: 0;
               box-shadow: none;
               border: none;
          }

          .plans-tab .accordion-button:not(.collapsed) {
               color: #000;
               background-color: transparent;
               box-shadow: none;
          }

          .plans-tab .accordion-item {
               background-color: transparent;
               border: none;
               margin-top: 20px;
          }

          /* .plans-tab .accordion-button::after {
    content: "\f068";
    position: absolute;
    top: -3%;
    left: 50%;
    font-weight: 900;
    font-family: "Font Awesome 6 Free";
    transition: transform .2s ease-in-out;
    background-image: none;
    font-size: 25px;
    color: forestgreen;
}
.plans-tab .accordion-button::before {
    content: "\2b";
    font-weight: 900;
    background-image: none;
    font-family: "Font Awesome 6 Free";
    background-image: none;
    position: absolute;
    top: -3%;
    left: 50%;
    font-size: 25px;
    color: forestgreen;
} */
          .accordion-button::after {
               content: "\2b";
               position: absolute;
               top: -3%;
               left: 50%;
               font-weight: 900;
               font-family: "Font Awesome 6 Free";
               transition: transform .2s ease-in-out;
               background-image: none;
               font-size: 25px;
               color: forestgreen;
          }

          .accordion-button:not(.collapsed)::after {
               content: "\f068";
               position: absolute;
               top: -3%;
               left: 50%;
               font-weight: 900;
               font-family: "Font Awesome 6 Free";
               transition: transform .2s ease-in-out;
               background-image: none;
               font-size: 25px;
               color: forestgreen;
          }

          .nav {
               margin-left: 10px;
          }

          .plans-tab .accordion-button:not(.collapsed)::after {
               transform: rotate(0deg);
          }

          @media (min-width: 48em) {
               .column {
                    width: 50%;
                    float: left;
                    margin: 5px;
               }

               .columns {
                    content: "";
                    display: table;
                    clear: both;
               }
          }

          @media(max-width:1199px) {

               .modal-lg,
               .modal-xl {
                    max-width: 100%;
               }

               .color-change::before {
                    left: 50px;
               }

               .color-change::after {
                    right: 50px;
               }

               .sub-up {
                    padding: 0px 15px 0 24px;
                    width: 95%;
               }

               .plans-tab .accordion-button::before {
                    left: 70%;
               }

               .plans-tab .accordion-button::after {
                    left: 70%;
               }
          }

          @media(max-width:991px) {
               .nospace {
                    padding-top: 0 !important;
               }

               .countfl {
                    margin: 0 !important
               }

               .sub-up {
                    padding: 0px 34px 0 39px;
                    width: 100%;
               }

               .plans-title {
                    font-size: 30px;
                    text-align: center !important;
               }

               .plan-city-img div {
                    display: none;
               }

               .plan-city-img {
                    text-align: center;
                    margin: 0;
               }

               .plans-tab .accordion-button::before {
                    left: 60%;
               }

               .plans-tab .accordion-button::after {
                    left: 60%;
               }

               .color-change::before {
                    left: 120px;
               }

               .color-change::after {
                    right: 120px;
               }
          }

          @media(max-width:575px) {
               .nav-pills .nav-link {
                    padding: 8px 29px;
               }

               .loioi {
                    display: flex;
                    justify-content: center;
               }

               .countfl {
                    margin: 0 !important
               }

               .d-flex.mx-2.mt-4.mb-4.mkr {
                    display: flex;
                    justify-content: space-between;
               }

               .plans-tab .accordion-button::before {
                    left: 99%;
                    font-size: 18px;
               }

               .plans-tab .accordion-button::after {
                    left: 99%;
                    font-size: 18px;
               }

               .sub-up {
                    padding: 0px 20px 0 21px;
                    width: 100%;
               }

               .color-change {
                    font-size: 22px;
                    padding: 7px 0 !important;
               }

               .plan-charge-title {
                    font-size: 20px;
               }

               .plan-charge-subtitle {
                    font-size: 20px;
               }

               .plan-charge-item li {
                    font-size: 17px !important;
                    margin: 5px 0 5px 0;
               }

               span.display-activa8,
               .display-activa8 {
                    font-size: 17px;
               }

               div#country-tab {
                    height: auto;
                    overflow-y: auto;
                    overflow-x: hidden;
               }

               p.sub-te {
                    padding: 15px;
                    font-size: 15px;
               }

               .color-change::before {
                    top: 42%;
                    left: -12px;
                    width: 30px;
               }

               .color-change::after {
                    top: 42%;
                    right: -12px;
                    width: 30px;
               }

               .tab-content {
                    padding-top: 25px !important;
               }

               .plans-title {
                    font-size: 24px;
               }

               tr.t_head th {
                    font-size: 20px;
               }

               tr.t_head td {
                    font-size: 20px;
               }

               tr.total_charge th {
                    background-color: gainsboro;
                    font-size: 20px;
                    padding: 3px 10px !important;
               }

               tr.total_charge td {
                    padding: 3px 10px;
               }

               font-size: 20px;

               .total {
                    padding: 0 6px;
                    width: 35px;
               }

               .plan-city-img div {
                    top: 40% !important;
               }

               /* .planspace {
    width: 100% !important;
} */

          }

          .container.should-know {
               max-width: 1245px !important;
          }

          .col-12.col-md-6.mx-auto.green-btn {
               display: flex;
               position: relative;
          }

          .plans-tab .nav-link.active {
               color: #fff;
               background-color: #2196f3 !important;
               display: none;
          }

          .sub-up {
               display: none;
          }

          tr.t_head {
               box-shadow: none;
               background: white !important;
          }

          tr.t_head th,
          tr.t_head td {
               background-color: transparent;
          }

          tr.total_charge th,
          tr.total_charge td {
               font-family: 'Arial';
               background-color: transparent;
          }

          tr.total_charge {
               box-shadow: none;
          }

          .ic_what_should i {
               font-size: 36px;
               margin: 12px 0;
               font-family: "FontAwesome";
          }

          .title_what_should.text-left {
               font-size: 20px;
               font-weight: 500;
               margin: 10px 0;
               font-family: 'Arial';
          }

          .sub_tex_what_should.text-left {
               font-family: 'Arial';
          }

          .block_what_should {
               background: whitesmoke;
               margin: 10px;
               padding: 30px;
               border-radius: 10px;
               border: 1px solid green;
               height: 320px;
          }

          .block_what_should {
               background: white;
               margin: 10px;
               padding: 13px;
               border-radius: 10px;
               border-style: double;
               border-color: green;
          }

          .ti_wh h3 {
               margin: 10px 0 10px 10px;
               font-family: 'Arial';
          }

          .nav-pills .nav-link {
               background: #ffffff;
               border: 1px solid #D4D4D4 !important;
               border-radius: 8px;
               padding: 12px 16px;
               height: 85px;
               width: 200px;
               cursor: pointer;
               margin: 0 10px;
               display: flex;
               align-items: center;
               flex-direction: column;
               justify-content: center;
          }

          /* .tab_el {
    display: flex !important;
    flex-direction: column-reverse !important;
} */
          .auto_plan_single {
               margin: 20px 0;
          }

          .auto_plan_single label {
               display: flex !important;
               align-items: center !important;
          }

          .auto_plan_single span {
               margin-right: 20px;
          }

          .auto_plan_single {
               background: #ffffff;
               border: 1px solid #D4D4D4 !important;
               border-radius: 8px;
               padding: 12px 16px;
               height: 85px;
               width: 200px;
               cursor: pointer;
               display: flex;
               align-items: center;
               flex-direction: column;
               justify-content: center;
          }

          input.cheee {
               height: 13px;
               width: 17px;
          }

          .ren_esm.d-flex {
               justify-content: space-around;
               background: white;
               padding: 10px;
               box-shadow: 1px 1px 5px #c2c2c2;
               border-radius: 5px;
               margin: 40px 0 10px 0;
          }

          .planss .col-lg-3 {
               flex: 0 0 auto;
               width: 33%;
               padding: 0 5px;
          }

          @media (min-width: 1200px) {
               .modal-dialog.modal-xl.modal-dialog-centered {
                    max-width: 98% !important;
               }

               .loioi .col-xl-4 {
                    flex: 0 0 auto;
                    width: 30%;
               }
          }

          .col-lg-6.text-center.text-lg-left.mb-2.mb-lg-0 {
               text-align: left !important;
          }

          .col-lg-6.text-center.text-lg-right.footer-links {
               text-align: right !important;
          }

          @media(max-width: 991px) {
               .col-lg-6.text-center.text-lg-left.mb-2.mb-lg-0 {
                    text-align: center !important;
               }

               .col-lg-6.text-center.text-lg-right.footer-links {
                    text-align: center !important;
               }

               .col-12.box_bt_cart {
                    padding: 0 0 10px 0 !important;
               }
          }

          @media (max-width: 1200px) {
               .countfl {
                    margin: 0 !important
               }
          }

          @media(max-width: 575px) {
               .block_what_should {
                    height: auto;
               }

               .planss .col-lg-3 {
                    flex: 0 0 auto;
                    width: 100%;
                    padding: 0 10px;
               }

               .mkr {
                    margin: 0 !important;
               }

               .buy-now {
                    margin: 10px 0 !important;
               }

               button.btnmp.btn.px-2 {
                    margin: 0px 0 !important;
                    padding: 3px 30px !important;
               }
          }

          td.font-weight-500.pr-3.text-right.esimamt22.display-activa22,
          span.display-activa22 {
               display: none;
          }

          .pl_op {
               box-shadow: 2px 2px 10px;
               margin: 10px;
               border-radius: 10px;

          }

          .tagline {
               font-family: SnellBT-Regular !important;
          }

          .t_plan {
               color: white;
               font-weight: 300;
               font-size: 20px !important;
          }

          .esmi_box {
               margin: 0 20px;
               box-shadow: 5px 5px 10px;
               border-radius: 10px;
               padding: 10px !important;
          }

          .content_pl {
               font-family: 'Arial';
          }

          .titlke_li p {
               font-weight: 500;
               font-family: 'Arial';
          }

          .mars_under {
               margin: 20px 0;
          }

          .btnmp i {
               margin: 0 !important;
               padding: 5px;
          }

          .num_mp {
               text-align: center;
               border-radius: 5px;
               border: 1px solid gray;
          }

          button.btnmp.btn.px-2 {
               margin: 0px 0 !important;
               padding: 5px 10px !important;
          }

          .pmpr {
               border: none;
               font-family: 'Arial';
               font-weight: 600;
               font-size: 18px;
               color: #626365;
               width: 43px;
               text-align: center;
          }

          .exd {
               padding: 0 15px;
          }

          .num_mp {
               text-align: center;
               border-radius: 5px;
               border: 1px solid gray;
               font-size: 15px;
               height: 36px;
               width: 66px;
               font-family: 'Arial';
          }

          .planss {
               /* width: 858px; */
               max-width: 100%;
               margin: 0 auto;
          }

          .col-12.box_bt_cart {
               padding: 0 45px 10px 20px;
               margin: 0;
               /* border-top: 3px solid;
    border-bottom: 3px solid; */
               border-radius: 0 !important;
          }

          .olan_ek label {
               display: flex;
               align-items: center;
               justify-content: space-between;
               margin-top: 10px;
          }

          @media(max-width: 1440px) {
               button.btnmp.btn.px-2 {
                    margin: 0px 0 !important;
                    padding: 5px 10px !important;
               }

               .num_mp {
                    height: 37px;
                    width: 50px;
               }

          }

          @media(max-width:1200px) {
               .green-btn {
                    margin-left: 0 !important;
                    width: 100%;
               }

               button.btnmp.btn.px-2 {
                    padding: 5px 10px !important;
               }

               .num_mp {
                    height: 34px;
                    width: 55px;
               }
          }

          @media(max-width:991px) {
               button.btnmp.btn.px-2 {
                    margin: 0px 0 !important;
                    padding: 5px 10px !important;
               }
          }

          @media(max-width: 732px) {
               .planss .col-lg-3 {
                    width: 100%;
               }

               .col-12.box_bt_cart {
                    padding: 0 20px 10px 20px;
               }

               .mkr {
                    margin: 0 !important;
                    margin-bottom: 20px !important;
               }

               button.btnmp.btn.px-2 {
                    padding: 5px 80px !important;
               }

               .green-btn button {
                    margin: 10px 0 !important;
               }

               .num_mp {
                    height: 34px;
                    width: 150px;
               }
          }

          @media(max-width: 640px) {
               button.btnmp.btn.px-2 {
                    padding: 5px 50px !important;
               }
          }

          @media(max-width: 540px) {
               button.btnmp.btn.px-2 {
                    padding: 5px 35px !important;
               }

               .num_mp {
                    width: 70px;
               }
          }

          @media(max-width: 400px) {
               button.btnmp.btn.px-2 {
                    padding: 5px 15px !important;
               }
          }

          .plan-city-img {
               margin-left: 20px;
               overflow: hidden;
               margin-right: 20px;
          }

          .accordion-button:not(.collapsed)::after {
               right: 10px;
          }

          .accordion-button::after {
               right: 10px;
          }

          figure p {
               font-size: 12px;
               font-weight: 600;
               margin-left: 0px !important;
               overflow-wrap: break-word;
          }

          .titlke_li {
               margin-top: 10px !important;
          }
          </style>

          <script>
          $(document).ready(function() {
               // $(".accordion-button").trigger('click');

          });
          </script>

     </head>

     <body>
          <?php include("includes/header.php"); ?>

          <?php
    $zone_name = $_GET['tags'];
    $select = mysqli_query($con, "select * from zones where tags='$zone_name'");
    while($row = mysqli_fetch_assoc($select)){
    ?>
          <div class="container">
               <div class="modal fade show box_sec" id="modalZones1" tabindex="-1" role="dialog" aria-modal="true"
                    style="display: block; position:unset;">
                    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
                         <div class="modal-content">
                              <div class="modal-body p-0">
                                   <!-- breadcum -->
                                   <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb gsm-breadcrumb">
                                             <li class="breadcrumb-item"><a href="https://dev.mysimaccess.com/index5"><i
                                                            class="fa-solid fa-house"></i></a></li>
                                             <li class="breadcrumb-item"><a
                                                       href="https://dev.mysimaccess.com/#eSim">Plans</a></li>
                                             <li class="breadcrumb-item active" aria-current="page"><a
                                                       href="singleplan?tags=<?php echo $row['tags']; ?>"><?php echo $row['zone_name']; ?></a>
                                             </li>
                                        </ol>
                                   </nav>
                                   <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                                        onclick="CloseUrl();">
                                        <span aria-hidden="true"></span>
                                   </button>
                                   <!-- main content left side -->
                                   <div class="row no-gutters">
                                        <div class="col-lg-12 col-xl-4 country-img1">
                                             <div class="col-12">
                                                  <h5 class="font-weight-700 text-center pb-2 mb-2 plans-title">
                                                       <?php echo $row['zone_name']; ?></h5>
                                             </div>
                                             <div class="plan-city-img">
                                                  <figure>
                                                       <img class="img-fluid"
                                                            src="assets/images/continent/<?php echo $row['image']; ?>"
                                                            alt="<?php echo $row['zone_name']; ?>">
                                                  </figure>
                                             </div>
                                             <div class="col-12">
                                                  <div class="plans-tab">
                                                       <button class="accordion-button" type="button"
                                                            data-toggle="collapse" data-target="#collapseOne"
                                                            aria-expanded="true" aria-controls="collapseOne">
                                                            <div class="col-12 col-md-12 mb-3 pl-0">
                                                                 <span class="font-weight-600 plan-include-title">This
                                                                      plan includes the following </span>
                                                                 <span class="font-weight-600 text-success"><?php echo count(explode(",", $row['countries'])); ?>
                                                                      Countries:</span>
                                                            </div>
                                                       </button>


                                                       <div id="collapseOne" class="accordion-collapse collapse show"
                                                            aria-labelledby="headingOne"
                                                            data-bs-parent="#accordionExample">
                                                            <div class="accordion-body">
                                                                 <div class="tab-content " id="myTabContent">
                                                                      <div class="tab-pane fade show active"
                                                                           id="country-tab" role="tabpanel"
                                                                           aria-labelledby="country-tab">
                                                                           <div class="row">
                                                                                <?php 
                                                                   foreach (explode(",", $row['countries']) as $value) { 
                                                                    $country_row = mysqli_fetch_assoc(mysqli_query($con, "select * from countries where id='$value'"));
                                                                ?>
                                                                                <div class="col-lg-5 col-md-4 col-6 countfl"
                                                                                     style="margin:5px -20px">
                                                                                     <div class="hover-item">
                                                                                          <div class="hover-inner-wrap">
                                                                                               <figure class="py-0">
                                                                                                    <img class="img-fluid flag"
                                                                                                         src="assets/images/flag/<?php echo $country_row['flag']; ?>"
                                                                                                         alt="image">
                                                                                                    <br>
                                                                                                    <p>
                                                                                                         <?php echo ucwords($country_row['country_name']); ?>
                                                                                                    </p>
                                                                                               </figure>
                                                                                          </div>
                                                                                     </div>
                                                                                </div>
                                                                                <?php } ?>
                                                                           </div>
                                                                      </div>
                                                                 </div>
                                                            </div>
                                                       </div>
                                                  </div> <!-- above this -->
                                             </div>
                                        </div>
                                        <!--- Left -->


                                        <!-- main content right side -->
                                        <div class="col-lg-12 col-xl-8">
                                             <div class="px-4 px-md-3 px-lg-3 px-xl-3 px-xl-3 pt-5 nospace">
                                                  <div class="row">
                                                       <div class="col-12">
                                                            <!-- <div class="plans-tab">
                                        <button class="accordion-button" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        <div class="col-12 col-md-12 mb-3 pl-0">
                                                    <span class="font-weight-600 plan-include-title">This plan includes the following </span>
                                                    <span class="font-weight-600 text-success"><?php// echo count(explode(",", $row['countries'])); ?> Countries:</span>
                                                </div>
                                        </button> -->


                                                            <!-- <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                    <div class="tab-content " id="myTabContent">
                                                        <div class="tab-pane fade show active" id="country-tab" role="tabpanel" aria-labelledby="country-tab"> 
                                                            <div class="row">
                                                                <?php 
                                                                    foreach (explode(",", $row['countries']) as $value) { 
                                                                    $country_row = mysqli_fetch_assoc(mysqli_query($con, "select * from countries where id='$value'"));
                                                                ?>
                                                                <div class="col-6 col-md-3 col-lg-3 col-xl-2 countfl" style="margin:5px -20px">
                                                                    <div class="hover-item">
                                                                        <div class="hover-inner-wrap">
                                                                            <figure  class="py-0">
                                                                                <img class="img-fluid flag" src="assets/images/flag/<?php echo $country_row['flag']; ?>" alt="image">
                                                                                <p><?php echo ucwords($country_row['country_name']); ?></p>
                                                                            </figure>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> -->
                                                       </div> <!-- above this -->
                                                  </div>
                                             </div>

                                             <div class="row">
                                                  <div class="col-12">
                                                       <p style="font-family: 'Arial'; font-weight: 700;">Select Your
                                                            <span style="color:#003dbd">gsm</span><span
                                                                 style="color:#64ae02">2go</span> esim Package
                                                       </p>
                                                  </div>
                                             </div>



                                             <div class="row">
                                                  <form method="post" class="plan-form">

                                                       <div class="row loioi">
                                                            <?php
                                        $i = 1;
                                        $select_plan = mysqli_query($con, "select * from plans where zone_id='".$row['id']."' AND status='A'");
                                        while($plan_row = mysqli_fetch_assoc($select_plan)){
                                            $select_esimlive = mysqli_query($con, "select * from esimlive where status='A' AND id='1'");
                                            $esimlive_row = mysqli_fetch_assoc($select_esimlive);
                                    ?>
                                                            <div class="col-md-4 col-lg-3 col-xl-4 p-2 pl_op">
                                                                 <table class="table table-borderless bg_plan"
                                                                      style="margin-bottom:0rem !important;">
                                                                      <thead>
                                                                           <tr>
                                                                                <td class="font-weight-500 line-height pt-0"
                                                                                     colspan="2">
                                                                                     <div class="img_pklan d-flex"
                                                                                          style="padding-top: 15px;">
                                                                                          <ul
                                                                                               class="m-0 plan-charge-item p-0">
                                                                                               <?php if(!empty($plan_row['Days'])){ ?>
                                                                                               <li><i
                                                                                                         class="fa-solid fa-calendar-days"></i><?php echo $plan_row['Days']; ?>
                                                                                                    Days</li>
                                                                                               <?php } if(!empty($plan_row['GB'])){ ?>
                                                                                               <li><i
                                                                                                         class="fa-solid fa-database"></i><?php echo $plan_row['GB']; ?>
                                                                                                    GB Data</li>
                                                                                               <?php } ?>
                                                                                          </ul>
                                                                                          <div class="plan_img"
                                                                                               style="width:50%; text-align: end;">
                                                                                               <img src="assets/images/banner/tourimag.jpeg"
                                                                                                    alt="show_img"
                                                                                                    style="width:50%">
                                                                                          </div>
                                                                                     </div>
                                                                                </td>
                                                                           </tr>
                                                                      </thead>
                                                                      <tbody>
                                                                           <input type="hidden"
                                                                                class="usd<?php echo $plan_row['id']; ?>"
                                                                                value="<?php echo $plan_row['USD']; ?>">
                                                                           <?php
                                                        $select_esim = mysqli_query($con, "select * from esimlive where status='A' ORDER BY id DESC");
                                                        while($esim_row = mysqli_fetch_assoc($select_esim)){
                                                        if($esim_row['status']=="A"){
                                                        ?>
                                                                           <?php } } ?>
                                                                           <tr class="total_charge"
                                                                                style="background: #64ae02;">
                                                                                <?php
                                                                if($i == 1)
                                                                {
                                                                    $basic_plan = $plan_row['USD']; 
                                                                }
                                                            ?>
                                                                                <th class="pr-3 t_plan"><i
                                                                                          class="fa-solid fa-dollar-sign"></i><?php echo $plan_row['USD']+$esimamt+$actamt; ?>
                                                                                </th>
                                                                                <td
                                                                                     class="font-weight-800 text-right text-dark">
                                                                                     <input type="radio"
                                                                                          class="total total<?php echo $plan_row['id']; ?>"
                                                                                          name="charge"
                                                                                          id="<?php echo $plan_row['id']; ?>"
                                                                                          value="<?php echo $plan_row['id']; ?>"
                                                                                          onclick="get_plan_price('<?php echo $plan_row['USD']; ?>')"
                                                                                          readonly
                                                                                          <?php if($i==1){echo "checked";} ?>>
                                                                                </td>
                                                                           </tr>
                                                                      </tbody>
                                                                 </table>
                                                            </div>
                                                            <?php $i++; } ?>
                                                       </div>
                                                       <div class="row mars" style="margin: 20px 0;">
                                                            <div class="col-12">
                                                                 <p
                                                                      style="font-family: Arial; font-weight: 500; margin:0">
                                                                      Recommended Add Ons</p>
                                                            </div>
                                                       </div>

                                                       <div class="row loioi">
                                                            <div class="col-md-4 col-lg-3 col-xl-4 p-0 pl_op">
                                                                 <div class="exd">
                                                                      <div class="olan_ek">
                                                                           <div class="titlke_li">
                                                                                <p class="text-center">eSIM Live</p>
                                                                           </div>
                                                                           <div class="content_pl"
                                                                                style="font-size: 12px;padding-left:10px;padding-right:10px;">
                                                                                We keep your eSIM live for your next
                                                                                trip<br>(no need to reactive in the
                                                                                future) for<br>$1/month.<br>
                                                                                with this option, you keep your <span
                                                                                     style="color:#003dbd">gsm</span><span
                                                                                     style="color:#64ae02">2go</span><br>
                                                                                UK phone number active for incoming
                                                                                calls.
                                                                           </div>
                                                                           <div
                                                                                style="display: flex;align-items: center;justify-content:center;margin-top:5%;margin-bottom:5%">
                                                                                <label><span style="font-size:20px;"
                                                                                          class="text-center">$1/Month</span>
                                                                                     <input type="checkbox"
                                                                                          class="cheee"
                                                                                          id="esimlive<?php //echo $cid;?>"
                                                                                          name="esim_live"
                                                                                          value="<?php echo $live;?>"
                                                                                          <?php echo $chk;?>>
                                                                                </label>
                                                                           </div>
                                                                      </div>
                                                                 </div>
                                                            </div>
                                                            <div class="col-md-4 col-lg-3 col-xl-4 p-0 pl_op">
                                                                 <div class="exd">
                                                                      <div class="olan_ek">
                                                                           <div class="titlke_li">
                                                                                <p class="text-center">Auto Renew</p>
                                                                           </div>
                                                                           <div class="content_pl"
                                                                                style="font-size: 12px;padding-left:10px;padding-right:10px;">
                                                                                Never run out of data.<br>When you data
                                                                                allocation reaches its limit<br>We will
                                                                                automatically apply a new package<br>
                                                                                for you.<br><br>
                                                                           </div>
                                                                           <div
                                                                                style="display: flex;align-items: center;justify-content:center;margin-top:13%;margin-bottom:5%">
                                                                                <label><span style="font-size:20px;"
                                                                                          class="text-center">Opt for
                                                                                          auto Renewal</span>
                                                                                     <?php
                                                                    if($autorenew_status == 1)
                                                                    {
                                                                        $test_check ="checked";
                                                                    }
                                                                    else
                                                                    {
                                                                        $test_check ="";
                                                                    }
                                                                ?>
                                                                                     <input type="checkbox"
                                                                                          id="autorenewal_data"
                                                                                          class="cheee"
                                                                                          name="autorenewal"
                                                                                          <?php echo $test_check;  ?>>
                                                                                </label>
                                                                           </div>
                                                                      </div>
                                                                 </div>
                                                            </div>
                                                            <div class="col-md-4 col-lg-3 col-xl-4 p-0  pl_op">
                                                                 <div class="exd">
                                                                      <div class="olan_ek">
                                                                           <div class="titlke_li">
                                                                                <p class="text-center">Talk Time Options
                                                                                </p>
                                                                           </div>
                                                                           <div class="content_pl"
                                                                                style="font-size: 12px;padding-left:10px;padding-right:10px;">
                                                                                Get 100 Voice Munites<br>
                                                                                50 incoming munites<br>
                                                                                50 Outgoing munites<br>
                                                                                <br><br>
                                                                                <!-- with this option, you keep your <span style="color:#003dbd">gsm</span><span style="color:#64ae02">2go</span><br>
                                                    UK phone number active for incoming calls. -->
                                                                           </div>
                                                                           <div
                                                                                style="display: flex;align-items: center;justify-content:center;margin-top:30%;margin-bottom:5%">
                                                                                <label><span style="font-size:20px;"
                                                                                          class="text-center">$8</span>
                                                                                     <input type="checkbox"
                                                                                          class="cheee" id="talktime"
                                                                                          name="esim_live"
                                                                                          value="<?php echo $live;?>"
                                                                                          <?php echo $chk;?>>
                                                                                </label>
                                                                           </div>
                                                                      </div>
                                                                 </div>
                                                            </div>
                                                       </div>



                                                       <div class="row mars_under" style="padding: 10px;">
                                                            <div class="col-12 mx-auto green-btn">
                                                                 <div class="form-check mb-2">
                                                                      <input
                                                                           class="form-check-input compatibility compatibility<?php echo $plan_row['id']; ?>"
                                                                           type="checkbox"
                                                                           value="<?php echo $plan_row['id']; ?>">
                                                                      <label class="form-check-label">
                                                                           I understand that in order to use an eSIM, I
                                                                           need an eSIM compatible phone (please see <a
                                                                                href="<?php echo constant("SITEURL"); ?>esim-phones"
                                                                                target="blank">list</a> here).
                                                                      </label>
                                                                 </div>
                                                                 <div class="form-check term-border">
                                                                      <input
                                                                           class="form-check-input agree agree<?php echo $plan_row['id']; ?>"
                                                                           type="checkbox"
                                                                           value="<?php echo $plan_row['id']; ?>">
                                                                      <label class="form-check-label">
                                                                           I am ok with the <font color="blue">gsm
                                                                           </font>
                                                                           <font color="green">2go</font> eSIM <a
                                                                                href="<?php echo constant("SITEURL"); ?>tnc"
                                                                                target="blank">Term and Conditions and
                                                                                Privacy Policy</a>
                                                                      </label>
                                                                 </div>
                                                            </div>
                                                       </div>

                                             </div>
                                             <div class="col-12 box_bt_cart">
                                                  <div class="row">
                                                       <div class="col-12  ms-auto green-btn">
                                                            <div class="row justify-content-between planss">
                                                                 <div class="planspace col-lg-3">
                                                                      <div class="d-flex mt-4  mb-4 mkr">
                                                                           <div>
                                                                                <button class="btnmp btn px-2"
                                                                                     onclick="func_minus(); return false;"><i
                                                                                          class="fas fa-minus"></i></button>
                                                                                <input type="text" name="qty"
                                                                                     class="myinput2 num_mp"
                                                                                     id="quantity_220" value="1"
                                                                                     size="2" readonly="">
                                                                                <input type="hidden" name="cid" id="cid"
                                                                                     value="220">
                                                                                <button id="btn_220"
                                                                                     class="btnmp btn btn-link px-2"
                                                                                     onclick="func_plus(); return false;"><i
                                                                                          class="fa fa-plus"></i></button>
                                                                           </div>
                                                                           <input type="hidden" id="plan_price"
                                                                                value="<?php echo $basic_plan; ?>">
                                                                           <h5
                                                                                style="margin:5px 0px 0px 5px; font-family: arial;">
                                                                                $<input type="text" name="cost"
                                                                                     class="myinput pmpr" id="cost_220"
                                                                                     value="<?php echo $basic_plan; ?>"
                                                                                     size="4" readonly=""
                                                                                     fdprocessedid="na5b5i"></h5>

                                                                      </div>
                                                                 </div>
                                                                 <div class="col-5 col-lg-3">
                                                                      <input type="hidden"
                                                                           value="<?php echo $plan_row['id']; ?>">
                                                                      <input type="hidden" name="direct"
                                                                           value="<?php echo $plan_row['id']; ?>">

                                                                      <?php 
                                                $cookieValue = base64_decode($_COOKIE['a2k_key']);
                                                $cart_details = mysqli_query($con, "select * from cart_items where cookie_id='".$cookieValue."' AND product_id='".$plan_row['id']."' AND ordered='0'");
                                                if(mysqli_num_rows($cart_details) > 0) { ?>
                                                                      <button type="button"
                                                                           onclick="window.location='cart2'; return false;"
                                                                           id="addtocart_<?php echo $plan_row['id']; ?>"
                                                                           style="font-size:15px;"
                                                                           class="btn btn-block btn-round btn-md btn-success mt-4 mb-4 buy-now<?php echo $plan_row['id']; ?>"
                                                                           disabled>Added to cart</button>
                                                                      <?php } else { ?>
                                                                      <button type="button"
                                                                           onclick="add2cart('<?php echo $plan_row['id']; ?>');"
                                                                           id="addtocart_<?php echo $plan_row['id']; ?>"
                                                                           style="font-size:15px;"
                                                                           class="btn btn-block btn-round btn-md btn-success mt-4 mb-4 buy-now<?php echo $plan_row['id']; ?>"
                                                                           disabled>Add to cart</button>
                                                                      <?php } ?>
                                                                 </div>
                                                                 <div class="col-5 col-lg-3">
                                                                      <?php if(isset($_SESSION['user'],$_SESSION['role']) && $_SESSION['role']=="U"){ ?>
                                                                      <button type="submit"
                                                                           formaction="<?php echo constant("SITEURL"); ?>checkout"
                                                                           id="<?php echo $plan_row['id']; ?>"
                                                                           style="font-size:15px;"
                                                                           class="btn btn-block btn-round btn-md btn-primary mt-4 mb-4 buy-now<?php echo $plan_row['id']; ?>"
                                                                           disabled>Proceed to Buy</button>
                                                                      <?php } else{ ?>
                                                                      <button type="submit"
                                                                           formaction="<?php echo constant("SITEURL"); ?>signup"
                                                                           id="<?php echo $plan_row['id']; ?>"
                                                                           style="font-size:15px;"
                                                                           class="btn btn-block btn-round btn-md btn-primary mt-4 mb-4 buy-now<?php echo $plan_row['id']; ?>"
                                                                           disabled>Proceed to Buy</button>
                                                                      <?php } ?>
                                                                 </div>
                                                            </div>

                                                       </div>


                                                  </div>


                                             </div>
                                        </div>
                                   </div>


                              </div>
                              <!-- <div class="row">
                                <div class="col">
                                    <div class="ti_wh">
                                <h3>  What you<span class="sp_tx_wh" style="color:green">  should know</span></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class=" block_what_should">
                                        <div class="ic_what_should text-left">
                                        <i class="fa-regular fa-phone-slash"></i>
                                        </div>
                                        <div class="title_what_should text-left">
                                        No local phone number
                                        </div><br>
                                        <div class="sub_tex_what_should text-left">
                                        This eSIM only includes data. It does not allow you to make cell phone calls or send SMS messages. You can still use WhatsApp or Skype to call your contacts.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class=" block_what_should">
                                        <div class="ic_what_should text-left">
                                        <i class="fa-light fa-sim-card"></i>
                                        </div>
                                        <div class="title_what_should text-left">
                                        Your phone must be compatible with the eSIM
                                        </div>
                                        <div class="sub_tex_what_should text-left">
                                        Make sure that your phone is unlocked and that it is one of our supported devices: Apple iPhone XR, XS, XS Max, 11, 11 Pro and 11 Pro Max, 12, 12 Mini and Google Pixel 3, 4, 5.                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class=" block_what_should">
                                        <div class="ic_what_should text-left">
                                        <i class="fa-solid fa-plane-departure"></i>
                                        </div>
                                        <div class="title_what_should text-left">
                                        Install before you travel and take off
                                        </div><br>
                                        <div class="sub_tex_what_should text-left">
                                        Scan the QR code from your smartphone settings and add the data plan. But don’t activate it until you land at your destination. Take the printed QR code on your travels just in case.
                                                          </div>
                                    </div>
                                </div>
                            </div>
                                
                                <?php //$i++; } ?>
                                    </form>
                                </div>
                            </div>
                        </div>

                       
                     -->


                              <!-- ==== -->




                         </div>
                    </div>

               </div>

          </div>

          </div>



          <div class="container should-know">
               <div class="row">
                    <div class="col">
                         <div class="ti_wh">
                              <h3> What’s Unique About the <font color="blue">gsm</font>
                                   <font color="green"><i>2go</i></font> eSIM
                              </h3>
                         </div>
                    </div>
               </div>
               <div class="row">
                    <div class="col-lg-3 col-md-6">
                         <div class=" block_what_should">
                              <div class="ic_what_should text-left">
                                   <i class="fa-solid fa-phone-slash"></i>
                              </div>
                              <!-- <div class="title_what_should text-left">
                                        </div><br> -->
                              <div class="sub_tex_what_should text-left">
                                   <b>Comes with a UK mobile phone number*</b>

                                   *With the Talk Time add-on option.
                                   USA and other phone numbers available upon request.
                              </div>
                         </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                         <div class=" block_what_should">
                              <div class="ic_what_should text-left">
                                   <i class="fa-solid fa-sim-card"></i>
                              </div>
                              <!-- <div class="title_what_should text-left">
                                        </div> -->
                              <div class="sub_tex_what_should text-left">
                                   <b>Not a scratch and dump eSIM. This eSIM is a keeper</b>

                                   *With the Talk Time add-on option:
                                   You can keep your <font color="blue">gsm</font>
                                   <font color="green"><i>2go</i></font> eSIM after your travel and make international
                                   calls and receive calls on your UK/USA/other phone number.
                              </div>
                         </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                         <div class=" block_what_should">
                              <div class="ic_what_should text-left">
                                   <i class="fa-solid fa-plane-departure"></i>
                              </div>
                              <!-- <div class="title_what_should text-left">
                                        </div><br> -->
                              <div class="sub_tex_what_should text-left">
                                   <b>You can install your eSIM immediately after purchasing it.</b>

                                   You have 90 days to start using your plan.
                                   But once you <a href="#"
                                        style="color: #212529; text-decoration: underline !important;"> activate </a> it
                                   on your phone and <a href="#"
                                        style="color: #212529; text-decoration: underline !important;"> register on a
                                        network,</a> your plan’s allocated duration begins.
                              </div>
                         </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                         <div class=" block_what_should">
                              <div class="ic_what_should text-left">
                                   <i class="fa-solid fa-list"></i>
                              </div>
                              <!-- <div class="title_what_should text-left">
                                        Install before you travel and take off
                                        </div><br> -->
                              <div class="sub_tex_what_should text-left">
                                   Please make sure your phone is eSIM compatible. Check our eSIM compatible phone list
                                   <a href="https://www.gsm2go.com/esim-phones">eSIM compatible phone list</a>
                              </div>
                         </div>
                    </div>
               </div>


          </div>

          </div>
          </div>
          </div>
          <?php } ?>


          <!-- Button trigger modal -->

          <!-- Modal -->
          <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
               aria-labelledby="staticBackdropLabel" aria-hidden="true">
               <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                         <div class="modal-header">
                              <h5 class="modal-title" id="staticBackdropLabel">Select languages</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal"
                                   aria-label="Close"></button>
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
          function togglePopup() {
               $(".content").toggle();
               $("#bg-black").toggleClass("bg-loading");
          }
          $(document).ready(function() {
               readrecords();
          });

          $('#esimlive').change(function() {
               var qty = $("#quantity_220").val();
               var total = $("#cost_220").val();
               if ($(this).is(':checked')) {
                    total = Number(total) + Number(qty);
                    $("#cost_220").val(total);
               } else {
                    total = Number(total) - Number(qty);
                    $("#cost_220").val(total);
               }
          });

          $('#talktime').change(function() {
               var qty = $("#quantity_220").val();
               var total = $("#cost_220").val();
               if ($(this).is(':checked')) {
                    total = Number(total) + (Number(qty) * 8);
                    $("#cost_220").val(total);
               } else {
                    total = Number(total) - (Number(qty) * 8);
                    $("#cost_220").val(total);
               }
          });

          function func_minus() {
               var qty = $("#quantity_220").val();
               var plan_price = $("#plan_price").val();
               var total = $("#cost_220").val();
               if (qty > 1) {
                    qty--;

                    plan_price = total - plan_price;
                    if ($("#esimlive").is(':checked')) {
                         plan_price--;
                    }
                    if ($("#talktime").is(':checked')) {
                         plan_price = Number(plan_price) - 8;
                    }
                    $("#quantity_220").val(qty);
                    $("#cost_220").val(plan_price);
               }
          }

          function func_plus() {
               var qty = $("#quantity_220").val();
               var plan_price = $("#plan_price").val();
               var total = $("#cost_220").val();
               qty++;
               plan_price = Number(total) + Number(plan_price);
               if ($("#esimlive").is(':checked')) {
                    plan_price++;
               }
               if ($("#talktime").is(':checked')) {
                    plan_price = Number(plan_price) + 8;
               }
               $("#quantity_220").val(qty);
               $("#cost_220").val(plan_price);

          }

          function get_plan_price(price) {
               $('#esimlive').prop('checked', false);
               $('#autorenewal_data').prop('checked', false);
               $('#talktime').prop('checked', false);
               var qty = $("#quantity_220").val(1);
               $("#plan_price").val(price);
               $("#cost_220").val(price);
          }

          function add2cart(planId) {
               var planId = $('input[name="charge"]:checked').val();
               var qty = $("#quantity_220").val();
               var esimLive = 0;
               if ($('#esimlive').is(":checked")) {
                    var esimLive = 1;
               }
               var autorenewal = 0;
               if ($('#autorenewal_data').is(":checked")) {
                    var autorenewal = 1;
               }
               var talktime = 0;
               if ($('#talktime').is(":checked")) {
                    var talktime = 1;
               }

               $.ajax({
                    url: "ajax/add-to-cart.php",
                    type: "POST",
                    data: {
                         planId: planId,
                         autorenewal: autorenewal,
                         esimLive: esimLive,
                         qty: qty,
                         talktime: talktime
                    },
                    success: function(data) {
                         $('#basketitems').html(data);
                         window.location = 'cart2';
                    }
               });
               return false;
          }

          function readrecords() {

               $('.esim').each(function() {
                    if ($(this).is(':checked')) {
                         var id = $(this).attr("id");
                         var val = $(this).val();

                         var usd = $(".usd" + val).val();
                         var act = $(".activation" + val).val();
                         var eamt = $(".esim-amt" + val).val();

                         $(".display-activa" + val).attr("style",
                              "text-decoration: line-through !important;color:red;padding-right:7px");
                         totalSubAmount = Number(usd) + Number(eamt);
                         $(".total" + val).val(totalSubAmount);
                    } else {
                         var id = $(this).attr("id");
                         var val = $(this).val();

                         var usd = $(".usd" + val).val();
                         var act = $(".activation" + val).val();
                         var eamt = $(".esim-amt" + val).val();

                         $(".display-esim" + val).attr("style", "color: #fff !important");
                         totalSubAmount = Number(usd) + Number(act) + Number(0);
                         $(".total" + val).val(totalSubAmount);

                    }
               })
          }

          $(document).ready(function() {

               $(".esim").change(function() {
                    //if ($(".esim").is(":checked")) {
                    //if($(".esim").prop('checked') == true){
                    if ($(this).is(':checked')) {
                         var id = $(this).attr("id");
                         var val = $(this).val();

                         var usd = $(".usd" + val).val();
                         var act = $(".activation" + val).val();
                         var eamt = $(".esim-amt" + val).val();

                         //var v = $(".total"+val).val("15");
                         //$(".display-esim"+val).css("display", "none !important");
                         $(".display-esim" + val).attr("style", "color: #717171 !important");
                         totalSubAmount = Number(usd) + Number(eamt);
                         $(".total" + val).val(totalSubAmount);
                         $(".display-activa" + val).attr("style",
                              "text-decoration: line-through !important;color:red;padding-right:7px"
                         );
                    } else {
                         var id = $(this).attr("id");
                         var val = $(this).val();

                         var usd = $(".usd" + val).val();
                         var act = $(".activation" + val).val();

                         //var v = $(".total"+val).val("15");
                         //$(".display-esim"+val).css("display", "none !important");
                         $(".display-esim" + val).attr("style", "color: #fff !important");
                         totalSubAmount = Number(usd) + Number(act) + Number(0);
                         $(".total" + val).val(totalSubAmount);
                         $(".display-activa" + val).attr("style",
                              "text-decoration: none !important;padding-right:7px");

                    }
               });

               $(".compatibility").change(function() {

                    if ($(this).is(":checked")) {
                         var val = $(this).val();
                         if ($('.agree' + val).is(":checked")) {
                              $('.buy-now' + val).removeAttr("disabled");
                              $('#buybutton_' + val).attr("onclick", "sendDetails(" + val + ")");
                         }
                    } else {
                         var val = $(this).val();
                         $('.buy-now' + val).prop('disabled', true);
                         $(val).removeAttr("onclick");
                    }
               });
               $(".agree").change(function() {
                    if ($(this).is(":checked")) {
                         var val = $(this).val();
                         if ($('.compatibility' + val).is(":checked")) {
                              $('.buy-now' + val).removeAttr("disabled");
                              $('#buybutton_' + val).attr("onclick", "sendDetails(" + val + ")");
                         }
                    } else {
                         var val = $(this).val();
                         $('.buy-now' + val).prop('disabled', true);
                         $(val).removeAttr("onclick");
                    }
               });

          });

          $(".buybutton").click(function() {
               sendDetails(this.id);
          });

          function sendDetails(planId) {
               var esim = 0;
               if ($('#esim' + planId).is(":checked")) {
                    var esim = 1;
               }
               var totalamount = $('#totalValue_' + planId).val();
               window.location.replace("pay_now.php?direct=" + planId + "&esim=" + esim + "&charge=" + totalamount);
          }
          </script>
          <script type="text/javascript">
          $(".datepicker").datepicker({
               dateFormat: "dd-M-yy (D)",
               maxDate: '+15d',
               minDate: '+0d',
               defaultDate: <?php echo date('m/d/Y', strtotime("+1 day")); ?>
          });
          </script>
     </body>

</html>