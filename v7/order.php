<?php
$base_url = ( isset($_SERVER['HTTPS']) && $_SERVER['HTTPS']=='on' ? 'https' : 'http' ) . '://' .  $_SERVER['HTTP_HOST'];
$array = explode('?', $base_url . $_SERVER["REQUEST_URI"])[0].'/'.explode('=', $base_url . $_SERVER["REQUEST_URI"])[1];

session_start();
error_reporting(0);
if(isset($_SESSION['user']) && ($_SESSION['role']=="U")){
include("includes/config.php");
require('mailer.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="assets/favicon.ico">
    <title>gsm2go eSIM | Order Detail</title>
    <link rel="stylesheet" href="node_modules/%40fortawesome/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="node_modules/animate.css/animate.min.css">
    <link rel="stylesheet" href="node_modules/%40fancyapps/fancybox/dist/jquery.fancybox.min.css">
    <link rel="stylesheet" href="node_modules/owl.carousel/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="node_modules/owl.carousel/dist/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="assets/css/style.min.css">
    <link rel="stylesheet" href="assets/email.multiple.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;subset=latin-ext" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i,900,900i&amp;subset=latin-ext" rel="stylesheet">
    <style>
        .table td, .table th{ padding:0.5rem;}
        .h-57{ height:57px}
        @page {
            margin: 20mm;
            /*size: 297mm 210mm;*/
        }
        .main-content{ min-height:48em; }
    </style>
</head>
<body class="bg-image bg-fixed" style="background:lightgray">
<?php include("includes/header.php"); ?>
<?php
if(isset($_GET['orderId']) && $_GET['orderId'] != "") 
{
    $select_order = mysqli_query($con, "select plans.plan_name,plans.zone_id,plans.USD as planCharge,orders.customerId,orders.subscriberId,orders.id,orders.userId,orders.email,orders.plan_id,orders.add_GB,orders.esimLive, orders.GB, orders.Mins, orders.SMS, orders.Days, orders.status, orders.date, orders.USD,ICCID.LPA_Value,ICCID.Camel_MSISDN,ICCID.ICCID from orders INNER JOIN plans on orders.plan_id=plans.id LEFT JOIN ICCID on ICCID.id = orders.inventoryId where orders.id='".$_GET['orderId']."' AND orders.userId='".$_SESSION['userId']."'");
    $order_row['$order_row'] = mysqli_fetch_array($select_order);
    
    $select_zone = mysqli_query($con, "select zone_name from zones where id='".$order_row['zone_id']."'");
    $zone_row = mysqli_fetch_array($select_zone);

    $select_user = mysqli_query($con, "select fname,lname from users where id='".$_SESSION['userId']."'");
    $user_row = mysqli_fetch_assoc($select_user);
    $esimValue = '';
    if($order_row['esimLive'] != 0) {
        $date = $order_row['date'];
        $nextDate = '1st '.date('M Y', strtotime($date. ' + 2 month'));
        $esimValue = 'eSIM Live Subscription Charge: $'.$order_row['esimLive'].'[This is monthly charge and next charge will be on 1st Oct 2022 of $'.$order_row['esimLive'].']';
    }
    $message = '
    <html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style type="text/css">
            body{ font-family: calibri; }
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
                    When your usage reaches 65%, You will receive an email (and we will also send a text message) with a link for renewal, if you so desire.<br>
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
                    Please scan an activate prior to travel.<br>
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
                    <img src="'.GLOBALURL.'/qr/'.$order_row['ICCID'].'.png" style="max-width:250px">
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
                        <li>Settings / Cellular / Add Cellular Plan</li>
                        <li>Scan the eSIM QR code</li>
                        <li>Your iPhone tells you that a new cellular plan is detected. Tap on <b>Continue</b> to proceed</li>
                        <li>Choose labels for your cellular plans and tap on Continue to proceed</li>
                        <li>Select your default line. Your default line is used to call and message people who are not on your iPhone’s contacts. The default line is also used for iMessage.  Select your home carrier (local SIM) as default line.</li>
                        <li>Mobile Data: Select the BST/gsm2go eSIM for Mobile Data.</li>
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
}
?>
<?php
if(isset($_POST['typeId']) && $_POST['type'] == 1) 
{ 
    $title = "Congratulations";
    $select_order = mysqli_query($con, "select plans.plan_name,plans.USD as planCharge,orders.customerId,orders.subscriberId,orders.id,orders.userId,orders.email,orders.plan_id,orders.add_GB,orders.esimLive, orders.GB, orders.Mins, orders.SMS, orders.Days, orders.status, orders.date, orders.USD,ICCID.LPA_Value,ICCID.Camel_MSISDN,ICCID.ICCID from orders INNER JOIN plans on orders.plan_id=plans.id LEFT JOIN ICCID on ICCID.id = orders.inventoryId where orders.id='".$_POST['typeId']."'");
    $order_row = mysqli_fetch_array($select_order);

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
                    When your usage reaches 65%, You will receive an email (and we will also send a text message) with a link for renewal, if you so desire.<br>
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
                    <img src="'.GLOBALURL.'/qr/'.$order_row['ICCID'].'.png" style="max-width:250px">
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
                        <li>Settings / Cellular / Add Cellular Plan</li>
                        <li>Scan the eSIM QR code</li>
                        <li>Your iPhone tells you that a new cellular plan is detected. Tap on <b>Continue</b> to proceed</li>
                        <li>Choose labels for your cellular plans and tap on Continue to proceed</li>
                        <li>Select your default line. Your default line is used to call and message people who are not on your iPhone’s contacts. The default line is also used for iMessage.  Select your home carrier (local SIM) as default line.</li>
                        <li>Mobile Data: Select the BST/gsm2go eSIM for Mobile Data.</li>
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
    $subject = "gsm2go eSIM: ".$order_row['ICCID']." / ".$order_row['Camel_MSISDN'];
    $cc = '';
    $attachments = '';
    $mailer=new Email();
    $mailSent = $mailer->Mailer($to,$subject,$message,$cc,$attachments,$fromEmail,$fromName);
} 
?>
<?php
if(isset($_POST['typeId']) && $_POST['type'] == 2) 
{ 
    $title = "Congratulations";
    $select_order = mysqli_query($con, "select plans.plan_name,plans.USD as planCharge,orders.customerId,orders.subscriberId,orders.id,orders.userId,orders.email,orders.plan_id,orders.add_GB,orders.esimLive, orders.GB, orders.Mins, orders.SMS, orders.Days, orders.status, orders.date, orders.USD,ICCID.LPA_Value,ICCID.Camel_MSISDN,ICCID.ICCID from orders INNER JOIN plans on orders.plan_id=plans.id LEFT JOIN ICCID on ICCID.id = orders.inventoryId where orders.id='".$_POST['typeId']."'");
    $order_row = mysqli_fetch_array($select_order);
    
    $select_zone = mysqli_query($con, "select zone_name from zones where id='".$order_row['zone_id']."'");
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
                    When your usage reaches 65%, You will receive an email (and we will also send a text message) with a link for renewal, if you so desire.<br>
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
                    <img src="'.GLOBALURL.'/qr/'.$order_row['ICCID'].'.png" style="max-width:250px">
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
                        <li>Settings / Cellular / Add Cellular Plan</li>
                        <li>Scan the eSIM QR code</li>
                        <li>Your iPhone tells you that a new cellular plan is detected. Tap on <b>Continue</b> to proceed</li>
                        <li>Choose labels for your cellular plans and tap on Continue to proceed</li>
                        <li>Select your default line. Your default line is used to call and message people who are not on your iPhone’s contacts. The default line is also used for iMessage.  Select your home carrier (local SIM) as default line.</li>
                        <li>Mobile Data: Select the BST/gsm2go eSIM for Mobile Data.</li>
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
    $attachments = '';
    $mailer=new Email();
    $mailSent = $mailer->Mailer($to,$subject,$message,$cc,$attachments,$fromEmail,$fromName);
} 
?>
<?php
if(isset($_POST['typeId']) && $_POST['type'] == 3) 
{ 
    $select_order = mysqli_query($con, "select plans.plan_name,orders.id,orders.userId,orders.email,orders.plan_id,orders.add_GB,orders.esimLive, orders.GB, orders.Mins, orders.SMS, orders.Days, orders.status, orders.date, orders.USD,ICCID.LPA_Value,ICCID.Camel_MSISDN,ICCID.ICCID from orders INNER JOIN plans on orders.plan_id=plans.id LEFT JOIN ICCID on ICCID.id = orders.inventoryId where orders.id='".$_POST['typeId']."'");
    $order_row = mysqli_fetch_array($select_order);

    $select_user = mysqli_query($con, "select fname,lname from users where id='".$order_row['userId']."'");
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
                                                                <img src="'.GLOBALURL.'/assets/logo.png"
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
                                                    '.base64_decode($_POST['msg']).'
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

    $to = $order_row['email'];
    $fromEmail = 'esim@mysimaccess.com';
    $fromName = "gsm2go eSIM";
    $subject = "gsm2go eSim: Payment Failed";
    $cc = '';
    $attachments = '';
    $mailer=new Email();
    $mailSent = $mailer->Mailer($to,$subject,$message,$cc,$attachments,$fromEmail,$fromName);
}
?>
<?php
if(isset($_POST['typeId']) && $_POST['type'] == 4) 
{ 
    $title = "Congratulations";
    $select_order = mysqli_query($con, "select plans.plan_name,orders.id,orders.msisdn,orders.userId,orders.email,orders.plan_id,orders.add_GB,orders.esimLive, orders.GB, orders.Mins, orders.SMS, orders.Days, orders.status, orders.date, orders.USD from orders INNER JOIN plans on orders.plan_id=plans.id LEFT JOIN ICCID on ICCID.id = orders.inventoryId where orders.id='".$_POST['typeId']."'");
    $order_row = mysqli_fetch_array($select_order);

    $select_user = mysqli_query($con, "select fname,lname from users where id='".$order_row['userId']."'");
    $user_row = mysqli_fetch_assoc($select_user);

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
                <td style="padding:0px 10px;margin: 0;color: #000;font-weight: 400;font-size: 13px;">
                    <u>Your eSIM Recharge data:</u><br>
                    UK: '.$order_row['msisdn'].'<br>
                    Order Id: '.$order_row['id'].'<br>
                    Plan Name: '.$order_row['plan_name'].'<br>
                    Status: '.base64_decode($_POST['msg']).'
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
            
        </tbody>
    </table>
    </body>
    </html>';

    $to = $order_row['email'];
    $fromEmail = 'esim@mysimaccess.com';
    $fromName = "gsm2go eSIM";
    $subject = "gsm2go eSim Recharge: ".$order_row['id']." / ".$order_row['msisdn'];
    $cc = '';
    $attachments = '';
    $mailer=new Email();
    $mailSent = $mailer->Mailer($to,$subject,$message,$cc,$attachments,$fromEmail,$fromName);
} 
?>
<?php
if(isset($_POST['typeId']) && $_POST['type'] == 5) 
{ 
    $title = "Congratulations";
    $select_order = mysqli_query($con, "select plans.plan_name,orders.id,orders.msisdn,orders.userId,orders.email,orders.plan_id,orders.add_GB,orders.esimLive, orders.GB, orders.Mins, orders.SMS, orders.Days, orders.status, orders.date, orders.USD from orders INNER JOIN plans on orders.plan_id=plans.id LEFT JOIN ICCID on ICCID.id = orders.inventoryId where orders.id='".$_POST['typeId']."'");
    $order_row = mysqli_fetch_array($select_order);

    $select_user = mysqli_query($con, "select fname,lname from users where id='".$order_row['userId']."'");
    $user_row = mysqli_fetch_assoc($select_user);

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
                <td style="padding: 0px 10px;margin: 0;color: #000;font-weight: 400;font-size: 13px;line-height: 1.5;">
                    Dear '.$user_row['fname'].' '.$user_row['lname'].',
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="padding:20px 0px 0px 10px;margin: 0;color: #000;font-weight: 400;font-size: 13px;line-height: 1.5;">
                    <u>Your eSIM Recharge data:</u><br>
                    UK: '.$order_row['msisdn'].'<br>
                    Order Id: '.$order_row['id'].'<br>
                    Plan Name: '.$order_row['plan_name'].'<br>
                    Status: '.base64_decode($_POST['msg']).'
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
        </tbody>
    </table>
    </body>
    </html>';

    $to = $order_row['email'];
    $fromEmail = 'esim@mysimaccess.com';
    $fromName = "gsm2go eSIM";
    $subject = "gsm2go eSim Recharge: ".$order_row['id']." / ".$order_row['msisdn'];
    $cc = '';
    $attachments = '';
    $mailer=new Email();
    $mailSent = $mailer->Mailer($to,$subject,$message,$cc,$attachments,$fromEmail,$fromName);
} 
?>
<?php
if(isset($_POST['typeId']) && $_POST['type'] == 6) 
{ 
    $select_order = mysqli_query($con, "select plans.plan_name,orders.id,orders.userId,orders.email,orders.plan_id,orders.add_GB,orders.esimLive, orders.GB, orders.Mins, orders.SMS, orders.Days, orders.status, orders.date, orders.USD from orders INNER JOIN plans on orders.plan_id=plans.id where orders.id='".$_POST['typeId']."'");
    $order_row = mysqli_fetch_array($select_order);

    $select_user = mysqli_query($con, "select fname,lname from users where id='".$order_row['userId']."'");
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
                                                                <img src="'.GLOBALURL.'/assets/logo.png"
                                                                    style="border: 0px; margin: 0px; height: 40px;" />
                                                            </td>
                                                            <td width="250" valign="top" align="right"><div style="margin: 0px; font-size: 20px; font-family: arial, sans-serif;">Recharge Payment Failed</div></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="padding-left: 0px; padding-top: 9px; padding-bottom: 9px;">
                                                <div style="margin: 0px; font-size: 18px; font-family: arial, sans-serif;">
                                                    Dear '.$user_row['fname'].' '.$user_row['lname'].',<br><br>
                                                    '.base64_decode($_POST['msg']).'
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

    $to = $order_row['email'];
    $fromEmail = 'esim@mysimaccess.com';
    $fromName = "gsm2go eSIM";
    $subject = "gsm2go eSim Recharge: Payment Failed";
    $cc = '';
    $attachments = '';
    $mailer=new Email();
    $mailSent = $mailer->Mailer($to,$subject,$message,$cc,$attachments,$fromEmail,$fromName);
}

if($message)
{
    $update = mysqli_query($con, "update orders set emailMsg='$message' where id='".$_GET['orderId']."'");
}
?>
<!-- Page title -->
<!--<div class="d-flex flex-column w-100">-->
<!--    <div class="d-flex align-items-center bg-image py-2">-->
<!--        <div class="container page-title-container">-->
<!--            <div class="row align-items-center py-3">-->
<!--            </div>-->
<!--            <div data-height="40px"></div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->

<!-- Content -->
<div class="main-content pt-0 px-5">

    <div class="section mt-4">
        <div class="container-fluid">
            <div class="row">

                <!-- Sidebar -->
                <div class="col-lg-3">
                    <div class="pb-3 mb-3">
                        <div class="bg-white rounded-xl shadow-sm py-5">
                            <div class="px-4 px-md-5 px-lg-4 px-xl-5">
                                <div data-height="1px"></div>
                                <h5 class="font-weight-700 mb-0"><?php echo $_SESSION['name']; ?></h5>
                                <small><?php echo $_SESSION['user']; ?></small>
                            </div>

                            <div class="text-center d-lg-none">
                                <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                                    <i class="fas fa-bars fa-lg text-dark mt-4"></i>
                                </button>
                            </div>

                            <div id="sidebarMenu" class="d-lg-block collapse">

                                <h5 class="font-weight-700 px-4 px-md-5 px-lg-4 px-xl-5 pt-3 mt-4 mb-3">Account</h5>
                                <ul class="list-group list-group-flush pt-0">
                                    <a href="orders" class="list-group-item list-group-item-action active d-flex align-items-center px-4 px-md-5 px-lg-4 px-xl-5">
                                        <img src="assets/svg/upload/account-user-info.svg" alt="icon" class="mr-2" data-width="16px" data-height="16px">
                                        <span>Orders</span>
                                    </a>
                                    <a href="profile" class="list-group-item list-group-item-action d-flex align-items-center px-4 px-md-5 px-lg-4 px-xl-5">
                                        <img src="assets/svg/upload/account-user-info.svg" alt="icon" class="mr-2" data-width="16px" data-height="16px">
                                        <span>Personal information</span>
                                    </a>
                                    <a href="profile-password" class="list-group-item list-group-item-action d-flex align-items-center px-4 px-md-5 px-lg-4 px-xl-5">
                                        <img src="assets/svg/upload/account-preferences.svg" alt="icon" class="mr-2" data-width="16px" data-height="16px">
                                        <span>Password</span>
                                    </a>
                                    <a href="logout" class="list-group-item list-group-item-action d-flex align-items-center px-4 px-md-5 px-lg-4 px-xl-5">
                                        <img src="assets/svg/upload/account-logout.svg" alt="icon" class="mr-2" data-width="16px" data-height="16px">
                                        <span>Log out</span>
                                    </a>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Content body -->
                <div class="col-lg-9">

                    <div class="pb-3 mb-3">
                        <div class="bg-white rounded-xl shadow-sm px-4 py-5 py-md-3">
                            <div class="row">
                                <div class="col-md-8 col-xl-8 mb-4 mb-md-0">
                                    <h5 class="font-weight-700 section-title-4 text-left pb-2">
                                        <?php
                                        if(isset($title)){ echo $title; } else{ echo "Order - ".$_POST['typeId']; }
                                        ?>
                                        <div class="title-divider-round mt-3"></div>
                                    </h5>
                                </div>
                                <div class="col-md-4 col-xl-4 mb-4 mb-md-0">
                                    <ul class="nav justify-content-end">
                                        <li class="nav-item">
                                            <button type="button" class="bg-primary pr-4 pl-5 py-2 text-white" style="background:#fff;border:none;border-top-left-radius:40px" onclick="printDiv('printableArea')" ><i class="fas fa-2x fa-print"></i></button>
                                        </li>
                                        <li class="nav-item">
                                            <button type="button" data-toggle="modal" data-target="#exampleModal" id="mail-model" class="bg-primary pl-4 pr-5 py-2 text-white" style="background:#fff;border:none;border-bottom-right-radius:40px"><i class="fa fa-2x fa-envelope"></i></button>
                                        </li> 
                                    </ul>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-xl-12 mb-4 mb-md-0" id="printableArea">
                                    <div id="error-msg"></div>
                                    <?php echo @$message; ?>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<?php include("includes/footer.php"); ?>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-white">
                <h6 class="modal-title">Email eSim instructions</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="get">
                <div class="modal-body py-2">
                    <div class="form-group">
                        <label for="email" class="font-weight-600">To: </label>
                        <input type="hidden" class="form-control" name="email" id="id" value="<?php echo $_GET['orderId']; ?>">
                        <input type="email" class="form-control" name="email" id="email" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="cc" class="font-weight-600">CC :</label>
                        <div class="mail-id-row">
                            <input type="text" id="cc1" class="form-control" placeholder="Enter CC Email Address">
                        </div>
                    </div>
                </div>
                <div class="modal-footer pt-1 pb-2 h-57" id="sent-footer">
                    <button type="button" name="sent" id="sent" class="btn btn-primary mb-0 py-2">Send</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- jQuery -->
<script src="assets/js/vendor/jquery-3.5.1.min.js"></script>
<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="components/navik-navigation-menu/dist/js/navik.menu.js"></script>
<script src="node_modules/isotope-layout/dist/isotope.pkgd.min.js"></script>
<script src="node_modules/imagesloaded/imagesloaded.pkgd.min.js"></script>
<script src="node_modules/%40fancyapps/fancybox/dist/jquery.fancybox.min.js"></script>
<script src="node_modules/owl.carousel/dist/owl.carousel.min.js"></script>
<script src="node_modules/jquery-circle-progress/dist/circle-progress.min.js"></script>
<script src="assets/js/custom.js"></script>
<script src="assets/jquery.email.multiple.js"></script>
<script>
$(document).ready(function($){
    $("#cc").email_multiple();
});
</script>
<script type="text/javascript">
// $(document).ready(function (){
//     history.pushState("", "", "<?php echo $array; ?>");
// });

function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;
     document.body.innerHTML = printContents;
     window.print();
     document.body.innerHTML = originalContents;
}
$('#mail-model').click(function() {
    $("#email").focus();
});

$('#sent').click(function() {
   var id    = $('#id').val();
   var email = $('#email').val();
   var cc    = $('#cc1').val();

    $.ajax({
        url: "ajax/send-mail.php",
        type: "POST",
        data: { id:id,email:email,cc:cc },
        success: function(data){
            $("#error-msg").html(data);
        }
    });
});
</script>
</body>
</html>
<?php } else{ include("login.php"); } ?>