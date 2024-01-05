<?php
session_start();
if(isset($_SESSION['user'],$_SESSION['role']) && $_SESSION['role']=="A")
{
    echo "<script>window.location.href='companies.php'</script>";
}
// if(isset($_SESSION['user'],$_SESSION['type']) && $_SESSION['type']=="Dealer")
// {
//     echo "<script>window.location.href='activation.php'</script>";
// }
// if(isset($_SESSION['user'],$_SESSION['type']) && $_SESSION['type']=="User")
// {
//     echo "<script>window.location.href='activation.php'</script>";
// }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>gsm2go | Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="shortcut icon" href="assets/images/favicon.ico">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" id="bootstrap-stylesheet" />
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css"  id="app-stylesheet" />
</head>
<body class="authentication-page">

<div class="account-pages my-5 pt-md-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5">
                <div class="card mt-4">

                    <div class="card-body p-4">
                        <div class="text-center mb-4">
                            <h5 class="text">Sign-in</h5>
                        </div>
                        
                        <form class="p-2">
                            <div class="form-group mb-3">
                                <label>Email</label>
                                
                                <input class="form-control" type="email" id="email" placeholder="Enter Email">
                            </div>
                            <div class="form-group mb-3">
                                <label>Password</label>
                                <input class="form-control" type="password" id="pass" placeholder="Enter Password">
                            </div>
                            <div class="form-group mb-2">
                                <button class="btn btn-primary btn-bordered-primary btn-block waves-effect waves-light" type="button" id="login"> Log In </button>
                            </div>
                            <div class="form-group mb-0 text-center font-weight-bold" id="error"></div>
                            <!--<a href="pages-recoverpw.html" class="text-muted"><i class="mdi mdi-lock mr-1"></i> Forgot your password?</a>-->
                        </form>

                    </div> <!-- end card-body -->
                </div>
                <!-- end card -->

            </div> <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</div>
<!-- end page -->

<!-- Vendor js -->
<script src="assets/js/vendor.min.js"></script>
<script src="assets/js/app.min.js"></script>
<script type="text/javascript">
$("#pass").keypress(function(e) {
    if(e.which == 13) {
        $('#login').click();
    }
});

$("#login").click(function(){

    var email    = $("#email").val();
    var pass     = $("#pass").val();
    var email_regex  = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i;
    
    if ( email.length < 1 ) 
    {
        $("#error").html('<span class="text-primary">Please Enter Email Address</span>'); 
    } 
    else if(!email_regex.test(email))
    { 
        $("#error").html('<span class="text-primary">Please Enter Valid Email Address</span>'); 
    }
    else if ( pass.length < 1 ) 
    {
        $("#error").html('<span class="text-primary">Please Enter Password</span>'); 
    } 
    else if ( pass.length < 5 ) 
    {
        $("#error").html('<span class="text-primary">Password Must be Minimum 5 Letter</span>'); 
    } 
    else 
    {
        $.ajax({
            url: "ajax/signin.php",
            type: "POST",
            data: { email:email,pass:pass },
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