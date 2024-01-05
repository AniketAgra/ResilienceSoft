<?php
session_start();
if( isset($_SESSION['admin_user']) && isset($_SESSION['admin_role']) && ($_SESSION['admin_role']=="A")){
	include("include/config.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
	<link rel="icon" href="assets/img/brand/favicon.ico" type="image/x-icon"/>
	<title>Blog Category</title>
	<link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css"/>
	<link rel="stylesheet" href="assets/plugins/web-fonts/icons.css"/>
	<link rel="stylesheet" href="assets/plugins/web-fonts/font-awesome/font-awesome.min.css">
	<link rel="stylesheet" href="assets/plugins/web-fonts/plugin.css"/>
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/skins.css">
	<link rel="stylesheet" href="assets/css/dark-style.css">
	<link rel="stylesheet" href="assets/css/colors/default.css">
	<link rel="stylesheet" href="assets/css/colors/color.css">
	<link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css">
	<link rel="stylesheet" href="assets/plugins/bootstrap-daterangepicker/daterangepicker.css">
	<link rel="stylesheet" href="assets/plugins/fileuploads/css/fileupload.css" type="text/css"/>
	<link rel="stylesheet" href="assets/plugins/fancyuploder/fancy_fileupload.css" />
	<link rel="stylesheet" href="assets/css/sidemenu/sidemenu.css">
	<link rel="stylesheet" href="assets/plugins/jqwidgets/styles/jqx.base.css" />
    <link rel="stylesheet" href="assets/plugins/jqwidgets/styles/jqx.energyblue.css" />
</head>
<body class="main-body leftmenu">
<?php
if(isset($_GET['del']))
{
	$del = base64_decode($_GET['del']);
	if(!empty($del))
	{
		$delete = mysqli_query($con, "delete from blog_category where id='$del'");
		if($delete)
		{
			header("location:blog-category.php");
		}
	}
}
?>

<!-- Loader -->
<div id="global-loader">
	<img src="assets/img/loader.svg" class="loader-img" alt="Loader">
</div>
<!-- End Loader -->

<!-- Page -->
<div class="page">

	<!-- Sidemenu -->
	<?php include("include/sidebar.php"); ?>
	<!-- End Sidemenu -->

	<!-- Main Header-->
	<?php include("include/header.php"); ?>
	<!-- End Main Header-->



	<!-- Main Content-->
	<div class="main-content side-content pt-0">

		<div class="container-fluid">
			<div class="inner-body">

				<!-- Page Header -->
				<div class="page-header my-1">
					<div>
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="index.php"><i class="fa fa-home"></i></a></li>
							<li class="breadcrumb-item active" aria-current="page">Blog Category</li>
						</ol>
					</div>
					<div class="d-flex">
						<div class="justify-content-center">
							<button class="modal-effect btn btn-primary btn-block" data-effect="effect-newspaper" data-toggle="modal" href="#modaldemo8"><i class="fa fa-plus mr-2"></i> Add Blog Category</button>
						</div>
					</div>
				</div>
				<!-- End Page Header -->

				<!-- Row -->
				<div class="row row-sm">
					<div class="col-lg-12 col-md-12">
						<div class="card custom-card">
							<div class="card-header"><h6>Blog Category</h6></div>
							<div class="card-body p-0">
								<?php
								$result = mysqli_query($con, "select *,CASE WHEN status='A' THEN 'Active' ELSE 'Deactive' END AS status from blog_category");			
								$i = 1;
								$rows =  '[';
								while($r = mysqli_fetch_assoc($result)) {
								    $dataData = json_encode($r);
								    if($dataData != '') {
								        $rows .= json_encode($r).",";
								    }
			                    }
			                    $tableData = rtrim($rows,",")."]";
								?>
								<div id="treeGrid"></div>
							</div>
						</div>
					</div>

				</div>
				<!-- End Row -->



			</div>
		</div>
	</div>
	<!-- End Main Content-->

	<!-- Main Footer-->
	<?php include("include/footer.php"); ?>
	<!--End Footer-->

	<!-- Sidebar -->
	<?php include("include/right-sidebar.php"); ?>
	<!-- End Sidebar -->

</div>
<!-- End Page -->

<div class="modal" id="modaldemo8">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content modal-content-demo">
			<div class="modal-header">
				<h6 class="modal-title">Add Blog Category</h6>
				<button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">×</span></button>
			</div>
			<div class="modal-body">
				<form method="post" enctype="multipart/form-data">
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<input type="text" class="form-control" name="name" placeholder="Enter Category Name" required="required">
							</div>
							<div class="form-group">
								<select class="form-control" name="status" required="required">
									<option value="">Select Status</option>
									<option value="A">Active</option>
									<option value="D">Deactive</option>
								</select>
							</div>
							<div class="form-group">
								<div class="col-sm-6 mx-auto">
									<button class="btn btn-block btn-primary" name="Submit">Submit</button>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>




<!-- Jquery js-->
<script src="assets/plugins/jquery/jquery.min.js"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/plugins/jquery-ui/ui/widgets/datepicker.js"></script>
<script src="assets/plugins/bootstrap-daterangepicker/moment.min.js"></script>
<script src="assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="assets/plugins/fileuploads/js/fileupload.js"></script>
<script src="assets/plugins/fileuploads/js/file-upload.js"></script>
<script src="assets/plugins/fancyuploder/jquery.ui.widget.js"></script>
<script src="assets/plugins/fancyuploder/jquery.fileupload.js"></script>
<script src="assets/plugins/fancyuploder/jquery.iframe-transport.js"></script>
<script src="assets/plugins/fancyuploder/jquery.fancy-fileupload.js"></script>
<script src="assets/plugins/fancyuploder/fancy-uploader.js"></script>
<script src="assets/js/advanced-form-elements.js"></script>
<script src="assets/js/select2.js"></script>
<script src="assets/plugins/telephoneinput/telephoneinput.js"></script>
<script src="assets/plugins/telephoneinput/inttelephoneinput.js"></script>
<script src="assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="assets/plugins/sidemenu/sidemenu.js"></script>
<script src="assets/plugins/sidebar/sidebar.js"></script>
<script src="assets/plugins/select2/js/select2.min.js"></script>
<script src="assets/js/sticky.js"></script>
<script src="assets/js/custom.js"></script>
<script type="text/javascript" src="assets/plugins/jqwidgets/jqxcore.js"></script>
<script type="text/javascript" src="assets/plugins/jqwidgets/jqxdata.js"></script>
<script type="text/javascript" src="assets/plugins/jqwidgets/jqxbuttons.js"></script>
<script type="text/javascript" src="assets/plugins/jqwidgets/jqxscrollbar.js"></script>
<script type="text/javascript" src="assets/plugins/jqwidgets/jqxmenu.js"></script>
<script type="text/javascript" src="assets/plugins/jqwidgets/jqxcheckbox.js"></script>
<script type="text/javascript" src="assets/plugins/jqwidgets/jqxlistbox.js"></script>
<script type="text/javascript" src="assets/plugins/jqwidgets/jqxcalendar.js"></script>
<script type="text/javascript" src="assets/plugins/jqwidgets/jqxdatetimeinput.js"></script>
<script type="text/javascript" src="assets/plugins/jqwidgets/jqxdropdownlist.js"></script>
<script type="text/javascript" src="assets/plugins/jqwidgets/jqxgrid.js"></script>
<script type="text/javascript" src="assets/plugins/jqwidgets/jqxgrid.sort.js"></script>
<script type="text/javascript" src="assets/plugins/jqwidgets/jqxgrid.pager.js"></script>
<script type="text/javascript" src="assets/plugins/jqwidgets/jqxgrid.selection.js"></script>
<script type="text/javascript" src="assets/plugins/jqwidgets/jqxgrid.edit.js"></script>
<script type="text/javascript" src="assets/plugins/jqwidgets/jqxgrid.filter.js"></script>
<script type="text/javascript" src="assets/plugins/jqwidgets/jqxgrid.columnsresize.js"></script>
<script type="text/javascript" src="assets/plugins/jqwidgets/jqxgrid.export.js"></script>
<script type="text/javascript" src="assets/plugins/jqwidgets/jqxdata.export.js"></script>
<script type="text/javascript">
$(document).ready(function () {
    var $treeGrid = $('#treeGrid');
    var data = '<?php echo addslashes($tableData); ?>';
    // prepare the data
    var source =
    {
        localdata: data,
        datatype: "json",
        datafields: [
            { name: 'id', type: 'string' },
            { name: 'category_name', type: 'string' },
            { name: 'status', type: "string" },
            { name: 'date', type: "date" },
        ],
        id: 'continentId'
        
    };
    var showhideColumns = function () {
        $("#treeGrid").jqxGrid('beginupdate');
        $.each($('#columnList option'), function (i,o) {
            if($(this).is(':selected')) {

                $("#treeGrid").jqxGrid('showcolumn', $(this).val());
            } else {
                $("#treeGrid").jqxGrid('hidecolumn', $(this).val());
            }
        });
        $("#treeGrid").jqxGrid('hidecolumn', 'startTime');
        $("#treeGrid").jqxGrid('endupdate');
        var width = $("#contenttreeGrid").width()-2;
        $("#contenttreeGrid").css("width", width);
        $('.search-box').SumoSelect({ csvDispCount: 3, search: true, searchText:'Enter here.' });
    };
  	var addfilter = function () {
        var filtergroup = new $.jqx.filter();
        var filter_or_operator = 1;
        filtervalue = 'Solved';
        filtercondition = 'not_equal';
        var filter2 = filtergroup.createfilter('stringfilter', filtervalue, filtercondition);
        filtergroup.addfilter(filter_or_operator, filter2);
        $("#treeGrid").jqxGrid('addfilter', 'statusCase', filtergroup);
        $("#treeGrid").jqxGrid('applyfilters');
    }
    var dataAdapter = new $.jqx.dataAdapter(source);
    $treeGrid.jqxGrid(
    {
        width: '100%',
        height: $(window).height() - 180,
        //autoheight:true,
        theme: 'energyblue',
        source: dataAdapter,
        pageable: true,
        pagesize: 100,
        pagermode: 'simple',
        filterable: true,
        showfilterrow: true,
        filtermode: 'excel',
        sortable: true,
        /*columnsresize: true,
        autorowheight: true,*/
        columnsheight: 40,
        enablehover: true,
        selectionmode: 'none',
        scrollbarsize: 6,
        /*altrows: true,*/
        ready: function () {
            setTimeout(function(){ showhideColumns(); }, 50);
        },
        enablebrowserselection :true,
        columns: [
            { text: '#', dataField: 'id', width: 100, cellsalign: 'center', align: 'center' },
            { text: 'Category Name', dataField: 'category_name', width:400},
            { text: 'Status', datafield: 'status', filtertype: 'checkedlist', width: 150,align: 'center', cellsalign: 'center' },
            { text: 'Date', datafield: 'date', cellsformat:'dd-MMM-yy HH:mm:ss (ddd)', filtertype: 'date', width: 300, cellsalign: 'center', align: 'center' },
            { text: 'Action', datafield: 'action',filterable:false, width: 150, align: 'center',
                cellsrenderer: function (row) {
                   
                    return '<div class="text-center mt-2"><a href="edit-continent.php?id='+ $treeGrid.jqxGrid('getCellValue', row, 'id') +'"><i class="fa fa-pen mr-2" aria-hidden="true" title="Edit"></i></a> <a href="delete-continent.php?id='+ $treeGrid.jqxGrid('getCellValue', row, 'id') +'"><i class="fa fa-trash text-danger" aria-hidden="true" title="Delete"></i></a></div>';
                }
            },
        ]
    });
    $("#excelExport").click(function () {
        $("#treeGrid").jqxGrid('exportdata', 'xls', "ticketing");
    });
});
$( document ).ready(function() {
    var template = $('#coloumChooser').html();
    $('#pagertreeGrid > div:first-child').prepend(template);
    
    $('#columnList').on('change', function () {
        var unSelected = [];
        var Selected = [];
        $("#treeGrid").jqxGrid('beginupdate');
        $.each($('#columnList option'), function (i,o) {
            if($(this).is(':selected')) {
                Selected.push($(this).val());
                $("#treeGrid").jqxGrid('showcolumn', $(this).val());
            } else {
                unSelected.push($(this).val());
                $("#treeGrid").jqxGrid('hidecolumn', $(this).val());
            }
        });
        $("#treeGrid").jqxGrid('endupdate');
    });
    
});
</script>
</body>
</html>
<?php } else{ include("signin.php"); } ?>