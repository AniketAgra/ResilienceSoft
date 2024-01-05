<?php 
session_start();
include("includes/config.php"); 
$link_val = explode("/", $_SERVER[REQUEST_URI] );
if(isset($link_val[2],$link_val[3])){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="https://esim.gsm2go.com/assets/favicon.ico">
    <title>gsm2go eSIM | Maze </title>
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://esim.gsm2go.com/node_modules/%40fortawesome/fontawesome-free/css/all.min.css">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="https://esim.gsm2go.com/node_modules/animate.css/animate.min.css">
    <!-- Fancybox CSS -->
    <link rel="stylesheet" href="https://esim.gsm2go.com/node_modules/%40fancyapps/fancybox/dist/jquery.fancybox.min.css">    
    <!-- OWL carousel CSS -->
    <link rel="stylesheet" href="https://esim.gsm2go.com/node_modules/owl.carousel/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://esim.gsm2go.com/node_modules/owl.carousel/dist/assets/owl.theme.default.min.css">
    <!-- Main CSS -->
    <link rel="stylesheet" href="https://esim.gsm2go.com/assets/css/style.min.css">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;subset=latin-ext" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i,900,900i&amp;subset=latin-ext" rel="stylesheet">
    <style>
        body, .nav-link, ul{ font-family:arial !important; }
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
    </style>
</head>
<body>
<div class="navik-header header-shadow navik-mega-menu mega-menu-fullwidth">
    <!--<div class="bg-indigo">-->
    <!--    <div class="container">-->
    <!--        <div class="row align-items-center">-->
    <!--            <div class="col-lg-6 d-none d-lg-block text-white-75 text-center text-lg-left py-3 py-lg-0">-->
    <!--                <small class="text-white font-weight-600">Think eSim, think gsm2go</small>-->
    <!--            </div>-->
    <!--            <div class="col-lg-6 d-flex align-items-center justify-content-center justify-content-lg-end">-->
    <!--                <button type="button" class="btn btn-indigo shadow-none rounded-0 px-3 mb-0" data-toggle="modal" data-target="#modalLogin"><i class="fas fa-sign-in-alt"></i>Log in</button>-->
    <!--                <button type="button" class="btn btn-indigo shadow-none rounded-0 px-3 mb-0" data-toggle="modal" data-target="#modalRegister"><i class="fas fa-pen-nib"></i>Register</button>-->
    <!--            </div>-->

    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->

    <div class="container-fluid px-5">
        <div class="navik-header-container">
            <!--Logo-->
            <div class="logo" data-mobile-logo="assets/logo.png" data-sticky-logo="assets/logo.png">
                <a href=""><img src="https://esim.gsm2go.com/assets/logo.png" alt="logo"/></a>
            </div>
            
            <div class="logo text-center" style="width:55%">
                <span>The World's Best <span style="color:">e</span><span style="color:">SIM</span></span>
            </div>
           
            <!-- Burger menu -->
            <div class="burger-menu">
                <div class="line-menu line-half first-line"></div>
                <div class="line-menu"></div>
                <div class="line-menu line-half last-line"></div>
            </div>


            <!--Navigation menu-->
            <nav class="navik-menu menu-caret menu-hover-3 submenu-top-border submenu-scale">
                <ul>
                    <li class="current-menu"><a href="/index#eSim">eSim</a></li>
                    <li><a href="https://esim.gsm2go.com/global-dialer-plans">Global Dialer</a></li>
                    <li><a href="https://esim.gsm2go.com/virtual-numbers.php">Virtual Numbers</a></li>
                    <li><a href="https://esim.gsm2go.com/faq">FAQ</a></li>
                    <li><a href="https://esim.gsm2go.com/about-us">About Us</a></li>
                    <li>
                        <?php if(isset($_SESSION['user']) && ($_SESSION['role']=="U") ){?>
                        <a href="#"><?php echo $_SESSION['fname']; ?></a>
                        <ul class="submenu">
                            <li><a href="https://esim.gsm2go.com/orders"><i class="fa fa-home"></i> My Orders</a></li>
                            <li><a href="https://esim.gsm2go.com/profile"><i class="fa fa-user"></i> My Profile</a></li>
                            <li><a href="https://esim.gsm2go.com/logout"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
                        </ul>
                        <?php } else{ ?>
                        <a href="login">Login</a>
                        <?php } ?>
                    </li>
                    
                </ul>
            </nav>

        </div>
    </div>

</div>



<!-- Content -->
<div class="main-content py-0">


    <!-- Portfolio section -->
    <div class="section">

        <div class="container-fluid px-3 px-md-5 section py-5 pb-lg-0" id="eSim">

            <div class="row">
                <div class="col-xl-12">
                    <div class="vw-100 h-100 d-flex align-items-center ml-n3 ml-md-n5">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-10 offset-md-1 col-lg-8 offset-lg-2">
                                    <div class="text-center">
                                        <h2 class="h1 section-title-3 font-weight-800">We offer Data and Voice. <br>Select your destination</h2>
                                        <div class="lead-sm mb-5">
                                            <!--Cras aliquet condimentum nec vitae convallis nusce sapien malesuada consequat lectus sagittis interdum-->
                                        </div>
                                        <!--<a href="#" class="btn btn-round btn-primary mb-0">View all works</a>-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-12">
                    <div class="row">
                        
                        <?php
                        $select = mysqli_query($con, "select * from zones where status='A' ORDER BY position");
                        while($row = mysqli_fetch_assoc($select)){
                            if(empty($row['zone_url'])){
                        ?>
                        <div class="col-md-3">
							
                            <div class="card card-blog-entry border-0">
                                <div class="hover-item rounded-ultra shadow-mdz">
                                    <a href="#" data-toggle="modal" data-target="#modalZones<?php echo $row['id']; ?>" onclick="ChangeUrl('Page1', '<?php echo $row['tags']; ?>');">
                                        <div class="hover-transition rounded-ultra">
                                            <div class="hover-up">
                                                <h5 class="hover-title font-weight-700 mb-1"><?php //echo $row['zone_name']; ?></h5>
                                                <p class="text-white">All plans come with free 100 minutes voice and unlimited incoming texts</p>
                                                <!--<div class="hover-desc">Vestibulum vulputate semper</div>-->
                                            </div>
                                        </div>
                                        <figure>
                                            <img class="img-fluid" src="../assets/images/continent/<?php echo $row['image']; ?>" alt="<?php echo $row['zone_name']; ?>">                         <div  style="position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%);color: #fff;font-weight: 2000 !important;font-size: 1.25rem;" ><strong><?php echo $row['zone_name']; ?></strong></div>
                                        </figure>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <?php } else{ ?>
                        <div class="col-md-3">
                            <div class="card card-blog-entry border-0">
							
                                <div class="hover-item rounded-ultra shadow-md">
									
                                    <a href="<?php echo $row['zone_url']; ?>">
                                        <div class="hover-transition rounded-ultra">
                                            <!--<div class="hover-down">-->
                                            <!--    <i class="fas fa-link fa-2x hover-icon"></i>-->
                                            <!--</div>-->
                                            <div class="hover-up">
                                                <h5 class="hover-title font-weight-700 mb-1"><?php //echo $row['zone_name']; ?></h5>
                                                <!--<div class="hover-desc">Vestibulum vulputate semper</div>-->
                                            </div>
                                        </div>
                                        <figure style="text-align:center">
                                            <img class="img-fluid" src="../assets/images/continent/<?php echo $row['image']; ?>" alt="<?php echo $row['zone_name']; ?>" >
											<div  style="position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%);color: #fff;font-weight: 2000 !important;font-size: 1.25rem;" ><strong><?php echo $row['zone_name']; ?></strong></div>
                                        </figure>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <?php } }?>

                    </div>
                </div>

            </div>

        </div>

    </div>




    <!-- Modal zones -->
    <?php
    $select = mysqli_query($con, "select * from zones where status='A'");
    while($row = mysqli_fetch_assoc($select)){
    ?>
    <div class="modal fade" id="modalZones<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
            <div class="modal-content rounded-ultra">
                <div class="modal-body p-0">

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="CloseUrl();">
                        <span aria-hidden="true"></span>
                    </button>

                    <div class="row no-gutters">
                        <div class="col-lg-7 d-none d-lg-block border-right">
                            <div class="pl-4 pl-md-5 pl-lg-4 pl-xl-4 py-5">
                                <div class="row">
                                    <div class="col-12">
                                        <h5 class="font-weight-700 text-center pb-2 mb-2"><?php echo $row['zone_name']; ?></h5>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <span class="font-weight-600">This plan can also be used in </span><span class="font-weight-600 text-success"><?php echo count(explode(",", $row['countries'])); ?> Countries</span>
                                    </div>
                                    <?php 
                                    foreach (explode(",", $row['countries']) as $value) { 
                                        $country_row = mysqli_fetch_assoc(mysqli_query($con, "select * from countries where id='$value'"));
                                    ?>
                                    <div class="col-lg-4 col-xl-3">
                                        <div class="hover-item">
                                            <div class="hover-inner-wrap">
                                                <figure  class="py-0">
                                                    <img class="img-fluid flag" src="../assets/images/flag/<?php echo $country_row['flag']; ?>" alt="image">
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

                        <div class="col-lg-5">
                            <div class="px-4 px-md-3 px-lg-3 px-xl-3 px-xl-3 pt-5 pb-4">
                                <div class="row">
                                    <div class="col-12">
                                        <ul class="nav nav-pills" id="pills-tab" role="tablist">
                                            <?php
                                            $i = 1;
                                            $select_plan = mysqli_query($con, "select * from plans where zone_id='".$row['id']."' AND status='A' ORDER BY length(Days)");
                                            while($plan_row = mysqli_fetch_assoc($select_plan)){
                                            ?>
                                            <li class="nav-item">
                                                <a class="nav-link <?php if($i == 1){ echo 'active'; } ?>" onclick="ChangeUrl('Page1', '<?php echo $row['tags'].'/'.$plan_row['tags']; ?>');" id="pills-first-tab<?php echo $plan_row['id']; ?>" data-toggle="pill" href="#pills-first_<?php echo $plan_row['id']; ?>" role="tab" aria-controls="pills-first" aria-selected="false"><?php echo $plan_row['Days']; ?> Days</a>
                                            </li>
                                            <?php $i++; } ?>
                                        </ul>
                                        <div class="tab-content" id="pills-tabContent">
                                            <?php
                                            $i = 1;
                                            $select_plan = mysqli_query($con, "select * from plans where zone_id='".$row['id']."' AND status='A'");
                                            while($plan_row = mysqli_fetch_assoc($select_plan)){
                                             $select_esimlive = mysqli_query($con, "select * from esimlive where status='A' AND id='1'");
                                             $esimlive_row = mysqli_fetch_assoc($select_esimlive);
                                            ?>
                                            <div class="tab-pane fade <?php if($i == 1){ echo 'active show';} ?>" id="pills-first_<?php echo $plan_row['id']; ?>" role="tabpanel" aria-labelledby="pills-first-tab">
                                                <h5 class="font-weight-700 pb-2 mb-0"><?php echo $plan_row['plan_name']; ?></h5>
                                                <p class="text-justify"><?php echo $plan_row['content']; ?></p>
                                                <div class="row">
                                                    <form method="post">
                                                        <div class="col-12">
                                                            <table class="table table-borderless mb-1">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="pb-0 bg-white font-weight-500" style="color:#717171">Plan Charge</th>
                                                                        <td class="font-weight-500 pb-0 text-right w-25 pr-3">$<?php echo $plan_row['USD']; ?>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="font-weight-500 line-height pt-0" colspan="2">
                                                                            <ul class="m-0">
                                                                                <?php if(!empty($plan_row['GB'])){ ?>
                                                                                <li>Data - <?php echo $plan_row['GB']; ?> GB</li>
                                                                                <?php } if(!empty($plan_row['Mins'])){ ?>
                                                                                <li>Voice - <?php echo $plan_row['Mins']; ?> Mins</li>
                                                                                <?php } if(!empty($plan_row['SMS'])){ ?>
                                                                                <li>SMS - <?php echo $plan_row['SMS']; ?></li>
                                                                                <?php } if(!empty($plan_row['Days'])){ ?>
                                                                                <li>Validity - <?php echo $plan_row['Days']; ?> Days</li>
                                                                                <?php } ?>
                                                                            </ul>
                                                                        </td>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <input type="hidden" class="usd<?php echo $plan_row['id']; ?>" value="<?php echo $plan_row['USD']; ?>">
                                                                    <?php
                                                                    $select_esim = mysqli_query($con, "select * from esimlive where status='A' ORDER BY id DESC");
                                                                    while($esim_row = mysqli_fetch_assoc($select_esim)){
                                                                    if($esim_row['status']=="A"){
                                                                    ?>
                                                                    <tr class="<?php if($esim_row['id']==1){ echo 'display-esim'.$plan_row['id']; if($esimlive_row['checked']=='Uncheck'){ echo ' text-white';} } ?> ">
                                                                        <th class="font-weight-500"><?php echo $esim_row['name']; ?></th>
                                                                        <td class="font-weight-500 pr-3 text-right esimamt<?php echo $plan_row['id']; ?> <?php if($esim_row['id']==2){ echo 'display-activa'.$plan_row['id']; } ?>">$<?php echo $esim_row['USD']; ?>
                                                                            <?php if($esim_row['id']==1){ ?>
                                                                            <input type="hidden" class="esim-amt<?php echo $plan_row['id']; ?>" value="<?php echo $esim_row['USD']; ?>">
                                                                            <?php 
                                                                            $esimamt = $esim_row['USD'];
                                                                            } else{ ?>
                                                                            <input type="hidden" class="activation<?php echo $plan_row['id']; ?>" value="<?php echo $esim_row['USD']; ?>">
                                                                            <?php 
                                                                            $actamt = $esim_row['USD'];
                                                                            } ?>
                                                                        </td>
                                                                    </tr>
                                                                    <?php } } ?>
                                                                    <tr>
                                                                        <th class="font-weight-600 pr-3">Total Charge</th>
                                                                        <td class="font-weight-600 text-right" style="border-top:1px solid">$<input type="text" class="total total<?php echo $plan_row['id']; ?>" name="charge" id="totalValue_<?php echo $plan_row['id']; ?>" value="<?php echo $plan_row['USD']+$esimamt+$actamt; ?>">
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <div class="col-12 pl-4">
                                                            <div class="form-check my-2 w-80">
                                                                <input class="form-check-input esim" type="checkbox" value="<?php echo $plan_row['id']; ?>" name="esim" id="esim<?php echo $plan_row['id']; ?>" <?php if($esimlive_row['checked']=='Check'){ echo 'checked';} ?>>
                                                                <label class="form-check-label" for="esim">
                                                                   <?php echo $esimlive_row['short_desc']; ?>
                                                                </label>
                                                            </div>
                                                            <!--<p>You must agree to the following to complete you order:</p>-->
                                                            <div class="form-check mb-2">
                                                                <input class="form-check-input compatibility compatibility<?php echo $plan_row['id']; ?>" type="checkbox" value="<?php echo $plan_row['id']; ?>">
                                                                <label class="form-check-label">
                                                                    I understand that in order to use an eSIM, I need an eSIM compatible phone (please see <a href="https://esim.gsm2go.com/esim-phones.php" target="blank">list</a> here).
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input agree agree<?php echo $plan_row['id']; ?>" type="checkbox" value="<?php echo $plan_row['id']; ?>">
                                                                <label class="form-check-label">
                                                                    I am ok with the <font color="blue">gsm</font><font color="green">2go</font> eSIM <a href="https://esim.gsm2go.com/tnc.php" target="blank">Term & Conditions</a> and Privacy Policy
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-md-6 mx-auto">
                                                            <input type="hidden" name="direct" value="<?php echo $plan_row['id']; ?>">
                                                            <!-- <button id="buybutton_<?php echo $plan_row['id']; ?>" class="btn btn-block buybutton btn-round btn-md btn-primary mx-2 mt-4 mx-lg-3 mb-4 buy-now<?php echo $plan_row['id']; ?>" disabled>Buy Now</button> -->
                                                            <?php if(isset($_SESSION['user'],$_SESSION['role']) && $_SESSION['role']=="U"){ ?>
                                                            <button type="submit" formaction="checkout.php" id="<?php echo $plan_row['id']; ?>" class="btn btn-block buybutton btn-round btn-md btn-primary mx-2 mt-4 mx-lg-3 mb-4 buy-now<?php echo $plan_row['id']; ?>" disabled>Proceed</button>
                                                            <?php } else{ ?>
                                                            <button type="submit" formaction="signup.php" id="<?php echo $plan_row['id']; ?>" class="btn btn-block buybutton btn-round btn-md btn-primary mx-2 mt-4 mx-lg-3 mb-4 buy-now<?php echo $plan_row['id']; ?>" disabled>Proceed</button>
                                                            <?php } ?>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <?php $i++; } ?>
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
    <?php } ?>
</div>

<?php include("includes/footer.php"); ?>

<!-- jQuery -->
<script src="../assets/js/vendor/jquery-3.5.1.min.js"></script>
<script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="../components/navik-navigation-menu/dist/js/navik.menu.js"></script>
<script src="../node_modules/isotope-layout/dist/isotope.pkgd.min.js"></script>
<script src="../node_modules/imagesloaded/imagesloaded.pkgd.min.js"></script>
<script src="../node_modules/%40fancyapps/fancybox/dist/jquery.fancybox.min.js"></script>
<script src="../node_modules/owl.carousel/dist/owl.carousel.min.js"></script>
<script src="../node_modules/jquery-circle-progress/dist/circle-progress.min.js"></script>
<script src="../assets/js/custom.js"></script>
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
function ChangeUrl(title, url) {
    if (history.pushState) {
      history.pushState("object or string", "Title", "/"+url);
    } else {
      document.location.href = "/";
    }
}
function CloseUrl() {
    if (history.pushState) {
      history.pushState("object or string", "Title", "/");
    } else {
      document.location.href = "/";
    }
}
</script>
</body>
</html>
<?php } ?>