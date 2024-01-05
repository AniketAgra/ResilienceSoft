    <?php
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
include("includes/config.php");
if(!isset($_SESSION['user']) && ($_SESSION['role']!="U")){
    header('Location: login.php'); exit;
}
$myuid = uniqid();
global $total_charge;

if(isset($_POST['a2k_checkout'])) {
    $_SESSION['a2k_checkout'] = $_POST['a2k_checkout'];
}

$type="New SIM - a2k";
$_SESSION['purType'] = $type;

if(isset($_SESSION['a2k_checkout']) && $_SESSION['a2k_checkout'] == 'a2k') 
{
    $cookieValue = base64_decode($_COOKIE['a2k_key']);
    
    $userId = $_SESSION['userId'];

    $update = mysqli_query($con, "update cart_items set user_id = '$userId', my_uid = '$myuid' where cookie_id='$cookieValue'");
$q="select * from cart_items where cookie_id='$cookieValue'";
    $select = mysqli_query($con, "select * from cart_items where cookie_id='$cookieValue' and ordered=0");
    $numrows=mysqli_num_rows($select);
    //echo $q;
	$q1="select * from esimlive where status='A' AND id='1'";
//	echo "\n$q1";
	
    $select_esimlive = mysqli_query($con, "select * from esimlive where status='A' AND id='1'");
    $esimlive_row = mysqli_fetch_assoc($select_esimlive);
    $esimLiveCharge = $esimlive_row['USD'];
    
	//echo $q2="select * from esimlive where status='A' AND id='2'";
	
    $select_activation = mysqli_query($con, "select * from esimlive where status='A' AND id='2'");
    $activation_row = mysqli_fetch_assoc($select_activation);
    $activationCharge = $activation_row['USD'];
    
    $totalCost = 0;
    
    while($row=mysqli_fetch_assoc($select))
    { 
        $plan_id=$row['product_id']; 
        $qty=$row['quantity'];
        $esim_live=$row['esim_live'];  
        $autorenew_status = $row['autorenew'];
        $talktime_status = $row['talktime'];
        if($esim_live=='1')
        {
            $esim_chk="checked";
        } else {
            $esim_chk="";
        }

//echo $q3="select plan_name,GB,Mins,Days,USD,zone_id from plans where id='$plan_id'";
		
        $plan_query = "select plan_name,GB,Mins,Days,USD,zone_id from plans where id='$plan_id'";
        $plan_result = mysqli_query($con, $plan_query);
        $row1 = mysqli_fetch_assoc($plan_result);    
        $rate = $row1['USD'];
        $cost = $rate*$qty;
       if($esim_live == 1)
                                    {
                                    $cost = $cost + ($qty*1);
                                    }
                                    if($talktime_status == 1)
                                    {
                                    $cost = $cost + ($qty*8);
                                    }
		//echo "<br>Cost : $cost<br>";

        $totalCost = $totalCost + $cost;
    }
} 


$total_charge = $totalCost;
//echo "\nTotal_cost -$total_charge";

require 'vendor/autoload.php';
require_once 'constants/SampleCodeConstants.php';
use net\authorize\api\contract\v1 as AnetAPI;
use net\authorize\api\controller as AnetController;
  
function getAnAcceptPaymentPage($orderId,$total_charge,$customerProfileId)
{
    /* Create a merchantAuthenticationType object with authentication details
       retrieved from the constants file */
    $merchantAuthentication = new AnetAPI\MerchantAuthenticationType();
    $merchantAuthentication->setName(\SampleCodeConstants::MERCHANT_LOGIN_ID);
    $merchantAuthentication->setTransactionKey(\SampleCodeConstants::MERCHANT_TRANSACTION_KEY);
    
    // Set the transaction's refId
    $refId = 'ref' . time();
    $amount  = (float)$total_charge;
    $orderNo = "#".$orderId;
    
    // Create order information
    $order = new AnetAPI\OrderType();
    $order->setInvoiceNumber($orderNo);
    $order->setDescription("eSIM (".$orderNo.")");

    // Set the customer's Bill To address
    $customerAddress = new AnetAPI\CustomerAddressType();
    $customerAddress->setFirstName($_SESSION['fname']);
    $customerAddress->setLastName($_SESSION['lname']);
    $customerAddress->setPhoneNumber($_SESSION['phone']);
    $customerAddress->setCompany($_SESSION['userCompany']);
    
    // Set the customer's identifying information
    $customerData = new AnetAPI\CustomerDataType();
    $customerData->setType("individual");
    $customerData->setEmail($_SESSION['user']);
    
    if($customerProfileId != '') {
        $profileData = new AnetAPI\CustomerProfilePaymentType();
        $profileData->setCustomerProfileId($customerProfileId);
    }

    //create a transaction
    $transactionRequestType = new AnetAPI\TransactionRequestType();
    $transactionRequestType->setTransactionType("authCaptureTransaction");
    $transactionRequestType->setAmount($amount);
    $transactionRequestType->setOrder($order);
    $transactionRequestType->setBillTo($customerAddress);
    $transactionRequestType->setCustomer($customerData);
    if($customerProfileId != '') {
        $transactionRequestType->setProfile($profileData);
    }
    

    // Set Hosted Form options
    $setting1 = new AnetAPI\SettingType();
    $setting1->setSettingName("hostedPaymentButtonOptions");
    $setting1->setSettingValue("{\"text\": \"Pay\"}");

    $setting2 = new AnetAPI\SettingType();
    $setting2->setSettingName("hostedPaymentOrderOptions");
    $setting2->setSettingValue("{\"show\": false}");

    $setting3 = new AnetAPI\SettingType();
    $setting3->setSettingName("hostedPaymentReturnOptions");
    $setting3->setSettingValue(
        "{\"showReceipt\": false}"
    );
    
    $setting4 = new AnetAPI\SettingType();
    $setting4->setSettingName("hostedPaymentBillingAddressOptions");
    $setting4->setSettingValue("{\"show\": false}");
    
    $base_url = ( isset($_SERVER['HTTPS']) && $_SERVER['HTTPS']=='on' ? 'https' : 'http' ) . '://' .  $_SERVER['HTTP_HOST'];

    $setting5 = new AnetAPI\SettingType();
    $setting5->setSettingName("hostedPaymentIFrameCommunicatorUrl");
    $setting5->setSettingValue(
        "{\"url\": \"".$base_url."/version2.0/iframecommunicator.html\",}"
    );

    // Build transaction request
    $request = new AnetAPI\GetHostedPaymentPageRequest();
    $request->setMerchantAuthentication($merchantAuthentication);
    $request->setRefId($refId);
    $request->setTransactionRequest($transactionRequestType);

    $request->addToHostedPaymentSettings($setting1);
    $request->addToHostedPaymentSettings($setting2);
    $request->addToHostedPaymentSettings($setting3);
    $request->addToHostedPaymentSettings($setting4);
    $request->addToHostedPaymentSettings($setting5);
    
    //execute request
    $controller = new AnetController\GetHostedPaymentPageController($request);
    $response = $controller->executeWithApiResponse(\net\authorize\api\constants\ANetEnvironment::PRODUCTION);
    return $response;
}


