

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
@media(max-width: 1199px){
    .navik-header-container {
    justify-content: stretch !important;
}
}
@media(max-width: 575px){
 
.navik-header-container {
    height: 75px;
    padding-right: 0 !important;
}
}
@media(min-width:1400px){
    .container-fluid{
        max-width: 1400px;
        /* padding: 0 !important; */
        margin: 0 auto;
    }
    .footer-bottom .container-fluid{
        max-width: 1274px;
        padding: 0;
    }
    .navik-menu{
        float:left !important;
    }
}
.topcorner{
    position:relative;
    top: 0;
    right: 0;
 }
 
 .shoppingbasket {
  width:40px;
  height:40px;
  background-color:#fff;
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
.content {
            position: absolute;
            top: 35%;
            left: 80%;
            transform: translate(-50%, -50%);
            width: 500px;
            text-align: center;
            background-color: white;
            box-sizing: border-box;
            padding: 10px;
            z-index: 1200;
            display: none;
            /*to hide popup initially*/
        }
          
        .close-btn {
            position: absolute;
            right: 20px;
            top: 15px;
            background-color: black;
            color: white;
            border-radius: 50%;
            padding: 4px;
        }

        .bg-loading {
    background: black;
    width: 100vw;
    height: 100vh;
    position: absolute;
    z-index: 1;
    opacity: .8;
}
.navik-header-container{
    padding-right: 0 !important;
}
.navik-header-container{
    display:flex;
    align-items: center;
    justify-content: space-between;
}

</style>
<?php error_reporting(0); ?>
<!-- Preloader -->
<!--<div class="preloader-container">-->
<!--    <div class="preloader-wrapper">-->
<!--        <div class="preloader-border"></div>-->
<!--        <div class="preloader-line-mask">-->
<!--            <div class="preloader-line"></div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->

<!-- Navigation menu -->
<div class="navik-header header-shadow navik-mega-menu mega-menu-fullwidth">
    <!--<div class="bg-indigo">-->
    <!--    <div class="container">-->
    <!--        <div class="row align-items-center">-->
    <!--            <div class="col-lg-6 d-none d-lg-block text-white-75 text-center text-lg-left py-3 py-lg-0">-->
    <!--                <small class="text-white font-weight-600">Think eSim, think gsm2go</small>-->
    <!--            </div>-->
    <!--            <div class="col-lg-6 d-flex align-items-center justify-content-center justify-content-lg-end">-->
    <!--                <button type="button" class="btn btn-indigo shadow-none rounded-0 px-3 mb-0" data-toggle="modal" data-target="#modalLogin"><i class="fas fa-sign-in-alt"></i>Log in</button>-->
    <!--                <button type="button" class="btn btn-indigo shadow-none rounded-0 px-3 mb-0" data-toggle="modal" data-target="#modalRegister"><i class="fas fa-pen-nib"></i>Register</button>-->
    <!--            </div>-->

    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->
    <?php
    $link = end(explode("/", 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'])); 
    if($link=="checkout.php"){
    ?>
    <div class="container">
        <div class="navik-header-container">
            <!--Logo-->
            <div class="logo" data-mobile-logo="assets/logo.png" data-sticky-logo="assets/logo.png">
                <a href="/"><img src="assets/logo.png" alt="logo"/></a>
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
       
                    <!-- <li><a href="#">Pages</a>
                        <ul>
                            <li><a href="#">Login & Signup</a>
                                <ul>
                                    <li><a href="login-01.html">Login Style 1</a></li>
                                    <li><a href="login-02.html">Login Style 2</a></li>
                                    <li><a href="signup-01.html">Signup Style 1</a></li>
                                    <li><a href="signup-02.html">Signup Style 2</a></li>
                                    <li><a href="password-reset-01.html">Password Reset Style 1</a></li>
                                    <li><a href="password-reset-02.html">Password Reset Style 2</a></li>
                                </ul>
                            </li>
           

                            <li><a href="#">Blog</a>
                                <ul>
                                    <li><a href="blog-01.html">Blog Style 1</a></li>
                                    <li><a href="blog-02.html">Blog Style 2</a></li>
                                    <li><a href="blog-single-01.html">Blog Single Style 1</a></li>
                                    <li><a href="blog-single-02.html">Blog Single Style 2</a></li>
                                </ul>
                            </li>
                            <li><a href="faq.html">FAQ</a></li>
                        </ul>
                    </li>
                    <li class="mega-menu"><a href="#">Mega Menu</a>
                        <ul>
							<li>
								<div class="mega-menu-container">
									<div class="row">

										<div class="col-md-6 col-lg-3">
											<div class="mega-menu-box">
												<div class="mega-menu-thumbnail">
													<a href="#">
														<img src="assets/images/upload/mega-menu-service-01.jpg" alt="image">
													</a>
												</div>
												<h4 class="mega-menu-heading font-weight-700"><a href="#">Research Project</a></h4>
												<div class="mega-menu-desc">
													Donec tellus faucibus dolor viverra neca blandit at justo pendisse dolor turpis lobortis in sodales.
												</div>
											</div>
										</div>

										<div class="col-md-6 col-lg-3">
											<div class="mega-menu-box">
												<div class="mega-menu-thumbnail">
													<a href="#">
														<img src="assets/images/upload/mega-menu-service-02.jpg" alt="image">
													</a>
												</div>
												<h4 class="mega-menu-heading font-weight-700"><a href="#">Sales Conversion</a></h4>
												<div class="mega-menu-desc">
													Quisque vitae sapien neque in amet fusce enim nec nisl gravida rutrum dolor justo sem scelerisque.
												</div>
											</div>
										</div>

										<div class="col-md-6 col-lg-3">
											<div class="mega-menu-box">
												<div class="mega-menu-thumbnail">
													<a href="#">
														<img src="assets/images/upload/mega-menu-service-03.jpg" alt="image">
													</a>
												</div>
												<h4 class="mega-menu-heading font-weight-700"><a href="#">Growth Strategy</a></h4>
												<div class="mega-menu-desc">
													Laoreet eu ornare at nulla in luctus neque dapibus rhoncus malesuada in vivamus sodales vestibulum.
												</div>
											</div>
										</div>

										<div class="col-md-6 col-lg-3">
											<div class="mega-menu-box">
												<div class="mega-menu-thumbnail">
													<a href="#">
														<img src="assets/images/upload/mega-menu-service-04.jpg" alt="image">
													</a>
												</div>
												<h4 class="mega-menu-heading font-weight-700"><a href="#">Tax Accounting</a></h4>
												<div class="mega-menu-desc">
													Placerat semper massa molestie vehicula ultricies pharetra nisl sem a fermentum sollicitudin.
												</div>
											</div>
										</div>

									</div>
								</div>
							</li>
						</ul>
                    </li> -->
                    
                </ul>
            </nav>

        </div>
    </div>
    <?php } else{ ?>
    <div class="container">
        <div class="navik-header-container">
            <!--Logo-->
            <div class="logo" data-mobile-logo="assets/logo.png" data-sticky-logo="assets/logo.png">
                <a href="/"><img src="assets/logo.png" alt="logo"/></a>
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
            <div class="logo text-center tagline-slogen" style="width:32%;">
               <!-- <span class="tagline">The World's Best </span><span class="tagline2"><i>eSIM</i></span> -->
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
                    <li class="current-menu"><a href="https://dev.mysimaccess.com/IL/index#eSim">חבילות</a></li>
                   <!-- <li><a href="global-dialer-plans">Global Dialer</a></li>-->
                    <li><a href="virtual-numbers">מספרים מחו"ל</a></li>
					<li><a href="guide">מדריך</a></li>
                    <li><a href="FAQ">FAQ</a></li>
                    <li><a href="about-us">אודות</a></li>
                    
                    <li>
                        <?php if(isset($_SESSION['user']) && ($_SESSION['role']=="U") ){?>
                        <a href="#"><?php echo $_SESSION['fname']; ?></a>
                        <ul class="submenu">
                            <li><a href="orders"><i class="fa fa-home"></i> My Orders</a></li>
                            <li><a href="profile"><i class="fa fa-user"></i> My Profile</a></li>
                            <li><a href="logout"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
                        </ul>
                        <?php } else{ ?>
                        <a href="login">Login</a>
                        <?php } ?>
                    </li>
                    <li><a href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
        <i class="fa-solid fa-globe"></i>
    </a></li>
                    
                </ul>
            </nav>
                    <div class="topcorner">
        <a href="cart2">
            <!-- id="cartpopup" onclick="togglePopup()" -->
            <div class="shoppingbasket"> 
                <div><img src="assets/images/sp.png" class="cart-img"></div>
                <div class="basketitems" id="basketitems"><?php echo $totalrows;?></div>
            </div>
        </a>
    </div> 
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<!--    <?php-->
<!--     $checkRecord = mysqli_query($con,"SELECT * FROM cart_items WHERE user_id=5");-->
<!--              $totalrows = mysqli_num_rows($checkRecord);-->
<!--    ?>-->
<!--    <div class="topcorner">-->
      <!-- <a href="cart2"><?php echo $totalrows;?><img src="assets/cart.png" width="40px"></a> -->
<!--      <a href="cart2">-->
<!--<div class="shoppingbasket"> -->

<!--  <div><i class="fa fa-shopping-cart fa-2x" aria-hidden="true" ></i></div>-->

 <!-- <div class="basketitems" id="basketitems"><?php //echo $totalrows;?>&nbsp;</div>-->
<!--</div>-->
<!--</a>-->
<!--    </div>    -->
<!--    <?php } ?>-->

<?php
        $cookieValue = base64_decode($_COOKIE['a2k_key']);
        $checkRecord = mysqli_query($con,"SELECT * FROM cart_items WHERE cookie_id='$cookieValue' AND ordered='0'");
        $totalrows = mysqli_num_rows($checkRecord);
    ?>
     
</div>

<!-- div containing the popup -->
<div class="content">
        <div onclick="togglePopup()" class="close-btn">
            ×
        </div>
        <h3>Cart</h3>
        
        <?php
            if(isset($_SESSION['userId'])) {
                $userId = $_SESSION['userId'];
              } else {
                $userId = 0;
              }
              
            $cookieValue = base64_decode($_COOKIE['a2k_key']);
            $select = mysqli_query($con, "select * from cart_items where user_id='$userId' AND cookie_id ='$cookieValue'");
            $numrows=mysqli_num_rows($select);
            $row=mysqli_fetch_assoc($select);
            print_r($row);
        ?>
        <div class="card rounded-3 mb-4" id="recordid_72">
          <div class="card-body p-6">
            <div class="row d-flex justify-content-between align-items-center">
              <div class="col-md-6 col-lg-4 col-xl-6 col-sm-6">
                <img src="https://gsm2go.com/assets/images/upload/esim.jpg" class="img-fluid rounded-3" alt="Cotton T-shirt">
                <p>
                  <button id="btn2_72" class="btn btn-link px-2" onclick="func_minus(72,);" fdprocessedid="uthoke"><i class="fas fa-minus"></i></button>
              

              <input type="text" name="qty" class="myinput2" id="quantity_72" value="1" size="2" readonly="" fdprocessedid="85kpc">
              <input type="hidden" name="cid" id="cid" value="72">
             
                   <button id="btn_72" class="btn btn-link px-2" onclick="func_plus(72,);" fdprocessedid="yy4bd"><i class="fa fa-plus"></i></button>
               
                </p>    
              </div>
              <div class="col-md-6 col-lg-4 col-xl-6 col-sm-6">
                <p class="lead fw-normal mb-2"> <font size="3px"><b>Esim Europe</b></font></p>
                <p><span class="text-muted"></span> <span class="text-muted"> </span>8 days, 1.5 GB, 100 Minutes</p>
                <p>
                    <label>eSIM Live
                    <input type="checkbox" id="esimlive_72" name="esim_live" value="0">
                    </label>
                </p>
                <p> </p><h5>   $<input type="text" name="cost" class="myinput" id="cost_72" value="10" size="4" readonly="" fdprocessedid="tdet8s">   </h5><p></p>
                <p>                <button id="btn3_72" class="btn btn-link px-2 text-dark" value="72" onclick="func_remove(72,);" fdprocessedid="ydu5in"><i class="fas fa-trash fa-lg"></i></button></p>
              </div>
              
          
              
   
            </div>
          </div>
        </div>
    </div>
    <div class="" id="bg-black"></div>