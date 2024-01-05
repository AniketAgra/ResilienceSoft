<?php 
session_start();
include("includes/config.php"); 
if(isset($_POST['userId']) || isset($_SESSION['userId']))
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
		$_SESSION['user'] = $row['email'];
		$_SESSION['phone'] = $row['mobile'];
		$_SESSION['fname'] = $row['fname'];
		$_SESSION['lname'] = $row['lname'];
		$_SESSION['name'] = $row['fname'].' '.$row['lname'];
		$_SESSION['role'] = $row['role'];
		$_SESSION['userCompany'] = $row['company'];
        
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
    <title>gsm2go eSIM | Verify</title>
    <?php include("includes/logrocket.php"); ?>
    <link rel="stylesheet" href="node_modules/%40fortawesome/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="node_modules/animate.css/animate.min.css">
    <link rel="stylesheet" href="node_modules/%40fancyapps/fancybox/dist/jquery.fancybox.min.css">
    <link rel="stylesheet" href="node_modules/owl.carousel/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="node_modules/owl.carousel/dist/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="assets/css/style.min.test.css">
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
        
        
    
    
.login-box .user-box {
    position: relative;
    display: block !important;
    width: 100%;
}          
.login-box .user-box input {
    width: 100%;
    padding: 12px 12px 12px 14px !important;
    color: #000;
    /*margin-bottom: 30px;*/
    border: none;
    border: 1px solid #939393;
    outline: none;
    background: transparent;
    border-radius: 3px;
    font-size: 1rem;
    line-height: 1;
    padding-left: 0.75em;
    padding-right: 0.75em;
    height:45px;
    font-size: 14px;
    transition: .5s;
}


