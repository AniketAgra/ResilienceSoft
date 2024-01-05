<?php 
include("../../include/config.php");

$id           = mysqli_real_escape_string($con, $_POST['id']);
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


if (empty($status)) {
	echo "<script>alert('Select Status')</script>";
}
else{
    if(!empty($img_name))
    {
        $path = "../../../assets/images/upload/"; 
        if(move_uploaded_file($img_temp, "$path/$img_name"))
        {
            $update = mysqli_query($con, "update sliders set first_title='$first_title', second_title='$second_title', image='$img_name', short_desc='$sdesc', button='$btn_view', btn_title='$btn_title', btn_url='$btn_url', box='$box_view', status='$status' where id='$id'");
        }
    }
    else
    {
        $update = mysqli_query($con, "update sliders set first_title='$first_title', second_title='$second_title', short_desc='$sdesc', button='$btn_view', btn_title='$btn_title', btn_url='$btn_url', box='$box_view', status='$status' where id='$id'");
    }
    if($update) 
    {
        echo "<script>alert('Slider Update Successfully')</script>";
        echo "<script>window.location.href='sliders.php'</script>";
    }
}
?>