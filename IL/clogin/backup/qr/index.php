<?php
$filename = time().'.png';
$savePath = $filename;
$data = "LPA";
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
$iccid  = "ICCID: 8997212330099547129";
$imsi   = "IMSI: 485079902029";
$number = "Number: Plan Name";
$plan   = "Plan: sunil@roam1.com";
$name   = "Name: sunil@roam1.com";
$date   = "Activation Date: sunil@roam1.com";
$order  = "Order ID: sunil@roam1.com";
$item   = "Item: sunil@roam1.com";

$finalImg = imagecreatetruecolor($sizeValue, $sizeValue+170);
$white = imageColorAllocate($finalImg, 255, 255, 255);
$black = imageColorAllocate($finalImg, 0, 0, 0);
$font = realpath('arial.ttf');
imagefill($finalImg, 0, 0, $white);
imagecopymerge($finalImg,$QR,0,8,0,0,$sizeValue,$sizeValue, 100);
if($sizeValue < 250) {
	imagettftext($finalImg, 12, 0, 20, $sizeValue+20, $black, $font, $iccid);
	imagettftext($finalImg, 12, 0, 20, $sizeValue+40, $black, $font, $imsi);
	imagettftext($finalImg, 12, 0, 20, $sizeValue+60, $black, $font, $number);
	imagettftext($finalImg, 12, 0, 20, $sizeValue+80, $black, $font, $plan);
	imagettftext($finalImg, 12, 0, 20, $sizeValue+100, $black, $font, $name);
	imagettftext($finalImg, 12, 0, 20, $sizeValue+120, $black, $font, $date);
	imagettftext($finalImg, 12, 0, 20, $sizeValue+140, $black, $font, $order);
	imagettftext($finalImg, 12, 0, 20, $sizeValue+160, $black, $font, $item);
} else {
	imagettftext($finalImg, 12, 0, 20, $sizeValue+20, $black, $font, $iccid);
	imagettftext($finalImg, 12, 0, 20, $sizeValue+40, $black, $font, $imsi);
	imagettftext($finalImg, 12, 0, 20, $sizeValue+60, $black, $font, $number);
	imagettftext($finalImg, 12, 0, 20, $sizeValue+80, $black, $font, $plan);
	imagettftext($finalImg, 12, 0, 20, $sizeValue+100, $black, $font, $name);
	imagettftext($finalImg, 12, 0, 20, $sizeValue+120, $black, $font, $date);
	imagettftext($finalImg, 12, 0, 20, $sizeValue+140, $black, $font, $order);
	imagettftext($finalImg, 12, 0, 20, $sizeValue+160, $black, $font, $item);
}
imagepng($finalImg, $savePath);
?>