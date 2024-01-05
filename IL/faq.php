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
    <title>gsm2go eSIM | FAQ</title>
    <?php include("includes/logrocket.php"); ?>
    <link rel="stylesheet" href="node_modules/%40fortawesome/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="node_modules/animate.css/animate.min.css">
    <link rel="stylesheet" href="node_modules/%40fancyapps/fancybox/dist/jquery.fancybox.min.css">
    <link rel="stylesheet" href="node_modules/owl.carousel/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="node_modules/owl.carousel/dist/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="assets/css/style.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;subset=latin-ext" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i,900,900i&amp;subset=latin-ext" rel="stylesheet">
    
     <!-- new css link start -->
    
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- new css link end  -->
    
    <style>
    body{ font-family:arial;font-size:0.875rem; }
    .accordion-title{color:#000}
       .accordion .card .card-header{ background-color:#ccc;height:40px; }

	    /* rtl start  */

        .navik-header-container{
    display:flex;
    align-items: center;
    justify-content: space-between;
}
.topcorner {
    position: absolute;
    top: 0;
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
.accordion {
    direction: rtl;
    text-align: right;
}
.row-reverse{
	direction: rtl;
}
.con-btn{
	direction: rtl;
}
 

/* rtl end  */


@media(max-width: 1280px){
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
a.btn.btn-lg.btn-round.btn-outline-light.mb-0.con-btn i {
    margin-left: 10px;
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

/* new css start  */

       .accordion .card .card-header{ 
		background-color: transparent;
		height:40px;
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
	   @media(min-width: 1400px){
		.container{
			max-width: 1260px;
		}
	   }
	   @media( max-width: 1199px){
		.topcorner {
    		right: -10px !important;
		}
	   }
	   .accordion{
		padding: 0 !important;
	   }
	   .faqq{
		padding-right: 0 !important;
	   }
	   .navik-header-container {
        padding-right: 60px !important;
        }
		.card-header {
   
}
@media(max-width: 575px){
    .accordion .card .card-header{
        height: auto;
    }
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
<body>
<?php include("includes/header.php"); ?>

<!-- Content -->
<div class="main-content py-0">

    <!-- Accordion answers section -->
    <div class="section">
        <div class="container">

            <div class="row my-5">
                <div class="col-lg-8 offset-lg-2">
                    <div class="text-center">

                        <!--<h5 class="font-weight-400">How To Get Started</h5>-->

                        <div data-height="3px"></div>

                        <h2 class="h2 section-title-4 font-weight-800">
                            Frequently Asked Questions
                            <div class="title-divider-round"></div>
                        </h2>
                        
                    </div>
                </div>
            </div>

            <div class="row mb-5">
                <div class="col-lg-12">
                    <div class="pr-xl-3 pb-5 pb-lg-0">
                        <div class="accordion" id="topicOne">
                            <?php
                            $i = 1;
                            $select = mysqli_query($con, "select * from faq where status='A'");
                            while($row = mysqli_fetch_assoc($select)){
                            ?>
                            <div class="card">
                                <div class="card-header py-0" id="topicOneHeading<?php echo $i; ?>">
                                    <h5 class="accordion-title" data-toggle="collapse" data-target="#topicOneCollapse<?php echo $i; ?>" aria-expanded="true" aria-controls="topicOneCollapse<?php echo $i; ?>">
                                        <?php echo $row['title']; ?>
                                        <span class="right-icon"><i class="fa-solid fa-chevron-down"></i></span>
                                    </h5>
                                </div>
                                <div id="topicOneCollapse<?php echo $i; ?>" class="collapse <?php if($i==1){ echo 'show'; } ?>" aria-labelledby="topicOneHeading<?php echo $i; ?>" data-parent="#topicOne">
                                    <div class="card-body py-0">
                                        <?php echo $row['content']; ?>
                                    </div>
                                </div>
                            </div>
                            <?php $i++; } ?>

                        </div>
                    </div>
                </div>
                <div class="row row-reverse">
				 <div class="col-md-4">
				  <div class="row">
				  <div class="col-md-12">
				   <div style="width:60%;float:left;text-align:right">
				   <h6 style="text-align:right">Easy Steps</h6>
				   <p>Soft SIM for smart phones.An embedded SIM. </p>
				   </div>
				   <div style="width:39%;float:right"><img src="assets/images/upload/phone-icon.jpg" /></div>
				  </div>
				  </div>
				  
				   <div class="row">
				  <div class="col-md-12">
				   <div style="width:60%;float:left;text-align:right">
				   <h6 style="text-align:right">Easy Steps</h6>
				   <p>Soft SIM for smart phones.An embedded SIM. </p>
				   </div>
				   <div style="width:39%;float:right"><img src="assets/images/upload/phone-icon.jpg" /></div>
				  </div>
				  </div>
				  
				   <div class="row">
				  <div class="col-md-12">
				   <div style="width:60%;float:left;text-align:right">
				   <h6 style="text-align:right">Easy Steps</h6>
				   <p>Soft SIM for smart phones.An embedded SIM. </p>
				   </div>
				   <div style="width:39%;float:right"><img src="assets/images/upload/phone-icon.jpg" /></div>
				  </div>
				  </div>
				  
				  
				   <div class="row">
				  <div class="col-md-12">
				   <div style="width:60%;float:left;text-align:right">
				   <h6 style="text-align:right">Easy Steps</h6>
				   <p>Soft SIM for smart phones.An embedded SIM. </p>
				   </div>
				   <div style="width:39%;float:right"><img src="assets/images/upload/phone-icon.jpg" /></div>
				  </div>
				  </div>
				  
				 </div>
				 <div class="col-md-4"><img style="max-width:80%" src="assets/images/upload/iphone13pro.png" /></div>
				 <div class="col-md-4">
				 <div class="row">
				   <div class="col-md-12">
				  
				   <div style="width:39%;float:left;text-align:right"><img src="assets/images/upload/phone-icon.jpg" /></div>
				   <div style="width:60%;float:right;text-align:left">
				   <h6 style="text-align:left">Easy Steps</h6>
				   <p>Soft SIM for smart phones.An embedded SIM. </p>
				   </div>
				  </div>
				 </div> 
				 
				  <div class="row">
				   <div class="col-md-12">
				  
				   <div style="width:39%;float:left;text-align:right"><img src="assets/images/upload/phone-icon.jpg" /></div>
				   <div style="width:60%;float:right;text-align:left">
				   <h6 style="text-align:left">Easy Steps</h6>
				   <p>Soft SIM for smart phones.An embedded SIM. </p>
				   </div>
				  </div>
				 </div> 
				 
				  <div class="row">
				   <div class="col-md-12">
				  
				   <div style="width:39%;float:left;text-align:right"><img src="assets/images/upload/phone-icon.jpg" /></div>
				   <div style="width:60%;float:right;text-align:left">
				   <h6 style="text-align:left">Easy Steps</h6>
				   <p>Soft SIM for smart phones.An embedded SIM. </p>
				   </div>
				  </div>
				 </div> 
				 
				 
				  <div class="row">
				   <div class="col-md-12">
				  
				   <div style="width:39%;float:left;text-align:right"><img src="assets/images/upload/phone-icon.jpg" /></div>
				   <div style="width:60%;float:right;text-align:left">
				   <h6 style="text-align:left">Easy Steps</h6>
				   <p>Soft SIM for smart phones.An embedded SIM. </p>
				   </div>
				  </div>
				 </div> 
				 
				  
				 </div>
				</div>
            </div>

        </div>
    </div>

    <!-- Call to action section -->
    <div class="container">
    <div class="section bg-image py-5" data-img-src="assets/images/upload/faq.jpg">
        <div class="container">
            <div class="row my-5">
                <div class="col-lg-8 offset-lg-2">
                    <div class="text-center my-4">

                        <h2 class="display-4 font-weight-800 text-white mb-4">Didn't Find an Answer?</h2>


                        <div data-height="20px"></div>

                        <a href="contact-us.php?value=faq" class="btn btn-lg btn-round btn-outline-light mb-0 con-btn"><i class="fas fa-paper-plane"></i>Contact Us</a>
                        
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

<!-- jQuery -->
<script src="assets/js/vendor/jquery-3.5.1.min.js"></script>
<!-- Bootstrap js -->
<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<!-- Navik Menu js -->
<script src="components/navik-navigation-menu/dist/js/navik.menu.js"></script>
<!-- Isotope and imagesloaded js -->
<script src="node_modules/isotope-layout/dist/isotope.pkgd.min.js"></script>
<script src="node_modules/imagesloaded/imagesloaded.pkgd.min.js"></script>
<!-- Fancybox js -->
<script src="node_modules/%40fancyapps/fancybox/dist/jquery.fancybox.min.js"></script>
<!-- OWL carousel js -->
<script src="node_modules/owl.carousel/dist/owl.carousel.min.js"></script>
<!-- Progress Circle js -->
<script src="node_modules/jquery-circle-progress/dist/circle-progress.min.js"></script>
<!-- Custom js -->
<script src="assets/js/custom.js"></script>
</body>
</html>