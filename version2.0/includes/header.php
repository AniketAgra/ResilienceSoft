<style>
@media screen and (min-width: 1280px) { 
    .text-world{ padding-top:7px !important;width:35%; }
}
@media screen and (min-width: 771px) and (max-device-width: 1280px) { 
    .text-world{ padding-top:40px !important;width:35%; }
}
@media only screen and (max-device-width: 770px) {
    .text-world{ display:none; }
}
@media only screen and (max-device-width: 991px) {
    .tagline-slogen{ display:none; }
}
.topcorner{
    position:absolute;
    top:15px;
    right: 10px;
 }
 
 .shoppingbasket {
  width:40px;
  height:40px;
  background-color:#fff;
  position:absolute;
  top:10px;
  right:13%;
}
.basketitems {
  color:#fff;
  font-size:75%;
  background-color:#e74c3c;
  position:absolute;
  top:20%;
  left:50%;
  -webkit-transform:translate(-50%,-90%);
  -moz-transform:translate(-50%,-90%);
  transform:translate(-50%,-90%);
  padding:0 12%;
  border-radius:1500px;
}

img.cart-img {
    height: 30px;
    width: 32px;
    margin-top: 2px;
}

</style>
<?php error_reporting(0); ?>

<!-- Navigation menu -->
<div class="navik-header header-shadow navik-mega-menu mega-menu-fullwidth">
    <?php
    $link = end(explode("/", 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'])); 
    if($link=="checkout.php"){
    ?>
    <div class="container-fluid px-5">
        <div class="navik-header-container">
            <!--Logo-->
            <div class="logo" data-mobile-logo="assets/logo.png" data-sticky-logo="assets/logo.png">
                <a href="index"><img src="assets/logo.png" alt="logo"/></a>
            </div>
            <!-- Burger menu -->
            <div class="burger-menu">
                <div class="line-menu line-half first-line"></div>
                <div class="line-menu"></div>
                <div class="line-menu line-half last-line"></div>
            </div>
            <!--Navigation menu-->
            <nav class="navik-menu menu-caret menu-hover-3 submenu-top-border submenu-scale">
                <ul>
                    <li>
                        <?php
                        $zone = mysqli_fetch_assoc(mysqli_query($con, "select zone_id from plans where id='".$_SESSION['direct']."'"));
                        ?>
                        <a href="plans"><form method="post" action="plans.php"><button type="submit" class="btn btn-primary mb-0" name="submit">Go back to Plans</button></form></a>
                    </li>
                    <li>
                        <a href="#"><?php echo $_SESSION['fname']; ?></a>
                    </li>
                </ul>
            </nav>

        </div>
    </div>
    <?php } else{ ?>
    <div class="container-fluid px-5">
        <div class="navik-header-container">
            <!--Logo-->
            <div class="logo" data-mobile-logo="assets/logo.png" data-sticky-logo="assets/logo.png">
                <a href="index"><img src="assets/logo.png" alt="logo"/></a>
            </div>
            <style type="text/css">
                @font-face {
                    font-family: SnellBT-Regular;
                    src: url('assets/SnellBT-Regular.otf');
                }
                .tagline {
                    font-family: SnellBT-Regular;
                    font-size:26pt;
                }
                .tagline2 {
                    font-family: calibri light;
                    font-size:14pt;
                }
            </style>
            <div class="text-world logo text-right tagline-slogen" style="width:36%;">
               <span class="tagline"><font color="#133cb6">The World's Best </font><font color="#76ad33">eSIM</font></span>
            </div>
           
            <!-- Burger menu -->
            <div class="burger-menu">
                <div class="line-menu"></div>
                <div class="line-menu"></div>
                <div class="line-menu"></div>
            </div>


            <!--Navigation menu-->
            <nav class="navik-menu menu-caret menu-hover-3 submenu-top-border submenu-scale font-weight-600">
                <ul>
                    <li class="current-menu"><a href="index#eSim">eSim</a></li>
                   <!-- <li><a href="global-dialer-plans">Global Dialer</a></li>-->
                    <li><a href="virtual-numbers.php">Virtual Numbers</a></li>
                    <li><a href="faq">FAQ</a></li>
                    <li><a href="about-us">About Us</a></li>
                    <li>
                        <?php if(isset($_SESSION['user']) && ($_SESSION['role']=="U") ){?>
                        <a href="#"><?php echo $_SESSION['fname']; ?></a>
                        <ul class="submenu">
                            <li><a href="orders"><i class="fa fa-home"></i> My Orders</a></li>
                            <li><a href="profile"><i class="fa fa-user"></i> My Profile</a></li>
                            <li><a href="logout"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
                        </ul>
                        <?php } else{ ?>
                        <a href="login.php">Login</a>
                        <?php } ?>
                    </li>
                    
                </ul>
            </nav>

        </div>
    </div>
    
    <?php
        $cookieValue = base64_decode($_COOKIE['a2k_key']);
        $checkRecord = mysqli_query($con,"SELECT * FROM cart_items WHERE cookie_id='$cookieValue'");
        $totalrows = mysqli_num_rows($checkRecord);
    ?>
    <div class="topcorner">
        <a href="cart2">
            <div class="shoppingbasket"> 
                <div><img src="assets/images/sp.png" class="cart-img"></div>
                <div class="basketitems" id="basketitems"><?php echo $totalrows;?></div>
            </div>
        </a>
    </div>    
    <?php } ?>
</div>