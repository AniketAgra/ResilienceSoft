<?php
session_start();
if(isset($_SESSION['user'],$_SESSION['type']) AND ($_SESSION['type']=='Admin' || $_SESSION['type']=='Dealer' || $_SESSION['type']=='User'))
{
    include("includes/config.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>UniSIM | Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="shortcut icon" href="assets/images/favicon.ico">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" id="bootstrap-stylesheet" />
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css"  id="app-stylesheet" />
</head>
<body>
<div id="wrapper">

    <?php include("includes/header.php"); ?>
    <?php include("includes/sidebar.php"); ?>

    <div class="content-page">
        <div class="content">
            <div class="container-fluid">
                
                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <div class="page-title-nav-pills d-none d-sm-inline-block float-right">
                                <ul class="nav nav-pills nav-pills-custom">
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Today</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#">Yesterday</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Last Week</a>
                                    </li>
                                </ul>
                            </div>

                            <h4 class="page-title">Dashboard</h4>
                        </div>
                    </div>
                </div>     
                <!-- end page title --> 

                <div class="row">
                    <div class="col-xl-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="dropdown float-right">
                                    <a href="#" class="dropdown-toggle card-drop" data-toggle="dropdown"
                                        aria-expanded="false">
                                        <i class="mdi mdi-dots-vertical"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li><a href="#" class="dropdown-item">Action</a></li>
                                        <li><a href="#" class="dropdown-item">Another action</a></li>
                                        <li><a href="#" class="dropdown-item">Something else here</a></li>
                                        <li class="dropdown-divider"></li>
                                        <li><a href="#" class="dropdown-item">Separated link</a></li>
                                    </ul>
                                </div>
    
                                <h4 class="header-title">Daily Sales</h4>
    
    
                                <div class="row text-center mt-4">
                                    <div class="col-6">
                                        <h4 data-plugin="counterup">8,459</h4>
                                        <p class="text-muted text-truncate">Total Sales</p>
                                    </div>
                                    <div class="col-6">
                                        <h4 data-plugin="counterup">584</h4>
                                        <p class="text-muted text-truncate">Open Compaign</p>
                                    </div>
                                </div>
    
                                <div class="text-center mt-2">
                                    <div id="morris-donut-example" class="morris-chart" style="height: 245px;"></div>
                                    <ul class="list-inline chart-detail-list mb-0">
                                        <li class="list-inline-item">
                                            <h5 class="font-14"><i class="fas fa-circle mr-1" style="color: #da5461;"></i>Series A</h5>
                                        </li>
                                        <li class="list-inline-item">
                                            <h5 class="font-14"><i class="fas fa-circle mr-1" style="color: #fe8995;"></i>Series B</h5>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div><!-- end col -->

                    <div class="col-xl-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="dropdown float-right">
                                    <a href="#" class="dropdown-toggle card-drop" data-toggle="dropdown"
                                        aria-expanded="false">
                                        <i class="mdi mdi-dots-vertical"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li><a href="#" class="dropdown-item">Action</a></li>
                                        <li><a href="#" class="dropdown-item">Another action</a></li>
                                        <li><a href="#" class="dropdown-item">Something else here</a></li>
                                        <li class="dropdown-divider"></li>
                                        <li><a href="#" class="dropdown-item">Separated link</a></li>
                                    </ul>
                                </div>
                                <h4 class="header-title">Statistics</h4>
    
                                <div class="row text-center mt-4">
                                    <div class="col-4">
                                        <h4 data-plugin="counterup">1,507</h4>
                                        <p class="text-muted text-truncate">Total Sales</p>
                                    </div>
                                    <div class="col-4">
                                        <h4 data-plugin="counterup">916</h4>
                                        <p class="text-muted text-truncate">Open Compaign</p>
                                    </div>
                                    <div class="col-4">
                                        <h4 data-plugin="counterup">22</h4>
                                        <p class="text-muted text-truncate">Daily Sales</p>
                                    </div>
                                </div>
    
                                <div id="morris-bar-example" style="height: 280px;" class="morris-chart mt-2"></div>
                            </div>
                        </div>
                    </div><!-- end col -->

                    <div class="col-xl-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="dropdown float-right">
                                    <a href="#" class="dropdown-toggle card-drop" data-toggle="dropdown"
                                        aria-expanded="false">
                                        <i class="mdi mdi-dots-vertical"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li><a href="#" class="dropdown-item">Action</a></li>
                                        <li><a href="#" class="dropdown-item">Another action</a></li>
                                        <li><a href="#" class="dropdown-item">Something else here</a></li>
                                        <li class="dropdown-divider"></li>
                                        <li><a href="#" class="dropdown-item">Separated link</a></li>
                                    </ul>
                                </div>
                                <h4 class="header-title">Total Revenue</h4>
    
                                <div class="row text-center mt-4">
                                    <div class="col-6">
                                        <h4 data-plugin="counterup">7,653</h4>
                                        <p class="text-muted">Total Sales</p>
                                    </div>
                                    <div class="col-6">
                                        <h4 data-plugin="counterup">852</h4>
                                        <p class="text-muted">Open Compaign</p>
                                    </div>
                                </div>
    
                                <div id="morris-line-example" style="height: 280px;" class="morris-chart  mt-2"></div>
                            </div>
                        </div>
                    </div><!-- end col -->

                </div>
                <!-- end row -->


                <div class="row">
                    <div class="col-xl-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="media">
                                    <img src="assets/images/users/avatar-3.jpg" class="avatar-md rounded-circle mr-3 align-self-center" alt="user">
                                    <div class="media-body overflow-hidden">
                                        <h5 class="font-14 mt-0 mb-1">Chadengle</h5>
                                        <p class="mb-1 font-13 text-truncate">coderthemes@gmail.com</p>
                                        <small class="text-primary"><b>Admin</b></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="media">
                                    <img src="assets/images/users/avatar-2.jpg" class="avatar-md rounded-circle mr-3 align-self-center" alt="user">
                                    <div class="media-body overflow-hidden">
                                        <h5 class="font-14 mt-0 mb-1">Michael Zenaty</h5>
                                        <p class="mb-1 font-13 text-truncate">coderthemes@gmail.com</p>
                                        <small class="text-primary"><b>Admin</b></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="media">
                                    <img src="assets/images/users/avatar-1.jpg" class="avatar-md rounded-circle mr-3 align-self-center" alt="user">
                                    <div class="media-body overflow-hidden">
                                        <h5 class="font-14 mt-0 mb-1">Stillnotdavid</h5>
                                        <p class="mb-1 font-13 text-truncate">coderthemes@gmail.com</p>
                                        <small class="text-primary"><b>Admin</b></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="media">
                                    <img src="assets/images/users/avatar-10.jpg" class="avatar-md rounded-circle mr-3 align-self-center" alt="user">
                                    <div class="media-body overflow-hidden">
                                        <h5 class="font-14 mt-0 mb-1">Tomaslau</h5>
                                        <p class="mb-1 font-13 text-truncate">coderthemes@gmail.com</p>
                                        <small class="text-primary"><b>Admin</b></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->


                <div class="row">
                    <div class="col-xl-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="dropdown float-right">
                                    <a href="#" class="dropdown-toggle card-drop" data-toggle="dropdown"
                                        aria-expanded="false">
                                        <i class="mdi mdi-dots-vertical"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li><a href="#" class="dropdown-item">Action</a></li>
                                        <li><a href="#" class="dropdown-item">Another action</a></li>
                                        <li><a href="#" class="dropdown-item">Something else here</a></li>
                                        <li class="dropdown-divider"></li>
                                        <li><a href="#" class="dropdown-item">Separated link</a></li>
                                    </ul>
                                </div>
    
                                <h4 class="header-title mb-4">Inbox</h4>
    
                                <div class="inbox-widget slimscroll" style="min-height: 370px;">
                                    <a href="#">
                                        <div class="inbox-item">
                                            <div class="inbox-item-img"><img src="assets/images/users/avatar-1.jpg"
                                                                                class="rounded-circle" alt=""></div>
                                            <h5 class="inbox-item-author font-14 m-0">Chadengle</h5>
                                            <p class="inbox-item-text text-truncate">Hey! there I'm available...</p>
                                            <p class="inbox-item-date">13:40 PM</p>
                                        </div>
                                    </a>
                                    <a href="#">
                                        <div class="inbox-item">
                                            <div class="inbox-item-img"><img src="assets/images/users/avatar-2.jpg"
                                                                                class="rounded-circle" alt=""></div>
                                            <h5 class="inbox-item-author font-14 m-0">Tomaslau</h5>
                                            <p class="inbox-item-text text-truncate">I've finished it! See you so...</p>
                                            <p class="inbox-item-date">13:34 PM</p>
                                        </div>
                                    </a>
                                    <a href="#">
                                        <div class="inbox-item">
                                            <div class="inbox-item-img"><img src="assets/images/users/avatar-3.jpg"
                                                                                class="rounded-circle" alt=""></div>
                                            <h5 class="inbox-item-author font-14 m-0">Stillnotdavid</h5>
                                            <p class="inbox-item-text text-truncate">This theme is awesome!</p>
                                            <p class="inbox-item-date">13:17 PM</p>
                                        </div>
                                    </a>
                                    <a href="#">
                                        <div class="inbox-item">
                                            <div class="inbox-item-img"><img src="assets/images/users/avatar-4.jpg"
                                                                                class="rounded-circle" alt=""></div>
                                            <h5 class="inbox-item-author font-14 m-0">Kurafire</h5>
                                            <p class="inbox-item-text text-truncate">Nice to meet you</p>
                                            <p class="inbox-item-date">12:20 PM</p>
                                        </div>
                                    </a>
                                    <a href="#">
                                        <div class="inbox-item">
                                            <div class="inbox-item-img"><img src="assets/images/users/avatar-5.jpg"
                                                                                class="rounded-circle" alt=""></div>
                                            <h5 class="inbox-item-author font-14 m-0">Shahedk</h5>
                                            <p class="inbox-item-text">Hey! there I'm available...</p>
                                            <p class="inbox-item-date text-truncat">10:15 AM</p>
                                        </div>
                                    </a>
                                    <a href="#">
                                        <div class="inbox-item">
                                            <div class="inbox-item-img"><img src="assets/images/users/avatar-6.jpg"
                                                                                class="rounded-circle" alt=""></div>
                                            <h5 class="inbox-item-author font-14 m-0">Herbert</h5>
                                            <p class="inbox-item-text text-truncate">I've finished it! See you so...</p>
                                            <p class="inbox-item-date">10:4 PM</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div><!-- end col -->

                    <div class="col-xl-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="dropdown float-right">
                                    <a href="#" class="dropdown-toggle card-drop" data-toggle="dropdown"
                                        aria-expanded="false">
                                        <i class="mdi mdi-dots-vertical"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li><a href="#" class="dropdown-item">Action</a></li>
                                        <li><a href="#" class="dropdown-item">Another action</a></li>
                                        <li><a href="#" class="dropdown-item">Something else here</a></li>
                                        <li class="dropdown-divider"></li>
                                        <li><a href="#" class="dropdown-item">Separated link</a></li>
                                    </ul>
                                </div>
    
                                <h4 class="header-title mb-4">Latest Projects</h4>
    
                                <div class="table-responsive">
                                    <table class="table mb-0 table-nowrap">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Project Name</th>
                                            <th>Start Date</th>
                                            <th>Due Date</th>
                                            <th>Status</th>
                                            <th>Assign</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Flacto Admin v1</td>
                                            <td>01/01/2016</td>
                                            <td>26/04/2016</td>
                                            <td><span class="badge badge-danger">Released</span></td>
                                            <td>Coderthemes</td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Flacto Frontend v1</td>
                                            <td>01/01/2016</td>
                                            <td>26/04/2016</td>
                                            <td><span class="badge badge-success">Released</span></td>
                                            <td>Flacto admin</td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>Flacto Admin v1.1</td>
                                            <td>01/05/2016</td>
                                            <td>10/05/2016</td>
                                            <td><span class="badge badge-pink">Pending</span></td>
                                            <td>Coderthemes</td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>Flacto Frontend v1.1</td>
                                            <td>01/01/2016</td>
                                            <td>31/05/2016</td>
                                            <td><span class="badge badge-purple">Work in Progress</span>
                                            </td>
                                            <td>Flacto admin</td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td>Flacto Admin v1.3</td>
                                            <td>01/01/2016</td>
                                            <td>31/05/2016</td>
                                            <td><span class="badge badge-warning">Coming soon</span></td>
                                            <td>Coderthemes</td>
                                        </tr>
    
                                        <tr>
                                            <td>6</td>
                                            <td>Flacto Admin v1.3</td>
                                            <td>01/01/2016</td>
                                            <td>31/05/2016</td>
                                            <td><span class="badge badge-primary">Coming soon</span></td>
                                            <td>Flacto admin</td>
                                        </tr>
    
                                        <tr>
                                            <td>7</td>
                                            <td>Flacto Admin v1.3</td>
                                            <td>01/01/2016</td>
                                            <td>31/05/2016</td>
                                            <td><span class="badge badge-primary">Coming soon</span></td>
                                            <td>Flacto admin</td>
                                        </tr>
    
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div><!-- end col -->

                </div>
                <!-- end row -->
                
            </div> 
        </div> 
    </div>
</div>



<script src="assets/js/vendor.min.js"></script>
<script src="assets/libs/morris-js/morris.min.js"></script>
<script src="assets/libs/raphael/raphael.min.js"></script>
<script src="assets/js/pages/dashboard.init.js"></script>
<script src="assets/js/app.min.js"></script>
</body>
</html>
<?php } else{ header("location:index.php"); } ?>