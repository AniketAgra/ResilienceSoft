<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Ag Grid Tables | Testing</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico" />
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
    <!-- App css -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" id="bootstrap-stylesheet" />
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-stylesheet" />
    <script src="https://unpkg.com/ag-grid-community/dist/ag-grid-community.min.js"></script>
    <!--<script src="assets/js/main.js"></script>-->
    <!--<script src="assets/js/CustomDateComponent.js"></script>-->
    <script>
        var __basePath = "./";
    </script>
    <script src="https://unpkg.com/ag-grid-enterprise@28.0.0/dist/ag-grid-enterprise.min.js"></script>
</head>
<body>
<!-- Begin page -->
<div id="wrapper">
    <!-- Topbar Start -->
    <div class="navbar-custom">
        <ul class="list-unstyled topnav-menu float-right mb-0">
            <li class="dropdown notification-list">
                <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <img src="assets/images/users/avatar-1.jpg" alt="user-image" class="rounded-circle" />
                </a>
                <div class="dropdown-menu dropdown-menu-right profile-dropdown">
                    <div class="dropdown-header noti-title">
                        <h6 class="text-overflow m-0">Welcome Admin</h6>
                    </div>
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="mdi mdi-account-outline"></i>
                        <span>Profile</span>
                    </a>
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="mdi mdi-settings-outline"></i>
                        <span>Settings</span>
                    </a>
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="mdi mdi-lock-outline"></i>
                        <span>Lock Screen</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="mdi mdi-logout-variant"></i>
                        <span>Logout</span>
                    </a>
                </div>
            </li>
        </ul>

        <!-- LOGO -->
        <div class="logo-box">
            <a href="index.html" class="logo text-center">
                <span class="logo-lg">
                    <img src="assets/images/logo-light.png" alt="" height="16" />
                    <!-- <span class="logo-lg-text-light">Flacto</span> -->
                </span>
                <span class="logo-sm">
                    <!-- <span class="logo-sm-text-dark">F</span> -->
                    <img src="assets/images/logo-sm.png" alt="" height="22" />
                </span>
            </a>
        </div>

        <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
            <li>
                <button class="button-menu-mobile waves-effect waves-light">
                    <i class="mdi mdi-menu"></i>
                </button>
            </li>

            <!-- <li class="d-none d-sm-block">
                <form class="app-search">
                    <div class="app-search-box">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search..." />
                            <div class="input-group-append">
                                <button class="btn" type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </li> -->

            <li class="dropdown dropdown-mega d-none d-lg-block">
                <a class="nav-link dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    Menu
                    <i class="mdi mdi-chevron-down"></i>
                </a>
                <div class="dropdown-menu dropdown-megamenu">
                    <div class="row">
                        <div class="col-sm-3">
                            <a href="index.html">
                                <img src="assets/images/logo.png" alt="" height="16" />
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

    <!-- ========== Left Sidebar Start ========== -->
    <div class="left-side-menu">
        <div class="slimscroll-menu">
            <!--- Sidemenu -->
            <div id="sidebar-menu">
                <ul class="metismenu" id="side-menu">
                    <li class="menu-title">Navigation</li>

                    <li>
                        <a href="index.html" class="waves-effect">
                            <i class="mdi mdi-speedometer"></i>
                            <span> Dashboard </span>
                        </a>
                    </li>

                    <li>
                        <a href="javascript: void(0);" class="waves-effect">
                            <i class="mdi mdi-purse-outline"></i>
                            <span> User Interface </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li><a href="ui-buttons.html">Buttons</a></li>
                            <li><a href="ui-cards.html">Cards</a></li>
                            <li><a href="ui-typography.html">Typography </a></li>
                            <li><a href="ui-checkbox-radio.html">Checkboxs-Radios</a></li>
                            <li>
                                <a href="javascript: void(0);" aria-expanded="false">
                                    Icons
                                    <span class="badge badge-primary badge-pill float-right">3</span>
                                </a>
                                <ul class="nav-third-level nav" aria-expanded="false">
                                    <li><a href="icons-materialdesign.html">Material Design</a></li>
                                    <li><a href="icons-fontawesome.html">Font awesome</a></li>
                                    <li><a href="icons-themify.html">Themify Icons</a></li>
                                </ul>
                            </li>
                            <li><a href="ui-modals.html">Modals</a></li>
                            <li><a href="ui-images.html">Images</a></li>
                            <li><a href="ui-components.html">Components</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript: void(0);" class="waves-effect">
                            <i class="mdi mdi-package-variant-closed"></i>
                            <span> Admin UI </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li><a href="admin-masonry.html">Masonry</a></li>
                            <li><a href="admin-notification.html">Notification</a></li>
                            <li><a href="admin-range-slider.html">Range Slider</a></li>
                            <li><a href="admin-sweetalert.html">Sweet Alert</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="widgets.html" class="waves-effect">
                            <i class="mdi mdi-shape-outline"></i>
                            <span> Widgets </span>
                        </a>
                    </li>

                    <li>
                        <a href="javascript: void(0);" class="waves-effect">
                            <i class="mdi mdi-clipboard-text-outline"></i>
                            <span> Forms </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li><a href="form-elements.html">Form Elements</a></li>
                            <li><a href="form-advanced.html">Advanced Form</a></li>
                            <li><a href="form-validation.html">Form Validation</a></li>
                            <li><a href="form-wizard.html">Form Wizard</a></li>
                            <li><a href="form-summernote.html">Summernote</a></li>
                            <li><a href="form-uploads.html">Form Uploads</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript: void(0);" class="waves-effect">
                            <i class="mdi mdi-dns-outline"></i>
                            <span> Tables </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li><a href="tables-basic.html">Basic Tables</a></li>
                            <li><a href="tables-datatable.html">Data Tables</a></li>
                            <li><a href="tables-editable.html">Editable Tables</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript: void(0);" class="waves-effect">
                            <i class="mdi mdi-chart-arc"></i>
                            <span> Charts </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li><a href="charts-flot.html">Flot Charts</a></li>
                            <li><a href="charts-morris.html">Morris Charts</a></li>
                            <li><a href="charts-chartist.html">Chartist Charts</a></li>
                            <li><a href="charts-other.html">Other Charts</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript: void(0);" class="waves-effect">
                            <i class="mdi mdi-map-marker-outline"></i>
                            <span> Maps </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li><a href="maps-google.html">Google Maps</a></li>
                            <li><a href="maps-vector.html">Vector Maps</a></li>
                        </ul>
                    </li>

                    <li class="menu-title mt-2">More</li>

                    <li>
                        <a href="javascript: void(0);" class="waves-effect">
                            <i class="mdi mdi-flip-horizontal"></i>
                            <span> Layouts </span>
                            <span class="badge badge-danger badge-pill float-right">New</span>
                        </a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li><a href="layouts-horizontal.html">Horizontal</a></li>
                            <li><a href="layouts-dark-sidebar.html">Dark Sidebar</a></li>
                            <li><a href="layouts-small-sidebar.html">Small Sidebar</a></li>
                            <li><a href="layouts-sidebar-collapsed.html">Sidebar Collapsed</a></li>
                            <li><a href="layouts-unsticky.html">Unsticky Layout</a></li>
                            <li><a href="layouts-boxed.html">Boxed Layout</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript: void(0);" class="waves-effect">
                            <i class="mdi mdi-cards-outline"></i>
                            <span> Pages </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li><a href="pages-starter.html">Starter Page</a></li>
                            <li><a href="pages-timeline.html">Timeline</a></li>
                            <li><a href="pages-login.html">Login</a></li>
                            <li><a href="pages-register.html">Register</a></li>
                            <li><a href="pages-recoverpw.html">Recover Password</a></li>
                            <li><a href="pages-lock-screen.html">Lock Screen</a></li>
                            <li><a href="pages-confirm-mail.html">Confirm Mail</a></li>
                            <li><a href="pages-404.html">Error 404</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript: void(0);" class="waves-effect">
                            <i class="mdi mdi-alarm-plus"></i>
                            <span> Multi Level </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="nav-second-level nav" aria-expanded="false">
                            <li>
                                <a href="javascript: void(0);">Level 1.1</a>
                            </li>
                            <li>
                                <a href="javascript: void(0);" aria-expanded="false">
                                    Level 1.2
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-third-level nav" aria-expanded="false">
                                    <li>
                                        <a href="javascript: void(0);">Level 2.1</a>
                                    </li>
                                    <li>
                                        <a href="javascript: void(0);">Level 2.2</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- End Sidebar -->

            <div class="clearfix"></div>
        </div>
        <!-- Sidebar -left -->
    </div>
    <!-- Left Sidebar End -->

    <!-- Start Page Content here -->
    <div class="content-page">
        <div class="content">
            <!-- Start Content-->
            <div class="container-fluid">
                <div class="col-12">
                    <div class="space" style="height: 15px;"></div>
                </div>
                <!-- start page title -->
                <!--<div class="row">-->
                <!--    <div class="col-12">-->
                <!--        <div class="page-title-box">-->
                <!--            <div class="page-title-btn btn-group float-right">-->
                <!--                <button type="button" class="btn btn-primary dropdown-toggle page-title-drop waves-effect waves-light" data-toggle="dropdown" aria-expanded="false">Settings <i class="fa fa-cog ml-1"></i></button>-->
                <!--                <ul class="dropdown-menu dropdown-menu-right">-->
                <!--                    <li><a href="#" class="dropdown-item">Action</a></li>-->
                <!--                    <li><a href="#" class="dropdown-item">Another action</a></li>-->
                <!--                    <li><a href="#" class="dropdown-item">Something else here</a></li>-->
                <!--                    <li class="dropdown-divider"></li>-->
                <!--                    <li><a href="#" class="dropdown-item">Separated link</a></li>-->
                <!--                </ul>-->
                <!--            </div>-->
                <!--            <h4 class="page-title">Basic Tables</h4>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--</div>     -->
                <!-- end page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6 float-left"><h4 class="page-title">Table Name</h4></div>
                                    <div class="col-6">
                                        <div class="float-right d-flex">
                                            <div class="mr-3" style="cursor:pointer;" onclick="onBtExport()"><img src="assets/images/excel-app.svg" alt="" height="24"></div>
                                            <div class="mr-3" style="cursor:pointer;"><img src="assets/images/file.svg" alt="" height="24"></div>
                                            <div class="mr-1" style="cursor:pointer;"><img src="assets/images/mail.svg" alt="" height="24"></div>
                                        </div>
                                    </div>
                                </div>

                                <div id="myGrid" class="ag-theme-alpine" style="height: 700px !important;"></div>
                            </div>
                        </div>
                    </div>
                </div>
   


  
            </div>
            <!-- end container-fluid -->
        </div>
        <!-- end content -->

        <!-- Footer Start -->
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">2022 - 2023 &copy; <a href="#">Roam1</a></div>
                </div>
            </div>
        </footer>
        <!-- end Footer -->
    </div>
    <!-- End Page content -->
