<?php
session_start();
$id = $_GET['id'];
if(isset($_SESSION['user'],$_SESSION['type']) AND ($_SESSION['type']=='Admin'))
{
    include("includes/config.php");

if(isset($_POST['update']))
{
    $name     = $_POST['name'];
    $email    = $_POST['email'];
    $phone    = $_POST['phone'];
    $password = $_POST['password'];
    $dealer   = $_POST['dealer'];
    
    if(!empty($_FILES["logo"]["name"]))
    {
        $temp = explode(".", $_FILES["logo"]["name"]);
        $newfilename = round(microtime(true)).'.'.end($temp);
        move_uploaded_file($_FILES["logo"]["tmp_name"], "assets/images/logos/".$newfilename);
        
        $update = mysqli_query($con,"UPDATE users SET dealer='$dealer',name='$name',phone='$phone',email='$email',password='$password',logo='$newfilename' WHERE id='$id'");
    } else{
        $update = mysqli_query($con,"UPDATE users SET dealer='$dealer',name='$name',phone='$phone',email='$email',password='$password' WHERE id='$id'");
    }
    if($update)
    {
        echo "<script>alert('Dealer Successully Updated')</script>";
    }
}

if(!empty($_GET['id'])){
    $select = mysqli_query($con,"SELECT * FROM `users` where id='$id'");
    $row = mysqli_fetch_array($select);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Sky USA | Add Dealers</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="shortcut icon" href="assets/images/favicon.ico">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" id="bootstrap-stylesheet" />
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css"  id="app-stylesheet" />
    <script>
        var __basePath = "./";
    </script>
    <style>
        .ag-input-field-input{ padding:8px; }
    </style>
</head>
<body>
<!-- Begin page -->
<div id="wrapper">
    
    <?php include("includes/header.php"); ?>
    <?php include("includes/sidebar.php"); ?>
    

    <!-- Start Page Content here -->
    <div class="content-page">
        <div class="content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card mt-3">
                            <div class="card-header bg-white"><h4 class="page-title">Edit Dealer</h4></div>
                            <div class="card-body">
                                <form method="post" enctype="multipart/form-data">
                					<div class="box-body">
                					    <div class="row"> 
                                            <div class="col-md-4">
                								<div class="form-group">
                    								<label class="form-label">Company Name</label>
                    								<input class="form-control" value="<?php echo isset($row['dealer']) ? $row['dealer'] : '' ?>" type="text" name="dealer" id="dealer" required>
                								</div>
                							</div>
                							<div class="col-md-4">
                								<div class="form-group">
                    								<label class="form-label">Contact Name</label>
                    								<input class="form-control" type="text"  value="<?php echo isset($row['name']) ? $row['name'] : '' ?>" name="name" id="name" required>
                								</div>
                							</div>
                							<div class="col-md-4">
                								<div class="form-group">
                    								<label class="form-label">Email</label>
                    								<input class="form-control"  value="<?php echo isset($row['email']) ? $row['email'] : '' ?>" type="email" name="email" id="email" required>
                								</div>
                							</div>
                							<div class="col-md-4">
                								<div class="form-group">
                    								<label class="form-label">Phone</label>
                    								<input class="form-control" type="text"  value="<?php echo isset($row['phone']) ? $row['phone'] : '' ?>" name="phone" id="phone" required>
                								</div>
                							</div>
                							<div class="col-md-4">
                								<div class="form-group">
                    								<label class="form-label">Logo</label>
                    								<input class="form-control" type="file" name="logo" id="logo">
                								</div>
                							</div>
                							<div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label">Password</label>
                                                    <input type="text" id="password" name="password"  value="<?php echo isset($row['password']) ? $row['password'] : '' ?>" class="form-control" required>
                                                </div>
                                            </div>
                						</div>
                						<div class="row">
                							<div class="col-md-4 mx-auto text-center">
                								<input type="submit" class="btn btn-primary px-5" value="Update" name="update"/>
                							</div>
                						</div>
                                    </div>
                				</form>
                            </div>
                        </div>

                    </div>
                </div>
                
            </div>
        </div> 
    
        <?php //include("includes/footer.php"); ?>

    </div>
    <!-- End Page content -->

</div>
<!-- END wrapper -->


<script src="assets/js/vendor.min.js"></script>
<script src="assets/js/app.min.js"></script>
</body>
</html>
<?php } else{ header("location:index.php"); } ?>