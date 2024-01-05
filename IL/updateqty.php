<?php 
include "includes/config.php";

$id = 0;
if(isset($_POST['C_ID'])){
   $id = mysqli_real_escape_string($con,$_POST['C_ID']);
   $uid= mysqli_real_escape_string($con,$_POST['cookieId']);
   
}
if($id > 0){

  // Check record exists
  $checkRecord = mysqli_query($con,"SELECT * FROM cart_items WHERE id=".$id);
  $totalrows = mysqli_num_rows($checkRecord);
  $data=mysqli_fetch_assoc($checkRecord);
  $t_qty=$data['quantity'];
  

  if($totalrows > 0){
        if($_POST['act']=='plus')
        {
            $query = "update cart_items set quantity=quantity+1 WHERE id=".$id;
            mysqli_query($con,$query); 

        }
        if($_POST['act']=='minus')
        {
            if($t_qty=='1')
            {
                echo "You can not keep quantity less than 1";
                exit;
            }
              
            // decrease record
            $query = "update cart_items set quantity=quantity-1 WHERE id=".$id;
            mysqli_query($con,$query);
        

        }
        echo "Success";
        exit;
    } else {
        echo 'Failed';
        exit;
    }
}

echo 'Failed';
exit;
