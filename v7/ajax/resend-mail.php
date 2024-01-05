<?php
session_start();
include("../includes/config.php");
require '../mailer.php';

$id = mysqli_real_escape_string($con,$_POST['val']);
if (empty($id)) {
    //echo '<script>$(".error1").text("Enter email address");</script>';
}
else
{
	$check = mysqli_query($con, "select * from users where id='$id'");
	if(mysqli_num_rows($check)===1)
	{
        $row = mysqli_fetch_assoc($check);
        $email     = $row['email'];
        $emailcode = $row['emailCode'];

		$logourl = GLOBALURL."/assets/logo.png";
		$url = GLOBALURL."/verification?userId=".$id.'&ecode='.$emailcode;
		$url1 = GLOBALURL."/verification?userId=".$id;
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
				                                                <img src="'.$logourl.'"
				                                                    style="border: 0px; margin: 0px; height: 40px;" />
				                                            </td>
				                                            <td width="250" valign="top" align="right"><div style="margin: 0px; font-size: 20px; font-family: arial, sans-serif;">Verify your account</div></td>
				                                        </tr>
				                                    </tbody>
				                                </table>
				                            </td>
				                        </tr>
				                        <tr>
				                            <td style="padding-left: 0px; padding-top: 9px; padding-bottom: 9px;font-size: 18px; font-family: calibri">
				                                <div style="margin: 0px;">Dear '.$row['fname'].' '.$row['lname'].',</div>
				                                <div style="margin: 0px;">Per your request, here is your gsm2go eSIM verification code (one time password): </div>
				                                <div style="margin: 0px;">'.$emailcode.'</div>
				                                <div style="margin: 0px;">Please enter the code to confirm your registration.</div>
				                                <div style="margin: 0px;">Thank you from <span style="color:rgb(0,112,192)">gsm</span><i><span style="color:rgb(0,176,80)">2go</span></i></div>
				                            </td>
				                        </tr>
				                    </tbody>
				                </table>
				            </td>
				        </tr>
				    </tbody>
				</table>';
		
		$fromEmail = 'esim@mysimaccess.com';
		$fromName = "gsm2go eSIM";
		$subject = "Verification code is ".$emailcode." (gsm2go eSIM)";
		$cc = '';
		$attachments = '';
		$mailer=new Email();
        $mailSent = $mailer->Mailer($email,$subject, $message,$cc,$attachments,$fromEmail,$fromName);
		if($mailSent)
        {
            echo '<script>alert("Code resent to your email ('.$email.')");</script>';
        }
	}
}
?>