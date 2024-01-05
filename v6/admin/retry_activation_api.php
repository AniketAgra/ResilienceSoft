<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include("include/config.php");
$orderId = 0;

require('../mailer.php');

if(isset($_GET['orderId']))
{
	$orderId = $_GET['orderId'];
}

if($orderId != 0 && $orderId != '') {
	$sucessFlag = 0;
	$stepCount = 0;
	$newStepCount = 0;
    $resultOrders = mysqli_query($con, "select * from orders where id='".$orderId."'");
	$orderRow =  mysqli_fetch_array($resultOrders);
	$stepCount = $orderRow['stepCount'];
	$apiRequestDetails = $orderRow['apiRequest'];
    $apiResponseDetails = $orderRow['apiResponse'];
    $apiDetails = $orderRow['apiDetails'];
    
    $planId = 0;
    $gb = 0;
    $mins = 0;
    $sms = 0;
    $days = 0;
    $usd = 0;
    $moniker = '';
    $planName = '';
    if(isset($orderRow['plan_id']) && $orderRow['plan_id'] != '') {
        $planResult = mysqli_query($con, "select * from plans where id='".$orderRow['plan_id']."'");
        $planRow = mysqli_fetch_array($planResult);
        $planId = $planRow['id'];
        $gb = $planRow['GB'];
        $mins = $planRow['Mins'];
        $sms = $planRow['SMS'];
        $days = $planRow['Days'];
        $usd = $planRow['USD'];
        $moniker = $planRow['Moniker'];
        $planName = $planRow['plan_name'];
    }
			
	$resultIccid = mysqli_query($con, "select * from ICCID where id='".$orderRow['inventoryId']."' LIMIT 0,1");
	$row =  mysqli_fetch_array($resultIccid);

	mysqli_query($con, "update orders set `status`='IN PROGRESS',inventoryId='".$row['id']."',msisdn='".$row['Camel_MSISDN']."' where id='".$orderId."'");

	mysqli_query($con, "update ICCID set `status`='ASSIGNED' where id='".$row['id']."'");

	$resultOrders = mysqli_query($con, "select * from orders where `id`='".$orderId."'");
	$orderRow =  mysqli_fetch_array($resultOrders);

	$apiUser = 'samin.api';
	$apiPassword = 'apple';
	$apiRequestDetails = '';
	$apiResponseDetails = '';
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
<name>eSIM: '.$name.'</name>
<customer-reference>eSIM: '.$row['ICCID'].'</customer-reference>
<distributor-id>14597879</distributor-id>
<status>active</status>
<credit-basis>pre-paid</credit-basis>
<credit-limit>0</credit-limit>
<warning-trigger>0</warning-trigger>
<customer-group>eSIM</customer-group>
<email-address>'.$email.'</email-address>
<contact-number>'.$mobile.'</contact-number>
<address-line-1>'.$planName.'</address-line-1>
<address-line-2>'.$row['Matching_Code'].'</address-line-2>
<address-line-3></address-line-3>
<address-line-4></address-line-4>
<postcode></postcode>
<country>IND</country>
</customer>
<subscriber>
<first-name>'.$name.'</first-name> <middle-initials></middle-initials> <surname>eSIM</surname>
<title>Mr</title>
<status>active</status>
<enable-sip-registrations>no</enable-sip-registrations>
<prefer-sip>no</prefer-sip>
<voicemail-enabled>yes</voicemail-enabled>
<voicemail-timeout>30</voicemail-timeout>
<notify-missed-calls>yes</notify-missed-calls>
<send-charge-notifications>no</send-charge-notifications>
<send-credit-notifications>no</send-credit-notifications>
<forward-to></forward-to>
<withhold-cli>no</withhold-cli>
<email-address>'.$email.'</email-address>
<subscriber-reference>'.$row['ICCID'].'</subscriber-reference>
<forward-callback>no</forward-callback>
<auto-cli>yes</auto-cli>
<block-gprs>no</block-gprs>
</subscriber>
</create-customer-and-subscriber>';
    if($stepCount < 1) {
    	curl_setopt($curl_handle, CURLOPT_POSTFIELDS,$createCusRequest);
    	$createCusResponse = curl_exec($curl_handle);
    	$createCus_xml=simplexml_load_string($createCusResponse);
    	$apiRequestDetails .= $createCusRequest;
    	$apiResponseDetails .= $createCusResponse;
    	$apiDetails .= "API Request \n ".$createCusRequest."\n API RESPONSE \n".$createCusResponse;
    } else {
        $createCusResponse = "Success";
    }
	if((strpos($createCusResponse,'error') === false)) {
	    $newStepCount = 1;
	    if($stepCount < 1) {
	        $customerId = $createCus_xml->customer['id'];
    		$subscriberId = $createCus_xml->subscriber['id'];
    		$customerRef = $createCus_xml->customer->{'customer-reference'};
	    } else {
	        $customerId = $orderRow['customerId'];
    		$subscriberId = $orderRow['subscriberId'];
	    }
		
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
        if($stepCount < 2) {
    		curl_setopt($curl_handle, CURLOPT_POSTFIELDS,$createSimRequest);
    		$createSimResponse = curl_exec($curl_handle);
    		$createSim_xml=simplexml_load_string($createSimResponse);
    		$apiRequestDetails .= $createSimRequest;
    		$apiResponseDetails .= $createSimResponse;
    		$apiDetails .= "API Request \n ".$createSimRequest."\n API RESPONSE \n".$createSimResponse;
        } else {
            $createSimResponse = "Success";
        }
		if((strpos($createSimResponse,'error') === false)) {
		    $newStepCount = 2;
			$createDirRequest='<create-directory-number version="1"><authentication><username>'.$apiUser.'</username><password>'.$apiPassword.'</password></authentication><directory-number>'.$row['Camel_MSISDN'].'</directory-number>
<directory-number-vendor>unknown</directory-number-vendor>
<distributor-id>14597879</distributor-id>
<supports-sms>yes</supports-sms> 
<sms-home-routing>yes</sms-home-routing>
<supports-voice>yes</supports-voice>
<allow-loopback>yes</allow-loopback>
<hide>no</hide>
</create-directory-number>';
            if($stepCount < 3) {
        		curl_setopt($curl_handle, CURLOPT_POSTFIELDS,$createDirRequest);
    			$createDirResponse = curl_exec($curl_handle);
    			$createDir_xml=simplexml_load_string($createDirResponse);
    			$apiRequestDetails .= $createDirRequest;
    			$apiResponseDetails .= $createDirResponse;
    			$apiDetails .= "API Request \n ".$createDirRequest."\n API RESPONSE \n".$createDirResponse;
            } else {
                $createDirResponse = "Success";
            }
			
			if((strpos($createDirResponse,'error') === false)) {
			    $newStepCount = 3;
				$addDirRequest='<add-subscriber-directory-number version="1"><authentication><username>'.$apiUser.'</username><password>'.$apiPassword.'</password></authentication><subscriberid>'.$subscriberId.'</subscriberid> 
<directory-number>'.$row['Camel_MSISDN'].'</directory-number>
<present-as-cli>yes</present-as-cli>
</add-subscriber-directory-number>';
                if($stepCount < 4) {
            		curl_setopt($curl_handle, CURLOPT_POSTFIELDS,$addDirRequest);
    				$addDirResponse = curl_exec($curl_handle);
    				$addDir_xml=simplexml_load_string($addDirResponse);
    				$apiRequestDetails .= $addDirRequest;
				    $apiResponseDetails .= $addDirResponse;
				    $apiDetails .= "API Request \n ".$addDirRequest."\n API RESPONSE \n".$addDirResponse;
                } else {
                    $addDirResponse = "Success";
                }
				
				if((strpos($addDirResponse,'error') === false)) {
				    $newStepCount = 4;
					$setCliRequest='<set-subscriber-cli version="1"><authentication><username>'.$apiUser.'</username><password>'.$apiPassword.'</password></authentication><subscriberid>'.$subscriberId.'</subscriberid> 
<directory-number>'.$row['Camel_MSISDN'].'</directory-number>
</set-subscriber-cli>';
                    if($stepCount < 5) {
                		curl_setopt($curl_handle, CURLOPT_POSTFIELDS,$setCliRequest);
    					$setCliResponse = curl_exec($curl_handle);
    					$setCli_xml=simplexml_load_string($setCliResponse);
    					$apiRequestDetails .= $setCliRequest;
    					$apiResponseDetails .= $setCliResponse;
    					$apiDetails .= "API Request \n ".$setCliRequest."\n API RESPONSE \n".$setCliResponse;
                    } else {
                        $setCliResponse = "Success";
                    }
					
					if((strpos($setCliResponse,'error') === false)) {
					    $newStepCount = 5;
						$addSimRequest='<add-subscriber-sim version="1"><authentication><username>'.$apiUser.'</username><password>'.$apiPassword.'</password></authentication><subscriberid>'.$subscriberId.'</subscriberid>
<iccid>'.$row['ICCID'].'</iccid>
</add-subscriber-sim>';
                        if($stepCount < 6) {
                    		curl_setopt($curl_handle, CURLOPT_POSTFIELDS,$addSimRequest);
    						$addSimResponse = curl_exec($curl_handle);
    						$addSim_xml=simplexml_load_string($addSimResponse);
    						$apiRequestDetails .= $addSimRequest;
    						$apiResponseDetails .= $addSimResponse;
    						$apiDetails .= "API Request \n ".$addSimRequest."\n API RESPONSE \n".$addSimResponse;
                        } else {
                            $addSimResponse = "Success";
                        }
						
						if((strpos($addSimResponse,'error') === false)) {
						    $newStepCount = 6;
							$setPassRequest='<set-subscriber-password version="1"><authentication><username>'.$apiUser.'</username><password>'.$apiPassword.'</password></authentication><subscriberid>'.$subscriberId.'</subscriberid>
<username>'.$row['Camel_MSISDN'].'</username> 
<password>0000</password>
</set-subscriber-password>';
                            if($stepCount < 7) {
                        		curl_setopt($curl_handle, CURLOPT_POSTFIELDS,$setPassRequest);
    							$setPassResponse = curl_exec($curl_handle);
    							$setPass_xml=simplexml_load_string($setPassResponse);
    							$apiRequestDetails .= $setPassRequest;
    							$apiResponseDetails .= $setPassResponse;
    							$apiDetails .= "API Request \n ".$setPassRequest."\n API RESPONSE \n".$setPassResponse;
                            } else {
                                $setPassResponse = "Success";
                            }
							
							if((strpos($setPassResponse,'error') === false)) {
							    $newStepCount = 7;
								$addCreditRequest='<apply-promotion version="1"><authentication><username>'.$apiUser.'</username><password>'.$apiPassword.'</password></authentication><subscriberid>'.$subscriberId.'</subscriberid><promotion>'.$moniker.'</promotion><start-time>'.date('Y-m-d').' 00:00:00Z</start-time><notify-on-depletion>yes</notify-on-depletion></apply-promotion>';
								if($stepCount < 8) {
                            		curl_setopt($curl_handle, CURLOPT_POSTFIELDS,$addCreditRequest);
									$addCreditResponse = curl_exec($curl_handle);
									$addCredit_xml=simplexml_load_string($addCreditResponse);
									$apiRequestDetails .= $addCreditRequest;
									$apiResponseDetails .= $addCreditResponse;
									$apiDetails .= "API Request \n ".$addCreditRequest."\n API RESPONSE \n".$addCreditResponse;
                                } else {
                                    $addCreditResponse = "Success";
                                }
								
								if((strpos($addCreditResponse,'error') === false)) {
								    $newStepCount = 8;
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
		mysqli_query($con, "update orders set `status`='ACTIVE',customerId='".$customerId."',subscriberId='".$subscriberId."',apiRequest='".$apiRequestDetails."',apiResponse='".$apiResponseDetails."',apiDetails='".$apiDetails."',stepCount='".$newStepCount."' where id='".$orderId."'");

		mysqli_query($con, "update ICCID set `status`='ACTIVE' where id='".$row['id']."'");

		$msg = base64_encode('eSIM activated successfully, use the QR code sent to registered email. (ORDER ID: '.$orderId.')');

		$to = "balajiu1989@gmail.com";
        $subject = "REG: QR CODE - eSIM Activated Successfully";
        $qrCode = "https://activations.gsm2go.com/qr.php?data=".base64_encode($row['LPA_Value'])."&sd=".base64_encode($row['ICCID'])."&ud=".base64_encode($row['Camel_MSISDN']);
        
        $message = '
        <html>
        <head>
        <title></title>
        </head>
        <body>
        <img src="'.$qrCode.'" />
        </body>
        </html>
        ';
        
        $fromEmail = 'esim@mysimaccess.com';
		$fromName = "eSIM Support";
		$subject = "gsm2go | Verify Email";
		$cc = '';
		$attachments = '';
		$mailer=new Email();
        $mailSent = $mailer->Mailer($to,$subject, $message,$cc,$attachments,$fromEmail,$fromName);

		header('Location:activate_success.php?noti=yes&type=1&typeId='.$orderId.'&msg='.$msg);
	} else {
		mysqli_query($con, "update orders set apiRequest='".$apiRequestDetails."',apiResponse='".$apiResponseDetails."',apiDetails='".$apiDetails."',stepCount='".$newStepCount."' where id='".$orderId."'");

		$msg = base64_encode('Something went wrong check the api request and response details in the orders section. (ORDER ID: '.$orderId.')');
		header('Location:activate_success.php?noti=yes&type=2&msg='.$msg);
	}
}