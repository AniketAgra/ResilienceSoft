<?php
session_start();
if(isset($_SESSION['user'],$_SESSION['role']) AND ($_SESSION['role']=='A'))
{
    include("../includes/config.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>gsm2go | Add Distributor</title>
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
                                <div class="row">
                                    <div class="col-md-12">
                                        <h4 class="page-title">Add Distributor</h4>
                                    </div>
                                    <div class="col-md-4">
                                        <form method="post" id="activation-form">
                							<div class="box-body">
                							    <div class="form-group">
                    								<label>Distributor Name</label>
                    								<input class="form-control" type="text" name="distributor" id="distributor">
                								</div>
                								<div class="form-group">
                    								<label>Distributor Moniker</label>
                    								<input class="form-control" type="text" name="moniker" id="moniker">
                								</div>
                								<div class="form-group">
                    								<label>Customer Group</label>
                    								<input class="form-control" type="text" name="cust-group" id="cust-group">
                								</div>
                								<div class="form-group">
                    								<label>Customer Group Moniker</label>
                    								<input class="form-control" type="text" name="group-moniker" id="group-moniker">
                								</div>
                							    <div class="form-group">
                								    <label>Status</label>
                									<select name="status" id="status" class="form-control">
                										<option value="">Select Status</option>
                										<option value="Active">Active</option>
                										<option value="Deactive">Deactive</option>
                									</select> 
                								</div>
                								<div class="form-group text-center">
                								    <button type="button" id="add-distributor" class="btn btn-primary px-5" name="submit"/>Submit</button>
                    							</div>
                    							<div class="form-group text-center"><span id="error"></span></div>
                							</div>
                						</form>
                                    </div>
                                </div>
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

<link href="https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet">  
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>  
<script src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>  
<script type="text/javascript">
$(function(){
    $("#moniker").on('input', function (e) {
        $(this).val($(this).val().replace(/[^0-9]/g, ''));
    });
});
$(function(){
    $("#group-moniker").on('input', function (e) {
        $(this).val($(this).val().replace(/[^0-9]/g, ''));
    });
});

$("#add-distributor").click(function(){
    
    var dist       = $("#distributor").val();
    var moniker    = $("#moniker").val();
    var custgroup  = $("#cust-group").val();
    var grpmoniker = $("#group-moniker").val();
    var status     = $("#status").val();

    if ( brand.length < 1 ) 
    {
        $("#error").html('<span class="text-primary">Please Enter Distributor Name</span>'); 
    } 
    else if( plan.length < 1 ) 
    {
        $("#error").html('<span class="text-primary">Please Select Plan</span>'); 
    } 
    else if( retail.length < 1 ) 
    {
        $("#error").html('<span class="text-primary">Please Select Plan</span>'); 
    }
    else if( rate.length < 1 ) 
    {
        $("#error").html('<span class="text-primary">Please Enter Dealer Rate</span>'); 
    }
    else if( qty.length < 1 ) 
    {
        $("#error").html('<span class="text-primary">Please Enter Quantity</span>'); 
    }
    else if( date.length < 1 ) 
    {
        $("#error").html('<span class="text-primary">Please Enter Activation Date</span>'); 
    }
    else 
    {
        $('#add-activation').attr('disabled','disabled');
        $('#add-activation').text('Please Wait');
        $.ajax({
            url: "ajax/add-activation.php",
            type: "POST",
            data: { brand:brand,plan:plan,retail:retail,rate:rate,qty:qty,date:date,note:note },
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