var checkboxSelection = function (params) {
  // we put checkbox on the name if we are not doing grouping
  return params.columnApi.getRowGroupColumns().length === 0;
};
var headerCheckboxSelection = function (params) {
  // we put checkbox on the name if we are not doing grouping
  return params.columnApi.getRowGroupColumns().length === 0;
};
class CustomHeader {
  init(agParams) {
    this.agParams = agParams;
    this.eGui = document.createElement('div');
    this.eGui.innerHTML = `
            <div class="customHeaderMenuButton">
                <i class="fa ${this.agParams.menuIcon}"></i>
            </div>
            <div class="customHeaderLabel">${this.agParams.displayName}</div>
            <div class="customSortDownLabel inactive">
                <i class="fa fa-long-arrow-alt-down"></i>
            </div>
            <div class="customSortUpLabel inactive">
                <i class="fa fa-long-arrow-alt-up"></i>
            </div>
            <div class="customSortRemoveLabel inactive">
                <i class="fa fa-times"></i>
            </div>
        `;

    this.eMenuButton = this.eGui.querySelector('.customHeaderMenuButton');
    this.eSortDownButton = this.eGui.querySelector('.customSortDownLabel');
    this.eSortUpButton = this.eGui.querySelector('.customSortUpLabel');
    this.eSortRemoveButton = this.eGui.querySelector('.customSortRemoveLabel');

    if (this.agParams.enableMenu) {
      this.onMenuClickListener = this.onMenuClick.bind(this);
      this.eMenuButton.addEventListener('click', this.onMenuClickListener);
    } else {
      this.eGui.removeChild(this.eMenuButton);
    }

    if (this.agParams.enableSorting) {
      this.onSortAscRequestedListener = this.onSortRequested.bind(this, 'asc');
      this.eSortDownButton.addEventListener(
        'click',
        this.onSortAscRequestedListener
      );
      this.onSortDescRequestedListener = this.onSortRequested.bind(
        this,
        'desc'
      );
      this.eSortUpButton.addEventListener(
        'click',
        this.onSortDescRequestedListener
      );
      this.onRemoveSortListener = this.onSortRequested.bind(this, null);
      this.eSortRemoveButton.addEventListener(
        'click',
        this.onRemoveSortListener
      );

      this.onSortChangedListener = this.onSortChanged.bind(this);
      this.agParams.column.addEventListener(
        'sortChanged',
        this.onSortChangedListener
      );
      this.onSortChanged();
    } else {
      this.eGui.removeChild(this.eSortDownButton);
      this.eGui.removeChild(this.eSortUpButton);
      this.eGui.removeChild(this.eSortRemoveButton);
    }
  }

  onSortChanged() {
    const deactivate = (toDeactivateItems) => {
      toDeactivateItems.forEach((toDeactivate) => {
        toDeactivate.className = toDeactivate.className.split(' ')[0];
      });
    };

    const activate = (toActivate) => {
      toActivate.className = toActivate.className + ' active';
    };

    if (this.agParams.column.isSortAscending()) {
      deactivate([this.eSortUpButton, this.eSortRemoveButton]);
      activate(this.eSortDownButton);
    } else if (this.agParams.column.isSortDescending()) {
      deactivate([this.eSortDownButton, this.eSortRemoveButton]);
      activate(this.eSortUpButton);
    } else {
      deactivate([this.eSortUpButton, this.eSortDownButton]);
      activate(this.eSortRemoveButton);
    }
  }

  getGui() {
    return this.eGui;
  }

  onMenuClick() {
    this.agParams.showColumnMenu(this.eMenuButton);
  }

  onSortRequested(order, event) {
    this.agParams.setSort(order, event.shiftKey);
  }

