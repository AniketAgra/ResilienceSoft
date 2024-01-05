<?php 
session_start();
include("includes/config.php"); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="assets/favicon.ico">
    <title>gsm2go eSIM | Plans </title>
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="node_modules/%40fortawesome/fontawesome-free/css/all.min.css">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="node_modules/animate.css/animate.min.css">
    <!-- Fancybox CSS -->
    <link rel="stylesheet" href="node_modules/%40fancyapps/fancybox/dist/jquery.fancybox.min.css">    
    <!-- OWL carousel CSS -->
    <link rel="stylesheet" href="node_modules/owl.carousel/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="node_modules/owl.carousel/dist/assets/owl.theme.default.min.css">
    <!-- Main CSS -->
    <link rel="stylesheet" href="assets/css/style.min.css">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;subset=latin-ext" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i,900,900i&amp;subset=latin-ext" rel="stylesheet">
    <style>
        body, .nav-link, ul{ font-family:arial !important; }
        .fa-ul{margin-left: 1em;}
        .table th, .table td{ padding: .100rem }
        input[type=checkbox]{ zoom:1.5; }
        figure .flag{ max-height:20px }
        .total{border: none;padding: 0px;width: 25px;font-weight: 600;}
        .line-height li{line-height: 1.4; }
        .desktop-menu{display:none}
        figure .flag{ position:absolute;left:0;bottom:50%; }
        figure p{ font-size:13px;font-weight:600;margin-left:38px;overflow-wrap: break-word; }
    </style>
</head>
<body>
<?php include("includes/header.php"); ?>



<!-- Content -->
<div class="main-content py-0">
    <div class="section">
        <?php include("includes/plans.php"); ?>
    </div>
</div>

<?php include("includes/footer.php"); ?>

<!-- jQuery -->
<script src="assets/js/vendor/jquery-3.5.1.min.js"></script>
<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="components/navik-navigation-menu/dist/js/navik.menu.js"></script>
<script src="node_modules/isotope-layout/dist/isotope.pkgd.min.js"></script>
<script src="node_modules/imagesloaded/imagesloaded.pkgd.min.js"></script>
<script src="node_modules/%40fancyapps/fancybox/dist/jquery.fancybox.min.js"></script>
<script src="node_modules/owl.carousel/dist/owl.carousel.min.js"></script>
<script src="node_modules/jquery-circle-progress/dist/circle-progress.min.js"></script>
<script src="assets/js/custom.js"></script>
<script type="text/javascript">
$(document).ready(function() {
   readrecords();
});

function readrecords(){ 

   $('.esim').each(function(){
      if ($(this).is(':checked')) {
         var id  = $(this).attr("id");
         var val = $(this).val();
         
         var usd = $(".usd"+val).val();
         var act = $(".activation"+val).val();
         var eamt = $(".esim-amt"+val).val();
         $(".display-activa"+val).attr("style", "text-decoration: line-through !important;color:red;padding-right:7px");
         
         totalSubAmount = Number(usd) + Number(eamt);
         $(".total"+val).val(totalSubAmount);
      }
      else {
            var id  = $(this).attr("id");
            var val = $(this).val();
            
            var usd = $(".usd"+val).val();
            var act = $(".activation"+val).val();
            var eamt = $(".esim-amt"+val).val();

            $(".display-esim"+val).attr("style", "color: #fff !important");
            totalSubAmount = Number(usd) + Number(act) + Number(0);
            $(".total"+val).val(totalSubAmount);
         
      }
   })
}

 $(document).ready(function() {

    $(".esim").change(function() {
        //if ($(".esim").is(":checked")) {
        //if($(".esim").prop('checked') == true){
        if ($(this).is(':checked')) {
            var id  = $(this).attr("id");
            var val = $(this).val();
            
            var usd = $(".usd"+val).val();
            var act = $(".activation"+val).val();
            var eamt = $(".esim-amt"+val).val();

            //var v = $(".total"+val).val("15");
            //$(".display-esim"+val).css("display", "none !important");
            $(".display-esim"+val).attr("style", "color: #717171 !important");
            totalSubAmount = Number(usd) + Number(eamt);
            $(".total"+val).val(totalSubAmount);
            $(".display-activa"+val).attr("style", "text-decoration: line-through !important;color:red;padding-right:7px");
 
        } 
        else {
            var id  = $(this).attr("id");
            var val = $(this).val();
            
            var usd = $(".usd"+val).val();
            var act = $(".activation"+val).val();

            //var v = $(".total"+val).val("15");
            //$(".display-esim"+val).css("display", "none !important");
            $(".display-esim"+val).attr("style", "color: #fff !important");
            totalSubAmount = Number(usd) + Number(act) + Number(0);
            $(".total"+val).val(totalSubAmount);
            $(".display-activa"+val).attr("style", "text-decoration: none !important;padding-right:7px");
         
        }
    });
    
    $(".compatibility").change(function() {
        
        if ($(this).is(":checked")) {
            var val = $(this).val();
            if($('.agree'+val).is(":checked"))
            {
                $('.buy-now'+val).removeAttr("disabled");
                $('#buybutton_'+val).attr("onclick","sendDetails("+val+")");

            }
        } 
        else {
            var val = $(this).val();
            $('.buy-now'+val).prop('disabled',true);
            $(val).removeAttr("onclick");

        }
    });
    $(".agree").change(function() {

        if ($(this).is(":checked")) {
            var val = $(this).val();
            if($('.compatibility'+val).is(":checked"))
            {
                $('.buy-now'+val).removeAttr("disabled");
                $('#buybutton_'+val).attr("onclick","sendDetails("+val+")");
            }
        } else {
            var val = $(this).val();
            $('.buy-now'+val).prop('disabled',true);
            $(val).removeAttr("onclick");
        }
    });

});

$(".buybutton").click(function() {
  sendDetails(this.id);
});

function sendDetails(planId) {
    var esim = 0;
    if ($('#esim'+planId).is(":checked")) {
        var esim = 1;
    }
    var totalamount = $('#totalValue_'+planId).val();
    window.location.replace("pay_now.php?direct="+planId+"&esim="+esim+"&charge="+totalamount);
}
</script>
<script type="text/javascript">
// function ChangeUrl(title, url) {
//     if (history.pushState) {
//       history.replaceState ("object or string", "Title of the page", "/"+url);
//     } else {
//       document.location.href = "/";
//     }
// }
// function CloseUrl() {
//     if (history.pushState) {
//       history.replaceState ("object or string", "Title of the page", "/");
//     } else {
//       document.location.href = "/";
//     }
// }
</script>
<?php if(isset($_POST['zone'])){ ?>
<script>
 $(document).ready(function(){
    $('#modalZones<?php echo $_POST['zone']; ?>').modal('show');
 });
</script>
<?php } ?>
</body>
</html>