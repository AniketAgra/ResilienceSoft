<?php
session_start();
include("../../includes/config.php");

if(isset($_SESSION['user'],$_SESSION['type']) AND ($_SESSION['type']=='A'))
{
    $result = mysqli_query($con, "select *,dealerId AS userId,(select dealer from users where id=userId) AS dealerName, date_format(createdAt, '%d-%m-%Y') AS created_At from users where type IN ('User','Admin')");
}
if(isset($_SESSION['user'],$_SESSION['type']) AND ($_SESSION['type']=='Dealer'))
{
    $result = mysqli_query($con,"select *,date_format(createdAt, '%d-%m-%Y') AS created_At from users where type='User' AND dealerId='".$_SESSION['userId']."' ORDER BY id DESC");
}
if(isset($_SESSION['user'],$_SESSION['type']) AND ($_SESSION['type']=='User'))
{
    $result = mysqli_query($con,"select *,date_format(createdAt, '%d-%m-%Y') AS created_At from users where type='User' AND dealerId='".$_SESSION['dealerId']."' ORDER BY id DESC");
}

$rows =  '[';
while($r = mysqli_fetch_assoc($result)) {
    $dataData = json_encode($r);
    if($dataData != '') {
         $rows .= json_encode($r).",";
    }
}
echo $tableData = rtrim($rows,",")."]";
?>