<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer/PHPMailer/src/Exception.php';
require 'PHPMailer/PHPMailer/src/PHPMailer.php';
require 'PHPMailer/PHPMailer/src/SMTP.php';
include("../includes/config.php");

$iccid  = mysqli_real_escape_string($con,$_POST['iccid']);
$brand  = mysqli_real_escape_string($con,$_POST['brand']);
$plan   = mysqli_real_escape_string($con,$_POST['plan']);
$retail = mysqli_real_escape_string($con,$_POST['retail']);
$rate   = mysqli_real_escape_string($con,$_POST['rate']);

$date  = @explode('-',explode(' ',$_POST['date'])[0]);
$start = @date('Y-m-d', strtotime($date[2].'-'.$date[1].'-'.$date[0])).' 00:00:00';
$end   = @date('Y-m-d', strtotime(date('Y-m-d', strtotime($date[2].'-'.$date[1].'-'.$date[0])). ' +29 days')).' 00:00:00';
$note   = mysqli_real_escape_string($con,$_POST['note']);

if($_SESSION['type']=='Dealer')
{
    $dealer = $_SESSION['userId'];
}
else
{
    $dealer = $_SESSION['dealerId'];
}
$logourl = "https://alerts.unisimcard.biz/bc/webhook/logo.png";


