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
    <link rel="stylesheet" href="node_modules/%40fortawesome/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="node_modules/animate.css/animate.min.css">
    <link rel="stylesheet" href="node_modules/%40fancyapps/fancybox/dist/jquery.fancybox.min.css">
    <link rel="stylesheet" href="node_modules/owl.carousel/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="node_modules/owl.carousel/dist/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="node_modules/build/css/intlTelInput.css">
    <link rel="stylesheet" href="node_modules/build/css/demo.css">
    <link rel="stylesheet" href="assets/css/style.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;subset=latin-ext" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i,900,900i&amp;subset=latin-ext" rel="stylesheet">
    <style>
        .h-25{ height:25px !important; }
        .iti{ width:100%;}
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
                            <div class="bg-white rounded-ultra shadow-lg px-4 py-5 py-md-4 my-3">
                                <h5 class="section-title-4 text-center font-weight-600 mb-3">
                                    Just a little bit about you, please
                                    <div class="title-divider-round"></div>
                                </h5>
                                <div id="error-msg" class="text-center"></div>
                                <form>
                                    <div class="input-group input-group-lg input-group-round">
                                        <div class="input-group-inner">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text input-group-icon"><i class="far fa-envelope"></i></span>
                                            </div>
                                            <input type="email" id="email" tabindex="1" class="form-control form-control-lg" value="<?php if(isset($_SESSION['q'])) { echo $_SESSION['q']; } ?>" placeholder="Email address">
                                            <input type="hidden" id="exist"  value="">
                                            <div class="input-focus-bg"></div>
                                        </div>
                                        <span class="error1 text-danger w-100 font-weight-400 pl-3 h-25"></span>
                                    </div>
                                    <div class="input-group input-group-lg input-group-round">
                                        <input id="mobile" name="mobile" placeholder=" " tabindex="2" type="number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" class="form-control form-control-lg" minlength="11" maxlength="13" style="border-radius:22px">
                                    </div>
                                    <span class="error2 text-danger w-100 font-weight-400 pl-3 h-25"></span>
                                    <div class="input-group input-group-lg input-group-round">
                                        <div class="input-group-inner">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text input-group-icon"><i class="far fa-user"></i></span>
                                            </div>
                                            <input type="text" id="fname" tabindex="3" class="form-control form-control-lg" placeholder="First Name">
                                            <div class="input-focus-bg"></div>
                                        </div>
                                        <span class="error3 text-danger w-100 font-weight-400 pl-3 h-25"></span>
                                    </div>
                                    
                                    <div class="input-group input-group-lg input-group-round">
                                        <div class="input-group-inner">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text input-group-icon"><i class="far fa-user"></i></span>
                                            </div>
                                            <input type="text" id="lname" tabindex="4" class="form-control form-control-lg" placeholder="Last Name">
                                            <div class="input-focus-bg"></div>
                                        </div>
                                        <span class="error4 text-danger w-100 font-weight-400 pl-3 h-25"></span>
                                    </div>
                                    
                                    <div class="input-group input-group-lg input-group-round">
                                        <div class="input-group-inner">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text input-group-icon"><i class="far fa-building"></i></span>
                                            </div>
                                            <input type="text" id="company" tabindex="5" class="form-control form-control-lg" placeholder="Company">
                                            <div class="input-focus-bg"></div>
                                        </div>
                                        <span class="error5 text-danger w-100 font-weight-400 pl-3 h-25"></span>
                                    </div>

                                    <div class="input-group input-group-lg input-group-round">
                                        <div class="input-group-inner">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text input-group-icon" id="eye"><i class="far fa-eye-slash"></i></span>
                                            </div>
                                            <input type="password" tabindex="6" onkeyup="nospaces(this)" class="form-control form-control-lg" id="pass" placeholder="Set Password">
                                            <div class="input-focus-bg"></div>
                                        </div>
                                        <span class="error6 text-danger w-100 font-weight-400 pl-3 h-25"></span>
                                    </div>
                                    
                                    <div class="input-group input-group-lg input-group-round">
                                        <div class="input-group-inner">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text input-group-icon" id="eye1"><i class="far fa-eye-slash"></i></span>
                                            </div>
                                            <input type="password" tabindex="7" onkeyup="nospaces(this)" class="form-control form-control-lg" id="rpass" placeholder="Repeat Password">
                                            <div class="input-focus-bg"></div>
                                        </div>
                                        <span class="error7 text-danger w-100 font-weight-400 pl-3 h-25"></span>
                                    </div>
                                    
                                    <button type="button" id="register" class="btn btn-lg btn-round btn-indigo btn-block mb-0 py-4" disabled="disabled" style="line-height:0">Create my account</button>
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
    $("#email ~ .input-focus-bg").attr("style", "border-color: #e0e0e0 !important;");
});
</script>
<script>
$('#mobile').keyup(function() {
    var mobile  = $("#mobile").val().length;
    
    if(mobile == 0)
    {
        $("#mobile").attr("style", "border-color: #2196f3 !important;border-radius: 22px;padding-left:80px");
        $(".error2").text("");
    }
    else if(mobile >7 && mobile < 13)
    {
        $("#mobile").attr("style", "border-color: #66bb6a !important;border-radius: 22px;padding-left:80px");
        $(".error2").text("");
    }
    else
    {
        $("#mobile").attr("style", "border-color: #fe0000 !important;border-radius: 22px;padding-left:80px");
        $(".error2").text("Enter Valid Mobile Number");
    }
});
$("#mobile").focusout(function(){
    $(this).attr("style", "border-color: #e0e0e0 !important;border-radius: 22px;padding-left:80px");
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
        $("#pass ~ .input-focus-bg").attr("style", "border-color: #e0e0e0 !important;");
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
    $("#pass ~ .input-focus-bg").attr("style", "border-color: #e0e0e0 !important;");
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
        $("#rpass ~ .input-focus-bg").attr("style", "border-color: #e0e0e0 !important;");
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
    $("#rpass ~ .input-focus-bg").attr("style", "border-color: #e0e0e0 !important;");
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
    $('#register').attr("disabled", "disabled");

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
document.getElementById("pass").addEventListener("keyup", function(event) {
    if (event.keyCode === 13) {
        document.getElementById("register").click();
        return false;
    }
});
</script>
</body>
</html>