<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
session_start();

include('includes/config.php');
require('mailer.php');

require 'vendor/autoload.php';
require_once 'constants/SampleCodeConstants.php';
use net\authorize\api\contract\v1 as AnetAPI;
use net\authorize\api\controller as AnetController;

function createCustomerProfileFromTransaction($transId,$desc,$merchantCustomerId,$email) {
	$returnArray = array();
	
	$merchantAuthentication = new AnetAPI\MerchantAuthenticationType();
  	$merchantAuthentication->setName(\SampleCodeConstants::MERCHANT_LOGIN_ID);
    $merchantAuthentication->setTransactionKey(\SampleCodeConstants::MERCHANT_TRANSACTION_KEY);

	$customerprofile = new AnetAPI\CustomerProfileType();
  	$customerprofile->setDescription($desc);
  	$customerprofile->setMerchantCustomerId($merchantCustomerId);
  	$customerprofile->setEmail($email);

  	$request = new AnetAPI\CreateCustomerProfileFromTransactionRequest();
  	$request->setMerchantAuthentication($merchantAuthentication);
  	$request->setTransId($transId);
	$request->setCustomer($customerprofile);

  	$controller = new AnetController\CreateCustomerProfileFromTransactionController($request);

  	$response = $controller->executeWithApiResponse( \net\authorize\api\constants\ANetEnvironment::PRODUCTION);

	if (($response != null) && ($response->getMessages()->getResultCode() == "Ok") )
	{
		$returnArray['Status'] = "Success";
		$returnArray['ProfileId'] = $response->getCustomerProfileId();
		$returnArray['PaymentProfileId'] = $response->getCustomerPaymentProfileIdList()[0];
	}
	else
	{
		$returnArray['Status'] = "Failed";
		$returnArray['ErrorCode'] = $response->getMessages()->getMessage()[0]->getCode();
		$returnArray['ErrorMsg'] = $response->getMessages()->getMessage()[0]->getText();
	}
	return $returnArray;
}

