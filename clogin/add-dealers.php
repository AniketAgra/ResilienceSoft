<?php
session_start();
if(isset($_SESSION['user'],$_SESSION['type']) AND ($_SESSION['type']=='Admin'))
{
    include("includes/config.php");
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
                            <div class="card-header bg-white"><h4 class="page-title">Create Dealer</h4></div>
                            <div class="card-body">
                                <form method="post" enctype="multipart/form-data" id="dealer-form">
                					<div class="box-body">
                					    <div class="row">
                                            <div class="col-md-4">
                								<div class="form-group">
                    								<label class="form-label">Company Name</label>
                    								<input class="form-control" type="text" name="dealer" id="dealer" required>
                								</div>
                							</div>
                							<div class="col-md-4">
                								<div class="form-group">
                    								<label class="form-label">Contact Name</label>
                    								<input class="form-control" type="text" name="name" id="name" required>
                								</div>
                							</div>
                							<div class="col-md-4">
                								<div class="form-group">
                    								<label class="form-label">Email</label>
                    								<input class="form-control" type="email" name="email" id="email" required>
                								</div>
                							</div>
                							<div class="col-md-4">
                								<div class="form-group">
                    								<label class="form-label">Phone</label>
                    								<input class="form-control" type="text" name="phone" id="phone" required>
                								</div>
                							</div>
                							<div class="col-md-4">
                								<div class="form-group">
                    								<label class="form-label">Logo</label>
                    								<input class="form-control" type="file" name="logo" id="logo" required>
                								</div>
                							</div>
                							<div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label">Password</label>
                                                    <input type="text" id="pass" name="pass" class="form-control" required>
                                                </div>
                                            </div>
                						</div>
                						<div class="row">
                							<div class="col-md-4 mx-auto text-center">
                								<input type="button" class="btn btn-primary px-5" id="add-dealer" value="Submit" name="submit"/>
                							</div>
                							<div class="col-md-12">
                							    <div class="form-group text-center pt-2 mb-0"><b id="error"></b></div>
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
<script type="text/javascript">
$('#add-dealer').click(function() {
	var formData = new FormData($("#dealer-form")[0]);
   	$.ajax({
      	url: "ajax/add-dealers.php",
      	type: "POST",
      	data: formData,
      	cache: false,
      	processData:false,
      	contentType:false,
      	success:function(data, status){
         	$("#error").html(data);
      	}
   	});
});
</script>
</body>
</html>
<?php } else{ header("location:index.php"); } ?>