<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer/PHPMailer/src/Exception.php';
require 'PHPMailer/PHPMailer/src/PHPMailer.php';
require 'PHPMailer/PHPMailer/src/SMTP.php';
include("../includes/config.php");

$brand  = mysqli_real_escape_string($con,$_POST['brand']);
$plan   = mysqli_real_escape_string($con,$_POST['plan']);
$retail = mysqli_real_escape_string($con,$_POST['retail']);
$rate   = mysqli_real_escape_string($con,$_POST['rate']);
$qty    = mysqli_real_escape_string($con,$_POST['qty']);

$start_date = $_POST['date'];
$date  = @explode('-',explode(' ',$_POST['date'])[0]);
$start = @date('Y-m-d', strtotime($date[2].'-'.$date[1].'-'.$date[0])).' 00:00:00';
$end   = @date('Y-m-d', strtotime(date('Y-m-d', strtotime($date[2].'-'.$date[1].'-'.$date[0])). ' +29 days')).' 00:00:00';

$note  = mysqli_real_escape_string($con,$_POST['note']);
if($_SESSION['type']=='Dealer')
{
    $dealer = $_SESSION['userId'];
}
if($_SESSION['type']=='User')
{
    $dealer = $_SESSION['dealerId'];
}
$message = '';
$message1 = '';

