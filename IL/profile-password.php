<?php
session_start();
if(isset($_SESSION['user']) && ($_SESSION['role']=="U")){
include("includes/config.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="assets/favicon.ico">
    <title>gsm2go eSIM | Profile Password</title>
    <?php include("includes/logrocket.php"); ?>
    <link rel="stylesheet" href="node_modules/%40fortawesome/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="node_modules/animate.css/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="node_modules/%40fancyapps/fancybox/dist/jquery.fancybox.min.css">
    <link rel="stylesheet" href="node_modules/owl.carousel/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="node_modules/owl.carousel/dist/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="assets/css/style.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;subset=latin-ext" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i,900,900i&amp;subset=latin-ext" rel="stylesheet">

       <!-- new css link start -->
    
       <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- new css link end  -->
    <style>

               /* rtl start  */

               .navik-header-container{
    display:flex;
    align-items: center;
    justify-content: space-between;
}
.topcorner {
    position: absolute;
    top: 15px;
    left: 0;
}
.shoppingbasket {
    width: 40px;
    height: 40px;
    background-color: #fff;
    top: 10px;
}
nav.navik-menu ul {
    direction: rtl;
}
.container-fluid.d-none1 .row{
    justify-content: right;
}
/* .footer-bottom-container {
    direction: rtl;
} */
.col-lg-6.text-center.text-lg-right {
    display: flex;
    justify-content: end;
    direction: rtl;
}
.col-lg-6.text-center.text-lg-left.mb-2.mb-lg-0 {
    display: flex;
    align-items: start;
    direction: rtl;
}
.navik-header.sticky .logo{
    padding: 0;
}
.btn.btn-lg.btn-round.btn-outline-light.mb-0 i{
    margin-left: 10px;
    direction: rtl;
}
.section.mt-up75 .row{
    direction: rtl;
}
.list-group-item span{
    font-size: 15px;
}
@media(max-width: 1280px){
    .topcorner {
    left: 100px;
}
.navik-menu {
    background-color: #fff;
    position: absolute;
    z-index: 1;
    width: 100%;
    left: 0;
    top: 0;
}
.navik-header-container {
    justify-content: stretch;
}
nav.navik-menu ul {
    direction: rtl;
    padding-top: 70px;
}
.navik-header .logo img {
    width: 150px;
    margin-left: 0;
}
.body-fixed-sidebar, .navik-header, .navik-header-overlay{
        padding: 0 !important;
    }
        }

        @media(max-width: 991px){
.col-lg-6.text-center.text-lg-left.mb-2.mb-lg-0 {
    justify-content: center;
}
.col-lg-6.text-center.text-lg-right {
    justify-content: center;
}
.breadcrumb {
    justify-content: right !important;
}

}
 

        @media(max-width: 575px){
    .col-lg-6.text-center.text-lg-left.mb-2.mb-lg-0{
        justify-content: center !important;
    }
    .footer-bottom-container .row{
        margin: 0 !important;
    }
    .body-fixed-sidebar, .navik-header, .navik-header-overlay{
        padding: 0 !important;
    }
    .info-section{
        padding: 0 !important;
    }
    .main-content{
        padding-left: 0 !important;
        padding-right: 0 !important;
        padding-bottom: 20px !important;
    }
 }

 /* new css start  */

 @media(min-width: 1400px){
        .container{
            max-width: 1260px;
        }
    }
    @media(max-width: 1199px){
            .topcorner {
            right: -10px !important;
        }
        }
        .navik-header-container {
    padding-right: 40px!important;
}

 /* new css end  */

    </style>



</head>
<body>
<?php include("includes/header.php"); ?>

<!-- Page title -->
<div class="container">
<div class="d-flex flex-column w-100">
    <div class="page-title d-flex align-items-center bg-image py-5" data-img-src="assets/images/upload/page-title-bg-25.jpg">
        <div class="container page-title-container">

            <div class="row align-items-center py-5" style="direction: rtl;">

                <div class="col-lg-8 col-xl-9 text-center text-lg-left">
                    <h1 class="display-5 font-weight-800 text-white mb-0 text-right">
                        Profile Password
                    </h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-light-2 justify-content-center justify-content-lg-start px-0 mb-0">
                            <li class="breadcrumb-item text-uppercase"><a href="dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item text-uppercase text-nowrap active" aria-current="page">Profile Password</li>
                        </ol>
                    </nav>
                </div>

                <div class="col-lg-4 col-xl-3 d-none d-lg-block text-right">
                    <a href="logout" class="btn btn-lg btn-round btn-outline-light mb-0"><i class="fas fa-sign-out-alt"></i>Log Out</a>
                </div>

            </div>

            <div data-height="40px"></div>

        </div>
    </div>
</div>
</div>

<!-- Content -->
<div class="main-content bg-light px-5 pt-0">

    <div class="section mt-up75">
        <div class="container">
            <div class="row">

                <!-- Sidebar -->
                <div class="col-lg-3">
                    <div class="pb-3 mb-3">
                        <div class="bg-white rounded-xl shadow-sm py-5">

                            <div class="px-4 px-md-5 px-lg-4 px-xl-5 text-right">

                                <div data-height="1px"></div>

                                <h5 class="font-weight-700 mb-0"><?php echo $_SESSION['name']; ?></h5>
                                <small><?php echo $_SESSION['user']; ?></small>

                            </div>

                            <div class="text-center d-lg-none">
                                <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                                    <i class="fas fa-bars fa-lg text-dark mt-4"></i>
                                </button>
                            </div>

                            <div id="sidebarMenu" class="collapse">

                                <h5 class="font-weight-700 px-4 px-md-5 px-lg-4 px-xl-5 pt-3 mt-4 mb-3 text-right">Account</h5>

                                <ul class="list-group list-group-flush pt-0">
                                    <a href="orders" class="list-group-item list-group-item-action d-flex align-items-center px-4 px-md-5 px-lg-4 px-xl-5">
                                        <img src="assets/svg/upload/account-user-info.svg" alt="icon" class="mr-2" data-width="16px" data-height="16px">
                                        <span>Orders</span>
                                    </a>
                                    <a href="profile" class="list-group-item list-group-item-action d-flex align-items-center px-4 px-md-5 px-lg-4 px-xl-5">
                                        <img src="assets/svg/upload/account-user-info.svg" alt="icon" class="mr-2" data-width="16px" data-height="16px">
                                        <span>Personal information</span>
                                    </a>
                                    <a href="profile-password" class="list-group-item active list-group-item-action d-flex align-items-center px-4 px-md-5 px-lg-4 px-xl-5">
                                        <img src="assets/svg/upload/account-preferences.svg" alt="icon" class="mr-2" data-width="16px" data-height="16px">
                                        <span>Password</span>
                                    </a>
                                    <a href="logout" class="list-group-item list-group-item-action d-flex align-items-center px-4 px-md-5 px-lg-4 px-xl-5">
                                        <img src="assets/svg/upload/account-logout.svg" alt="icon" class="mr-2" data-width="16px" data-height="16px">
                                        <span>Log out</span>
                                    </a>
                                </ul>


                            </div>

                        </div>
                    </div>
                </div>

                <!-- Content body -->
                <div class="col-lg-9">

                    <div class="pb-3 mb-3">
                        <div class="bg-white rounded-xl shadow-sm px-4 py-5 p-md-5">

                            <h5 class="font-weight-700 section-title-4 text-right pb-2 mb-4">
                                Change Password
                                <div class="title-divider-round mt-3"></div>
                            </h5>

                            <form id="password-form">
                                <div class="form-row">

                                    <div class="col-md-8">
                                        <div class="input-group input-group-lg input-group-round mb-4">
                                            <label class="text-uppercase">Current password</label>
                                            <div class="input-group-inner">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text input-group-icon"><i class="fas fa-unlock-alt"></i></span>
                                                </div>
                                                <input type="password" id="cpass" class="form-control form-control-lg" placeholder="Enter current password">
                                                <div class="input-focus-bg"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-8">
                                        <div class="input-group input-group-lg input-group-round mb-4">
                                            <label class="text-uppercase">New password</label>
                                            <div class="input-group-inner">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text input-group-icon"><i class="fas fa-lock"></i></span>
                                                </div>
                                                <input type="password" id="npass" class="form-control form-control-lg" placeholder="Enter new password">
                                                <div class="input-focus-bg"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-8">
                                        <div class="input-group input-group-lg input-group-round mb-4">
                                            <label class="text-uppercase">Confirm new password</label>
                                            <div class="input-group-inner">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text input-group-icon"><i class="fas fa-lock"></i></span>
                                                </div>
                                                <input type="password" id="rpass" class="form-control form-control-lg" placeholder="Confirm your new password">
                                                <div class="input-focus-bg"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-8">
                                        <div class="text-md-right">
                                            <button type="button" id="update-password" class="btn btn-lg btn-round btn-primary">Update Password</button>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-8" id="error1"></div>

                                </div>
                            </form>
                            
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>

</div>
<!-- Button trigger modal -->

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Select languages</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex flex-wrap">
                    <div class="row">
                        <div class="col-3 d-flex">
                            <a href="https://dev.mysimaccess.com/IL/index" class="select-languages">
                                <h2>English</h2>
                            </a>
                            <a href="https://dev.mysimaccess.com/IL/index" class="select-languages">
                                <h2>Hebrew</h2>
                            </a>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- Footer -->
<?php include("includes/footer.php"); ?>

<!-- Go to top -->
<div class="go-to-top">
    <a href="#" class="rounded-circle"><i class="fas fa-chevron-up"></i></a>
</div>

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
<script>
$(function () {
    $('.tooltip-info').tooltip()
})
</script>
<script>
$("#update-password").click(function(){

    var cpass = $("#cpass").val();
    var npass = $("#npass").val();
    var rpass = $("#rpass").val();

    if(cpass==""){
        alert("Please Enter Current Password");
    }
    else if(cpass.length < 5){
        alert("Current password should be minimum 5 characters");
    }
    else if(npass==""){
        alert("Please Enter New Password");
    }
    else if(npass.length < 5){
        alert("New password should be minimum 5 characters");
    }
    else if(rpass==""){
        alert("Please Enter Repeat Password");
    }
    else if(rpass.length < 5){
        alert("Repeat password should be minimum 5 characters");
    }
    else if(npass!=rpass){
        alert("Repeat Password Not Matching");
    }
    else{
        $.ajax({
            url: "ajax/profile-password.php",
            type: "post",
            data: { cpass:cpass,npass:npass,rpass:rpass },
            success: function(data) {
                $("#error1").html(data);
            },
        })
    }
});
</script>
</body>
</html>
<?php } else{ include("login.php"); } ?>