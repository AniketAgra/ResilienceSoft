<?php
session_start();
include("../includes/config.php");

$id  = mysqli_real_escape_string($con,$_POST['val']);

if (empty($id)) {
    //echo '<script>$(".error1").text("Enter email address");</script>';
}
else
{
	$check = mysqli_query($con, "select * from users where id='$id'");
	if(mysqli_num_rows($check)===1)
	{
	    echo '<script>$("#error-msg").attr("style", "color: #fff !important");</script>';
        $row = mysqli_fetch_assoc($check);
        $mobile     = $row['mobile'];
        $mobilecode = $row['mobileCode'];
        
        //$apiurl = $mobilecode.urlencode(" - Your verification code. Don't share this code with anyone. From: gsm2go").urlencode("\nhttps://103.154.185.150/~gsm2go/public_html/v5/verification.php?userId=".$id.'&mcode='.$mobilecode);
        $apiurl = $mobilecode.urlencode(" is your verification code. This code will expire within ten minutes. Thank you for using the gsm2go eSIM.");
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://api.rmlconnect.net/bulksms/bulksms?username=blues&password=Rml@1234&type=0&dlr=1&destination=".$mobile."&source=gsm2go&message=".$apiurl);
        curl_exec($ch);
        curl_close($ch);
        echo '<script>alert("Code resent to your mobile ('.$mobile.')");</script>';
	}
}
?>
