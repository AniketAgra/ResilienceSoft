<?php
session_start();
if(isset($_SESSION['userId']) && isset($_GET['direct'])) {
    header("Location:pay_now.php?direct=".$_GET['direct']."&esim=".$_GET['esim']."&charge=".$_GET['charge']);
} else if(isset($_SESSION['userId']) && !isset($_GET['direct'])) {
    header('Location:index.php');
}
include("include/config.php"); 
setcookie("direct", $_GET['direct'], time()+600);
setcookie("esim", $_GET['esim'], time()+600);
setcookie("charge", $_GET['charge'], time()+600);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="assets/favicon.ico">
    <title>gsm2go | SignIn</title>
    <link rel="stylesheet" href="node_modules/%40fortawesome/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="node_modules/animate.css/animate.min.css">
    <link rel="stylesheet" href="node_modules/%40fancyapps/fancybox/dist/jquery.fancybox.min.css">
    <link rel="stylesheet" href="node_modules/owl.carousel/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="node_modules/owl.carousel/dist/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="assets/css/style.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;subset=latin-ext" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i,900,900i&amp;subset=latin-ext" rel="stylesheet">
</head>
<body>

<?php include("includes/header.php"); ?>

<!-- Content -->
<div class="container">
    <div class="row align-content-between">

        <div class="col-12">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 offset-md-1 col-lg-5 mx-auto">
                        <div class="px-xl-4">
                            <div class="bg-white rounded-ultra shadow-lg px-4 py-5 py-md-3 my-5">
                                <div class="mb-2 text-center">
                                    <img src="assets/svg/upload/login-03.svg" alt="Login" data-width="64px" data-height="64px">
                                </div>
                                <h3 class="section-title-4 text-center font-weight-800 mb-2">
                                    User Login
                                    <div class="title-divider-round"></div>
                                </h3>
                                <div id="error-msg" class="text-center col-md-12"><?php if(isset($_GET['userid']) && !empty($_GET['userid'])){ echo '<div class="text-success mb-0 mx-2">Password Sent Your Email Address</div>'; } ?></div>
                                <form>
                                    <div class="input-group input-group-lg input-group-round mb-0">
                                        <div class="input-group-inner">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text input-group-icon"><i class="far fa-envelope"></i></span>
                                            </div>
                                            <input type="text" class="form-control form-control-lg" id="username" placeholder="Username" value="<?php if(isset($_GET['q'])) { echo $_GET['q']; } ?>" tabindex="1">
                                            <div class="input-focus-bg"></div>
                                        </div>
                                        <span class="err1 w-100 text-white font-weight-500" style="font-size:12px">Required</span>
                                    </div>
                                    <div class="input-group input-group-lg input-group-round mb-2">
                                        <div class="w-100 text-right">
                                            <label class="px-3">
                                                <a href="forgot-password.php" style="display:none;" class="text-reset" id="forgot-password">Forgot password?</a>
                                            </label>
                                        </div>
                                        <div class="input-group-inner">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text input-group-icon" id="eye"><i class="far fa-eye-slash"></i></span>
                                            </div>
                                            <input type="password" id="password" class="form-control form-control-lg" placeholder="Password" tabindex="2">
                                            <div class="input-focus-bg"></div>
                                        </div>
                                        <span class="err2 w-100 text-white font-weight-500" style="font-size:12px">Required Password</span>
                                    </div>
                                    <div data-height="5px"></div>
                                    <button type="button" id="login" class="btn btn-lg btn-round btn-indigo btn-block mb-0" disabled="disabled"><i class="fas fa-sign-in-alt"></i>Sign in</button>
                                    <label class="w-100 text-center py-3 mb-0">
                                        Don't have an account? <a href="signup.php?direct=<?php echo $_GET['direct']; ?>&esim=<?php echo $_GET['esim']; ?>&charge=<?php echo $_GET['charge']; ?>" id="signup-url">Signup</a>
                                    </label>
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
$("#eye").click(function () {
    if ($("#password").attr("type") === "password") {
        $("#password").attr("type", "text");
        $("i","#eye").attr("class", 'fa fa-eye-slash');
    } else {
        $("#password").attr("type", "password");
        $("i","#eye").attr("class", 'fa fa-eye');
    }
});
</script>
<script>
$('#username').keyup(function() {
    var email   = $("#username").val().length;
    var pass    = $("#password").val().length;
    
    if(email !=0 && pass !=0)
    {
        $('#login').removeAttr("disabled");
    }
    else
    {
        $('#login').attr("disabled", "disabled");
    }
});
$('#password').keyup(function() {
    var email   = $("#username").val().length;
    var pass    = $("#password").val().length;
    
    if(email !=0 && pass !=0)
    {
        $('#login').removeAttr("disabled");
    }
    else
    {
        $('#login').attr("disabled", "disabled");
    }
});

$("#username").focusout(function(){
    var email    = $("#username").val();
    email_regex  = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i;
    
    if( email.length==0 ){
        $(".err1").text("Please Enter Username");
        $(".err1").attr("style", "color: #e53935 !important");
    }
    else if(!email_regex.test(email)){ 
        $(".err1").text("Please Enter Valid Username");
        $(".err1").attr("style", "color: #e53935 !important");
    }
    else{ 
        $.ajax({
            url: "ajax/login-mail.php",
            type: "POST",
            data: { email:email },
            success:function(data,status)
            {
                $("#error-msg").html(data);
            }
        });
    }
});
</script>
<script type="text/javascript">
$("#login").click(function(){

    var email   = $("#username").val();
    var pass    = $("#password").val();

    $.ajax({
        url: "ajax/signin.php",
        type: "POST",
        data: { email:email,pass:pass },
        success:function(data,status)
        {
            $("#error-msg").html(data);
        }
    });
});
</script>
<script>
$("#username").focus();
document.getElementById("password").addEventListener("keyup", function(event) {
    if (event.keyCode === 13) {
        document.getElementById("login").click();
        return false;
    }
});
</script>
<?php if(isset($_GET['q'])) { ?>
<script type="text/javascript">
   $(document).ready(function() {
      setTimeout(function() {
          $("#password").focus();
      }, 500);
   });
</script>
<?php } ?>

<script>
jQuery(window).bind(
    "beforeunload", 
    function() { 
        return confirm("Do you really want to close?") 
    }
)
</script>
</body>
</html>