if(isset($total_charge)) {
    $prev_order_detail = mysqli_query($con, "SELECT * FROM `orders` WHERE profileId != '' AND userId = '".$_SESSION['userId']."' ORDER BY id DESC LIMIT 0,1 ");
    $customerProfileId = '';
    if(mysqli_num_rows($prev_order_detail) != 0) {
        $preOrdRow = mysqli_fetch_assoc($prev_order_detail);
        $customerProfileId = $preOrdRow['profileId'];
    }

    $respData = getAnAcceptPaymentPage($myuid,$total_charge,$customerProfileId);
    if (($respData != null) && ($respData->getMessages()->getResultCode() == "Ok")) {
    } else {
        echo "ERROR :  Failed to get hosted payment page token\n";
        $errorMessages = $respData->getMessages()->getMessage();
        echo "RESPONSE : " . $errorMessages[0]->getCode() . "  " .$errorMessages[0]->getText() . "\n";
        die;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="assets/favicon.ico">
    <title>gsm2go eSIM | Checkout</title>
    <?php include("includes/logrocket.php"); ?>
    <link rel="stylesheet" href="node_modules/%40fortawesome/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="node_modules/animate.css/animate.min.css">
    <link rel="stylesheet" href="node_modules/%40fancyapps/fancybox/dist/jquery.fancybox.min.css">
    <link rel="stylesheet" href="node_modules/owl.carousel/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="node_modules/owl.carousel/dist/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="assets/css/style.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;subset=latin-ext" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i,900,900i&amp;subset=latin-ext" rel="stylesheet">
    <style>
        #add_payment{min-height:300px;}
        div.AuthorizeNetSeal{width:auto !important}
        @media only screen and (max-width: 768px) {
            .bg-img { display:none; }
            .d-none1{ display:none}
        }
        @media only screen and (min-width: 768px) {
            .bg-img1 { display:none; }
        }


        /* new css  */
        
        h5.font-weight-700.section-title-4.text-left.pb-2.mb-2.bg-img {
            background-color: #003dbc;
            color: #fff;
            font-weight: 400 !important;
            padding: 10px 20px !important;
        }
        .bank-title{
            display:flex;
            align-items: center;
        }
        .bank-title label{
            display:flex;
            align-items: center;
        }
        .bank-title input {
            margin-right: 15px;
        }
        .bank-title img{
            height: 30px;
            width: 30px;
        }
        .bank-title h2{
            font-size: 16px;
            color: #212529;
            margin: 0 10px;
        }
        .bank-detail {
        display: flex;
        /* align-items: center; */
        margin-top: 35px;
        margin-left: 65px;
        } 
        .card-detail-input{
            position: relative;
        }
        .card-detail-input input{
            padding: 6px 10px;
            width: 100px;
        }
        .card-detail-input input:focus{
            outline: 0;
            box-shadow: none;
        }
        .bank-card {
    background-color: #f5fafe;
}
        .card-detail-input span {
    position: absolute;
    height: 20px;
    width: 20px;
    background-color: darkgray;
    display: flex;
    align-items: center;
    justify-content: center;
    top: 20%;
    border-radius: 50%;
    right: 5%;
    color: #fff;
    font-size: 11px;
}
.bank-detail .btn{
    background-color: #61ae00;
    border-color: #61ae00;
    margin-left: 20px;
}
.input-img img{
    height: 60px;
    width: 80px;
    object-fit: scale-down;
}
.payment_section {
    padding: 0 20px 50px;
}
.input-img{
    border-bottom: 0.5px solid lightgray;
}
.table td, .table th {
    padding: 5px 12px;
    vertical-align: initial !important;
    border-top: 1px solid #e0e0e0;
    border-bottom: 1px solid #e0e0e0;
    font-weight: 500;

}
thead th {
    color: #212529;
    background-color: transparent;
    border: none !important;
    font-weight: 500;   
    font-size: 18px;
}
thead tr{
    border-top: 1px solid #e0e0e0;
    border-bottom: 1px solid #e0e0e0;
}
.list-group-item {
    padding: 0 !important;
}
.navik-header-container {
    padding-right: 20px !important;
}
.back-btn {
    position: absolute;
    box-shadow: none;
    /* top: -50% !important; */
    z-index: 1;
    left: 12%;
    top: 44%;
    font-size: 15px;
    background-color: #000;
    color: #fff;
    border: none;
    width: 130px;
    max-width: 100%;
    height: 45px;
    max-height: 100%;
    border-radius: 3px;
    font-family: Century Gothic,Regular;
    word-wrap: break-word!important;
    word-break: normal!important;
    white-space: normal!important;
}
.back-btn:hover{
    background-color: #000;
}
.back-btn:focus{
    background-color: #000;
}
@media(min-width: 1400px){
    .page-title-container{
        max-width: 1300px;
    }
    .container{
        max-width:1310px;
    }
}
@media(max-width: 1199px){
    .navik-header .logo {
    padding: 0 0 10px 0 !important;
}
}
@media(max-width: 991px){
    .d-none1 {
    display: block !important;
}
.bg-img{
    display: block !important;
}
}
@media(max-width: 575px){
    .back-btn {
    left: 16%;
    top: 44%;
    /* width: 30%; */
}
}
@media(max-width: 480px){
    .back-btn {
    left: 34%;
    top: 80%;
    width: 30%;
    padding: 10px 0;
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
 
@media(max-width: 425px){
    .navik-header .burger-menu {
    right: 0px !important;
}
.topcorner {
    /* top: 0 !important; */
    /* right: 60px !important; */
}
.navik-header .logo img {
    width: 200px;
}
.burger-menu{
    top: 20px !important;
}
}
#gpay_button{
    display: none;
}
        /* new css  */

















    </style>
    <script src="https://activations.gsm2go.com/js/vendor/jquery.min.js"></script>
    <!--script type="text/javascript">
		//<![CDATA[
			function callParentFunction(str) {
				if (str && str.length > 0 
					&& window.parent 
					&& window.parent.parent
					&& window.parent.parent.AuthorizeNetIFrame 
					&& window.parent.parent.AuthorizeNetIFrame.onReceiveCommunication)
					{
                        // Errors indicate a mismatch in domain between the page containing the iframe and this page.
						window.parent.parent.AuthorizeNetIFrame.onReceiveCommunication(str);
				}
			}

			function receiveMessage(event) {
				if (event && event.data) {
					callParentFunction(event.data);
				}
			}

			if (window.addEventListener) {
				window.addEventListener("message", receiveMessage, false);
			} else if (window.attachEvent) {
				window.attachEvent("onmessage", receiveMessage);
			}

			if (window.location.hash && window.location.hash.length > 1) {
				callParentFunction(window.location.hash.substring(1));
			}
		//]]/>
	</script-->
    <script type="text/javascript">
        $( document ).ready(function() {
            $("#add_payment").show();
            $("#add_payment").attr('hidden','false');
            $("#send_token").attr({ "action": "https://accept.authorize.net/payment/payment", "target": "add_payment" }).submit();
            //$("#send_token").attr({ "action": "https://test.authorize.net/payment/payment", "target": "add_payment" }).submit();
            $(window).scrollTop($('#add_payment').offset().top - 50);
        });
    </script>
</head>
<body class="bg-image bg-fixed" style="background: lightgray">

<?php include("includes/header.php"); ?>

<!-- Page title -->
<div class="d-flex flex-column w-100 bg-white">
    <div class="d-flex align-items-center bg-image">
        <div class="container page-title-container">
            <div class="row align-items-center py-4">
                <div class="col-lg-8 col-xl-9 text-center text-lg-left">
                    <h1 class="display-5 font-weight-800 mb-0" style="color:midnightblue;">
                        <?php //echo $row['plan_name']; ?>
                    </h1>
                </div>
            </div>
            <div data-height="40px"></div>
        </div>
    </div>
</div>

<!-- Content -->
<div class="pt-0">

    <div class="section mt-up75 bg-white">
        <div class="container">
            <div class="row">
            <div class="col-lg-7">

<div class="pb-3">
    <div class="bg-white rounded-xl shadow-lg">
        <h5 class="font-weight-700 section-title-4 text-left pb-2 mb-2 bg-img">
            Payment Options
            <!-- <div class="title-divider-round mt-3"></div> -->
        </h5>
        <h5 class="font-weight-700 section-title-4 text-left pb-2 mb-2 bg-img1">
            <?php echo $row['plan_name']; ?>
            <!-- <div class="title-divider-round mt-3"></div> -->
        </h5>
        <div class="payment_section">
            <form name="payment_form">
                <!-- <div class="bank-card">
                    <div class="bank-title">
                    <input type="radio" id="card-1" name="payment_method" value="card1">
                       <label for="card-1"> <img src="axis-bank-logo.jpg" alt="" class="img-fluid">
                        <h2>Axis Bank Credit Card</h2>
                        <span>xxxx xxxx xxxx 3607</span>
                    </label>
                    </div>
                    <div class="bank-detail">
                        <div class="card-detail-input">
                            <input type="text" placeholder="CVV">
                            <span><i class="fa-solid fa-question"></i></span>
                        </div>
                        <button class="btn btn-primary">CONTINUE</button>
                    </div>
                </div> -->
                 <div class="input-img">
                    <input type="radio" id="html" name="payment_method" value="card" checked>
                    <label for="html"><img src="assets/images/authnet_cards.jpg" alt="" class="img-fluid"></label><br>
                </div>
                <div class="input-img">
                    <input type="radio" id="css" name="payment_method" value="paypal">
                    <label for="css"><img src="paypal-logo.png" alt="" class="img-fluid"> </label><br>
                </div>
                <div class="input-img">
                    <input type="radio" id="javascript" name="payment_method" value="google_pay">
                    <label for="javascript"><img src="1598834818_google-pay.avif" alt="" class="img-fluid"> </label><br>
                </div>
                <!-- <div class="border mb-5">
                    <input type="radio" id="javascript" name="payment_method"   value="google_pay">
                    <label for="javascript">Google pay</label>
                </div> -->
                <div id="gpay_button"></div>
                <button id="payment_button" class="btn btn-primary mt-5">Process Payment</button>
            </form> 
        </div>
        <div class="card" style="border:none; display:none;">
            <div class="row">
                <div class="col-12">
                    
                    <form method="post" id="paymentForm" action="payment_response_checkout.php"> 
                        <input type="hidden" name="orderId" value="<?php echo $myuid; ?>" />
                        <input type="hidden" name="amount" value="<?php echo $total_charge; ?>" /> 
                        <input type="hidden" name="orderType" value="<?php echo $_SESSION['purType']; ?>" /> 
                        <input type="hidden" name="paymentDetails[Status]" value="" id="py_status" />
                        <input type="hidden" name="paymentDetails[TransId]" value="" id="py_transId" />
                        <input type="hidden" name="paymentDetails[TransCode]" value="" id="py_transCode" />
                        <input type="hidden" name="paymentDetails[AuthCode]" value="" id="py_authCode" />
                        <input type="hidden" name="paymentDetails[MsgCode]" value="" id="py_msgCode" />
                        <input type="hidden" name="paymentDetails[Desc]" value="" id="py_desc" />
                        <input type="hidden" name="paymentDetails[ErrorCode]" value="" id="py_errorCode" />
                        <input type="hidden" name="paymentDetails[ErrorMsg]" value="" id="py_errorMsg" />
                    </form>
                    <div id="iframe_holder" class="center-block" style="width:100%%;max-width: 1000px">
                        <iframe id="add_payment" class="embed-responsive-item panel" name="add_payment" width="100%" frameborder="0" scrolling="no" hidden="true">
                  
                    </iframe>
                  <!--  <a href="checkout2.php" class="btn btn-primary back-btn">Back</a>-->
                    </div>
                    <form id="send_token" action="" method="post" target="add_payment" >
                       
                        <input type="hidden" name="token" value="<?php echo $respData->getToken(); ?>" />
                    </form>
                </div>
            </div>
        </div>
        
    </div>
</div>
<?php include_once 'paypal_config.php';  ?>

<form action="<?php echo PAYPAL_URL; ?>" method="post" id="paypal_form">
<input type="hidden" name="business" value="<?php echo PAYPAL_ID; ?>">

<!-- Important For PayPal Checkout -->
<!-- <label>Enter Product Name</label>
<input type="text" name="item_name" id="item" required><br><br>
<label>Enter Price</label> -->
<input style="display:none;"  type="number" value="<?php echo $totalCost; ?>" name="amount" id="amount">
<input type="hidden" name="currency_code" value="<?php echo PAYPAL_CURRENCY; ?>">

<!-- Specify a Buy Now button. -->
<input type="hidden" name="cmd" value="_xclick">
<!-- Specify URLs -->
<input type="hidden" name="return" value="<?php echo PAYPAL_RETURN_URL; ?>">
<input type="hidden" name="cancel_return" value="<?php echo PAYPAL_CANCEL_URL; ?>">
<br><br>
<!-- Display the payment button. -->
<!-- <input type="submit" name="submit" border="0" value="Paid"> -->
</form>



</div>
                <!-- Sidebar -->
                <div class="col-lg-5 bg-img">
                    <div class="pb-0 mb-3">
                        <div class="bg-white rounded-xl shadow-lg pt-4 pb-2" style="min-height:500px;">
                            <div class="px-3 px-md-3 px-lg-3 px-xl-3">
                                <div data-height="1px"></div>
                                <span class="text-dark mb-4 text-capitalize text-left" style="font-size: 18px;">Selected Plans</span>
                            </div>
                            <?php
                                $select = mysqli_query($con, "select * from cart_items where cookie_id='$cookieValue' AND ordered ='0'");
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
                                    $plan_id=$row['product_id']; 
                                    $qty=$row['quantity'];
                                    $esim_live=$row['esim_live'];
                                    $autorenew_status = $row['autorenew'];
                                    $talktime_status = $row['talktime']; 
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
                                    $rate = $row1['USD'];
                                    $cost = $rate*$qty;
                                    if($esim_live == 1)
                                    {
                                    $cost = $cost + ($qty*1);
                                    }
                                    if($talktime_status == 1)
                                    {
                                    $cost = $cost + ($qty*8);
                                    }
                                    //$total_cost = $total_cost + $cost;
                                    // if($esim_live=='1')
                                    // {
                                    //     $cost= $cost + ($qty*$esimLiveCharge);
                                    // } else {
                                    //     $cost= $cost + ($qty*$activationCharge);
                                    // }
                                    $zoneid = $row1['zone_id'];
                                    
                                    $zone_query = "select * from zones where id='$zoneid'";
                                    $zone_result = mysqli_query($con, $zone_query);
                                    $res = mysqli_fetch_assoc($zone_result);
                                    $zone = $res['zone_name'];
                                    
                                    $totalCost = $totalCost + $cost;
                                ?>
   
                                <div class="d-lg-block">

                                <table class="table">
                                        <thead>
                                            <tr>
                                            <th scope="col">Item Name</th>
                                            <th scope="col">Unit Price</th>
                                            <th scope="col">QTY</th>
                                            <th scope="col">Cost</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <h5 class="font-weight-700 mb-0 text-left"><?php echo $zone; ?></h5>
                                                </td>
                                            </tr>
                                            <tr>
                                            <th scope="row"> <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                            <div class="d-flex align-items-center">
                                                <span>Quantity</span>
                                            </div>
                                        </a></th>
                                            <td>-</td>
                                            <td>
                                            <small class="font-weight-600 text-uppercase px-2"><?php echo $qty; ?></small>
                                            </td>
                                            <td>-</td>
                                            </tr>
                                            <tr>
                                            <th scope="row">  <?php if(!empty($row1['GB'])){ ?>
                                        <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                            <div class="d-flex align-items-center">
                                                <span>GB</span>
                                            </div>
                                        </a>
                                        <?php } ?></th>
                                            <td>-</td>
                                            <td>
                                            <small class="font-weight-600 text-uppercase px-2"><?php echo $row1['GB']; ?></small>
                                            </td>
                                            <td>-</td>
                                            </tr>
                                            <tr>
                                            <th scope="row">
                                            <?php if(!empty($row1['Mins'])){ ?>
                                        <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                            <div class="d-flex align-items-center">
                                                <span>Mins</span>
                                            </div>
                                        </a>
                                        <?php } ?>
                                            </th>
                                            <td>-</td>
                                            <td>
                                            <small class="font-weight-600 text-uppercase px-2"><?php echo $row1['Mins']; ?></small>

                                            </td>
                                            <td>-</td>
                                            </tr>
                                            <tr>
                                            <th scope="row">
                                            <?php if(!empty($row1['SMS'])){ ?>
                                        <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                            <div class="d-flex align-items-center">
                                                <span>SMS</span>
                                            </div>
                                        </a>
                                        <?php } ?>
                                            </th>
                                            <td>-</td>
                                            <td>
                                            <small class="font-weight-600 text-uppercase px-2"><?php echo $row1['SMS']; ?></small>
                                            </td>
                                            <td>-</td>
                                            </tr>
                                            <tr>
                                            <th scope="row">
                                            <?php if(!empty($row1['Days'])){ ?>
                                        <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                            <div class="d-flex align-items-center">
                                                <span>Days</span>
                                            </div>
                                        </a>
                                        <?php } ?>
                                            </th>
                                            <td>-</td>
                                            <td>
                                            <small class="font-weight-600 text-uppercase px-2"><?php echo $row1['Days']; ?></small>
                                            </td>
                                            <td>-</td>
                                            </tr>
                                            <tr>
                                            <th scope="row">
                                            <?php 
                                        if($esim_live == 1) { 
                                        ?>
                                        <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                            <div class="d-flex align-items-center">
                                                <span>Keep eSIM live for $1 / month</span>
                                            </div>
                                           
                                        </a>
                                        <?php } ?>
                                            </th>
                                            <td>-</td>
                                            <td>
                                            <small class="font-weight-600 text-uppercase px-2">
                                                <i class="fa fa-check"></i>
                                            </small>
                                            </td>
                                            <td>-</td>
                                            </tr>
                                        </tbody>
                                        </table>
                                        <div class="d-lg-block">
                                            <h3 class="font-weight-700 px-3" style="text-align:right;"><span class="mx-5">TOTAL: </span>USD<?php echo $totalCost; ?></h3>
                                        </div>


                                        <!-- <h5 class="font-weight-700 mb-0 text-left px-4 px-md-5 px-lg-4 px-xl-4"><?php echo $zone; ?> - <?php echo $plan_name; ?></h5> -->

                                    <!-- <h5 class="font-weight-700 px-4 px-md-5 px-lg-4 px-xl-4 pt-3 mb-3">Plan Detail <span class="float-right">USD <?php echo $cost; ?></span></h5> -->
                                    <!-- <ul class="list-group list-group-flush py-0">
                                       
                                        <?php if(!empty($row1['GB'])){ ?>
                                        <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center px-4 px-md-5 px-lg-4 px-xl-4">
                                            <div class="d-flex align-items-center">
                                                <span>GB</span>
                                            </div>
                                            <small class="text-white font-weight-600 text-uppercase bg-primary rounded-xl px-2"><?php echo $row1['GB']; ?></small>
                                        </a>
                                        <?php } ?>
                                        <?php if(!empty($row1['Mins'])){ ?>
                                        <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center px-4 px-md-5 px-lg-4 px-xl-4">
                                            <div class="d-flex align-items-center">
                                                <span>Mins</span>
                                            </div>
                                            <small class="text-white font-weight-600 text-uppercase bg-primary rounded-xl px-2"><?php echo $row1['Mins']; ?></small>
                                        </a>
                                        <?php } ?>
                                        <?php if(!empty($row1['SMS'])){ ?>
                                        <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center px-4 px-md-5 px-lg-4 px-xl-4">
                                            <div class="d-flex align-items-center">
                                                <span>SMS</span>
                                            </div>
                                            <small class="text-white font-weight-600 text-uppercase bg-primary rounded-xl px-2"><?php echo $row1['SMS']; ?></small>
                                        </a>
                                        <?php } ?>
                                        <?php if(!empty($row1['Days'])){ ?>
                                        <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center px-4 px-md-5 px-lg-4 px-xl-4">
                                            <div class="d-flex align-items-center">
                                                <span>Days</span>
                                            </div>
                                            <small class="text-white font-weight-600 text-uppercase bg-primary rounded-xl px-2"><?php echo $row1['Days']; ?></small>
                                        </a>
                                        <?php } ?>
                                        <?php 
                                        if($esim_live == 1) { 
                                        ?>
                                        <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center px-4 px-md-5 px-lg-4 px-xl-4">
                                            <div class="d-flex align-items-center">
                                                <span>Keep eSIM live for $1 / month</span>
                                            </div>
                                            <small class="text-white font-weight-600 text-uppercase bg-success rounded-xl px-2">
                                                <i class="fa fa-check"></i>
                                            </small>
                                        </a>
                                        <?php } ?>
                                    </ul> -->
                                </div>
                            <?php } ?>
                            <!-- <div class="d-lg-block">
                                <h3 class="font-weight-700 px-4 px-md-5 px-lg-4 px-xl-4 pt-3 mb-3" style=text-align:center;"">TOTAL: USD <?php echo $totalCost; ?></h3>
                            </div> -->
                        </div>
                    </div>
                </div>

                <!-- Content body -->
                <div class="pb-3 d-none1 col-lg-12">
    <div class="bg-white rounded-xl shadow-lg px-4 py-5 p-md-3">
        <div class="row">
            <div class="col-md-2 pt-3 pd-2">
                <div class="AuthorizeNetSeal"> 
                    <script type="text/javascript" language="javascript">
                        var ANS_customer_id="d2e55e57-e0ab-44fa-8f8b-b67bbd44a8f5";
                    </script> 
                    <script type="text/javascript" language="javascript" src="//verify.authorize.net:443/anetseal/seal.js" ></script> 
                </div>
            </div>
            <div class="col-md-10">
                <p>
                <span style="color:rgb(0,112,192)">gsm</span><span style="color:rgb(0,176,80)">2go</span> does not store credit card details.<br>
                Your credit card information is transmitted, securely and encrypted, from here directly to Authorize.Net (a wholly owned subsidiary of Visa (NYSE: V).<br>
                Click on the Authorize.Net seal <span style="color:rgb(0,112,192)">gsm</span><span style="color:rgb(0,176,80)">2go</span>’s merchant verification from Authorize.Net
                </p>
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

<?php //include("includes/footer.php"); ?>

<!-- Go to top -->
<div class="go-to-top">
    <a href="#" class="rounded-circle"><i class="fas fa-chevron-up"></i></a>
</div>
<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="components/navik-navigation-menu/dist/js/navik.menu.js"></script>
<script src="node_modules/isotope-layout/dist/isotope.pkgd.min.js"></script>
<script src="node_modules/imagesloaded/imagesloaded.pkgd.min.js"></script>
<script src="node_modules/%40fancyapps/fancybox/dist/jquery.fancybox.min.js"></script>
<script src="node_modules/owl.carousel/dist/owl.carousel.min.js"></script>
<script src="node_modules/jquery-circle-progress/dist/circle-progress.min.js"></script>
<script src="assets/js/custom.js"></script>
<script async src="https://pay.google.com/gp/p/js/pay.js" onload="onGooglePayLoaded()"></script>
<script>
$(function () {
    $('.tooltip-btn').tooltip()
});
</script>
<!-- jQuery -->
<script type="text/javascript">

$("#payment_button").click(function(e){
    e.preventDefault();
    var payment_method = $('input[name=payment_method]:checked').val();
    //alert(payment_method);
    if(payment_method == "card")
    {
        $(".card").show();
        $(".payment_section").hide();
    }
    else if(payment_method == "paypal")
    {
        $("#paypal_form").submit();
    }
    else if(payment_method == "google_pay")
    {
        $("#gpay_button").show();
    }

});


(function () {
    if (!window.AuthorizeNetIFrame) window.AuthorizeNetIFrame = {};
        AuthorizeNetIFrame.onReceiveCommunication = function (querystr) {
            var params = parseQueryString(querystr);
            console.log(params);
            switch (params["action"]) {
                case "successfulSave":
                    break;
                case "cancel":
                    $('#py_status').val('Cancelled');
                    $('#py_errorCode').val('0');
                    $('#py_errorMsg').val('This transaction has been Cancelled by user');
                    $('#paymentForm').submit();
                    break;
                case "resizeWindow":
                    var w = parseInt(params["width"]);
                    var h = parseInt(params["height"]);
                    var ifrm = document.getElementById("add_payment");
                    ifrm.style.width = w.toString() + "px";
                    ifrm.style.height = h.toString() + "px";
                    break;
                case "transactResponse":
                    var ifrm = document.getElementById("add_payment");
                    ifrm.style.display = 'none';
                    var transDetails = jQuery.parseJSON(params["response"]);
                    if(transDetails.responseCode == '1') {
                        $('#py_status').val('Success');
                        $('#py_transId').val(transDetails.transId);
                        $('#py_transCode').val(transDetails.responseCode);
                        $('#py_authCode').val(transDetails.authorization);
                        $('#py_msgCode').val(transDetails.responseCode);
                        $('#py_desc').val('This transaction has been approved. (' + transDetails.refId + ')');
                    } else {
                        $('#py_status').val('Declined');
                        $('#py_transId').val(transDetails.transId);
                        $('#py_transCode').val(transDetails.responseCode);
                        $('#py_authCode').val(transDetails.authorization);
                        $('#py_msgCode').val(transDetails.responseCode);
                        $('#py_desc').val('This transaction has been declined. (' + transDetails.refId + ')');
                        $('#py_errorCode').val(transDetails.responseCode);
                        $('#py_errorMsg').val('This transaction has been declined');
                    }
                    $('#paymentForm').submit();
            }
        };

        function parseQueryString(str) {
            var vars = [];
            var arr = str.split('&');
            var pair;
            for (var i = 0; i < arr.length; i++) {
                pair = arr[i].split('=');
                vars.push(pair[0]);
                vars[pair[0]] = unescape(pair[1]);
            }
            return vars;
        }
}());
</script>
<script>
    /**
* Define the version of the Google Pay API referenced when creating your
* configuration
*
* @see {@link https://developers.google.com/pay/api/web/reference/request-objects#PaymentDataRequest|apiVersion in PaymentDataRequest}
*/
const baseRequest = {
 apiVersion: 2,
 apiVersionMinor: 0
};

/**
* Card networks supported by your site and your gateway
*
* @see {@link https://developers.google.com/pay/api/web/reference/request-objects#CardParameters|CardParameters}
* @todo confirm card networks supported by your site and gateway
*/
const allowedCardNetworks = ["AMEX", "DISCOVER", "INTERAC", "JCB", "MASTERCARD", "VISA"];

/**
* Card authentication methods supported by your site and your gateway
*
* @see {@link https://developers.google.com/pay/api/web/reference/request-objects#CardParameters|CardParameters}
* @todo confirm your processor supports Android device tokens for your
* supported card networks
*/
const allowedCardAuthMethods = ["PAN_ONLY", "CRYPTOGRAM_3DS"];

/**
* Identify your gateway and your site's gateway merchant identifier
*
* The Google Pay API response will return an encrypted payment method capable
* of being charged by a supported gateway after payer authorization
*
* @todo check with your gateway on the parameters to pass
* @see {@link https://developers.google.com/pay/api/web/reference/request-objects#gateway|PaymentMethodTokenizationSpecification}
*/
const tokenizationSpecification = {
 type: 'PAYMENT_GATEWAY',
 parameters: {
  'gateway': 'example',
  'gatewayMerchantId': 'exampleGatewayMerchantId'
 }
};

/**
* Describe your site's support for the CARD payment method and its required
* fields
*
* @see {@link https://developers.google.com/pay/api/web/reference/request-objects#CardParameters|CardParameters}
*/
const baseCardPaymentMethod = {
 type: 'CARD',
 parameters: {
  allowedAuthMethods: allowedCardAuthMethods,
  allowedCardNetworks: allowedCardNetworks
 }
};

/**
* Describe your site's support for the CARD payment method including optional
* fields
*
* @see {@link https://developers.google.com/pay/api/web/reference/request-objects#CardParameters|CardParameters}
*/
const cardPaymentMethod = Object.assign(
 {},
 baseCardPaymentMethod,
 {
  tokenizationSpecification: tokenizationSpecification,
 }
);

/**
* An initialized google.payments.api.PaymentsClient object or null if not yet set
*
* @see {@link getGooglePaymentsClient}
*/
let paymentsClient = null;

/**
* Configure your site's support for payment methods supported by the Google Pay
* API.
*
* Each member of allowedPaymentMethods should contain only the required fields,
* allowing reuse of this base request when determining a viewer's ability
* to pay and later requesting a supported payment method
*
* @returns {object} Google Pay API version, payment methods supported by the site
*/
function getGoogleIsReadyToPayRequest() {
 return Object.assign(
   {},
   baseRequest,
   {
    allowedPaymentMethods: [baseCardPaymentMethod]
   }
 );
}

/**
* Configure support for the Google Pay API
*
* @see {@link https://developers.google.com/pay/api/web/reference/request-objects#PaymentDataRequest|PaymentDataRequest}
* @returns {object} PaymentDataRequest fields
*/
function getGooglePaymentDataRequest() {
 const paymentDataRequest = Object.assign({}, baseRequest);
 paymentDataRequest.allowedPaymentMethods = [cardPaymentMethod];
 paymentDataRequest.transactionInfo = getGoogleTransactionInfo();
 paymentDataRequest.merchantInfo = {
  // @todo a merchant ID is available for a production environment after approval by Google
  // See {@link https://developers.google.com/pay/api/web/guides/test-and-deploy/integration-checklist|Integration checklist}
  merchantId: '01234567890123456789',
  merchantName: 'Example Merchant'
 };
 return paymentDataRequest;
}

/**
* Return an active PaymentsClient or initialize
*
* @see {@link https://developers.google.com/pay/api/web/reference/client#PaymentsClient|PaymentsClient constructor}
* @returns {google.payments.api.PaymentsClient} Google Pay API client
*/
function getGooglePaymentsClient() {
 if ( paymentsClient === null ) {
  paymentsClient = new google.payments.api.PaymentsClient({environment: 'TEST'});
 }
 return paymentsClient;
}

/**
* Initialize Google PaymentsClient after Google-hosted JavaScript has loaded
*
* Display a Google Pay payment button after confirmation of the viewer's
* ability to pay.
*/
function onGooglePayLoaded() {
 const paymentsClient = getGooglePaymentsClient();
 paymentsClient.isReadyToPay(getGoogleIsReadyToPayRequest())
   .then(function(response) {
    if (response.result) {
     addGooglePayButton();
     // @todo prefetch payment data to improve performance after confirming site functionality
     // prefetchGooglePaymentData();
    }
   })
   .catch(function(err) {
    // show error in developer console for debugging
    console.error(err);
   });
}

/**
* Add a Google Pay purchase button alongside an existing checkout button
*
* @see {@link https://developers.google.com/pay/api/web/reference/request-objects#ButtonOptions|Button options}
* @see {@link https://developers.google.com/pay/api/web/guides/brand-guidelines|Google Pay brand guidelines}
*/
function addGooglePayButton() {
 const paymentsClient = getGooglePaymentsClient();
 const button =
   paymentsClient.createButton({onClick: onGooglePaymentButtonClicked});
 document.getElementById('gpay_button').appendChild(button);
}

/**
* Provide Google Pay API with a payment amount, currency, and amount status
*
* @see {@link https://developers.google.com/pay/api/web/reference/request-objects#TransactionInfo|TransactionInfo}
* @returns {object} transaction info, suitable for use as transactionInfo property of PaymentDataRequest
*/
function getGoogleTransactionInfo() {
 return {
  countryCode: 'US',
  currencyCode: 'USD',
  totalPriceStatus: 'FINAL',
  // set to cart total
  totalPrice: '1.00'
 };
}

/**
* Prefetch payment data to improve performance
*
* @see {@link https://developers.google.com/pay/api/web/reference/client#prefetchPaymentData|prefetchPaymentData()}
*/
function prefetchGooglePaymentData() {
 const paymentDataRequest = getGooglePaymentDataRequest();
 // transactionInfo must be set but does not affect cache
 paymentDataRequest.transactionInfo = {
  totalPriceStatus: '1',
  currencyCode: 'USD'
 };
 const paymentsClient = getGooglePaymentsClient();
 paymentsClient.prefetchPaymentData(paymentDataRequest);
}

/**
* Show Google Pay payment sheet when Google Pay payment button is clicked
*/
function onGooglePaymentButtonClicked() {
 const paymentDataRequest = getGooglePaymentDataRequest();
 paymentDataRequest.transactionInfo = getGoogleTransactionInfo();

 const paymentsClient = getGooglePaymentsClient();
 paymentsClient.loadPaymentData(paymentDataRequest)
   .then(function(paymentData) {
    // handle the response
    processPayment(paymentData);
   })
   .catch(function(err) {
    // show error in developer console for debugging
    console.error(err);
   });
}

/**
* Process payment data returned by the Google Pay API
*
* @param {object} paymentData response from Google Pay API after user approves payment
* @see {@link https://developers.google.com/pay/api/web/reference/response-objects#PaymentData|PaymentData object reference}
*/
function processPayment(paymentData) {
 // show returned data in developer console for debugging
  console.log(paymentData);
 // @todo pass payment token to your gateway to process payment
 paymentToken = paymentData.paymentMethodData.tokenizationData.token;
}
</script>
</body>
</html>