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
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="node_modules/animate.css/animate.min.css">
    <!-- Fancybox CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
    @media(max-width: 1199px){
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



.ip2 {
    border-radius: 25px;
    border: 1px solid #1a239b;
    padding: 20px; 
    width: 100%;
    height: 15px;    
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
    .myinput {
        border-top-style: hidden;
        border-right-style: hidden;
        border-left-style: hidden;
        border-bottom-style: hidden;
       
      }
      .myinput2 {
        border-top-style: hidden;
        border-right-style: hidden;
        border-left-style: hidden;
        border-bottom-style: hidden;
       font-size: 22px;
       height:49px;
       width:30px;
       vertical-align:top;
       padding-bottom:10px;
      }
      *:focus {
    outline: none;
}

.qty {
  display:block;
  height: 20px;
  width: 20px;
  border-radius: 50%;
  border: 1px solid blue;
  
}
span.remove_text {
    background: #123cb5;
    padding: 10px 20px;
    font-size: 14px;
    color: white;
    font-family: 'Arial';
    border-radius: 3px;
}
.r_r {
    justify-content: space-between;
    align-items: center;
}
.r_r button {
    margin: 0;

}
		figure.card-plan span.text-success {
    color: blue !important;
    font-size: 18px;
}
.card1-img{
    overflow: hidden !important;
}
.im-p {
    transform: scale(1);
    transition: .5s all ease-in-out;
}
.im-p, figure.card-plan {
    overflow: hidden;
}
.z_n_p {
    text-align: left;
    margin: 10px;
    color: #64ae02;
    font-size: 14px !important;
	padding-left:20px;
	margin-bottom:20px;
}
figure.card-plan {
    box-shadow: 1px 1px 3px #0032c5 !important;
    margin: 6px !important;
    padding: 0 !important;
    border-radius: 13px !important;
    tranition: .5s all ease-in-out;
}
figure.card-plan:hover {
    transform: translateY(-10px);
    transition: .5s all ease-in-out;
}
figure.card-plan:hover .im-p {
    transform: scale(1.1);
    transition: .5s all ease-in-out;
}
		
.button {
   /* Green */
  border: none;
  color: white;
  padding: 10px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  width:200px;	
  cursor: pointer;
}
.quontity_detail{
  display: flex;
  /* align-items: center;   */
}
.amount-detail{
  display: flex;
  align-items: center;
}
.green {border-radius: 8px;background-color: #74ac31;}		
.blue {border-radius: 8px;background-color: #123cb5;
font-family: 'Arial';}	
		.fcc-btn {
  background-color: #199319;
			border-radius: 8px;
  color: white;
  padding: 23px;
  text-decoration: none;
  cursor: pointer;
  border: none;
  font-size: 16px;
  margin: 4px 2px;
  width:200px;
  font-family: 'Arial';	
}
/* .removespace{
  padding: 0;
} */
.removespace .col-10{
  padding: 0;
}
.fw-normal {
    font-family: 'Arial';
}
#grand_total_top h5{
  font-family: 'Arial';
}
.cart-detail p {
    font-family: 'Arial';
    margin-bottom: 5px;
}
.card-body {
    padding: 10px 30px;
}
.r_r{
  font-family: 'Arial';
}
.r_r h5{
  font-family: 'Arial';
}
.main_font font{
  font-family:'Arial';
}
.cart-detail label {
    display: flex;
    align-items: center;
    justify-content: space-between;
}
.button.green {
    border-radius: 8px;
    background-color: #74ac31;
    padding: 23px;
}
@media(max-width: 991px){
  .cart-detail {
    margin-top: 20px;
}
button.blue{
  width: 100%;
}
.fcc-btn{
  width: 100%;
}
}
@media(max-width: 575px){
  .card-body {
    padding: 10px 10px;
}
.fw-normal {
    font-size: 16px;
}
#grand_total_top h5 {
    margin: 0;
    font-size: 15px;
}
button#btn3_273 {
    width: 100%;
}
button#btn3_275 {
    width: 100%;
}
button#btn3_277 {
    width: 100%;
}
button#btn3_280 {
    width: 100%;
}
span.remove_text {
    padding: 10px 20px;
    font-size: 15px;
}
.button.blue{
  width: 100%;
}
.fcc-btn{
  width: 100%;
}
div#grand_total_top {
    padding: 0;
}
.hide-class{
  display:none !important;
}
/* .r_r {
    flex-direction: column;
    align-items: start;
} */
.main_btn{
  width: 100%;
}
.myinput2 {
    font-size: 19px;
    height: 49px;
    width: 30px;
    padding-bottom: 0;
}
.button.green {
  width: 100%;
}
}
@media(max-width: 375px){
  span.remove_text {
    padding: 10px 15px;
    font-size: 12px;
}
}
@media(min-width: 1400px){
  .container{
    max-width: 1260px;
  }
}
.navik-header-container {
    padding-right: 60px!important;
}
@media(max-width: 770px){
  .button.green {
    width: 100%;
}
}



