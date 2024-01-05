<?php
include("config.php");
//$data = array('status_id'=>'10');
$headers = array(
    'X-Auth-Token: lvznqmz5lad75u9m76lqaoebbouwe80',
    'Content-Type: application/json',
    'Accept: application/json'
);

$curl = curl_init();
$url = 'https://api.bigcommerce.com/stores/7cb2a64bch/v2/orders/10865';
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET');
curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
$state_result = curl_exec($curl);
$result = json_decode($state_result,true); 
echo "<pre>";
print_r($result);

?>
<?php
// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;
// require 'PHPMailer/PHPMailer/src/Exception.php';
// require 'PHPMailer/PHPMailer/src/PHPMailer.php';
// require 'PHPMailer/PHPMailer/src/SMTP.php';
// include("config.php");

// $orderid = "10512";

// $select_iccid = mysqli_query($con, "select * from iccid where Status='' LIMIT 1");
// if(mysqli_num_rows($select_iccid)==1)
// {   
//     $logourl = "https://alerts.unisimcard.biz/bc/webhook/logo.png";
//     $iccidrow = mysqli_fetch_assoc($select_iccid);
//     $data = $iccidrow['LPA_Value'];
//     $filename = time().'.png';
//     $savePath = "qr/".$filename;
//     $sizeValue = 400;
//     $size = '400x400';
//     $logo = "https://alerts.unisimcard.biz/bc/webhook/logo.jpeg";
//     header('Content-type: image/png');
//     $QR = imagecreatefrompng('https://chart.googleapis.com/chart?cht=qr&chld=H|1&chs='.$size.'&chl='.urlencode($data));
//     if($logo !== FALSE){
//         $logo = imagecreatefromstring(file_get_contents($logo));
//         $QR_width = imagesx($QR);
//         $QR_height = imagesy($QR);
//         $logo_width = imagesx($logo);
//         $logo_height = imagesy($logo);
//         // Scale logo to fit in the QR Code
//         $logo_qr_width = $QR_width/3;
//         $scale = $logo_width/$logo_qr_width;
//         $logo_qr_height = $logo_height/$scale;
        
//         imagecopyresampled($QR, $logo, $QR_width/3, $QR_height/2.5, 0, 0, $logo_qr_width, $logo_qr_height, $logo_width, $logo_height);
//     }
//     $iccidd  = "ICCID: ".$iccidrow['ICCID'];
//     $number  = "Number: ".$iccidrow['Number'];
//     $plan    = "IMSI: ".$iccidrow['IMSI'];
//     //$email  = "Order Id: 10512";
    
//     $finalImg = imagecreatetruecolor($sizeValue, $sizeValue+100);
//     $white = imageColorAllocate($finalImg, 255, 255, 255);
//     $black = imageColorAllocate($finalImg, 0, 0, 0);
//     $font = 'arial.ttf';
//     imagefill($finalImg, 0, 0, $white);
//     imagecopymerge($finalImg,$QR,0,8,0,0,$sizeValue,$sizeValue, 100);
//     if($sizeValue < 250) {
//         imagettftext($finalImg, 14, 0, 10, $sizeValue+25, $black, $font, $iccidd);
//         imagettftext($finalImg, 14, 0, 10, $sizeValue+50, $black, $font, $uk);
//         imagettftext($finalImg, 14, 0, 10, $sizeValue+75, $black, $font, $plan);
//         //imagettftext($finalImg, 14, 0, 10, $sizeValue+100, $black, $font, $email);
//     } else {
//         imagettftext($finalImg, 14, 0, 20, $sizeValue+25, $black, $font, $iccidd);
//         imagettftext($finalImg, 14, 0, 20, $sizeValue+50, $black, $font, $uk);
//         imagettftext($finalImg, 14, 0, 20, $sizeValue+75, $black, $font, $plan);
//         //imagettftext($finalImg, 14, 0, 20, $sizeValue+100, $black, $font, $email);
//     }
//     if(imagepng($finalImg, $savePath))
//     {
        
