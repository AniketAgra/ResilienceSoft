<?php
session_start();
include("../includes/config.php");
require '../mailer.php';

$email   = mysqli_real_escape_string($con,$_POST['email']);
$mobile  = mysqli_real_escape_string($con,$_POST['mobile']);
$fname   = ucwords(strtolower(mysqli_real_escape_string($con,$_POST['fname'])));
$lname   = ucwords(strtolower(mysqli_real_escape_string($con,$_POST['lname'])));
$company = mysqli_real_escape_string($con,$_POST['company']);
$pass    = mysqli_real_escape_string($con,$_POST['pass']);
$rpass   = mysqli_real_escape_string($con,$_POST['rpass']);

if (empty($email)) {
    echo '<script>$("#register").text("Create my account");</script>';
    echo '<script>$("#email").focus();</script>';
    echo '<script>$(".error1").text("Enter email address");</script>';
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo '<script>$("#register").text("Create my account");</script>';
    echo '<script>$("#email").focus();</script>';
    echo '<script>$(".error1").text("Enter valid email address");</script>';
}
elseif (empty($mobile)) {
    echo '<script>$("#register").text("Create my account");</script>';
    echo '<script>$("#mobile").focus();</script>';
    echo '<script>$(".error2").text("Enter mobile number");</script>';
}
elseif ( strlen($mobile) < 11 ) {
    echo '<script>$("#register").text("Create my account");</script>';
    echo '<script>$("#mobile").focus();</script>';
    echo '<script>$(".error2").text("Enter valid mobile number");</script>';
}
elseif ( strlen($mobile) > 13 ) {
    echo '<script>$("#register").text("Create my account");</script>';
    echo '<script>$("#mobile").focus();</script>';
    echo '<script>$(".error2").text("Enter valid mobile number");</script>';
}
elseif (empty($fname)) {
    echo '<script>$("#register").text("Create my account");</script>';
    echo '<script>$("#fname").focus();</script>';
	echo '<script>$(".error3").text("Enter first name");</script>';
}
elseif (empty($pass)) {
    echo '<script>$("#register").text("Create my account");</script>';
    echo '<script>$("#pass").focus();</script>';
    echo '<script>$(".error6").text("Enter password");</script>';
}
elseif ( strlen($pass) < 5 ) {
    echo '<script>$("#register").text("Create my account");</script>';
    echo '<script>$("#pass").focus();</script>';
    echo '<script>$(".error6").text("Password must be of minimum 5 letters");</script>';
}
elseif ( $pass != $rpass ) {
    echo '<script>$("#register").text("Create my account");</script>';
    echo '<script>$("#rpass").focus();</script>';
    echo '<script>$(".error7").text("Password not Matching");</script>';
}
else
{
    echo '<script>$("#register").text("Please Wait");</script>';
	$check = mysqli_query($con, "select * from users where email='$email'");
	if(mysqli_num_rows($check)===0)
	{
        $emailcode  = rand ( 100000 , 999999 );
        $mobilecode = rand ( 1000 , 9999 );
		$insert = mysqli_query($con, "insert into users (fname,lname,mobile,company,email,password,emailCode,mobileCode,role,status) values ('$fname','$lname','$mobile','$company','$email','$pass','$emailcode','$mobilecode','U','A')");
		if($insert)
		{
	        $userId = mysqli_insert_id($con);
			$logourl = GLOBALURL."/assets/logo.png";
			$url = GLOBALURL."/verification?userId=".$userId.'&ecode='.$emailcode;
			$url1 = GLOBALURL."/verification";
	
			$message = '<table align="center" cellspacing="0" cellpadding="0" style="width: 540px; margin: 0px auto; font-family: calibri; letter-spacing: normal; text-indent: 0px; text-transform: none; word-spacing: 0px; text-decoration: none;">
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
				                                                <img src="'.$logourl.'" style="border: 0px; margin: 0px; height: 40px;" />
				                                            </td>
				                                            <td width="250" valign="top" align="right"><div style="margin: 0px; font-size: 20px; font-family: calibri"></div></td>
				                                        </tr>
				                                    </tbody>
				                                </table>
				                            </td>
				                        </tr>
				                        <tr>
				                            <td style="padding-left: 0px; padding-top: 9px; padding-bottom: 9px;font-size: 18px; font-family: calibri">
				                                <div style="margin: 0px;">Dear '.$fname.' '.$lname.',</div>
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
			$update = mysqli_query($con, "update users set emailMsg='$message' where id='$userId'");

            $fromEmail = 'esim@mysimaccess.com';
    		$fromName = "gsm2go eSIM";
    		$subject = "Verification code is ".$emailcode." (gsm2go eSIM)";
    		$cc = '';
    		$attachments = '';
    		$mailer=new Email();
            $mailSent = $mailer->Mailer($email,$subject, $message,$cc,$attachments,$fromEmail,$fromName);
            if($mailSent)
            {
                $_SESSION['userId'] = $userId;
                $_SESSION['email'] = $email;
                
                $ch = curl_init();
                //$apiurl = $mobilecode.urlencode(" - Your verification code. Don't share this code with anyone. From: gsm2go").urlencode("\nhttps://103.154.185.150/~gsm2go/public_html/v5/verification?userId=".$userId.'&mcode='.$mobilecode);
                $apiurl = $mobilecode.urlencode(" is your verification code. This code will expire within ten minutes. Thank you for using the gsm2go eSIM.");
                curl_setopt($ch, CURLOPT_URL, "https://api.rmlconnect.net/bulksms/bulksms?username=blues&password=Rml@1234&type=0&dlr=1&destination=".$mobile."&source=gsm2go&message=".$apiurl);
                curl_setopt($ch, CURLOPT_HEADER, 0);
                curl_exec($ch);
                curl_close($ch);
				echo "<script>window.location.href = '".$url1."';</script>";
			}
		}
	}
	else
	{
	    echo '<script>$("#register").text("Create my account");</script>';
	    echo '<script>$("#register").removeAttr("disabled");</script>';
	    echo '<script>$(".error1").text("This email is already registered");</script>';
	}
}
?>