.myinput2 {
    font-size: 19px;
    height: 30px;
    border-radius: 15px;
    width: 70px;
    vertical-align: top;
    padding-bottom: 0;
    border: 1px solid lightgray;
    text-align: center;
    margin: 0 5px;
}
.quontity_detail .btn {
    border: 1px solid lightgray;
    border-radius: 50%;
    height: 30px;
    width: 30px;
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: #123cb5;
    color: #fff;
}
.quontity_detail .btn i{
  margin: 0;
}
.r_r h5 {
    margin-left: 10px;
    margin-bottom: 0;
}



    </style>
</head>
<body>
<?php include("includes/header.php"); ?>
</div>
<!-- Page title -->

<!-- Content -->
<div class="main-content py-0">

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


<br><br>


<div class="section">

<section class="h-100" style="background-color: #eee;">
  <div class="container h-100 py-5 removespace">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12">
 <div class="card rounded-3 mb-4" id="recordid_<?php echo $cid; ?>">
          <div class="card-body p-6">
            <div class="row d-flex justify-content-between align-items-center">
        <div class="col-6 col-md-6 col-lg-4 col-xl-3">
          <h3 class="fw-normal mb-0 text-black">Shopping Cart</h3>
          
        </div>
         <div class="col-6 col-md-6 col-lg-4 col-xl-3 mt-sm-3 text-right"  id="grand_total_top">
           <h5>TOTAL  $<input type="text" name="total_top" class="myinput" id="total_top"  value="<?php echo $total;?>" size="4" readonly>   </h5>
         </div>
        </div>
        </div>
        </div>
        
<?php
//$userid="92"; // must pass session userid here.
//echo $userid;
if(isset($_SESSION['userId'])) {
  $userId = $_SESSION['userId'];
  $select = mysqli_query($con, "select * from cart_items where user_id='$userId' AND ordered ='0'");
} else {
  $userId = 0;
  $cookieValue = base64_decode($_COOKIE['a2k_key']);
  //echo $cookieValue;
  $select = mysqli_query($con, "select * from cart_items where cookie_id='$cookieValue' AND ordered ='0'");
}

