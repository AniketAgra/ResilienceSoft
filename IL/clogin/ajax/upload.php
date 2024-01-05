<?php
session_start();
include('../includes/config.php');

// Form Post Data
$brand     = $_POST['brand'];
$plan      = $_POST['plan'];
$batch     = $_POST['batch'];
$file_name = $_FILES['file']['name'];
$tmp_name  = $_FILES['file']['tmp_name'];

$checkbatch = mysql_query("select * from transactions where batch='$batch'");

// Find Retail Rate And Selling Rate
$selectplan = mysql_query("SELECT * FROM plans WHERE planId='$plan'");
$planrow    = mysql_fetch_assoc($selectplan);

$retail  = $planrow['retailRate'];
$selling = $planrow['sellingRate'];

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

if(empty($brand))
{
    echo '<h6 class="text-center text-primary">Please Select Brand</h6>';
}
elseif(empty($plan))
{
    echo '<h6 class="text-center text-primary">Please Select Plan</h6>';
}
elseif(empty($batch))
{
    echo '<h6 class="text-center text-primary">Please Enter Batch Number</h6>';
}
elseif(mysql_num_rows($checkbatch) > 0)
{
    echo '<h6 class="text-center text-primary">This Batch No. Already Exist. Please Enter Other Batch No.</h6>';
}
elseif(empty($file_name))
{
    echo '<h6 class="text-center text-primary">Please Select File</h6>';
}
elseif (!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $fileMimes))
{
    echo '<script>$("#upload").attr("disabled","disabled")</script>';
    // Open uploaded CSV file with read-only mode
    $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
    
    // Skip the first line
    fgetcsv($csvFile);
    $i = 0;
    $date = date('Y-m-d h:i:s');
    echo $data .= '<table border="1" style="width:100%" cellpadding="7" cellspacing="0">';
    echo $data .= '<tr>
                <th>SNo</th>
                <th>ICCID</th>
                <th>Retail Rate</th>
                <th>Selling Rate</th>
            </tr>';
    while (($getData = fgetcsv($csvFile, 10000, ",")) !== FALSE)
    {
        echo  '<tr>
                    <td>'.++$i.'</td>
                    <td>'.$getData[0].'</td>
                    <td>'.$retail.'</td>
                    <td>'.$selling.'</td>
                </tr>';
                
        $query = "SELECT * FROM activation WHERE ICCID = '".$getData[0]."'";
        $check = mysql_query($query);
        if (mysql_num_rows($check) == 0)
        {
            $insert = mysql_query("insert into activation (batch,ICCID,brandid,planid,dealerId,retailRate,sellingRate) values('$batch','".$getData[0]."','$brand','$plan','".$_SESSION['userId']."','$retail','$selling') ");
            if($insert)
            {
                $checkIMEI = mysql_query("select * from IMEI where brandId='$brand' AND status='Available' LIMIT 1");
                if (mysql_num_rows($checkIMEI) == 1)
                {
                    $IMEIrow = mysql_fetch_assoc($checkIMEI);
                    $update = mysql_query("update IMEI set ICCID='".$getData[0]."', status='Sold', AssignedOn='$date' where id='".$IMEIrow['id']."' AND brandId='$brand' AND status='Available'");
                    if($update)
                    {
                        $update = mysql_query("update activation set IMEI='".$IMEIrow['IMEI']."' where ICCID='".$getData[0]."' AND brandId='$brand' AND status='Pending'");    
                    }
                }
                else
                {
                    $update = mysql_query("UPDATE activation SET status='NoIMEI' WHERE ICCID='".$getData[0]."'");    
                }
            }
        }

    }
    echo '</table>';
    
    $totalretail  = $retail * $i;
    $totalselling = $selling * $i;
    $add_trans = mysql_query("insert into transactions (batch,brandId,planId,qty,retailRate,sellingRate,totalRetailAmt,totalSellingAmt,dealerId) values ('$batch','$brand','$plan','$i','$retail','$selling','$totalretail','$totalselling','".$_SESSION['userId']."')");
}
else
{
    echo "Please select valid file";
}
?>