//         $select = mysqli_query($con, "select * from notify where notify_id='$orderid' AND newstatusid!='' ORDER BY id DESC LIMIT 1");
//         $row = mysqli_fetch_assoc($select);
//         if($row['newstatusid']=='11')
//         {
//             $headers = array(
//                 'X-Auth-Token: lvznqmz5lad75u9m76lqaoebbouwe80',
//                 'Content-Type: application/json',
//                 'Accept: application/json'
//             );
//             $curl = curl_init();
//             $url = 'https://api.bigcommerce.com/stores/7cb2a64bch/v2/orders/'.$orderid.'/products';
//             curl_setopt($curl, CURLOPT_URL, $url);
//             curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET');
//             curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
//             curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
//             curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
//             $state_result = curl_exec($curl);
//             $presult = json_decode($state_result,true); 
//             $pro_name = implode(" ",explode("  ",$presult[0]['sku']));
//             $sku_array = explode("_",$presult[0]['sku']);
//             $sku = $sku_array[0].'_'.$sku_array[1];
//             $activate_array = explode(" ",$presult[0]['product_options'][1]['display_value']);
//             $activate = date("Y-m-d", strtotime($activate_array['2'].'-'.$activate_array['1'].'-'.sprintf("%02d",substr_replace($activate_array[0] ,"", -2))));
            
//             $add_products = mysqli_query($con, "insert into product_details (info_id,order_id,product_id,variant_id,name_customer,sku,type,quantity,activation_date) values ('".$presult[0]['id']."','".$presult[0]['order_id']."','".$presult[0]['product_id']."','".$presult[0]['variant_id']."','".$presult[0]['name_customer']."','".$presult[0]['sku']."','".$presult[0]['type']."','".$presult[0]['quantity']."','$activate')");
//             if($sku=='SKU_AC')
//             {
//                 $update = mysqli_query($con, "update iccid set Status='Pending', Order_ID='$orderid', product_id='".$presult[0]['product_id']."' where id='".$iccidrow['id']."'");
//                 if($update)
//                 {
//                     $curl = curl_init();
//                     $url = 'https://api.bigcommerce.com/stores/7cb2a64bch/v2/orders/'.$orderid;
//                     curl_setopt($curl, CURLOPT_URL, $url);
//                     curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET');
//                     curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
//                     curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
//                     curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
//                     $state_result = curl_exec($curl);
//                     $orderresult = json_decode($state_result,true); 
//                     $modified = explode(" ",$orderresult['date_modified']);
//                     $modified_date = date("Y-m-d h:i:s", strtotime($modified[3].'-'.$modified[2].'-'.$modified[1].' '.$modified[4]));
//                     $created = explode(" ",$orderresult['date_created']);
//                     $created_date = date("Y-m-d h:i:s", strtotime($created[3].'-'.$created[2].'-'.$created[1].' '.$created[4]));
            
//                     $add_orders = mysqli_query($con, "insert into orders (order_id,status_id,status,items_total,payment_status,refunded_amount,ip_address,geoip_country,currency_code,customer_message,first_name,last_name,company,street_1,street_2,city,state,zip,country,country_iso2,phone,email,order_source,modified_date,created_at) values ('".$orderresult['id']."','".$orderresult['status_id']."','".$orderresult['status']."','".$orderresult['items_total']."','".$orderresult['payment_status']."','".$orderresult['refunded_amount']."','".$orderresult['ip_address']."','".$orderresult['geoip_country']."','".$orderresult['currency_code']."','".$orderresult['customer_message']."','".$orderresult['billing_address']['first_name']."','".$orderresult['billing_address']['last_name']."','".$orderresult['billing_address']['company']."','".$orderresult['billing_address']['street_1']."','".$orderresult['billing_address']['street_2']."','".$orderresult['billing_address']['city']."','".$orderresult['billing_address']['state']."','".$orderresult['billing_address']['zip']."','".$orderresult['billing_address']['country']."','".$orderresult['billing_address']['country_iso2']."','".$orderresult['billing_address']['phone']."','".$orderresult['billing_address']['email']."','".$orderresult['order_source']."','$modified_date','$created_date')");    
//                     if($add_orders)
//                     {
//                         header("Access-Control-Allow-Origin: *");
//                         header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE, OPTIONS");
//                         header("Access-Control-Allow-Headers: Origin, Content-Type, Accept, Authorization, X-Request-With, X-CLIENT-ID, X-CLIENT-SECRET");
//                         header('Access-Control-Allow-Credentials: true');
            
