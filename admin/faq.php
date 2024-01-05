<?php 
session_start();
if(isset($_SESSION['admin_user']))
{
   include("includes/config.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
	<link rel="icon" href="../images/logo.jpg" type="image/x-icon"/>
	<title>FAQ</title>
	<link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
	<link href="assets/plugins/web-fonts/icons.css" rel="stylesheet"/>
	<link href="assets/plugins/web-fonts/font-awesome/font-awesome.min.css" rel="stylesheet">
	<link href="assets/plugins/web-fonts/plugin.css" rel="stylesheet"/>
	<link href="assets/css/style.css" rel="stylesheet">
	<link href="assets/css/skins.css" rel="stylesheet">
	<link href="assets/css/dark-style.css" rel="stylesheet">
	<link href="assets/css/colors/default.css" rel="stylesheet">
	<link id="theme" rel="stylesheet" type="text/css" media="all" href="assets/css/colors/color.css">
	<link href="assets/plugins/select2/css/select2.min.css" rel="stylesheet">
	<link href="assets/css/sidemenu/sidemenu.css" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
</head>
<body class="main-body leftmenu">

<!-- Loader -->
<div id="global-loader">
	<img src="assets/img/loader.svg" class="loader-img" alt="Loader">
</div>
<!-- End Loader -->

<!-- Page -->
<div class="page">

	<?php include("include/sidebar.php"); ?>
	<?php include("include/header.php"); ?>

	<!-- Main Content-->
	<div class="main-content side-content pt-0">

		<div class="container-fluid">
			<div class="inner-body">

				<!-- Page Header -->
				<div class="page-header my-1">
					<div>
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="dashboard.php"><i class="fa fa-home"></i></a></li>
							<li class="breadcrumb-item active" aria-current="page">FAQ</li>
						</ol>
					</div>
					<div class="d-flex">
						<div class="justify-content-center">
							<button type="button" class="modal-effect btn btn-primary my-2 px-4 btn-icon-text" data-effect="effect-scale" data-toggle="modal" href="#modaldemo8">
							  <i class="fa fa-plus font-weight-bold"></i> FAQ
							</button>
						</div>
					</div>
				</div>
				<!-- End Page Header -->

				<!-- Row -->
				<div class="row row-sm">
					<div class="col-lg-12">
						<div class="card custom-card">
							<div class="card-body">
								<div class="table-responsive border">
									<table class="table text-nowrap text-md-nowrap table-hover mg-b-0">
										<thead>
											<tr>
												<th>#</th>
												<th>Title</th>
												<th>Language</th>
												<th>Status</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody id="result">

										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- End Row -->
			</div>
		</div>
	</div>
	<!-- End Main Content-->

	<?php include("include/footer.php"); ?>
</div>
<!-- End Page -->


<!-- Add Modal -->
<div class="modal fade" id="modaldemo8">
	<div class="modal-dialog modal-xl" role="document">
		<div class="modal-content modal-content-demo">
			<div class="modal-header">
				<h6 class="modal-title">Add FAQ</h6>
				<button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body">
				<form id="form-search">
                	<div class="form-group">
                   	    <input type="text" class="form-control" id="title" placeholder="Enter Title">
                	</div>
                	<div class="form-group">
                   	    <!--<textarea rows="4" class="form-control" id="desc"></textarea>-->
                   	    <textarea id="desc"></textarea>
                	</div>
					<div class="form-group">
						<select class="form-control" id="status">
							<option value="">Select Status</option>
							<option value="A">Active</option>
							<option value="D">Deactive</option>
						</select>
					</div>
										  	<div class="form-group">
                     	<select class="form-control" id="lang">
                        	<option value="EN">English</option>
                        	<option value="IL">Hebrew</option>
                     	</select>
                  	</div>
					<div class="form-group">
						<button type="submit" class="btn btn-block btn-primary" id="insert">Add FAQ</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- End Add Modal-->


<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="text-center modal-header">
               	<h5 class="modal-title" id="exampleModalLabel">Update FAQ</h5>
               	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  	<span aria-hidden="true">&times;</span>
               	</button>
            </div>
            <form id="form-search">
               	<div class="modal-body">
                  	<div class="form-group">
                     	<input type="hidden" class="form-control" id="edit_id">
                     	<input type="text" class="form-control" id="edit_title" placeholder="Enter Title">
                  	</div>
                  	<div class="form-group">
                   	    <!--<textarea class="form-control" id="edit_desc"></textarea>-->
                   	    <textarea id="edit_desc"></textarea>
                	</div>
                  	<div class="form-group">
                     	<select class="form-control" id="edit_status">
                        	<option value="A">Active</option>
                        	<option value="D">Deactive</option>
                     	</select>
                  	</div>
					  	<div class="form-group">
                     	<select class="form-control" id="edit_lang">
                        	<option value="EN">English</option>
                        	<option value="IL">Hebrew</option>
                     	</select>
                  	</div>
                  	<div class="form-group">
                  		<button type="button" class="btn btn-block btn-primary" id="update">Update</button>
                  	</div>
               	</div>
            </form>
        </div>
    </div>
</div>
<!-- End Edit Modal -->



<!-- Back-to-top -->
<a href="#top" id="back-to-top"><i class="fe fe-arrow-up"></i></a>

<!-- Jquery js-->
<script src="assets/plugins/jquery/jquery.min.js"></script>
<script src="assets/plugins/bootstrap/js/popper.min.js"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="assets/plugins/sidemenu/sidemenu.js"></script>
<script src="assets/plugins/sidebar/sidebar.js"></script>
<script src="assets/plugins/select2/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script src="assets/js/sticky.js"></script>
<script src="assets/js/custom.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('#desc').summernote({
        placeholder: 'Enter Description',
        tabsize: 2,
        height: 200,
        codemirror: { // codemirror options
            theme: 'monokai'
          }
    });
    $('#edit_desc').summernote({
        tabsize: 2,
        height: 200
    });
});

