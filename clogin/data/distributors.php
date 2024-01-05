<?php
session_start();
include("../../includes/config.php");

if(isset($_SESSION['user'],$_SESSION['role']) AND ($_SESSION['role']=='A'))
{
    $result = mysqli_query($con, "select *,date_format(createdAt, '%d-%m-%Y') AS created_At from distributors");

    $rows =  '[';
    while($r = mysqli_fetch_assoc($result)) {
        $dataData = json_encode($r);
        if($dataData != '') {
             $rows .= json_encode($r).",";
        }
    }
    echo $tableData = rtrim($rows,",")."]";
}
?>