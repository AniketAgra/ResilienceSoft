<?php
ini_set('session.gc_maxlifetime', strtotime("+1 day") - time());
session_set_cookie_params(strtotime("+1 day") - time());
session_start();
if(isset($_SESSION['user'],$_SESSION['type']) AND ($_SESSION['type']=='Admin'))
{
    include("includes/config.php");

if(!empty($_GET['brandid']))
{
    $id = $_GET['brandid'];
    $select = mysqli_query($con,"SELECT * FROM brands where id='$id'");
    $row    = mysqli_fetch_assoc($select);
} else {
    header("location:brands.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>UniSIM | Edit Brands</title>
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
                                        <h4 class="page-title">Edit Brand</h4>
                                    </div>
                                    <div class="col-md-4">
                                        <form method="post" id="brand-form">
                							<div class="box-body">
                								<div class="form-group">
                    								<label>Brand Name</label>
                    								<input class="form-control" type="hidden" name="brandid" value="<?php echo $row['id']; ?>" id="brandid" required>
                    								<input class="form-control" type="text" name="name" value="<?php echo isset($row['brandName']) ? $row['brandName'] : '' ?>" id="name" required>
                								</div>
                								<div class="form-group">
                    								<label>Select Vendor</label>
                    								<select class="form-control" name="vendor" id="vendor" required>
                    								    <option value="">Select Vendor</option>
                    								    <?php
                    								    $select = mysqli_query($con, "select* from vendors where status='Active'");
                    								    while($row1 = mysqli_fetch_assoc($select)){
                    								    ?>
                    								    <option value="<?php echo $row1['id']; ?>"  <?php echo (isset($row) && $row['vendorId']==$row1['id']) ? "selected":'' ?> ><?php echo $row1['vendorName']; ?></option>
                    								    <?php } ?>
                    								</select>
                								</div>
                								<div class="form-group">
                    								<label>Notes</label>
                    								<textarea class="form-control" name="note" id="note" placeholder="Enter Notes" required><?php echo isset($row['notes']) ? $row['notes'] : '' ?></textarea>
                								</div>
                								<div class="form-group">
                    								<label>Select Status</label>
                    								<select class="form-control" name="status" id="status" required>
                    								    <?php if($row['status']=="Active"){ ?>
                    								    <option value="Active" selected>Active</option>
                    								    <option value="Deactive">Deactive</option>
                    								    <?php } else{ ?>
                    								    <option value="Deactive" selected>Deactive</option>
                    								    <option value="Active">Active</option>
                    								    <?php } ?>
                    								</select>
                								</div>
                								<div class="form-group">
                    								<input type="button" id="edit-brand" class="btn btn-primary px-5" value="Submit" name="submit"/>
                								</div>
                							    <div class="form-group text-center"><b id="error"></b></div>
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
<script type="text/javascript">
$("#edit-brand").click(function(){

    
    var brandid = $("#brandid").val();
    var name    = $("#name").val();
    var vendor  = $("#vendor").val();
    var status  = $("#status").val();
    var note    = $("#note").val();
    
    if ( brandid.length < 1 ) 
    {
        $("#error").html('<span class="text-primary">Please Enter Brand Id</span>'); 
    } 
    else if ( name.length < 1 ) 
    {
        $("#error").html('<span class="text-primary">Please Enter Brand Name</span>'); 
    } 
    else if ( vendor.length < 1 ) 
    {
        $("#error").html('<span class="text-primary">Please Select Vendor</span>'); 
    }
    else if ( status.length < 1 ) 
    {
        $("#error").html('<span class="text-primary">Please Select Status</span>'); 
    }
    else 
    {
        $.ajax({
            url: "ajax/edit-brands.php",
            type: "POST",
            data: { brandid:brandid,name:name,vendor:vendor,status:status,note:note },
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