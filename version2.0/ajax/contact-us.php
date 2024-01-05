<?php
session_start();
include("../includes/config.php");
require '../mailer.php';

$fname   = ucwords(strtolower(mysqli_real_escape_string($con,$_POST['fname'])));
$lname   = ucwords(strtolower(mysqli_real_escape_string($con,$_POST['lname'])));
$email   = mysqli_real_escape_string($con,$_POST['email']);
$mobile  = mysqli_real_escape_string($con,$_POST['mobile']);
$subject = mysqli_real_escape_string($con,$_POST['subject']);
$prefix  = mysqli_real_escape_string($con,$_POST['prefix']);
$message = mysqli_real_escape_string($con,$_POST['message']);
    
if (empty($fname)) {
    echo '<script>$("#fname").focus();</script>';
    echo '<script>$("#fname").attr("style", "border-color: #fe0000 !important;");</script>';
    echo '<script>$("#contact-btn").removeAttr("disabled")</script>';
}
elseif (empty($lname)) {
    echo '<script>$("#lname").focus();</script>';
    echo '<script>$("#lname").attr("style", "border-color: #fe0000 !important;");</script>';
    echo '<script>$("#contact-btn").removeAttr("disabled")</script>';
}
elseif (empty($mobile)) {
    echo '<script>$("#mobile").focus();</script>';
    echo '<script>$("#mobile").attr("style", "border-color: #fe0000 !important;border-radius: 22px;");</script>';
    echo '<script>$("#contact-btn").removeAttr("disabled")</script>';
}
// elseif ( strlen($mobile) < 7 ) {
//     echo '<script>$("#mobile").focus();</script>';
//     echo '<script>$("#mobile").attr("style", "border-color: #fe0000 !important;border-radius: 22px;");</script>';
//     echo '<script>$("#contact-btn").removeAttr("disabled")</script>';
// }
// elseif ( strlen($mobile) > 13 ) {
//     echo '<script>$("#mobile").focus();</script>';
//     echo '<script>$("#mobile").attr("style", "border-color: #fe0000 !important;border-radius: 22px;");</script>';
//     echo '<script>$("#contact-btn").removeAttr("disabled")</script>';
// }
elseif (empty($email)) {
    echo '<script>$("#email").focus();</script>';
    echo '<script>$("#email").attr("style", "border-color: #fe0000 !important;");</script>';
    echo '<script>$("#contact-btn").removeAttr("disabled")</script>';
}
elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo '<script>$("#email").focus();</script>';
    echo '<script>$("#email").attr("style", "border-color: #fe0000 !important;");</script>';
    echo '<script>$("#contact-btn").removeAttr("disabled")</script>';
}
elseif (empty($subject)) {
	echo '<script>$("#subject").attr("style", "border-color: #fe0000 !important;");</script>';
	echo '<script>$("#contact-btn").removeAttr("disabled")</script>';
}
elseif (empty($message)) {
    echo '<script>$("#message").focus();</script>';
    echo '<script>$("#message").attr("style", "border-color: #fe0000 !important;");</script>';
    echo '<script>$("#contact-btn").removeAttr("disabled")</script>';
}
else
{   
    if(strlen($mobile) < 5)
    {
        $mobile = "";
    }
	$logourl = constant("SITEURL")."images/logo1.png";
	$message = '<table width="500" style="font-size:12px">
	                <tr>
	                    <td colspan="2">
	                        Dear '.$fname.',</br>
	                        Thank you for contacting <span style="color:rgb(0,112,192)">gsm</span><i style="color:rgb(0,176,80)">2go</i>.</br>
	                        We like to respond quickly, more often than not – within a few hours.</br>
	                        Please expect our reply very soon.
	                    </td>
	                </tr>
		            <tr>
		                <td colspan="2"><b style="text-decoration:underline">Submission Details:</b></td>
		            </tr>
		            <tr>
		                <td><b>Name :</b></td><td>'.$fname.' '.$lname.'</td>
		            </tr>
		            <tr>
		                <td><b>Mobile :</b></td><td>'.$mobile.'</td>
		            </tr>
		            <tr>
		                <td><b>Email :</b></td><td>'.$email.'</td>
		            </tr>
		            <tr>
		                <td><b>Message :</b></td><td>'.$message.'</td>
		            </tr>
		            <tr>
	                    <td colspan="2">
	                        <p>
	                            <br><br>
	                            Thank you,<br>
                                <span style="color:rgb(0,112,192)">gsm</span><i style="color:rgb(0,176,80)">2go</i> team
                            </p>
	                    </td>
	                </tr>
		        </table>';

    $fromEmail = 'esim@mysimaccess.com';
	$fromName = "gsm2go";
	$subject = $prefix.': '.ucwords($subject);
	$name = $fname.' '.$lname;
	$cc = '';
	$attachments = '';
	$mailer=new Email();
    $mailSent = $mailer->Mailer($email,$subject, $message,$cc,$attachments,$fromEmail,$fromName);
    if($mailSent)
    {
        $mailSent1 = $mailer->Mailer($fromEmail,$subject, $message,$cc,$attachments,$email,$name);
        if($mailSent1)
        {   
            echo '<script>location.replace("https://gsm2go.com/thanks")</script>';
    		echo "<script>$('input,textarea').attr('readonly', 'readonly')</script>";
    		echo '<script>$("#register").removeAttr("disabled")</script>';
    	}
    }
}
?>
