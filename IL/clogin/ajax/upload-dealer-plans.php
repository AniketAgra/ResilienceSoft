<?php
session_start();
include('../includes/config.php');

$file_name = $_FILES['file']['name'];
$tmp_name  = $_FILES['file']['tmp_name'];

// Files Support
$fileMimes = array(
    'text/x-comma-separated-values',
    'text/comma-separated-values',
    'application/octet-stream',
    'application/vnd.ms-excel',
    'application/x-csv',
    'text/x-csv',
    'text/csv',
    'application/csv',
    'application/excel',
    'application/vnd.msexcel',
    'text/plain'
);

if(empty($file_name))
{
    echo '<h6 class="text-center text-primary">Please Select File</h6>';
}
elseif (!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $fileMimes))
{
    echo '<script>$("#upload-now").attr("disabled", true)</script>';
    // Open uploaded CSV file with read-only mode
    $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
    
    // Skip the first line
    fgetcsv($csvFile);
    while (($getData = fgetcsv($csvFile, 10000, ",")) !== FALSE)
    {
        $planid     = $getData[0];
        $rateid     = $getData[1];
        $dealerid   = $getData[2];
        $stdrate    = $getData[5];
        $dealerrate = $getData[6];
        $status     = $getData[7];
        
        $check = mysqli_query($con, "select * from planRate where id='$rateid'");
        if(mysqli_num_rows($check)==0)
        {
            $insert = mysqli_query($con, "insert into planRate (planId,dealerId,stdRate,dealerRate,status) values('$planid','$dealerid','$stdrate','$dealerrate','$status')");
        }
        else
        {
            $update = mysqli_query($con, "update planRate set stdRate='$stdrate', dealerRate='$dealerrate', status='$status' where planId='$planid' AND dealerId='$dealerid'");
        }
    }
    echo '<script>$("#form-plan-upload")[0].reset();</script>';
    echo '<h6 class="text-center text-success">File uploaded Successfully</h6>';
}
else
{
    echo '<h6 class="text-center text-primary">Please select valid file</h6>';
}
?>