$select = mysqli_query($con, "select * from cart_items where cookie_id='$cookieValue' AND ordered ='0'");
$numrows=mysqli_num_rows($select);
//echo "Num rows : $numrows";
    $total_cost  = 0;
    while($row=mysqli_fetch_assoc($select))
    { 
      //print_r($row);
    $cid=$row['id'];
    $autorenew_status = $row['autorenew'];
    $talktime_status = $row['talktime'];
    $pid=$row['product_id']; 
    $qty=$row['quantity'];
    $live=$row['esim_live'];  
    if($live=='1')
    {
        $chk="checked";
    }
     if($live=='0')
    {
        $chk="";
    }
    
   
    $q="select plan_name,GB,Mins,Days,USD, zone_id from plans where id='$pid'";
    $sel=mysqli_query($con, "$q");
    $row1=mysqli_fetch_assoc($sel);
     
    $name=$row1['plan_name'];
    $GB=$row1['GB'];
    $mins=$row1['Mins'];
    $days=$row1['Days'];
    $rate=$row1['USD'];
    $cost=$rate*$qty;
    if($live == 1)
    {
      $cost = $cost + ($qty*1);
    }
    if($talktime_status == 1)
    {
      $cost = $cost + ($qty*8);
    }
    $total_cost = $total_cost + $cost;
    $zoneid=$row1['zone_id'];
    $q1="select * from zones where id='$zoneid'";
    $sel2=mysqli_query($con, "$q1");
    $res=mysqli_fetch_assoc($sel2);
    $zone=$res['zone_name'];
        ?>
         <div class="card rounded-3 mb-4" id="recordid_<?php echo $cid; ?>">
          <div class="card-body p-6">
            <div class="row d-flex  align-items-center">
              <div class="col-md-12 col-lg-6 col-xl-5">
              
				  <div class="main_font"><center><font size="4px">eSIM <?php echo $res['zone_name']; ?></font></center></div>
				      <figure class="card-plan">
                                            <div class="card1-img">
                                            <img class="img-fluid im-p" src="assets/images/continent/<?php echo $res['image']; ?>" alt="<?php echo $res['zone_name']; ?>">                         
                                            </div>
                                            </figure>
                <!-- <p>
                  <button id="btn2_<?php echo $cid; ?>" class="btn btn-link px-2" onClick=func_minus(<?php echo "$cid,$userid"; ?>);><i class="fas fa-minus"></i></button>
              

              <input type="text" name="qty" class="myinput2" id="quantity_<?php echo $cid; ?>" value="<?php echo $qty?>" size="2" readonly>
              <input type="hidden" name="cid" id="cid" value="<?php echo $cid;?>">
             
                   <button id="btn_<?php echo $cid; ?>" class="btn btn-link px-2" onClick=func_plus(<?php echo "$cid,$userid"; ?>);><i class="fa fa-plus"></i></button>
               
                </p>     -->
              </div>
              <div class="col-md-12 col-lg-6 col-xl-6 cart-detail">
               <!-- <p class="lead fw-normal mb-2"> <font size="3px"><b>Esim <?php echo $zone;?></b></font></p>-->
                <p> </span><?php echo "$days days, $GB GB, $mins Minutes"?></p>
                <p>
                    <label>eSIM Live
                    <input type="checkbox" id="esimlive_<?php echo $cid;?>" onclick="esimlive_value(<?php echo $cid;?>,this.value = this.checked ? 1 : 0)" name="esim_live" value="<?php echo $live;?>"  <?php echo $chk;?>>
                    </label>
                </p>
                <p>
                    <label><span >Auto Renew </span>
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
                    <input  onclick="autorenewal_value(<?php echo $cid;?>,this.value = this.checked ? 1 : 0)" value="<?php echo $cid;?>" type="checkbox" id="<?php echo $cid;?>"  name="autorenewal" <?php echo $test_check;  ?>>
                    </label>
                </p>
                <p>
                    <label><span >Talk Time Options</span>
                    <?php
                        if($talktime_status == 1)
                        {
                            $talktime_check ="checked";
                        }
                        else
                        {
                            $talktime_check ="";
                        }
                    ?>
                    <input  onclick="talktime_value(<?php echo $cid;?>,this.value = this.checked ? 1 : 0)" value="<?php echo $cid;?>" type="checkbox" id="<?php echo $cid;?>"  name="autorenewal" <?php echo $talktime_check;  ?>>
                    </label>
                </p>
                <div class="r_r d-flex">
                <div class="quontity_detail">
                  <button id="btn2_<?php echo $cid; ?>" class="btn btn-link px-2" onClick=func_minus(<?php echo "$cid,$userid"; ?>);><i class="fas fa-minus"></i></button>

              <input type="text" name="qty" class="myinput2" id="quantity_<?php echo $cid; ?>" value="<?php echo $qty?>" size="2" readonly>
              <input type="hidden" name="cid" id="cid" value="<?php echo $cid;?>">
             
                   <button id="btn_<?php echo $cid; ?>" class="btn btn-link px-2" onClick=func_plus(<?php echo "$cid,$userid"; ?>);><i class="fa fa-plus"></i></button>
                   <h5 class="amount-detail">$<input type="text" name="cost" class="myinput" id="cost_<?php echo $cid; ?>"  value="<?php echo $cost;?>" size="4" readonly></h5>
                      </div>
                <div class="main_btn">
              <button id="btn3_<?php echo $cid; ?>" class="btn btn-link px-2 text-dark" value="<?php echo $cid; ?>" onClick=func_remove(<?php echo "$cid,$userid"; ?>);><span class="remove_text">Remove</span></button></div>
                </div>
              </div>
            </div>
          </div>
        </div>
    <?php } 
              if(isset($_SESSION['userId'])) {
                
                $userId = $_SESSION['userId'];
                $qt = "SELECT sum(cart_items.quantity*plans.USD) as total
                FROM cart_items
                 JOIN plans ON cart_items.product_id=plans.id AND cart_items.user_id='$userId' AND cart_items.ordered='0' group by user_id";
              } else {
                $userId = 0;
                $cookieValue = base64_decode($_COOKIE['a2k_key']);
                $qt = "SELECT sum(cart_items.quantity*plans.USD) as total
                FROM cart_items
                 JOIN plans ON cart_items.product_id=plans.id AND cart_items.user_id='$userId' AND cart_items.cookie_id='$cookieValue' AND cart_items.ordered='0' group by user_id";
              }
              $cookieValue = base64_decode($_COOKIE['a2k_key']);
                $qt = "SELECT sum(cart_items.quantity*plans.USD) as total
                FROM cart_items
                 JOIN plans ON cart_items.product_id=plans.id AND cart_items.cookie_id='$cookieValue' AND cart_items.ordered='0'";
             $rt=mysqli_query($con,$qt);
             $rowt=mysqli_fetch_assoc($rt);
             $total=$rowt['total'];
             //echo $total;        
    ?>
    <br>
          <div class="card rounded-3 mb-4" id="grand_total_bottom">
          <div class="card-body p-4">
            <div class="row d-flex justify-content-between align-items-center">
              
            <div class="col-2 col-md-2 col-lg-3 col-xl-2 d-flex hide-class">
                <h5>&nbsp;</h5>
              </div>
              <div class="col-12 col-md-5 col-lg-4 col-xl-4 text-right" style="font-family:'Arial';" >
                 <h5>TOTAL  $<input type="text" name="total" class="myinput" id="total"  value="<?php echo $total_cost;?>" size="4" readonly>   </h5>
              </div>
              </div>
            </div>
            
          </div>
  
            <div class="card rounded-3 mb-4" id="no_items" style="display:none;">
          <div class="card-body p-4">
            <div class="row d-flex justify-content-between align-items-center">
              
            <div class="col-md-4 col-lg-4 col-xl-3 d-flex">
                No items in cart
              </div>
             
              </div>
            </div>
          </div>

        <form method="post">
        <div class="card rounded-3 mb-4" id="cart_buttons">
          <div class="card-body p-6"> 
            <div class="row d-flex justify-content-between align-items-center">
              <div class="col-md-5 col-lg-4 col-xl-3">
                  <a href="https://dev.mysimaccess.com" class="button blue">Continue</a>  
              </div>
              <div>&nbsp;</div>
              <div class="col-md-5 col-lg-4 col-xl-5 text-right">
                        <input type="hidden" name="a2k_checkout" value="a2k" />
                        <?php if(isset($_SESSION['user'],$_SESSION['role']) && $_SESSION['role']=="U"){ ?>
                            <button type="submit" formaction="<?php echo constant("SITEURL"); ?>checkout2" class="button green"  style="line-height:0">Checkout</button>
                        <?php } else{ ?>
                            <button type="submit" formaction="<?php echo constant("SITEURL"); ?>signup" class="fcc-btn"  style="line-height:0">Checkout</button>
                        <?php } ?>
              </div>
            </div>
          </div>
        </div>
        </form>
              

      </div>
    </div>
  </div>
