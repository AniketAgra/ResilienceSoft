<?php
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);

$data = isset($row['LPA_Value']) ? $row['LPA_Value'] : 'API';
$size = isset($_GET['size']) ? $_GET['size'] : '400x400';
$logo = 'https://activations.gsm2go.com/images/esimlogo.jpg';

//header('Content-type: image/png');
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
$iccid = "ICCID: ".$_POST['iccid'];
$uk = "UK #: ".$row['Camel_MSISDN'];
$name = "Name: ".$_POST['name'];
$email = "Email: ".$_POST['email'];
$plan = "Plan: ";
$dateOfIssue = "Date: ".date('d M Y');

$savePath = "../../qr/".$_POST['iccid'].'.png';

$finalImg = imagecreatetruecolor(400, 600);
$white = imageColorAllocate($finalImg, 255, 255, 255);
$black = imageColorAllocate($finalImg, 0, 0, 0);
$font = realpath('../../arial.ttf');
imagefill($finalImg, 0, 0, $white);
imagecopymerge($finalImg,$QR,0,10,0,0,400,400, 100);
imagettftext($finalImg, 16, 0, 10, 425, $black, $font, $iccid);
imagettftext($finalImg, 16, 0, 10, 450, $black, $font, $uk);
imagettftext($finalImg, 16, 0, 10, 475, $black, $font, $name);
imagettftext($finalImg, 16, 0, 10, 500, $black, $font, $email);
imagettftext($finalImg, 16, 0, 10, 525, $black, $font, $plan);
imagettftext($finalImg, 16, 0, 10, 550, $black, $font, $dateOfIssue);

$color = imagecolorallocate($finalImg, 40, 72, 193);
$borderThickness = 5;
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

imagepng($finalImg, $savePath);
?>