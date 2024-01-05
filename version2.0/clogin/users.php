<?php
session_start();
if(isset($_SESSION['user'],$_SESSION['role']) AND ($_SESSION['role']=='A'))
{
    include("../includes/config.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>UniSIM | Users</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="shortcut icon" href="assets/images/favicon.ico">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" id="bootstrap-stylesheet" />
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css"  id="app-stylesheet" />
    <script src="https://unpkg.com/ag-grid-community/dist/ag-grid-community.min.js"></script>
    <script>
        var __basePath = "./";
    </script>
    <script src="https://unpkg.com/ag-grid-enterprise@28.0.0/dist/ag-grid-enterprise.min.js"></script>
    <style>
        .ag-input-field-input{ padding:8px; }
        .ag-ltr .ag-floating-filter-button{ display:none; }
    </style>
</head>
<body>
<!-- Begin page -->
<div id="wrapper">
    
    <?php include("includes/header.php"); ?>
    <?php include("includes/sidebar.php"); ?>
    

    <!-- Start Page Content here -->
    <div class="content-page">
        <div class="content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card mt-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3 col-sm-6">
                                        <h4 class="page-title">Users 
                                            <a href="add-users.php" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Add User"><i class="fa fa-plus"></i></a>
                                        </h4>
                                    </div>
                                    <div class="col-md-5 col-sm-6">
                                        <h5 class="page-title">
                                            <label>Total : <span id="total"></span></label>
                                            <label class="ml-3">Active : <span id="atotal"></span></label>
                                            <label class="ml-3">Deactive : <span id="dtotal"></span></label>
                                        </h5>
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <input type="text" class="form-control mb-1" id="filter-text-box" placeholder="Search..." oninput="onFilterTextBoxChanged()"/>
                                    </div>
                                    <div class="col-md-1 col-sm-6">
                                        <div class="float-right d-flex">
                                            <div class="mr-3" style="cursor:pointer;" onclick="onBtExport()"><img src="assets/images/excel-app.svg" alt="" height="24"></div>
                                            <!--<div class="mr-3" style="cursor:pointer;"><img src="assets/images/file.svg" alt="" height="24"></div>-->
                                            <!--<div class="mr-1" style="cursor:pointer;"><img src="assets/images/mail.svg" alt="" height="24"></div>-->
                                        </div>
                                    </div>
                                </div>

                                
                                <div id="myGrid" class="ag-theme-alpine" style="height: 800px !important;"></div>
                            </div>
                        </div>

                    </div>
                </div>
                
            </div>
        </div> 
    
        <?php //include("includes/footer.php"); ?>

    </div>
    <!-- End Page content -->

</div>
<!-- END wrapper -->

<script src="assets/js/vendor.min.js"></script>
<script src="assets/js/app.min.js"></script>
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
        var dateParts = dateAsString.split('-');
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

const columnDefs = [
    { headerName: 'User Id', field: 'id', cellClass:'text-center', filter: 'agTextColumnFilter', minWidth: 100,sortable: false,suppressMenu: false,},
    <?php if($_SESSION['type']=='Admin'){ ?>
    { headerName: 'Dealer', field: 'dealerName', minWidth: 150,suppressMenu: false, filter: 'agTextColumnFilter',menuTabs: ['filterMenuTab', 'columnsMenuTab'], },
    <?php } ?>
    { headerName: 'Name', field: 'name', minWidth: 150,suppressMenu: false, filter: 'agTextColumnFilter',menuTabs: ['filterMenuTab', 'columnsMenuTab'], },
    { headerName: 'Email', field: 'email', minWidth: 200, suppressMenu: false, filter: 'agTextColumnFilter',menuTabs: ['filterMenuTab', 'columnsMenuTab'], },
    { headerName: 'Phone', field: 'phone', hide:true, minWidth: 150,suppressMenu: false, filter: 'agTextColumnFilter',menuTabs: ['filterMenuTab', 'columnsMenuTab'], },
    { headerName: 'Password', field: 'password', minWidth: 150, hide:true, suppressMenu: false, filter: 'agTextColumnFilter',menuTabs: ['filterMenuTab', 'columnsMenuTab'], },
    { headerName: 'Type', field: 'type', filter: 'agSetColumnFilter', minWidth: 100,sortable: false,suppressMenu: false,
    	cellRenderer : function(params){
    	   return '<div class="text-left">'+params.data.type+'</div>';
    	}
    },
    { headerName: 'Status', field: 'status', filter: 'agSetColumnFilter', minWidth: 100,sortable: false,suppressMenu: false,
    	cellRenderer : function(params){
    	    if(params.data.status == 'Active') {
    	        return '<div class="text-left text-success">Active</div>';
    	    }  else if(params.data.status == 'Inactive') {
                return '<div class="text-left text-primary">Inactive</div>';
            } else {
                return ''
            }
    	}
    },
    // { headerName: 'Modify By', field: 'modifyBy', hide:true, minWidth: 200,suppressMenu: false, filter: 'agTextColumnFilter',menuTabs: ['filterMenuTab', 'columnsMenuTab'], },
    // { headerName: 'Created By', field: 'createdBy', hide:true, minWidth: 150,suppressMenu: false, filter: 'agTextColumnFilter',menuTabs: ['filterMenuTab', 'columnsMenuTab'], },
    // { headerName: 'Modify On', field: 'modifyOn', hide:true, minWidth: 200,suppressMenu: false, filter: 'agDateColumnFilter',menuTabs: ['filterMenuTab', 'columnsMenuTab'], },
    { headerName: 'Created At', field: 'created_At', filterParams: dateFilterParams, minWidth: 200,suppressMenu: false, filter: 'agDateColumnFilter',menuTabs: ['filterMenuTab', 'columnsMenuTab'], },
    { headerName: 'Action', filter: false, minWidth: 150, sortable: false, suppressMenu: false,
        cellRenderer : function(params){
            return '<div class="text-center"><a href="edit-users.php?id='+params.data.id+'&type='+params.data.type+'" class="btn btn-info btn-sm mr-2" data-toggle="tooltip" data-placement="top" title="Edit User"><span class="fa fa-pen"></span></a><a href="delete.php?value='+params.data.type+'&id='+params.data.id+'" class="btn btn-primary btn-sm mr-2" data-toggle="tooltip" data-placement="top" title="Delete User"><span class="fa fa-trash"></span></a><a href="status.php?value='+params.data.type+'&id='+params.data.id+'&status='+params.data.status+'" class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="top" title="Change Status"><span class="fa fa-ban"></span></a></div>'
        } },
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
    // animateRows: true,
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
    // autoGroupColumnDef: autoGroupColumnDef,
    onFirstDataRendered: onFirstDataRendered,
    paginationNumberFormatter: (params) => {
        return '[' + params.value.toLocaleString() + ']';
    },
    // set rowData to null or undefined to show loading panel by default
    rowData: null,
    columnDefs: columnDefs,
    filter: true,
    onFilterChanged: params => {
        var total = 0;
        var active = 0;
        var deactive = 0;
        gridOptions.api.forEachNodeAfterFilterAndSort(function(node,data) { 
            if(node.data.status == 'Active')
            {
                active++;
            }
            if(node.data.status == 'Deactive')
            {
                deactive++;
            }
            total = gridOptions.api.getDisplayedRowCount();
        });
        $("#total").text(total);
        $("#atotal").text(Number(active));
        $("#dtotal").text(Number(deactive));
    }
    
      
};
function onFirstDataRendered(params) {
    params.api.paginationGoToPage(0);
}
function setText(selector, text) {
    document.querySelector(selector).innerHTML = text;
};
function onBtExport() {
    gridOptions.api.exportDataAsExcel();
}
function onFilterTextBoxChanged() {
    gridOptions.api.setQuickFilter(document.getElementById('filter-text-box').value);
}
function onRowCount() {
    var value = document.getElementById('row-count').value;
    gridOptions.api.paginationGetRowCount(Number(value));
}
function onPageSizeChanged() {
    var value = document.getElementById('page-size').value;
    gridOptions.api.paginationSetPageSize(Number(value));
}
  
// setup the grid after the page has finished loading
document.addEventListener('DOMContentLoaded', () => {
    const gridDiv = document.querySelector('#myGrid');
    new agGrid.Grid(gridDiv, gridOptions);
    fetch('data/users.php')
    .then((response) => response.json())
    .then((data) => {
        gridOptions.api.setRowData(data);
        var total = 0;
        var active = 0;
        var deactive = 0;
        gridOptions.api.forEachNodeAfterFilterAndSort(function(node,data) { 
            if(node.data.status == 'Active')
            {
                active++;
            }
            if(node.data.status == 'Deactive')
            {
                deactive++;
            }
            total = gridOptions.api.getDisplayedRowCount();
        });
        $("#total").text(total);
        $("#atotal").text(Number(active));
        $("#dtotal").text(Number(deactive));
    });
});
</script>
</body>
</html>
<?php } else{ header("location:index.php"); } ?>