<?php
include("include/config.php");
require("../mailer.php");
$email = $_POST['to_email'];
$name = $_POST['name'];
$mobile = $_POST['mobile'];
$plan = $_POST['plan'];
$message = $_POST['editordata'];
$subject = $_POST['subject'];
$cc = $_POST['cc'];
$iccid = $_POST['iccid'];
$orderId = 0;

$userResult = mysqli_query($con, "select * from users where email='".$email."'");
if(mysqli_num_rows($userResult)==0)
{
	$insert = mysqli_query($con, "insert into users (fname,lname,mobile,email,password,role,status) values ('$name','','$mobile','$email','==DIRECTADMIN==','U','D')");
	if(mysqli_affected_rows($con) > 0)
	{
		$userId = mysqli_insert_id($con);
	}
} else {
	$userRow = mysqli_fetch_array($userResult);
	$userId = $userRow['id'];
}

$planId = 0;
$gb = 0;
$mins = 0;
$sms = 0;
$days = 0;
$usd = 0;
$moniker = '';
$planName = '';
if(isset($_POST['plan']) && $_POST['plan'] != '') {
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
$orderInsert = mysqli_query($con, "insert into orders (userId,email,plan_id,GB,Mins,SMS,Days,USD,status,paymentStatus,`desc`,date) values ('$userId','$email','$planId','$gb','$mins','$sms','$days','$usd','IN PROGRESS','Success','Direct activation through admin panel','".date('Y-m-d H:i:s')."')");

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
	curl_setopt($curl_handle, CURLOPT_POSTFIELDS,$createCusRequest);
	$createCusResponse = curl_exec($curl_handle);
	$createCus_xml=simplexml_load_string($createCusResponse);
	$apiRequestDetails .= $createCusRequest;
	$apiResponseDetails .= $createCusResponse;
	if((strpos($createCusResponse,'error') === false)) {
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
		if((strpos($createSimResponse,'error') === false)) {
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
			if((strpos($createDirResponse,'error') === false)) {
				$addDirRequest='<add-subscriber-directory-number version="1"><authentication><username>'.$apiUser.'</username><password>'.$apiPassword.'</password></authentication><subscriberid>'.$subscriberId.'</subscriberid> 
<directory-number>'.$row['Camel_MSISDN'].'</directory-number>
<present-as-cli>yes</present-as-cli>
</add-subscriber-directory-number>';
				curl_setopt($curl_handle, CURLOPT_POSTFIELDS,$addDirRequest);
				$addDirResponse = curl_exec($curl_handle);
				$addDir_xml=simplexml_load_string($addDirResponse);
				$apiRequestDetails .= $addDirRequest;
				$apiResponseDetails .= $addDirResponse;
				if((strpos($addDirResponse,'error') === false)) {
					$setCliRequest='<set-subscriber-cli version="1"><authentication><username>'.$apiUser.'</username><password>'.$apiPassword.'</password></authentication><subscriberid>'.$subscriberId.'</subscriberid> 
<directory-number>'.$row['Camel_MSISDN'].'</directory-number>
</set-subscriber-cli>';
					curl_setopt($curl_handle, CURLOPT_POSTFIELDS,$setCliRequest);
					$setCliResponse = curl_exec($curl_handle);
					$setCli_xml=simplexml_load_string($setCliResponse);
					$apiRequestDetails .= $setCliRequest;
					$apiResponseDetails .= $setCliResponse;
					if((strpos($setCliResponse,'error') === false)) {
						$addSimRequest='<add-subscriber-sim version="1"><authentication><username>'.$apiUser.'</username><password>'.$apiPassword.'</password></authentication><subscriberid>'.$subscriberId.'</subscriberid>
<iccid>'.$row['ICCID'].'</iccid>
</add-subscriber-sim>';
						curl_setopt($curl_handle, CURLOPT_POSTFIELDS,$addSimRequest);
						$addSimResponse = curl_exec($curl_handle);
						$addSim_xml=simplexml_load_string($addSimResponse);
						$apiRequestDetails .= $addSimRequest;
						$apiResponseDetails .= $addSimResponse;
						if((strpos($addSimResponse,'error') === false)) {
							$setPassRequest='<set-subscriber-password version="1"><authentication><username>'.$apiUser.'</username><password>'.$apiPassword.'</password></authentication><subscriberid>'.$subscriberId.'</subscriberid>
<username>'.$row['Camel_MSISDN'].'</username> 
<password>0000</password>
</set-subscriber-password>';
							curl_setopt($curl_handle, CURLOPT_POSTFIELDS,$setPassRequest);
							$setPassResponse = curl_exec($curl_handle);
							$setPass_xml=simplexml_load_string($setPassResponse);
							$apiRequestDetails .= $setPassRequest;
							$apiResponseDetails .= $setPassResponse;
							if((strpos($setPassResponse,'error') === false)) {
								if($moniker != '') {
									$addCreditRequest='<apply-promotion version="1"><authentication><username>'.$apiUser.'</username><password>'.$apiPassword.'</password></authentication><subscriberid>'.$subscriberId.'</subscriberid><promotion>'.$moniker.'</promotion><start-time>'.date('Y-m-d').' 00:00:00Z</start-time><notify-on-depletion>yes</notify-on-depletion></apply-promotion>';
									curl_setopt($curl_handle, CURLOPT_POSTFIELDS,$addCreditRequest);
									$addCreditResponse = curl_exec($curl_handle);
									$addCredit_xml=simplexml_load_string($addCreditResponse);
									$apiRequestDetails .= $addCreditRequest;
									$apiResponseDetails .= $addCreditResponse;
									if((strpos($addCreditResponse,'error') === false)) {
										$sucessFlag = 1;
									}
								} else {
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
		mysqli_query($con, "update orders set `status`='ACTIVE',customerId='".$customerId."',subscriberId='".$subscriberId."',apiRequest='".$apiRequestDetails."',apiResponse='".$apiResponseDetails."' where id='".$orderId."'");

		mysqli_query($con, "update ICCID set `status`='ACTIVE' where id='".$row['id']."'");

		$msg = base64_encode('eSIM activated successfully, use the QR code sent to registered email. (ORDER ID: '.$orderId.')');

		$to = $email;
		
		$fromEmail = 'esim@mysimaccess.com';
		$fromName = "eSIM Support";
		$subject = "gsm2go | Verify Email";
		$cc = '';
		$attachments = '';
		$mailer=new Email();
        $mailSent = $mailer->Mailer($to,$subject, $message,$cc,$attachments,$fromEmail,$fromName);

		header('Location:activate_success.php?noti=yes&type=1&typeId='.$orderId.'&msg='.$msg);
	} else {
		mysqli_query($con, "update orders set apiRequest='".$apiRequestDetails."',apiResponse='".$apiResponseDetails."' where id='".$orderId."'");

		$msg = base64_encode('Something went wrong check the api request and response details in the orders section. (ORDER ID: '.$orderId.')');
		header('Location:activate_success.php?noti=yes&type=2&msg='.$msg);
	}
}
?>