<?php 
include("../../include/config.php");

$first_title  = mysqli_real_escape_string($con, $_POST['first-title']);
$second_title = mysqli_real_escape_string($con, $_POST['second-title']);
$box_view     = mysqli_real_escape_string($con, $_POST['box-view']);
$btn_view     = mysqli_real_escape_string($con, $_POST['btn-view']);
$btn_title    = mysqli_real_escape_string($con, $_POST['btn-title']);
$btn_url      = mysqli_real_escape_string($con, $_POST['btn-url']);
$sdesc        = mysqli_real_escape_string($con, $_POST['short-desc']);
$status       = mysqli_real_escape_string($con, $_POST['status']);
$folder       = date("YmdHis");

$img_name = $_FILES['image']['name'];
$img_temp = $_FILES['image']['tmp_name'];

if(empty($img_name)) {
	echo "<script>alert('Select Image')</script>";
}
elseif (empty($status)) {
	echo "<script>alert('Select Status')</script>";
}
else{
	$path = "../../../assets/images/upload/"; 

    if(move_uploaded_file($img_temp, "$path/$img_name"))
    {
        $insert = mysqli_query($con, "insert into sliders (first_title,second_title,image,short_desc,button,btn_title,btn_url,box,status) values
        ('$first_title','$second_title','$img_name','$sdesc','$btn_view','$btn_title','$btn_url','$btn_url','$box_view','$status')");
        if($insert) 
        {
            echo "<script>alert('Slider Added Successfully')</script>";
            echo "<script>window.location.href='sliders.php'</script>";
        }
    }
}
?>