<?php
$con = mysqli_connect("localhost","unisim_user","7xo0wrvk*6SP","unisim_db");
$result = mysqli_query($con, "select * from demo");
$rows =  '[';
while($r = mysqli_fetch_assoc($result)) {
    $dataData = json_encode($r);
    if($dataData != '') {
         $rows .= json_encode($r).",";
    }
}
echo $tableData = rtrim($rows,",")."]";
?>