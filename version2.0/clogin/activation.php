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
    <title>UniSIM | Activation</title>
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
        .page-title label { font-weight:500; }
    </style>
    <style>
        .box-1{
            border: 2px solid black;
            /*border-radius: 5%;*/
        }
        .box-2{
            border: 2px solid black;
            border-radius: 5%;
        }
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
                                    <div class="col-md-4 col-sm-6">
                                        <h4 class="page-title">Activation <?php if($_SESSION['type']=='Dealer' || $_SESSION['type']=='User'){ ?><a href="add-activation.php" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Add Activation"><i class="fa fa-plus"></i></a><a href="add-recharge.php" class="btn btn-warning btn-sm ml-2" data-toggle="tooltip" data-placement="top" title="Add Recharge"><i class="fa fa-plus"></i></a><?php } ?></h4>
                                    </div>
                                    <div class="col-md-4 col-sm-6">
                                        <h5 class="page-title" style="font-weight:400">
                                            <label>Activation : <span id="total"></span></label>
                                            <label class="ml-3">Dealer Charge : $<span id="total_rate"></span></label>
                                        </h5>
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <input type="text" class="form-control mb-1" id="filter-text-box" placeholder="Search..." oninput="onFilterTextBoxChanged()"/>
                                    </div>
                                    <div class="col-md-1 col-sm-6">
                                        <div class="float-right d-flex">
                                            <div class="mr-3" style="cursor:pointer;" onclick="onBtExport()"><img src="assets/images/excel-app.svg" alt="" height="24"></div>
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

<div class="modal" id="OpenICCID" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="edit_title">QR Code</h4>
                <a href="javascript:void(0);" style="float:right; font-size:20px; font-weight:bold;" data-dismiss="modal">&times;</a>
            </div>
            <div class="modal-body text-center box-1" id="view-qr"></div>
        </div>
    </div>
</div>


<script src="assets/js/vendor.min.js"></script>
<script src="assets/js/app.min.js"></script>
<script>
function OpenICCID(editid) 
{
    $.ajax({  
        url:"ajax/view-qr.php",  
        method:"POST",  
        data:{ edit_id:editid },  
        success:function(data){  
            $('#view-qr').html(data);      
            $('#OpenICCID').modal('show');  
        }  
    });  
}


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
    { headerName: 'Parent ID', field: 'parentId', minWidth: 100, hide:true, cellClass: 'text-center', suppressMenu: false, filter: 'agTextColumnFilter',menuTabs: ['filterMenuTab', 'columnsMenuTab'], },
    { headerName: 'Actv Id', field: 'id', filter: 'agTextColumnFilter', minWidth: 100, cellClass: 'text-center', sortable: false,suppressMenu: false,},
    { headerName: 'Batch', field: 'batch', filter: 'agTextColumnFilter', minWidth: 100, cellClass: 'text-center', sortable: false,suppressMenu: false,},
    { headerName: 'ICCID', field: 'ICCID', filter: 'agTextColumnFilter', minWidth: 210,sortable: false,suppressMenu: false,
    	cellRenderer : function(params){
    	    if(params.data.status == 'Success') {
    	        return '<div class="text-left"><a href="javascript:void(0);" style="color:black" onclick="OpenICCID('+params.data.id+');">'+params.data.ICCID+'</a></div>'
    	    } else {
    	        return params.data.ICCID
    	    } 
    	}
    },
    { headerName: 'MSISDN', field: 'MSISDN', minWidth: 100, hide:true, suppressMenu: false, filter: 'agTextColumnFilter',menuTabs: ['filterMenuTab', 'columnsMenuTab'], },
    <?php if($_SESSION['type']=='Admin'){ ?>
    { headerName: 'Dealer Name', field: 'dealerName', minWidth: 150,suppressMenu: false, filter: 'agTextColumnFilter',menuTabs: ['filterMenuTab', 'columnsMenuTab'], },
    <?php } ?>
    { headerName: 'Brand Name', field: 'brandName', minWidth: 100, suppressMenu: false, filter: 'agTextColumnFilter',menuTabs: ['filterMenuTab', 'columnsMenuTab'], },
    { headerName: 'Plan Name', field: 'planName', minWidth: 150,suppressMenu: false, filter: 'agTextColumnFilter',menuTabs: ['filterMenuTab', 'columnsMenuTab'], },
    { headerName: 'Retail Rate', field: 'retailRate', cellClass: 'text-center', minWidth: 100, hide:true, suppressMenu: false, filter: 'agTextColumnFilter',menuTabs: ['filterMenuTab', 'columnsMenuTab'], },
    { headerName: 'Open Balance', field: 'openBal', hide:true, cellClass: 'text-center', minWidth: 100, suppressMenu: false, filter: 'agTextColumnFilter',menuTabs: ['filterMenuTab', 'columnsMenuTab'], },
    { headerName: 'Dealer Rate', field: 'dealerRate', cellClass: 'text-center', minWidth: 150,suppressMenu: false, filter: 'agNumberColumnFilter',menuTabs: ['filterMenuTab', 'columnsMenuTab'], },
    { headerName: 'Close Balance', field: 'closeBal', cellClass: 'text-center', minWidth: 100, suppressMenu: false, filter: 'agTextColumnFilter',menuTabs: ['filterMenuTab', 'columnsMenuTab'], },
    { headerName: 'Notes', field: 'notes', hide:true, minWidth: 100, suppressMenu: false, filter: 'agTextColumnFilter',menuTabs: ['filterMenuTab', 'columnsMenuTab'], },
    { headerName: 'Status', field: 'status',  filter: 'agSetColumnFilter', minWidth: 100,sortable: false,suppressMenu: false,
    	cellRenderer : function(params){
    	    if(params.data.status == 'Success') {
    	        return '<div class="text-left text-success">Success</div>';
    	    }  else if(params.data.status == 'Pending') {
                return '<div class="text-left text-warning">Pending</div>';
            }  else if(params.data.status == 'Cancel') {
                return '<div class="text-left text-primary">Cancel</div>';
            } else {
                return ''
            }
    	}
    },
    { headerName: 'Activation Date', field: 'activation_Date', filterParams: dateFilterParams, minWidth: 200,suppressMenu: false, filter: 'agDateColumnFilter',menuTabs: ['filterMenuTab', 'columnsMenuTab'], },
    { headerName: 'Created At', field: 'created_At', filterParams: dateFilterParams, minWidth: 200,suppressMenu: false, filter: 'agDateColumnFilter',menuTabs: ['filterMenuTab', 'columnsMenuTab'], },
    // { headerName: 'Action', filter: false, minWidth: 150, sortable: false, suppressMenu: false,
    //     cellRenderer : function(params){
    //         return '<div class="text-center"><a href="edit-dealer.php?id='+params.data.id+'" class="btn btn-info btn-sm mr-2"><span class="fa fa-pen"></span></a><a href="delete-plans.php?id='+params.data.id+'" class="btn btn-primary btn-sm mr-2"><span class="fa fa-trash"></span></a><a href="change-plans-status.php?id='+params.data.id+'" class="btn btn-warning btn-sm"><span class="fa fa-ban"></span></a></div>'
    // } },
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
        cellRenderer: tooltipRenderer
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
    filter: true,
    onFilterChanged: params => {
        var total = 0;
        var dealerRate = 0;
        gridOptions.api.forEachNodeAfterFilterAndSort(function(node,data) { 
            if(node.data.dealerRate !='')
            {
                dealerRate = Number(dealerRate) + Number(node.data.dealerRate);
            }
            total = gridOptions.api.getDisplayedRowCount();
        });
    
        $("#total").text(total);
        $("#total_rate").text(Number(dealerRate));
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

fetch('data/activation.php')
    .then((response) => response.json())
    .then((data) => {
        gridOptions.api.setRowData(data);
        var total = 0;
        var dealerRate = 0;
        gridOptions.api.forEachNodeAfterFilterAndSort(function(node,data) { 
            if(node.data.dealerRate !='')
            {
                dealerRate = Number(dealerRate) + Number(node.data.dealerRate);
            }
            total = gridOptions.api.getDisplayedRowCount();
        });
        $("#total").text(total);
        $("#total_rate").text(Number(dealerRate));
    });
});
</script>
</body>
</html>
<?php } else{ header("location:index.php"); } ?>