<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="assets/favicon.ico">
    <title>gsm2go eSIM | Forgot Password</title>
    <?php include("includes/logrocket.php"); ?>
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
    
    
    
    
    
.login-box .user-box {
  position: relative; display: block !important;
}
            
.login-box .user-box input {
    width: 100%;
    padding: 12px 12px 12px 14px !important;
    color: #000;
    margin-bottom: 30px;
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
    top: -13px;
    left: 12px;
    padding: 2px 3px;
    font-size: 15px;
    color: #939393;
    pointer-events: none;
    transition: .5s;
    background: #fff;
    font-weight: 500;
    margin-bottom: 0;
    
}

.login-box .user-box input:focus ~ label,
.login-box .user-box input:valid ~ label {
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

    .form-control:focus{box-shadow:none !important;}
    
    .user-box .icn {
    position: absolute;
    right:13px;
    top:13px;
    border-radius: 15px;
}

.user-box input:hover {border-color: #000;}
.user-box input:hover ~ label {
    color: #000;
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
                            <div class="bg-white login-box rounded-ultra shadow-lg px-4 py-5 py-md-3 my-5">

                                <div class="mb-4 text-center">
                                    <img src="assets/images/reset-password.png" alt="Password reset" data-width="64px" data-height="64px">
                                </div>

                                <div class="pb-1"></div>

                                <h3 class="section-title-4 text-center font-weight-800 mb-3">
                                    Forgot Password
                                </h3>

                                <form name="registration" >
                                    <div id="error-msg" class="text-center"></div>
                                    <div id="success" class="text-center text-success mb-3"></div>
                                    <!--<div class="input-group input-group-lg input-group-round mb-4">-->
                                        <!--<label class="px-3">Email</label>-->
                                    <!--    <div class="input-group-inner">-->
                                    <!--        <div class="input-group-prepend">-->
                                    <!--            <span class="input-group-text input-group-icon"><i class="far fa-envelope"></i></span>-->
                                    <!--        </div>-->
                                    <!--        <input type="email" id="email" class="form-control form-control-lg" placeholder="Email address" value="<?php echo $_POST['userid']; ?>" readonly="readonly">-->
                                    <!--        <div class="input-focus-bg"></div>-->
                                    <!--    </div>-->
                                    <!--    <span class="error"></span>-->
                                    <!--</div>-->
                                    
                                    
                            <div class="user-box">
                                <input class="form-control form-text " type="email" required="" for="email" name="email" id="email" placeholder="" value="<?php echo $_POST['userid']; ?>" readonly="readonly">
                                 <label>Email</label>
                  <!--<span class="input-group-text" id="basic-addon1" onclick="document.getElementById('username').value = ''">-->
              <!--<span class="input-group-text input-group-icon icn"><i class="far fa-envelope"></i></span>-->
              <!--       </span>-->
 <span class="error"></span>
 <label id="email-error" class="error" for="email" style="display: none;"></label>
                           </div>
                                  
                                    
                                    
                                    
                                    <div class="btnCont">
                                        <button type="button " id="recover" class="btn btn-lg btn-round btn-indigo btn-block login-btn"><i class="fas fa-unlock-alt"></i>Reset Password</button>
                                        
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


<script>


$("form[name='registration']").validate({
  // Specify validation rules
  rules: {
    // The key name on the left side is the name attribute
    // of an input field. Validation rules are defined
    // on the right side
    firstname: "required",
    lastname: "required",
    email: {
      required: true,
      // Specify that email should be validated
      // by the built-in "email" rule
      email: true
    },
    password: {
      required: true,
      minlength: 5
    }
  },
  // Specify validation error messages
  messages: {
    firstname: "Please enter your firstname",
    lastname: "Please enter your lastname",
    password: {
      required: "Please provide a password",
      minlength: "Your password must be at least 5 characters long"
    },
    email: "Please enter a valid email address"
  },
  // Make sure the form is submitted to the destination defined
  // in the "action" attribute of the form when valid
  submitHandler: function(form) {
    form.submit();
  }
});

    
</script>

</body>
</html>