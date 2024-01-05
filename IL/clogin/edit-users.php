<?php
session_start();
if(isset($_SESSION['user'],$_SESSION['type']) AND ($_SESSION['type']=='Admin' || $_SESSION['type']=='Dealer'))
{
    include("includes/config.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>UniSIM | Edit Users</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="shortcut icon" href="assets/images/favicon.ico">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" id="bootstrap-stylesheet" />
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css"  id="app-stylesheet" />
    <style>
         .nav-tabs .nav-link.active{ background: #FE6271;color:#fff;border-radius:30px !important; }
         .form-wizard-header, .nav-tabs .nav-link{ border-radius:30px !important; }
    </style>
</head>
<body>
<?php
if(isset($_POST['update-support']))
{
    $name  = $_POST['name'];
    $phone = $_POST['phone'];
    $pass  = $_POST['password'];
    if(empty($pass))
    {
        $add_user = mysqli_query($con,"update users set name='$name',phone='$phone' where id='".$_GET['id']."' AND type='User' ");
    } else{
        $add_user = mysqli_query($con,"update users set name='$name',phone='$phone',password='$pass' where id='".$_GET['id']."' AND type='User' ");
    }
    if($add_user)
    {
        echo "<script>alert('User Successully Updated')</script>";
    }  
}
?>
<!-- Begin page -->
<div id="wrapper">

    
    <?php include("includes/header.php"); ?>
    <?php include("includes/sidebar.php"); ?>

    <!-- Start Page Content here -->
    <div class="content-page">
        <div class="content">
            
            <!-- Start Content-->
            <div class="container-fluid">

                <div class="row">
                    <div class="col-12">
                        <div class="card  mt-3">
                            <div class="card-body">
                                <h4 class="header-title mb-4"> Edit Users</h4>

                                    <div id="basicwizard">
                                        <div class="row">
                                            <div class="col-md-4 mx-auto">
                                                <ul class="nav nav-tabs nav-justified form-wizard-header">
                                                    <?php if($_SESSION['type']=='Admin'){ ?>
                                                        <?php if($_GET['type']=='Admin'){ ?>
                                                        <li class="nav-item">
                                                            <a href="#basictab1" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2"> 
                                                                <i class="mdi mdi-plus mr-1"></i>
                                                                <span class="d-none d-sm-inline">Admin User</span>
                                                            </a>
                                                        </li>
                                                    <?php } } if($_GET['type']=='User'){ ?>
                                                        <li class="nav-item">
                                                            <a href="#basictab2" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                                                <i class="mdi mdi-plus mr-1"></i>
                                                                <span class="d-none d-sm-inline">Dealer User</span>
                                                            </a>
                                                        </li>
                                                    <?php } ?>
                                                </ul>
                                            </div>
                                        </div>
                                        

                                        <div class="tab-content b-0 mb-0">
                                            <div class="tab-pane px-3" id="basictab1">
                                                <form method="post">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="form-label" for="userName">Name</label>
                                                                <input type="text" class="form-control" id="name" name="name" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="form-label" for="phone">Phone</label>
                                                                <input type="text" id="phone" name="phone" class="form-control" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="form-label" for="email"> Email</label>
                                                                <input type="email" id="email" name="email" class="form-control" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="form-label" for="password">Password</label>
                                                                <input type="text" id="password" name="password" class="form-control" required>
                                                            </div>
                                                        </div>
                                                    </div> 
                                                    <div class="row">
                                                        <div class="col-md-2 mx-auto">
                                                            <button type="submit" name="add-admin" class="btn btn-primary btn-block">Submit</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>

                                            <div class="tab-pane px-3" id="basictab2">
                                                <form method="post">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="form-label" for="dealer">Dealer</label>
                                                                <select class="form-control" id="dealer" name="dealer">
                                                                    <option>Select Company</option>
                                                                    <?php
                                                                    $select_dealer = mysqli_query($con,"select * from users where type='Dealer'");
                                                                    while($row = mysqli_fetch_assoc($select_dealer)){
                                                                    ?>
                                                                    <option value="<?php echo $row['id']; ?>"><?php echo $row['dealer']; ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="form-label" for="userName">Name</label>
                                                                <input type="text" class="form-control" id="name" name="name" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="form-label" for="phone">Phone</label>
                                                                <input type="text" id="phone" name="phone" class="form-control" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="form-label" for="email"> Email</label>
                                                                <input type="email" id="email" name="email" class="form-control" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="form-label" for="password">Password</label>
                                                                <input type="text" id="password" name="password" class="form-control" required>
                                                            </div>
                                                        </div>
                                                    </div> 
                                                    <div class="row">
                                                        <div class="col-md-2 mx-auto">
                                                            <button type="submit" name="add-user" class="btn btn-primary btn-block">Submit</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            
                                            <?php
                                            $select = mysqli_query($con, "select * from users where id='".$_GET['id']."'");
                                            $row = mysqli_fetch_assoc($select);
                                            ?>
                                            <div class="tab-pane px-3" id="basictab3">
                                                <form method="post">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="form-label" for="supportname">Name</label>
                                                                <input type="text" class="form-control" id="supportname" name="name" value="<?php echo $row['name']; ?>" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="form-label" for="phone">Phone</label>
                                                                <input type="text" id="phone" name="phone" class="form-control" value="<?php echo $row['phone']; ?>" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="form-label" for="supportemail"> Email</label>
                                                                <input type="email" id="supportemail" name="email" value="<?php echo $row['email']; ?>" class="form-control" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="form-label" for="supportpassword">Password</label>
                                                                <input type="text" id="supportpassword" name="password" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div> 
                                                    <div class="row">
                                                        <div class="col-md-2 mx-auto">
                                                            <button type="submit" name="update-support" class="btn btn-primary btn-block">Submit</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>

                                        </div> 
                                        <!-- tab-content -->
                                    </div> 

                            </div> <!-- end card-body -->
                        </div> <!-- end card-->
                    </div> 
                    <!-- end col -->

                </div> 
                <!-- end row -->

                
            </div> <!-- end container-fluid -->

        </div> <!-- end content -->

        

 

    </div>


</div>
<!-- END wrapper -->


<!-- Vendor js -->
<script src="assets/js/vendor.min.js"></script>
<script src="assets/libs/twitter-bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>
<script src="assets/js/pages/form-wizard.init.js"></script>
<script src="assets/js/app.min.js"></script>
</body>
</html>
<?php } else{ header("location:index.php"); } ?>