$(document).ready(function() {
   readrecords();
});

function readrecords(){ 
   $.ajax({
      url: "ajax/faq/select.php",
      type: "POST",
      success:function(data, status){
         $("#result").html(data);
      }
   });
}


//insert Records
$('#insert').click(function() {
   var title 	= $('#title').val();
   var desc 	= $('#desc').val();
   var status 	= $('#status').val();
	var lang 	= $('#lang').val();
   $.ajax({
      url: "ajax/faq/insert.php",
      type: "POST",
      data: { title:title,status:status,desc:desc,lang:lang },
      success: function(data){
            $("#form-search")[0].reset();
            readrecords();
      }
   });
});


// Delete Record
function DeleteRecord(deleteid){
   var conf = confirm("Are you sure to Delete this Faq ?");
   if(conf==true)
   {
      $.ajax({
         url: "ajax/faq/delete.php",
         type: "POST",
         data: { del:deleteid },
         success:function(data, status){
            readrecords();
         }
      });
   }
};


// Fetch Data
$(document).on('click', '.edit_data', function(){  
   var edit_id = $(this).attr("id");  
   $.ajax({  
      url:"ajax/faq/fetch.php",  
      method:"POST",  
      data:{bedroom_id:edit_id},  
      dataType:"json",  
      success:function(data){  
         $('#edit_id').val(data.id);  
         $('#edit_title').val(data.title);
         $('#editModal .note-editable').html(data.content);
         //$('.note-editable').html(data.content);
         $('#edit_status').val(data.status);  
		 $('#edit_lang').val(data.lang);  
         $('#editModal').modal('show');  
      }  
   });  
});  

// Update Records
$('#update').click(function() {
    var id   	= $('#edit_id').val();
    var title 	= $('#edit_title').val();
    var desc 	= $('#edit_desc').val();
    var status 	= $('#edit_status').val();
	var lang 	= $('#edit_lang').val();
   
   $.ajax({
      url: "ajax/faq/update.php",
      type: "POST",
      data: { id:id,title:title,status:status,desc:desc,lang:lang },
      success: function(data)
      {
         $('#editModal').modal('hide'); 
         readrecords();
      }
   });
});
</script>

</body>
</html>
<?php } else{ include("index.php"); } ?>