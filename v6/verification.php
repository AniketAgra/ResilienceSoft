<?php 
session_start();
include("includes/config.php"); 
if(isset($_POST['userId'],$_SESSION['userId']))
{
    if(isset($_POST['userId']))
    {
        $userid = $_POST['userId'];
    } else{
        $userid = $_SESSION['userId'];
    }
    
    $user_data = mysqli_query($con, "select * from users where id='$userid'");
    $row = mysqli_fetch_assoc($user_data);
    $check_user = mysqli_query($con, "select * from users where id='$userid' AND verifyEmail='YES' AND verifyMobile='YES'");
    if(mysqli_num_rows($check_user)==0)
    {
        if($row['verifyEmail']=="YES")
        {
            $eaverify = "Your email (".$row['email'].") is already verified";
        }
        else
        {
            if(isset($_POST['ecode']))
            {
                $ecode   = $_POST['ecode'];
                $select_user = mysqli_query($con, "select * from users where id='$userid' AND emailCode='$ecode'");
                if(mysqli_num_rows($select_user)==1)
                {
                    $everify = mysqli_query($con, "update users set verifyEmail='Yes' where id='$userid'");
                }
            }
        }
        
        if($row['verifyMobile']=="YES")
        {
            $maverify = "Your mobile (".$row['mobile'].") is already verified";
        }
        else
        {
            if(isset($_POST['mcode']))
            {
                $mcode   = $_POST['mcode'];
                $select_user = mysqli_query($con, "select * from users where id='$userid' AND mobileCode='$mcode'");
                if(mysqli_num_rows($select_user)==1)
                {
                    $mverify = mysqli_query($con, "update users set verifyMobile='Yes' where id='$userid'");
                }
            }
        }
    }
    else
    {
        $_SESSION['userId'] = $row['id'];
        $_SESSION['user']   = $row['email'];
        $_SESSION['fname']  = $row['fname'];
        $_SESSION['name']   = $row['fname'].' '.$row['lname'];
        $_SESSION['role']   = $row['role'];
        
        if(isset($_SESSION['direct'],$_SESSION['esim']))
        {
            echo "<script>window.location.href='checkout.php';</script>";
        }
        else{
            echo "<script>window.location.href='orders.php';</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="assets/favicon.ico">
    <title>gsm2go | Verification</title>
    <link rel="stylesheet" href="node_modules/%40fortawesome/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="node_modules/animate.css/animate.min.css">
    <link rel="stylesheet" href="node_modules/%40fancyapps/fancybox/dist/jquery.fancybox.min.css">
    <link rel="stylesheet" href="node_modules/owl.carousel/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="node_modules/owl.carousel/dist/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="assets/css/style.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;subset=latin-ext" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i,900,900i&amp;subset=latin-ext" rel="stylesheet">
    <style>
        #error-msg{line-height: 10px}
        .active{ color:purple !important;text-decoration:none;}
        .btn-link:hover{ color:#2196f3 !important;text-decoration:underline;}
        .error1,.error2{ font-size:12px; }
        @media only screen and (min-width: 992px){
            .fixed-footer{ position:fixed !important;left:0!important;right:0!important;bottom:0!important;}
        }
    </style>
</head>
<body>
<?php include("includes/header.php"); ?>

<!-- Content -->
<div class="container-fluid">
    <div class="row align-content-between">

        <div class="col-12">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 offset-md-1 col-lg-5 mx-auto">
                        <div class="px-xl-4">
                            <div class="bg-white rounded-ultra shadow-lg px-4 py-3 my-5">
                            
                                <div class="mb-2 text-center">
                                    <img src="assets/images/verification.png" data-width="64px" data-height="64px">
                                </div>

                                <div class="pb-1"></div>

                                <h3 class="section-title-4 text-center font-weight-800 mb-4">
                                    Verification
                                    <div class="title-divider-round"></div>
                                </h3>
                                <form>
                                    <div id="error-msg" class="text-center col-md-12" style="height:20px"></div>
                                    <input type="hidden" value="<?php echo $_SESSION['userId']; ?>" id="userid">
                                    <?php if($everify){ ?>
                                    <div class="input-group input-group-lg input-group-round mb-2">
                                        <label class="px-3">Your email (<?php echo $row['email']; ?>) is now verified</label>
                                    </div>
                                    <?php } elseif($eaverify){ ?>
                                    <div class="input-group input-group-lg input-group-round mb-2">
                                        <label class="px-3"><?php echo $eaverify; ?></label>
                                    </div>
                                    <?php } else{ ?>
                                    <div class="input-group input-group-lg input-group-round mb-2">
                                        <div class="d-flex w-100 justify-content-between">
                                            <label class="px-3 mb-0">Enter 6 digit code sent to <?php echo $row['email']; ?></label>
                                            <button type="button" class="ecode text-capitalize text-reset btn btn-link p-0 mb-0" id="<?php echo $_POST['userId']; ?>">resend?</button>
                                        </div>
                                        <div class="input-group-inner">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text input-group-icon"><i class="far fa-envelope"></i></span>
                                            </div>
                                            <input type="number" class="form-control form-control-lg" oninput="emailLength(this);" id="ecode" placeholder="_ _ _ _ _ _">
                                            <div class="input-focus-bg"></div>
                                        </div>
                                        <span class="error1 px-3 w-100 text-white font-weight-500" style="font-size:12px">Required</span>
                                    </div>
                                    <?php } ?>

                                    <?php if($mverify){ ?>
                                    <div class="input-group input-group-lg input-group-round mb-2">
                                        <label class="px-3">Your mobile (<?php echo $row['mobile']; ?>) is now verified</label>
                                    </div>
                                    <?php } elseif($maverify){ ?>
                                    <div class="input-group input-group-lg input-group-round mb-2">
                                        <label class="px-3"><?php echo $maverify; ?></label>
                                    </div>
                                    <?php } else{ ?>
                                    <div class="input-group input-group-lg input-group-round mb-2">
                                        <div class="d-flex w-100 justify-content-between">
                                            <label class="px-3 mb-0">Enter 4 digit code sent to <?php echo $row['mobile']; ?></label>
                                            <button type="button" class="mcode text-capitalize text-reset btn btn-link p-0  mb-0" id="<?php echo $_POST['userId']; ?>">resend?</button>
                                        </div>
                                        <div class="input-group-inner">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text input-group-icon"><i class="fas fa-mobile-alt"></i></span>
                                            </div>
                                            <input type="number" class="form-control form-control-lg" oninput="mobileLength(this);" id="mcode" placeholder="_ _ _ _">
                                            <div class="input-focus-bg"></div>
                                        </div>
                                        <span class="error2 px-3 w-100 text-white font-weight-500" style="font-size:12px">Required</span>
                                    </div>
                                    <?php } ?>
                                    <div class="px-3">
                                        <?php if( (!isset($everify)) OR (!isset($mverify)) OR (!isset($eaverify)) OR (!isset($maverify)) ){ ?>
                                        <div class="form-group custom-control custom-checkbox mb-0">
                                            <input type="checkbox" class="custom-control-input" id="skip">
                                            <label class="custom-control-label font-weight-600" for="skip">Skip to continue</label>
                                        </div>
                                        <?php } ?>
                                    </div>
                                    <button type="button" id="checkout" class="btn btn-lg btn-round btn-indigo btn-block mb-0 text-capitalize checkout" <?php if((!isset($everify)) OR (!isset($mverify)) OR (!isset($eaverify)) OR (!isset($maverify)) ){ ?>disabled="disabled" <?php } ?> ><i class="fas fa-sign-in-alt"></i>Continue to Checkout</button>
                                    <!--<label class="w-100 text-center py-3 mb-0">-->
                                    <!--    Don't have an account? <a href="signup.php">Signup</a>-->
                                    <!--</label>-->
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<?php include("includes/footer.php"); ?>

<!-- jQuery -->
<script src="assets/js/vendor/jquery-3.5.1.min.js"></script>
<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="components/navik-navigation-menu/dist/js/navik.menu.js"></script>
<script src="node_modules/isotope-layout/dist/isotope.pkgd.min.js"></script>
<script src="node_modules/imagesloaded/imagesloaded.pkgd.min.js"></script>
<script src="node_modules/%40fancyapps/fancybox/dist/jquery.fancybox.min.js"></script>
<script src="node_modules/owl.carousel/dist/owl.carousel.min.js"></script>
<script src="node_modules/jquery-circle-progress/dist/circle-progress.min.js"></script>
<script src="assets/js/custom.js"></script>
<script type="text/javascript">
$( document ).ready(function() {
    $("#ecode").keyup(function(){
        
        var ecode    = $("#ecode").val();
        var userid   = $("#userid").val();

        $(".error1").text("");
        $.ajax({
            url: "ajax/check-emailcode.php",
            type: "POST",
            data: { ecode:ecode,userid:userid },
            success:function(data,status)
            {
                $("#error-msg").html(data);
            }
        });
      
    });
    $("#mcode").keyup(function(){
        
        var mcode    = $("#mcode").val();
        var userid   = $("#userid").val();
        $(".error2").text("");
        
        $.ajax({
            url: "ajax/check-mobilecode.php",
            type: "POST",
            data: { mcode:mcode,userid:userid },
            success:function(data,status)
            {
                $("#error-msg").html(data);
            }
        });
        
    });
    
    $(".ecode").click(function() {
        var val = this.id;
    
        $.ajax({
            url: "ajax/resend-mail.php",
            type: "POST",
            data: { val:val },
            success:function(data,status)
            {
                $("#error-msg").html(data);
            }
        });
    });
    
    $(".mcode").click(function() {
        var val = this.id;
    
        $.ajax({
            url: "ajax/resend-mobile.php",
            type: "POST",
            data: { val:val },
            success:function(data,status)
            {
                $("#error-msg").html(data);
            }
        });
    });
    
});

function mobileLength(elem){
    if (elem.value.length > 4) {
        elem.value = elem.value.slice(0,4); 
    }
}
function emailLength(elem){
    if (elem.value.length > 6) {
        elem.value = elem.value.slice(0,6); 
    }
}

$("#skip").change(function() {
    if ($(this).is(":checked")) {
        var val = $(this).val();
        if($('#skip').is(":checked"))
        {
            $('.checkout').removeAttr("disabled");
        }
    } 
    else {
        $('.checkout').prop('disabled',true);
    }
});


$("#checkout").click(function() {
    var userid = $('#userid').val();
    var ecode  = $('#ecode').val();
    var mcode  = $('#mcode').val();

    $.ajax({
        url: "ajax/verification.php",
        type: "POST",
        data: { userid:userid,ecode:ecode,mcode:mcode },
        success:function(data,status)
        {
            $("#error-msg").html(data);
        }
    });
});

$(document).ready(function () {
    $(function () {
        $('.ecode ').click(function (e) {
            e.preventDefault();
            $('a').removeClass('active');
            $(this).addClass('active');
        });
        $('.mcode ').click(function (e) {
            e.preventDefault();
            $('a').removeClass('active');
            $(this).addClass('active');
        });
    });
});
</script>
</body>
</html>