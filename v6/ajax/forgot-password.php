<?php
session_start();
include("../includes/config.php");

require '../mailer.php';

$email  = mysqli_real_escape_string($con,$_POST['email']);
if (empty($email)) {
    echo '<script>$(".error").text("Email is required");$(".error").attr("style", "color: #e53935 !important");</script>';
} 
else 
{ 
    echo '<script>;$(".error").attr("style", "color: #e53935 !important");</script>'; 

    $check_email = mysqli_query($con, "select * from users where email='$email' AND role='U'");
    if (mysqli_num_rows($check_email)===1) 
    {
        $row = mysqli_fetch_assoc($check_email);
        $mobile = $row['mobile'];

        $code = rand ( 100000 , 999999 );
        $insertcode = mysqli_query($con, "insert into password_request (email,code,status) values('$email','$code','A')");
        if($insertcode)
        {
            $id = base64_encode(mysqli_insert_id($con));
            $logourl = "https://qr2.gsm2go.com/images/logo1.png";
            $url = "https://qr2.gsm2go.com/v5/update-password?id=".$id;

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
                                                            <td width="250" valign="top" align="right"><div style="margin: 0px; font-size: 20px; font-family: arial, sans-serif;">Password Assistance</div></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="padding-left: 8px; padding-top: 9px; padding-bottom: 9px;">
                                                <div style="margin: 0px; font-size: 18px; font-family: arial, sans-serif;">Dear '.$row['fname'].',<br><br></div>
                                                <div style="margin: 0px; font-size: 18px; font-family: arial, sans-serif;">We received a request to reset the password of your gsm2go Account. <br><br>Please click here to continue to complete the reset.<br></div>
                                                <div style="margin: 0px;font-size: 22px;font-family: arial,sans-serif;font-weight: bold;padding-top: 18px;">'.$emailcode.'</div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="padding-left: 0px; padding-top: 9px; padding-bottom: 9px;text-align:center">
                                                <div style="margin: 0px; font-size: 18px; font-family: arial, sans-serif;">
                                                    <form target="_blank" method="post" action="https://qr2.gsm2go.com/v5/update-password">
                                                        <input type="hidden" name="id" value="'.$id.'">
                                                        <button style="font-size: 18px;padding: 7px 25px;background-color: rgb(4, 59, 189);border-radius: 6px;color: rgb(255, 255, 255);display: inline-block;font-weight: 500;text-align: left;
                                                        text-decoration: none;font-family: proxima-nova, Roboto, Helvetica, Arial, sans-serif !important;" type="submit">Reset Password</button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="padding-left: 8px; padding-top: 30px;">
                                                <div style="margin: 0px; font-size: 18px; font-family: arial, sans-serif;">Thank you from gsm2go.</div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>';
            
            $fromEmail = 'esim@mysimaccess.com';
    		$fromName = "eSIM Support";
    		$subject = "gsm2go – password reset link per your request";
    		$cc = '';
    		$attachments = '';
    		$mailer=new Email();
            $mailSent = $mailer->Mailer($email,$subject, $message,$cc,$attachments,$fromEmail,$fromName);
            if($mailSent)
            {
            ?>
                <script>
                 $( "#recover" ).addClass( "onclic", 250, validate);
                function validate() {
                  setTimeout(function() {
                     $( "#recover" ).removeClass( "onclic" );
                     $( "#recover" ).addClass( "validate", 450, callback );
                  }, 2250 );
                }
                function callback() {
                  setTimeout(function() {
                     $("#recover").removeClass( "validate" );
                     $("#recover").attr("disabled", "disabled")
                  }, 1250 );
                }
                </script>
            <?php
                $ch = curl_init();
                $apiurl = urlencode("We received a request to reset the password of your gsm2go Account. Please click here to continue to complete the reset.").urlencode("\n".$url).urlencode("\n Thank you!");
                curl_setopt($ch, CURLOPT_URL, "https://api.rmlconnect.net/bulksms/bulksms?username=blues&password=Rml@1234&type=0&dlr=1&destination=".$mobile."&source=gsm2go&message=".$apiurl);
                curl_setopt($ch, CURLOPT_HEADER, 0);
                curl_exec($ch);
                curl_close($ch);
                
                echo '<script>$("#success").html("<span>We sent a password reset link to your email.</span>")</script>';
                //echo '<script>$("#email").attr("disabled", "disabled")</script>';
                // echo '<script>$("#recover").attr("disabled", "disabled")</script>';
                //echo '<script>$("#recover").addClass("d-none")</script>';
                echo '<script>$("#error-msg").html("")</script>';
            }
        }
    }
    else
    {
        echo '<span class="text-danger" style="font-size:14px">Enter correct email address</span>';
    }
}
?>    
