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
    <title>gsm2go eSIM | Virtual Number (DIDs)</title>
    <?php include("includes/logrocket.php"); ?>
    <link rel="stylesheet" href="node_modules/%40fortawesome/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="node_modules/animate.css/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="node_modules/%40fancyapps/fancybox/dist/jquery.fancybox.min.css">
    <link rel="stylesheet" href="node_modules/owl.carousel/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="node_modules/owl.carousel/dist/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="assets/css/style.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;subset=latin-ext" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i,900,900i&amp;subset=latin-ext" rel="stylesheet">
   
   
     <!-- new css link start -->
    
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- new css link end  -->

   
   <style>
        body{ font-family: Calibri, sans-serif;
        font-size:11pt; }
        @media only screen and (min-width: 992px){
            .fixed-footer{ position:fixed !important;left:0!important;right:0!important;bottom:0!important;}
        }

        /* rtl start  */

        .navik-header-container{
    display:flex;
    align-items: center;
    /* flex-direction: row-reverse; */
    justify-content: space-between;
}
.topcorner {
    position: absolute;
    top: 15px;
    left: 0;
}
.shoppingbasket {
    width: 40px;
    height: 40px;
    background-color: #fff;
    top: 10px;
}
nav.navik-menu ul {
    direction: rtl;
}
.container-fluid.d-none1 .row{
    justify-content: right;
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
.card .row .col-12{
    text-align: right;
}
 
 

        /* rtl end  */


 @media(max-width: 1280px){
    .topcorner {
    left: 100px;
}
.navik-menu {
    background-color: #fff;
    position: absolute;
    z-index: 1;
    width: 100%;
    left: 0;
    top: 0;
}
.navik-header-container {
    justify-content: stretch;
}
nav.navik-menu ul {
    direction: rtl;
    padding-top: 70px;
}
.navik-header .logo img {
    width: 150px;
    margin-left: 0;
}
.body-fixed-sidebar, .navik-header, .navik-header-overlay{
    padding: 0 !important;
}
 }     
 @media(max-width: 991px){
.col-lg-6.text-center.text-lg-left.mb-2.mb-lg-0 {
    justify-content: center;
}
.col-lg-6.text-center.text-lg-right {
    justify-content: center;
}
}
 @media(max-width: 575px){
    .card-padding{
        padding: 0 !important;
    }
    .col-lg-6.text-center.text-lg-left.mb-2.mb-lg-0{
        justify-content: center !important;
    }
 }

/* new css start  */
 
        @media(min-width: 1400px){
            .container{
                max-width: 1260px;
            }
        }
        @media( max-width: 1199px){
		.topcorner {
            position: initial;
    		right: -10px !important;
		}
	   }
       .navik-header-container {
        padding-right: 60px !important;
        }

        @media(max-width: 991px){
    .topcorner {
    left: 65%;
}
}
@media(max-width: 575px){
    .topcorner {
    left: 43%;
}
}
@media(max-width: 400px){
    .topcorner {
    left: 33%;
}
}

/* new css end  */

    </style>
</head>
<body class="bg-image bg-fixed">
<?php include("includes/header.php"); ?>
<?php
$select = mysqli_query($con, "Select * from pages where id='5'");
$row = mysqli_fetch_assoc($select);
?>
<!-- Page title -->
<div class="container">
<div class="d-flex flex-column w-100">
    <div class="page-title d-flex align-items-center bg-image" data-img-src="assets/images/upload/top_vn.jpg">
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
<div class="pt-0">

    <div class="section mt-5">
        <div class="container">
            <div class="row">

                <!-- Content body -->
                <div class="col-lg-12">

                    <div class="pb-3 mb-3">
                        <div class="bg-white rounded-xl py-5 card-padding">
     
                            <div class="card" style="border:none">
                                <div class="row">
                                    <div class="col-12" style="direction:RT:;">
                                       
										<p dir="rtl"><font face="Arial"><a name="OLE_LINK4"><b>שיחות נכנסות:</b></a></p>
											<p dir="rtl">אם בחרתם בדקות שיחה, נשייך לאי-סים שלכם מספר בריטי לשיחות ומסרונים.</font></p>
										<p dir="rtl"><font face="Arial">בנוסף, נוכל לשייך מספר ישראלי, מספר אמריקאי ומספרים מכ 50 מדינות נוספות.</p><p dir="rtl"><font face="Arial"> צרו איתנו קשר.</font></p>
										<p dir="rtl"><font face="Arial"><br><b>מספר מוצג בשיחה יוצאת מזוהה:</b></p>

<p dir="rtl">תוכלו לבחור איזה מספר יוצג בשיחה יוצאת.</font></p>
										<p dir="rtl"><font face="Arial">נוכל אפילו להציג את המספר הנייד הישראלי המקורי שלכם (05x) בשיחה יוצאת לארץ.</font></p>
									

										
                                    </div>
                                </div>
                            </div>
                        </div>
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

<!-- Go to top -->
<div class="go-to-top">
    <a href="#" class="rounded-circle"><i class="fas fa-chevron-up"></i></a>
</div>
<script src="https://activations.gsm2go.com/js/vendor/jquery.min.js"></script>
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