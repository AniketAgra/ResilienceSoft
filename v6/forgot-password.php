<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="assets/favicon.ico">
    <title>gsm2go | Forgot Password</title>
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="node_modules/%40fortawesome/fontawesome-free/css/all.min.css">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="node_modules/animate.css/animate.min.css">
    <!-- Fancybox CSS -->
    <link rel="stylesheet" href="node_modules/%40fancyapps/fancybox/dist/jquery.fancybox.min.css">
    
    <!-- Main CSS -->
    <link rel="stylesheet" href="assets/css/style.min.css">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;subset=latin-ext" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i,900,900i&amp;subset=latin-ext" rel="stylesheet">
    <style>
    .input-group-inner .form-control[readonly] ~ .input-focus-bg{background:#fff;}
    @media only screen and (min-width: 992px){
        .fixed-footer{ position:fixed !important;left:0!important;right:0!important;bottom:0!important;}
    }
    </style>
</head>
<body>

<?php include("includes/header.php"); ?>

<!-- Content -->
<div class="container-fluid">
    <div class="row min-vh-70 align-content-between">

        <div class="col-12">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 offset-md-1 col-lg-5 mx-auto my-5">
                        <div class="px-xl-4">
                            <div class="bg-white rounded-ultra shadow-lg px-4 py-5 py-md-3 my-5">

                                <div class="mb-4 text-center">
                                    <img src="assets/images/reset-password.png" alt="Password reset" data-width="64px" data-height="64px">
                                </div>

                                <div class="pb-1"></div>

                                <h3 class="section-title-4 text-center font-weight-800 mb-3">
                                    Forgot Password
                                </h3>

                                <form>
                                    <div id="error-msg" class="text-center"></div>
                                    <div id="success" class="text-center text-success mb-3"></div>
                                    <div class="input-group input-group-lg input-group-round mb-4">
                                        <!--<label class="px-3">Email</label>-->
                                        <div class="input-group-inner">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text input-group-icon"><i class="far fa-envelope"></i></span>
                                            </div>
                                            <input type="email" id="email" class="form-control form-control-lg" placeholder="Email address" value="<?php echo $_POST['userid']; ?>" readonly="readonly">
                                            <div class="input-focus-bg"></div>
                                        </div>
                                        <span class="error"></span>
                                    </div>
                                    <div class="btnCont">
                                        <button type="button" id="recover" class="btn btn-lg btn-round btn-indigo btn-block"><i class="fas fa-unlock-alt"></i>Reset Password</button>
                                        
                                    </div>
                                    <label class="w-100 text-center py-2 mb-0">
                                        Remember your password? <a href="login">Login</a>
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
<script src="node_modules/jquery-circle-progress/dist/circle-progress.min.js"></script>
<script src="assets/js/custom.js"></script>
<script type="text/javascript">
$("#recover" ).click(function(){
    var email = $("#email").val();
    email_regex  = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{3,4}$/i;
    if( email.length==0 )
    { 
        $(".error").text('Enter Email Address'); 
        $(".error").attr("style", "color: #e53935 !important");
    } 
    else if(!email_regex.test(email))
    { 
        $(".error").text('Enter Valid Email Address'); 
        $(".error").attr("style", "color: #e53935 !important");
    } 
    else{
        $(".error").attr("style", "color: #e53935 !important");
        $("#recover").attr("disabled", "disabled");
        $.ajax({
            url: "ajax/forgot-password.php",
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
</body>
</html>