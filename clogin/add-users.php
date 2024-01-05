<?php
session_start();
if(isset($_SESSION['user'],$_SESSION['type']) AND ($_SESSION['type']=='Admin' || $_SESSION['type']=='Dealer'  || $_SESSION['type']=='User'))
{
    include("includes/config.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>UniSIM | Add Users</title>
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
                                <h4 class="header-title mb-4"> Add Users</h4>

                                    <div id="basicwizard">
                                        <div class="row">
                                            <div class="col-md-4 mx-auto">
                                                <ul class="nav nav-tabs nav-justified form-wizard-header">
                                                    <?php if($_SESSION['type']=='Admin'){ ?>
                                                    <li class="nav-item">
                                                        <a href="#basictab1" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2"> 
                                                            <i class="mdi mdi-plus mr-1"></i>
                                                            <span class="d-none d-sm-inline">Admin User</span>
                                                        </a>
                                                    </li>
                                                    <?php } ?>
                                                    <li class="nav-item">
                                                        <a href="#basictab2" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                                            <i class="mdi mdi-plus mr-1"></i>
                                                            <span class="d-none d-sm-inline"><?php if($_SESSION['type']=='Admin'){ echo "Dealer"; } else{ echo "Support"; } ?> User</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        

                                        <div class="tab-content b-0 mb-0">
                                            <div class="tab-pane px-3" id="basictab1">
                                                <form method="post" id="admin-form">
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
                                                            <button type="button" name="add-admin" id="add-admin" class="btn btn-primary btn-block">Submit</button>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12 text-center pt-2 font-weight-bold" id="error"></div>
                                                    </div>
                                                </form>
                                            </div>

                                            <div class="tab-pane px-3" id="basictab2">
                                                <form method="post" id="user-form">
                                                    <div class="row">
                                                        <?php if($_SESSION['type']=="Admin"){ ?>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="form-label" for="dealer">Dealer</label>
                                                                <select class="form-control" id="dealer" name="dealer">
                                                                    <option value="">Select Company</option>
                                                                    <?php
                                                                    $select_dealer = mysqli_query($con,"select * from users where type='Dealer'");
                                                                    while($row = mysqli_fetch_assoc($select_dealer)){
                                                                    ?>
                                                                    <option value="<?php echo $row['id']; ?>"><?php echo $row['dealer']; ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <?php } else{ ?>
                                                        <input type="hidden" class="form-control" id="dealer" name="dealer" value="
                                                        <?php 
                                                        if($_SESSION['type']=="Dealer"){ echo $_SESSION['userId']; }
                                                        if($_SESSION['type']=="User"){ echo $_SESSION['dealerId']; }
                                                        ?>" required>
                                                        <?php } ?>
                                                        
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="form-label" for="userName">Name</label>
                                                                <input type="text" class="form-control" id="name1" name="name1" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="form-label" for="phone">Phone</label>
                                                                <input type="text" id="phone1" name="phone1" class="form-control" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="form-label" for="email"> Email</label>
                                                                <input type="email" id="email1" name="email1" class="form-control" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="form-label" for="password">Password</label>
                                                                <input type="text" id="password1" name="password1" class="form-control" required>
                                                            </div>
                                                        </div>
                                                    </div> 
                                                    <div class="row">
                                                        <div class="col-md-2 mx-auto">
                                                            <button type="button" name="add-user" id="add-user" class="btn btn-primary btn-block">Submit</button>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12 text-center pt-2 font-weight-bold" id="error1"></div>
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
<script type="text/javascript">
$("#add-admin").click(function(){

    var name  = $("#name").val();
    var phone = $("#phone").val();
    var email = $("#email").val();
    var pass  = $("#password").val();
    var type  = 'Admin';

    if ( name.length < 1 ) 
    {
        $("#error").html('<span class="text-primary">Please Enter Name</span>'); 
    } 
    else if ( email.length < 10 ) 
    {
        $("#error").html('<span class="text-primary">Please Enter Email Address</span>'); 
    } 
    else if ( pass.length < 1 ) 
    {
        $("#error").html('<span class="text-primary">Please Enter Password</span>'); 
    } 
    else if ( pass.length < 5 ) 
    {
        $("#error").html('<span class="text-primary">Password Must be Minimum 5 Letter</span>'); 
    } 
    else 
    {
        $.ajax({
            url: "ajax/add-users.php",
            type: "POST",
            data: { name:name,phone:phone,email:email,pass:pass,type:type },
            success:function(data,status)
            {
                $("#error").html(data);
            }
        });
    }
});

$("#add-user").click(function(){
    
    var dealer = $("#dealer").val();
    var name   = $("#name1").val();
    var phone  = $("#phone1").val();
    var email  = $("#email1").val();
    var pass   = $("#password1").val();
    var type   = 'User';

    if ( dealer.length == 0 ) 
    {
        $("#error1").html('<span class="text-primary">Please Select Dealer</span>'); 
    } 
    else if ( name.length < 1 ) 
    {
        $("#error1").html('<span class="text-primary">Please Enter Name</span>'); 
    } 
    else if ( email.length < 10 ) 
    {
        $("#error1").html('<span class="text-primary">Please Enter Email Address</span>'); 
    } 
    else if ( pass.length < 1 ) 
    {
        $("#error1").html('<span class="text-primary">Please Enter Password</span>'); 
    }
    else if ( pass.length < 5 ) 
    {
        $("#error1").html('<span class="text-primary">Password Must be Minimum 5 Letter</span>'); 
    } 
    else 
    {
        $.ajax({
            url: "ajax/add-users.php",
            type: "POST",
            data: { dealer:dealer,name:name,phone:phone,email:email,pass:pass,type:type },
            success:function(data,status)
            {
                $("#error1").html(data);
            }
        });
    }
});
</script>
</body>
</html>
<?php } else{ header("location:index.php"); } ?>