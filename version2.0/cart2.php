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
       font-weight: bold;
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
    </style>
</head>
<body>
<?php include("includes/header.php"); ?>
</div>
<!-- Page title -->

<!-- Content -->
<div class="main-content py-0">
<br><br>
<div class="section">
<section class="h-100" style="background-color: #eee;">
    <div class="container h-100 py-5">
    <div class="row d-flex justify-content-center align-items-center h-100">
    <div class="col-10">
        <div class="card rounded-3 mb-4" id="recordid_<?php echo $cid; ?>">
            <div class="card-body p-6">
                <div class="row d-flex justify-content-between align-items-center">
                    <div class="col-md-6 col-lg-4 col-xl-3">
                        <h3 class="fw-normal mb-0 text-black">Shopping Cart</h3>
                    </div>
                    <div class="col-md-6 col-lg-4 col-xl-3" style="text-align:right;" id="grand_total_top">
                        <h5>TOTAL  $<input type="text" name="total_top" class="myinput" id="total_top"  value="<?php echo $totalCost;?>" size="4" readonly>   </h5>
                    </div>
                </div>
            </div>
        </div>
        
        <?php
        $cookieValue = base64_decode($_COOKIE['a2k_key']);
        $select = mysqli_query($con, "select * from cart_items where cookie_id='$cookieValue'");
        $numrows=mysqli_num_rows($select);
        
        $select_esimlive = mysqli_query($con, "select * from esimlive where status='A' AND id='1'");
        $esimlive_row = mysqli_fetch_assoc($select_esimlive);
        $esimLiveCharge = $esimlive_row['USD'];
        
        $select_activation = mysqli_query($con, "select * from esimlive where status='A' AND id='2'");
        $activation_row = mysqli_fetch_assoc($select_activation);
        $activationCharge = $activation_row['USD'];
        
        $totalCost = 0;
        
        while($row=mysqli_fetch_assoc($select))
        { 
            $cart_id=$row['cartId'];    
            $plan_id=$row['plan_id']; 
            $qty=$row['quantity'];
            $esim_live=$row['esim_live'];  
            if($esim_live=='1')
            {
                $esim_chk="checked";
            } else {
                $esim_chk="";
            }
    
   
            $plan_query = "select plan_name,GB,Mins,Days,USD,zone_id from plans where id='$plan_id'";
            $plan_result = mysqli_query($con, $plan_query);
            $row1 = mysqli_fetch_assoc($plan_result);    
            $plan_name = $row1['plan_name'];
            $GB = $row1['GB'];
            $mins = $row1['Mins'];
            $days = $row1['Days'];
            $rate = $row1['USD'];
            $cost = $rate*$qty;
            if($esim_live=='1')
            {
                $cost= $cost + ($qty*$esimLiveCharge);
            } else {
                $cost= $cost + ($qty*$activationCharge);
            }
            $zoneid = $row1['zone_id'];
            
            $zone_query = "select * from zones where id='$zoneid'";
            $zone_result = mysqli_query($con, $zone_query);
            $res = mysqli_fetch_assoc($zone_result);
            $zone = $res['zone_name'];
            
            $totalCost = $totalCost + $cost;
        ?>
        <div class="card rounded-3 mb-4" id="recordid_<?php echo $cart_id; ?>">
            <div class="card-body p-6">
                <div class="row d-flex justify-content-between align-items-center">
                    <div class="col-md-6 col-lg-4 col-xl-3">
                        <img src="https://gsm2go.com/assets/images/upload/esim.jpg" class="img-fluid rounded-3" alt="Cotton T-shirt">
                        <p>
                            <button id="btn2_<?php echo $cart_id; ?>" class="btn btn-link px-2" onClick=func_minus('<?php echo $cart_id; ?>','<?php echo $cookieValue; ?>','<?php echo $qty; ?>');><i class="fas fa-minus"></i></button>
                            <input type="text" name="qty" class="myinput2" id="quantity_<?php echo $cart_id; ?>" value="<?php echo $qty?>" size="2" readonly>
                            <input type="hidden" name="cart_id" id="cart_id" value="<?php echo $cart_id;?>">
                            <button id="btn_<?php echo $cart_id; ?>" class="btn btn-link px-2" onClick=func_plus('<?php echo $cart_id; ?>','<?php echo $cookieValue; ?>');><i class="fa fa-plus"></i></button>
                        </p>    
                    </div>
                    <div class="col-md-6 col-lg-4 col-xl-5">
                        <p class="lead fw-normal mb-2"> <font size="3px"><b>Esim <?php echo $zone;?></b></font></p>
                        <p><span class="text-muted"></span> <span class="text-muted"> </span><?php echo "$days days, $GB GB, $mins Minutes"?></p>
                        <?php if($esim_live == 1) { ?>
                        <p>
                            <label>eSIM Live
                                <input type="checkbox" id="esimlive_<?php echo $cart_id;?>" name="esim_live" value="<?php echo $esim_live;?>"  <?php echo $esim_chk;?> disabled>
                            </label>
                        </p>
                        <?php } ?>
                        <p> 
                            <h5>   
                                $<input type="text" name="cost" class="myinput" id="cost_<?php echo $cart_id; ?>"  value="<?php echo $cost;?>" size="4" readonly>   
                            </h5>
                        </p>
                        <p>
                            <button id="btn3_<?php echo $cart_id; ?>" class="btn btn-link px-2 text-dark" value="<?php echo $cart_id; ?>" onClick=func_remove('<?php echo $cart_id; ?>','<?php echo $cookieValue; ?>');><i class="fas fa-trash fa-lg"></i></button>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    <?php }  ?>
    <br>
        <div class="card rounded-3 mb-4" id="grand_total_bottom">
            <div class="card-body p-4">
                <div class="row d-flex justify-content-between align-items-center">
                    <div class="col-md-2 col-lg-3 col-xl-2 d-flex">
                        <h5>&nbsp;</h5>
                    </div>
                    <div class="col-md-5 col-lg-4 col-xl-4 " style="margin-right:30px;" >
                        <h5>TOTAL  $<input type="text" name="total" class="myinput" id="total"  value="<?php echo $totalCost;?>" size="4" readonly>   </h5>
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
                    <div class="col-md-6 col-lg-4 col-xl-3">
                        <a href="index#esim"  class="btn btn-lg btn-round btn-indigo btn-block mb-0 py-4"  style="line-height:0">Continue</a>
                    </div>
                    <div>&nbsp;</div>
                    <div class="col-md-6 col-lg-4 col-xl-5">
                        <input type="hidden" name="a2k_checkout" value="a2k" />
                        <?php if(isset($_SESSION['user'],$_SESSION['role']) && $_SESSION['role']=="U"){ ?>
                            <button type="submit" formaction="<?php echo constant("SITEURL"); ?>checkout2" class="btn btn-lg btn-round btn-success btn-block mb-0 py-4"  style="line-height:0">Checkout</button>
                        <?php } else{ ?>
                            <button type="submit" formaction="<?php echo constant("SITEURL"); ?>signup" class="btn btn-lg btn-round btn-success btn-block mb-0 py-4"  style="line-height:0">Checkout</button>
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
if($numrows==0) { ?>
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
<?php }
include("includes/footer.php"); 
?>

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

function func_minus(cid,cookieId,qty)
{
    let act="minus"; 
	// jQuery Ajax Post Request
	$.post('updateqty.php', {
		C_ID: cid,act: act,cookieId: cookieId,qty: qty
	}, (response) => {
	    console.log(response);
	    if(response=="Success")
	    {
	        window.location = 'cart2';
        } else if(response == "You can not keep quantity less than 1") {
            alert(response);
        } else {
            alert("can't reduce the quantity");
        }
	});
}



function func_plus(cid,cookieId)
{
    let act="plus"; 
	// jQuery Ajax Post Request
	$.post('updateqty.php', {
		C_ID: cid,act: act,cookieId: cookieId
	}, (response) => {
	    console.log(response);
		if(response=="Success")
	    {
	        window.location = 'cart2';
        } else {
            alert("can't add the quantity");
        }
    });
}


function func_remove(cid,cookieId)
{
    const element = document.getElementById("recordid_"+cid);
    if(confirm('Are you sure to remove this product ?')) {
	    $.post('remove.php', {
		    del_id: cid,cookieId: cookieId
	    }, (response) => {
	        console.log(response);
		    if(response=="Success")
		    {
		        window.location = 'cart2';
            } else {
                alert("can't delete the product");
            }     
	    });
    }
}
</script>
</body>
</html>