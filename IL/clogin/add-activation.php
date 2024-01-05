<?php
session_start();
if(isset($_SESSION['user'],$_SESSION['type']) AND ($_SESSION['type']=='Dealer' || $_SESSION['type']=='User'))
{
    include("includes/config.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>UniSIM | Add Activation</title>
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
                                        <h4 class="page-title">Add Activation</h4>
                                    </div>
                                    <div class="col-md-4">
                                        <form method="post" id="activation-form">
                							<div class="box-body">
                							    <div class="form-group">
                								    <label>Select Brand</label>
                									<select name="brands" id="brands" class="form-control">
                										<option value="">Select Brand</option>
                										<?php
                										$select = mysqli_query($con, "select id,brandName from brands where status='Active'");
                										while($row1 = mysqli_fetch_assoc($select)){
                										?>
                										<option value="<?php echo $row1['id']; ?>"><?php echo $row1['brandName']; ?></option>
                										<?php } ?>
                									</select> 
                								</div>
                								<div class="form-group">
                                                    <label for="plan">Plan</label>
                            						<select class="form-control" name="plans" id="plans">		
                            							<option value="">First Select Brand</option>
                            						</select>
                                                </div>
                								<div class="form-group">
                    								<label>Retail Rate</label>
                    								<input class="form-control" type="number" name="retail" id="retail" readonly>
                								</div>
                								<div class="form-group">
                    								<label>Dealer Rate</label>
                    								<input class="form-control" type="number" name="rate" id="rate" readonly>
                								</div>
                								<div class="form-group">
                    								<label>Quantity</label>
                    								<input class="form-control" type="number" name="qty" id="qty" value="1" min="1" max="10"  maxlength="1" required>
                								</div>
                								<div class="form-group">
                    								<label>Activation Date</label>
                    								<input class="form-control" type="text" value="<?php echo date("d-M-Y",strtotime($iccidresult['account_info']['activation_date']. ' +1 days')).' ('.date("D",strtotime($iccidresult['account_info']['activation_date']. ' +1 days').")").')' ?>" name="date" id="date" data-provide="datepicker" readonly>
                								</div>
                								<div class="form-group">
                    								<label>Notes</label>
                    								<textarea class="form-control" type="text" name="note" id="note" required></textarea>
                								</div>
                								<div class="form-group text-center">
                								    <button type="button" id="add-activation" class="btn btn-primary px-5" name="submit"/>Submit</button>
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
      <!-- Javascript -->  
      <script>  
         $(function() {  
            $("#date").datepicker({  
            //   appendText:"(dd MM yy DD)",  
               dateFormat:"dd-M-yy (D)",  
            });  
         });  
      </script>

<script type="text/javascript">
$(document).ready(function(){
    var t = false
    $('#qty').focus(function () {
        var $this = $(this)
        t = setInterval(
        function () {
            if (($this.val() < 1 || $this.val() > 10) && $this.val().length != 0) {
                if ($this.val() < 1) {
                    $this.val(1)
                }
                if ($this.val() > 10) {
                    $this.val(10)
                }
            }
        }, 50)
    })

    $('#qty').blur(function () {
        if (t != false) {
        window.clearInterval(t)
        t = false;
        }
    })
});
$(function(){
  $("input[name='qty']").on('input', function (e) {
    $(this).val($(this).val().replace(/[^0-9]/g, ''));
  });
});

$(document).ready(function() {
    $('#brands').on('change', function() {
        var brand_id = this.value;
        $.ajax({
            url: "ajax/change-brands.php",
            type: "POST",
            data: { brand_id: brand_id },
            cache: false,
            success: function(result){
                $("#plans").html(result); 
            }
        });
    });
    
    $('#plans').on('change', function() {
        var plan_id = this.value;
        $.ajax({
            url: "ajax/retail-rate.php",
            type: "POST",
            data: { plan_id: plan_id },
            dataType:"json",  
            success: function(data){
                $('#retail').val(data.retailRate);
                $('#rate').val(data.dealerRate);
            }
        });
    });
});

$("#add-activation").click(function(){
    
    var brand  = $("#brands").val();
    var plan   = $("#plans").val();
    var retail = $("#retail").val();
    var rate   = $("#rate").val();
    var qty    = $("#qty").val();
    var date   = $("#date").val();
    var note   = $("#note").val();

    if ( brand.length < 1 ) 
    {
        $("#error").html('<span class="text-primary">Please Select Brand</span>'); 
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