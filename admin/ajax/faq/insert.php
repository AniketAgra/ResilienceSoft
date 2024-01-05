<?php 
include("../../../includes/config.php");
if(!empty($_POST['title']) AND !empty($_POST['desc']) AND !empty($_POST['status']) AND !empty($_POST['lang']))
{
   	$title  = mysqli_real_escape_string($con, $_POST['title']);
   	$desc   = mysqli_real_escape_string($con, $_POST['desc']);
   	$status = mysqli_real_escape_string($con, $_POST['status']);
	$lang= mysqli_real_escape_string($con, $_POST['lang']);
	$q="INSERT INTO faq (title,content,status,lang) VALUES ('$title','$desc','$status','$lang')";
   	$insert = mysqli_query($con, $q);
}
?>