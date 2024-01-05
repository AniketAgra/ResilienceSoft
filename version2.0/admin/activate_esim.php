<?php
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);
session_start();

//$order_row['LPA_Value'] = 'LPA:1$rsp.truphone.com$5O-1CRQ2R-V2KV0';
//$order_row['ICCID'] = '8944538532011040734';
//$order_row['Camel_MSISDN'] = '447418415830';
//$order_row['FromSite'] = 'Admin';
//require_once("../qr1.php");
//die;
include("include/config.php");
require("../mailer.php");

$email   = $_POST['to_email'];
$name    = $_POST['name'];
$mobile  = $_POST['mobile'];
$plan    = $_POST['plan'];
$message = $_POST['editordata'];
$subject = $_POST['subject'];
$cc      = $_POST['cc'];
$bcc      = $_POST['bcc'];
$iccid   = $_POST['iccid'];
$emailMsg = $_POST['editordata'];
$orderId = 0;
$userId = $_SESSION['admin_user_id'];

$distributor      = $_POST['distributor'];
$customerGroup   = $_POST['customer-group'];
$basis      = $_POST['basis'];
$limit   = $_POST['limit'];
$warning      = $_POST['warning'];
$notes      = $_POST['notes'];

$planId = 0;
$gb = 0;
$mins = 0;
$sms = 0;
$days = 0;
$usd = 0;
$moniker = '';
$planName = '';
if(isset($_POST['plan']) && $_POST['plan'] != '') 
{
	$planResult = mysqli_query($con, "select * from plans where id='".$plan."'");
	$planRow = mysqli_fetch_array($planResult);
	$planId = $plan;
	$gb = $planRow['GB'];
	$mins = $planRow['Mins'];
	$sms = $planRow['SMS'];
	$days = $planRow['Days'];
	$usd = $planRow['USD'];
	$moniker = $planRow['Moniker'];
	$planName = $planRow['plan_name'];
}
$orderInsert = mysqli_query($con, "insert into orders (userId,email,plan_id,GB,Mins,SMS,Days,USD,status,paymentStatus,`desc`,date,esimLive,emailMsg,activationFrom,activationBy,activationName) values ('$userId','$email','$planId','$gb','$mins','$sms','$days','$usd','IN PROGRESS','Success','Direct activation through admin panel','".date('Y-m-d H:i:s')."','0','$emailMsg','ADMIN','".$userId."','".$name."')");
if(mysqli_affected_rows($con) > 0)
{
	$orderId = mysqli_insert_id($con);
}

