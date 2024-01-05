<?php
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);
    include("../../includes/config.php");
    $select_order = mysqli_query($con, "select * from ICCID where iccid='".$_POST['iccid']."'");
    $row = mysqli_fetch_array($select_order);

    require_once("composer-qr.php");
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
                    Dear '.$_POST['name'].',
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
                    eSIM ICCID: '.$_POST['iccid'].'<br>
                    UK: '.$row['Camel_MSISDN'].'<br>
                    Status: ACTIVATED
                </td>
            </tr>
            <tr>
                <td style="background: #fff;padding: 10px 10px;color: #000;text-align: left">
                    <img src="'.constant("SITEURL").'qr/'.$_POST['iccid'].'.png" style="max-width:250px">
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
    
    echo $message;
?>