</div>
<!-- END wrapper -->



<!-- Vendor js -->
<script src="assets/js/vendor.min.js"></script>
<script src="assets/js/app.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js"></script>
<script>
var checkboxSelection = function (params) {
  // we put checkbox on the name if we are not doing grouping
  return params.columnApi.getRowGroupColumns().length === 0;
};
var headerCheckboxSelection = function (params) {
  // we put checkbox on the name if we are not doing grouping
  return params.columnApi.getRowGroupColumns().length === 0;
};

var dateFilterParams = {
  comparator: (filterLocalDateAtMidnight, cellValue) => {
    var dateAsString = cellValue;
    if (dateAsString == null) return -1;
    var dateParts = dateAsString.split('/');
    var cellDate = new Date(
      Number(dateParts[2]),
      Number(dateParts[1]) - 1,
      Number(dateParts[0])
    );

    if (filterLocalDateAtMidnight.getTime() === cellDate.getTime()) {
      return 0;
    }

    if (cellDate < filterLocalDateAtMidnight) {
      return -1;
    }

    if (cellDate > filterLocalDateAtMidnight) {
      return 1;
    }
  },
  browserDatePicker: true,
};
function after2010() {
  var dateFilterComponent = gridOptions.api.getFilterInstance('date');
  dateFilterComponent.setModel({
    type: 'greaterThan',
    dateFrom: '01-01-2010',
    dateTo: null,
  });

  gridOptions.api.onFilterChanged();
}