//                         $post_body = array();
//                         $post_body['auth_info'] = json_encode(array('login' => 'esimAPI', 'password' => '$0%6YrU$jJRh'));
//                         $params = array('id' => $iccidrow['ICCID']);
//                         $post_body['params'] = json_encode($params);
//                         $URL = "https://mybilling.globalvoiceconnect.com:443/rest/Account/get_account_info";
//                         $response = sendCurlPost($URL, $post_body);
//                         http_response_code($response['info']['http_code']);
//                         $iccidresult = json_decode($response['data'],true); 
//                         $iproduct    = $iccidresult['account_info']['i_product'];
//                         $firstname   = $iccidresult['account_info']['firstname'];
//                         $iaccount    = $iccidresult['account_info']['i_account'];
//                         $email       = $iccidresult['account_info']['email'];
//                         $semail      = $iccidresult['account_info']['subscriber_email']; 
//                         mysqli_query($con, "update iccid set i_account='$iaccount' where id='".$iccidrow['id']."'");
//                         if(isset($iaccount))
//                         {
//                             $post_body = array();
//                             $post_body['auth_info'] = json_encode(array('login' => 'esimAPI', 'password' => '$0%6YrU$jJRh'));
//                             $params = array('account_info' => array("i_account" => $iaccount, "firstname" => $firstname, "lastname" => "", "subscriber_email" => $semail, "email" => $email));
//                             $post_body['params'] = json_encode($params);
//                             $URL = "https://mybilling.globalvoiceconnect.com:443/rest/Account/update_account";
//                             $response = sendCurlPost($URL, $post_body);
//                             http_response_code($response['info']['http_code']);
//                             $updateuser = json_decode($response['data'],true); 
//                             if(isset($updateuser['i_account']))
//                             {
//                                 $post_body = array();
//                                 $post_body['auth_info'] = json_encode(array('login' => 'esimAPI', 'password' => '$0%6YrU$jJRh'));
//                                 $params = array('offset'=>0, 'name'=> $pro_name);
//                                 $post_body['params'] = json_encode($params);
//                                 $URL = "https://mybilling.telinta.com:443/rest/Product/get_product_list";
//                                 $response = sendCurlPost($URL, $post_body);
//                                 http_response_code($response['info']['http_code']);
//                                 $uresult = json_decode($response['data'],true); 
//                                 $iproduct1 = $uresult['product_list'][0]['i_product'];
//                                 if(isset($iproduct1))
//                                 {
//                                     $post_body = array();
//                                     $post_body['auth_info'] = json_encode(array('login' => 'esimAPI', 'password' => '$0%6YrU$jJRh'));
//                                     $params = array(
//                                         'account_info' => array("i_account" => $iaccount,
//                                             "assigned_addons" => [
//                                                 array("i_product"=>$iproduct1, "addon_effective_from"=>"2022-08-01 00:00:00", "addon_effective_to"=>"2022-09-01 00:00:00")
//                                             ]));
//                                     $post_body['params'] = json_encode($params);
//                                     $URL = "https://mybilling.telinta.com:443/rest/Account/update_account";
//                                     $response = sendCurlPost($URL, $post_body);
//                                     http_response_code($response['info']['http_code']);
//                                     $result = json_decode($response['data'],true); 
//                                     if(isset($result['i_account']))
//                                     {
//                                         $data = array('status_id'=>'10');
//                                         $headers = array(
//                                             'X-Auth-Token: lvznqmz5lad75u9m76lqaoebbouwe80',
//                                             'Content-Type: application/json',
//                                             'Accept: application/json'
//                                         );
//                                         $curl = curl_init();
//                                         $url = 'https://api.bigcommerce.com/stores/7cb2a64bch/v2/orders/'.$orderid;
//                                         curl_setopt($curl, CURLOPT_URL, $url);
//                                         curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'PUT');
//                                         curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
//                                         curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
//                                         curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
//                                         $state_result = curl_exec($curl);
//                                         $result1 = json_decode($state_result,true); 
//                                         if(!empty($result1['id']) && $result1['id']==$orderid)
//                                         {
//                                             mysqli_query($con, "update iccid set Status = 'Success' where id='".$iccidrow['id']."'");
//                                             $status = "Success";
//                                             $val = "Success";
//                                         }
//                                     }
//                                     else
//                                     {
//                                         $status = "Pending";
//                                         $val = "Update Account API Failed";
//                                     }
//                                 }
//                                 else
//                                 {
//                                     $status = "Pending";
//                                     $val = "Get Product List API Failed";
//                                 }
//                             }
//                             else{
//                                 $status = "Pending";
//                                 $val = "Account Information Update API Not Run";
//                             }
//                         }
//                         else
//                         {
//                             $status = "Pending";
//                             $val = "ICCID PRODUCT INFO API Not Run";
//                         }
//                     }
//                     else
//                     {
//                         $status = "Pending";
//                         $val = "Order API Not Run";
//                     }
//                 }
//             }
//             else
//             {
//                 $status = "Pending";
//                 $val = "SKU is Not Equal SKU_AC";
//             }
//         }
//         else
//         {
//             $status = "Pending";
//             $val = "Status Id Not Equal to 11";
//         }
//     }
// }
// else
// {
//     $status = "Pending";
//     $val = "ICCID NOT FOUND";
// }