if (empty($iccid)) {
    echo "<script>$('#add-recharge').removeAttr('disabled');</script>";
    echo "<script>$('#add-recharge').text('Submit');</script>";
    echo '<script>$("#error").html("Please Enter ICCID or IMSI or Phone Number");$("#error").attr("style", "color: #e53935 !important");</script>';
}
elseif (empty($brand)) {
    echo "<script>$('#add-recharge').removeAttr('disabled');</script>";
    echo "<script>$('#add-recharge').text('Submit');</script>";
    echo '<script>$("#error").html("Please Select Brand Name");$("#error").attr("style", "color: #e53935 !important");</script>';
} 
elseif (empty($plan)) {
    echo "<script>$('#add-recharge').removeAttr('disabled');</script>";
    echo "<script>$('#add-recharge').text('Submit');</script>";
    echo '<script>$("#error").html("Please Select Plan");$("#error").attr("style", "color: #e53935 !important");</script>';
} 
elseif (empty($retail)) {
    echo "<script>$('#add-recharge').removeAttr('disabled');</script>";
    echo "<script>$('#add-recharge').text('Submit');</script>";
    //echo '<script>$("#error").html("Please Select Plan Type");$("#error").attr("style", "color: #e53935 !important");</script>';
} 
elseif (empty($rate)) {
    echo "<script>$('#add-recharge').removeAttr('disabled');</script>";
    echo "<script>$('#add-recharge').text('Submit');</script>";
    echo '<script>$("#error").html("Please Enter Standard Rate");$("#error").attr("style", "color: #e53935 !important");</script>';
} 
elseif (empty($_POST['date'])) {
    echo "<script>$('#add-recharge').removeAttr('disabled');</script>";
    echo "<script>$('#add-recharge').text('Submit');</script>";
    echo '<script>$("#error").html("Please Enter Activation Date");$("#error").attr("style", "color: #e53935 !important");</script>';
} 
elseif (strtotime(date('Y-m-d')) > strtotime($start)) {
    echo "<script>$('#add-recharge').removeAttr('disabled');</script>";
    echo "<script>$('#add-recharge').text('Submit');</script>";
    echo '<script>$("#error").html("Please Enter Valid Date");$("#error").attr("style", "color: #e53935 !important");</script>';
} 
else
{
    $bal = mysqli_query($con, "select closeBal from wallet where dealerId='$dealer' AND status='Success' ORDER BY id DESC LIMIT 1");
    if(mysqli_num_rows($bal)==0){ 
        $wallet = 0; 
    } 
    else{
        $balrow = mysqli_fetch_assoc($bal);
        $open = $balrow['closeBal']; 
        $close = $balrow['closeBal'] - $rate;
        $wallet = $balrow['closeBal']; 
    }
    
    if($wallet >= $rate)
    {
        echo "<script>$('#add-recharge').attr('disabled','disabled');</script>";
        echo "<script>$('#add-recharge').text('Please Wait');</script>";
        $plandetail = mysqli_query($con, "select * from plans where id='$plan'");
        $planrow = mysqli_fetch_assoc($plandetail);
        
        $headers = array(
            'X-Auth-Token: lvznqmz5lad75u9m76lqaoebbouwe80',
            'Content-Type: application/json',
            'Accept: application/json'
        );
        
        $post_body = array();
        $post_body['auth_info'] = json_encode(array('login' => 'esimAPI', 'password' => '$0%6YrU$jJRh'));
        $params = array('id' => $iccid);
        $post_body['params'] = json_encode($params);
        $URL = "https://mybilling.globalvoiceconnect.com:443/rest/Account/get_account_info";
        $response = sendCurlPost($URL, $post_body);
        http_response_code($response['info']['http_code']);
        $iccidresult = json_decode($response['data'],true); 
        $activedate = $iccidresult['account_info']['activation_date'];
        
        if(isset($iccidresult['account_info']['i_master_account']))
        { 
            $iaccount = $iccidresult['account_info']['i_master_account']; 
        } 
        else
        { 
            $iaccount = $iccidresult['account_info']['i_account']; 
        }
        
        if($iaccount)
        {
            $insert = mysqli_query($con, "insert into recharges (entereedValue,iAccount,activateDate,brandId,planId,RechargeDate,RechargeEndDate,retailRate,dealerRate,dealerId,notes,status) values('$iccid','$iaccount','$activedate','$brand','$plan','$start','$end','$retail','$rate','$dealer','$note','Pending')");
            if($insert)
            {
                $rechargeid = mysqli_insert_id($con);
                $plandetail = mysqli_query($con, "select * from plans where id='$plan'");
                $planrow = mysqli_fetch_assoc($plandetail);
                $post_body = array();
                $post_body['auth_info'] = json_encode(array('login' => 'esimAPI', 'password' => '$0%6YrU$jJRh'));
                $params = array('offset'=>0, 'name'=> $planrow['sku']);
                $post_body['params'] = json_encode($params);
                $URL = "https://mybilling.telinta.com:443/rest/Product/get_product_list";
                $response = sendCurlPost($URL, $post_body);
                http_response_code($response['info']['http_code']);
                $uresult = json_decode($response['data'],true); 
                $iproduct = $uresult['product_list'][0]['i_product'];
                if($uresult['product_list'][0]['i_product'])
                {
                    $updateiproduct = mysqli_query($con, "update recharges set iProduct='$iproduct' where id='$rechargeid'");
                    if($updateiproduct)
                    {
                        $post_body = array();
                        $post_body['auth_info'] = json_encode(array('login' => 'esimAPI', 'password' => '$0%6YrU$jJRh'));
                        $params = array(
                            'account_info' => array("i_account" => $iaccount,
                                "assigned_addons" => [
                                    array("i_product"=>$iproduct, "addon_effective_from"=>$start, "addon_effective_to"=>$end)
                                ]));
                        $post_body['params'] = json_encode($params);
                        $URL = "https://mybilling.telinta.com:443/rest/Account/update_account";
                        $response = sendCurlPost($URL, $post_body);
                        http_response_code($response['info']['http_code']);
                        $result = json_decode($response['data'],true); 
                        if(isset($result['i_account']))
                        {
                            $successmsg = mysqli_query($con, "update recharges set status='Success' where id='$rechargeid'");
                            if($successmsg)
                            {
                                echo "<script>$('#add-recharge').removeAttr('disabled');</script>";
                                echo "<script>$('#add-recharge').text('Submit');</script>";
                                $status = "Success";
                                $val = "Success";
                                mysqli_query($con,"insert into wallet (dealerId,activationId,openBal,amount,closeBal,type,notes,paymentFor,status) values ('$dealer','$rechargeid','$open','$rate','$close','Debit','$note','Recharge','Success')");        
                                echo '<script>$("#recharge-form")[0].reset();</script>';
                                echo "<script>$('#add-recharge').text('Submit');</script>";
                                echo '<script>$("#error").html("Recharge Successully");$("#error").attr("style", "color: #3ec845 !important");</script>';
                            }
                            else
                            {
                                echo "<script>$('#add-recharge').text('Submit');</script>";
                                $status = "Pending";
                                $val = "Status Update API Failed";
                            }
                        }
                        else
                        {
                            echo "<script>$('#add-recharge').text('Submit');</script>";
                            $status = "Pending";
                            $val = "Update Account API Failed";
                        }
                    }
                    else
                    {
                        echo "<script>$('#add-recharge').text('Submit');</script>";
                        echo "<script>$('#add-recharge').removeAttr('disabled');</script>";
                    }
                }
                else
                {
                    echo "<script>$('#add-recharge').removeAttr('disabled');</script>";
                    echo "<script>$('#add-recharge').text('Submit');</script>";
                    $status = "Pending";
                    $val = "Get Product List API Failed";
                }
            }
            else
            {
                echo "<script>$('#add-recharge').text('Submit');</script>";
                echo "<script>$('#add-recharge').removeAttr('disabled');</script>";
            }
        }
        else
        {
            echo "<script>$('#add-recharge').text('Submit');</script>";
            echo "<script>$('#add-recharge').removeAttr('disabled');</script>";
            echo '<script>$("#error").html("Please Enter Correct ICCID or IMSI or Phone Number");$("#error").attr("style", "color: #e53935 !important");</script>';
        }
    } 
    else 
    {
        echo "<script>$('#add-recharge').text('Submit');</script>";
        $remainAmt = abs($wallet - $rate);
        echo $url = 'Need $'.$remainAmt.' more to recharge, <a href="dashboard.php" class="text-danger">Topup</a>?';
    }
}

    
function sendCurlPost($url, $post_body)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post_body);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

    $res = curl_exec($ch);
    $info = curl_getinfo($ch);
    return array('data'=>$res, 'info'=>$info);
}


