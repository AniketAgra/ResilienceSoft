<?php 	
include("../../../includes/config.php");
if(!empty($_POST['id']) AND !empty($_POST['title']) AND !empty($_POST['desc']) AND !empty($_POST['status']) AND !empty($_POST['lang']))
{
    $id 	= mysqli_real_escape_string($con, $_POST['id']);
    $name   = mysqli_real_escape_string($con, $_POST['title']);
    $desc   = mysqli_real_escape_string($con, $_POST['desc']);
    $status = mysqli_real_escape_string($con, $_POST['status']);
	$lang = mysqli_real_escape_string($con, $_POST['lang']);
	
	$q="update faq set title='$name', content='$desc', status='$status',lang='$lang' WHERE id='$id'";
	echo "Query :".$q;
    $result = mysqli_query($con, $q);
}
?>