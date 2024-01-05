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
    <title>gsm2go eSIM | Profile</title>
    <?php include("includes/logrocket.php"); ?>
    <link rel="stylesheet" href="node_modules/%40fortawesome/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="node_modules/animate.css/animate.min.css">
    <link rel="stylesheet" href="node_modules/%40fancyapps/fancybox/dist/jquery.fancybox.min.css">
    <link rel="stylesheet" href="node_modules/owl.carousel/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="node_modules/owl.carousel/dist/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="assets/css/style.min.test.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;subset=latin-ext" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i,900,900i&amp;subset=latin-ext" rel="stylesheet">
</head>
<body>

<?php include("includes/header-test.php"); ?>

<!-- Page title -->
<div class="d-flex flex-column w-100">
    <div class="page-title d-flex align-items-center bg-image py-5" data-img-src="assets/images/upload/page-title-bg-25.jpg">
        <div class="container page-title-container">

            <div class="row align-items-center py-5">

                <div class="col-lg-8 col-xl-9 text-center text-lg-left">
                    <h1 class="display-5 font-weight-800 text-white mb-0">
                        Personal Information
                    </h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-light-2 justify-content-center justify-content-lg-start px-0 mb-0">
                            <li class="breadcrumb-item text-uppercase"><a href="dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item text-uppercase text-nowrap active" aria-current="page">Profile</li>
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

<!-- Content -->
<div class="main-content bg-light pt-0 px-5">
    <div class="section mt-up75">
        <div class="container-fluid">
            <div class="row">

                <!-- Sidebar -->
                <div class="col-lg-3">
                    <div class="pb-3 mb-3">
                        <div class="bg-white rounded-xl shadow-sm py-5">

                            <div class="px-4 px-md-5 px-lg-4 px-xl-5">
                                <div data-height="1px"></div>
                                <h5 class="font-weight-700 mb-0"><?php echo $_SESSION['name']; ?></h5>
                                <small><?php echo $_SESSION['user']; ?></small>
                            </div>

                            <div class="text-center d-lg-none">
                                <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                                    <i class="fas fa-bars fa-lg text-dark mt-4"></i>
                                </button>
                            </div>

                            <div id="sidebarMenu" class="d-lg-block collapse">
                                <h5 class="font-weight-700 px-4 px-md-5 px-lg-4 px-xl-5 pt-3 mt-4 mb-3">Account</h5>
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

                            <h5 class="font-weight-700 section-title-4 text-left pb-2 mb-4">
                                Personal Information
                                <div class="title-divider-round mt-3"></div>
                            </h5>
                            <?php
                            $select_profile = mysqli_query($con, "Select * from users where email='".$_SESSION['user']."' AND role='".$_SESSION['role']."'");
                            $row = mysqli_fetch_assoc($select_profile);
                            ?>
                            <form>
                                <div class="form-row">

                                    <div class="col-md-6">
                                        <div class="input-group input-group-lg input-group-round mb-4 pr-md-2">
                                            <label class="text-uppercase">First Name</label>
                                            <div class="input-group-inner">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text input-group-icon"><i class="fas fa-user-circle"></i></span>
                                                </div>
                                                <input type="text" id='fname' class="form-control form-control-lg" placeholder="Enter First Name" value="<?php echo $row['fname']; ?>">
                                                <div class="input-focus-bg"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-group input-group-lg input-group-round mb-4 pr-md-2">
                                            <label class="text-uppercase">Last Name</label>
                                            <div class="input-group-inner">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text input-group-icon"><i class="fas fa-user-circle"></i></span>
                                                </div>
                                                <input type="text" id='lname' class="form-control form-control-lg" placeholder="Enter Last Name" value="<?php echo $row['lname']; ?>">
                                                <div class="input-focus-bg"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="input-group input-group-lg input-group-round mb-4 pl-md-2">
                                            <label class="text-uppercase">Email</label>
                                            <div class="input-group-inner">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text input-group-icon"><i class="fas fa-envelope-open-text"></i></span>
                                                </div>
                                                <input type="email" id='email' class="form-control form-control-lg" placeholder="Enter Email Address" value="<?php echo $row['email']; ?>" readonly>
                                                <div class="input-focus-bg"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="input-group input-group-lg input-group-round mb-4 pr-md-2">
                                            <label class="text-uppercase">Phone</label>
                                            <div class="input-group-inner">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text input-group-icon"><i class="fas fa-mobile-alt"></i></span>
                                                </div>
                                                <input type="text" id="mobile" class="form-control form-control-lg" placeholder="Enter Mobile Number" value="<?php echo $row['mobile']; ?>">
                                                <div class="input-focus-bg"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="text-md-right">
                                            <button type="button" id="insert" class="btn btn-lg btn-round btn-primary ml-2">Save Changes</button>
                                        </div>
                                    </div>
                                    
                                    <div id="error-msg" class="col-12"></div>

                                </div>
                            </form>
                            
                        </div>
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
<script type="text/javascript">
$("#insert" ).click(function(){

    var fname   = $("#fname").val();
    var lname   = $("#lname").val();
    var mobile  = $("#mobile").val();
    var email   = $("#email").val();
    var company = $("#company").val();
    
    $('#insert').attr("disabled", "disabled");
    $.ajax({
        url: "ajax/update-profile.php",
        type: "POST",
        data: { fname:fname,lname:lname,mobile:mobile,email:email },
        success:function(data,status)
        {
            $("#error-msg").html(data);
        }
    });
});
</script>
</body>
</html>
<?php } else{ include("login.php"); } ?>