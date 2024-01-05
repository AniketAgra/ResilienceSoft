<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require '../vendor/autoload.php';
require_once 'constants/SampleCodeConstants.php';
use net\authorize\api\contract\v1 as AnetAPI;
use net\authorize\api\controller as AnetController;
  
function getAnAcceptPaymentPage()
{
    /* Create a merchantAuthenticationType object with authentication details
       retrieved from the constants file */
    $merchantAuthentication = new AnetAPI\MerchantAuthenticationType();
    $merchantAuthentication->setName(\SampleCodeConstants::MERCHANT_LOGIN_ID);
    $merchantAuthentication->setTransactionKey(\SampleCodeConstants::MERCHANT_TRANSACTION_KEY);
    
    // Set the transaction's refId
    $refId = 'ref' . time();

    //create a transaction
    $transactionRequestType = new AnetAPI\TransactionRequestType();
    $transactionRequestType->setTransactionType("authCaptureTransaction");
    $transactionRequestType->setAmount("1.00");

    // Set Hosted Form options
    $setting1 = new AnetAPI\SettingType();
    $setting1->setSettingName("hostedPaymentButtonOptions");
    $setting1->setSettingValue("{\"text\": \"Pay\"}");

    $setting2 = new AnetAPI\SettingType();
    $setting2->setSettingName("hostedPaymentOrderOptions");
    $setting2->setSettingValue("{\"show\": true}");

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
    $setting5->setSettingValue(
        "{\"url\": \"https://activations.gsm2go.com/gateway/gethostedform.php\",}"
    );

	$setting6 = new AnetAPI\SettingType();
    $setting6->setSettingName("hostedPaymentCustomerOptions");
    $setting6->setSettingValue("{\"addPaymentProfile\": true}");
	
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
	$request->addToHostedPaymentSettings($setting6);
    
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

function createCustomerProfileFromTransaction($transId) {
	$merchantAuthentication = new AnetAPI\MerchantAuthenticationType();
  $merchantAuthentication->setName(\SampleCodeConstants::MERCHANT_LOGIN_ID);
    $merchantAuthentication->setTransactionKey(\SampleCodeConstants::MERCHANT_TRANSACTION_KEY);

	$customerprofile = new AnetAPI\CustomerProfileType();
  $customerprofile->setDescription("Customer 2 Test PHP");
  $merchantCustomerId = '9876543210';
  $customerprofile->setMerchantCustomerId($merchantCustomerId);
  $customerprofile->setEmail("test2@domain.com");

  $request = new AnetAPI\CreateCustomerProfileFromTransactionRequest();
  $request->setMerchantAuthentication($merchantAuthentication);
  $request->setTransId($transId);
	$request->setCustomer($customerprofile);

  $controller = new AnetController\CreateCustomerProfileFromTransactionController($request);

  $response = $controller->executeWithApiResponse( \net\authorize\api\constants\ANetEnvironment::SANDBOX);

  if (($response != null) && ($response->getMessages()->getResultCode() == "Ok") )
  {
      echo "SUCCESS: PROFILE ID : " . $response->getCustomerProfileId() . "\n";
	  echo "SUCCESS: PAYMENT PROFILE ID : " . $response->getCustomerPaymentProfileIdList()[0] . "\n";
   }
  else
  {
      echo "ERROR :  Invalid response\n";
      echo "Response : " . $response->getMessages()->getMessage()[0]->getCode() . "  " .$response->getMessages()->getMessage()[0]->getText() . "\n";
  }
}
createCustomerProfileFromTransaction("40075293717");
die;
$respData = getAnAcceptPaymentPage();
if (($respData != null) && ($respData->getMessages()->getResultCode() == "Ok")) {
} else {
	echo "ERROR :  Failed to get hosted payment page token\n";
	$errorMessages = $respData->getMessages()->getMessage();
	echo "RESPONSE : " . $errorMessages[0]->getCode() . "  " .$errorMessages[0]->getText() . "\n";
	die;
}?>
<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
<head>
	<title>HostedPayment Test Page</title>
	<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
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
		$(function () {
			$("#btnOpenAuthorizeNetIFrame").click(function () {
				$("#add_payment").show();
				//$("#send_token").attr({ "action": "https://accept.authorize.net/payment/payment", "target": "add_payment" }).submit();
				$("#send_token").attr({ "action": "https://test.authorize.net/payment/payment", "target": "add_payment" }).submit();
				$(window).scrollTop($('#add_payment').offset().top - 50);
			});
		});
</script>
</head>
<body>
	 
	<div>
		Open Authorize.net in an iframe to complete transaction of $1
		<button id="btnOpenAuthorizeNetIFrame" onclick="">Show Payment Form</button>
	</div>
	<div id="iframe_holder" class="center-block" style="width:90%;max-width: 1000px">
		<iframe id="add_payment" class="embed-responsive-item panel" name="add_payment" width="100%"  frameborder="0" scrolling="no" hidden="true">
		</iframe>
	</div>
		<form id="send_token" action="" method="post" target="add_payment" >
		<input type="hidden" name="token" value="<?php echo $respData->getToken(); ?>" />
	</form>

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
							alert("Payment Cancelled");
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
							alert("Payment Success");
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
</body>
</html>