// function sendCurlPost($url, $post_body)
// {
//     $ch = curl_init();
//     curl_setopt($ch, CURLOPT_URL, $url);
//     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//     curl_setopt($ch, CURLOPT_POST, 1);
//     curl_setopt($ch, CURLOPT_POSTFIELDS, $post_body);
//     curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

//     $res = curl_exec($ch);
//     $info = curl_getinfo($ch);
//     return array('data'=>$res, 'info'=>$info);
// }


// Mail for Customer
// if(isset($status) && $status!="")
// {
//     $message = '<table align="center" cellspacing="0" cellpadding="0" style="width: 540px; margin: 0px auto; font-family: Helvetica; letter-spacing: normal; text-indent: 0px; text-transform: none; word-spacing: 0px; text-decoration: none;">
//             <tbody>
//                 <tr>
//                     <td>
//                         <table cellspacing="0" cellpadding="0" style="width: 500px; margin: 0px 20px;">
//                             <tbody>
//                                 <tr>
//                                     <td style="border-bottom-width: 1px; border-bottom-style: solid; border-bottom-color: rgb(234, 234, 234); padding: 10px 0px 0px 0px;">
//                                         <table cellspacing="0" cellpadding="0">
//                                             <tbody>
//                                                 <tr>
//                                                     <td width="250">
//                                                         <img src="'.$logourl.'"
//                                                             style="border: 0px; margin: 0px; height: 50px;" /><br>
//                                                     </td>
//                                                     <td width="250" valign="top" align="right"><div style="margin: 0px; font-size: 18px; font-family: arial, sans-serif;"></div></td>
//                                                 </tr>
//                                             </tbody>
//                                         </table>
//                                     </td>
//                                 </tr>
//                                 <tr>
//                                     <td style="padding-left: 0px; padding-top: 9px; padding-bottom: 9px;">
//                                         <div style="margin: 0px; font-size: 11px; font-family: arial, sans-serif;">Dear '.$firstname.', </div>
//                                         <div style="margin: 0px; font-size: 11px; font-family: arial, sans-serif; padding-top: 15px;">Welcome to UniSimCard Global eSIM </div>
//                                         <div style="margin: 0px; font-size: 11px; font-family: arial, sans-serif; padding-top: 15px;">Please find below some important information regarding your eSIM:</div>
//                                         <div style="margin: 0px; font-size: 11px; font-family: arial, sans-serif; padding-top: 15px;">ICCID: '.$iccidrow['ICCID'].'</div>
//                                         <div style="margin: 0px; font-size: 11px; font-family: arial, sans-serif; padding-top: 5px;">Phone: '.$iccidrow['Number'].'</div>
//                                         <div style="margin: 0px; font-size: 11px; font-family: arial, sans-serif; padding-top: 5px;">Plan: '.$pro_name.'<span style="font-weight:bold">'.$result[0]['name_customer'].'</span></div>
//                                         <div style="margin: 0px; font-size: 11px; font-family: arial, sans-serif; padding-top: 5px;">Activation Date: '.$activate.'</div>
//                                         <div style="margin: 0px; font-size: 11px; font-family: arial, sans-serif; padding-top: 5px;">Order_ID: '.$orderid.'</div>
//                                         <div style="margin: 0px; font-size: 11px; font-family: arial, sans-serif; padding-top: 5px;">Status: '.$status.'</div>
//                                         <div style="margin: 0px; font-size: 11px; font-family: arial, sans-serif; padding-top: 15px;">Scan the QR code to install eSIM</div>
//                                         <div style="margin: 0px; font-size: 11px; font-family: arial, sans-serif; padding-top: 15px;">
//                                             <img src="https://alerts.unisimcard.biz/bc/webhook/'.$savePath.'" style="border: 0px; margin: 0px; height: 400px;" />
//                                         </div>
//                                         <div style="margin: 0px; font-size: 11px; font-family: arial, sans-serif; padding-top: 15px;">****************************</div>
//                                         <div style="margin: 0px; font-size: 11px; font-family: arial, sans-serif; padding-top: 15px;">How to set up your UniSimCard eSIM attached:</div>
//                                         <div style="margin: 0px; font-size: 11px; font-family: arial, sans-serif; padding-top: 15px;">* Important notice: once the eSIM is installed on your phone you can’t delete it or reinstall it, in the case that you do, you will need to purchase a new eSIM, your balance or remaining plan will be transferred to the new eSIM</div>
//                                         <div style="margin: 0px; font-size: 11px; font-family: arial, sans-serif; padding-top: 15px;">
//                                             Quick Dial Numbers<br>
//                                             141 - Check balance (only for pay as you go option)<br>
//                                             142 - "Get my numbers"<br>
//                                             143 - set caller-ID for outgoing calls. Should be dialed as 143. DID must be one of the DID aliases that belong to the SIM subscriber<br>
//                                             144 - top-up account balance with a voucher. Should be dialed as 144 <br>
//                                             152 - enable VM<br>
//                                             153 - disable VM<br>
//                                             156 - enable call forwarding. Should be dialed as 156<br>
//                                             157 - disable call forwarding<br>
//                                             190 - get backoffice password<br>
//                                             *145*8888*10 send top up via CC (credit card most be on file, only for pay as you go option)
//                                         </div>
//                                         <div style="margin: 0px; font-size: 12px; font-family: arial, sans-serif; padding-top: 15px;">
//                                         If you would like to use our voice app to make and receive calls during or after your trip on your UniSimCard number <br>
//                                         Please read more https://www.unisimcard.biz/calling-plans-long-distance/</div>
//                                         <div style="margin: 0px; font-size: 12px; font-family: arial, sans-serif; padding-top: 15px;">
//                                         For more information and FAQ please visit our main website<br>
//                                         https://www.unisimcard.biz/faq.html</div>
//                                         <div style="margin: 0px; font-size: 12px; font-family: arial, sans-serif; padding-top: 15px;">
//                                         To recharge your plan or to buy a new plan you can go to <br>
//                                         https://www.unisimcard.biz/topup/</div>
//                                         <div style="margin: 0px; font-size: 12px; font-family: arial, sans-serif; padding-top: 15px;">* Important notice: once the eSIM is installed on your phone you can’t delete it or reinstall it, in the case that you do, you will need to purchase a new eSIM, your balance or remaining plan will be transferred to the new eSIM</div>
//                                     </td>
//                                 </tr>
//                             </tbody>
//                         </table>
//                     </td>
//                 </tr>
//             </tbody>
//         </table>';
        
