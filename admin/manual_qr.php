<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include_once('include/config.php');
/**
 * QR Code + Logo Generator
 *
 * http://labs.nticompassinc.com
 */
$iccid = $_GET['v1'];
$plan  = $_GET['v2'];
$eml = $_GET['eml'];  
$select = mysqli_query($con, "select * from ICCID where ICCID='$iccid'");
$row = mysqli_fetch_assoc($select);

$selectPlan = mysqli_query($con, "select plan_name from plans where id='$plan'");
$planrow = mysqli_fetch_assoc($selectPlan);

$data = $row['LPA_Value'];
$size = isset($_GET['size']) ? $_GET['size'] : '400x400';
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


$iccidValue = "ICCID: ".$iccid;
$uk = "UK#: ".$row['Camel_MSISDN'];
$email = "EMAIL: ".$eml;
$plan = "PLAN: ".$planrow['plan_name'];

if($planrow['plan_name'] != '') {
	$finalImg = imagecreatetruecolor(400,550);
} else {
	$finalImg = imagecreatetruecolor(400,520);
}
$white = imageColorAllocate($finalImg, 255, 255, 255);
$black = imageColorAllocate($finalImg, 0, 0, 0);
$font = realpath('arial.ttf');
imagefill($finalImg, 0, 0, $white);
imagecopymerge($finalImg,$QR,0,8,0,0,400,400, 100);
imagettftext($finalImg, 12, 0, 20, 430, $black, $font, $iccidValue);
imagettftext($finalImg, 12, 0, 20, 460, $black, $font, $uk);
if($planrow['plan_name'] != '') {
	imagettftext($finalImg, 12, 0, 20, 490, $black, $font, $plan);
	imagettftext($finalImg, 12, 0, 20, 520, $black, $font, $email);
} else {
	imagettftext($finalImg, 12, 0, 20, 490, $black, $font, $email);
}

$color = imagecolorallocate($finalImg, 132, 15, 153);
$borderThickness = 10;

drawBorder($finalImg, $color, $borderThickness);


function drawBorder(&$finalImg, &$color, $thickness)
{
	$x1 = 0;
	$y1 = 0;
	$x2 = imagesx($finalImg) - 1;
	$y2 = imagesy($finalImg) - 1;

	for($i = 0; $i < $thickness; $i++)
	{

		imagerectangle($finalImg, $x1++, $y1++, $x2--, $y2--, $color);
	}

}

imagepng($finalImg);
imagedestroy($finalImg);
imagedestroy($QR);
?>