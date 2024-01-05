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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />   
    <!-- OWL carousel CSS -->
    <link rel="stylesheet" href="node_modules/owl.carousel/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="node_modules/owl.carousel/dist/assets/owl.theme.default.min.css">
    <!-- Main CSS -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="assets/css/style.min.css">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;subset=latin-ext" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i,900,900i&amp;subset=latin-ext" rel="stylesheet">
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    
    <style>
		.rtl{
		direction:rtl;
		}	

        /* slider */
        
        .banner-slides-wrapper:after {
    position: absolute !important;
    content: url(https://dev.mysimaccess.com/assets/images/banner/Header%20design.svg);
    bottom: -10px !important;
    left: -5px;
    right: -5px;
    z-index: 11;
}
.container{
    max-width:1260px;
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
/* .should-know .col-lg-3{
    padding: 0;
} */

.topcorner
 {
    position: relative !important;
    top: 0 !important;
    right: 0 !important;
}
/* @media(min-width: 1280px){
    .container.should-know{
        max-width: 1300px;
    } */
    
}
@media(min-width: 1600px){
    .container-fluid.banner-container{
        max-width: 1260px;
        padding: 0 15px !important;
    }
    .container.should-know {
    max-width: 1260px;
    padding-right: 0;
}
.faq-section .container{
    max-width: 1260px !important;
    padding-right: 30px;
}
/* .footer-bottom .container-fluid {
    max-width: 1410px !important;
    padding: 0;
} */

}
@media(max-width: 1440px){
    .navik-header .logo img {
    padding-left: 58px;
}
.footer-bottom .container-fluid {
    padding: 0 !important;
}
a.btn.btn-primary.recharge-btn {
    left: 30px !important;
}
.topcorner{
    right: 0 !important;
}
}
 
@media(max-width: 1199px){
    h4.display-5.mb-0.slide-animate.head-bn.animated.fadeInLeft {
    font-size: 23px !important;
}
.topcorner{
    right: 0 !important;
}
.page-header-block-height {
    min-height: 500px !important;
}
    .navik-header .burger-menu {
    right: 0 !important;
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
    width: 30% !important;
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
    padding-left: 15px;
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
    padding: 0 15px !important;
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
		height:40px;
    background-color:transparent;
    border: 1px solid #d5e7ff;
    transition: 0.5s;
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
        width: 100%;
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
    .container-fluid{
        max-width: 1260px;
        padding: 0 !important;
        margin: 0 auto;
    }
  
    .banner-slides-wrapper:after {
    bottom: -72%;
}
    .footer-bottom .container-fluid{
        max-width: 1260px !important;
        padding: 0 !important;
    }
    .navik-menu{
        float:left !important;
    }
    div#eSim{
        max-width: 1260px !important;
    }
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
    .row.top_ici {
    background: white !important;
    box-shadow: 2px 2px 6px rgba(0,0,0,0.2);
    margin: 50px 0 0 0;
    padding: 14px;
    border-radius: 15px;
}
.cust_name.d-flex div {
    font-size: 16px;
    font-family: roboto;
    margin: 10px 0;
}
/* .cust_name.d-flex {
    margin: 10px;
    box-shadow: 2px 2px 10px;
    padding: 10px;
} */
.heading_ic {
    font-family: 'SnellBT-Regular';
    color: #003dbd;
    margin: 20px 0 0 24px;
}
.heading_dropdown_ici.text-left {
    font-family: 'Roboto';
    font-size: 18px;
    margin: 30px 0;
    color: black;
}
select.select2 {
    
    margin: 30px 0;
    padding: 10px 30px;
    border-radius: 8px;
    color: #000;
    font-family: roboto;
}
.btn_rexharge_iccic.text-right button {
    background: #003dbd;
    border: none;
    padding: 10px 50px;
    border-radius: 10px;
}
.btn_rexharge_iccic.text-right button a{
    color: white
}
input.btn_sub_ici {
    background: transparent;
    border: none;
    color: white;
    font-family: 'Roboto';
    font-size: 18px;
}
.btn_rexharge_iccic.text-right {
    margin: 30px 0;
}
select#rech option {
    background: white;
    color: black;
    border: none;
    font-size: 14px;
}
.No_data {
    font-size: 48px;
    font-family: poppins;
    font-weight: 500;
    margin: 30px 0 0 0;
    color: #003dbd;
}
.check_d {
    font-size: 20px;
    font-family: auto;
    color: black;
}
a.btn_goback.btn-success {
    padding: 10px 30px;
    border-radius: 3px;
    background: #062feb;
    font-size: 18px;
}
.bt_goback {
    margin: 30px 0;
}
@media( max-width: 1199px){
		.topcorner {
            position: absolute !important;
    		right: 30px !important;
            top: 50% !important;
            transform: translateY(-50%);
		}
	   }
    </style>
</head>
<body>
<?php include("includes/header.php"); ?>


<!-- Content -->

<div class="main-content py-0">
    <div class="container">
    <?php
        include("includes/config.php");
        if(isset($_GET['ICCID']) && $_GET['ICCID']!='')
        {
            $ICCID = $_GET['ICCID'];
			if(is_numeric($ICCID))
			{	
            $length = strlen($ICCID);
            if($length == 19)
            {
                $query = "SELECT id,ICCID,Camel_MSISDN FROM ICCID where ICCID='$ICCID' ";
			}	
			else
			{
			  $query = "SELECT id,ICCID,Camel_MSISDN FROM ICCID where Camel_MSISDN='$ICCID' ";
			}	
			//echo $query;
                $query_run = mysqli_query($con,$query);
                $ICCIDS = mysqli_fetch_assoc($query_run);
			    $ICCID=$ICCIDS;
				if($ICCID['id']>='1')
				{	
                ?>

                
                               
                    <table class="table" style="width:97%; margin:20px auto 0px auto;">
                        <thead>
                            <tr>
                            <th scope="col">Plan Name</th>
                            <th scope="col">GB</th>
                            <th scope="col">Mins</th>
                            <th scope="col"></th>
                            <th scope="col">Days</th>
                            <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                <?php
         
                    $order_query = mysqli_query($con, "select userid,plan_id,email,date from orders where inventoryId='{$ICCID['id']}';");
				//	echo "select userid,plan_id,email,date from orders where inventoryId='{$ICCID['id']}'";
                    $order = mysqli_fetch_assoc($order_query);

                    $user_id = $order['userid'];
                    $user = mysqli_query($con, "select * from users where id='$user_id'");
                    $user = mysqli_fetch_assoc($user);

                    $plan_id = $order['plan_id'];
                    $plan = mysqli_query($con, "select * from plans where id='$plan_id'");
                    $plan = mysqli_fetch_assoc($plan);

                    $zone_id = $plan['zone_id'];
                    $zones = mysqli_query($con, "select * from zones where id='$zone_id'");
                    $zones = mysqli_fetch_assoc($zones);

                    $email_id = $user['email'];
                    $email = mysqli_query($con, "select * from users where id='$email'");
                    $email = mysqli_fetch_assoc($email); 
					
					$date = $orders['date'];
                    $date1 = mysqli_query($con, "select * from orders where id='$email'");
                    $date1 = mysqli_fetch_assoc($date);


                    $fname = $orders['fname'];
                    $fname1 = mysqli_query($con, "select * from users where id='$email'");
                    $fname1 = mysqli_fetch_assoc($fname);					

                   

                    ?>
                    
                    <div class="container">
                        <div class="row">
                            <!-- <div class="heading_ic"><h2>Information</h2></div> -->
                        </div>
                        <div class="row top_ici">
                            <div class="col-lg-6 bo_on">
                                <div class="cust_name d-flex">
                                    <div class="col-lg-6">Customer Name</div>
                                    <div class="col-lg-6"><?php echo $user['fname']; ?></div>
                                </div>
                            </div>
                            <div class="col-lg-6 bo_on">
                                <div class="cust_name d-flex">
                                    <div class="col-lg-6">Country / Region</div>
                                    <div class="col-lg-6"><?php echo $zones['zone_name']; ?></div>
                                </div>
                            </div>
                            <div class="col-lg-6 bo_on">
                                <div class="cust_name d-flex bg-light">
                                    <div class="col-lg-6">ICCID No.</div>
                                    <div class="col-lg-6">
                                        <?php echo $ICCID['ICCID']; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 bo_on">
                                <div class="cust_name d-flex bg-light">
                                    <div class="col-lg-6">Phone number</div>
                                    <div class="col-lg-6"><?php echo $ICCID['Camel_MSISDN']; ?></div>
                                </div>
                            </div>
                            <div class="col-lg-6 bo_on">
                                <div class="cust_name d-flex">
                                    <div class="col-lg-6">Plan Name</div>
                                    <div class="col-lg-6"><?php echo $plan['plan_name']; ?></div>
                                </div>
                            </div>
                            
                            <div class="col-lg-6 bo_on">
                                <div class="cust_name d-flex">
                                    <div class="col-lg-6">Activation Date</div>
                                    <div class="col-lg-6"><?php echo $order['date']; ?></div>
                                </div>
                            </div>
                        </div>
                    </div>

                   
                    
                    <tr>
                            <th scope="row"><?php echo $plan['plan_name']; ?></th>
                            
                            <td><?php echo $plan['GB']; ?></td>
                            <td><?php echo $plan['Mins']; ?></td>
                            <td><?php echo $plan['SMS']; ?></td>
                            <td><?php echo $plan['Days']; ?></td>
                           
                           
                        </tr> 
                    <?php
              //  }
                
                ?>
                    <tbody>
                    </table>
                    
                    <div class="container">
                        
                        <form action="checkout3.php" method="GET">
                        <div class="row">
                                    <div class="col-lg-3">
                                        <div class="heading_dropdown_ici text-left">
                                            Select Plan to recharge
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="text-left">
                                            <input type="hidden" name="user" value="<?php echo $user_id; ?>">
                                            <select id="rech" name="plan_id" class="select2">
                                                <?php
                                                $query = "SELECT plans.id , plans.plan_name , zones.zone_name FROM plans
                                                INNER JOIN zones
                                                ON plans.zone_id = zones.id";
                                                $plans = mysqli_query($con,$query);

                                                while ($plan = mysqli_fetch_assoc($plans)) {
                                                    ?>
                                                    <option value="<?php echo $plan['id'];  ?>"><?php echo $plan['plan_name']."-".$plan['zone_name'];  ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="btn_rexharge_iccic text-right">
                                            <button type="submit" class="btn btn-success">Recharge</button>
                                        </div>
                                    </div>
                                    </div>
                            </form>
                    </div>  
                    
                <?php
				}// if found inventory ID	
				
				 else
        {
            ?> <div class="container my-5">
                        <h2>No Result Found</h2>
                    </div>
                <?php
        }
		} // if data posted is numeric

	// case when data passed is emailid 
					elseif(!is_numeric($ICCID))
			{	
				$q="select id FROM `users` WHERE email='$ICCID'";		
				$res=mysqli_query($con,$q);
				$data=mysqli_fetch_assoc($res);			
				$iduser=$data['id'];
			//	echo "$q - user id: $iduser";		
	          $query = "SELECT id,ICCID,Camel_MSISDN FROM ICCID where id in(select inventoryId from orders where userid='$iduser') ";
                $query_run = mysqli_query($con,$query);
			?>
		<!-- <div class="container">
		<form action="iccidinfo.php" method="GET">
		 <div class="row">
		 <div class="col-lg-3">
        <div class="heading_dropdown_ici text-left">
             Select ICCID
        </div>
       </div>
		 <div class="col-lg-6">
         <div class="text-left">
		 <select id="selsim" name="ICCID" class="select2">
			 <option value='-1'>Select Simcard</option>
		<?php	
			/*			
               while ($data1=mysqli_fetch_assoc($query_run))
			   {
				   $id=$data1['id'];
				   $iccid=$data1['ICCID'];
				   $msisdn=$data1['Camel_MSISDN'];
				   echo "<option value='$iccid'>$iccid - $msisdn</option>";
			   }
			   */
				?>
			 </select> </div></div></div>
			 					 <div class="col-lg-3">
                                        <div class="btn_rexharge_iccic text-right">
                                            <button type="submit" class="btn btn-success">Submit</button>
                                        </div>
                                    </div>
					</form>
					</div>	
	  -->
		
		            <div class="container">
                     <div class="row top_ici">
                      <form action="iccidinfo.php" method="GET">
                        <div class="row">
                                    <div class="col-lg-3">
                                        <div class="heading_dropdown_ici text-left">
                                            Select ICCID
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="text-left">
                                            <select id="selsim" name="ICCID" class="select2">
			                                 <option value='-1'>Select Simcard</option>
                                               <?php				
                                                    while ($data1=mysqli_fetch_assoc($query_run))
                                                    {
                                                    $id=$data1['id'];
                                                    $iccid=$data1['ICCID'];
                                                    $msisdn=$data1['Camel_MSISDN'];
                                                    echo "<option value='$iccid'>$iccid - $msisdn</option>";
                                                    }
				                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="btn_rexharge_iccic text-right">
                                            <button type="submit" class="btn btn-success">submit</button>
                                        </div>
                                    </div>
                                    </div>
                            </form>
						 </div>
                    </div>  
				<?php

		} // if data posted is email
	
			
        } // id data sent is not blank
        else
        {
            ?> <div class="container my-5">
                        <h2>No Result Found</h2>
                    </div>
                <?php
        }
    ?> 
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
<div class="fixed-bottom">
<?php include("includes/footer.php"); ?>

</div>
   

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
</body>
</html>