function before2012() {
  var dateFilterComponent = gridOptions.api.getFilterInstance('date');
  dateFilterComponent.setModel({
    type: 'lessThan',
    dateFrom: '01-01-2012',
    dateTo: null,
  });

  gridOptions.api.onFilterChanged();
}

function dateCombined() {
  var dateFilterComponent = gridOptions.api.getFilterInstance('date');
  dateFilterComponent.setModel({
    condition1: {
      type: 'lessThan',
      dateFrom: '01-01-2012',
      dateTo: null,
    },
    operator: 'OR',
    condition2: {
      type: 'greaterThan',
      dateFrom: '01-01-2012',
      dateTo: null,
    },
  });

  gridOptions.api.onFilterChanged();
}

function clearDateFilter() {
  var dateFilterComponent = gridOptions.api.getFilterInstance('date');
  dateFilterComponent.setModel(null);
  gridOptions.api.onFilterChanged();
}
var autoGroupColumnDef = {
  headerName: 'Group',
  minWidth: 170,
  field: 'athlete',
  valueGetter: (params) => {
    if (params.node.group) {
      return params.node.key;
    } else {
      return params.data[params.colDef.field];
    }
  },
  headerCheckboxSelection: true,
  cellRenderer: 'agGroupCellRenderer',
  cellRendererParams: {
    checkbox: true,
  },
};
const columnDefs = [
    {
    headerName: 'Athlete',
    children: [
    { field: 'athlete', rowDrag: true, minWidth: 200,checkboxSelection: checkboxSelection, headerCheckboxSelection: headerCheckboxSelection,filter: 'agTextColumnFilter'  },
    { field: 'age',hide:true,suppressMenu: false,minWidth: 150, filter: 'agTextColumnFilter'  },
      { field: 'country',hide:true, suppressMenu: false,minWidth: 200, filter: 'agTextColumnFilter' },
   ],},
   {
    headerName: 'Competition',
    children: [{ field: 'year',suppressMenu: false,minWidth: 200, filter: 'agNumberColumnFilter', }, 
    { field: 'date', hide:true,filter: 'agDateColumnFilter',minWidth: 200, dateFormat: 'd/m/Y',filterParams: dateFilterParams,suppressMenu: false,

     
      menuTabs: ['filterMenuTab', 'generalMenuTab', 'columnsMenuTab'], }],
  },
  { field: 'sport', minWidth: 150,suppressMenu: false, filter: 'agSetColumnFilter',menuTabs: ['filterMenuTab', 'columnsMenuTab'], },
  {
    headerName: 'Medals',
    children: [
      { field: 'gold',hide:true,suppressMenu: false, minWidth: 150,filter: 'agTextColumnFilter',
      menuTabs: ['generalMenuTab', 'gibberishMenuTab'], },
      { field: 'silver',hide:true,suppressMenu: false,minWidth: 150, filter: 'agTextColumnFilter',
      menuTabs: ['generalMenuTab', 'gibberishMenuTab'], },
      { field: 'bronze',hide:true,suppressMenu: false, minWidth: 150,filter: 'agTextColumnFilter',
      menuTabs: ['generalMenuTab', 'gibberishMenuTab'], },
      { field: 'total',minWidth: 150,filter: 'agNumberColumnFilter', },
    ],
  },
    
   
  ];
  var tooltipRenderer = function(params)
{
    return '<span title="' + params.value + '">'+params.value+'</span>';
};
  const gridOptions = {
    columnDefs: columnDefs,
    pagination: true,
    paginationPageSize: 100,
    defaultColDef: {
    flex: 1,
    enableRowGroup: true,
    enablePivot: true,
    enableValue: true,
    minWidth: 50,
    floatingFilter: true,
    suppressColumnsToolPanel:false,
    filter: true,
    resizable: true,
    sortable: true,
    showToolPanel:false,
    cellRenderer: tooltipRenderer,
    },
    sideBar: {
        toolPanels: [
            {
                id: 'columns',
                labelDefault: 'Columns',
                labelKey: 'columns',
                iconKey: 'columns',
                toolPanel: 'agColumnsToolPanel',
                minWidth: 225,
                maxWidth: 225,
                width: 225
            },
            {
                id: 'filters',
                labelDefault: 'Filters',
                labelKey: 'filters',
                iconKey: 'filter',
                toolPanel: 'agFiltersToolPanel',
                minWidth: 180,
                maxWidth: 400,
                width: 250
            },
            
        ],
        position: 'right',
        defaultToolPanel: ''
    },
    autoGroupColumnDef: {
    minWidth: 200,
  },
  animateRows: true,
  rowGroupPanelShow: 'always',
 rowDragManaged: false,
  rowDragMultiRow: true,
  rowSelection: 'multiple',
//   animateRows: true,
    hiddenByDefault:true,
      defaultToolPanel:false,
     pivotPanelShow: 'always',
    tooltipShowDelay: 1000,
  tooltipMouseTrack: true,
  suppressRowClickSelection: true,
  groupSelectsChildren: true,
  debug: true,
  
  
  
  enableRangeSelection: true,

  pagination: true,
  paginationPageSize: 100,
//   autoGroupColumnDef: autoGroupColumnDef,
  onFirstDataRendered: onFirstDataRendered,
paginationNumberFormatter: (params) => {
    return '[' + params.value.toLocaleString() + ']';
  },
  // set rowData to null or undefined to show loading panel by default
  rowData: null,
  columnDefs: columnDefs,
    getMainMenuItems: getMainMenuItems,
    postProcessPopup: (params) => {
      // check callback is for menu
      if (params.type !== 'columnMenu') {
        return;
      }
      const columnId = params.column ? params.column.getId() : undefined;
      if (columnId === 'gold') {
        const ePopup = params.ePopup;
  
        let oldTopStr = ePopup.style.top;
        // remove 'px' from the string (AG Grid uses px positioning)
        oldTopStr = oldTopStr.substring(0, oldTopStr.indexOf('px'));
        const oldTop = parseInt(oldTopStr);
        const newTop = oldTop + 25;
  
        ePopup.style.top = newTop + 'px';
      }
    }
    
  };
  function onFirstDataRendered(params) {
  params.api.paginationGoToPage(0);
}
function setText(selector, text) {
  document.querySelector(selector).innerHTML = text;
};


 function onRowCount() {
  var value = document.getElementById('row-count').value;
  gridOptions.api.paginationGetRowCount(Number(value));
}

