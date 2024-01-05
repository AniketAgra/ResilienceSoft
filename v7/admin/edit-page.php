<?php 
session_start();
if(isset($_SESSION['user']))
{
   include("include/config.php");
?>
<?php
$select = mysqli_query($con, "Select * from pages where id='".$_GET['edit']."'");
$row = mysqli_fetch_array($select);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
	<link rel="icon" href="../images/logo.jpg" type="image/x-icon"/>
	<title><?php echo $row['title']; ?></title>
	<link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css"/>
	<link rel="stylesheet" href="assets/plugins/web-fonts/icons.css"/>
	<link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="assets/plugins/web-fonts/font-awesome/font-awesome.min.css">
	<link rel="stylesheet" href="assets/plugins/web-fonts/plugin.css"/>
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/skins.css">
	<link rel="stylesheet" href="assets/plugins/upload/image-uploader.min.css">
	<link rel="stylesheet" href="assets/plugins/summernote/summernote-bs4.css">
	<link rel="stylesheet" href="assets/css/dark-style.css">
	<link rel="stylesheet" href="assets/css/colors/default.css">
	<link rel="stylesheet" href="assets/css/colors/color.css">
	<link rel="stylesheet" href="assets/plugins/fileuploads/css/fileupload.css"/>
	<link rel="stylesheet" href="assets/css/sidemenu/sidemenu.css">
</head>
<body class="main-body leftmenu">
<?php
if(isset($_POST['update']))
{
    $id    = $_POST['id'];
    $title = $_POST['title'];
    $desc  = $_POST['desc'];
    
    $img_name = $_FILES['image']['name'];
    $img_temp = $_FILES['image']['tmp_name'];
    $path = "../assets/images/banner/"; 
    
    if(empty($title)) {
    	echo "<script>alert('Enter Page Title')</script>";
    }
    elseif(empty($desc)) {
    	echo "<script>alert('Enter Page Description')</script>";
    }
    else{
        if($id == 3)
        {
            $img1_name = $_FILES['content_img']['name'];
            $img1_temp = $_FILES['content_img']['tmp_name'];
            $path1 = "../assets/images/upload/";
        
            if(empty($img_name))
            {
                if(empty($img1_name))
                {
                    $update = mysqli_query($con, "update pages set title='$title', content='$desc' where id='3'");
                    if($update)
                    {
                        echo "<script>alert('Page Updated Successfully')</script>";
                        echo '<script>window.location="pages.php"</script>';
                    }
                }
                else
                {
                    move_uploaded_file($img1_temp, "$path1/$img1_name");
                    $update = mysqli_query($con, "update pages set title='$title', content_img='$img1_name', content='$desc' where id='3'");
                    if($update)
                    {
                        echo "<script>alert('Page Updated Successfully')</script>";
                        echo '<script>window.location="pages.php"</script>';
                    }
                }
            }
            else
            {
                if(empty($img1_name))
                {
                    move_uploaded_file($img_temp, "$path/$img_name");
                    $update = mysqli_query($con, "update pages set title='$title', image='$img_name', content='$desc' where id='3'");
                    if($update)
                    {
                        echo "<script>alert('Page Updated Successfully')</script>";
                        echo '<script>window.location="pages.php"</script>';
                    }
                }
                else
                {
                    move_uploaded_file($img_temp, "$path/$img_name");
                    move_uploaded_file($img1_temp, "$path1/$img1_name");
                
                    $update = mysqli_query($con, "update pages set title='$title', image='$img_name', content_img='$img1_name', content='$desc' where id='3'");
                    if($update)
                    {
                        echo "<script>alert('Updated Successfully')</script>";
                        echo '<script>window.location="pages.php"</script>';
                    }
                }
            }
        } 
        else
        {
            if(empty($img_name))
            {
                $update = mysqli_query($con, "update pages set title='$title', content='$desc' where id='$id'");
                if($update)
                {
                    echo "<script>alert('Page Updated Successfully')</script>";
                    echo '<script>window.location="pages.php"</script>';
                }
            }
            else
            {
                move_uploaded_file($img_temp, "$path/$img_name");
            
                $update = mysqli_query($con, "update pages set title='$title', image='$img_name', content='$desc' where id='$id'");
                if($update)
                {
                    echo "<script>alert('Updated Successfully')</script>";
                    echo '<script>window.location="pages.php"</script>';
                }
            }
        } 
    }
}
?>

<!-- Loader -->
<div id="global-loader">
	<img src="assets/img/loader.svg" class="loader-img" alt="Loader">
</div>
<!-- End Loader -->

<!-- Page -->
<div class="page">

	<?php include("include/sidebar.php"); ?>
	<?php include("include/header.php"); ?>

	<!-- Main Content-->
	<div class="main-content side-content pt-0">

		<div class="container-fluid">
			<div class="inner-body">

				<!-- Page Header -->
				<div class="page-header my-1">
					<div>
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="dashboard.php"><i class="fa fa-home"></i></a></li>
							<li class="breadcrumb-item"><a href="pages.php">Pages</a></li>
							<li class="breadcrumb-item active" aria-current="page"><?php echo $row['title']; ?></li>
						</ol>
					</div>
				</div>
				<!-- End Page Header -->

				<!-- Row -->
				<div class="row row-sm">
					<div class="col-lg-12">
						<div class="card custom-card">
							<div class="card-header"><h5 class="card-title" id="exampleModalLabel"><?php echo $row['title']; ?></h5></div>
                            <div class="card-body">
                                <form method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-12">
                                           <div class="form-group">
                                              <input type="hidden" class="form-control" name="id" value="<?php echo $row['id']; ?>">
                                              <input type="text" class="form-control" name="title" value="<?php echo $row['title']; ?>" placeholder="Enter Title" required>
                                           </div>
                                        </div>
                                        <?php if($_GET['edit']=='3'){ ?>
                                        <div class="col-md-8">
                                           <div class="form-group">
        										<label class="font-weight-bold">Image</label>
        										<input type="file" class="dropify" data-default-file="../assets/images/banner/<?php echo $row['image']; ?>" name="image" data-height="150"/>
        									</div>
        								</div>
        								<div class="col-md-4">
                                           <div class="form-group">
        										<label class="font-weight-bold">Content Image</label>
        										<input type="file" class="dropify" data-default-file="../assets/images/upload/<?php echo $row['content_img']; ?>" name="content_img" data-height="150"/>
        									</div>
        								</div>
                                        <?php } else{ ?>
                                        <div class="col-md-12">
                                           <div class="form-group">
        										<label class="font-weight-bold">Image</label>
        										<input type="file" class="dropify" data-default-file="../assets/images/banner/<?php echo $row['image']; ?>" name="image" data-height="150" />
        									</div>
        								</div>
        								<?php } ?>
                                        <div class="col-md-12">
                                           <div class="form-group">
                                              <textarea name="desc" id="desc"><?php echo $row['content']; ?></textarea>
                                           </div>
                                        </div>
                                        <div class="col-md-12">
                                           <div class="form-group">
                                                <button type="submit" class="btn btn-block btn-primary" name="update">Update</button>
                                           </div>
                                        </div>
                                    </div>
                                </form>
                                <?php
                                if(isset($_POST['update']))
                                {
                                    $id = $_POST['id'];
                                    $title = $_POST['title'];
                                    $desc = $_POST['desc'];
                                    
                                    $update = mysqli_query($con, "update pages set title='$title', content='$desc' where id='$id'");
                                    if($update)
                                    {
                                        echo "<script>alert('Updated Successfully')</script>";
                                        echo '<script>window.location="tnc.php"</script>';
                                    }
                                }
                                ?>
						    </div>
					   </div>
                    </div>
				</div>
				<!-- End Row -->
			</div>
		</div>
	</div>
	<!-- End Main Content-->

	<?php include("include/footer.php"); ?>
</div>
<!-- End Page -->





<!-- Back-to-top -->
<a href="#top" id="back-to-top"><i class="fe fe-arrow-up"></i></a>

<!-- Jquery js-->
<script src="assets/plugins/jquery/jquery.min.js"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/plugins/fileuploads/js/fileupload.js"></script>
<script src="assets/plugins/fileuploads/js/file-upload.js"></script>
<script src="assets/plugins/upload/image-uploader.min.js"></script>
<script src="assets/plugins/summernote/summernote-bs4.js"></script>
<script src="assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="assets/plugins/sidemenu/sidemenu.js"></script>
<script src="assets/plugins/sidebar/sidebar.js"></script>
<script src="assets/js/sticky.js"></script>
<script src="assets/js/custom.js"></script>
<script type="text/javascript">
$(document).ready(function() {
   $('#desc').summernote({
      tabsize: 2,
      height: 300
   });
});
</script>
</body>
</html>
<?php } else{ include("index.php"); } ?>