if (empty($brand)) {
    echo "<script>$('#add-activation').removeAttr('disabled');</script>";
    echo "<script>$('#add-activation').text('Submit');</script>";
    echo '<script>$("#error").html("Please Enter Plan Name");$("#error").attr("style", "color: #e53935 !important");</script>';
} 
elseif (empty($plan)) {
    echo "<script>$('#add-activation').removeAttr('disabled');</script>";
    echo "<script>$('#add-activation').text('Submit');</script>";
    echo '<script>$("#error").html("Please Select Brand");$("#error").attr("style", "color: #e53935 !important");</script>';
} 
elseif (empty($retail)) {
    echo "<script>$('#add-activation').removeAttr('disabled');</script>";
    echo "<script>$('#add-activation').text('Submit');</script>";
    echo '<script>$("#error").html("Please Select Plan Type");$("#error").attr("style", "color: #e53935 !important");</script>';
} 
elseif (empty($retail)) {
    echo "<script>$('#add-activation').removeAttr('disabled');</script>";
    echo "<script>$('#add-activation').text('Submit');</script>";
    echo '<script>$("#error").html("Please Enter Retail Rate");$("#error").attr("style", "color: #e53935 !important");</script>';
} 
elseif (empty($rate)) {
    echo "<script>$('#add-activation').removeAttr('disabled');</script>";
    echo "<script>$('#add-activation').text('Submit');</script>";
    echo '<script>$("#error").html("Please Enter Standard Rate");$("#error").attr("style", "color: #e53935 !important");</script>';
} 
elseif (empty($qty)) {
    echo "<script>$('#add-activation').removeAttr('disabled');</script>";
    echo "<script>$('#add-activation').text('Submit');</script>";
    echo '<script>$("#error").html("Please Enter Quantity");$("#error").attr("style", "color: #e53935 !important");</script>';
} 
elseif (empty($_POST['date'])) {
    echo "<script>$('#add-activation').removeAttr('disabled');</script>";
    echo "<script>$('#add-activation').text('Submit');</script>";
    echo '<script>$("#error").html("Please Enter Activation Date");$("#error").attr("style", "color: #e53935 !important");</script>';
} 
elseif (strtotime(date('Y-m-d')) > strtotime($start)) {
    echo "<script>$('#add-activation').removeAttr('disabled');</script>";
    echo "<script>$('#add-activation').text('Submit');</script>";
    echo '<script>$("#error").html("Please Enter Valid Date");$("#error").attr("style", "color: #e53935 !important");</script>';
} 
else
{
    $totalinventory = mysqli_query($con, "select SUM(qty) AS totalinventory from inventory where dealerId='$dealer'");
    $inventoryrow = mysqli_fetch_assoc($totalinventory);
    
    $totaluse = mysqli_query($con, "select COUNT(*) from activation where dealerId='$dealer'");
    $remain = $inventoryrow['totalinventory'] - mysqli_num_rows($totaluse);
    
    // Check Remaining Quantity in Inventory
    if($qty <= $remain)
    {
        // Total Amount
        $totalAmt = $qty * $rate;
        $bal = mysqli_query($con, "select closeBal from wallet where dealerId='$dealer' AND status='Success' ORDER BY id DESC LIMIT 1");
        if(mysqli_num_rows($bal)==0){ $wallet = 0; } 
        else{
            $balrow = mysqli_fetch_assoc($bal);
            $wallet = $balrow['closeBal']; 
        }
    
        // Check in Wallet and Total Amount Difference
        if($wallet >= $totalAmt)
        {
            $checkqty = mysqli_query($con, "select SUM(qty) AS totalQty from inventory where dealerId='$dealer' AND status='Active'");
            if(mysqli_num_rows($checkqty)==0)
            { 
                $totalqty = 0; 
            } 
            else{
                $qtyrow = mysqli_fetch_assoc($checkqty);
                $totalqty = $qtyrow['totalQty']; 
            }
            
            $activeqty = mysqli_query($con, "select COUNT(id) AS totalActive from activation where dealerId='$dealer'");
            if(mysqli_num_rows($activeqty)==0)
            {
                $totalActive = 0;
            }
            else{
                $activerow = mysqli_fetch_assoc($activeqty);
                $totalActive = $activerow['totalActive'];
            }
            if(($totalqty - $totalActive) >= $qty)
            {
                $plandetail = mysqli_query($con, "select * from plans where id='$plan'");
                $planrow = mysqli_fetch_assoc($plandetail);
                $logourl = "https://alerts.unisimcard.biz/assets/images/logos/".$_SESSION['logo'];

                for ($x=1; $x<=$qty; $x++) 
                {
                    $selecticcid = mysqli_query($con, "select id,ICCID,Number,LPA_Value from iccid where Status='' AND source=''");
                    if(mysqli_num_rows($selecticcid) > 0)
                    {
                        $checkqty = mysqli_query($con, "select id,qty from inventory where dealerId='$dealer' AND status='Active' LIMIT 1");
                        $qtynrow = mysqli_fetch_assoc($checkqty);
                        
                        $useqty = mysqli_query($con, "select COUNT(*) from activation where dealerId='$dealer' AND batch='".$qtynrow['id']."'");
                        if($qtynrow['qty'] == mysqli_num_rows($useqty))
                        {
                            $updateinventory = mysqli_query($con, "update inventory set status='Deactive' where dealerId='$dealer' AND id='".$qtynrow['id']."'"); 
                            if($updateinventory)
                            {
                                $checkqty1 = mysqli_query($con, "select id,qty from inventory where dealerId='$dealer' AND status='Active' LIMIT 1");
                                $qtynrow1 = mysqli_fetch_assoc($checkqty1);
                                $batch = $qtynrow1['id'];
                            }
                        }
                        else
                        {
                            $batch = $qtynrow['id'];
                        }
                        
                        if($batch)
                        {
                            $iccidrow = mysqli_fetch_assoc($selecticcid);
                            $insert = mysqli_query($con,"insert into activation (batch,ICCID,MSISDN,brandId,planId,retailRate,dealerRate,quantity,notes,dealerId,activationDate) values ('$batch','".$iccidrow['ICCID']."','".$iccidrow['Number']."','$brand','$plan','$retail','$rate','$qty','$note','$dealer','$start')");
                            if($insert)
                            {
                                $activeid = mysqli_insert_id($con);
                                mysqli_query($con,"update iccid set Status='Pending',source='Portal' where id='".$iccidrow['id']."'");
                                if($x==1)
                                {
                                    $_SESSION['parentid'] = $activeid;
                                } 
                                $updateactive = mysqli_query($con,"update activation set parentId='".$_SESSION['parentid']."' where id='$activeid'");
                                if($updateactive)
                                {
                                    $bal = mysqli_query($con, "select closeBal from wallet where dealerId='$dealer' AND status='Success' ORDER BY id DESC LIMIT 1");
                                    $balrow = mysqli_fetch_assoc($bal);
                                    $open = $balrow['closeBal']; 
                                    $close = $balrow['closeBal'] - $rate;
                                    $addWallet = mysqli_query($con,"insert into wallet (dealerId,activationId,openBal,amount,closeBal,type,notes,paymentFor,status) values ('$dealer','$activeid','$open','$rate','$close','Debit','$note','Activation','Success')");        
                                    if($addWallet)
                                    {
                                        $post_body = array();
                                        $post_body['auth_info'] = json_encode(array('login' => 'esimAPI', 'password' => '$0%6YrU$jJRh'));
                                        $params = array('id' => $iccidrow['ICCID']);
                                        $post_body['params'] = json_encode($params);
                                        $URL = "https://mybilling.globalvoiceconnect.com:443/rest/Account/get_account_info";
                                        $response = sendCurlPost($URL, $post_body);
                                        http_response_code($response['info']['http_code']);
                                        $iccidresult = json_decode($response['data'],true); 
                                        $iaccount    = $iccidresult['account_info']['i_account'];
                                        $updateiac = mysqli_query($con,"update iccid set i_account='$iaccount' where id='".$iccidrow['id']."'");
                                        if($updateiac)
                                        {
                                            $post_body = array();
                                        	$post_body['auth_info'] = json_encode(array('login' => 'esimAPI', 'password' => '$0%6YrU$jJRh'));
                                        	$params = array('offset'=>0, 'name'=> $planrow['sku']);
                                        	$post_body['params'] = json_encode($params);
                                        	$URL = "https://mybilling.telinta.com:443/rest/Product/get_product_list";
                                        	$response = sendCurlPost($URL, $post_body);
                                        	http_response_code($response['info']['http_code']);
                                        	$uresult = json_decode($response['data'],true); 
                                        	$iproduct = $uresult['product_list'][0]['i_product'];
                                        	$updateipro = mysqli_query($con,"update iccid set product_id='$iproduct' where id='".$iccidrow['id']."'");
                                        	if($updateipro)
                                        	{
                                        	    $post_body = array();
                                                $post_body['auth_info'] = json_encode(array('login' => 'esimAPI', 'password' => '$0%6YrU$jJRh'));
                                                $params = array('account_info' => array("i_account" => $iaccount, "firstname" => $_SESSION['dealer'], "lastname" => $_SESSION['name'], "subscriber_email" => '', "email" => ''));
                                                $post_body['params'] = json_encode($params);
                                                $URL = "https://mybilling.globalvoiceconnect.com:443/rest/Account/update_account";
                                                $response = sendCurlPost($URL, $post_body);
                                                http_response_code($response['info']['http_code']);
                                                $updateuser = json_decode($response['data'],true); 
                                                if($updateuser['i_account'])
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
                                                    if($result['i_account'])
                                                    {
                                        	            $data = $iccidrow['LPA_Value'];
                                        	            $filename = $iccidrow['ICCID'].'.png';
                                        	            $savePath = "../qr/".$filename;
                                        	            $sizeValue = 400;
                                        	            $size = '400x400';
                                        	            $logo = "https://alerts.unisimcard.biz/assets/images/logos/".$_SESSION['logo'];
                                        	            
                                        	            $iccid1  = "ICCID: ".$iccidrow['ICCID'];
                                        	            $number1 = "Number: ".$iccidrow['Number'];
                                        	            $dealer1 = "Dealer: ".$_SESSION['dealer'];
                                        	            $plan1   = "Plan: ".$planrow['planName'];
                                        	            $date1   = "Activation: ".$start_date;
                                        	            
                                        	            header('Content-type: image/png');
                                        	            $QR = imagecreatefrompng('https://chart.googleapis.com/chart?cht=qr&chld=H|1&chs='.$size.'&chl='.urlencode($iccidrow['LPA_Value']));
                                        	            if($logo !== FALSE){
                                        	                $logo = imagecreatefromstring(file_get_contents($logo));
                                        	                $QR_width = imagesx($QR);
                                        	                $QR_height = imagesy($QR);
                                        	                $logo_width = imagesx($logo);
                                        	                $logo_height = imagesy($logo);
                                        	                // Scale logo to fit in the QR Code
                                        	                $logo_qr_width = $QR_width/3;
                                        	                $scale = $logo_width/$logo_qr_width;
                                        	                $logo_qr_height = $logo_height/$scale;
                                        	                imagecopyresampled($QR, $logo, $QR_width/3, $QR_height/2.5, 0, 0, $logo_qr_width, $logo_qr_height, $logo_width, $logo_height);
                                        	            }
                                        	            
                                        	            $finalImg = imagecreatetruecolor($sizeValue, $sizeValue+120);
                                        	            $white = imageColorAllocate($finalImg, 255, 255, 255);
                                        	            $black = imageColorAllocate($finalImg, 0, 0, 0);
                                        	            $font = realpath('arial.ttf');
                                        	            imagefill($finalImg, 0, 0, $white);
                                        	            imagecopymerge($finalImg,$QR,0,8,0,0,$sizeValue,$sizeValue, 100);
                                        	            if($sizeValue < 250) {
                                        	            	imagettftext($finalImg, 12, 0, 20, $sizeValue+20, $black, $font, $iccid1);
                                        	            	imagettftext($finalImg, 12, 0, 20, $sizeValue+40, $black, $font, $number1);
                                        	            	imagettftext($finalImg, 12, 0, 20, $sizeValue+60, $black, $font, $dealer1);
                                        	            	imagettftext($finalImg, 12, 0, 20, $sizeValue+80, $black, $font, $plan1);
                                        	            	imagettftext($finalImg, 12, 0, 20, $sizeValue+100, $black, $font, $date1);
                                        	            } else {
                                        	            	imagettftext($finalImg, 12, 0, 20, $sizeValue+20, $black, $font, $iccid1);
                                        	            	imagettftext($finalImg, 12, 0, 20, $sizeValue+40, $black, $font, $number1);
                                        	            	imagettftext($finalImg, 12, 0, 20, $sizeValue+60, $black, $font, $dealer1);
                                        	            	imagettftext($finalImg, 12, 0, 20, $sizeValue+80, $black, $font, $plan1);
                                        	            	imagettftext($finalImg, 12, 0, 20, $sizeValue+100, $black, $font, $date1);
                                        	            }
                                        	            if(imagepng($finalImg, $savePath))
                                                        {
                                                            echo "<script>$('#add-activation').text('Submit');</script>";
                                                            mysqli_query($con,"update iccid set Status='Success',qrcode='$filename' where id='".$iccidrow['id']."'");
                                                            mysqli_query($con,"update activation set status='Success' where id='$activeid'");
                                                            $status = "Success";
                                                            $val = "Success";
                                                        } 
                                                        else {
                                                            echo "<script>$('#add-activation').text('Submit');</script>";
                                                            $status = "Pending";
                                                            $val = "QR Generate Failed";
                                                        }
                                                    } 
                                                    else
                                                    {
                                                        echo "<script>$('#add-activation').text('Submit');</script>";
                                                        $status = "Pending";
                                                        $val = "Status Change API Failed";
                                                    }
                                                }
                                                else
                                                {
                                                    echo "<script>$('#add-activation').text('Submit');</script>";
                                                    $status = "Pending";
                                                    $val = "Status Change API Failed";
                                                }
                                        	}
                                            else
                                            {
                                                echo "<script>$('#add-activation').text('Submit');</script>";
                                                $status = "Pending";
                                                $val = "Get Product List API Not Run";
                                            }
                                        }
                                        else
                                        {
                                            echo "<script>$('#add-activation').text('Submit');</script>";
                                            $status = "Pending";
                                            $val = "Get Account INFO API Not Run";
                                        }
                                    }
                                    
                                }
                            }
                        }
                    }

                    // Mail for Customer
                    if(isset($status) && $status!="")
                    {
                        $lpadata = explode('$',$iccidrow['LPA_Value']);
                        $message .= '<tr>
                                    <td style="padding-left: 0px; padding-top: 9px; padding-bottom: 9px;">
                                        <div style="margin: 0px; font-size: 11px; font-family: arial, sans-serif; padding-top: 15px;">Item : '.$x.'</div>
                                        <div style="margin: 0px; font-size: 11px; font-family: arial, sans-serif; padding-top: 5px;">ICCID: '.$iccidrow['ICCID'].'</div>
                                        <div style="margin: 0px; font-size: 11px; font-family: arial, sans-serif; padding-top: 5px;">Account_ID: '.$iaccount.'</div>
                                        <div style="margin: 0px; font-size: 11px; font-family: arial, sans-serif; padding-top: 5px;">Phone: '.$iccidrow['Number'].'</div>
                                        <div style="margin: 0px; font-size: 11px; font-family: arial, sans-serif; padding-top: 5px;">Plan: <span style="font-weight:bold">'.$planrow['sku'].'</span></div>
                                        <div style="margin: 0px; font-size: 11px; font-family: arial, sans-serif; padding-top: 5px;">Activation Date: '.$start_date.'</div>
                                        <div style="margin: 0px; font-size: 11px; font-family: arial, sans-serif; padding-top: 5px;">Order_ID: '.$_SESSION['parentid'].'</div>
                                        <div style="margin: 0px; font-size: 11px; font-family: arial, sans-serif; padding-top: 5px;">Item No : '.$x.'/'.$qty.'</div>
                                        <div style="margin: 0px; font-size: 11px; font-family: arial, sans-serif; padding-top: 5px;">Status: '.$status.'</div>
                                        <div style="margin: 0px; font-size: 11px; font-family: arial, sans-serif; padding-top: 15px;">Scan the QR code to install eSIM</div>
                                        <div style="margin: 0px; font-size: 11px; font-family: arial, sans-serif; padding-top: 15px;">
                                            <img src="https://alerts.unisimcard.biz/qr/'.$filename.'" style="border: 0px; margin: 0px; height: 400px;" />
                                        </div>
                                        <div style="margin: 0px; font-size: 11px; font-family: arial, sans-serif; padding-top: 15px;">Having trouble scanning the barcode?</div>
                                        <div style="margin: 0px; font-size: 11px; font-family: arial, sans-serif; padding-top: 5px;">The following are the manual connection details:</div>
                                        <div style="margin: 0px; font-size: 11px; font-family: arial, sans-serif; padding-top: 5px;"><span style="font-weight:bold">SM-DP server:</span> '.$lpadata[1].'</div>
                                        <div style="margin: 0px; font-size: 11px; font-family: arial, sans-serif; padding-top: 5px;"><span style="font-weight:bold">activation code:</span> '.$lpadata[2].'</div>
                                        <div style="margin: 0px; font-size: 11px; font-family: arial, sans-serif; padding-top: 5px;">Verification code: Leave blank</div>
                                    </td>
                                </tr>';
                    }
                    
                    // Mail for Support
                    if(isset($val) && $val!="")
                    {
                        $lpadata = explode('$',$iccidrow['LPA_Value']);
                        $message1 .= '<tr>
                                    <td style="padding-left: 0px; padding-top: 9px; padding-bottom: 9px;">
                                        <div style="margin: 0px; font-size: 11px; font-family: arial, sans-serif; padding-top: 15px;">Item : '.$x.'</div>
                                        <div style="margin: 0px; font-size: 11px; font-family: arial, sans-serif; padding-top: 5px;">ICCID: '.$iccidrow['ICCID'].'</div>
                                        <div style="margin: 0px; font-size: 11px; font-family: arial, sans-serif; padding-top: 5px;">Account_ID: '.$iaccount.'</div>
                                        <div style="margin: 0px; font-size: 11px; font-family: arial, sans-serif; padding-top: 5px;">Phone: '.$iccidrow['Number'].'</div>
                                        <div style="margin: 0px; font-size: 11px; font-family: arial, sans-serif; padding-top: 5px;">Plan: <span style="font-weight:bold">'.$planrow['sku'].'</span></div>
                                        <div style="margin: 0px; font-size: 11px; font-family: arial, sans-serif; padding-top: 5px;">Activation Date: '.$start_date.'</div>
                                        <div style="margin: 0px; font-size: 11px; font-family: arial, sans-serif; padding-top: 5px;">Order_ID: '.$_SESSION['parentid'].'</div>
                                        <div style="margin: 0px; font-size: 11px; font-family: arial, sans-serif; padding-top: 5px;">Status: '.$status.'</div>
                                        <div style="margin: 0px; font-size: 11px; font-family: arial, sans-serif; padding-top: 5px;">Item No : '.$x.'/'.$qty.'</div>
                                        <div style="margin: 0px; font-size: 11px; font-family: arial, sans-serif; padding-top: 5px;">Error: '.$val.'</div>
                                        <div style="margin: 0px; font-size: 11px; font-family: arial, sans-serif; padding-top: 15px;">Scan the QR code to install eSIM</div>
                                        <div style="margin: 0px; font-size: 11px; font-family: arial, sans-serif; padding-top: 15px;">
                                            <img src="https://alerts.unisimcard.biz/qr/'.$filename.'" style="border: 0px; margin: 0px; height: 400px;" />
                                        </div>
                                        <div style="margin: 0px; font-size: 11px; font-family: arial, sans-serif; padding-top: 15px;">Having trouble scanning the barcode?</div>
                                        <div style="margin: 0px; font-size: 11px; font-family: arial, sans-serif; padding-top: 5px;">The following are the manual connection details:</div>
                                        <div style="margin: 0px; font-size: 11px; font-family: arial, sans-serif; padding-top: 5px;"><span style="font-weight:bold">SM-DP server:</span> '.$lpadata[1].'</div>
                                        <div style="margin: 0px; font-size: 11px; font-family: arial, sans-serif; padding-top: 5px;"><span style="font-weight:bold">activation code:</span> '.$lpadata[2].'</div>
                                        <div style="margin: 0px; font-size: 11px; font-family: arial, sans-serif; padding-top: 5px;">Verification code: Leave blank</div>
                                    </td>
                                </tr>';
                    }
                    
                } 
                if(($x-1)==$qty)
                {
                    echo '<script>$("#activation-form")[0].reset();</script>';
                    echo "<script>$('#add-activation').text('Submit');</script>";
                    echo '<script>$("#error").html("Activation Request Successully Added");$("#error").attr("style", "color: #3ec845 !important");</script>';
                }
            } 
            else 
            {
                echo "<script>$('#add-activation').text('Submit');</script>";
                echo '<script>$("#error").html("Low on inventory");$("#error").attr("style", "color: #e53935 !important");</script>';
            }
        } 
        else
        {
            echo "<script>$('#add-activation').text('Submit');</script>";
            $remainAmt = abs($wallet - $totalAmt);
            echo $url = 'Need $'.$remainAmt.' more to activate, <a href="dashboard.php" class="text-danger">Topup</a>?';
        }
    }
    else
    {
        echo "<script>$('#add-activation').text('Submit');</script>";
        $remain = abs($remain - $qty);
        echo 'Need '.$remain.' more to Add Quantity';
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
                                        <div style="margin: 0px; font-size: 11px; font-family: arial, sans-serif; padding-top: 15px;">Please find below some important information regarding your Order-ID: '.$_SESSION['parentid'].' Qty - '.$qty.': </div>
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
                    <div style="margin: 0px; font-size: 11px; font-family: arial, sans-serif; padding-top: 15px;">****************************</div>
                    <div style="margin: 0px; font-size: 11px; font-family: arial, sans-serif; padding-top: 15px;">How to set up your UniSimCard eSIM attached:</div>
                    <div style="margin: 0px; font-size: 11px; font-family: arial, sans-serif; padding-top: 15px;">* Important notice: once the eSIM is installed on your phone you can’t delete it or reinstall it, in the case that you do, you will need to purchase a new eSIM, your balance or remaining plan will be transferred to the new eSIM</div>
                    <div style="margin: 0px; font-size: 11px; font-family: arial, sans-serif; padding-top: 15px;">
                        Quick Dial Numbers<br>
                        141 - Check balance (only for pay as you go option)<br>
                        142 - "Get my numbers"<br>
                        143 - set caller-ID for outgoing calls. Should be dialed as 143. DID must be one of the DID aliases that belong to the SIM subscriber<br>
                        144 - top-up account balance with a voucher. Should be dialed as 144 <br>
                        152 - enable VM<br>
                        153 - disable VM<br>
                        156 - enable call forwarding. Should be dialed as 156<br>
                        157 - disable call forwarding<br>
                        190 - get backoffice password<br>
                        *145*8888*10 send top up via CC (credit card most be on file, only for pay as you go option)
                    </div>
                    <div style="margin: 0px; font-size: 12px; font-family: arial, sans-serif; padding-top: 15px;">
                    If you would like to use our voice app to make and receive calls during or after your trip on your UniSimCard number <br>
                    Please read more https://www.unisimcard.biz/calling-plans-long-distance/</div>
                    <div style="margin: 0px; font-size: 12px; font-family: arial, sans-serif; padding-top: 15px;">
                    For more information and FAQ please visit our main website<br>
                    https://www.unisimcard.biz/faq.html</div>
                    <div style="margin: 0px; font-size: 12px; font-family: arial, sans-serif; padding-top: 15px;">
                    To recharge your plan or to buy a new plan you can go to <br>
                    https://www.unisimcard.biz/topup/</div>
                    <div style="margin: 0px; font-size: 12px; font-family: arial, sans-serif; padding-top: 15px;">* Important notice: once the eSIM is installed on your phone you can’t delete it or reinstall it, in the case that you do, you will need to purchase a new eSIM, your balance or remaining plan will be transferred to the new eSIM</div>
                </td>
            </tr>
            </tbody></table></td></tr></tbody></table>';


if(isset($message))
{
    $fromEmail = "unisimcard@globalvoiceconnect.com";
    $sub = "UniSImCard eSIM Order-ID: ".$_SESSION['parentid']."(Qty - ".$qty.")";
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
    $mail->addAddress($_SESSION['user']);
    $mail->addBCC("sunil@roam1.com");
    $mail->addBCC("samin@roam1.com");
    $mail->addBCC("ivan@globalvoiceconnect.com");
    $mail->isHTML(true);
    $mail->addAttachment('esim_guide.pdf');
    $mail->Subject = $sub;
    $mail->Body    = $header.$message.$footer;
    $mail->send();
}

if(isset($message1))
{
    $fromEmail = "unisimcard@globalvoiceconnect.com";
    $sub = "UniSImCard eSIM Order-ID: ".$_SESSION['parentid']."(Qty - ".$qty.")";
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
    $mail->addAddress("samin@roam1.com");
    $mail->addAddress("ivan@globalvoiceconnect.com");
    // $mail->addBCC("sunil@roam1.com");
    // $mail->addBCC("samin@roam1.com");
    $mail->isHTML(true);
    $mail->Subject = $sub;
    $mail->Body    = $header.$message1.$footer;
    $mail->send();
}
?>    