  destroy() {
    if (this.onMenuClickListener) {
      this.eMenuButton.removeEventListener('click', this.onMenuClickListener);
    }
    this.eSortDownButton.removeEventListener(
      'click',
      this.onSortAscRequestedListener
    );
    this.eSortUpButton.removeEventListener(
      'click',
      this.onSortDescRequestedListener
    );
    this.eSortRemoveButton.removeEventListener(
      'click',
      this.onRemoveSortListener
    );
    this.agParams.column.removeEventListener(
      'sortChanged',
      this.onSortChangedListener
    );
  }
}
class CustomTooltip {
  init(params) {
    const eGui = (this.eGui = document.createElement('div'));
    const color = params.color || 'white';
    const data = params.api.getDisplayedRowAtIndex(params.rowIndex).data;

    eGui.classList.add('custom-tooltip');
    //@ts-ignore
    eGui.style['background-color'] = color;
    eGui.innerHTML = `
            <p>
                <span class"name">${data.athlete}</span>
            </p>
            <p>
                <span>Country: </span>
                ${data.country}
            </p>
            <p>
                <span>Total: </span>
                ${data.total}
            </p>
        `;
  }

  getGui() {
    return this.eGui;
  }
}

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
function onBtExport() {
  gridOptions.api.exportDataAsExcel();
}
// var autoGroupColumnDef = {
//   headerName: 'Group',
//   minWidth: 170,
//   field: 'athlete',
//   valueGetter: (params) => {
//     if (params.node.group) {
//       return params.node.key;
//     } else {
//       return params.data[params.colDef.field];
//     }
//   },
//   headerCheckboxSelection: true,
//   cellRenderer: 'agGroupCellRenderer',
//   cellRendererParams: {
//     checkbox: true,
//   },
// };
function actionCellRenderer(params) {
  let eGui = document.createElement('div');

  let editingCells = params.api.getEditingCells();
  // checks if the rowIndex matches in at least one of the editing cells
  let isCurrentRowEditing = editingCells.some((cell) => {
    return cell.rowIndex === params.node.rowIndex;
  });

  if (isCurrentRowEditing) {
    eGui.innerHTML = `
        <button  
          class="action-button update"
          data-action="update">
               update  
        </button>
        <button  
          class="action-button cancel"
          data-action="cancel">
               cancel
        </button>
        `;
  } else {
    eGui.innerHTML = `
        <button 
          class="action-button edit"  
          data-action="edit">
             edit 
          </button>
        <button 
          class="action-button delete"
          data-action="delete">
             delete
        </button>
        `;
  }

  return eGui;
}
 function onCellClicked(params) {
    // Handle click event for action cells
    if (
      params.column.colId === 'action' &&
      params.event.target.dataset.action
    ) {
      let action = params.event.target.dataset.action;

      if (action === 'edit') {
        params.api.startEditingCell({
          rowIndex: params.node.rowIndex,
          // gets the first columnKey
          colKey: params.columnApi.getDisplayedCenterColumns()[0].colId,
        });
      }

      if (action === 'delete') {
        params.api.applyTransaction({
          remove: [params.node.data],
        });
      }

      if (action === 'update') {
        params.api.stopEditing(false);
      }

      if (action === 'cancel') {
        params.api.stopEditing(true);
      }
    }
  }
