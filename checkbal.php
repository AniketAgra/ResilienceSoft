<?php
/*
$cmd=$_REQUEST['cmd'];
$num=$_REQUEST['num'];
if($cmd!='' && (is_numeric($num) && strlen($num) > '7') )
{
echo "Command: $cmd --Phone: $num ";

}


$json_string = json_encode($_POST);

$file_handle = fopen('ussd_log.txt', 'a');
fwrite($file_handle, $json_string);
fclose($file_handle);
*/


$xml_post = @file_get_contents('php://input');

file_put_contents('ussd_log.txt', $xml_post);
header('HTTP/1.0 200 OK');

?>