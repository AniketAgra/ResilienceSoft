<?php
session_start();
$id = $_GET['planid'];
if(isset($_SESSION['user'],$_SESSION['type']) AND ($_SESSION['type']=='Admin'))
{
    include("includes/config.php");

if(isset($_GET['planid']) && !empty($_GET['planid'])){
     $select = mysqli_query($con,"SELECT * FROM `plans` where id='$id'");
    $row = mysqli_fetch_array($select);
} else{
    header("location:plans.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>UniSIM | Edit Plans</title>
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
                                        <h4 class="page-title">Edit Plans</h4>
                                    </div>
                                    <div class="col-md-4">
                                        <form method="post" id="plan-form">
                							<div class="box-body">
                							    <div class="form-group">
                    								<label>Plan Name</label>
                    								<input class="form-control" type="text" name="name" id="name" value="<?php echo isset($row['planName']) ? $row['planName'] : '' ?>" required>
                								</div>
                							    <div class="form-group">
                								    <label>Select Brand</label>
                									<select name="brand" id="brand" class="form-control" required>
                										<option value="">Select Brand</option>
                										<?php
                										$select = mysqli_query($con, "select id,brandName from brands where status='Active'");
                										while($row1 = mysqli_fetch_assoc($select)){
                										?>
                										<option value="<?php echo $row1['id']; ?>"  <?php echo (isset($row) && $row['brandId'] ==  $row1['id']) ? "selected" : '' ?> ><?php echo $row1['brandName']; ?></option>
                										<?php } ?>
                									</select>
                								</div>
                								<div class="form-group">
                    								<label>SKU</label>
                    								<input class="form-control" type="text" name="sku" id="sku" value="<?php echo $row['sku']; ?>" required>
                								</div>
                								<div class="form-group">
                    								<label>Retail Rate</label>
                    								<input class="form-control" type="text" name="retail" id="retail" value="<?php echo isset($row['retailRate']) ? $row['retailRate'] : '' ?>"  required>
                								</div>
                								<div class="form-group">
                    								<label>Standard Rate</label> <br />
                    								<input class="form-control" type="stdrate" name="stdrate" id="stdrate" value="<?php echo isset($row['stdRate']) ? $row['stdRate'] : '' ?>"  required>
                								</div>
                								<div class="form-group">
                    								<label>Notes</label> <br />
                    								<textarea class="form-control" type="text" name="note" id="note" required> <?php echo isset($row['notes']) ? $row['notes'] : '' ?> </textarea>
                								</div>
                								<div class="form-group text-center">
                								    <button type="button" id="edit-plan" class="btn btn-primary px-5" name="submit"/>Update</button>
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
$("#edit-plan").click(function(){
    
    var id      = <?php echo $_GET['planid']; ?>;
    var name    = $("#name").val();
    var brand   = $("#brand").val();
    var sku     = $("#sku").val();
    var retail  = $("#retail").val();
    var stdrate = $("#stdrate").val();
    var note    = $("#note").val();
    
    if ( name.length < 1 ) 
    {
        $("#error").html('<span class="text-primary">Please Enter Plan Name</span>'); 
    } 
    else if( brand.length < 1 ) 
    {
        $("#error").html('<span class="text-primary">Please Select Brand</span>'); 
    } 
    else if( sku.length < 1 ) 
    {
        $("#error").html('<span class="text-primary">Please Enter SKU</span>'); 
    } 
    else if( sku.length < 10 ) 
    {
        $("#error").html('<span class="text-primary">Please Enter Valid SKU</span>'); 
    } 
    else if( retail.length < 1 ) 
    {
        $("#error").html('<span class="text-primary">Please Enter Retail Rate</span>'); 
    }
    else if( stdrate.length < 1 ) 
    {
        $("#error").html('<span class="text-primary">Please Enter Standard Rate</span>'); 
    }
    else 
    {
        $.ajax({
            url: "ajax/edit-plans.php",
            type: "POST",
            data: { id:id,name:name,brand:brand,sku:sku,retail:retail,stdrate:stdrate,note:note },
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