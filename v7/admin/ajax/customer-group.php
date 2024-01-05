<?php
include("../include/config.php");

$distid = $_POST['dist_id'];
$select = mysqli_query($con, "select * from customer_group where status='Active' AND distributor_Id='$distid'");
if(mysqli_num_rows($select) > 0)
{
    while($row = mysqli_fetch_assoc($select)){
        echo '<option data-id="'.$row['id'].'" value="'.$row['moniker'].'">'.$row['customer_Group'].'</option>';
    }
}
else{
    echo '<option value="">Select Distributor</option>';
}
?>