// Mail for Customer
if(isset($status) && $status!="")
{
    $message = '<tr>
                    <td style="padding-left: 0px; padding-top: 9px; padding-bottom: 9px;">
                        <div style="margin: 0px; font-size: 11px; font-family: arial, sans-serif; padding-top: 5px;">Your eSIM has been recharged: </div>
                        <div style="margin: 0px; font-size: 11px; font-family: arial, sans-serif; padding-top: 5px;">SIM Number: '.$iccid.'</div>
                        <div style="margin: 0px; font-size: 11px; font-family: arial, sans-serif; padding-top: 5px;">Recharge Plan: <span style="font-weight:bold">'.$planrow['sku'].'</span></div>
                        <div style="margin: 0px; font-size: 11px; font-family: arial, sans-serif; padding-top: 5px;">Activation Date: '.$_POST['date'].'</div>
                        <div style="margin: 0px; font-size: 11px; font-family: arial, sans-serif; padding-top: 5px;">Order_ID: '.$rechargeid.'</div>
                        <div style="margin: 0px; font-size: 11px; font-family: arial, sans-serif; padding-top: 5px;">Account_ID: '.$iaccount.'</div>
                        <div style="margin: 0px; font-size: 11px; font-family: arial, sans-serif; padding-top: 5px;">Status: '.$status.'</div>
                    </td>
                </tr>';
}

// Mail for Support
if(isset($val) && $val!="")
{
    $message1 = '<tr>
                    <td style="padding-left: 0px; padding-top: 9px; padding-bottom: 9px;">
                        <div style="margin: 0px; font-size: 11px; font-family: arial, sans-serif; padding-top: 5px;">Your eSIM has been recharged: </div>
                        <div style="margin: 0px; font-size: 11px; font-family: arial, sans-serif; padding-top: 5px;">SIM Number: '.$iccid.'</div>
                        <div style="margin: 0px; font-size: 11px; font-family: arial, sans-serif; padding-top: 5px;">Recharge Plan: <span style="font-weight:bold">'.$planrow['sku'].'</span></div>
                        <div style="margin: 0px; font-size: 11px; font-family: arial, sans-serif; padding-top: 5px;">Activation Date: '.$_POST['date'].'</div>
                        <div style="margin: 0px; font-size: 11px; font-family: arial, sans-serif; padding-top: 5px;">Order_ID: '.$rechargeid.'</div>
                        <div style="margin: 0px; font-size: 11px; font-family: arial, sans-serif; padding-top: 5px;">Account_ID: '.$iaccount.'</div>
                        <div style="margin: 0px; font-size: 11px; font-family: arial, sans-serif; padding-top: 5px;">Status: '.$status.'</div>
                        <div style="margin: 0px; font-size: 11px; font-family: arial, sans-serif; padding-top: 5px;">Error: '.$val.'</div>
                    </td>
                </tr>';
}



