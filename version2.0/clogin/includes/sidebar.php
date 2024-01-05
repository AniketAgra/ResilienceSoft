<!-- ========== Left Sidebar Start ========== -->
<div class="left-side-menu">

    <div class="slimscroll-menu">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <ul class="metismenu" id="side-menu">
                <?php if($_SESSION['role']=="A"){ ?>
                <li>
                    <a href="distributors.php" class="waves-effect">
                        <i class="mdi mdi-speedometer"></i>
                        <span> Distributors </span>
                    </a>
                </li>
                <li>
                    <a href="users.php" class="waves-effect">
                        <i class="mdi mdi-speedometer"></i>
                        <span> Users </span>
                    </a>
                </li>
                <?php } ?>

            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
<!-- Left Sidebar End -->