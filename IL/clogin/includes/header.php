<!-- Topbar Start -->
<div class="navbar-custom">
    <ul class="list-unstyled topnav-menu float-right mb-0">
        <li class="dropdown notification-list">
            <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                <img src="assets/images/avatar.jpg" alt="user-image" class="rounded-circle">
            </a>
            <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                <!-- item-->
                <div class="dropdown-header noti-title">
                    <h6 class="text-overflow m-0">Welcome <?php echo $_SESSION['name']; ?></h6>
                </div>
                <!--<a href="javascript:void(0);" class="dropdown-item notify-item">-->
                <!--    <i class="mdi mdi-account-outline"></i>-->
                <!--    <span>Profile</span>-->
                <!--</a>-->
                <!--<a href="javascript:void(0);" class="dropdown-item notify-item">-->
                <!--    <i class="mdi mdi-settings-outline"></i>-->
                <!--    <span>Settings</span>-->
                <!--</a>-->
                <div class="dropdown-divider"></div>
                <a href="logout.php" class="dropdown-item notify-item">
                    <i class="mdi mdi-logout-variant"></i>
                    <span>Logout</span>
                </a>

            </div>
        </li>

    </ul>

    <!-- LOGO -->
    <div class="logo-box">
        <a href="activation.php" class="logo text-center">
            <span class="logo-lg">
                <!--<img src="../assets/images/logo-light.png" alt="" height="16">-->
                 <span class="logo-lg-text-light">gsm2go</span> 
            </span>
            <span class="logo-sm">
                 <span class="logo-sm-text-dark">gsm2go</span> 
                <!--<img src="../assets/images/logo-sm.png" alt="" height="22">-->
            </span>
        </a>
    </div>

    <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
        <li>
            <button class="button-menu-mobile waves-effect text-white">
                <i class="mdi mdi-menu"></i>
            </button>
        </li>

        <li class="dropdown dropdown-mega d-none d-lg-block">
            <h6 class="nav-link my-0 text-white">
                <?php echo $_SESSION['type'];  if($_SESSION['type']=="Dealer"){ echo ' - '.$_SESSION['dealer']; }?>
            </h6>
            <!--<a class="nav-link dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">-->
            <!--    Mega Menu-->
            <!--    <i class="mdi mdi-chevron-down"></i> -->
            <!--</a>-->
            <div class="dropdown-menu dropdown-megamenu">
                <div class="row">
                    <div class="col-sm-3">
                        <a href="index.html">
                            <img src="assets/images/logo.png" alt="" height="16">
                        </a>
                        <h5 class="font-15 mt-3 mb-5">Bootstrap 4 Responsive admin Template</h5>

                        <h5 class="font-14 mt-0"><i class="mdi mdi-purse-outline mr-1"></i> UI Components</h5>

                        <div class="row">
                            <div class="col-6">
                                <ul class="list-unstyled megamenu-list">
                                    <li><a href="javascript:void(0);">Buttons</a></li>
                                    <li><a href="javascript:void(0);">Cards</a></li>
                                    <li><a href="javascript:void(0);">Typography </a></li>
                                </ul>
                            </div>
                            <div class="col-6">
                                <ul class="list-unstyled megamenu-list">
                                    <li><a href="javascript:void(0);">Checkboxs-Radios</a></li>
                                    <li><a href="javascript:void(0);">Modals</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div>
                            <h5 class="font-16 mt-0">Components</h5>

                            <div class="text-center">
                                <div class="row border-bottom">
                                    <div class="col-4 p-0">
                                        <a href="#">
                                            <div class="p-3 border-right">
                                                <i class="mdi mdi-shape-outline font-22"></i>

                                                <h5 class="font-14">Widgets</h5>
                                            </div>
                                        </a>
                                    </div>
                        
                                    <div class="col-4 p-0">
                                        <a href="#">
                                            <div class="p-3 border-right">
                                                <i class="mdi mdi-clipboard-text-outline font-22"></i>

                                                <h5 class="font-14">Forms</h5>
                                            </div>
                                        </a>
                                    </div>

                                    <div class="col-4 p-0">
                                        <a href="#">
                                            <div class="p-3">
                                                <i class="mdi mdi-dns-outline font-22"></i>

                                                <h5 class="font-14">Tables</h5>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4 p-0">
                                        <a href="#">
                                            <div class="p-3 border-right">
                                                <i class="mdi mdi-chart-arc font-22"></i>

                                                <h5 class="font-14">Charts</h5>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-4 p-0">
                                        <a href="#">
                                            <div class="p-3 border-right">
                                                <i class="mdi mdi-map-marker-outline font-22"></i>

                                                <h5 class="font-14">Maps</h5>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-4 p-0">
                                        <a href="#">
                                            <div class="p-3">
                                                <i class="mdi mdi-speedometer font-22"></i>

                                                <h5 class="font-14">Dashboard</h5>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>

                
                        </div>
                    </div>

                    <div class="col-sm-2 offset-lg-1">
                        <div class="p-2">
                            <div class="media mb-3">
                                <div class="mr-3">
                                    <i class="fab fa-bootstrap text-primary font-22"></i>
                                </div>

                                <div class="media-body">
                                    <h5 class="font-14 mt-1">Bootstrap v4.3.1</h5>
                                </div>
                            </div>
                            <div class="media mb-3">
                                <div class="mr-3">
                                    <i class="fab fa-npm text-primary font-22"></i>
                                </div>

                                <div class="media-body">
                                    <h5 class="font-14 mt-1">Npm</h5>
                                </div>
                            </div>
                            <div class="media mb-3">
                                <div class="mr-3">
                                    <i class="fab fa-sass text-primary font-22"></i>
                                </div>

                                <div class="media-body">
                                    <h5 class="font-14 mt-1">Sass support</h5>
                                </div>
                            </div>
                            <div class="media mb-3">
                                <div class="mr-3">
                                    <i class="fas fa-tablet-alt text-primary font-22"></i>
                                </div>

                                <div class="media-body">
                                    <h5 class="font-14 mt-1">Responsive</h5>
                                </div>
                            </div>
                            <div class="media">
                                <div class="mr-3">
                                    <i class="fas fa-exchange-alt text-primary font-22"></i>
                                </div>

                                <div class="media-body">
                                    <h5 class="font-14 mt-1">RTL supported</h5>
                                </div>
                            </div>
                        </div>
                    </div>
  
                    <div class="col-sm-3">
                        <div class="text-center">
                            <h5 class="mt-0">Special Discount Sale!</h5>

                            <h5 class="font-16 mt-4">Save up to <span class="text-primary">60%</span> off.</h5>
                            <p class="text-muted">Get free updates lifetime</p>
                            <a href="#" class="btn btn-primary btn-rounded">Download Now</a>

                        </div>
                    </div>
                </div>

            </div>
        </li>
    </ul>
</div>
<!-- end Topbar -->