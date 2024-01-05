<!-- Main Header-->
<div class="main-header side-header sticky">
	<div class="container-fluid">
		<div class="main-header-left">
			<a class="main-header-menu-icon" href="#" id="mainSidebarToggle"><span></span></a>
		</div>
		<div class="main-header-center">
			<div class="responsive-logo">
				<a href="index.php"><img src="assets/img/logo.png" style="max-height: 50px;" class="mobile-logo" alt="logo"></a>
				<a href="index.php"><img src="assets/img/logo.png" style="max-height: 50px;" class="mobile-logo-dark" alt="logo"></a>
			</div>
		</div>
		<div class="main-header-right">
		
			<div class="dropdown d-md-flex">
				<a class="nav-link icon full-screen-link" href="">
					<i class="fe fe-maximize fullscreen-button fullscreen header-icons"></i>
					<i class="fe fe-minimize fullscreen-button exit-fullscreen header-icons"></i>
				</a>
			</div>
			<div class="dropdown main-profile-menu">
				<a class="d-flex" href="">
					<span class="main-img-user"><img alt="avatar" src="assets/img/users/avatar.png"></span>
				</a>
				<div class="dropdown-menu">
					<div class="header-navheading">
						<h6 class="main-notification-title"><?php echo $_SESSION['name']; ?></h6>
						<p class="main-notification-text"><?php if($_SESSION['role']=="A"){ echo "Admin"; } ?></p>
					</div>
					<a class="dropdown-item border-top" href="profile.php">
						<i class="fe fe-user"></i> My Profile
					</a>
					<a class="dropdown-item" href="profile.php">
						<i class="fe fe-settings"></i> Account Settings
					</a>
					<a class="dropdown-item" href="logout.php">
						<i class="fe fe-power"></i> Sign Out
					</a>
				</div>
			</div>
			<button class="navbar-toggler navresponsive-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-4"
				aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">
				<i class="fe fe-more-vertical header-icons navbar-toggler-icon"></i>
			</button><!-- Navresponsive closed -->
		</div>
	</div>
</div>
<!-- End Main Header-->

<!-- Mobile-header -->
<div class="mobile-main-header">
	<div class="mb-1 navbar navbar-expand-lg  nav nav-item  navbar-nav-right responsive-navbar navbar-dark  ">
		<div class="collapse navbar-collapse" id="navbarSupportedContent-4">
			<div class="d-flex order-lg-2 ml-auto">
				<div class="dropdown ">
					<a class="nav-link icon full-screen-link">
						<i class="fe fe-maximize fullscreen-button fullscreen header-icons"></i>
						<i class="fe fe-minimize fullscreen-button exit-fullscreen header-icons"></i>
					</a>
				</div>
				<div class="dropdown main-profile-menu">
					<a class="d-flex" href="#">
						<span class="main-img-user" ><img alt="avatar" src="assets/img/users/1.jpg"></span>
					</a>
					<div class="dropdown-menu">
						<div class="header-navheading">
							<h6 class="main-notification-title">Sonia Taylor</h6>
							<p class="main-notification-text">Web Designer</p>
						</div>
						<a class="dropdown-item border-top" href="profile.php">
							<i class="fe fe-user"></i> My Profile
						</a>
						<a class="dropdown-item" href="profile.html">
							<i class="fe fe-settings"></i> Account Settings
						</a>
						<a class="dropdown-item" href="Support.html">
							<i class="fe fe-settings"></i> Support
						</a>
						<a class="dropdown-item" href="Activity.html">
							<i class="fe fe-compass"></i> Activity
						</a>
						<a class="dropdown-item" href="logout.php">
							<i class="fe fe-power"></i> Sign Out
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Mobile-header closed -->