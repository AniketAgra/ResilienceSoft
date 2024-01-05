<?php
session_start();
include("includes/config.php"); 

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

$loginEmail = '';
if($_SESSION['recCustomerId'] != '') {
	$order_row = mysqli_fetch_assoc(mysqli_query($con, "select * from orders where status='ACTIVE' and customerId = '".$_POST['recCustomerId']."'"));
    $loginEmail = $order_row['email'];
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
    <title>gsm2go eSIM | Login</title>
    <link rel="stylesheet" href="node_modules/%40fortawesome/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="node_modules/animate.css/animate.min.css">
    <link rel="stylesheet" type="text/css" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <link rel="stylesheet" href="assets/css/style.min.css">
    <link rel="stylesheet" href="assets/css/btn1.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;subset=latin-ext" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i,900,900i&amp;subset=latin-ext" rel="stylesheet">
    <style>
    .h-25{ height:25px !important; }
    #forgot-password{ background:none;border:none;}
    @media only screen and (min-width: 992px){
        .fixed-footer{ position:fixed !important;left:0!important;right:0!important;bottom:0!important;}
    }
    </style>
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
                                    <!--<div class="title-divider-round"></div>-->
                                </h3>
                                <div id="error-msg" class="text-center col-md-12"><?php if(isset($_SESSION['userid']) && !empty($_SESSION['userid'])){ echo '<div class="text-success mb-0 mx-2">Password Sent Your Email Address</div>'; } ?></div>
                                    <div class="input-group input-group-lg input-group-round mb-0">
                                        <div class="input-group-inner">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text input-group-icon"><i class="far fa-envelope"></i></span>
                                            </div>
                                            <input type="text" class="form-control form-control-lg" id="username" placeholder="Username" <?php if($loginEmail != '') { echo "readonly"; } ?> value="<?php if(isset($_SESSION['q'])) { echo $_SESSION['q']; } else if($loginEmail != '') { echo $loginEmail; } ?>" tabindex="1">
                                            <div class="input-focus-bg"></div>
                                        </div>
                                        <span class="err1 w-100 text-white font-weight-500 h-25" style="font-size:12px;"></span>
                                    </div>
                                    <div class="input-group input-group-lg input-group-round mb-2">
                                        <div class="input-group-inner">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text input-group-icon" id="eye"><i class="far fa-eye-slash"></i></span>
                                            </div>
                                            <input type="password" id="password" class="form-control form-control-lg" placeholder="Password" tabindex="2">
                                            <div class="input-focus-bg"></div>
                                        </div>
                                        <span class="err2 w-100 text-white font-weight-500 h-25" style="font-size:12px;"></span>
                                    </div>
                                    <div data-height="5px"></div>
                                    <div class="btnCont">
                                      <button class="btnAni" id="login"></button>
                                    </div>
                                    <div class="w-100 pt-1 text-center" style="height:25px">
                                        <form method="post" action="forgot-password">
                                            <input type="hidden" name="userid" id="userid" value="">
                                            <button type="submit" name="submit" style="display:none;" id="forgot-password">Forgot password?</button>
                                        </form>
                                    </div>
                                    <!--<button type="button" id="login" class="btn btn-lg btn-round btn-indigo btn-block mb-0" disabled="disabled"><i class="fas fa-sign-in-alt"></i>Sign in</button>-->
                                    <?php if( isset($_SESSION['direct']) ){ ?>
                                    <label class="w-100 text-center py-3 mb-0">
                                        Don't have an account? <a href="signup" id="signup-url">Signup</a>
                                    </label>
                                    <?php } ?>
                                </div>
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
<script src="node_modules/jquery-circle-progress/dist/circle-progress.min.js"></script>
<!--script src="assets/js/custom.js"></script-->

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
    
    if(email !=0)
    {
        //$('#login').removeAttr("disabled");
        $(".error1").html("");$(".error1").attr("style", "color: #66bb6a !important");
        $(".input-group-inner .form-control:focus ~ .input-focus-bg").attr("style", "border-color: #e0e0e0 !important;");
    }
    else
    {
        //$('#login').attr("disabled", "disabled");
        $(".error1").html("");$(".error1").attr("style", "color: #66bb6a !important");
        $(".input-group-inner .form-control:focus ~ .input-focus-bg").attr("style", "border-color: #fe0000 !important;");
    }
});
// $("#username").focusout(function(){
//     $("#username ~ .input-focus-bg").attr("style", "border-color: #e0e0e0 !important;");
// });
// $('#password').keyup(function() {
//     var pass    = $("#password").val().length;
    
//     if(email !=0 && pass !=0)
//     {
//         $('#login').removeAttr("disabled");
//     }
//     else
//     {
//         $('#login').attr("disabled", "disabled");
//     }
// });
// $("#password").focusout(function(){
//     $("#password ~ .input-focus-bg").attr("style", "border-color: #e0e0e0 !important;");
// });

$("#username").keyup(function(){
    var email    = $("#username").val();
    email_regex  = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i;
    
    if( email.length==0 ){
        $(".err1").html("");
        $("#username ~ .input-focus-bg").attr("style", "border-color: #e0e0e0 !important;");
    }
    else if(!email_regex.test(email)){ 
        $(".err1").text("Please enter valid username");
        $(".err1").attr("style", "color: #e53935 !important;");
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

/*$("#password").focusout(function(){
    var email   = $("#username").val();
    var pass    = $("#password").val();
 
    $.ajax({
        url: "ajax/login-mail.php",
        type: "POST",
        data: { email:email,pass:pass }
        success:function(data,status)
        {
            $("#error-msg").html(data);
        }
    });
});*/
</script>
<script type="text/javascript">
$("#login").click(function(){
    var email   = $("#username").val();
    var pass    = $("#password").val();
    
    $(".err1").html("");
    $(".err2").html("");
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
</body>
</html>