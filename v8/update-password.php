<?php
session_start();
if(isset($_SESSION['userId']) && isset($_GET['direct'])) {
    header('Location:checkout.php?id='.$_GET['direct'].'&esim=yes');
} else if(isset($_SESSION['userId']) && !isset($_GET['direct'])) {
    header('Location:index.php');
} else if(!isset($_POST['id']) && empty($_POST['id'])) {
    include("login.php");
} else{
    include("includes/config.php"); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="assets/favicon.ico">
    <title>gsm2go eSIM | Update Password</title>
    <link rel="stylesheet" href="node_modules/%40fortawesome/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="node_modules/animate.css/animate.min.css">
    <link rel="stylesheet" href="node_modules/%40fancyapps/fancybox/dist/jquery.fancybox.min.css">
    <link rel="stylesheet" href="node_modules/owl.carousel/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="node_modules/owl.carousel/dist/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="assets/css/style.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;subset=latin-ext" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i,900,900i&amp;subset=latin-ext" rel="stylesheet">
    <style>
        label{ font-size:inherit; }
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
                                    Create new password
                                    <div class="title-divider-round"></div>
                                </h3>
                                <div id="error-msg" class="text-center col-md-12">
                                    <?php if(isset($_GET['userid']) && !empty($_GET['userid'])){ echo '<div class="alert alert-success mb-0 mx-2" style="padding:8px" role="alert">Password Updated Successfully</div>'; } ?>
                                </div>
                                <div class="font-weight-600">
                                <?php
                                $codeid = base64_decode($_POST['id']);
                                $select = mysqli_query($con, "select * from password_request where id='$codeid' ");
                                $row = mysqli_fetch_assoc($select);
                                ?>
                                </div>
                                <form id="passwordform">
                                    <div class="input-group input-group-lg input-group-round mb-0">
                                        <label class="font-weight-600 px-3"><?php echo $row['email']; ?></label>
                                        <div class="input-group-inner">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text input-group-icon" id="eye1"><i class="far fa-eye-slash"></i></span>
                                            </div>
                                            <input type="hidden" id="codeid" value="<?php echo $row['id']; ?>">
                                            <input type="hidden" id="email" value="<?php echo $row['email']; ?>">
                                            <input type="hidden" id="code" value="<?php echo $row['code']; ?>">
                                            <input type="password" class="form-control form-control-lg" id="npass" placeholder="New Password" tabindex="1">
                                            <div class="input-focus-bg"></div>
                                        </div>
                                        <span class="err1 w-100 text-white font-weight-500" style="font-size:12px">Required</span>
                                    </div>
                                    <div class="input-group input-group-lg input-group-round mb-2">
                                        <div class="input-group-inner">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text input-group-icon" id="eye2"><i class="far fa-eye-slash"></i></span>
                                            </div>
                                            <input type="password" id="rpass" class="form-control form-control-lg" placeholder="Repeat Password" tabindex="2">
                                            <div class="input-focus-bg"></div>
                                        </div>
                                        <span class="err2 w-100 text-white font-weight-500" style="font-size:12px">Required Password</span>
                                    </div>
                                    <div data-height="5px"></div>
                                    <button type="button" id="update-password" class="btn btn-lg btn-round btn-indigo btn-block mb-0" disabled="disabled">Save changes and sign in</button>
                                    <label class="w-100 text-center py-3 mb-0">
                                        Don't have an account? <a href="signup.php" id="signup-url">Signup</a>
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
$("#npass").focus();

$("#eye1").click(function () {
    if ($("#npass").attr("type") === "password") {
        $("#npass").attr("type", "text");
        $("i","#eye1").attr("class", 'fa fa-eye-slash');
    } else {
        $("#npass").attr("type", "password");
        $("i","#eye1").attr("class", 'fa fa-eye');
    }
});
$("#eye2").click(function () {
    if ($("#rpass").attr("type") === "password") {
        $("#rpass").attr("type", "text");
        $("i","#eye2").attr("class", 'fa fa-eye-slash');
    } else {
        $("#rpass").attr("type", "password");
        $("i","#eye2").attr("class", 'fa fa-eye');
    }
});
</script>
<script>
$('#npass').keyup(function() {
    var npass = $("#npass").val().length;
    var rpass = $("#rpass").val().length;
    
    if(npass == 0){
        $('#update-password').attr("disabled", "disabled");
        $("#npass ~ .input-focus-bg").attr("style", "border-color: #e0e0e0 !important;");
    } 
    else if(npass < 5){
        $('#update-password').attr("disabled", "disabled");
        $("#npass ~ .input-focus-bg").attr("style", "border-color: #fe0000 !important;");
    } 
    else if($("#npass").val() != $("#rpass").val() && rpass!=0)
    {
        $('#update-password').attr("disabled", "disabled");
        $("#npass ~ .input-focus-bg").attr("style", "border-color: #fe0000 !important;");
    }
    else{
        $('#update-password').removeAttr("disabled");
        $("#npass ~ .input-focus-bg").attr("style", "border-color: #66bb6a !important;");
    }
});
$("#npass").focusout(function(){
    $("#npass ~ .input-focus-bg").attr("style", "border-color: #e0e0e0 !important;");
});
$('#rpass').keyup(function() {
    var npass = $("#npass").val().length;
    var rpass = $("#rpass").val().length;
    
    if(rpass == 0){
        $('#update-password').attr("disabled", "disabled");
        $("#rpass ~ .input-focus-bg").attr("style", "border-color: #e0e0e0 !important;");
    } 
    else if($("#npass").val() != $("#rpass").val()){
        $('#update-password').attr("disabled", "disabled");
        $("#rpass ~ .input-focus-bg").attr("style", "border-color: #fe0000 !important;");
    } 
    else if(rpass < 5){
        $('#update-password').attr("disabled", "disabled");
        $("#rpass ~ .input-focus-bg").attr("style", "border-color: #fe0000 !important;");
    } 
    else{
        $('#update-password').removeAttr("disabled");
        $("#rpass ~ .input-focus-bg").attr("style", "border-color: #66bb6a !important;");
    }
    

});
$("#rpass").focusout(function(){
    $("#rpass ~ .input-focus-bg").attr("style", "border-color: #e0e0e0 !important;");
});
</script>
<script type="text/javascript">
$("#update-password").click(function(){

    var codeid = $("#codeid").val();
    var email  = $("#email").val();
    var code   = $("#code").val();
    var npass  = $("#npass").val();
    var rpass  = $("#rpass").val();


    if(codeid.length == 0){ }
    else if(email.length == 0){ }
    else if(code.length != 6){ }
    else if(npass =="")
    {
        $(".err1").text("Enter New password");
        $(".err1").attr("style", "color: #e53935 !important");
    }
    else if(rpass =="")
    {
        $(".err2").text("Enter Repeat Password");
        $(".err2").attr("style", "color: #e53935 !important");
    }
    else if(npass != rpass)
    {
        $(".err2").text("Repeat Password Not Matching");
        $(".err2").attr("style", "color: #e53935 !important");
    }
    else
    {
        $.ajax({
            url: "ajax/update-password.php",
            type: "POST",
            data: { codeid:codeid,email:email,code:code,npass:npass,rpass:rpass },
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
<?php } ?>