</section>

    </div>





</div>

<?php 
if($numrows==0)
{
  //echo  "Num rows : $numrows";
    ?>
    
    <script type="text/javascript">
  const toptotal = document.getElementById('grand_total_top');    
 const bottomtotal = document.getElementById('grand_total_bottom');
const cartbtn = document.getElementById('cart_buttons'); 
const cart_no_items = document.getElementById('no_items'); 
//alert(1);
//alert(toptotal);
toptotal.style.display = 'none';  
bottomtotal.style.display = 'none'; 
cartbtn.style.display = 'none'; 
cart_no_items.style.display = 'block'; 
        
    </script>
    
    <?php
    
}

include("includes/footer.php"); ?>

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

// function checkout_session(){
//     alert("test");
//     sessionStorage.setItem('a2k_checkout2', 'a2k2');
// }

function hide_div()
{
const toptotal = document.getElementById('grand_total_top');    
const bottomtotal = document.getElementById('grand_total_bottom');
const cartbuttons = document.getElementById('cart_buttons'); 
alert(1);
alert(toptotal);
toptotal.style.display = 'none';  
bottomtotal.style.display = 'none'; 
cartbuttons.style.display = 'none'; 
}
function set_total_top(){

var total = document.getElementById("total").value;
	let id_total_top ='total_top';
	$('#'+id_total_top).val(total);

}

window.onload=set_total_top();

function func_minus(cid,uid)
{

    //alert(cid);
      let act="minus"; 
	// jQuery Ajax Post Request
	$.post('updateqty.php', {
		C_ID: cid,act: act,userid: uid
	}, (response) => {
    //alert(response);
    if(response == 'Success')
    {
      window.location = 'cart2';
    }
    else if(response == "You can not keep quantity less than 1")
	    {
	        alert("You can not keep quantity less than 1");
	        
	    }
    else
    {
      alert("something went wrong please try again");
    }
    return false;

	    if(response == "You can not keep quantity less than 1")
	    {
	        alert(response);
	        
	    }

	    else
	    {
		const myArray = response.split("-");
		var qty=myArray[0];
		var price=myArray[1];
		var total=myArray[2];
		
	let id_quantity ='quantity_'+cid;
	$('#'+id_quantity).val(qty);
	let id_cost ='cost_'+cid;
	$('#'+id_cost).val(price);
	let id_total ='total';
	$('#'+id_total).val(total);
	let id_total_top ='total_top';
	$('#'+id_total_top).val(total);
		console.log(qty);
		console.log(price);
		console.log(total);
	    }// 
		
	});

}

