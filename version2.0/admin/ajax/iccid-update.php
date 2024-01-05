<?php
include("../include/config.php");

$from     = $_POST['from'];
$iccid    = $_POST['iccid'];
$to       = $_POST['to'];
$mobile   = $_POST['mobile'];
$subject  = $_POST['subject'];
$zone     = $_POST['zone'];
$plan     = $_POST['plan'];
$cc       = $_POST['cc'];
$filename = time().'.png';
$savePath = "../assets/qr/".$filename;

$select = mysqli_query($con, "select * from ICCID where ICCID='$iccid'");
$selectPlan = mysqli_query($con, "select plan_name from plans where id='$plan'");
if(mysqli_num_rows($select)==1)
{
    $update = mysqli_query($con, "update ICCID set fromEmail='$from', custEmail='$to', custMobile='$mobile', subject='$subject', zone='$zone', plan='$plan', cc='$cc', qrcode='$filename' where ICCID='$iccid'");
    if($update)
    {
        $row = mysqli_fetch_assoc($select);
        $planrow = mysqli_fetch_assoc($selectPlan);
    
        $data = $row['LPA_Value'];
        $sizeValue = 400;
		$size = '400x400';
		$logo = 'https://activations.gsm2go.com/images/esimlogo.jpg';
        header('Content-type: image/png');
        $QR = imagecreatefrompng('https://chart.googleapis.com/chart?cht=qr&chld=H|1&chs='.$size.'&chl='.urlencode($data));
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
		$iccid  = "ICCID: ".$row['ICCID'];
        $uk     = "UK: ".$row['Camel_MSISDN'];
        $plan   = "Plan Name: ".$planrow['plan_name'];
        $email  = "Email: ".$row['custEmail'];
        
        $finalImg = imagecreatetruecolor($sizeValue, $sizeValue+100);
		$white = imageColorAllocate($finalImg, 255, 255, 255);
		$black = imageColorAllocate($finalImg, 0, 0, 0);
        $font = '../assets/fonts/arial.ttf';
        imagefill($finalImg, 0, 0, $white);
		imagecopymerge($finalImg,$QR,0,8,0,0,$sizeValue,$sizeValue, 100);
		if($sizeValue < 250) {
			imagettftext($finalImg, 14, 0, 10, $sizeValue+25, $black, $font, $iccid);
			imagettftext($finalImg, 14, 0, 10, $sizeValue+50, $black, $font, $uk);
			imagettftext($finalImg, 14, 0, 10, $sizeValue+75, $black, $font, $plan);
			imagettftext($finalImg, 14, 0, 10, $sizeValue+100, $black, $font, $email);
		} else {
			imagettftext($finalImg, 14, 0, 20, $sizeValue+25, $black, $font, $iccid);
			imagettftext($finalImg, 14, 0, 20, $sizeValue+50, $black, $font, $uk);
			imagettftext($finalImg, 14, 0, 20, $sizeValue+75, $black, $font, $plan);
			imagettftext($finalImg, 14, 0, 20, $sizeValue+100, $black, $font, $email);
		}
        imagepng($finalImg, $savePath);
    }
    
}
?>