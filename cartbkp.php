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
       font-size: 20px;
       height:40px;
      }
      *:focus {
    outline: none;
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

        <div class="d-flex justify-content-between align-items-center mb-4">
          <h3 class="fw-normal mb-0 text-black">Shopping Cart</h3>
          
        </div>
<?php
$userid="5"; // must pass session userid here.

 $select = mysqli_query($con, "select * from cart_items where user_id='5'");
?>

 
              
        <?php
    while($row=mysqli_fetch_assoc($select))
    { 
    $cid=$row['id'];    
    $pid=$row['product_id']; 
    $qty=$row['quantity'];
    $q="select plan_name,GB,Mins,Days,USD, zone_id from plans where id='$pid'";
    $sel=mysqli_query($con, "$q");
    $row1=mysqli_fetch_assoc($sel);    
    $name=$row1['plan_name'];
    $GB=$row1['GB'];
    $mins=$row1['Mins'];
    $days=$row1['Days'];
    $rate=$row1['USD'];
    $cost=$rate*$qty;
    $zoneid=$row1['zone_id'];
    $q1="select * from zones where id='$zoneid'";
    $sel2=mysqli_query($con, "$q1");
    $res=mysqli_fetch_assoc($sel2);
    $zone=$res['zone_name'];
        ?>
         <div class="card rounded-3 mb-4" id="recordid_<?php echo $cid; ?>">
          <div class="card-body p-4">
            <div class="row d-flex justify-content-between align-items-center">
              <div class="col-md-2 col-lg-2 col-xl-2">
                <img src="https://gsm2go.com/assets/images/upload/esim.jpg" class="img-fluid rounded-3" alt="Cotton T-shirt">
              </div>
              <div class="col-md-3 col-lg-3 col-xl-3">
                <p class="lead fw-normal mb-2">Esim <?php echo $zone;?></p>
                <p><span class="text-muted"></span> <span class="text-muted"> </span><?php echo "$days days, $GBGB, $mins Minutes"?></p>
              </div>
            <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
            
                   <button id="btn2_<?php echo $cid; ?>" class="btn btn-link px-2" onClick=func_minus(<?php echo "$cid,$userid,$qty"; ?>);><i class="fas fa-minus"></i></button>
              

              <input type="text" name="qty" class="myinput2" id="quantity_<?php echo $cid; ?>" value="<?php echo $qty?>" size="2" readonly>
              <input type="hidden" name="cid" id="cid" value="<?php echo $cid;?>">
             
                   <button id="btn_<?php echo $cid; ?>" class="btn btn-link px-2" onClick=func_plus(<?php echo "$cid,$userid"; ?>);><i class="fas fa-plus"></i></button>
               
              </div>
              <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
             <h5>   $<input type="text" name="cost" class="myinput" id="cost_<?php echo $cid; ?>"  value="<?php echo $cost;?>" size="7" readonly>   </h5>
              </div>
              <div class="col-md-1 col-lg-1 col-xl-1 text-end" style="float:right;">
                  
                <button id="btn3_<?php echo $cid; ?>" class="btn btn-link px-2 text-dark" value="<?php echo $cid; ?>" onClick=func_remove(<?php echo "$cid,$userid"; ?>);><i class="fas fa-trash fa-lg"></i></button>
              </div>
            </div>
          </div>
        </div>
        
    <?php }   
    
             $qt="SELECT sum(cart_items.quantity*plans.USD) as total FROM cart_items,plans where cart_items.product_id=plans.id and cart_items.user_id ='$userid' group by user_id";
             $rt=mysqli_query($con,$qt);
             $rowt=mysqli_fetch_assoc($rt);
             $total=$rowt['total'];
    ?>
    <br>
          <div class="card rounded-3 mb-4">
          <div class="card-body p-4">
            <div class="row d-flex justify-content-between align-items-center">
              
            <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                <h5>Total</h5>
              </div>
              <div class="col-md-3 col-lg-3 col-xl-3 offset-lg-2" style="margin-right:15px;">
                 <h5> $<input type="text" name="total" class="myinput" id="total"  value="<?php echo $total;?>" size="7" readonly>   </h5>
              </div>
              </div>
            </div>
          </div>
  
    <!--   
          <div class="card mb-4">
          <div class="card-body p-4 d-flex flex-row">
                <div class="col-8"><input type="text" id="form1" class="ip2" /> 
                <label class="form-label" for="form1">Discound code</label></div>
  <div class="col-4">
            <button type="button" class="btn btn-lg btn-round btn-indigo btn-block mb-0 py-4"  style="line-height:0">Apply</button>
           </div>
          </div>
        </div>
        -->

    <div class="card mb-4">
          <div class="card-body p-4 d-flex flex-row">
                <div class="col-6"><button type="button" class="btn btn-lg btn-round btn-indigo btn-block mb-0 py-4"  style="line-height:0">Continue Shopping</button>
               </div>
            <div class="col-6">
            <button type="button" class="btn btn-lg btn-round btn-success btn-block mb-0 py-4"  style="line-height:0">Proceed to Pay</button>
           </div>
          </div>
        </div>


      </div>
    </div>
  </div>
</section>

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

function func_minus(cid,uid,qty)
{


      let act="minus"; 
	// jQuery Ajax Post Request
	$.post('updateqty.php', {
		C_ID: cid,act: act,userid: uid,qty: qty
	}, (response) => {
	    console.log(response);
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
		console.log(qty);
		console.log(price);
		console.log(total);
	    }// 
		
	});

}



function func_plus(cid,uid)
{

 let act="plus"; 
	// jQuery Ajax Post Request
	$.post('updateqty.php', {
		C_ID: cid,act: act,userid: uid
	}, (response) => {
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
		console.log(qty);
		console.log(price);
		console.log(total);
	});
}


function func_remove(cid,uid)
{

const element = document.getElementById("recordid_"+cid);
//
 if(confirm('Are you sure to remove this product ?'))
             {
	$.post('remove.php', {
		del_id: cid,userid: uid
	}, (response) => {
	    console.log(response);

		const myArray = response.split("-");
		var status=myArray[0];
		var total=myArray[1];

		if(status=="YES")
		{
		    element.remove();
           let id_total ='total';
        	$('#'+id_total).val(total);
        	console.log(total);
         }
         else
         {
             alert("can't delete the product");
         }     
		
	});
             }
}
</script>

</body>
</html>