$header = '<table align="center" cellspacing="0" cellpadding="0" style="width: 540px; margin: 0px auto; font-family: Helvetica; letter-spacing: normal; text-indent: 0px; text-transform: none; word-spacing: 0px; text-decoration: none;">
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
                                                        <img src="'.$logourl.'" style="border: 0px; margin: 0px; height: 60px;" /><br>
                                                    </td>
                                                    <td width="250" valign="top" align="right"><div style="margin: 0px; font-size: 18px; font-family: arial, sans-serif;"></div></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding-left: 0px; padding-top: 9px; padding-bottom: 9px;">
                                        <div style="margin: 0px; font-size: 11px; font-family: arial, sans-serif;">Welcome to UniSimCard Global eSIM </div>
                                        <div style="margin: 0px; font-size: 11px; font-family: arial, sans-serif; padding-top: 15px;">Please find below some important information regarding your Order-ID: '.$rechargeid.' </div>
                                    </td>
                                </tr>';

$footer = '<tr>
                <td style="padding-left: 0px; padding-top: 9px; padding-bottom: 9px;">
                    <div style="margin: 0px; font-size: 11px; font-family: arial, sans-serif; padding-top: 15px;">
                        UniSimCard<br>
                        T: + 972.3.720.8144<br> 
                        T: +1.754.229.4002<br>
                        Whatsapp: ‪+972 55‑966‑158<br>8‬
                        e: info@unisimcard.biz<br>
                        w: www.unisimcard.biz
                    </div>
                </td>
            </tr>
            </tbody></table></td></tr></tbody></table>';


if(isset($message))
{
    $fromEmail = "unisimcard@globalvoiceconnect.com";
    $sub = "UniSImCard eSIM Order-ID: ".$rechargeid;
    $mail = new PHPMailer(true);
    $mail->isSMTP(); 
    $mail->Host = 'smtp.gmail.com'; 
    $mail->SMTPAuth = true;  
    $mail->Username = 'unisimcard@globalvoiceconnect.com'; 
    $mail->Password = 'UniSimcard2022@';
    $mail->SMTPSecure = 'TLS'; 
    $mail->Port = 587;
    $mail->setFrom("unisimcard@globalvoiceconnect.com", "Unisimcard");
    $mail->addReplyTo("unisimcard@globalvoiceconnect.com","Unisimcard");
    $mail->addAddress("sunil@roam1.com");
    //$mail->addBCC("sunil@roam1.com");
    $mail->addBCC("samin@roam1.com");
    //$mail->addBCC("ivan@globalvoiceconnect.com");
    $mail->isHTML(true);
    $mail->Subject = $sub;
    $mail->Body    = $header.$message.$footer;
    $mail->send();
}

if(isset($message1))
{
    $fromEmail = "unisimcard@globalvoiceconnect.com";
    $sub = "UniSImCard eSIM Order-ID: ".$rechargeid;
    $mail = new PHPMailer(true);
    $mail->isSMTP(); 
    $mail->Host = 'smtp.gmail.com'; 
    $mail->SMTPAuth = true;  
    $mail->Username = 'unisimcard@globalvoiceconnect.com'; 
    $mail->Password = 'UniSimcard2022@';
    $mail->SMTPSecure = 'TLS'; 
    $mail->Port = 587;
    $mail->setFrom("unisimcard@globalvoiceconnect.com", "Unisimcard");
    $mail->addReplyTo("unisimcard@globalvoiceconnect.com","Unisimcard");
    //$mail->addAddress("sunil@roam1.com");
    //$mail->addAddress("samin@roam1.com");
    //$mail->addAddress("ivan@globalvoiceconnect.com");
    $mail->addAddress("sunil@roam1.com");
    //$mail->addBCC("sunil@roam1.com");
    $mail->addBCC("samin@roam1.com");
    $mail->isHTML(true);
    $mail->Subject = $sub;
    $mail->Body    = $header.$message1.$footer;
    $mail->send();
}
?>