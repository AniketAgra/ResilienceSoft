<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
session_start();
include("includes/config.php");

if(isset($_SESSION['userId'], $_SESSION['role'],$_POST['planid']))
{
    $_SESSION['planid'] = $_POST['planid'];
} 
else
{
    $_SESSION['planid'] = $_POST['planid'];
    header("Location:login");
}

if(!isset($_SESSION['user'],$_SESSION['role'],$_SESSION['direct'],$_SESSION['esim']) && ($_SESSION['role']!="U")){
    header("Location: signup.php");
}
else{
    if($_SESSION['esim']==0)
    {
        $esim_amt_row = mysqli_fetch_assoc(mysqli_query($con, "select * from esimlive where id='2'"));
    }
    else
    {
        $esim_amt_row = mysqli_fetch_assoc(mysqli_query($con, "select * from esimlive where id='1'"));
    }
    $plan_amt_row = mysqli_fetch_assoc(mysqli_query($con, "select * from plans where id='".$_SESSION['direct']."'"));

    $total_charge = $esim_amt_row['USD'] + $plan_amt_row['USD'];
}

require 'vendor/autoload.php';
require_once 'constants/SampleCodeConstants.php';
use net\authorize\api\contract\v1 as AnetAPI;
use net\authorize\api\controller as AnetController;
  