const columnDefs = [
    
    { field: 'requestId',suppressMenu: true,rowDrag:true,tooltipField: 'athlete',
    chartDataType: 'category', rowDragManaged:false,headerCheckboxSelection: true,
      checkboxSelection: true,
  suppressMoveWhenRowDragging: false, minWidth:200,checkboxSelection: checkboxSelection,
    headerCheckboxSelection: headerCheckboxSelection,  filter: 'agTextColumnFilter',  },
    { field: 'createdDate',chartDataType: 'series' ,
    filter: 'agDateColumnFilter',minWidth:200,dateFormat: 'd/m/Y',
    filterParams: dateFilterParams,
    suppressMenu: true,
 menuTabs: ['filterMenuTab', 'generalMenuTab', 'columnsMenuTab'], 
  },
    { field: 'scheduled',sortable: false,
    headerComponentParams: { menuIcon: 'fa-external-link-alt' },chartDataType: 'series' ,suppressMenu: true,minWidth: 150, filter: 'agTextColumnFilter',suppressHeaderKeyboardEvent: (params) => {
      var key = params.event.key;

      return key === 'ArrowLeft' || key === 'ArrowRight' || key === 'Enter';
    },  },
      { field: 'iccid',suppressHeaderKeyboardEvent: (params) => {
      var key = params.event.key;

      return key === 'ArrowLeft' || key === 'ArrowRight' || key === 'Enter';
    },suppressMenu: true,chartDataType: 'series' , suppressMenu: false,minWidth: 200, filter: 'agTextColumnFilter' },
  
 { field: 'msisdn',suppressHeaderKeyboardEvent: (params) => {
      var key = params.event.key;

      return key === 'ArrowLeft' || key === 'ArrowRight' || key === 'Enter';
    },sortable: false ,tooltipField: 'year',chartDataType: 'series' ,suppressMenu: false,minWidth: 200, filter: 'agNumberColumnFilter', }, 
    
  { field: 'Brand Name',suppressHeaderKeyboardEvent: (params) => {
      var key = params.event.key;

      return key === 'ArrowLeft' || key === 'ArrowRight' || key === 'Enter';
    },  sortable: false ,tooltipField: 'sport',minWidth: 150,chartDataType: 'series' ,
     
       },
  
      { field: 'Distributor',suppressHeaderKeyboardEvent: (params) => {
      var key = params.event.key;

      return key === 'ArrowLeft' || key === 'ArrowRight' || key === 'Enter';
    }, headerComponentParams: { menuIcon: 'fa-cog' },chartDataType: 'series' ,enableRowGroup: false,suppressMenu: false, minWidth: 150,filter: 'agTextColumnFilter',
      menuTabs: ['generalMenuTab', 'gibberishMenuTab'], },
      { field: 'Plan Name',suppressHeaderKeyboardEvent: (params) => {
      var key = params.event.key;

      return key === 'ArrowLeft' || key === 'ArrowRight' || key === 'Enter';
    },sortable: false ,chartDataType: 'series' ,enableRowGroup: false,suppressMenu: false,minWidth: 150, filter: 'agTextColumnFilter',
      menuTabs: ['generalMenuTab', 'gibberishMenuTab'], },
      { field: 'Currency',suppressHeaderKeyboardEvent: (params) => {
      var key = params.event.key;

      return key === 'ArrowLeft' || key === 'ArrowRight' || key === 'Enter';
    },suppressMenu: true,chartDataType: 'series' ,enableRowGroup: false,suppressMenu: false, minWidth: 150,filter: 'agTextColumnFilter',
      menuTabs: ['generalMenuTab', 'gibberishMenuTab'], },
      { field: 'Amount',suppressHeaderKeyboardEvent: (params) => {
      var key = params.event.key;

      return key === 'ArrowLeft' || key === 'ArrowRight' || key === 'Enter';
    },sortable: false,tooltipField: 'total',chartDataType: 'series' ,minWidth: 150,enableRowGroup: false,filter: 'agNumberColumnFilter', },
   { field: 'Status',suppressHeaderKeyboardEvent: (params) => {
      var key = params.event.key;

      return key === 'ArrowLeft' || key === 'ArrowRight' || key === 'Enter';
    },sortable: false,tooltipField: 'total',chartDataType: 'series' ,minWidth: 150,enableRowGroup: false,filter: 'agNumberColumnFilter', },
 { field: 'Activation By',suppressHeaderKeyboardEvent: (params) => {
      var key = params.event.key;

      return key === 'ArrowLeft' || key === 'ArrowRight' || key === 'Enter';
    },sortable: false,tooltipField: 'total',chartDataType: 'series' ,minWidth: 150,enableRowGroup: false,filter: 'agNumberColumnFilter', },
 
 
 
 
 { field: 'Action',filter: false,
    resizable: false,minWidth: 200,
    sortable: false,
headerCheckboxSelection: false,suppressMenu: false,headerComponentParams: false,enableRowGroup: false, filter: false, 
      cellRenderer : function(params){
                    return '<a class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a><a class="delete" data-toggle="modal"><i class="material-icons" >&#xE872;</i></a>'
                },},
                
    
   
  ];
  var tooltipRenderer = function(params)
{
    return '<span title="' + params.value + '">'+params.value+'</span>';
};
  const gridOptions = {
           onRowEditingStarted: (params) => {
    params.api.refreshCells({
      columns: ['action'],
      rowNodes: [params.node],
      force: true,
    });
  },
  onRowEditingStopped: (params) => {
    params.api.refreshCells({
      columns: ['action'],
      rowNodes: [params.node],
      force: true,
    });
  },
    columnDefs: columnDefs,
    suppressMenuHide: false,
  components: {
    agColumnHeader: CustomHeader,
  },
     
//   columnDefs: columnDefs,
//   animateRows: true,
  
    defaultColDef: {
    flex: 1,
   editable: true,
    enableRowGroup: true,
    enablePivot: true,
    enableValue: true,
    suppressCopySingleCellRanges: true,
  enableRangeSelection: true,
  suppressMultiRangeSelection: true,
    floatingFilter: true,
    suppressColumnsToolPanel:false,
    filter: true,
    resizable: true,
    sortable: true,
suppressKeyboardEvent: suppressNavigation,
    suppressHeaderKeyboardEvent: suppressUpDownNavigation,
   tooltipComponent: CustomTooltip,
    showToolPanel:false,
    headerComponentParams: {
      menuIcon: 'fa-bars',
    },
    headerCheckboxSelection: false,
    enableRangeSelection: true,
    },
//     autoGroupColumnDef: {
//     headerName: 'Athlete',
//     // minWidth: 300,
//     cellRendererParams: {
      
//       checkbox:true,
     
//     },
//   },
 
  copySelectedRangeToClipboard:true,
  copySelectedRowsToClipboard:true,
  groupSelectsChildren : true,
  rowSelection: 'multiple',
  suppressCopySingleCellRanges: true,
  suppressRowClickSelection: true,
//   suppressAggFuncInHeader: true,
    // columnHoverHighlight: true,
    tooltipShowDelay: 1000,
  tooltipMouseTrack: true,
    popupParent: document.body,
  columnDefs: columnDefs,
  enableRangeSelection: true,
   rowSelection: 'multiple',
//   copyHeadersToClipboard: false,
//   suppressCopyRowsToClipboard: false,

  enableCharts: true,
  onChartCreated: onChartCreated,
  onChartRangeSelectionChanged: onChartRangeSelectionChanged,
  onChartOptionsChanged: onChartOptionsChanged,
  onChartDestroyed: onChartDestroyed,
    // columnHoverHighlight: true,
    
    rowDragManaged: false,
  suppressMoveWhenRowDragging: true,
  statusBar: {
    statusPanels: [
      { statusPanel: 'agTotalAndFilteredRowCountComponent', align: 'left' },
      { statusPanel: 'agTotalRowCountComponent', align: 'center' },
      { statusPanel: 'agFilteredRowCountComponent' },
      { statusPanel: 'agSelectedRowCountComponent' },
      { statusPanel: 'agAggregationComponent' },
    ],
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
//     autoGroupColumnDef: {
//     minWidth: 200,
//   },
  
  
  suppressExcelExport: true,
  popupParent: document.body,
rowSelection: 'multiple',
  onSelectionChanged: onSelectionChanged,
  animateRows: true,
    hiddenByDefault:true,
      defaultToolPanel:false,
     pivotPanelShow: 'always',
    // tooltipShowDelay: 1000,
  tooltipMouseTrack: true,
  
  rowMultiSelectWithClick: true,
  debug: true,
  cacheQuickFilter: true,
  rowGroupPanelShow: 'always',
  ensureDomOrder: true,
  suppressColumnVirtualisation: true,
  suppressRowVirtualisation: true,
  

  pagination: true,
  paginationPageSize: 100,
//   autoGroupColumnDef: autoGroupColumnDef,
onSelectionChanged: onSelectionChanged,
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
function suppressEnter(params) {
  var KEY_ENTER = 'Enter';

  var event = params.event;
  var key = event.key;
  var suppress = key === KEY_ENTER;

  return suppress;
}

function suppressNavigation(params) {
  var KEY_A = 'A';
  var KEY_C = 'C';
  var KEY_V = 'V';
  var KEY_D = 'D';

  var KEY_PAGE_UP = 'PageUp';
  var KEY_PAGE_DOWN = 'PageDown';
  var KEY_TAB = 'Tab';
  var KEY_LEFT = 'ArrowLeft';
  var KEY_UP = 'ArrowUp';
  var KEY_RIGHT = 'ArrowRight';
  var KEY_DOWN = 'ArrowDown';
  var KEY_F2 = 'F2';
  var KEY_BACKSPACE = 'Backspace';
  var KEY_ESCAPE = 'Escape';
  var KEY_SPACE = ' ';
  var KEY_DELETE = 'Delete';
  var KEY_PAGE_HOME = 'Home';
  var KEY_PAGE_END = 'End';

  var event = params.event;
  var key = event.key;

  var keysToSuppress = [
    KEY_PAGE_UP,
    KEY_PAGE_DOWN,
    KEY_TAB,
    KEY_F2,
    KEY_ESCAPE,
  ];

  var editingKeys = [
    KEY_LEFT,
    KEY_RIGHT,
    KEY_UP,
    KEY_DOWN,
    KEY_BACKSPACE,
    KEY_DELETE,
    KEY_SPACE,
    KEY_PAGE_HOME,
    KEY_PAGE_END,
  ];

  if (event.ctrlKey || event.metaKey) {
    keysToSuppress.push(KEY_A);
    keysToSuppress.push(KEY_V);
    keysToSuppress.push(KEY_C);
    keysToSuppress.push(KEY_D);
  }

  if (!params.editing) {
    keysToSuppress = keysToSuppress.concat(editingKeys);
  }

  if (
    params.column.getId() === 'country' &&
    (key === KEY_UP || key === KEY_DOWN)
  ) {
    return false;
  }

  var suppress = keysToSuppress.some(function (suppressedKey) {
    return suppressedKey === key || key.toUpperCase() === suppressedKey;
  });

  return suppress;
}

function suppressUpDownNavigation(params) {
  var key = params.event.key;

  return key === 'ArrowUp' || key === 'ArrowDown';
}

function onChartCreated(event) {
  console.log('Created chart with ID ' + event.chartId, event);
}

function onChartRangeSelectionChanged(event) {
  console.log(
    'Changed range selection of chart with ID ' + event.chartId,
    event
  );
}

function onChartOptionsChanged(event) {
  console.log('Changed options of chart with ID ' + event.chartId, event);
}

function onChartDestroyed(event) {
  console.log('Destroyed chart with ID ' + event.chartId, event);
}

function onBtSuppressRowDrag() {
  gridOptions.api.setSuppressRowDrag(true);
}

function onBtShowRowDrag() {
  gridOptions.api.setSuppressRowDrag(false);
}
function setText(selector, text) {
  document.querySelector(selector).innerHTML = text;
};
function onSelectionChanged() {
  var selectedRows = gridOptions.api.getSelectedRows();
  var selectedRowsString = '';
  var maxToShow = 5;

  selectedRows.forEach(function (selectedRow, index) {
    if (index >= maxToShow) {
      return;
    }

    if (index > 0) {
      selectedRowsString += ', ';
    }

    selectedRowsString += selectedRow.athlete;
  });

  if (selectedRows.length > maxToShow) {
    var othersCount = selectedRows.length - maxToShow;
    selectedRowsString +=
      ' and ' + othersCount + ' other' + (othersCount !== 1 ? 's' : '');
  }

  document.querySelector('#selectedRows').innerHTML = selectedRowsString;
}
function onFilterTextBoxChanged() {
  gridOptions.api.setQuickFilter(
    document.getElementById('filter-text-box').value
  );
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
        // athleteMenuItems.push({
        //   name: 'AG Grid Is Great',
        //   action: () => {
        //     console.log('AG Grid is great was selected');
        //   },
        // });
        // athleteMenuItems.push({
        //   name: 'Casio Watch',
        //   action: () => {
        //     console.log('People who wear casio watches are cool');
        //   },
        // });
        // athleteMenuItems.push({
        //   name: 'Custom Sub Menu',
        //   subMenu: [
        //     {
        //       name: 'Black',
        //       action: () => {
        //         console.log('Black was pressed');
        //       },
        //     },
        //     {
        //       name: 'White',
        //       action: () => {
        //         console.log('White was pressed');
        //       },
        //     },
        //     {
        //       name: 'Grey',
        //       action: () => {
        //         console.log('Grey was pressed');
        //       },
        //     },
        //   ],
        // });
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
  
    fetch('http://crm.skyusainc.com/demo/helpdesk/data/home.php')
      .then((response) => response.json())
      .then((data) => {
        gridOptions.api.setRowData(data);
      });
  });