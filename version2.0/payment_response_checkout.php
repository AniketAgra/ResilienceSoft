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
	if($process == 1 && $orderType == 'New SIM - a2k' ) {
		$my_uid = $_POST['orderId'];
		$amount = (double)$_POST['amount'];
		$paymentStatus = $_POST['paymentDetails'];
		if($paymentStatus['Status'] == 'Success') {
			$profileDesc = $_SESSION['name']." (".$_SESSION['userId'].") (".$my_uid.")";
			$ANcustomerProfileDetails = createCustomerProfileFromTransaction($paymentStatus['TransId'],$profileDesc,$_SESSION['userId'],$_SESSION['user']);
			if($ANcustomerProfileDetails['Status'] == 'Success') {
				$profileId = $ANcustomerProfileDetails['ProfileId'];;
				$paymentProfileId = $ANcustomerProfileDetails['PaymentProfileId'];;
			} else {
				$profileId = 0;
				$paymentProfileId = 0;
			}
			$select = mysqli_query($con, "select * from cart_items where my_uid='$my_uid'");
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
                
                $plan_query = "select * from plans where id='$plan_id'";
                $plan_result = mysqli_query($con, $plan_query);
                $planRow = mysqli_fetch_assoc($plan_result);    
                $rate = $planRow['USD'];
                $cost = $rate*$qty;
                if($esim_live=='1')
                {
                    $cost= $cost + ($qty*$esimLiveCharge);
                    $singleCost = $rate + $esimLiveCharge;
                } else {
                    $cost= $cost + ($qty*$activationCharge);
                    $singleCost = $rate + $activationCharge;
                }
                $zoneid = $planRow['zone_id'];
                
                $zone_query = "select * from zones where id='$zoneid'";
                $zone_result = mysqli_query($con, $zone_query);
                $res = mysqli_fetch_assoc($zone_result);
                $zone = $res['zone_name'];
                
                $totalCost = $totalCost + $cost;
                
                for($i=0; $i<$qty; $i++) {
                    $sucessFlag = 0;

                    $sql = "INSERT INTO orders (userId,email,plan_id,GB,Mins,SMS,Days,esimLive,USD,status,orderType,date,activationBy,activationName,my_uid )
                    VALUES ('".$_SESSION['userId']."','".$_SESSION['user']."','".$plan_id."','".$planRow['GB']."','".$planRow['Mins']."','".$planRow['SMS']."','".$planRow['Days']."','".$esim_live."','$singleCost','PENDING PAYMENT','".$_SESSION['purType']."','".date('Y-m-d H:i:s')."','".$_SESSION['userId']."','".$_SESSION['name']."','".$my_uid."')";
                    mysqli_query($con, $sql);
                    $orderId = mysqli_insert_id($con);
                    
                    $resultIccid = mysqli_query($con, "select * from ICCID where `status`='PROVISIONED' LIMIT 0,1");
			        $row =  mysqli_fetch_array($resultIccid);
			        
        			mysqli_query($con, "update orders set `status`='IN PROGRESS',paymentStatus='".$paymentStatus['Status']."',transId='".$paymentStatus['TransId']."',transCode='".$paymentStatus['TransCode']."',authCode='".$paymentStatus['AuthCode']."',msgCode='".$paymentStatus['MsgCode']."',`desc`='".$paymentStatus['Desc']."',inventoryId='".$row['id']."',msisdn='".$row['Camel_MSISDN']."',profileId='".$profileId."',paymentProfileId='".$paymentProfileId."' where id='".$orderId."'");
			        mysqli_query($con, "update ICCID set `status`='ASSIGNED' where id='".$row['id']."'");
			        
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
        				$emailMsg = base64_encode('eSIM activated successfully, use the QR code from the order details.');
        			} else {
        				mysqli_query($con, "update orders set customerId='".$customerId."',subscriberId='".$subscriberId."',apiRequest='".$apiRequestDetails."',apiResponse='".$apiResponseDetails."',apiDetails='".$apiDetails."',stepCount='".$stepCount."' where id='".$orderId."'");
			        	$emailMsg = base64_encode('Payment Success (Transaction id: '.$paymentStatus['TransId'].'), API failed: Recharge is Pending, Contact support with the details provided');
        			}
        			
                    $select_order = mysqli_query($con, "select plans.plan_name,plans.USD as planCharge,orders.customerId,orders.subscriberId,orders.id,orders.userId,orders.email,orders.plan_id,orders.add_GB,orders.esimLive, orders.GB, orders.Mins, orders.SMS, orders.Days, orders.status, orders.date, orders.USD,ICCID.LPA_Value,ICCID.Camel_MSISDN,ICCID.ICCID from orders INNER JOIN plans on orders.plan_id=plans.id LEFT JOIN ICCID on ICCID.id = orders.inventoryId where orders.id='".$orderId."'");
                    $order_row = mysqli_fetch_array($select_order);
                    
                    $select_zone = mysqli_query($con, "select zone_name from zones where id='".$zoneid."'");
                    $zone_row = mysqli_fetch_array($select_zone);
                
                    $select_user = mysqli_query($con, "select fname,lname from users where id='".$order_row['userId']."'");
                    $user_row = mysqli_fetch_assoc($select_user);
                    $esimValue = '';
                    if($order_row['esimLive'] != 0) {
                        $date = $order_row['date'];
                        $nextDate = '1st '.date('M Y', strtotime($date. ' + 2 month'));
                        $esimValue = 'eSIM Live Subscription Charge: $'.$order_row['esimLive'].'[This is monthly charge and next charge will be on 1st Oct 2022 of $'.$order_row['esimLive'].']';
                    }
                    
                    include("qr1.php");
                
                    $message = '
                    <html>
                    <head>
                        <meta charset="utf-8">
                        <meta name="viewport" content="width=device-width, initial-scale=1">
                        <style type="text/css">
                            body{ font-family: Roboto,RobotoDraft,Helvetica,Arial,sans-serif; }
                        </style>
                    </head>
                    <body style="margin: 0px;padding: 0px">
                    <table style="width: 100%;" border="0">
                        <thead style="padding: 28px 0 20px 0;">
                            <tr>
                                <td style="padding: 0px 10px;margin: 0;color: #000;font-weight: 400;font-size: 13px;">
                                    Dear '.$user_row['fname'].' '.$user_row['lname'].',
                                </td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="padding: 0px 10px;margin: 0;color: #000;font-weight: 400;font-size: 13px;">
                                    Thank you for purchasing a gsm2go eSIM. <br>Below you will find QR code and a brief installation guide
                                </td>
                            </tr>
                            <tr>
                                <td style="padding:20px 0px 0px 10px;margin: 0;color: #000;font-weight: 400;font-size: 13px;line-height: 1.5;">
                                    <span style="content: "\2022";color:#000"></span> Your bundle / package will become active when you install the eSIM in your phone.<br>
                                    <span style="content: "\2022";color:#000"></span> Please note you have 30 days to activate your eSIM.
                                </td>
                            </tr>
                            <tr>
                                <td style="padding:0px 10px;margin: 0;color: #000;font-weight: 400;font-size: 13px;">
                                    <u>Your Plan Details:</u><br>
                                    Zone Name: '.$zone_row['zone_name'].'<br>
                                    Plan Name: '.$order_row['plan_name'].'<br>
                                    Plan Charge: $'.$order_row['planCharge'].'<br>
                                    Order ID: '.$order_row['id'].'<br>
                                    '.$esimValue.'
                                </td>
                            </tr>
                            <tr>
                                <td style="padding:0px 10px;margin: 0;color: #000;font-weight: 400;font-size: 13px;">
                                    <span style="content: "\2022";color:#000"></span> Your bundle / package will become active when you install the eSIM in your phone.<br>
                                    <span style="content: "\2022";color:#000"></span> Please note you have 30 days to activate your eSIM.
                                </td>
                            </tr>
                            <tr>
                                <td style="padding: 15px 10px;margin: 0;color: #000;font-weight: 400;font-size: 13px;line-height: 1.5;">
                                    <b>Safe Travels from</b> <span style="color:rgb(0,112,192)">gsm</span><span style="color:rgb(0,176,80); font-style: italic;">2go</span><br>
                                    <span style="color:rgb(0,112,192)">gsm</span><span style="color:rgb(0,176,80); font-style: italic;">2go</span> global roaming MVNO<br>
                                    UK +44.20.3696.2554 | IL: 072.275.0300 | US: +1.917.210.1233<br>
                                    <a href="mailto:esim@gsm2go.com">esim@gsm2go.com</a><br>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding: 0px 10px; border:1px solid; margin: 0;color: #000;font-weight: 400;font-size: 13px;line-height: 1.5;">
                
                                </td>
                            </tr>
                            
                            <tr>
                                <td style="padding:20px 0px 0px 10px;margin: 0;color: #000;font-weight: 400;font-size: 13px;line-height: 1.5;">
                                    Here is the QR Image to scan for your eSIM from gsm2go.<br>
                                    Please scan and activate prior to travel.<br>
                                    Please see install guide below.</td>
                            </tr>
                            <tr>
                                <td style="padding:20px 0px 0px 10px;margin: 0;color: #000;font-weight: 400;font-size: 13px;line-height: 1.5;">
                                    <u>Your eSIM data:</u><br>
                                    eSIM ICCID: '.$order_row['ICCID'].'<br>
                                    UK: '.$order_row['Camel_MSISDN'].'<br>
                                    Customer ID: '.$order_row['customerId'].'<br>
                                    Subscriber ID: '.$order_row['subscriberId'].'<br>
                                    Status: '.$order_row['status'].'
                                </td>
                            </tr>
                            <tr>
                                <td style="background: #fff;padding: 10px 10px;color: #000;text-align: left">
                                    <img src="https://gsm2go.com/version2.0/qr/'.$order_row['ICCID'].'.png" style="max-width:250px">
                                </td>
                            </tr>
                            <tr>
                                <td style="padding: 25px 10px;margin: 0;color: #000;font-weight: 400;font-size: 13px;line-height: 1.5;">
                                    eSIM setup guide (under 5 minutes):
                                </td>
                            </tr>
                            <tr>
                                <td style="padding: 0px 10px;margin: 0;color: #000;font-weight: 400;font-size: 13px;line-height: 1.5;">
                                    <u>iPhone eSIM install guide (iPhone 10XS or newer):</u>
                                    <ul style="margin-top:0px">
                                        <li>Open the camera, scan the QR code (from your PC or tablet or another device.) Tap on [Cellular Plan] (the yellow tag that appeared when you point the camera at the QR code)</li>
                                        <li><u>Install Cellular Plan</u> screen:  Tap on [Continue]. Now your handset is verifying the QR Code; Your phone needs to be on WiFi or Cellular Data active for this to work.</li>
                                        <li><u>Add Cellular Plan</u> screen:- Tap on [Add Cellular Plan]</li>
                                        <li><u>Cellular Plan Labels</u>: Label the new plan (the one you just added) “<span style="color:rgb(0,112,192)">gsm</span><span style="color:rgb(0,176,80)">2go</span> eSIM” (or any other name you like for it which distinguishes it from your home SIM card). Tap on [Continue]</li>
                                        <li><u>Default Line</u> (for voice calls).  Change to your <span style="color:rgb(0,112,192)">gsm</span><span style="color:rgb(0,176,80)">2go</span> eSIM when you travel. (You can do that now, or later, and you can always change back and forth).  Tap on [Continue]</li>
                                        <li><u>iMessage & FaceTime</u>: Change to your <span style="color:rgb(0,112,192)">gsm</span><span style="color:rgb(0,176,80)">2go</span> eSIM when you travel. Tap on [Continue]</li>
                                        <li><u>Cellular Data</u>: Select the <span style="color:rgb(0,112,192)">gsm</span><span style="color:rgb(0,176,80)">2go</span> eSIM for cellular data when you travel. (We recommend that you do not allow Cellular Data Switching to avoid roaming charges from your home service provider).Tap on [Continue]</li>
                                        <li><u>Making sure everything is ready</u>:<br>
                                            Go to Settings/Cellular/<br>
                                            Here you can see which SIM is active. <span style="color:rgb(0,112,192)">gsm</span><span style="color:rgb(0,176,80)">2go</span> should be selected for Cellular Data and Voice when you travel<br>
                                            <u>Under Settings/Cellular – Cellular Plans, click on <span style="color:rgb(0,112,192)">gsm</span><span style="color:rgb(0,176,80)">2go</span> eSIM</u><br>
                                            <span style="color:#FF0505">- Switch Data Roaming On</span>
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding: 0px 10px;margin: 0;color: #000;font-weight: 400;font-size: 13px;line-height: 1.5;">
                                    <u>Android (Samsung S20 or newer):</u>
                                    <ul style="margin-top:0px">
                                        <li>Settings > Connections</li>
                                        <li>SIM card manager</li>
                                        <li>Add mobile plan</li>
                                        <li>Go at the bottom of the page ‘Other ways to add plans’ and choose “Add using QR code”</li>
                                        <li>Position the QR Code within the guided lines to scan it</li>
                                        <li>Add new mobile plan? [Add]</li>
                                        <li>Turn on new mobile plan? [OK]</li>
                                        <li>Once you have activated your eSIM, you can view it in <b>SIM card manager</b></li>
                                        <li>In <b>SIM card manager</b> in the Preferred SIM card section, tap on Mobile data and select your new eSIM as preferred.</li>
                                        <li>Back in the <b>Connections</b> menu, tap on <b>Mobile networks</b> and put the <b>Data roaming</b> feature ON</li>
                                        <li>Then you need to set up the APN settings: Name: mobiledata   APN: mobiledata</li>
                                        <li>Then disable WiFi in the connections menu (for testing mobile data on the new eSIM)</li>
                                        <li>Your new <span style="color:rgb(0,112,192)">gsm</span><span style="color:rgb(0,176,80)">2go</span> eSIM is ready.</li>
                                    </ul>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    </body>
                    </html>';
                
                    $to = $order_row['email'];
                    $fromEmail = 'esim@mysimaccess.com';
                    $fromName = "gsm2go eSIM";
                    $subject = "gsm2go eSim: ".$order_row['ICCID']." / ".$order_row['Camel_MSISDN'];
                    $cc = '';
                    $bcc = 'cs@gsm2go.com';
                    $attachments = '';
                    $mailer=new Email();
                    $mailSent = $mailer->Mailer($to,$subject,$message,$cc,$attachments,$fromEmail,$fromName,$bcc);
        		}
				mysqli_query($con, "DELETE from cart_items where cartId='".$cart_id."'");
        		$type = 1;
        		$noti = "yes";
                $msg = base64_encode('Payment Success (Transaction id: '.$paymentStatus['TransId'].'), Please see the order details for eSIM status and QR code');
            }
	    } else {
			$status = 'PAYMENT FAILED';
			mysqli_query($con, "update orders set `status`='".$status."',paymentStatus='".$paymentStatus['Status']."',msgCode='".$paymentStatus['ErrorCode']."',`desc`='".$paymentStatus['ErrorMsg']."' where id='".$my_uid."'");
			$msg = base64_encode('Payment Transaction Failed. ('.$paymentStatus['ErrorMsg'].')');
	        $noti = "yes";
	        $type = 3;
	       
            $select_user = mysqli_query($con, "select fname,lname,email from users where id='".$_SESSION['userId']."'");
            $user_row = mysqli_fetch_assoc($select_user);
        
            $message = '<table align="center" cellspacing="0" cellpadding="0" style="width: 540px; margin: 0px auto; font-family: Helvetica; letter-spacing: normal; text-indent: 0px; text-transform: none; word-spacing: 0px; text-decoration: none;">
                            <tbody>
                                <tr>
                                    <td>
                                        <table cellspacing="0" cellpadding="0" style="width: 500px; margin: 0px 20px;">
                                            <tbody>
                                                <tr>
                                                    <td style="border-bottom-width: 1px; border-bottom-style: solid; border-bottom-color: rgb(234, 234, 234); padding: 10px 0px 0px 0px;">
                                                        <table cellspacing="0" cellpadding="0">
                                                            <tbody>
                                                                <tr>
                                                                    <td width="250">
                                                                        <img src="https://gsm2go.com/assets/logo.png"
                                                                            style="border: 0px; margin: 0px; height: 40px;" />
                                                                    </td>
                                                                    <td width="250" valign="top" align="right"><div style="margin: 0px; font-size: 20px; font-family: arial, sans-serif;">Payment Failed</div></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="padding-left: 0px; padding-top: 9px; padding-bottom: 9px;">
                                                        <div style="margin: 0px; font-size: 18px; font-family: arial, sans-serif;">
                                                            Dear '.$user_row['fname'].' '.$user_row['lname'].',<br><br>
                                                            '.base64_decode($msg).'
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="padding-left: 0px; padding-top: 30px; padding-bottom: 9px;">
                                                        <div style="margin: 0px; font-size: 20px; font-family: arial, sans-serif;">Thank you!</div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>';
        
            $to = $user_row['email'];
            $fromEmail = 'esim@mysimaccess.com';
            $fromName = "gsm2go eSIM";
            $subject = "gsm2go eSim: Payment Failed";
            $cc = '';
            $bcc = 'cs@gsm2go.com';
            $attachments = '';
            $mailer=new Email();
            $mailSent = $mailer->Mailer($to,$subject,$message,$cc,$attachments,$fromEmail,$fromName,$bcc);
		}
	}
} else {
	header('Location: index.php');
}
?>
<script src="assets/js/vendor/jquery-3.5.1.min.js"></script>
<form method="post" action="orders.php" id="form">
    <input type="hidden" name="noti" value="<?php echo $noti; ?>">
    <input type="hidden" name="type" value="<?php echo $type; ?>">
    <input type="hidden" name="typeId" value="<?php echo $my_uid; ?>">
    <input type="hidden" name="msg" value="<?php echo $msg; ?>">
    <input type="submit" id="button" value="" style="display:none">
</form>
<script>
$('form').submit();
</script>
