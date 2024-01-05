<?php
session_start();
include('../includes/config.php');

$id     = $_POST['dealerId'];
$amount = $_POST['amount'];
$notes  = $_POST['note'];
$type   = $_POST['type'];
$userid = $_SESSION['userId'];
$date   = date("Y-m-d h:i:s");

if (empty($type)) {
    echo '<span class="text-primary">Please Select Wallet Type</span>';
} 
elseif (empty($amount)) {
    echo '<span class="text-primary">Please Enter Amount</span>';
} 
elseif (empty($notes)) {
	echo '<span class="text-primary">Please Enter Notes</span>';
} 
elseif (empty($userid)) {} 
else
{
    $select = mysqli_query($con, "select * from wallet where dealerId='$id' AND status='Success' ORDER BY id DESC LIMIT 1");
    if(mysqli_num_rows($select) > 0)
    {
        $row = mysqli_fetch_assoc($select);
        $open = $row['closeBal'];
        if($type=="Debit"){ $close = $open - $amount; }
        elseif($type=="Credit"){ $close = $open + $amount; }
        
    } else{
        $open = '0';
        if($type=="Debit"){ $close = $open - $amount; }
        elseif($type=="Credit"){ $close = $open + $amount; }
    }
    
    echo '<script>$("#wallet-update").attr("disabled","disabled")</script>';
    if($type=="Debit")
    {
        $insert = mysqli_query($con,"insert into wallet (dealerId,openBal,amount,closeBal,type,notes,paymentFor,status,createdBy,createdAt) values ('$id','$open','$amount','$close','$type','$notes','Dealer Debit','Success','$userid','$date')");    
    }
    else
    {
        $insert = mysqli_query($con,"insert into wallet (dealerId,openBal,amount,closeBal,type,notes,paymentFor,status,createdBy,createdAt) values ('$id','$open','$amount','$close','$type','$notes','Dealer Credit','Success','$userid','$date')");    
    }
	
	if($insert)
	{
    	echo '<span class="text-success">Wallet Added Successully</span>';
    	echo "<script>window.setTimeout(function(){location.reload()},3000)</script>";
	}
}


