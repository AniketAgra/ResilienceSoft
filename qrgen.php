<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include_once('includes/config.php');
/**
 * QR Code + Logo Generator
 *
 * http://labs.nticompassinc.com
 */
$resultIccid = mysqli_query($con, "select * from ICCID where `ICCID`='".$_GET['iccid']."' LIMIT 0,1");
$row =  mysqli_fetch_array($resultIccid);

$data = $row['LPA_Value'];
if(isset($_GET['size']) && $_GET['size'] >= 200) {
	$sizeValue = $_GET['size'];
	$size = $_GET['size'].'x'.$_GET['size'];
} else {
	$sizeValue = 400;
	$size = '400x400';
}
$logo = 'https://activations.gsm2go.com/images/esimlogo.jpg';

header('Content-type: image/png');
// Get QR Code image from Google Chart API
// http://code.google.com/apis/chart/infographics/docs/qr_codes.html
$QR = imagecreatefrompng('https://chart.googleapis.com/chart?cht=qr&chld=H|1&chs='.$size.'&chl='.urlencode($data));
if($logo !== FALSE){
	//echo "Sdfsd"; die;
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
$iccid = "ICCID: ".$row['ICCID'];
$uk = "UK: ".$row['Camel_MSISDN'];

$finalImg = imagecreatetruecolor($sizeValue, $sizeValue+60);
$white = imageColorAllocate($finalImg, 255, 255, 255);
$black = imageColorAllocate($finalImg, 0, 0, 0);
$font = 'arial.ttf';
imagefill($finalImg, 0, 0, $white);
imagecopymerge($finalImg,$QR,0,8,0,0,$sizeValue,$sizeValue, 100);
if($sizeValue < 250) {
	imagettftext($finalImg, 9, 0, 10, $sizeValue+20, $black, $font, $iccid);
	imagettftext($finalImg, 9, 0, 10, $sizeValue+40, $black, $font, $uk);
} else {
	imagettftext($finalImg, 10, 0, 20, $sizeValue+20, $black, $font, $iccid);
	imagettftext($finalImg, 10, 0, 20, $sizeValue+40, $black, $font, $uk);
}


imagepng($finalImg);
imagedestroy($finalImg);
imagedestroy($QR);
?>