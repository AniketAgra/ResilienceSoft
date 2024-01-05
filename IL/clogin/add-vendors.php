<?php
ini_set('session.gc_maxlifetime', "7200");
session_start();
if(isset($_SESSION['user'],$_SESSION['type']) AND ($_SESSION['type']=='Admin'))
{
    include("includes/config.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>UniSIM | Add Vendors</title>
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
                            <div class="card-body">
                                <form method="post" id="vendor-form">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h4 class="page-title">Add Vendors</h4>
                                        </div>
                                        <div class="col-md-4">
            								<div class="form-group">
                								<label>Vendor Name</label>
                								<input class="form-control" type="text" name="vendor" id="vendor" placeholder="Enter Vendor Name" required>
            								</div>
            								<div class="form-group">
                								<label>Notes</label>
                								<textarea class="form-control"  name="note" id="note" placeholder="Enter Notes" required></textarea>
            								</div>
            							    <div class="form-group">
            								    <input type="button" id="add-vendor" class="btn btn-primary px-5" value="Submit" name="submit"/>
            							    </div>
            							    <div class="form-group text-center"><b id="error"></b></div>
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
<script type="text/javascript">
$("#add-vendor").click(function(){

    var vendor    = $("#vendor").val();
    var note     = $("#note").val();
    
    if ( vendor.length < 1 ) 
    {
        $("#error").html('<span class="text-primary">Please Enter Vendor Name</span>'); 
    } 
    else 
    {
        $.ajax({
            url: "ajax/add-vendors.php",
            type: "POST",
            data: { vendor:vendor,note:note },
            success:function(data,status)
            {
                $("#error").html(data);
            }
        });
    }
});
</script>
</body>
</html>
<?php } else{ header("location:index.php"); } ?>