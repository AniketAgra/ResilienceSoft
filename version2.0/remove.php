<?php 
include "includes/config.php";

$id = 0;
if(isset($_POST['del_id'])){
   $id = mysqli_real_escape_string($con,$_POST['del_id']);
   $uid = mysqli_real_escape_string($con,$_POST['cookieId']);
}
if($id > 0){

    // Check record exists
    $checkRecord = mysqli_query($con,"SELECT * FROM cart_items WHERE cartId=".$id);
    $totalrows = mysqli_num_rows($checkRecord);

    if($totalrows > 0){
        // Delete record
        $query = "DELETE FROM cart_items WHERE cartId=".$id;
        mysqli_query($con,$query);

        echo "Success";
        exit;
    } else {
        echo 'Failed';
        exit;
    }
}

echo 'Failed';
exit;