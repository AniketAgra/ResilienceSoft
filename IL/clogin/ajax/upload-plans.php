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
    // $i = 0;
    // $date = date('Y-m-d h:i:s');
    // echo $data .= '<div class="table-responsive"><table border="1" style="width:100%;max-height:400px" cellpadding="7" cellspacing="0">';
    // echo $data .= '<tr>
    //             <th>SNo</th>
    //             <th>Plan Name</th>
    //             <th>SKU</th>
    //             <th>Retail Rate</th>
    //             <th>Selling Rate</th>
    //             <th>Status</th>
    //         </tr>';
    while (($getData = fgetcsv($csvFile, 10000, ",")) !== FALSE)
    {
        if(!empty($getData[0]))
        {
            $update = mysqli_query($con, "update plans set planName='".$getData[1]."', sku='".$getData[2]."', retailRate='".$getData[4]."', stdRate='".$getData[5]."', status='".$getData[6]."' where id='".$getData[0]."'");
        }
        // echo  '<tr>
        //             <td>'.++$i.'</td>
        //             <td>'.$getData[1].'</td>
        //             <td>'.$getData[2].'</td>
        //             <td>'.$getData[4].'</td>
        //             <td>'.$getData[5].'</td>
        //             <td>'.$getData[6].'</td>
        //         </tr>';

    }
    //echo '</table></div>';
    echo '<script>$("#form-plan-upload")[0].reset();</script>';
    echo '<h6 class="text-center text-success">File uploaded Successfully</h6>';
}
else
{
    echo '<h6 class="text-center text-primary">Please select valid file</h6>';
}
?>