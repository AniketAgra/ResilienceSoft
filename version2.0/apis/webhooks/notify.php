<?php

$json_string = json_encode($_REQUEST);

$file_handle = fopen('webhook_log.json', 'a');
$dt=Date("Y-m-d h:i:s");
$line="\n========================================\n";
fwrite($file_handle, $line);
fwrite($file_handle, $dt);
fwrite($file_handle, $line);
fwrite($file_handle, $json_string);
fwrite($file_handle, $line);
fclose($file_handle);


$raw_post_data = file_get_contents('php://input');
file_put_contents('webhook_log.txt', print_r($_REQUEST, true), FILE_APPEND);
/*
$raw_post_array = explode('-', $raw_post_data);
$myPost = array();
print_r($raw_post_data);
print_r($raw_post_array);
$date=date("Y-m-d h:i:s"); 
$my_file = 'webhook_log.txt';
$handle = fopen($my_file, 'a') or die('Cannot open file:  '.$my_file);
$data = "\n".'===============Starting a new  transaction Webhook=======================';
fwrite($handle, $data);
$data1="\n"."POST : ".$raw_post_array;
fwrite($handle, $data1);
fclose($handle);
*/
?>