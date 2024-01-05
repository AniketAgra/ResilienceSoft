<?php
session_start();
include("include/config.php"); 
include("ip.php");

if(isset($_POST['direct']))
{
    $esim = '0';
    $type="New SIM";
    if(isset($_POST['esim']) && $_POST['esim']!=""){ $esim = '1'; }
    $_SESSION['direct'] = $_POST['direct']; 
    $_SESSION['esim'] = $esim;
    if(isset($_POST['purType'])) {
        $type=$_POST['purType'];
    }
    $_SESSION['purType'] = $type;
}

$_SESSION['recCustomerId'] = '';
if($_SESSION['purType'] == 'Recharge') {
    $_SESSION['recCustomerId'] = $_POST['recCustomerId'];
}

if(isset($_SESSION['user'],$_SESSION['role'],$_SESSION['direct'],$_SESSION['esim'])) 
{
    header('Location:checkout.php');
} 
else if(isset($_SESSION['user'],$_SESSION['role']) && !isset($_SESSION['direct'],$_SESSION['esim'])) 
{
    header('Location:index.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="assets/favicon.ico">
    <title>gsm2go eSIM | Signup</title>
    <?php include("includes/logrocket.php"); ?>
    <link rel="stylesheet" href="node_modules/%40fortawesome/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="node_modules/animate.css/animate.min.css">
    <link rel="stylesheet" href="node_modules/%40fancyapps/fancybox/dist/jquery.fancybox.min.css">
    <link rel="stylesheet" href="node_modules/owl.carousel/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="node_modules/owl.carousel/dist/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="node_modules/build/css/intlTelInput.css">
    <link rel="stylesheet" href="node_modules/build/css/demo.css">
    <link rel="stylesheet" href="assets/css/style.min.test.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;subset=latin-ext" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i,900,900i&amp;subset=latin-ext" rel="stylesheet">
    <style>
        .h-25{ height:25px !important; }
        .iti{ width:100%;}
        @media only screen and (min-width: 992px){
            .fixed-footer{ position:fixed !important;left:0!important;right:0!important;bottom:0!important;}
        }
        
        
    
    
.login-box .user-box {
  position: relative; display: block !important; margin-top:30px;z-index: 0;
}
            
.login-box .user-box input {
    width: 100%;
    padding: 12px 12px 12px 14px !important;
    color: #000;
    margin-bottom:0px;
    border: none;
    border: 1px solid #939393;
    outline: none;
    background: transparent;
    border-radius: 3px !important;
    font-size: 1rem;
    line-height: 1;
    padding-left: 0.75em;
    padding-right: 0.75em;
    height:45px;
    font-size: 14px;
    transition: .5s;
    position:relative;  z-index:9;      
}

.login-box .user-box input:hover{border-color:#000 !important;}
      
          .text-danger {
    position: absolute;
    font-size: 12px;
    z-index: 9;
    left: -5px;
}  
           
  button#register {
    margin-top: 30px;
}         
                                               

/*.login-box .user-box label {*/
/*    position: absolute;*/
/*    top: -13px;*/
/*    left: 12px;*/
/*    padding: 2px 3px;*/
/*    font-size: 15px;*/
/*    color: #939393;*/
/*    pointer-events: none;*/
/*    transition: .5s;*/
/*    background: #fff;*/
/*    font-weight: 500;*/
/*    margin-bottom: 0;*/
    
/*}*/


.user-box.input-none-bd input { border: 0;}

.login-box .user-box .label {
    position: absolute;
    top: -13px;
    left: 12px;
    padding: 2px 3px;
    font-size: 15px;
    color: #939393;
    pointer-events: none;
    transition: .5s;
    background: #fff;
    font-weight: 500;
    margin-bottom: 0; z-index:99;
    
}

.login-box .input-focus-bg{border:1px solid #939393; border-radius:3px !important}
.login-box input:hover .input-focus-bg{border:1px solid #939393;}
.login-box .user-box input:focus ~ .input-focus-bg{border:1px solid #1266f1 !important; box-shadow:none !important}

.login-box .user-box input:focus ~ label,
/*.login-box .user-box input:valid ~ label*/ {
  top: -13px;
  left:12;
  color: #1266f1;
}

.user-box.input-none-bd.input-group-inner:hover .input-focus-bg {
    border: 1px solid #000 !important;
}




input:focus{border-color:#1266f1 !important; transition: .5s;}
/*input:valid{border-color:#1266f1 !important; transition: .5s;}*/


input:-webkit-autofill,
input:-webkit-autofill:hover,
input:-webkit-autofill:focus {
  -webkit-box-shadow: 0 0 0px 1000px #fff inset !important;
  transition: background-color 5000s ease-in-out 0s;
}

    .form-control:focus{box-shadow:none !important;}
    
    .user-box .icn {
    position: absolute;
    right:13px;
    top:13px;
    border-radius: 15px;z-index: 99;
}

.user-box input:hover {border-color: #000;}
.user-box input:hover ~ label {
    color: #000;
}
input#mobile {
    padding-left: 85px !important;
}
span.error {
    position: absolute;
    bottom: -24px;
    font-size: 12px;
    left: 15px;
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
    width: 100%;
    border-radius: 3px;
    height: 45px;
    justify-content: center;
    align-items: center; box-shadow:none !important;
}

.login-box .login-btn:hover {
    background: #1565c0 !important;
    color: #fff !important;
    border-radius:3px;
    /*box-shadow: 0 0 5px #0094bc, 0 0 9px #0094bc, 0 0 5px #0094bc, 0 0 2px #0094bc;*/
}



.login-box .iti__selected-flag {
    padding: 0 6px 0 15px !important;
}
        
     label.error {
    position: absolute;
    font-size: 12px;
    z-index: 9;
    left: 13px;
    color: red;
}   
    
label.label span {color: red;}

    
        
        
    </style>
</head>
<body>
<?php include("includes/header-test.php"); ?>

<!-- Content -->
<div class="container-fluid">
    <div class="row align-content-between">

        <div class="col-12">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 offset-md-1 col-lg-5 mx-auto">
                        <div class="px-xl-4">
                            <div class="bg-white login-box rounded-ultra shadow-lg px-4 py-5 py-md-4 my-3">
                                <h5 class="section-title-4 text-center font-weight-600 mb-3">
                                    Just a little bit about you, please
                                    <div class="title-divider-round"></div>
                                </h5>
                                <div id="error-msg" class="text-center"></div>
                                <form   method="post" name="myemailform" id="myemailform">
                                    <!--<div class="input-group input-group-lg input-group-round">-->
                                    <!--    <div class="input-group-inner">-->
                                    <!--        <div class="input-group-prepend">-->
                                    <!--            <span class="input-group-text input-group-icon"><i class="far fa-envelope"></i></span>-->
                                    <!--        </div>-->
                                    <!--        <input type="email" id="email" tabindex="1" class="form-control form-control-lg" value="<?php if(isset($_SESSION['q'])) { echo $_SESSION['q']; } ?>" placeholder="Email address" autocomplete="off">-->
                                    <!--        <input type="hidden" id="exist"  value="">-->
                                    <!--        <div class="input-focus-bg"></div>-->
                                    <!--    </div>-->
                                    <!--    <span class="error1 text-danger w-100 font-weight-400 pl-3 h-25"></span>-->
                                    <!--</div>-->
                                    
                                    
  <div class="user-box input-none-bd input-group-inner">
  <input type="email" name="email" id="email" tabindex="1" required  class="form-control form-control-lg" value="<?php if(isset($_SESSION['q'])) { echo $_SESSION['q']; } ?>" placeholder="" autocomplete="off">
  <input type="hidden" id="exist"  value="">
  <label class="label">Email address <span>*</span></label>
 <!--<span class="input-group-text input-group-icon icn"><i class="far fa-user"></i></span>-->
   <span class="error1 text-danger w-100 font-weight-400 pl-3 h-25"></span>
   <div class="input-focus-bg"></div>
  </div>
            
                                    
                                    

            
                                    
                                    <!--<div class="input-group input-group-lg input-group-round">-->
                                    <!--    <input id="mobile" name="mobile" placeholder=" " tabindex="2" type="number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" class="form-control form-control-lg" minlength="11" maxlength="13" style="border-radius:22px" autocomplete="off">-->
                                    <!--</div>-->
                                    
                                    
  <div class="user-box">
<input id="mobile"  name="mobile" required  placeholder=" " tabindex="3" type="tel" 
oninput="javascript: if (this.value.length > this.maxLength) 
this.value = this.value.slice(0, this.maxLength);" class="form-control form-control-lg" 
minlength="11" maxlength="13"  autocomplete="off">      
 <label class="label">Mobile <span>*</span></label>
  <span class="error2 text-danger w-100 font-weight-400 pl-3 h-25"></span>
  </div>
                                    
                                    
                                    <!--<div class="input-group input-group-lg input-group-round">-->
                                    <!--    <div class="input-group-inner">-->
                                    <!--        <div class="input-group-prepend">-->
                                    <!--            <span class="input-group-text input-group-icon"><i class="far fa-user"></i></span>-->
                                    <!--        </div>-->
                                    <!--        <input type="text" id="fname" tabindex="3" class="form-control form-control-lg" placeholder="First Name" autocomplete="off">-->
                                    <!--        <div class="input-focus-bg"></div>-->
                                    <!--    </div>-->
                                    <!--    <span class="error3 text-danger w-100 font-weight-400 pl-3 h-25"></span>-->
                                    <!--</div>-->
                                    
    <div class="user-box">
  <input type="text" name="fullname" id="fname" required tabindex="3" class="form-control form-control-lg" placeholder="" autocomplete="off">
 <label class="label">First Name <span>*</span></label>
 <!--<span class="input-group-text input-group-icon icn"><i class="far fa-user"></i></span>-->
   <span class="error3 text-danger w-100 font-weight-400 pl-3 h-25"></span>
  </div>
                                    
                                    
                                    <!--<div class="input-group input-group-lg input-group-round">-->
                                    <!--    <div class="input-group-inner">-->
                                    <!--        <div class="input-group-prepend">-->
                                    <!--            <span class="input-group-text input-group-icon"><i class="far fa-user"></i></span>-->
                                    <!--        </div>-->
                                    <!--        <input type="text" id="lname" tabindex="4" class="form-control form-control-lg" placeholder="Last Name" autocomplete="off">-->
                                    <!--        <div class="input-focus-bg"></div>-->
                                    <!--    </div>-->
                                    <!--    <span class="error4 text-danger w-100 font-weight-400 pl-3 h-25"></span>-->
                                    <!--</div>-->
                                    
                                    
    <div class="user-box">
 <input type="text" id="lname" name="lname" tabindex="5" required class="form-control form-control-lg" placeholder="" autocomplete="off">
 <label class="label">Last Name <span>*</span></label>
 <!--<span class="input-group-text input-group-icon icn"><i class="far fa-user"></i></span>-->
   <span class="error4 text-danger w-100 font-weight-400 pl-3 h-25"></span>
  </div>                                
                                    
                                    
                                    
                                    
                                    <!--<div class="input-group input-group-lg input-group-round">-->
                                    <!--    <div class="input-group-inner">-->
                                    <!--        <div class="input-group-prepend">-->
                                    <!--            <span class="input-group-text input-group-icon"><i class="far fa-building"></i></span>-->
                                    <!--        </div>-->
                                    <!--        <input type="text" id="company" tabindex="5" class="form-control form-control-lg" placeholder="Company" autocomplete="off">-->
                                    <!--        <div class="input-focus-bg"></div>-->
                                    <!--    </div>-->
                                    <!--    <span class="error5 text-danger w-100 font-weight-400 pl-3 h-25"></span>-->
                                    <!--</div>-->
                                    
<div class="user-box">
<input type="text" id="company" tabindex="6" required class="form-control form-control-lg" placeholder="" autocomplete="off">
 <label class="label">Company </label>
 <!--<span class="input-group-text input-group-icon icn"><i class="far fa-user"></i></span>-->
   <span class="error4 text-danger w-100 font-weight-400 pl-3 h-25"></span>
  </div>                                  
                                    
                                    

                                    <!--<div class="input-group input-group-lg input-group-round">-->
                                    <!--    <div class="input-group-inner">-->
                                    <!--        <div class="input-group-prepend">-->
                                    <!--            <span class="input-group-text input-group-icon" id="eye"><i class="far fa-eye-slash"></i></span>-->
                                    <!--        </div>-->
                                    <!--        <input type="password" tabindex="6" onkeyup="nospaces(this)" class="form-control form-control-lg" id="pass" placeholder="Set Password" autocomplete="off">-->
                                    <!--        <div class="input-focus-bg"></div>-->
                                    <!--    </div>-->
                                    <!--    <span class="error6 text-danger w-100 font-weight-400 pl-3 h-25"></span>-->
                                    <!--</div>-->
                                    
                                    
<div class="user-box input-none-bd input-group-inner">
<input type="password" pattern="[0-9]*" inputmode="numeric" tabindex="7" required onkeyup="nospaces(this)" class=" form-control form-control-lg" id="pass" placeholder="" autocomplete="off">
 <label class="label">Set Password <span>*</span></label>
 <span class="input-group-text input-group-icon icn" id="eye"><i class="far fa-eye-slash"></i></span>
   <span class="error6 text-danger w-100 font-weight-400 pl-3 h-25"></span>
    <div class="input-focus-bg"></div>
  </div>                                                                
                                    
                                    
                                    
                                    
                                    <!--<div class="input-group input-group-lg input-group-round">-->
                                    <!--    <div class="input-group-inner">-->
                                    <!--        <div class="input-group-prepend">-->
                                    <!--            <span class="input-group-text input-group-icon" id="eye1"><i class="far fa-eye-slash"></i></span>-->
                                    <!--        </div>-->
                                    <!--        <input type="password" tabindex="7" onkeyup="nospaces(this)" class="form-control form-control-lg" id="rpass" placeholder="Repeat Password" autocomplete="off">-->
                                    <!--        <div class="input-focus-bg"></div>-->
                                    <!--    </div>-->
                                    <!--    <span class="error7 text-danger w-100 font-weight-400 pl-3 h-25"></span>-->
                                    <!--</div>-->
                                    
                                    
                                    
 <div class="user-box input-none-bd input-group-inner">
 <input type="password" required pattern="[0-9]*" inputmode="numeric" tabindex="8" onkeyup="nospaces(this)" class="form-control form-control-lg" id="rpass" placeholder="" autocomplete="off">
 <label class="label">Repeat Password <span>*</span></label>
 <span class="input-group-text input-group-icon icn" id="eye1"><i class="far fa-eye-slash"></i></span>
   <span class="error7 text-danger w-100 font-weight-400 pl-3 h-25"></span>
    <div class="input-focus-bg"></div>
  </div>   
                                    
                                    
                                    <button  type="submit" name='submit' id="register"   class="btn login-btn"  style="line-height:0">Create my account</button>
                                </form>
                                <label class="w-100 text-center py-3 mb-0">
                                    Already have an account? <a href="login">Login</a>
                                </label>
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
<script src="node_modules/build/js/intlTelInput.js"></script>
<script>
function nospaces(t){
    if(t.value.match(/\s/g)){
        t.value=t.value.replace(/\s/g,'');
    }
}
var input = document.querySelector("#mobile");
window.intlTelInput(input, {
    // geoIpLookup: function(callback) {
    //     $.get("http://ipinfo.io", function() {}, "jsonp").always(function(resp) {
    //         var countryCode = (resp && resp.country) ? resp.country : "";
    //         callback(countryCode);
    //     });
    // },
    //hiddenInput: "full_number",
    initialCountry: "<?php echo $countryCode; ?>",
    //localizedCountries: { 'de': 'Deutschland' },
    nationalMode: true,
    // onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
    placeholderNumberType: "MOBILE",
    preferredCountries: ['IL','US','GB','IN'],
    separateDialCode: true,
    utilsScript: "node_modules/build/js/utils.js",
});
</script>
<script type="text/javascript">
$("#email").focus();

$("#email").keyup(function(){

    var email   = $("#email").val();
    var exist   = $("#exist").val();
    var mobile  = $("#mobile").val().length;
    var fname   = $("#fname").val().length;
    var pass    = $("#pass").val().length;
    var rpass   = $("#rpass").val().length;
    email_regex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i;
  
    if( email.length==0 ){
        //$(".error1").text("Please Enter Email");
        //$(".error1").attr("style", "color: #e53935 !important");
        $(".input-group-inner .form-control:focus ~ .input-focus-bg").attr("style", "border-color: #e0e0e0 !important;");
    }
    else if(!email_regex.test(email)){ 
        // $(".error1").text("Please Enter Valid Email");
        // $(".error1").attr("style", "color: #e53935 !important");
        $(".error1").html("");$(".error1").attr("style", "color: #66bb6a !important");
        $(".input-group-inner .form-control:focus ~ .input-focus-bg").attr("style", "border-color: #fe0000 !important;");
    }
    else{ 
        $.ajax({
            url: "ajax/check-mail.php",
            type: "POST",
            data: { email:email },
            success:function(data,status)
            {
                $("#error-msg").html(data);
            }
        });
    }
});
$("#email").focusout(function(){
    $("#email ~ .input-focus-bg").attr("style", "border-color: #939393 ;");
});
</script>
<script>
$('#mobile').keyup(function() {
    var mobile  = $("#mobile").val().length;
    
    if(mobile == 0)
    {
        $("#mobile").attr("style", "border-color: #2196f3 !important;border-radius: 3px;padding-left:80px");
        $(".error2").text("");
    }
    else if(mobile >7 && mobile < 13)
    {
        $("#mobile").attr("style", "border-color: #66bb6a !important;border-radius: 3px;padding-left:80px");
        $(".error2").text("");
    }
    else
    {
        $("#mobile").attr("style", "border-color: #fe0000 !important;border-radius: 3px;padding-left:80px");
        $(".error2").text("Enter Valid Mobile Number");
    }
});
$("#mobile").focusout(function(){
    $(this).attr("style", "border-color: #939393 ;border-radius: 3px;padding-left:80px");
});
</script>
<script type="text/javascript">
$("#eye").click(function () {
    if ($("#pass").attr("type") === "password") {
        $("#pass").attr("type", "text");
        $("i","#eye").attr("class", 'fa fa-eye-slash');
    } else {
        $("#pass").attr("type", "password");
        $("i","#eye").attr("class", 'fa fa-eye');
    }
});
$("#eye1").click(function () {
    if ($("#rpass").attr("type") === "password") {
        $("#rpass").attr("type", "text");
        $("i","#eye1").attr("class", 'fa fa-eye-slash');
    } else {
        $("#rpass").attr("type", "password");
        $("i","#eye1").attr("class", 'fa fa-eye');
    }
});
</script>
<script>
$('#pass').keyup(function() {
    var email   = $("#email").val().length;
    var exist   = $("#exist").val();
    var mobile  = $("#mobile").val().length;
    var fname   = $("#fname").val().length;
    var pass    = $("#pass").val().length;
    var rpass   = $("#rpass").val().length;

    if(pass == 0){
        $("#pass ~ .input-focus-bg").attr("style", "border-color: #939393 ;");
        $(".error6").text("");
    } else if(pass < 5){
        $("#pass ~ .input-focus-bg").attr("style", "border-color: #fe0000 !important;");
        $(".error6").text("Password Must be Minimum 5 Letter");
    } else{
        $("#pass ~ .input-focus-bg").attr("style", "border-color: #66bb6a !important;");
        $(".error6").text("");
    }
    
    // if(email !=0 && mobile !=0 && fname !=0 && pass >=5 && rpass >=5 && exist==0 && $("#pass").val() == $("#rpass").val()){
    //     $('#register').removeAttr("disabled");
    // } else{
    //     $('#register').attr("disabled", "disabled");
    // }
});
$("#pass").focusout(function(){
    $("#pass ~ .input-focus-bg").attr("style", "border-color: #939393 ;");
});
</script>
<script>
$('#rpass').keyup(function() {
    var email   = $("#email").val().length;
    var exist   = $("#exist").val();
    var mobile  = $("#mobile").val().length;
    var fname   = $("#fname").val().length;
    var pass    = $("#pass").val().length;
    var rpass   = $("#rpass").val().length;

    if(rpass == 0){
        $('#register').attr("disabled", "disabled");
        $("#rpass ~ .input-focus-bg").attr("style", "border-color: #939393 ;");
        $(".error7").text("");
    } else if(rpass != pass){
        $('#register').attr("disabled", "disabled");
        $("#rpass ~ .input-focus-bg").attr("style", "border-color: #fe0000 !important;");
        $(".error7").text("Passwords don’t match.  Please try again");
    } else if(rpass < 5){
        $('#register').attr("disabled", "disabled");
        $("#rpass ~ .input-focus-bg").attr("style", "border-color: #fe0000 !important;");
        $(".error7").text("Password Must be Minimum 5 Letter");
    } else if($("#pass").val() !== $("#rpass").val()){
        $('#register').attr("disabled", "disabled");
        $("#rpass ~ .input-focus-bg").attr("style", "border-color: #fe0000 !important;");
        $(".error7").text("Passwords don’t match.  Please try again");
    } else{
        $("#rpass ~ .input-focus-bg").attr("style", "border-color: #66bb6a !important;");
        $(".error7").text("");
        $('#register').removeAttr("disabled");
    }
    
    // if(email !=0 && mobile !=0 && fname !=0 && pass >=5 && rpass >=5 && exist==0 && $("#pass").val() == $("#rpass").val()){
    //     $('#register').removeAttr("disabled");
    // } else{
    //     $('#register').attr("disabled", "disabled");
    // }
});
$("#rpass").focusout(function(){
    $("#rpass ~ .input-focus-bg").attr("style", "border-color: #939393 ;");
});
</script>
<script type="text/javascript">
$("#register" ).click(function(){

    var fname   = $("#fname").val();
    var lname   = $("#lname").val();
    var mobile  = $(".iti__selected-dial-code").text()+$("#mobile").val();
    var email   = $("#email").val();
    var company = $("#company").val();
    var pass    = $("#pass").val();
    var rpass   = $("#rpass").val();
    var direct  = $("#direct").val();
    var esim    = $("#esim").val();
    $("#register").text("Please Wait");
    // $('#register').attr("disabled", "disabled");

    $.ajax({
        url: "ajax/signup.php",
        type: "POST",
        data: { fname:fname,lname:lname,mobile:mobile,email:email,company:company,pass:pass,rpass:rpass,direct:direct,esim:esim },
        success:function(data,status)
        {
            $("#error-msg").html(data);
        }
    });
});
</script>
<?php if(isset($_GET['q'])) { ?>
<script type="text/javascript">
   $(document).ready(function() {
      setTimeout(function() {
          $("#mobile").focus();
      }, 500);
   });
</script>
<?php } ?>

<script>
document.getElementById("rpass").addEventListener("keyup", function(event) {
    if (event.keyCode === 13) {
        document.getElementById("register").click();
        return false;
    }
});
</script>

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.js"></script>

<script>
$(function()
{
    $("#myemailform").validate(
      {
        rules: 
        {
          fullname: 
          {
            required: true
          },
          lname:
          {
            required: true
          },
          
          email: 
          {
            required: true,
            email: true
          },
          message: 
          {
            maxlength: 1024
          }
        },
        messages: 
        {
          fullname: 
          {
            required: "Please enter your name"
          },
           lname: 
          {
            required: "Please enter your last name"
          },
          email: 
          {
            required: " "
          },
          message: 
          {
            maxlength: jQuery.format("Please limit the message to {0} letters!")
          }
        }
      });	
});
</script>

<script>
    
</script>


</body>
</html>