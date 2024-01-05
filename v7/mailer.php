<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'ajax/PHPMailer/PHPMailer/src/Exception.php';
require 'ajax/PHPMailer/PHPMailer/src/PHPMailer.php';
require 'ajax/PHPMailer/PHPMailer/src/SMTP.php';
class Email{
    function Mailer($gmail,$sub,$body,$cc,$attachments,$fromEmail,$fromName,$bcc = ''){
        $mail = new PHPMailer(true);
        $mail->CharSet = "UTF-8";
        try {
            $mail->isHTML(true);
            $mail->Subject = "gsm2go | Verify Email";
            $mail->Body    = $message;
            
                $mail->isSMTP(); // using SMTP protocol
                $mail->SMTPOptions = array(
                   'ssl' => array(
                            'verify_peer' => false,
                            'verify_peer_name' => false,
                            'allow_self_signed' => true
                        )
                    );
                $mail->Host = 'smtp.mysimaccess.com';
                $mail->SMTPAuth = true;  // enable smtp authentication
                if($fromEmail == 'esim@mysimaccess.com') {
                    $mail->Username = 'esim@mysimaccess.com';
                    $mail->Password = 'Password@123';
                } else {
                    $mail->Username = 'esim@mysimaccess.com';
                    $mail->Password = 'Password@123';
                }
                
                $mail->SMTPSecure = 'ssl';
                $mail->Port = 465;
                $mail->setFrom($fromEmail, $fromName); // sender's email and name
    	        $mail->addReplyTo($fromEmail, $fromName);
                $mail->addAddress($gmail);  // receiver's email and name
                if($cc != '') {
                    $ccArray = explode(",",$cc);
                    foreach($ccArray as $ccValue) {
                        if($ccValue && $ccValue != 'support@cloud-connect.in'){
                            $mail->AddCC($ccValue);
                        }
                    }
                }
                if($bcc != '') {
                    $bccArray = explode(",",$bcc);
                    foreach($bccArray as $bccValue) {
                        if($bccValue != ''){
                            $mail->addBCC($bccValue);
                        }
                    }
                }
                //$mail->addBCC('samin@roam1.com');
                $mail->isHTML(true);
                $mail->Subject = $sub;
                $mail->Body    = $body;
                $mail->send();
                $result='success';
        } catch (Exception $e) { // handle error.
            $result="failed";
            //echo $e->getMessage();
        }
        return $result;
    }
}
?>