if($orderId != 0) {
	$sucessFlag = 0;
			
	$resultIccid = mysqli_query($con, "select * from ICCID where `status`='PROVISIONED' and ICCID = '$iccid' LIMIT 0,1");
	$row =  mysqli_fetch_array($resultIccid);

	mysqli_query($con, "update orders set `status`='IN PROGRESS',inventoryId='".$row['id']."',msisdn='".$row['Camel_MSISDN']."' where id='".$orderId."'");

	mysqli_query($con, "update ICCID set `status`='ASSIGNED' where id='".$row['id']."'");

	$resultOrders = mysqli_query($con, "select * from orders where `id`='".$orderId."'");
	$orderRow =  mysqli_fetch_array($resultOrders);

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
<name>eSIM: '.$name.'</name>
<customer-reference>eSIM: '.$row['ICCID'].'</customer-reference>
<distributor-id>'.$distributor.'</distributor-id>
<status>autoactivate</status>
<credit-basis>'.$basis.'</credit-basis>
<credit-limit>'.$limit.'</credit-limit>
<warning-trigger>'.$warning.'</warning-trigger>
<customer-group>'.$customerGroup.'</customer-group>
<email-address>'.$email.'</email-address>
<contact-number>'.$mobile.'</contact-number>
<address-line-1>'.$planName.'</address-line-1>
<address-line-2>'.$row['Matching_Code'].'</address-line-2>
<address-line-3></address-line-3>
<address-line-4></address-line-4>
<postcode></postcode>
<country>ISR</country>
<notes>Order ID:'.$orderId.' [ADMIN] - '.$notes.'</notes>
</customer>
<subscriber>
<first-name>'.$name.'</first-name> <middle-initials></middle-initials> <surname>eSIM</surname>
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
		$createSimRequest='<create-sim version="1"><authentication><username>'.$apiUser.'</username><password>'.$apiPassword.'</password></authentication><distributorid>'.$distributor.'</distributorid>
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
<distributor-id>'.$distributor.'</distributor-id>
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
			$apiDetails .= "API Request \n ".$createDirRequest."\n API RESPONSE \n".$createDirResponse;
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
							    $stepCount = 3;
								if($moniker != '') {
									$addCreditRequest='<apply-promotion version="1"><authentication><username>'.$apiUser.'</username><password>'.$apiPassword.'</password></authentication><subscriberid>'.$subscriberId.'</subscriberid><promotion>'.$moniker.'</promotion><start-time>'.date('Y-m-d').' 00:00:00Z</start-time><notify-on-depletion>yes</notify-on-depletion></apply-promotion>';
									curl_setopt($curl_handle, CURLOPT_POSTFIELDS,$addCreditRequest);
									$addCreditResponse = curl_exec($curl_handle);
									$addCredit_xml=simplexml_load_string($addCreditResponse);
									$apiRequestDetails .= $addCreditRequest;
									$apiResponseDetails .= $addCreditResponse;
									$apiDetails .= "API Request \n ".$addCreditRequest."\n API RESPONSE \n".$addCreditResponse;
									if((strpos($addCreditResponse,'error') === false)) {
										$sucessFlag = 1;
										$stepCount = 8;
									}
								} else {
									$sucessFlag = 1;
									$stepCount = 8;
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

		$msg = base64_encode('eSIM activated successfully, use the QR code sent to registered email. (ORDER ID: '.$orderId.')');

        $title = "Congratulations";
        $select_order = mysqli_query($con, "select plans.plan_name,plans.USD as planCharge,orders.customerId,orders.subscriberId,orders.id,orders.userId,orders.email,orders.plan_id,orders.add_GB,orders.esimLive, orders.GB, orders.Mins, orders.SMS, orders.Days, orders.status, orders.date, orders.USD,ICCID.LPA_Value,ICCID.Camel_MSISDN,ICCID.ICCID from orders LEFT JOIN plans on orders.plan_id=plans.id LEFT JOIN ICCID on ICCID.id = orders.inventoryId where orders.id='".$orderId."'");
        $order_row = mysqli_fetch_array($select_order);
    
        $select_user = mysqli_query($con, "select fname,lname from users where id='".$order_row['userId']."'");
        $user_row = mysqli_fetch_assoc($select_user);
        $esimValue = '';
        if($order_row['esimLive'] != 0 && $order_row['esimLive'] != '') {
            $date = $order_row['date'];
            $nextDate = '1st '.date('M Y', strtotime($date. ' + 2 month'));
            $esimValue = 'eSIM Live Subscription Charge: $'.$order_row['esimLive'].'[This is monthly charge and next charge will be on 1st Oct 2022 of $'.$order_row['esimLive'].']';
        }
        $order_row['FromSite'] = 'Admin';
        require_once("../qr1.php");
        $message = $emailMsg;
    
        $to = $order_row['email'];
        $fromEmail = 'esim@mysimaccess.com';
        $fromName = "gsm2go eSIM";
        $subject = "gsm2go eSIM: ".$order_row['ICCID']." / ".$order_row['Camel_MSISDN'];
        $ccEmail = $cc;
        $attachments = '';
        $mailer=new Email();
        $mailSent = $mailer->Mailer($to,$subject,$message,$ccEmail,$attachments,$fromEmail,$fromName,$bcc);
		header('Location:activate_success.php?noti=yes&type=1&typeId='.$orderId.'&msg='.$msg);
	} else {
		mysqli_query($con, "update orders set apiRequest='".$apiRequestDetails."',apiResponse='".$apiResponseDetails."',apiDetails='".$apiDetails."',stepCount='".$stepCount."' where id='".$orderId."'");

		$msg = base64_encode('Something went wrong check the api request and response details in the orders section. (ORDER ID: '.$orderId.')');
		header('Location:activate_success.php?noti=yes&type=2&typeId='.$orderId.'&msg='.$msg);
	}
}
?>