.login-box .user-box input:hover{border-color:#000;}
      
            
                                               

.login-box .user-box label {
    position: absolute;
    top: -10px;
    left: 12px;
    padding: 2px 3px;
    font-size: 15px;
    color: #939393;
    pointer-events: none;
    transition: .5s;
    background: #fff;
    font-weight: 500;
    margin-bottom: 0; line-height:1;
    
}

.login-box .user-box input:focus ~ label,
/*.login-box .user-box input:valid ~ label*/ {
  top: -13px;
  left:12;
  color: #1266f1;
}

input:focus{border-color:#1266f1 !important; transition: .5s;}
/*input:valid{border-color:#1266f1 !important; transition: .5s;}*/


input:-webkit-autofill,
input:-webkit-autofill:hover,
input:-webkit-autofill:focus {
  -webkit-box-shadow: 0 0 0px 1000px #fff inset !important;
  transition: background-color 5000s ease-in-out 0s;
}
    
    
    .login-box .input-group-inner > .custom-file:focus ~ .input-focus-bg, .login-box .input-group-inner > .custom-select:focus ~ .input-focus-bg, .login-box .input-group-inner > .form-control:focus ~ .input-focus-bg {
    border-color: #2196f3 !important;
    box-shadow: none !important;
    
}

.user-box .input-group-prepend {
    position: absolute;
    right: 12px;
    top: 4px;
}
    
    .form-control:focus{box-shadow:none !important;}
    
    
.user-box .icn {
    position: absolute;
    right: 13px;
    top: 10px;
    border-radius: 30px;
}

.user-box input:hover {border-color: #000;}
.user-box input:hover ~ label {
    color: #000;
}

.login-box .login-btn {
    position: relative;
    display: flex;
    padding: 12px 20px 10px;
    font-size: 15px;
    text-decoration: none;
    text-transform: uppercase;
    overflow: hidden;
    transition: .5s;
    letter-spacing: 1px;
    color: #1565c0;
    border: 1px solid #1565c0;
    background: #fff;
    max-width: 80%;
    border-radius: 3px;
    height: 45px;
    justify-content: center;
    align-items: center;
    box-shadow: none !important;
    margin: 20px auto 0;
    width: 100%;
}

.login-box .login-btn:hover {
    background: #1565c0 !important;
    color: #fff !important;
    border-radius:3px;
    /*box-shadow: 0 0 5px #0094bc, 0 0 9px #0094bc, 0 0 5px #0094bc, 0 0 2px #0094bc;*/
}

.error1, .error2 {
    font-size: 12px;
    position: absolute;
    bottom: -25px;
}

.lbl-txt {
    line-height: 1.2;
    display: block;
    font-size: 17px;
    padding: 0 0 2px !important;
    width: 80%;
    text-align: center;
}

.d-flex.w-100.justify-content-between.lbl-cnt {
    align-items: baseline;
    flex-wrap: wrap;
    justify-content: center !important;
}

.lbl-cnt button {
    background: #ffffff4a !important;
    color: #1da1f2 !important;
    border-radius: 2px !important;
    padding: 2px 7px !important;
    line-height: 1;
    /* border: 1px solid #1da1f2 !important; */
    transition: .5s;
    margin-bottom:5px !important;
    font-size: 14px;
}

.lbl-cnt button:hover{background:#1da1f2 !important; text-decoration:none !important; color:#fff !important}

.otp-input-fields {
    margin: auto;
    background-color: white;
    /* box-shadow: 0px 0px 8px 0px #02025044; */
    max-width: 100%;
    width: 100%;
    display: flex;
    justify-content: center;
    gap: 10px;
    padding: 0;
    /* border-radius: 9px; */
}


.otp-input-fields input {
    height: 45px;
    width: 40px;
    background-color: transparent;
    border-radius: 4px;
    border: 1px solid #939393;
    text-align: center;
    outline: none;
    font-size: 16px;
}


.otp-input-fields input::-webkit-outer-spin-button, .otp-input-fields input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}
.otp-input-fields input[type=number] {
  -moz-appearance: textfield;
}


.otp-input-fields input:focus {
    /* border-color: #1da1f2 !important; */
     transition: .1s;
    border: 2px solid #1da1f2 !important;
    font-size: 20px;
}

.result {
  max-width: 400px;
  margin: auto;
  padding: 24px;
  text-align: center;
}
.result p {
  font-size: 24px;
  font-family: "Antonio", sans-serif;
  opacity: 1;
  transition: color 0.5s ease;
}
.result p._ok {
  color: green;
}
.result p._notok {
  color: red;
  border-radius: 3px;
}

span.btn-row {
    width: 100%;
    text-align: center;
}

.bg-white.login-box {
    margin-bottom:50px !important;
}


@media (max-width: 479px) 
{
.d-flex.w-100.justify-content-between.lbl-cnt { flex-wrap: wrap;argin-bottom: 15px;}    

.lbl-txt {padding-bottom: 5px;padding-left: 0 !important;font-size: 14px;width: 100%;
    padding-right: 0 !important;}  

.otp-input-fields{gap:5px}
.otp-input-fields input { height: 35px; width: 30px;font-size: 15px;}
.bg-white.login-box { margin-bottom:20px !important;margin-top: 20px !important;}

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
                            <div class="bg-white login-box rounded-ultra shadow-lg px-4 py-3 my-5">
                            
                                <div class="mb-2 text-center">
                                    <img src="assets/images/verification.png" data-width="50px" data-height="50px">
                                </div>

                                <div class="pb-1"></div>

                                <h3 class="section-title-4 text-center font-weight-800 vr-hd">
                                    Verification
                                    <div style="font-weight:400;font-size:15px">By Email or SMS (or both)</div>
                                    <div class="title-divider-round mt-1"></div>
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
                                        <div class="d-flex w-100 justify-content-between lbl-cnt">
                                            <label class="px-3 mb-0 lbl-txt">Please enter the 6 digit code you received by email on <?php echo $row['email']; ?> here:</label>
                                        <span class="btn-row">
                                        <button type="button" class="ecode text-capitalize text-reset btn btn-link p-0 mb-0" id="<?php echo $_POST['userId']; ?>">resend?</button>
                                        </span>
                                        </div>
                                        
                                        <!--<div class="input-group-inner">-->
                                        <!--    <div class="input-group-prepend">-->
                                        <!--        <span class="input-group-text input-group-icon"><i class="far fa-envelope"></i></span>-->
                                        <!--    </div>-->
                                        <!--    <input type="number" class="form-control form-control-lg" oninput="emailLength(this);" id="ecode" placeholder="_ _ _ _ _ _">-->
                                        <!--    <div class="input-focus-bg"></div>-->
                                        <!--</div>-->
                                        
                                        
                                        <!--    <div class="user-box">-->
                                        <!--    <input type="tel" class="form-control form-control-lg" oninput="emailLength(this);" id="ecode" placeholder="_ _ _ _ _ _">-->
                                        <!--     <label>Email</label>-->
                                           <!--<div class="input-focus-bg"></div>-->
                                         <!--<span class="input-group-text input-group-icon icn"><i class="far fa-envelope"></i></span>-->
                                        <!--<span class="error1 px-3 w-100 text-white font-weight-500" style="font-size:12px">Required</span>-->
                                        <!--</div>-->
                                        
                                        
   <form  class="otp-form otp-input-fields" name="otp-form">
  <div class="otp-input-fields">
    <input type="number" pattern="[0-9]*" inputmode="numeric" class="otp__digit otp__field__1">
    <input type="number" pattern="[0-9]*" inputmode="numeric" class="otp__digit otp__field__2">
    <input type="number" pattern="[0-9]*" inputmode="numeric" class="otp__digit otp__field__3">
    <input type="number" pattern="[0-9]*" inputmode="numeric" class="otp__digit otp__field__4">
    <input type="number" pattern="[0-9]*" inputmode="numeric" class="otp__digit otp__field__5">
    <input type="number" pattern="[0-9]*" inputmode="numeric" class="otp__digit otp__field__6">
  </div>
  <!--<div class="result"><p id="_otp" class="_notok">855412</p></div>-->
</form>
                                        
                                        
                                    </div>
                                    <?php } ?>
                                    <div class="input-group input-group-lg input-group-round text-center">
                                        <label class="text-center w-100">OR:</label>
                                    </div>
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
                                        <div class="d-flex w-100 justify-content-between lbl-cnt">
                                            <label class="px-3 mb-0 lbl-txt">Please enter the 4 digit code you received by SMS on <?php echo $row['mobile']; ?></label>
                                            <span class="btn-row">
                                            <button type="button" class="mcode text-capitalize text-reset btn btn-link p-0  mb-0" id="<?php echo $_POST['userId']; ?>">resend?</button>
                                          </span>
                                        </div>
                                        <!--<div class="input-group-inner">-->
                                        <!--    <div class="input-group-prepend">-->
                                        <!--        <span class="input-group-text input-group-icon"><i class="fas fa-mobile-alt"></i></span>-->
                                        <!--    </div>-->
                                        <!--    <input type="number" class="form-control form-control-lg" oninput="mobileLength(this);" id="mcode" placeholder="_ _ _ _">-->
                                        <!--    <div class="input-focus-bg"></div>-->
                                        <!--</div>-->
                                        
                                      <!--       <div class="user-box">-->
                                      <!--      <input type="number" class="form-control form-control-lg" oninput="mobileLength(this);" id="mcode" placeholder="_ _ _ _">-->
                                      <!--       <label>Mobile</label>-->
                                           <!--<div class="input-focus-bg"></div>-->
                                         <!--<span class="input-group-text input-group-icon icn"><i class="fas fa-mobile-alt"></i></span>-->
                                      <!--<span class="error2 px-3 w-100 text-white font-weight-500" style="font-size:12px">Required</span>-->
                                      <!--  </div>-->
                                      
  <form  class="otp-form otp-input-fields" name="otp-form">
  <div class="otp-input-fields">
    <input type="number" pattern="[0-9]*" inputmode="numeric" class="otp__digit otp__field__1">
    <input type="number" pattern="[0-9]*" inputmode="numeric" class="otp__digit otp__field__2">
    <input type="number" pattern="[0-9]*" inputmode="numeric" class="otp__digit otp__field__3">
    <input type="number" pattern="[0-9]*" inputmode="numeric" class="otp__digit otp__field__4">
  </div>
  <!--<div class="result"><p id="_otp" class="_notok">855412</p></div>-->
</form>

                                        
                                    </div>
                                    <?php } ?>
                                    <!--<div class="px-3">-->
                                        <?php if( (!isset($everify)) OR (!isset($mverify)) OR (!isset($eaverify)) OR (!isset($maverify)) ){ ?>
                                        <!--<div class="form-group custom-control custom-checkbox">-->
                                        <!--    <input type="checkbox" class="custom-control-input" id="skip">-->
                                        <!--    <label class="custom-control-label font-weight-600" for="skip">Skip to continue</label>-->
                                        <!--</div>-->
                                        <?php } ?>
                                    <!--</div>-->
                                    <button type="button" id="checkout" class="btn btn-lg btn-round btn-indigo btn-block mb-0 text-capitalize checkout login-btn" <?php if((!isset($everify)) OR (!isset($mverify)) OR (!isset($eaverify)) OR (!isset($maverify)) ){ ?>disabled="disabled" <?php } ?> ><i class="fas fa-sign-in-alt"></i>Continue</button>
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

<script>
var otp_inputs = document.querySelectorAll(".otp__digit")
var mykey = "0123456789".split("")
otp_inputs.forEach((_)=>{
  _.addEventListener("keyup", handle_next_input)
})
function handle_next_input(event){
  let current = event.target
  let index = parseInt(current.classList[1].split("__")[2])
  current.value = event.key
  
  if(event.keyCode == 8 && index > 1){
    current.previousElementSibling.focus()
  }
  if(index < 6 && mykey.indexOf(""+event.key+"") != -1){
    var next = current.nextElementSibling;
    next.focus()
  }
  var _finalKey = ""
  for(let {value} of otp_inputs){
      _finalKey += value
  }
  if(_finalKey.length == 6){
    document.querySelector("#_otp").classList.replace("_notok", "_ok")
    document.querySelector("#_otp").innerText = _finalKey
  }else{
    document.querySelector("#_otp").classList.replace("_ok", "_notok")
    document.querySelector("#_otp").innerText = _finalKey
  }
}    
</script>



</body>
</html>