if(isset($_POST['orderId'])) {
	require_once('includes/config.php');
	$orderType = $_POST['orderType'];
	$process = 1;
	if($process == 1 && $orderType == 'New SIM' ) {
		$orderId = $_POST['orderId'];
		$amount = (double)$_POST['amount'];
		$paymentStatus = $_POST['paymentDetails'];
		if($paymentStatus['Status'] == 'Success') {
			$sucessFlag = 0;
			$profileDesc = $_SESSION['name']." (".$_SESSION['userId'].") (".$orderId.")";
			$ANcustomerProfileDetails = createCustomerProfileFromTransaction($paymentStatus['TransId'],$profileDesc,$_SESSION['userId'],$_SESSION['user']);
			if($ANcustomerProfileDetails['Status'] == 'Success') {
				$profileId = $ANcustomerProfileDetails['ProfileId'];;
				$paymentProfileId = $ANcustomerProfileDetails['PaymentProfileId'];;
			} else {
				$profileId = 0;
				$paymentProfileId = 0;
			}
			$resultIccid = mysqli_query($con, "select * from ICCID where `status`='PROVISIONED' LIMIT 0,1");
			$row =  mysqli_fetch_array($resultIccid);
			
			mysqli_query($con, "update orders set `status`='IN PROGRESS',paymentStatus='".$paymentStatus['Status']."',transId='".$paymentStatus['TransId']."',transCode='".$paymentStatus['TransCode']."',authCode='".$paymentStatus['AuthCode']."',msgCode='".$paymentStatus['MsgCode']."',`desc`='".$paymentStatus['Desc']."',inventoryId='".$row['id']."',msisdn='".$row['Camel_MSISDN']."',profileId='".$profileId."',paymentProfileId='".$paymentProfileId."' where id='".$orderId."'");
			
			mysqli_query($con, "update ICCID set `status`='ASSIGNED' where id='".$row['id']."'");
			
			$resultOrders = mysqli_query($con, "select * from orders where `id`='".$orderId."'");
			$orderRow =  mysqli_fetch_array($resultOrders);
			
			$resultplan = mysqli_query($con, "select * from plans where `id`='".$orderRow['plan_id']."'");
			$planRow =  mysqli_fetch_array($resultplan);
			
			$apiUser = 'samin.api';
			$apiPassword = 'apple';
			$apiRequestDetails = '';
			$apiResponseDetails = '';
			$apiDetails = '';
			$stepCount = 0;
			$customerId = '';
			$subscriberId = '';
					
			$curl_handle = curl_init();
			if (!$curl_handle) {
			die('fail to initialize');
			}
			//target URL setup
			curl_setopt($curl_handle, CURLOPT_URL, "https://api.s.im/pip/api/execute.mth");                                                     
			//mime type setup, change if necessary
			curl_setopt($curl_handle, CURLOPT_HTTPHEADER, array("Content-Type: application/xml"));
			//curl_setopt($curl_handle, CURLOPT_INTERFACE, "50.63.75.192");
			curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($curl_handle, CURLOPT_FAILONERROR, 1);
			curl_setopt($curl_handle, CURLOPT_POST, 1);
			
			$createCusRequest='<create-customer-and-subscriber version="1"><authentication><username>'.$apiUser.'</username><password>'.$apiPassword.'</password></authentication><customer>
            <name>eSIM: '.$_SESSION['name'].'</name>
            <customer-reference>eSIM: '.$row['ICCID'].'</customer-reference>
            <distributor-id>14597879</distributor-id>
            <status>autoactivate</status>
            <credit-basis>pre-paid</credit-basis>
            <credit-limit>0</credit-limit>
            <warning-trigger>0</warning-trigger>
            <customer-group>eSIM</customer-group>
            <email-address>'.$_SESSION['user'].'</email-address>
            <contact-number>'.$_SESSION['phone'].'</contact-number>
            <address-line-1>'.$planRow['plan_name'].'</address-line-1>
            <address-line-2>'.$row['Matching_Code'].'</address-line-2>
            <address-line-3></address-line-3>
            <address-line-4></address-line-4>
            <postcode></postcode>
            <country>ISR</country>
            <notes>Order ID:'.$orderId.' (RETAIL)</notes>
            </customer>
            <subscriber>
            <first-name>'.$_SESSION['name'].'</first-name> <middle-initials></middle-initials> <surname>eSIM</surname>
            <title>Mr</title>
            <status>autoactivate</status>
            <enable-sip-registrations>no</enable-sip-registrations>
            <prefer-sip>no</prefer-sip>
            <voicemail-enabled>no</voicemail-enabled>
            <voicemail-timeout>30</voicemail-timeout>
            <notify-missed-calls>yes</notify-missed-calls>
            <send-charge-notifications>no</send-charge-notifications>
            <send-credit-notifications>no</send-credit-notifications>
            <forward-to></forward-to>
            <withhold-cli>no</withhold-cli>
            <email-address></email-address>
            <subscriber-reference>'.$row['Camel_MSISDN'].'</subscriber-reference>
            <forward-callback>no</forward-callback>
            <auto-cli>yes</auto-cli>
            <block-gprs>no</block-gprs>
            </subscriber>
            </create-customer-and-subscriber>';
				curl_setopt($curl_handle, CURLOPT_POSTFIELDS,$createCusRequest);
				$createCusResponse = curl_exec($curl_handle);
				$createCus_xml=simplexml_load_string($createCusResponse);
				$apiRequestDetails .= $createCusRequest;
				$apiResponseDetails .= $createCusResponse;
				$apiDetails .= "API Request \n ".$createCusRequest."\n API RESPONSE \n".$createCusResponse;
				if((strpos($createCusResponse,'error') === false)) {
				    $stepCount = 1;
					$customerId = $createCus_xml->customer['id'];
					$subscriberId = $createCus_xml->subscriber['id'];
					$customerRef = $createCus_xml->customer->{'customer-reference'};
					$createSimRequest='<create-sim version="1"><authentication><username>'.$apiUser.'</username><password>'.$apiPassword.'</password></authentication><distributorid>14597879</distributorid>
                    <iccid>'.$row['ICCID'].'</iccid> 
                    <pin1>'.$row['PIN1'].'</pin1> <pin2>'.$row['PIN2'].'</pin2>
                    <puk1>'.$row['PUK1'].'</puk1><puk2>'.$row['PUK2'].'</puk2>
                     <identity>
                    <imsi>'.$row['Camel_IMSI'].'</imsi>
                    <primary-msisdn>'.$row['Camel_MSISDN'].'</primary-msisdn>
                    <secondary-msisdn></secondary-msisdn>
                    <call-routing>pri-msrn</call-routing>
                    <sms-routing>pri-msisdn</sms-routing>
                    </identity>
                    </create-sim>';
					curl_setopt($curl_handle, CURLOPT_POSTFIELDS,$createSimRequest);
					$createSimResponse = curl_exec($curl_handle);
					$createSim_xml=simplexml_load_string($createSimResponse);
					$apiRequestDetails .= $createSimRequest;
					$apiResponseDetails .= $createSimResponse;
					$apiDetails .= "API Request \n ".$createSimRequest."\n API RESPONSE \n".$createSimResponse;
					if((strpos($createSimResponse,'error') === false)) {
					    $stepCount = 2;
						$createDirRequest='<create-directory-number version="1"><authentication><username>'.$apiUser.'</username><password>'.$apiPassword.'</password></authentication><directory-number>'.$row['Camel_MSISDN'].'</directory-number>
                        <directory-number-vendor>unknown</directory-number-vendor>
                        <distributor-id>14597879</distributor-id>
                        <supports-sms>yes</supports-sms> 
                        <sms-home-routing>yes</sms-home-routing>
                        <supports-voice>yes</supports-voice>
                        <allow-loopback>yes</allow-loopback>
                        <hide>no</hide>
                        </create-directory-number>';
						curl_setopt($curl_handle, CURLOPT_POSTFIELDS,$createDirRequest);
						$createDirResponse = curl_exec($curl_handle);
						$createDir_xml=simplexml_load_string($createDirResponse);
						$apiRequestDetails .= $createDirRequest;
						$apiResponseDetails .= $createDirResponse;
						$apiDetails .= "API Request \n ".$createDirRequest."\n API RESPONSE \n".$createDirRequest;
						if((strpos($createDirResponse,'error') === false)) {
						    $stepCount = 3;
							$addDirRequest='<add-subscriber-directory-number version="1"><authentication><username>'.$apiUser.'</username><password>'.$apiPassword.'</password></authentication><subscriberid>'.$subscriberId.'</subscriberid> 
<directory-number>'.$row['Camel_MSISDN'].'</directory-number>
<present-as-cli>yes</present-as-cli>
</add-subscriber-directory-number>';
							curl_setopt($curl_handle, CURLOPT_POSTFIELDS,$addDirRequest);
							$addDirResponse = curl_exec($curl_handle);
							$addDir_xml=simplexml_load_string($addDirResponse);
							$apiRequestDetails .= $addDirRequest;
							$apiResponseDetails .= $addDirResponse;
							$apiDetails .= "API Request \n ".$addDirRequest."\n API RESPONSE \n".$addDirResponse;
							if((strpos($addDirResponse,'error') === false)) {
							    $stepCount = 4;
								$setCliRequest='<set-subscriber-cli version="1"><authentication><username>'.$apiUser.'</username><password>'.$apiPassword.'</password></authentication><subscriberid>'.$subscriberId.'</subscriberid> 
<directory-number>'.$row['Camel_MSISDN'].'</directory-number>
</set-subscriber-cli>';
								curl_setopt($curl_handle, CURLOPT_POSTFIELDS,$setCliRequest);
								$setCliResponse = curl_exec($curl_handle);
								$setCli_xml=simplexml_load_string($setCliResponse);
								$apiRequestDetails .= $setCliRequest;
								$apiResponseDetails .= $setCliResponse;
								$apiDetails .= "API Request \n ".$setCliRequest."\n API RESPONSE \n".$setCliResponse;
								if((strpos($setCliResponse,'error') === false)) {
								    $stepCount = 5;
									$addSimRequest='<add-subscriber-sim version="1"><authentication><username>'.$apiUser.'</username><password>'.$apiPassword.'</password></authentication><subscriberid>'.$subscriberId.'</subscriberid>
<iccid>'.$row['ICCID'].'</iccid>
</add-subscriber-sim>';
									curl_setopt($curl_handle, CURLOPT_POSTFIELDS,$addSimRequest);
									$addSimResponse = curl_exec($curl_handle);
									$addSim_xml=simplexml_load_string($addSimResponse);
									$apiRequestDetails .= $addSimRequest;
									$apiResponseDetails .= $addSimResponse;
									$apiDetails .= "API Request \n ".$addSimRequest."\n API RESPONSE \n".$addSimResponse;
									if((strpos($addSimResponse,'error') === false)) {
									    $stepCount = 6;
										$setPassRequest='<set-subscriber-password version="1"><authentication><username>'.$apiUser.'</username><password>'.$apiPassword.'</password></authentication><subscriberid>'.$subscriberId.'</subscriberid>
<username>'.$row['Camel_MSISDN'].'</username> 
<password>0000</password>
</set-subscriber-password>';
										curl_setopt($curl_handle, CURLOPT_POSTFIELDS,$setPassRequest);
										$setPassResponse = curl_exec($curl_handle);
										$setPass_xml=simplexml_load_string($setPassResponse);
										$apiRequestDetails .= $setPassRequest;
										$apiResponseDetails .= $setPassResponse;
										$apiDetails .= "API Request \n ".$setPassRequest."\n API RESPONSE \n".$setPassResponse;
										if((strpos($setPassResponse,'error') === false)) {
										    $stepCount = 7;
											$addCreditRequest='<apply-promotion version="1"><authentication><username>'.$apiUser.'</username><password>'.$apiPassword.'</password></authentication><subscriberid>'.$subscriberId.'</subscriberid><promotion>'.$planRow['Moniker'].'</promotion><start-time>'.date('Y-m-d').' 00:00:00Z</start-time><notify-on-depletion>yes</notify-on-depletion></apply-promotion>';
											curl_setopt($curl_handle, CURLOPT_POSTFIELDS,$addCreditRequest);
											$addCreditResponse = curl_exec($curl_handle);
											$addCredit_xml=simplexml_load_string($addCreditResponse);
											$apiRequestDetails .= $addCreditRequest;
											$apiResponseDetails .= $addCreditResponse;
											$apiDetails .= "API Request \n ".$addCreditRequest."\n API RESPONSE \n".$addCreditResponse;
											if((strpos($addCreditResponse,'error') === false)) {
											    $stepCount = 8;
												$sucessFlag = 1;
											}
										}
									}
									
								}
							}
						}
					}
				}
			
			if($sucessFlag == 1) {
				mysqli_query($con, "update orders set `status`='ACTIVE',customerId='".$customerId."',subscriberId='".$subscriberId."',apiRequest='".$apiRequestDetails."',apiResponse='".$apiResponseDetails."',apiDetails='".$apiDetails."',stepCount='".$stepCount."' where id='".$orderId."'");
				
				mysqli_query($con, "update ICCID set `status`='ACTIVE' where id='".$row['id']."'");
				
				$msg = base64_encode('eSIM activated successfully, use the QR code from the order details.');
				
				$to = $_SESSION['user'];
                $subject = "REG: QR CODE - eSIM Activated Successfully";
                $qrCode = "https://activations.gsm2go.com/qr.php?data=".base64_encode($row['LPA_Value'])."&sd=".base64_encode($row['ICCID'])."&ud=".base64_encode($row['Camel_MSISDN']);
				
				//header('Location:order.php?noti=yes&type=1&typeId='.$orderId.'&msg='.$msg);
				$noti = "yes";
	            $type = 1;
			} else {
				mysqli_query($con, "update orders set customerId='".$customerId."',subscriberId='".$subscriberId."',apiRequest='".$apiRequestDetails."',apiResponse='".$apiResponseDetails."',apiDetails='".$apiDetails."',stepCount='".$stepCount."' where id='".$orderId."'");
				
				$msg = base64_encode('Payment Success (Transaction id: '.$paymentStatus['TransId'].'), API failed: eSim generated successful, activation Pending');
				//header('Location:order.php?noti=yes&type=2&typeId='.$orderId.'&msg='.$msg);
				$noti = "yes";
	            $type = 2;
			}
		} else {
			$status = 'PAYMENT FAILED';
			mysqli_query($con, "update orders set `status`='".$status."',paymentStatus='".$paymentStatus['Status']."',msgCode='".$paymentStatus['ErrorCode']."',`desc`='".$paymentStatus['ErrorMsg']."' where id='".$orderId."'");
			$msg = base64_encode('Payment Transaction Failed. ('.$paymentStatus['ErrorMsg'].')');
	        //header('Location:order.php?noti=yes&type=3&typeId='.$orderId.'&msg='.$msg);
	        $noti = "yes";
	        $type = 3;
		}
	}
	
	if($process == 1 && $orderType == 'Recharge' ) {
		$orderId = $_POST['orderId'];
		$amount = (double)$_POST['amount'];
		$paymentStatus = $_POST['paymentDetails'];
		if($paymentStatus['Status'] == 'Success') {
			$sucessFlag = 0;
			$profileDesc = $_SESSION['name']." (".$_SESSION['userId'].") (".$orderId.")";
			$ANcustomerProfileDetails = createCustomerProfileFromTransaction($paymentStatus['TransId'],$profileDesc,$_SESSION['userId'],$_SESSION['user']);
			if($ANcustomerProfileDetails['Status'] == 'Success') {
				$profileId = $ANcustomerProfileDetails['ProfileId'];;
				$paymentProfileId = $ANcustomerProfileDetails['PaymentProfileId'];;
			} else {
				$profileId = 0;
				$paymentProfileId = 0;
			}

			mysqli_query($con, "update orders set `status`='IN PROGRESS',paymentStatus='".$paymentStatus['Status']."',transId='".$paymentStatus['TransId']."',transCode='".$paymentStatus['TransCode']."',authCode='".$paymentStatus['AuthCode']."',msgCode='".$paymentStatus['MsgCode']."',`desc`='".$paymentStatus['Desc']."',profileId='".$profileId."',paymentProfileId='".$paymentProfileId."' where id='".$orderId."'");
			
			$resultOrders = mysqli_query($con, "select * from orders where `id`='".$orderId."'");
			$orderRow =  mysqli_fetch_array($resultOrders);
			
			$resultplan = mysqli_query($con, "select * from plans where `id`='".$orderRow['plan_id']."'");
			$planRow =  mysqli_fetch_array($resultplan);
			
			$apiUser = 'samin.api';
			$apiPassword = 'apple';
			$apiRequestDetails = '';
			$apiResponseDetails = '';
			$apiDetails = '';
			$stepCount = 0;
					
			$curl_handle = curl_init();
			if (!$curl_handle) {
			die('fail to initialize');
			}
			//target URL setup
			curl_setopt($curl_handle, CURLOPT_URL, "https://api.s.im/pip/api/execute.mth");                                                     
			//mime type setup, change if necessary
			curl_setopt($curl_handle, CURLOPT_HTTPHEADER, array("Content-Type: application/xml"));
			//curl_setopt($curl_handle, CURLOPT_INTERFACE, "50.63.75.192");
			curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($curl_handle, CURLOPT_FAILONERROR, 1);
			curl_setopt($curl_handle, CURLOPT_POST, 1);
			
			$addCreditRequest='<apply-promotion version="1"><authentication><username>'.$apiUser.'</username><password>'.$apiPassword.'</password></authentication><subscriberid>'.$orderRow['subscriberId'].'</subscriberid><promotion>'.$planRow['Moniker'].'</promotion><start-time>'.date('Y-m-d').' 00:00:00Z</start-time><notify-on-depletion>yes</notify-on-depletion></apply-promotion>';
			curl_setopt($curl_handle, CURLOPT_POSTFIELDS,$addCreditRequest);
			$addCreditResponse = curl_exec($curl_handle);
			$addCredit_xml=simplexml_load_string($addCreditResponse);
			$apiRequestDetails .= $addCreditRequest;
			$apiResponseDetails .= $addCreditResponse;
			$apiDetails .= "API Request \n ".$addCreditRequest."\n API RESPONSE \n".$addCreditResponse;
			if((strpos($addCreditResponse,'error') === false)) {
			    $stepCount = 8;
				$sucessFlag = 1;
			}
			
			if($sucessFlag == 1) {
				mysqli_query($con, "update orders set `status`='ACTIVE',apiRequest='".$apiRequestDetails."',apiResponse='".$apiResponseDetails."',apiDetails='".$apiDetails."' where id='".$orderId."'");
				
				$msg = base64_encode('Recharge successfully done.');
				$noti = "yes";
	            $type = 4;
			} else {
				mysqli_query($con, "update orders set apiRequest='".$apiRequestDetails."',apiResponse='".$apiResponseDetails."',apiDetails='".$apiDetails."',stepCount='".$stepCount."' where id='".$orderId."'");
				
				$msg = base64_encode('Payment Success (Transaction id: '.$paymentStatus['TransId'].'), API failed: Recharge is Pending, Contact support with the details provided');
				$noti = "yes";
	            $type = 5;
			}
		} else {
			$status = 'PAYMENT FAILED';
			mysqli_query($con, "update orders set `status`='".$status."',paymentStatus='".$paymentStatus['Status']."',msgCode='".$paymentStatus['ErrorCode']."',`desc`='".$paymentStatus['ErrorMsg']."' where id='".$orderId."'");
			$msg = base64_encode('Payment Transaction Failed. ('.$paymentStatus['ErrorMsg'].')');
	        $noti = "yes";
	        $type = 6;
		}
	}
	
} else {
	//header('Location: index.php');
}
?>
<script src="assets/js/vendor/jquery-3.5.1.min.js"></script>
<form method="post" action="order.php" id="form">
    <input type="hidden" name="noti" value="<?php echo $noti; ?>">
    <input type="hidden" name="type" value="<?php echo $type; ?>">
    <input type="hidden" name="typeId" value="<?php echo $orderId; ?>">
    <input type="hidden" name="msg" value="<?php echo $msg; ?>">
    <input type="submit" id="button" value="" style="display:none">
</form>
<script>
$('form').submit();
</script>
