<?php
    session_start();
    include("includes/config.php");
    require('mailer.php');

    $select_user = mysqli_query($con, "select fname,lname from users where id='".$_SESSION['userId']."'");
    $user_row = mysqli_fetch_assoc($select_user);
    include("qr1.php");
    $message = '<table cellspacing="0" cellpadding="0" style="width:500px;margin:0px 20px">
    <tbody>
        <tr>
            <td style="border-bottom-width:1px;border-bottom-style:solid;border-bottom-color:rgb(234,234,234);padding:10px 0px 0px 0px">
                <table cellspacing="0" cellpadding="0">
                    <tbody>
                        <tr>
                            <td width="250">
                                <img src="https://ci4.googleusercontent.com/proxy/wQ0A-N83EWOfMzR3PR8tgQ6mOdpI0ZOEnS8TftD9LDBxpogiAnzviKKW9BFyJOpedZqJEfc=s0-d-e1-ft#https://gsm2go.com/assets/logo.png" style="border:0px;margin:0px;height:40px" class="CToWUd" data-bit="iit">
                            </td>
                            <td width="250" valign="top" align="right"><div style="margin:0px;font-size:20px;font-family:arial,sans-serif">Payment Failed</div></td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        <tr>
            <td style="padding-left:0px;padding-top:9px;padding-bottom:9px">
                <div style="margin:0px;font-size:18px;font-family:arial,sans-serif">
                    Dear '.$user_row['fname'].' '.$user_row['lname'].' ,,<br><br>
                    Payment Transaction Failed. (This transaction has been Cancelled by user)
                </div>
            </td>
        </tr>
        <tr>
            <td style="padding-left:0px;padding-top:30px;padding-bottom:9px">
                <div style="margin:0px;font-size:20px;font-family:arial,sans-serif">Thank you!</div>
            </td>
        </tr>
    </tbody>
</table>';

    $to = $_SESSION['user'];
    $fromEmail = 'esim@mysimaccess.com';
    $fromName = "eSIM Support";
    $subject = "gsm2go eSim: payment Failed";
    $cc = '';
    $attachments = '';
    $mailer=new Email();
    $mailSent = $mailer->Mailer($to,$subject,$message,$cc,$attachments,$fromEmail,$fromName);
    header('Location:checkout2.php');
?>