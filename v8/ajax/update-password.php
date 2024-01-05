<?php
session_start();
include("../includes/config.php");
require '../mailer.php';

$id     = mysqli_real_escape_string($con,$_POST['codeid']);
$email  = mysqli_real_escape_string($con,$_POST['email']);
$code   = mysqli_real_escape_string($con,$_POST['code']);
$npass  = mysqli_real_escape_string($con,$_POST['npass']);
$rpass  = mysqli_real_escape_string($con,$_POST['rpass']);

if (empty($id)) {
	echo "<script>alert('Invalid code')</script>";
}
elseif (empty($code)) {
	echo "<script>alert('Invalid code')</script>";
}
elseif (empty($npass)) {
	echo "<script>alert('Enter new password')</script>";
}
elseif (strlen($code) != 6) {
	echo "<script>alert('Invalid code')</script>";
}
elseif (empty($rpass)) {
	echo "<script>alert('Enter reset password')</script>";
}
elseif ($npass != $rpass) {
	echo "<script>alert('New password is not matching')</script>";
}
else
{
	$check_code = mysqli_query($con, "select * from password_request where id='$id' AND code='$code' AND status='A'");
	if(mysqli_num_rows($check_code)===1)
	{
		$row = mysqli_fetch_assoc($check_code);
		$update = mysqli_query($con, "update users set password='$npass' where email='".$row['email']."'");
		if($update)
		{
			$change_status = mysqli_query($con, "update password_request set status='D' where id='$id'");
			if($change_status)
			{
				$select = mysqli_query($con, "select * from users where email='".$row['email']."' ");
				$row1 = mysqli_fetch_assoc($select);
				$email = $row1['email'];

				$logourl = "https://esim.gsm2go.com/images/logo1.png";
	           // $message = '<div>
	           //                 <table style="color: rgb(10, 10, 10);font-family: proxima-nova, Roboto, Helvetica, Arial, sans-serif !important;font-size: 16px;font-style: normal;font-variant-caps: normal;font-weight: 400;letter-spacing: normal;text-align: left;text-indent: 0px;text-transform: none;white-space: normal;word-spacing: 0px;background-color: rgb(243, 243, 243) !important;text-decoration: none;border-collapse: collapse;border-spacing: 0px;height: 498px;line-height: 1.3;margin: 0px;padding: 0px;vertical-align: top;width: 541px;">
	           //                     <tbody>
	           //                         <tr style="padding: 0px; text-align: left; vertical-align: top; font-family: proxima-nova, Roboto, Helvetica, Arial, sans-serif !important;">
	           //                             <td
	           //                                 align="center"
	           //                                 valign="top"
	           //                                 style="
	           //                                     color: rgb(10, 10, 10);
	           //                                     font-size: 16px;
	           //                                     font-weight: 400;
	           //                                     line-height: 1.3;
	           //                                     margin: 0px;
	           //                                     padding: 0px;
	           //                                     text-align: left;
	           //                                     vertical-align: top;
	           //                                     word-wrap: break-word;
	           //                                     border-collapse: collapse !important;
	           //                                     font-family: proxima-nova, Roboto, Helvetica, Arial, sans-serif !important;
	           //                                 "
	           //                             >
	           //                                 <center style="min-width: 580px; width: 541px; font-family: proxima-nova, Roboto, Helvetica, Arial, sans-serif !important;">
	           //                                     <table
	           //                                         align="center"
	           //                                         style="
	           //                                             border-collapse: collapse;
	           //                                             border-spacing: 0px;
	           //                                             color: rgb(10, 10, 10);
	           //                                             float: none;
	           //                                             font-size: 16px;
	           //                                             font-weight: 400;
	           //                                             height: 498px;
	           //                                             line-height: 1.3;
	           //                                             margin: 0px;
	           //                                             padding: 0px;
	           //                                             text-align: left;
	           //                                             vertical-align: top;
	           //                                             width: 541px;
	           //                                             background-color: rgb(243, 243, 243) !important;
	           //                                             font-family: proxima-nova, Roboto, Helvetica, Arial, sans-serif !important;
	           //                                         "
	           //                                     >
	           //                                         <tbody>
	           //                                             <tr style="padding: 0px; text-align: left; vertical-align: top; font-family: proxima-nova, Roboto, Helvetica, Arial, sans-serif !important;">
	           //                                                 <td
	           //                                                     align="center"
	           //                                                     valign="top"
	           //                                                     style="
	           //                                                         padding: 48px 0px 0px;
	           //                                                         background-color: rgb(237, 237, 237);
	           //                                                         color: rgb(10, 10, 10);
	           //                                                         float: none;
	           //                                                         font-size: 16px;
	           //                                                         font-weight: 400;
	           //                                                         line-height: 1.3;
	           //                                                         margin: 0px auto;
	           //                                                         text-align: center;
	           //                                                         vertical-align: top;
	           //                                                         word-wrap: break-word;
	           //                                                         border-collapse: collapse !important;
	           //                                                         font-family: proxima-nova, Roboto, Helvetica, Arial, sans-serif !important;
	           //                                                     "
	           //                                                 >
	           //                                                     <center style="min-width: 580px; width: 541px; font-family: proxima-nova, Roboto, Helvetica, Arial, sans-serif !important;">
	           //                                                         <table
	           //                                                             align="center"
	           //                                                             style="
	           //                                                                 width: 541px;
	           //                                                                 border-collapse: collapse;
	           //                                                                 border-spacing: 0px;
	           //                                                                 float: none;
	           //                                                                 margin: 0px auto;
	           //                                                                 max-width: 600px;
	           //                                                                 padding: 0px;
	           //                                                                 text-align: center;
	           //                                                                 vertical-align: top;
	           //                                                                 background-color: rgb(255, 255, 255) !important;
	           //                                                                 font-family: proxima-nova, Roboto, Helvetica, Arial, sans-serif !important;
	           //                                                             "
	           //                                                         >
	           //                                                             <tbody style="font-family: proxima-nova, Roboto, Helvetica, Arial, sans-serif !important;">
	           //                                                                 <tr style="padding: 0px; text-align: left; vertical-align: top; font-family: proxima-nova, Roboto, Helvetica, Arial, sans-serif !important;">
	           //                                                                     <td
	           //                                                                         style="
	           //                                                                             color: rgb(10, 10, 10);
	           //                                                                             font-size: 16px;
	           //                                                                             font-weight: 400;
	           //                                                                             line-height: 1.3;
	           //                                                                             margin: 0px;
	           //                                                                             padding: 0px;
	           //                                                                             text-align: left;
	           //                                                                             vertical-align: top;
	           //                                                                             word-wrap: break-word;
	           //                                                                             border-collapse: collapse !important;
	           //                                                                             font-family: proxima-nova, Roboto, Helvetica, Arial, sans-serif !important;
	           //                                                                         "
	           //                                                                     >
	           //                                                                         <table
	           //                                                                             style="
	           //                                                                                 height: 208px;
	           //                                                                                 background-image: url(https://ci3.googleusercontent.com/proxy/12eqffQ-DLtHtjQWkX3QCmK02JqkZREAw3w4oprCp5dwyDyvP3JbTqv-uxyVhRyaX3tWRiNe7o4ROPMSO7PKUH5_QSHeTd9coPsx2iTPgHHwvVnme6Xnfo_o7N7yEi4HuEwnl9snbQ=s0-d-e1-ft#https://billpayresourcespublic.s3.ap-south-1.amazonaws.com/mail-images/mailer-bg.png);
	           //                                                                                 background-size: cover;
	           //                                                                                 background-color: rgb(3, 41, 156);
	           //                                                                                 border-collapse: collapse;
	           //                                                                                 border-spacing: 0px;
	           //                                                                                 display: table;
	           //                                                                                 padding: 0px;
	           //                                                                                 text-align: left;
	           //                                                                                 vertical-align: top;
	           //                                                                                 width: 541px;
	           //                                                                                 font-family: proxima-nova, Roboto, Helvetica, Arial, sans-serif !important;
	           //                                                                                 background-position: center center;
	           //                                                                                 background-repeat: no-repeat no-repeat;
	           //                                                                             "
	           //                                                                         >
	           //                                                                             <tbody style="font-family: proxima-nova, Roboto, Helvetica, Arial, sans-serif !important;">
	           //                                                                                 <tr style="padding: 0px; text-align: left; vertical-align: top; font-family: proxima-nova, Roboto, Helvetica, Arial, sans-serif !important;">
	           //                                                                                     <td
	           //                                                                                         style="
	           //                                                                                             color: rgb(10, 10, 10);
	           //                                                                                             font-size: 16px;
	           //                                                                                             font-weight: 400;
	           //                                                                                             line-height: 1.3;
	           //                                                                                             margin: 0px;
	           //                                                                                             padding: 0px;
	           //                                                                                             text-align: left;
	           //                                                                                             vertical-align: top;
	           //                                                                                             word-wrap: break-word;
	           //                                                                                             border-collapse: collapse !important;
	           //                                                                                             font-family: proxima-nova, Roboto, Helvetica, Arial, sans-serif !important;
	           //                                                                                         "
	           //                                                                                     >
	           //                                                                                         <table
	           //                                                                                             style="
	           //                                                                                                 border-collapse: collapse;
	           //                                                                                                 border-spacing: 0px;
	           //                                                                                                 display: table;
	           //                                                                                                 padding: 0px;
	           //                                                                                                 text-align: left;
	           //                                                                                                 vertical-align: top;
	           //                                                                                                 width: 541px;
	           //                                                                                                 font-family: proxima-nova, Roboto, Helvetica, Arial, sans-serif !important;
	           //                                                                                             "
	           //                                                                                         >
	           //                                                                                             <tbody>
	           //                                                                                                 <tr style="padding: 0px; text-align: left; vertical-align: top; font-family: proxima-nova, Roboto, Helvetica, Arial, sans-serif !important;">
	           //                                                                                                     <td
	           //                                                                                                         style="
	           //                                                                                                             display: inline-block !important;
	           //                                                                                                             width: 564px;
	           //                                                                                                             box-sizing: border-box;
	           //                                                                                                             height: auto !important;
	           //                                                                                                             padding: 32px 16px 0px 48px;
	           //                                                                                                             color: rgb(10, 10, 10);
	           //                                                                                                             font-size: 16px;
	           //                                                                                                             font-weight: 400;
	           //                                                                                                             line-height: 1.3;
	           //                                                                                                             margin: 0px;
	           //                                                                                                             text-align: left;
	           //                                                                                                             vertical-align: middle;
	           //                                                                                                             word-wrap: break-word;
	           //                                                                                                             border-collapse: collapse !important;
	           //                                                                                                             font-family: proxima-nova, Roboto, Helvetica, Arial, sans-serif !important;
	           //                                                                                                         "
	           //                                                                                                     >
	           //                                                                                                         <a
	           //                                                                                                             href="https://esim.gsm2go.com/"
	           //                                                                                                             style="
	           //                                                                                                                 color: rgb(33, 153, 232);
	           //                                                                                                                 font-weight: 400;
	           //                                                                                                                 line-height: 1.3;
	           //                                                                                                                 padding: 0px;
	           //                                                                                                                 text-align: left;
	           //                                                                                                                 text-decoration: none;
	           //                                                                                                                 font-family: proxima-nova, Roboto, Helvetica, Arial, sans-serif !important;
	           //                                                                                                             "
	           //                                                                                                             target="_blank"
	           //                                                                                                             data-saferedirecturl="https://esim.gsm2go.com/"
	           //                                                                                                         >
	           //                                                                                                             <img
	           //                                                                                                                 alt="OnePage"
	           //                                                                                                                 src="'.$logourl.'"
	           //                                                                                                                 style="
	           //                                                                                                                     width: auto;
	           //                                                                                                                     height: 28px;
	           //                                                                                                                     border: none;
	           //                                                                                                                     clear: both;
	           //                                                                                                                     display: block;
	           //                                                                                                                     max-width: 100%;
	           //                                                                                                                     outline: 0px;
	           //                                                                                                                     text-decoration: none;
	           //                                                                                                                     font-family: proxima-nova, Roboto, Helvetica, Arial, sans-serif !important;
	           //                                                                                                                 "
	           //                                                                                                                 class="CToWUd"
	           //                                                                                                             />
	           //                                                                                                         </a>
	           //                                                                                                     </td>
	           //                                                                                                 </tr>
	           //                                                                                             </tbody>
	           //                                                                                         </table>
	           //                                                                                         <table
	           //                                                                                             style="
	           //                                                                                                 border-collapse: collapse;
	           //                                                                                                 border-spacing: 0px;
	           //                                                                                                 display: table;
	           //                                                                                                 padding: 0px;
	           //                                                                                                 text-align: left;
	           //                                                                                                 vertical-align: top;
	           //                                                                                                 width: 541px;
	           //                                                                                                 font-family: proxima-nova, Roboto, Helvetica, Arial, sans-serif !important;
	           //                                                                                             "
	           //                                                                                         >
	           //                                                                                             <tbody>
	           //                                                                                                 <tr style="padding: 0px; text-align: left; vertical-align: top; font-family: proxima-nova, Roboto, Helvetica, Arial, sans-serif !important;">
	           //                                                                                                     <td
	           //                                                                                                         style="
	           //                                                                                                             display: inline-block !important;
	           //                                                                                                             width: 564px;
	           //                                                                                                             font-weight: 500 !important;
	           //                                                                                                             font-size: 32px;
	           //                                                                                                             box-sizing: border-box;
	           //                                                                                                             height: auto !important;
	           //                                                                                                             padding: 48px 16px 16px 8px;
	           //                                                                                                             color: rgb(255, 255, 255);
	           //                                                                                                             line-height: 1.3;
	           //                                                                                                             margin: 0px;
	           //                                                                                                             text-align: center;
	           //                                                                                                             vertical-align: top;
	           //                                                                                                             word-wrap: break-word;
	           //                                                                                                             border-collapse: collapse !important;
	           //                                                                                                             font-family: proxima-nova, Roboto, Helvetica, Arial, sans-serif !important;
	           //                                                                                                         "
	           //                                                                                                     >
	           //                                                                                                         Password Reset
	           //                                                                                                     </td>
	           //                                                                                                 </tr>
	           //                                                                                             </tbody>
	           //                                                                                         </table>
	           //                                                                                     </td>
	           //                                                                                 </tr>
	           //                                                                             </tbody>
	           //                                                                         </table>
	           //                                                                         <table
	           //                                                                             style="
	           //                                                                                 border-collapse: collapse;
	           //                                                                                 border-spacing: 0px;
	           //                                                                                 display: table;
	           //                                                                                 padding: 0px;
	           //                                                                                 text-align: left;
	           //                                                                                 vertical-align: top;
	           //                                                                                 width: 541px;
	           //                                                                                 font-family: proxima-nova, Roboto, Helvetica, Arial, sans-serif !important;
	           //                                                                             "
	           //                                                                         >
	           //                                                                             <tbody style="font-family: proxima-nova, Roboto, Helvetica, Arial, sans-serif !important;">
	           //                                                                                 <tr style="padding: 0px; text-align: left; vertical-align: top; font-family: proxima-nova, Roboto, Helvetica, Arial, sans-serif !important;">
	           //                                                                                     <td
	           //                                                                                         style="
	           //                                                                                             display: inline-block !important;
	           //                                                                                             width: 564px;
	           //                                                                                             box-sizing: border-box;
	           //                                                                                             height: auto !important;
	           //                                                                                             padding: 0px 48px;
	           //                                                                                             color: rgb(10, 10, 10);
	           //                                                                                             font-size: 16px;
	           //                                                                                             font-weight: 400;
	           //                                                                                             line-height: 1.3;
	           //                                                                                             margin: 0px;
	           //                                                                                             text-align: left;
	           //                                                                                             vertical-align: top;
	           //                                                                                             word-wrap: break-word;
	           //                                                                                             border-collapse: collapse !important;
	           //                                                                                             font-family: proxima-nova, Roboto, Helvetica, Arial, sans-serif !important;
	           //                                                                                         "
	           //                                                                                     >
	           //                                                                                         <table
	           //                                                                                             style="
	           //                                                                                                 border-collapse: collapse;
	           //                                                                                                 border-spacing: 0px;
	           //                                                                                                 display: table;
	           //                                                                                                 padding: 0px;
	           //                                                                                                 text-align: left;
	           //                                                                                                 vertical-align: top;
	           //                                                                                                 width: 493px;
	           //                                                                                                 font-family: proxima-nova, Roboto, Helvetica, Arial, sans-serif !important;
	           //                                                                                             "
	           //                                                                                         >
	           //                                                                                             <tbody style="font-family: proxima-nova, Roboto, Helvetica, Arial, sans-serif !important;">
	           //                                                                                                 <tr style="padding: 0px; text-align: left; vertical-align: top; font-family: proxima-nova, Roboto, Helvetica, Arial, sans-serif !important;">
	           //                                                                                                     <td
	           //                                                                                                         style="
	           //                                                                                                             font-size: 16px;
	           //                                                                                                             padding: 48px 0px 0px;
	           //                                                                                                             color: rgb(55, 66, 79);
	           //                                                                                                             font-weight: 400;
	           //                                                                                                             line-height: 1.25;
	           //                                                                                                             margin: 0px;
	           //                                                                                                             text-align: left;
	           //                                                                                                             vertical-align: top;
	           //                                                                                                             word-wrap: break-word;
	           //                                                                                                             border-collapse: collapse !important;
	           //                                                                                                             font-family: proxima-nova, Roboto, Helvetica, Arial, sans-serif !important;
	           //                                                                                                         "
	           //                                                                                                     >
	           //                                                                                                         Dear '.$row1['fname'].' '.$row1['lname'].',<br />
	           //                                                                                                         <br />
	           //                                                                                                         We got a password reset request for your<span>&nbsp;</span>account. Click on the below button to proceed.
	           //                                                                                                     </td>
	           //                                                                                                 </tr>
	           //                                                                                             </tbody>
	           //                                                                                         </table>
	           //                                                                                         <table
	           //                                                                                             style="
	           //                                                                                                 border-collapse: collapse;
	           //                                                                                                 border-spacing: 0px;
	           //                                                                                                 display: table;
	           //                                                                                                 padding: 0px;
	           //                                                                                                 text-align: left;
	           //                                                                                                 vertical-align: top;
	           //                                                                                                 width: 493px;
	           //                                                                                                 font-family: proxima-nova, Roboto, Helvetica, Arial, sans-serif !important;
	           //                                                                                             "
	           //                                                                                         >
	           //                                                                                             <tbody style="font-family: proxima-nova, Roboto, Helvetica, Arial, sans-serif !important;">
	           //                                                                                                 <tr style="padding: 0px; text-align: left; vertical-align: top; font-family: proxima-nova, Roboto, Helvetica, Arial, sans-serif !important;">
	           //                                                                                                     <td
	           //                                                                                                         style="
	           //                                                                                                             font-size: 16px;
	           //                                                                                                             padding: 48px 0px 0px;
	           //                                                                                                             color: rgb(94, 116, 143);
	           //                                                                                                             font-weight: 400;
	           //                                                                                                             line-height: 1.25;
	           //                                                                                                             margin: 0px;
	           //                                                                                                             text-align: center;
	           //                                                                                                             vertical-align: top;
	           //                                                                                                             word-wrap: break-word;
	           //                                                                                                             border-collapse: collapse !important;
	           //                                                                                                             font-family: proxima-nova, Roboto, Helvetica, Arial, sans-serif !important;
	           //                                                                                                         "
	           //                                                                                                     >
	           //                                                                                                         <a
	           //                                                                                                             align="center"
	           //                                                                                                             href="#"
	           //                                                                                                             style="
	           //                                                                                                                 font-size: 20px;
	           //                                                                                                                 padding: 10px 40px;
	           //                                                                                                                 background-color: rgb(3, 41, 156);
	           //                                                                                                                 border-top-left-radius: 6px;
	           //                                                                                                                 border-top-right-radius: 6px;
	           //                                                                                                                 border-bottom-right-radius: 6px;
	           //                                                                                                                 border-bottom-left-radius: 6px;
	           //                                                                                                                 color: rgb(255, 255, 255);
	           //                                                                                                                 display: inline-block;
	           //                                                                                                                 font-weight: 500;
	           //                                                                                                                 line-height: 1.3;
	           //                                                                                                                 text-align: left;
	           //                                                                                                                 text-decoration: none;
	           //                                                                                                                 font-family: proxima-nova, Roboto, Helvetica, Arial, sans-serif !important;
	           //                                                                                                             "
	           //                                                                                                             target="_blank"
	           //                                                                                                             data-saferedirecturl="https://www.google.com/url?q=https://merchant.cashfree.com/merchant/reset.php?token%3Dc513da03869d37184602f659cfae64a07ca1d2a2&amp;source=gmail&amp;ust=1638251431901000&amp;usg=AOvVaw1hrQCMKRDBVKTMnUm0T6Ry"
	           //                                                                                                         >
	           //                                                                                                             Reset Password
	           //                                                                                                         </a>
	           //                                                                                                     </td>
	           //                                                                                                 </tr>
	           //                                                                                             </tbody>
	           //                                                                                         </table>
	           //                                                                                         <table
	           //                                                                                             style="
	           //                                                                                                 border-collapse: collapse;
	           //                                                                                                 border-spacing: 0px;
	           //                                                                                                 display: table;
	           //                                                                                                 padding: 0px;
	           //                                                                                                 text-align: left;
	           //                                                                                                 vertical-align: top;
	           //                                                                                                 width: 493px;
	           //                                                                                                 font-family: proxima-nova, Roboto, Helvetica, Arial, sans-serif !important;
	           //                                                                                             "
	           //                                                                                         >
	           //                                                                                             <tbody style="font-family: proxima-nova, Roboto, Helvetica, Arial, sans-serif !important;">
	           //                                                                                                 <tr style="padding: 0px; text-align: left; vertical-align: top; font-family: proxima-nova, Roboto, Helvetica, Arial, sans-serif !important;">
	           //                                                                                                     <td
	           //                                                                                                         style="
	           //                                                                                                             font-size: 16px;
	           //                                                                                                             padding: 48px 0px;
	           //                                                                                                             color: rgb(55, 66, 79);
	           //                                                                                                             font-weight: 400;
	           //                                                                                                             line-height: 1.25;
	           //                                                                                                             margin: 0px;
	           //                                                                                                             text-align: left;
	           //                                                                                                             vertical-align: top;
	           //                                                                                                             word-wrap: break-word;
	           //                                                                                                             border-collapse: collapse !important;
	           //                                                                                                             font-family: proxima-nova, Roboto, Helvetica, Arial, sans-serif !important;
	           //                                                                                                         "
	           //                                                                                                     >
	           //                                                                                                         Need any help? Please reply to this email to report it.
	           //                                                                                                     </td>
	           //                                                                                                 </tr>
	           //                                                                                             </tbody>
	           //                                                                                         </table>
	           //                                                                                     </td>
	           //                                                                                 </tr>
	           //                                                                             </tbody>
	           //                                                                         </table>
	           //                                                                         <table
	           //                                                                             style="
	           //                                                                                 background-color: rgb(237, 237, 237);
	           //                                                                                 border-collapse: collapse;
	           //                                                                                 border-spacing: 0px;
	           //                                                                                 display: table;
	           //                                                                                 padding: 0px;
	           //                                                                                 text-align: left;
	           //                                                                                 vertical-align: top;
	           //                                                                                 width: 541px;
	           //                                                                                 font-family: proxima-nova, Roboto, Helvetica, Arial, sans-serif !important;
	           //                                                                             "
	           //                                                                         >
	           //                                                                             <tbody style="font-family: proxima-nova, Roboto, Helvetica, Arial, sans-serif !important;">
	           //                                                                                 <tr style="padding: 0px; text-align: left; vertical-align: top; font-family: proxima-nova, Roboto, Helvetica, Arial, sans-serif !important;">
	           //                                                                                     <td
	           //                                                                                         style="
	           //                                                                                             display: inline-block !important;
	           //                                                                                             width: 564px;
	           //                                                                                             font-size: 12px;
	           //                                                                                             box-sizing: border-box;
	           //                                                                                             height: auto !important;
	           //                                                                                             padding: 32px 48px;
	           //                                                                                             color: rgb(55, 66, 79);
	           //                                                                                             font-weight: 400;
	           //                                                                                             line-height: 16px;
	           //                                                                                             margin: 0px;
	           //                                                                                             opacity: 0.6;
	           //                                                                                             text-align: left;
	           //                                                                                             vertical-align: top;
	           //                                                                                             word-wrap: break-word;
	           //                                                                                             border-collapse: collapse !important;
	           //                                                                                             font-family: proxima-nova, Roboto, Helvetica, Arial, sans-serif !important;
	           //                                                                                             text-align:justify;
	           //                                                                                         "
	           //                                                                                     >
	           //                                                                                         This information transmitted by this email is intended only for the person or entity to which it is addressed. This email may contain proprietary,
	           //                                                                                         business-confidential and/or privileged material of&nbsp;gsm2go. If you are not the intended recipient, please notify gsm2go by return email immediately, and delete
	           //                                                                                         the message from your computer or any other device. Be aware that any use, copy, review, retransmission, distribution, reproduction, disclosure or any action taken
	           //                                                                                         in reliance upon this email other than as permitted by&nbsp;
	           //                                                                                         <br style="display: none; font-family: proxima-nova, Roboto, Helvetica, Arial, sans-serif !important;" />
	           //                                                                                         gsm2go is strictly prohibited, and any such use may result in legal proceedings.
	           //                                                                                     </td>
	           //                                                                                 </tr>
	           //                                                                             </tbody>
	           //                                                                         </table>
	           //                                                                     </td>
	           //                                                                 </tr>
	           //                                                             </tbody>
	           //                                                         </table>
	           //                                                     </center>
	           //                                                 </td>
	           //                                             </tr>
	           //                                         </tbody>
	           //                                     </table>
	           //                                 </center>
	           //                             </td>
	           //                         </tr>
	           //                     </tbody>
	           //                 </table>
	           //             </div>';
            $message = '<table align="center" cellspacing="0" cellpadding="0" style="width: 540px; margin: 0px auto; font-family: Helvetica; letter-spacing: normal; text-indent: 0px; text-transform: none; word-spacing: 0px; text-decoration: none;">
                    <tbody>
                        <tr>
                            <td>
                                <table cellspacing="0" cellpadding="0" style="width: 500px; margin: 0px 20px;">
                                    <tbody>
                                        <tr>
                                            <td style="border-bottom-width: 1px; border-bottom-style: solid; border-bottom-color: rgb(234, 234, 234); padding: 10px 0px 0px 0px;">
                                                <table cellspacing="0" cellpadding="0">
                                                    <tbody>
                                                        <tr>
                                                            <td width="250">
                                                                <img src="'.$logourl.'"
                                                                    style="border: 0px; margin: 0px; height: 40px;" />
                                                            </td>
                                                            <td width="250" valign="top" align="right"><div style="margin: 0px; font-size: 20px; font-family: arial, sans-serif;">Password Update</div></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="padding-left: 8px; padding-top: 9px; padding-bottom: 9px;">
                                                <div style="margin: 0px; font-size: 18px; font-family: arial, sans-serif;">Your password is reset successfully.</div>
                                                <div style="margin: 0px;font-size: 22px;font-family: arial,sans-serif;font-weight: bold;padding-top: 18px;"></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="padding-left: 0px; padding-top: 9px; padding-bottom: 9px;text-align:center">
                                                <div style="margin: 0px; font-size: 18px; font-family: arial, sans-serif;">
                                                    <a align="center" href="https://esim.gsm2go.com/"
                                                    style="font-size: 18px;padding: 7px 25px;background-color: rgb(4, 59, 189);border-radius: 6px;color: rgb(255, 255, 255);display: inline-block;font-weight: 500;text-align: left;
                                                        text-decoration: none;font-family: proxima-nova, Roboto, Helvetica, Arial, sans-serif !important;" target="_blank">Go to gsm2go</a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="padding-left: 8px; padding-bottom: 30px;">
                                                <div style="margin: 0px; font-size: 18px; font-family: arial, sans-serif;">Thank you!</div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>';
	            $fromEmail = 'esim@mysimaccess.com';
	    		$fromName = "eSIM Support";
	    		$subject = "gsm2go | Your password was successfully reset";
	    		$cc = '';
	    		$attachments = '';
	    		$mailer=new Email();
	            $mailSent = $mailer->Mailer($email,$subject, $message,$cc,$attachments,$fromEmail,$fromName);
	            if($mailSent)
	            {
	                $_SESSION['userId'] = $row1['id'];
            		$_SESSION['user']  = $row1['email'];
            		$_SESSION['fname'] = $row1['fname'];
            		$_SESSION['name'] = $row1['fname'].' '.$row1['lname'];
            		$_SESSION['role'] = $row1['role'];
    		
	                $url = "https://esim.gsm2go.com/index.php#eSim";
	                echo '<script>$("#update-password").attr("disabled", "disabled")</script>';
					echo "<script>alert('Password Updated Successfully')</script>";
					echo "<script>$('#passwordform')[0].reset()</script>";
					echo "<script>window.location.href = '".$url."';</script>";
				}
			}
		}
	}
	else
	{
		echo "<script>alert('your code has expired')</script>";
	}
}
?>
