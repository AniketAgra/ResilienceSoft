<?php

//include("includes/config.php");
require 'vendor/autoload.php';
require_once 'constants/SampleCodeConstants.php';
use net\authorize\api\contract\v1 as AnetAPI;
use net\authorize\api\controller as AnetController;


define("AUTHORIZENET_LOG_FILE", "phplog");
function getTransactionDetails($transactionId)
{
    /* Create a merchantAuthenticationType object with authentication details
       retrieved from the constants file */
    $merchantAuthentication = new AnetAPI\MerchantAuthenticationType();
    $merchantAuthentication->setName(\SampleCodeConstants::MERCHANT_LOGIN_ID);
    $merchantAuthentication->setTransactionKey(\SampleCodeConstants::MERCHANT_TRANSACTION_KEY);
    
    // Set the transaction's refId
    // The refId is a Merchant-assigned reference ID for the request.
    // If included in the request, this value is included in the response. 
    // This feature might be especially useful for multi-threaded applications.
    $refId = 'ref' . time();

    $request = new AnetAPI\GetTransactionDetailsRequest();
    $request->setMerchantAuthentication($merchantAuthentication);
    $request->setTransId($transactionId);

    $controller = new AnetController\GetTransactionDetailsController($request);

    $response = $controller->executeWithApiResponse( \net\authorize\api\constants\ANetEnvironment::PRODUCTION);

    if (($response != null) && ($response->getMessages()->getResultCode() == "Ok"))
    {
        echo "SUCCESS: Transaction Status:" . $response->getTransaction()->getTransactionStatus() . "\n";
        echo "                Auth Amount:" . $response->getTransaction()->getAuthAmount() . "\n";
        echo "                   Trans ID:" . $response->getTransaction()->getTransId() . "\n";
     }
    else
    {
        echo "ERROR :  Invalid response\n";
        $errorMessages = $response->getMessages()->getMessage();
        echo "Response : " . $errorMessages[0]->getCode() . "  " .$errorMessages[0]->getText() . "\n";
    }

    return $response;
  }

  if(!defined('DONT_RUN_SAMPLES'))
    
  
    $x=getTransactionDetails("96");
echo "LIST :". $x;
print_x($x);

?>