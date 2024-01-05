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
    <title>gsm2go eSIM | About Us</title>
    <?php include("includes/logrocket.php"); ?>
    <link rel="stylesheet" href="node_modules/%40fortawesome/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="node_modules/animate.css/animate.min.css">
    <link rel="stylesheet" href="node_modules/%40fancyapps/fancybox/dist/jquery.fancybox.min.css">
    <link rel="stylesheet" href="node_modules/owl.carousel/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="node_modules/owl.carousel/dist/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="assets/css/style.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;subset=latin-ext" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i,900,900i&amp;subset=latin-ext" rel="stylesheet">
    <style>
        font-family: Calibri, sans-serif;
        font-size:11pt;
        @media only screen and (min-width: 992px){
            .fixed-footer{ position:fixed !important;left:0!important;right:0!important;bottom:0!important;}
        }


        .recharge-section{
            padding: 100px 0 150px;
        }
        .footer-bottom {
    position: fixed;
    width: 100%;
    bottom: 0;
    background-color: rgb(16 22 29);
}
.recharge-content {
    width: 800px;
    max-width: 100%;
    margin: 0 auto;
    padding: 50px 20px;
    border: 1px solid lightgray;
    border-radius: 15px;
    box-shadow: 8px 8px 0px -2px rgba(0,0,0,0.2);
}
.recharge-content form input {
    padding: 25px 20px;
    border-radius: 30px;
    font-size: 18px;
}
.recharge-button .btn{
    padding: 10px 75px;
    font-size: 17px;
    border-radius: 30px;
}



@media(max-width: 1199px){
    .navik-header .logo {
    float: left;
    padding: 0 0 10px 0;
}
.text-world {
    padding-top: 0 !important;
}
.recharge-section{
            padding: 70px 0 100px;
        }
}
@media(max-width: 991px){
    .recharge-section{
            padding: 50px 0 70px;
        }
}
@media(max-width: 767px){
    .recharge-section{
            padding: 30px 0 70px;
        }
        .recharge-content form input {
    padding: 20px 20px;
    font-size: 17px;
}
.recharge-button .btn {
    padding: 6px 50px;
    font-size: 17px;
}
}
@media(max-width: 575px){
    .navik-header .logo img {
    width: 180px;
}
.topcorner {
    top: 0 !important;
}
.navik-header .burger-menu {
    top: 23px !important;
    left: 96% !important:
}
}













    </style>
</head>
<body>
<?php include("includes/header.php");
$number=$_REQUEST['data_number'];
if(strlen($number)=='19')
{

}
if(strlen($number) < '19')	
{

}	
	?>


<!-- recharge section start  -->

<section class="recharge-section">
    <div class="container">
        <div class="recharge-content">
        <h2>Four Equal Columns</h2>

<div class="row">
  <div class="column" style="background-color:#aaa;">
      <br><br>
    <h3>Europe 8 Days</h3>
    <p>Talk Time: 500 Minutes</p>
    <p>Validity: 8 Days</p>
    <p>Data: 5GB</p>
  <a href="#">  <img src="assets/images/buy_now.png"></img></a>
    <p>Recommended Plan</p>
  </div>
  <div class="column" style="background-color:#bbb;">
        <br><br>
    <h3>Europe 8 Days</h3>
    <p>Talk Time: 500 Minutes</p>
    <p>Validity: 8 Days</p>
    <p>Data: 5GB</p>
    <a href="#">  <img src="assets/images/buy_now.png"></img></a>
    <p>Recommended Plan</p>
  </div>
  <div class="column" style="background-color:#ccc;">
        <br><br>
    <h3>Europe 8 Days</h3>
    <p>Talk Time: 500 Minutes</p>
    <p>Validity: 8 Days</p>
    <p>Data: 5GB</p>
    <a href="#">  <img src="assets/images/buy_now.png"></img></a>
    <p>Recommended Plan</p>
  </div>
  <div class="column" style="background-color:#ddd;">
        <br><br>
    <h3>Europe 8 Days</h3>
    <p>Talk Time: 500 Minutes</p>
    <p>Validity: 8 Days</p>
    <p>Data: 5GB</p>
    <a href="#">  <img src="assets/images/buy_now.png"></img></a>
    <p>Recommended Plan</p>
  </div>
</div>
        </div>
    </div>
</section>



<!-- recharge section end  -->


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

    </body>
    </html>