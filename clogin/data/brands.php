<?php
session_start();
include("../includes/config.php");
$result = mysqli_query($con, "select *,date_format(createdAt, '%d-%m-%Y') AS created_At,(select vendorName from vendors where id=brands.vendorId) AS vendorName from brands where deleteflag='0'");

$rows =  '[';
while($r = mysqli_fetch_assoc($result)) {
    $dataData = json_encode($r);
    if($dataData != '') {
         $rows .= json_encode($r).",";
    }
}
echo $tableData = rtrim($rows,",")."]";
?>