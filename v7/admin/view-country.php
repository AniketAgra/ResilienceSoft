<?php
session_start();
if( isset($_SESSION['user']) && isset($_SESSION['role']) && ($_SESSION['role']=="A")){
	include("include/config.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
	<link rel="icon" href="assets/img/brand/favicon.ico" type="image/x-icon"/>
	<title>View Country</title>
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
	<link rel="stylesheet" href="assets/css/sidemenu/sidemenu.css">
    <link rel="stylesheet" href="assets/plugins/fileuploads/css/fileupload.css" type="text/css"/>
    <link rel="stylesheet" href="assets/plugins/fancyuploder/fancy_fileupload.css" />
	<link rel="stylesheet" href="assets/plugins/jqwidgets/styles/jqx.base.css" />
    <link rel="stylesheet" href="assets/plugins/jqwidgets/styles/jqx.energyblue.css" />
    <link rel="stylesheet" href="assets/plugins/sumoselect/sumoselect.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <style>
    #contenttreeGrid {border:1px solid #9eb7cd !important;top:40px !important;}
    .jqx-grid-cell {color:#333031 !important;}
    #pagertreeGrid > div:first-child > div:last-child{ display: none; }
    #pagertreeGrid { background-color:#fff !important; top:-2px !important; }
    .jqx-grid-pager-number {padding: 3px 8px !important; padding-bottom: 6px !important;}
    #pagertreeGrid > div:first-child > div{ background-color: #fff !important;}
    .jqx-max-size {width:101% !important;}
    .jqx-scrollbar {margin-top:40px !important;}
    .jqx-grid-column-header{  z-index:0 !important; }
    .jqx-grid-cell-filter-row{  z-index:0 !important; }
    .jqx-grid-column-header, .jqx-grid-columngroup-header {border-width:0px 1px 0px 1px !important;}
    .jqx-grid-cell-energyblue { z-index:0 !important; background:none !important;}
    .status_btn {padding:6px;border-radius:0px;text-align:left !important;}
    .totalCnts {width:650px; font-size:10px; }
    /*.jqx-grid-column-header {overflow-wrap: break-word !important;}*/
    #contenttreeGrid > span:last-child {display:none !important;}
    .ui-datepicker {z-index:999 !important;}
    .dtPic { border-radius: 0px; height: 30px; width: 115px !important; padding: 9px;}
    .dtIcon {border-radius: 0px; padding-left: 7px; padding-right: 7px;}
    .dtCnt {width:450px}
    .dtGrp {width:40%; float:left}
    .dtBtn {width:6%; float:left;}
    .btn-icon i.typcn {line-height: 0.95 !important;}
    .btn-icon {height:30px !important; margin-left:7px;}
    .totalCnts{ width: 650px;float: left; }
    .columChooser{ width: 200px;float: right;line-height: 20px; }
	</style>
</head>
<body class="main-body leftmenu">
<?php
if(isset($_POST['submit']))
{
	$name      = $_POST['name'];
	$status    = $_POST['status'];

	$img  = $_FILES['image']['name'];
	$tmp  = $_FILES['image']['tmp_name'];

	$new = @end(explode(".", $img));
	$new_img = time().".".$new;
	if(move_uploaded_file($tmp, "../assets/images/flag/$new_img"))
	{
		$insert = mysqli_query($con, "insert into countries (country_name,flag,status) values ('$name','$new_img','$status')");
		if($insert) 
		{
			echo "<script>alert('Country Added Successfully')</script>";
		}
	}
}
?>
<?php
if(isset($_POST['update']))
{
    $id      = $_POST['edit_id'];
    $name    = $_POST['edit_name'];
    $status  = $_POST['edit_status'];

    $img  = $_FILES['edit_image']['name'];
    $tmp  = $_FILES['edit_image']['tmp_name'];

    if(empty($img))
    {
        $update = mysqli_query($con, "update countries set country_name='$name', status='$status' where id='$id'");
        if($update) 
        {
            echo "<script>alert('Country Updated Successfully')</script>";
        }
    }
    else
    {
        $new = @end(explode(".", $img));
        $new_img = time().".".$new;
        if(move_uploaded_file($tmp, "../assets/images/flag/$new_img"))
        {
            $update = mysqli_query($con, "update countries set country_name='$name', flag='$new_img', status='$status' where id='$id'");
            if($update) 
            {
                echo "<script>alert('Country Updated Successfully')</script>";
            }
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
				<div class="page-header my-0">
					<div>
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="index.php"><i class="fa fa-home"></i></a></li>
							<li class="breadcrumb-item active" aria-current="page">Country</li>
						</ol>
					</div>
				</div>
				<!-- End Page Header -->

				<!-- Row -->
				<div class="row row-sm">
					<div class="col-lg-12 col-md-12">
						<div class="card custom-card">
							<div class="card-body p-0">
								<?php
								$result = mysqli_query($con, "select *,CASE WHEN status='A' THEN 'Active' ELSE 'Deactive' END AS status from countries");			
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


</div>
<!-- End Page -->


<div class="modal" id="modaldemo8">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content modal-content-demo">
			<div class="modal-header">
				<h6 class="modal-title">Add Country</h6>
				<button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">×</span></button>
			</div>
			<div class="modal-body">
				<form method="post" enctype="multipart/form-data">
					<div class="row">
						<div class="col-md-12">
							<div class="form__div">
								<input type="text" class="form__input required" name="name" placeholder=" " required="required">
							    <label for="name" class="form__label">Enter Country Name</label>
							</div>
							<div class="form-group">
								<label>Flag Image</label>
								<input type="file" class="form-control dropify" data-height="100" name="image" required="required">
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
									<button class="btn btn-block btn-primary" name="submit">Submit</button>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<?php
$select = mysqli_query($con, "select * from countries");           
while($row = mysqli_fetch_assoc($select)) {
?>
<div class="modal" id="modaldemo<?php echo $row['id']; ?>">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">Edit Country</h6>
                <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form__div">
                                <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                                <input type="text" class="form__input required" name="edit_name" value="<?php echo $row['country_name']; ?>" placeholder=" " required="required">
                                <label for="edit_name" class="form__label">Enter Country Name</label>
                            </div>
                            <div class="form-group">
                                <label>Flag Image</label>
                                <input type="file" class="dropify" data-default-file="../assets/images/flag/<?php echo $row['flag']; ?>" data-height="80" name="edit_image">
                            </div>
                            <div class="form-group">
                                <select class="form-control" name="edit_status" required="required">
                                    <?php if($row['status']=="A"){ ?>
                                    <option value="A" selected>Active</option>
                                    <option value="D">Deactive</option>
                                    <?php } else{ ?>
                                    <option value="A">Active</option>
                                    <option value="D" selected>Deactive</option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-6 mx-auto">
                                    <button class="btn btn-block btn-primary" name="update">update</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php } ?>


<!-- Jquery js-->
<script src="assets/plugins/jquery/jquery.min.js"></script>
<script src="assets/plugins/bootstrap/js/popper.min.js"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/plugins/fileuploads/js/fileupload.js"></script>
<script src="assets/plugins/fileuploads/js/file-upload.js"></script>
<script src="assets/plugins/fancyuploder/jquery.ui.widget.js"></script>
<script src="assets/plugins/fancyuploder/jquery.fileupload.js"></script>
<script src="assets/plugins/fancyuploder/jquery.iframe-transport.js"></script>
<script src="assets/plugins/fancyuploder/jquery.fancy-fileupload.js"></script>
<script src="assets/plugins/fancyuploder/fancy-uploader.js"></script>
<script src="assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="assets/plugins/sidemenu/sidemenu.js"></script>
<script src="assets/plugins/sidebar/sidebar.js"></script>
<script src="assets/js/advanced-form-elements.js"></script>
<script src="assets/js/sticky.js"></script>
<script src="assets/js/modal.js"></script>
<script src="assets/js/custom.js"></script>
<script src="assets/plugins/sumoselect/jquery.sumoselect.js"></script>
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
<script type="text/javascript" src="assets/plugins/jqwidgets/jqxgrid.aggregates.js"></script>
<script type="text/javascript" src="assets/plugins/jqwidgets/jqxgrid.export.js"></script>
<script type="text/javascript" src="assets/plugins/jqwidgets/jqxdata.export.js"></script>
<script>
$('.search-box').SumoSelect({ csvDispCount: 3, search: true, searchText:'Enter here.' });
</script>
<script id="coloumChooser" type="text/template" class="hide">
<span style="float:right;" class="row">
    <div class="col-md-9">
        <div class="totalCnts text-left">
            Total Country : <span class="boldLt" id="filRecTot"><?php echo 0; ?></span> |
            Active : <span class="boldLt" id="filRecSolved"><?php echo 0; ?></span> | 
            Deactive : <span class="boldLt" id="filRecOpen"><?php echo 0; ?></span> 
        </div>
    </div>
    <div class="col-md-3">
        <div class="text-center">
            <a class="btn btn-primary btn-rounded py-1" data-effect="effect-newspaper" data-toggle="modal" href="#modaldemo8"><i class="fa fa-plus"></i></a>
            <a href="javascript:void(0);" id="excelExport" title="Download Excel"><img src="assets/img/excel.png" style="width:25px;"/></a>
        </div>
    </div>
</span>
</script>
<script type="text/javascript">
$(document).ready(function () {
    var $treeGrid = $('#treeGrid');
    var data = '<?php echo addslashes($tableData); ?>';
    var imagerenderer = function (row, datafield, value) {
        return '<img  height="35" src="../assets/images/flag/' + value + '"/>';
    }
    // prepare the data
    var source =
    {
        localdata: data,
        datatype: "json",
        datafields: [
            { name: 'id', type: 'string' },
            { name: 'country_name', type: 'string' },
            { name: 'flag', type: "image" },
            { name: 'status', type: "string" },
            { name: 'date', type: "date" },
        ],
        id: 'countryId'
        
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
        $("#excelExport").click(function () {
            $("#treeGrid").jqxGrid('exportdata', 'xls', "Countries");
        });
        $('.search-box').SumoSelect({ csvDispCount: 3, search: true, searchText:'Enter here.' });
        calculateSummary();
    };
    var dataAdapter = new $.jqx.dataAdapter(source);
    $treeGrid.jqxGrid(
    {
        width: '100%',
        height: $(window).height() - 130,
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
        columnsresize: true,
        autorowheight: true,
        columnsheight: 40,
        enablehover: true,
        selectionmode: 'none',
        scrollbarsize: 5,
        /*altrows: true,*/
        ready: function () {
            setTimeout(function(){ showhideColumns(); }, 50);
        },
        enablebrowserselection :true,
        columns: [
            { text: '#', dataField: 'id', width: 100, cellsalign: 'center', align: 'center' },
            { text: 'Country name', dataField: 'country_name', width:300},
            { text: 'Image', datafield: 'flag', filterable:false, width: 200, cellsalign: 'center', align: 'center', cellsrenderer: imagerenderer },
            { text: 'Status', datafield: 'status', filtertype: 'checkedlist', width: 200, cellsalign: 'center', align: 'center' },
            { text: 'Date', datafield: 'date', cellsformat:'dd-MMM-yy HH:mm:ss (ddd)', filtertype: 'date', width: 280, cellsalign: 'center' },
            { text: 'Action', datafield: 'action',filterable:false, width: 150, cellsalign: 'center', align: 'center',
                cellsrenderer: function (row) {
                   
                    return '<div class="text-center my-2"><a data-toggle="modal" href="#modaldemo'+ $treeGrid.jqxGrid('getCellValue', row, 'id') +'"><i class="fa fa-pen mr-2" aria-hidden="true" title="Edit"></i></a> <a href="delete-country.php?del='+ $treeGrid.jqxGrid('getCellValue', row, 'id') +'"><i class="fa fa-trash text-danger" aria-hidden="true" title="Delete"></i></a></div>';
                }
            },
        ]
    });
    $("#excelExport").click(function () {
        $("#treeGrid").jqxGrid('exportdata', 'xls', "Countries");
    });
});
$("#treeGrid").on("filter", function (event) {
    calculateSummary();
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
function calculateSummary() {
    var datainfo = $("#treeGrid").jqxGrid('getdatainformation');
    var rowcount = datainfo.rowscount;       
    $('#filRecTot').text(rowcount.toLocaleString('en-IN'));
    
    var totalSolved = 0;
    var totalOpen = 0;
    
    if(rowcount != 0) {
        
        var uniqueSolved = new Array();
        var Solved = $("#treeGrid").jqxGrid('getcolumnaggregateddata', 'status', [{
          'SolvedCount': function (aggregatedValue, currentValue, column, record) {
                var isUnique = false;
                if (uniqueSolved.length == 0) {
                    uniqueSolved.push(currentValue);
                } else {
                    for (var i = 0; i < uniqueSolved.length; i++) {
                        if (currentValue == 'Active') {
                            isUnique = true;
                            break;
                        };
                    };
                    if (isUnique == true) {
                        uniqueSolved.push(currentValue);
                    };
                };
                return uniqueSolved.length;
            }
        }]);
        var totalSolved = Solved.SolvedCount;
        
        var uniqueOpen = new Array();
        var Open = $("#treeGrid").jqxGrid('getcolumnaggregateddata', 'status', [{
          'OpenCount': function (aggregatedValue, currentValue, column, record) {
                var isUnique = false;
                if (uniqueOpen.length == 0) {
                    uniqueOpen.push(currentValue);
                } else {
                    for (var i = 0; i < uniqueOpen.length; i++) {
                        if (currentValue == 'Deactive') {
                            isUnique = true;
                            break;
                        };
                    };
                    if (isUnique == true) {
                        uniqueOpen.push(currentValue);
                    };
                };
                return uniqueOpen.length - 1;
            }
        }]);
        var totalOpen = Open.OpenCount;
        
    }
    $('#filRecSolved').text(totalSolved.toLocaleString('en-IN'));
    $('#filRecOpen').text(totalOpen.toLocaleString('en-IN'));
}
</script>
</body>
</html>
<?php } else{ include("signin.php"); } ?>