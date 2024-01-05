<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require '../vendor/autoload.php';
require_once 'constants/SampleCodeConstants.php';
use net\authorize\api\contract\v1 as AnetAPI;
use net\authorize\api\controller as AnetController;
  
function chargePaymentProfile($profileId,$paymentProfileId,$amount) {
	$merchantAuthentication = new AnetAPI\MerchantAuthenticationType();
  $merchantAuthentication->setName(\SampleCodeConstants::MERCHANT_LOGIN_ID);
    $merchantAuthentication->setTransactionKey(\SampleCodeConstants::MERCHANT_TRANSACTION_KEY);

  $refId = 'ref' . time();

  $profileToCharge = new AnetAPI\CustomerProfilePaymentType();
  $profileToCharge->setCustomerProfileId($profileId);
  $paymentProfile = new AnetAPI\PaymentProfileType();
  $paymentProfile->setPaymentProfileId($paymentProfileId);
  $profileToCharge->setPaymentProfile($paymentProfile);


  $transactionRequestType = new AnetAPI\TransactionRequestType();
  $transactionRequestType->setTransactionType( "authCaptureTransaction"); 
  $transactionRequestType->setAmount($amount);
  $transactionRequestType->setProfile($profileToCharge);

  $request = new AnetAPI\CreateTransactionRequest();
  $request->setMerchantAuthentication($merchantAuthentication);
  $request->setRefId( $refId);
  $request->setTransactionRequest( $transactionRequestType);
  $controller = new AnetController\CreateTransactionController($request);
  $response = $controller->executeWithApiResponse( \net\authorize\api\constants\ANetEnvironment::SANDBOX);
  if ($response != null)
  {
    $tresponse = $response->getTransactionResponse();
    if (($tresponse != null) && ($tresponse->getResponseCode()=="1") )   
    {
      echo  "Charge Customer Profile APPROVED  :" . "\n";
      echo " Charge Customer Profile AUTH CODE : " . $tresponse->getAuthCode() . "\n";
      echo " Charge Customer Profile TRANS ID  : " . $tresponse->getTransId() . "\n";
    }
    elseif (($tresponse != null) && ($tresponse->getResponseCode()=="2") )
    {
      echo  "ERROR" . "\n";
    }
    elseif (($tresponse != null) && ($tresponse->getResponseCode()=="4") )
    {
        echo  "ERROR: HELD FOR REVIEW:"  . "\n";
    }
  }
  else
  {
    echo "no response returned";
  }
}
chargePaymentProfile("501754092","502936763","1.00");
die;
?>