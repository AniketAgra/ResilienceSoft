<?php 
session_start();
include("includes/config.php"); 


$cookieValue = base64_decode($_COOKIE['a2k_key']);

 
 
if(isset($_GET['PayerID'])){ 
    echo "<h1>Your Payment has been successfull</h1>";
    if(isset($_SESSION['userId'])) {
      $userId = $_SESSION['userId'];
      $select = mysqli_query($con, "select * from cart_items where user_id='$userId'");
    } else {
      $userId = 0;
      $cookieValue = base64_decode($_COOKIE['a2k_key']);
      $select = mysqli_query($con, "select * from cart_items where cookie_id='$cookieValue'");
    }

    while($row=mysqli_fetch_assoc($select))
    {
        $id = $row['id'];
        $query = "DELETE FROM cart_items WHERE id=".$id;
        mysqli_query($con,$query);
      $select = mysqli_query($con, "select * from cart_items where cookie_id='$cookieValue'");
    }
}
else{
    echo "<h1>Your Payment has been failed</h1>";
}
session_destroy();
?>
<h1>payment success</h1>
<a href="index5.php">Back To home</a>