function getAnAcceptPaymentPage()
{
    global $total_charge;
    /* Create a merchantAuthenticationType object with authentication details
       retrieved from the constants file */
    $merchantAuthentication = new AnetAPI\MerchantAuthenticationType();
    $merchantAuthentication->setName(\SampleCodeConstants::MERCHANT_LOGIN_ID);
    $merchantAuthentication->setTransactionKey(\SampleCodeConstants::MERCHANT_TRANSACTION_KEY);
    
    // Set the transaction's refId
    $refId = 'ref' . time();
    $amount  = $total_charge;
    //create a transaction
    $transactionRequestType = new AnetAPI\TransactionRequestType();
    $transactionRequestType->setTransactionType("authCaptureTransaction");
    $transactionRequestType->setAmount($amount);

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
    
    $setting5 = new AnetAPI\SettingType();
    $setting5->setSettingName("hostedPaymentIFrameCommunicatorUrl");
    /*$setting5->setSettingValue(
        "{\"url\": \"https://activations.gsm2go.com/checkout.php\",}"
    );*/
    $setting5->setSettingValue(
        "{\"url\": \"https://qr2.gsm2go.com/v6/checkout.php\",}"
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
    $response = $controller->executeWithApiResponse(\net\authorize\api\constants\ANetEnvironment::SANDBOX);
    
    /*if (($response != null) && ($response->getMessages()->getResultCode() == "Ok")) {
        echo $response->getToken()."\n";
    } else {
        echo "ERROR :  Failed to get hosted payment page token\n";
        $errorMessages = $response->getMessages()->getMessage();
        echo "RESPONSE : " . $errorMessages[0]->getCode() . "  " .$errorMessages[0]->getText() . "\n";
    }*/
    return $response;
}
if(isset($total_charge)) {
    $respData = getAnAcceptPaymentPage();
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
    <title>gsm2go | Checkout</title>
    <link rel="stylesheet" href="node_modules/%40fortawesome/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="node_modules/animate.css/animate.min.css">
    <link rel="stylesheet" href="node_modules/%40fancyapps/fancybox/dist/jquery.fancybox.min.css">
    <link rel="stylesheet" href="node_modules/owl.carousel/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="node_modules/owl.carousel/dist/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="assets/css/style.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;subset=latin-ext" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i,900,900i&amp;subset=latin-ext" rel="stylesheet">
    <style>
        #add_payment{min-height:300px;}
        @media only screen and (max-width: 768px) {
            .bg-img { display:none; }
        }
        @media only screen and (min-width: 768px) {
            .bg-img1 { display:none; }
        }
    </style>
    <script src="https://activations.gsm2go.com/js/vendor/jquery.min.js"></script>
    <script type="text/javascript">
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
    </script>
    <script type="text/javascript">
        $( document ).ready(function() {
            $("#add_payment").show();
            $("#add_payment").attr('hidden','false');
            //$("#send_token").attr({ "action": "https://accept.authorize.net/payment/payment", "target": "add_payment" }).submit();
            $("#send_token").attr({ "action": "https://test.authorize.net/payment/payment", "target": "add_payment" }).submit();
            $(window).scrollTop($('#add_payment').offset().top - 50);
        });
    </script>
    
</head>
<body class="bg-image bg-fixed" style="background-color:#ddd">
<?php
$plan_detail = mysqli_query($con, "select * from plans where id='".$_SESSION['direct']."'");
$row = mysqli_fetch_assoc($plan_detail);
?>
<?php include("includes/header.php"); ?>

<!-- Page title -->
<div class="d-flex flex-column w-100">
    <div class="d-flex align-items-center bg-image py-2">
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

    <div class="section mt-up75">
        <div class="container">
            <div class="row">

                <!-- Sidebar -->
                <div class="col-lg-4 bg-img">
                    <div class="pb-3">
                        <div class="bg-white rounded-xl shadow-lg pb-3">
                            <?php
                            $zone_detail = mysqli_query($con, "select * from zones where id='".$row['zone_id']."'");
                            $zonerow = mysqli_fetch_assoc($zone_detail);
                            ?>
                            <div class="text-center py-3">
                                <div data-height="1px"></div>
                                <h5 class="font-weight-700 mb-0"><?php echo $zonerow['zone_name']; ?></h5>
                            </div>
                            
                            <div class="text-center px-0">
                                <div data-height="1px"></div>
                                <div class="pb-2 px-4 mb-0">
                                    <img src="assets/images/continent/<?php echo $zonerow['image']; ?>" class="shadow" style="width:100%; width:-webkit-fill-available;">
                                </div>
                                <span class="badge badge-pill badge-success mb-4 text-capitalize">Selected Plan</span>
                                <h5 class="font-weight-700 mb-0"><?php echo $row['plan_name']; ?></h5>
                            </div>


                            <div class="d-lg-block">
                                <h5 class="font-weight-700 px-4 px-md-5 px-lg-4 px-xl-5 pt-3 mt-0 mb-3">Plan Detail <span class="float-right">USD <?php echo $total_charge; ?></span></h5>
                                <ul class="list-group list-group-flush py-0">
                                    <?php if(!empty($row['GB'])){ ?>
                                    <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center px-4 px-md-5 px-lg-4 px-xl-5">
                                        <div class="d-flex align-items-center">
                                            <span>GB</span>
                                        </div>
                                        <small class="text-white font-weight-600 text-uppercase bg-primary rounded-xl px-2"><?php echo $row['GB']; ?></small>
                                    </a>
                                    <?php } ?>
                                    <?php if(!empty($row['Mins'])){ ?>
                                    <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center px-4 px-md-5 px-lg-4 px-xl-5">
                                        <div class="d-flex align-items-center">
                                            <span>Mins</span>
                                        </div>
                                        <small class="text-white font-weight-600 text-uppercase bg-primary rounded-xl px-2"><?php echo $row['Mins']; ?></small>
                                    </a>
                                    <?php } ?>
                                    <?php if(!empty($row['SMS'])){ ?>
                                    <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center px-4 px-md-5 px-lg-4 px-xl-5">
                                        <div class="d-flex align-items-center">
                                            <span>SMS</span>
                                        </div>
                                        <small class="text-white font-weight-600 text-uppercase bg-primary rounded-xl px-2"><?php echo $row['SMS']; ?></small>
                                    </a>
                                    <?php } ?>
                                    <?php if(!empty($row['Days'])){ ?>
                                    <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center px-4 px-md-5 px-lg-4 px-xl-5">
                                        <div class="d-flex align-items-center">
                                            <span>Days</span>
                                        </div>
                                        <small class="text-white font-weight-600 text-uppercase bg-primary rounded-xl px-2"><?php echo $row['Days']; ?></small>
                                    </a>
                                    <?php } ?>
                                    <?php 
                                    $esimLiveValue = 0;
                                    if($_SESSION['esim'] == 0) { 
                                    $esimLiveValue = $_SESSION['esim'];
                                    ?>
                                    <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center px-4 px-md-5 px-lg-4 px-xl-5">
                                        <div class="d-flex align-items-center">
                                            <span>eSIM Live</span>
                                        </div>
                                        <small class="text-white font-weight-600 text-uppercase bg-primary rounded-xl px-2"><?php echo $esim_amt_row['USD']; ?></small>
                                    </a>
                                    <?php } else { ?>
                                    <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center px-4 px-md-5 px-lg-4 px-xl-5">
                                        <div class="d-flex align-items-center">
                                            <span>Activation Charge</span>
                                        </div>
                                        <small class="text-white font-weight-600 text-uppercase bg-primary rounded-xl px-2"><?php echo $esim_amt_row['USD']; ?></small>
                                    </a>
                                    <?php } ?>
                                </ul>

                            </div>

                        </div>
                    </div>
                </div>

                <!-- Content body -->
                <div class="col-lg-8">

                    <div class="pb-3 mb-3">
                        <div class="bg-white rounded-xl shadow-lg px-4 py-5 p-md-4">

                            <h5 class="font-weight-700 section-title-4 text-left pb-2 mb-2 bg-img">
                                Payment Detail
                                <div class="title-divider-round mt-3"></div>
                            </h5>
                            
                            <h5 class="font-weight-700 section-title-4 text-left pb-2 mb-2 bg-img1">
                                <?php echo $row['plan_name']; ?>
                                <div class="title-divider-round mt-3"></div>
                            </h5>

                            <div class="card" style="border:none">
                                <div class="row">
                                    <div class="col-12">
                                        <?php 
                                        if(isset($_GET['retrypayment'])){
                                            $orderId = $_POST['orderId'];
                                        } else {
                                            if(isset($total_charge)) {
                                                $sql = "INSERT INTO orders (userId,email,plan_id,GB,Mins,SMS,Days,esimLive,USD,status,date )
                VALUES ('".$_SESSION['userId']."','".$_SESSION['user']."','".$_SESSION['direct']."','".$row['GB']."','".$row['Mins']."','".$row['SMS']."','".$row['Days']."','".$esimLiveValue."','$total_charge','PENDING PAYMENT','".date('Y-m-d H:i:s')."')";
                                                mysqli_query($con, $sql);
                                                $orderId = mysqli_insert_id($con);
                                            }
                                        }
                                        ?>
                                        <form method="post" id="paymentForm" action="payment_response.php"> 
                                            <input type="hidden" name="orderId" value="<?php echo $orderId; ?>" />
                                            <input type="hidden" name="amount" value="<?php echo $total_charge; ?>" /> 
                                            <input type="hidden" name="paymentDetails[Status]" value="" id="py_status" />
                                            <input type="hidden" name="paymentDetails[TransId]" value="" id="py_transId" />
                                            <input type="hidden" name="paymentDetails[TransCode]" value="" id="py_transCode" />
                                            <input type="hidden" name="paymentDetails[AuthCode]" value="" id="py_authCode" />
                                            <input type="hidden" name="paymentDetails[MsgCode]" value="" id="py_msgCode" />
                                            <input type="hidden" name="paymentDetails[Desc]" value="" id="py_desc" />
                                            <input type="hidden" name="paymentDetails[ErrorCode]" value="" id="py_errorCode" />
                                            <input type="hidden" name="paymentDetails[ErrorMsg]" value="" id="py_errorMsg" />
                                        </form>
                                        <div id="iframe_holder" class="center-block" style="width:100%;max-width: 1000px">
                                            <iframe id="add_payment" class="embed-responsive-item panel" name="add_payment" width="100%"  frameborder="0" scrolling="no" hidden="true">
                                            </iframe>
                                        </div>
                                        <form id="send_token" action="" method="post" target="add_payment" >
                                            <input type="hidden" name="token" value="<?php echo $respData->getToken(); ?>" />
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="pb-3 mb-3">
                        <div class="rounded-xl shadow-none px-4 py-5 p-md-4">

                            <h5 class="font-weight-700 section-title-4 text-left pb-2 mb-2 bg-img1">
                                <?php echo $row['plan_name']; ?>
                                <div class="title-divider-round mt-3"></div>
                            </h5>

                          
                            <div class="row">
                                <div class="col-12">
                                    <div class="AuthorizeNetSeal"> 
                                        <script type="text/javascript" language="javascript">
                                            var ANS_customer_id="d2e55e57-e0ab-44fa-8f8b-b67bbd44a8f5";
                                        </script> 
                                        <script type="text/javascript" language="javascript" src="//verify.authorize.net:443/anetseal/seal.js" ></script> 
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
<script>
    $(function () {
        $('.tooltip-btn').tooltip()
    });
</script>
<!-- jQuery -->
<script type="text/javascript">
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
$(document).ready(function() {
    setInterval(function(){ 
        $('#divPage').removeClass('container');
        $('#divPage').find('.container').first().remove();
        $("#divPageMain").css("width", "100px !important");
    }  , 3000 );
});
</script>
</body>
</html>