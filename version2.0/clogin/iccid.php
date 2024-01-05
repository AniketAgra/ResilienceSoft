<?php
session_start();
if(isset($_SESSION['user'],$_SESSION['type']) AND ($_SESSION['type']=='Admin'))
{
    include("includes/config.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>UniSIM | ICCID</title>
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
                                    <div class="col-md-4 col-sm-5">
                                        <h4 class="page-title">ICCID </h4>
                                    </div>
                                    <div class="col-md-4 col-sm-4">
                                        <h5 class="page-title">
                                            <label>Total : <span id="total"></span></label>
                                            <label class="ml-3">Dealer Charge : $<span id="total_qty"></span></label>
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
    { headerName: 'SIM Id', field: 'id',  minWidth: 100, suppressMenu: false, filter: 'agTextColumnFilter',menuTabs: ['filterMenuTab', 'columnsMenuTab'], },
    { headerName: 'ICCID', field: 'ICCID', minWidth: 200,suppressMenu: false, filter: 'agTextColumnFilter',menuTabs: ['filterMenuTab', 'columnsMenuTab'], },
    { headerName: 'Number', field: 'Number', minWidth: 150,suppressMenu: false, filter: 'agTextColumnFilter',menuTabs: ['filterMenuTab', 'columnsMenuTab'], },
    { headerName: 'IMSI', field: 'IMSI', hide:true, minWidth: 180,suppressMenu: false, filter: 'agTextColumnFilter',menuTabs: ['filterMenuTab', 'columnsMenuTab'], },
    { headerName: 'Source', field: 'source', minWidth: 180,suppressMenu: false, filter: 'agTextColumnFilter',menuTabs: ['filterMenuTab', 'columnsMenuTab'], },
    { headerName: 'LPA Value', field: 'LPA_Value', hide:true, minWidth: 150,suppressMenu: false, filter: 'agTextColumnFilter',menuTabs: ['filterMenuTab', 'columnsMenuTab'], },
    { headerName: 'Order ID', field: 'Order_ID', minWidth: 150,suppressMenu: false, filter: 'agTextColumnFilter',menuTabs: ['filterMenuTab', 'columnsMenuTab'], },
    { headerName: 'Product Id', field: 'product_id', minWidth: 150,suppressMenu: false, filter: 'agTextColumnFilter',menuTabs: ['filterMenuTab', 'columnsMenuTab'], },
    { headerName: 'I Account', field: 'i_account', minWidth: 150,suppressMenu: false, filter: 'agTextColumnFilter',menuTabs: ['filterMenuTab', 'columnsMenuTab'], },
    { headerName: 'Mail Status', field: 'mailStatus', hide:true, minWidth: 150,suppressMenu: false, filter: 'agTextColumnFilter',menuTabs: ['filterMenuTab', 'columnsMenuTab'], },
    { headerName: 'Status', field: 'Status',  filter: 'agSetColumnFilter', minWidth: 130,sortable: false,suppressMenu: false,
    	cellRenderer : function(params){
    	    if(params.data.Status == 'Success') {
    	        return '<div class="text-success">Success</div>';
    	    }  else if(params.data.Status == 'Pending') {
                return '<div class="text-primary">Pending</div>';
            } else {
                return ''
            }
    	}
    },
    //{ headerName: 'Modify By', field: 'modifyBy', hide:true, minWidth: 200,suppressMenu: false, filter: 'agTextColumnFilter',menuTabs: ['filterMenuTab', 'columnsMenuTab'], },
    //{ headerName: 'Created By', field: 'name', hide:true, minWidth: 150,suppressMenu: false, filter: 'agTextColumnFilter',menuTabs: ['filterMenuTab', 'columnsMenuTab'], },
    //{ headerName: 'Modify On', field: 'modifyOn', hide:true, minWidth: 200,suppressMenu: false, filter: 'agDateColumnFilter',menuTabs: ['filterMenuTab', 'columnsMenuTab'], },
    { headerName: 'Created At', field: 'created_At', filterParams: dateFilterParams, minWidth: 200,suppressMenu: false, filter: 'agDateColumnFilter',menuTabs: ['filterMenuTab', 'columnsMenuTab'], },
    // { headerName: 'Action', filter: false, minWidth: 150, sortable: false, suppressMenu: false,
    //     cellRenderer : function(params){
    //         return '<div class="text-center"><a href="add-brands.php?id='+params.data.id+'" class="btn btn-info btn-sm mr-2"><span class="fa fa-pen"></span></a><a href="delete.php?value=ICCID&id='+params.data.id+'" class="btn btn-primary btn-sm mr-2"><span class="fa fa-trash"></span></a><a href="change-plans-status.php?id='+params.data.id+'" class="btn btn-warning btn-sm"><span class="fa fa-ban"></span></a></div>'
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
  
    fetch('data/iccid.php')
      .then((response) => response.json())
      .then((data) => {
        gridOptions.api.setRowData(data);
      });
  });
</script>
</body>
</html>
<?php } else{ header("location:index.php"); } ?>