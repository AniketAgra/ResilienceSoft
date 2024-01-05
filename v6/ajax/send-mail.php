<?php
session_start();
include("../includes/config.php");
require '../mailer.php';

$id    = mysqli_real_escape_string($con,$_POST['id']);
$email = mysqli_real_escape_string($con,$_POST['email']);
$cc    = mysqli_real_escape_string($con,$_POST['cc']);


if (empty($id)) {
    echo "Invalid Order Number";
}
elseif (empty($email)) {
    echo '<script>$("#email").focus();</script>';
    echo "Enter Email Address";
}
elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo '<script>$("#email").focus();</script>';
    echo "Enter valid email address";
}
else
{
	$select_order = mysqli_query($con, "select plans.plan_name,orders.id,orders.userId,orders.email,orders.plan_id,orders.add_GB,orders.esimLive, orders.GB, orders.Mins, orders.SMS, orders.Days, orders.status, orders.date, orders.USD,ICCID.LPA_Value,ICCID.Camel_MSISDN,ICCID.ICCID from orders INNER JOIN plans on orders.plan_id=plans.id LEFT JOIN ICCID on ICCID.id = orders.inventoryId where orders.id='".$_POST['id']."' AND orders.userId='".$_SESSION['userId']."'");
	if(mysqli_num_rows($select_order)===1)
	{
	    $order_row = mysqli_fetch_array($select_order);

        $select_user = mysqli_query($con, "select fname,lname from users where id='".$_SESSION['userId']."'");
        $user_row = mysqli_fetch_assoc($select_user);
		$logourl = "https://qr2.gsm2go.com/images/logo1.png";

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
                    <td style="padding: 0px 10px;margin: 0;color: #4c4c4c;font-weight: 400;font-size: 13px;line-height: 1.5;">
                        Dear '.$user_row['fname'].' '.$user_row['lname'].',<br><br>
                        Here are your order details and QR Code (your eSIM!).  You can scan it with your phone’s camera right now.<br>
                        Please scan an activate prior to travel.<br>
                        Please see install guide below.</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="padding:20px 0px 0px 10px;margin: 0;color: #4c4c4c;font-weight: 400;font-size: 13px;line-height: 1.5;">
                        <u>Your eSIM data:</u><br>
                        eSIM ICCID: '.$order_row['ICCID'].'<br>
                        UK: '.$order_row['Camel_MSISDN'].'<br>
                        Order Id: '.$order_row['id'].'<br>
                        Plan Name: '.$order_row['plan_name'].'<br>
                        Status: '.$order_row['status'].'
                    </td>
                </tr>
                <tr>
                    <td style="background: #fff;padding: 10px 10px;color: #000;text-align: left">
                        <img src="https://qr2.gsm2go.com/v6/qr/'.$order_row['ICCID'].'.png" style="max-width:250px">
                    </td>
                </tr>
                <tr>
                    <td style="padding: 15px 10px;margin: 0;color: #4c4c4c;font-weight: 400;font-size: 13px;line-height: 1.5;">
                        <b>Safe Travels from</b> <span style="color:rgb(0,112,192)">gsm</span><span style="color:rgb(0,176,80)">2go</span><br>
                        <span style="color:rgb(0,112,192)">gsm</span><span style="color:rgb(0,176,80)">2go</span> global roaming MVNO<br>
                        UK +44.20.3696.2554 | IL: 072.275.0300 | US: +1.917.210.1233<br>
                        <a href="mailto:cs@gsm2go.com">cs@gsm2go.com</a><br>
                        WhatsApp: +972544778221
                    </td>
                </tr>
                <tr>
                    <td style="padding: 0px 10px;margin: 0;color: #4c4c4c;font-weight: 400;font-size: 13px;line-height: 1.5;">
                        ---
                    </td>
                </tr>
                <tr>
                    <td style="padding: 15px 10px;margin: 0;color: #4c4c4c;font-weight: 400;font-size: 13px;line-height: 1.5;">
                        eSIM setup guide (under 5 minutes):
                    </td>
                </tr>
                <tr>
                    <td style="padding: 0px 10px;margin: 0;color: #4c4c4c;font-weight: 400;font-size: 13px;line-height: 1.5;">
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
                    <td style="padding: 0px 10px;margin: 0;color: #4c4c4c;font-weight: 400;font-size: 13px;line-height: 1.5;">
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

        $fromEmail = 'esim@mysimaccess.com';
		$fromName = "gsm2go";
		$subject = "gsm2go eSIM";
		$attachments = '';
		$mailer=new Email();
        $mailSent = $mailer->Mailer($email,$subject, $message,$cc,$attachments,$fromEmail,$fromName);

        if($mailSent)
        {
            echo '<script>$("#sent").attr("style","display:none")</script>';
            echo '<script>$("#sent-footer").attr("style","display:block;text-align:center;")</script>';
            echo '<script>$("#sent-footer").html("<h5>Email sent. Thank you</h5>")</script>';
            
            echo '<script>$("#email").attr("readonly","readonly")</script>';
            echo '<script>$("#cc").attr("readonly","readonly")</script>';
		}
		
	}
}
?>