//     $email = $result1['billing_address']['email'];
//     $fromEmail = "support@weconference.in";
//     $sub = "UniSImCard eSIM: ".$result[0]['name_customer']." [Order_ID: 10512]";
//     $mail = new PHPMailer(true);
//     $mail->isSMTP(); 
//     $mail->Host = 'smtp.mail.us-west-2.awsapps.com'; 
//     $mail->SMTPAuth = true;  
//     $mail->Username = 'support@weconference.in'; 
//     $mail->Password = 'CCIcci1!';
//     $mail->SMTPSecure = 'ssl'; 
//     $mail->Port = 465;  
//     $mail->setFrom("support@weconference.in", "Unisimcard");
//     $mail->addReplyTo("support@weconference.in","Unisimcard");
//     //$mail->addAddress($email);
//     $mail->addAddress("sunil@roam1.com");
//     $mail->addAddress("samin@roam1.com");
//     //$mail->addBCC("sunil@roam1.com");
//     //$mail->addBCC("samin@roam1.com");
//     $mail->isHTML(true);
//     $mail->Subject = $sub;
//     $mail->Body    = $message;
//     $mail->send();
// }

// Mail for Support
// if(isset($val) && $val!="")
// {
//     $message = '<table align="center" cellspacing="0" cellpadding="0" style="width: 540px; margin: 0px auto; font-family: Helvetica; letter-spacing: normal; text-indent: 0px; text-transform: none; word-spacing: 0px; text-decoration: none;">
//             <tbody>
//                 <tr>
//                     <td>
//                         <table cellspacing="0" cellpadding="0" style="width: 500px; margin: 0px 20px;">
//                             <tbody>
//                                 <tr>
//                                     <td style="border-bottom-width: 1px; border-bottom-style: solid; border-bottom-color: rgb(234, 234, 234); padding: 10px 0px 0px 0px;">
//                                         <table cellspacing="0" cellpadding="0">
//                                             <tbody>
//                                                 <tr>
//                                                     <td width="250">
//                                                         <img src="'.$logourl.'"
//                                                             style="border: 0px; margin: 0px; height: 50px;" /><br>
//                                                     </td>
//                                                     <td width="250" valign="top" align="right"><div style="margin: 0px; font-size: 18px; font-family: arial, sans-serif;"></div></td>
//                                                 </tr>
//                                             </tbody>
//                                         </table>
//                                     </td>
//                                 </tr>
//                                 <tr>
//                                     <td style="padding-left: 0px; padding-top: 9px; padding-bottom: 9px;">
//                                         <div style="margin: 0px; font-size: 11px; font-family: arial, sans-serif;">Dear '.$firstname.', </div>
//                                         <div style="margin: 0px; font-size: 11px; font-family: arial, sans-serif; padding-top: 15px;">Welcome to UniSimCard Global eSIM </div>
//                                         <div style="margin: 0px; font-size: 11px; font-family: arial, sans-serif; padding-top: 15px;">Please find below some important information regarding your eSIM:</div>
//                                         <div style="margin: 0px; font-size: 11px; font-family: arial, sans-serif; padding-top: 15px;">ICCID: '.$iccidrow['ICCID'].'</div>
//                                         <div style="margin: 0px; font-size: 11px; font-family: arial, sans-serif; padding-top: 5px;">Phone: '.$iccidrow['Number'].'</div>
//                                         <div style="margin: 0px; font-size: 11px; font-family: arial, sans-serif; padding-top: 5px;">Plan: '.$pro_name.'<span style="font-weight:bold">'.$result[0]['name_customer'].'</span></div>
//                                         <div style="margin: 0px; font-size: 11px; font-family: arial, sans-serif; padding-top: 5px;">Activation Date: '.$activate.'</div>
//                                         <div style="margin: 0px; font-size: 11px; font-family: arial, sans-serif; padding-top: 5px;">Order_ID: '.$orderid.'</div>
//                                         <div style="margin: 0px; font-size: 11px; font-family: arial, sans-serif; padding-top: 5px;">Status: '.$status.'</div>
//                                         <div style="margin: 0px; font-size: 11px; font-family: arial, sans-serif; padding-top: 5px;">Error: '.$val.'</div>
//                                         <div style="margin: 0px; font-size: 11px; font-family: arial, sans-serif; padding-top: 15px;">Scan the QR code to install eSIM</div>
//                                         <div style="margin: 0px; font-size: 11px; font-family: arial, sans-serif; padding-top: 15px;">
//                                             <img src="https://alerts.unisimcard.biz/bc/webhook/'.$savePath.'" style="border: 0px; margin: 0px; height: 400px;" />
//                                         </div>
//                                         <div style="margin: 0px; font-size: 11px; font-family: arial, sans-serif; padding-top: 15px;">****************************</div>
//                                         <div style="margin: 0px; font-size: 11px; font-family: arial, sans-serif; padding-top: 15px;">How to set up your UniSimCard eSIM attached:</div>
//                                         <div style="margin: 0px; font-size: 11px; font-family: arial, sans-serif; padding-top: 15px;">* Important notice: once the eSIM is installed on your phone you can’t delete it or reinstall it, in the case that you do, you will need to purchase a new eSIM, your balance or remaining plan will be transferred to the new eSIM</div>
//                                         <div style="margin: 0px; font-size: 11px; font-family: arial, sans-serif; padding-top: 15px;">
//                                             Quick Dial Numbers<br>
//                                             141 - Check balance (only for pay as you go option)<br>
//                                             142 - "Get my numbers"<br>
//                                             143 - set caller-ID for outgoing calls. Should be dialed as 143. DID must be one of the DID aliases that belong to the SIM subscriber<br>
//                                             144 - top-up account balance with a voucher. Should be dialed as 144 <br>
//                                             152 - enable VM<br>
//                                             153 - disable VM<br>
//                                             156 - enable call forwarding. Should be dialed as 156<br>
//                                             157 - disable call forwarding<br>
//                                             190 - get backoffice password<br>
//                                             *145*8888*10 send top up via CC (credit card most be on file, only for pay as you go option)
//                                         </div>
//                                         <div style="margin: 0px; font-size: 12px; font-family: arial, sans-serif; padding-top: 15px;">
//                                         If you would like to use our voice app to make and receive calls during or after your trip on your UniSimCard number <br>
//                                         Please read more https://www.unisimcard.biz/calling-plans-long-distance/</div>
//                                         <div style="margin: 0px; font-size: 12px; font-family: arial, sans-serif; padding-top: 15px;">
//                                         For more information and FAQ please visit our main website<br>
//                                         https://www.unisimcard.biz/faq.html</div>
//                                         <div style="margin: 0px; font-size: 12px; font-family: arial, sans-serif; padding-top: 15px;">
//                                         To recharge your plan or to buy a new plan you can go to <br>
//                                         https://www.unisimcard.biz/topup/</div>
//                                         <div style="margin: 0px; font-size: 12px; font-family: arial, sans-serif; padding-top: 15px;">* Important notice: once the eSIM is installed on your phone you can’t delete it or reinstall it, in the case that you do, you will need to purchase a new eSIM, your balance or remaining plan will be transferred to the new eSIM</div>
//                                     </td>
//                                 </tr>
//                             </tbody>
//                         </table>
//                     </td>
//                 </tr>
//             </tbody>
//         </table>';
        
//     $email = $result1['billing_address']['email'];
//     $fromEmail = "support@weconference.in";
//     $sub = "UniSImCard eSIM: ".$result[0]['name_customer']." [Order_ID: 10512]";
//     $mail = new PHPMailer(true);
//     $mail->isSMTP(); 
//     $mail->Host = 'smtp.mail.us-west-2.awsapps.com'; 
//     $mail->SMTPAuth = true;  
//     $mail->Username = 'support@weconference.in'; 
//     $mail->Password = 'CCIcci1!';
//     $mail->SMTPSecure = 'ssl'; 
//     $mail->Port = 465;  
//     $mail->setFrom("support@weconference.in", "Unisimcard");
//     $mail->addReplyTo("support@weconference.in","Unisimcard");
//     //$mail->addAddress($email);
//     $mail->addAddress("sunil@roam1.com");
//     $mail->addAddress("samin@roam1.com");
//     //$mail->addBCC("sunil@roam1.com");
//     //$mail->addBCC("samin@roam1.com");
//     $mail->isHTML(true);
//     $mail->Subject = $sub;
//     $mail->Body    = $message;
//     $mail->send();
// }