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
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="node_modules/animate.css/animate.min.css">
    <link rel="stylesheet" href="node_modules/%40fancyapps/fancybox/dist/jquery.fancybox.min.css">
    <link rel="stylesheet" href="node_modules/owl.carousel/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="node_modules/owl.carousel/dist/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="assets/css/style.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;subset=latin-ext" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i,900,900i&amp;subset=latin-ext" rel="stylesheet">
    <style>
    body{ font-family:arial;font-size:0.875rem; }
    .accordion-title{color:#000}
       .accordion .card .card-header{ 
		background-color: transparent;
		height:40px;
    background-color:transparent;
    border: 1px solid #d5e7ff;
    transition: 0.5s;
    position: relative;
	 }
     .accordion .card .card-header .arrow-icon{
        position: absolute;
        top:50%;
        transform: translateY(-50%);
        right: 15px;
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
            position: absolute !important;
    		right: 30px !important;
            top: 50% !important;
            transform: translateY(-50%);
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

            <div class="row mb-5 faqq">
                <div class="col-lg-12">
                    <div class="pr-xl-3 pb-5 pb-lg-0 faqq">
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
                                    <span class="arrow-icon"><i class="fa-solid fa-chevron-down"></i></span>   

                                    </h5>
                                </div>
                                <div id="topicOneCollapse<?php echo $i; ?>" class="collapse <?php if($i==1){ echo 'show'; } ?>" aria-labelledby="topicOneHeading<?php echo $i; ?>" data-parent="#topicOne">
                                    <div class="card-body py-0">
                                        <?php echo trim($row['content']); ?>
                                    </div>
                                </div>
                            </div>
                            <?php $i++; } ?>

                        </div>
                    </div>
                </div>
                <div class="row">
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
				 <div class="col-md-4 text-center"><img style="max-width:80%" src="assets/images/upload/iphone13pro.png" /></div>
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

                        <a href="contact-us.php?value=faq" class="btn btn-lg btn-round btn-outline-light mb-0"><i class="fas fa-paper-plane"></i>Contact Us</a>
                        
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