function esimlive_value(id,status)
{
  $.ajax({
          url: "ajax/esimlive_ajax.php",
          type: "POST",
          data: {id:id,status:status},
          success:function(data)
          {
            window.location = 'cart2';
          }
      });
      return false;
}

function talktime_value(id,status)
{
  $.ajax({
          url: "ajax/talktime_ajax.php",
          type: "POST",
          data: {id:id,status:status},
          success:function(data)
          {
            window.location = 'cart2';
          }
      });
      return false;
}

function autorenewal_value(id,status)
{   
  $.ajax({
          url: "ajax/autorenewal.php",
          type: "POST",
          data: {id:id,status:status},
          success:function(data)
          {
            window.location = 'cart2';
          }
      });
      return false;
}


// function func_minus(cid,uid)
// {

//  let act="plus"; 
// 	// jQuery Ajax Post Request
// 	$.post('updateqty.php', {
// 		C_ID: cid,act: act,userid: uid
// 	}, (response) => {
//     if(response == 'Success')
//     {
//       window.location = 'cart2';
//     }
//     else
//     {
//       alert("something went wrong please try again");
//     }
//     return false;
// 	     console.log(response);
// 		const myArray = response.split("-");
// 		var qty=myArray[0];
// 		var price=myArray[1];
// 		var total=myArray[2];
		
// 	let id_quantity ='quantity_'+cid;
// 	$('#'+id_quantity).val(qty);
// 		let id_cost ='cost_'+cid;
// 	$('#'+id_cost).val(price);
// 	let id_total ='total';
// 	$('#'+id_total).val(total);
// 	let id_total_top ='total_top';
// 	$('#'+id_total_top).val(total);
// 		console.log(qty);
// 		console.log(price);
// 		console.log(total);
// 	});
// }



function func_plus(cid,uid)
{

 let act="plus"; 
	// jQuery Ajax Post Request
	$.post('updateqty.php', {
		C_ID: cid,act: act,userid: uid
	}, (response) => {
    if(response == 'Success')
    {
      window.location = 'cart2';
    }
    else
    {
      alert("something went wrong please try again");
    }
    return false;
	     console.log(response);
		const myArray = response.split("-");
		var qty=myArray[0];
		var price=myArray[1];
		var total=myArray[2];
		
	let id_quantity ='quantity_'+cid;
	$('#'+id_quantity).val(qty);
		let id_cost ='cost_'+cid;
	$('#'+id_cost).val(price);
	let id_total ='total';
	$('#'+id_total).val(total);
	let id_total_top ='total_top';
	$('#'+id_total_top).val(total);
		console.log(qty);
		console.log(price);
		console.log(total);
	});
}


function func_remove(cid,uid)
{
//alert(cid);
const element = document.getElementById("recordid_"+cid);
//
 
	$.post('remove.php', {
		del_id: cid,userid: uid
	}, (response) => {
    if(response == 'Success')
    {
      window.location = 'cart2';
    }
    else
    {
      alert("can't delete the product");
    }
    return false;
	    console.log(response);

		const myArray = response.split("-");
		var status=myArray[0];
		var total=myArray[1];
        var items=myArray[2];
       // alert(items);
        
         if (isNaN(items)) {
   // voteable = "Input is not a number";
  } 
        
        if(items === '0')
        {
            
            // alert("in-items"+items);
               const toptotal = document.getElementById('grand_total_top');    
 const bottomtotal = document.getElementById('grand_total_bottom');
const cartbtn = document.getElementById('cart_buttons'); 
const cart_no_items = document.getElementById('no_items'); 
//alert(1);
//alert(toptotal);
toptotal.style.display = 'none';  
bottomtotal.style.display = 'none'; 
cartbtn.style.display = 'none'; 
cart_no_items.style.display = 'block'; 
        }
        
        
		if(status=="YES")
		{
		    element.remove();
           let id_total ='total';
        	$('#'+id_total).val(total);
        	$('#'+total_top).val(total);
        	
        	console.log(total);
         }
         else
         {
             alert("can't delete the product");
         }     
		
	});
             
}
</script>

</body>
</html>