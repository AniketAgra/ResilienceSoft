<?php
include("../include/config.php");

$id = $_POST['zoneid'];
$select = mysqli_query($con, "Select id,plan_name from plans where status='A' AND zone_id='$id'");
if(mysqli_num_rows($select) > 0)
{
    while($row = mysqli_fetch_assoc($select)){
        echo '<option value="'.$row['id'].'">'.$row['plan_name'].'</option>';
    }
}
else{
    echo '<option value="">Select Plan</option>';
}
?>