function onPageSizeChanged() {
  var value = document.getElementById('page-size').value;
  gridOptions.api.paginationSetPageSize(Number(value));
}

  function getMainMenuItems(params) {
    // you don't need to switch, we switch below to just demonstrate some different options
    // you have on how to build up the menu to return
    switch (params.column.getId()) {
      // return the defaults, put add some extra items at the end
      case 'athlete':
        const athleteMenuItems = params.defaultItems.slice(0);
        athleteMenuItems.push({
          name: 'AG Grid Is Great',
          action: () => {
            console.log('AG Grid is great was selected');
          },
        });
        athleteMenuItems.push({
          name: 'Casio Watch',
          action: () => {
            console.log('People who wear casio watches are cool');
          },
        });
        athleteMenuItems.push({
          name: 'Custom Sub Menu',
          subMenu: [
            {
              name: 'Black',
              action: () => {
                console.log('Black was pressed');
              },
            },
            {
              name: 'White',
              action: () => {
                console.log('White was pressed');
              },
            },
            {
              name: 'Grey',
              action: () => {
                console.log('Grey was pressed');
              },
            },
          ],
        });
        return athleteMenuItems;
  
      // return some dummy items
      case 'age':
        return [
          {
            // our own item with an icon
            name: 'Joe Abercrombie',
            action: () => {
              console.log('He wrote a book');
            },
            icon:
              '<img src="https://www.ag-grid.com/example-assets/lab.png" style="width: 14px;" />',
          },
          {
            // our own icon with a check box
            name: 'Larsson',
            action: () => {
              console.log('He also wrote a book');
            },
            checked: true,
          },
          'resetColumns', // a built in item
        ];
  
      // return all the default items, but remove app separators and the two sub menus
      case 'country':
        const countryMenuItems = [];
        const itemsToExclude = ['separator', 'pinSubMenu', 'valueAggSubMenu'];
        params.defaultItems.forEach((item) => {
          if (itemsToExclude.indexOf(item) < 0) {
            countryMenuItems.push(item);
          }
        });
        return countryMenuItems;
  
      default:
        // make no changes, just accept the defaults
        return params.defaultItems;
    }
  }
  
  // setup the grid after the page has finished loading
  document.addEventListener('DOMContentLoaded', () => {
    const gridDiv = document.querySelector('#myGrid');
    new agGrid.Grid(gridDiv, gridOptions);
  
    fetch('https://alerts.unisimcard.biz/data.php')
      .then((response) => response.json())
      .then((data) => {
        gridOptions.api.setRowData(data);
      });
  });
</script>
</body>
</html>
