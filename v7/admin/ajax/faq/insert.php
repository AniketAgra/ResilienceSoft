<?php 
include("../../../includes/config.php");
if(!empty($_POST['title']) AND !empty($_POST['desc']) AND !empty($_POST['status']))
{
   	$title  = mysqli_real_escape_string($con, $_POST['title']);
   	$desc   = mysqli_real_escape_string($con, $_POST['desc']);
   	$status = mysqli_real_escape_string($con, $_POST['status']);
   	$insert = mysqli_query($con, "insert into faq (title,content,status) values ('$title','$desc','$status')");
}
?>