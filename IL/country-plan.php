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
    <title>gsm2go eSIM | Virtual Number (DIDs)</title>
    <?php include("includes/logrocket.php"); ?>
    <link rel="stylesheet" href="node_modules/%40fortawesome/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="node_modules/animate.css/animate.min.css">
    <link rel="stylesheet" href="node_modules/%40fancyapps/fancybox/dist/jquery.fancybox.min.css">
    <link rel="stylesheet" href="node_modules/owl.carousel/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="node_modules/owl.carousel/dist/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="assets/css/style.min.test.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;subset=latin-ext" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i,900,900i&amp;subset=latin-ext" rel="stylesheet">
    <style>
        body{ font-family: Calibri, sans-serif;
        font-size:11pt; }
        @media only screen and (min-width: 992px){
            .fixed-footer{ position:fixed !important;left:0!important;right:0!important;bottom:0!important;}
        }
    </style>
</head>
<body class="bg-image bg-fixed">
<?php include("includes/header-test.php"); ?>
<?php
$select = mysqli_query($con, "Select * from pages where id='5'");
$row = mysqli_fetch_assoc($select);
?>
<!-- Page title -->
<div class="d-flex flex-column w-100">
    <div class="page-title d-flex align-items-center bg-image" data-img-src="assets/images/upload/top_vn.jpg">
        <div class="container page-title-container">
            <div class="row">
                <div class="col text-center">
                    <h1 class="display-5 font-weight-800 text-white mb-0">
                       Austria
                    </h1>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Content -->
<div class="pt-0">

    <div class="section mt-5 mb-5 vr-numbers">
        <div class="container">
    <div class="row">    
    <div class="col-md-7">  
    <div class="col-12 mb-3">
    <span class="font-weight-600">This plan includes the following </span>
    <span class="font-weight-600 text-success">29 Countries:</span>
     </div>
    <div class="flags-row">
        
    <div class="country-flag">    
    <img src="assets/images/flag/Austria.png">    
    <p>Austria</p> 
    </div> <!-- country -flags-closed -->
    
        <div class="country-flag">    
    <img src="assets/images/flag/Belgium.png">    
    <p>Belgium</p> 
    </div> <!-- country -flags-closed -->
    
        <div class="country-flag">    
    <img src="assets/images/flag/Bulgaria.png">    
    <p>Bulgaria</p> 
    </div> <!-- country -flags-closed -->
    
        <div class="country-flag">    
    <img src="assets/images/flag/Cyprus.png">    
    <p>Cyprus</p> 
    </div> <!-- country -flags-closed -->
    
        <div class="country-flag">    
    <img src="assets/images/flag/Czech-Republic.png">    
    <p>Czech-Republic</p> 
    </div> <!-- country -flags-closed -->
    
        <div class="country-flag">    
    <img src="assets/images/flag/Denmark.png">    
    <p>Denmark</p> 
    </div> <!-- country -flags-closed -->
    
        <div class="country-flag">    
    <img src="assets/images/flag/Estonia.png">    
    <p>Estonia</p> 
    </div> <!-- country -flags-closed -->
    
        <div class="country-flag">    
    <img src="assets/images/flag/Finland.png">    
    <p>Finland</p> 
    </div> <!-- country -flags-closed -->
    
        <div class="country-flag">    
    <img src="assets/images/flag/france.png">    
    <p>France</p> 
    </div> <!-- country -flags-closed -->
    
        <div class="country-flag">    
    <img src="assets/images/flag/germany.png">    
    <p>Germany</p> 
    </div> <!-- country -flags-closed -->
    
    <div class="country-flag">    
    <img src="assets/images/flag/greece.png">    
    <p>Greece</p> 
    </div> <!-- country -flags-closed -->
    
        <div class="country-flag">    
    <img src="assets/images/flag/Hungary.png">    
    <p>Hungary</p> 
    </div> <!-- country -flags-closed -->
    
        <div class="country-flag">    
    <img src="assets/images/flag/Ireland.png">    
    <p>Ireland</p> 
    </div> <!-- country -flags-closed -->
    
        <div class="country-flag">    
    <img src="assets/images/flag/italy.png">    
    <p>Italy</p> 
    </div> <!-- country -flags-closed -->
    
        <div class="country-flag">    
    <img src="assets/images/flag/Latvia.png">    
    <p>Latvia</p> 
    </div> <!-- country -flags-closed -->
    
        <div class="country-flag">    
    <img src="assets/images/flag/Liechtenstein.png">    
    <p>Liechtenstein</p> 
    </div> <!-- country -flags-closed -->
    
        <div class="country-flag">    
    <img src="assets/images/flag/Liechtenstein.png">    
    <p>Liechtenstein</p> 
    </div> <!-- country -flags-closed -->
    
        <div class="country-flag">    
    <img src="assets/images/flag/Luxembourg.png">    
    <p>Luxembourg</p> 
    </div> <!-- country -flags-closed -->
    
        <div class="country-flag">    
    <img src="assets/images/flag/Malta.png">    
    <p>Malta</p> 
    </div> <!-- country -flags-closed -->
    
        <div class="country-flag">    
    <img src="assets/images/flag/Netherlands.png">    
    <p>Netherlands</p> 
    </div> <!-- country -flags-closed -->
    
        <div class="country-flag">    
    <img src="assets/images/flag/Norway.png">    
    <p>Norway</p> 
    </div> <!-- country -flags-closed -->
    
        <div class="country-flag">    
    <img src="assets/images/flag/Poland.png">    
    <p>Poland</p> 
    </div> <!-- country -flags-closed -->
    
        <div class="country-flag">    
    <img src="assets/images/flag/Portugal.png">    
    <p>Portugal</p> 
    </div> <!-- country -flags-closed -->
    
        <div class="country-flag">    
    <img src="assets/images/flag/Slovakia.png">    
    <p>Slovakia</p> 
    </div> <!-- country -flags-closed -->
    
        <div class="country-flag">    
    <img src="assets/images/flag/Slovenia.png">    
    <p>Slovenia</p> 
    </div> <!-- country -flags-closed -->
    
        <div class="country-flag">    
    <img src="assets/images/flag/spain.png">    
    <p>Spain</p> 
    </div> <!-- country -flags-closed -->
    
        <div class="country-flag">    
    <img src="assets/images/flag/Sweden.png">    
    <p>Sweden</p> 
    </div> <!-- country -flags-closed -->
    
        <div class="country-flag">    
    <img src="assets/images/flag/Switzerland.png">    
    <p>Switzerland</p> 
    </div> <!-- country -flags-closed -->
    
        <div class="country-flag">    
    <img src="assets/images/flag/United-Kingdom.png">    
    <p>UK</p> 
    </div> <!-- country -flags-closed -->
    
    
    </div> <!-- flags row -closed -->
    </div>
    
    <div class="col-md-5">
    <div class="tab-plan-box">    
    <div class="tab plan-tab">
                                <div class="row">
                                    <div class="col-12">
                                        <ul class="nav nav-pills" id="pills-tab1" role="tablist">
                                          <li class="nav-item">
                                           <a class="nav-link active"  id="pills-first-tab8" data-toggle="pill" href="#pills-first8" role="tab" aria-controls="pills-first" aria-selected="false">8 Days</a>
                                            </li>
                                              <li class="nav-item">
                                            <a class="nav-link"  id="pills-first-tab9" data-toggle="pill" href="#pills-first9" role="tab" aria-controls="pills-first" aria-selected="false">16 Days</a>
                                            </li>
                                            <li class="nav-item">
                                             <a class="nav-link " id="pills-first-tab10" data-toggle="pill" href="#pills-first10" role="tab" aria-controls="pills-first" aria-selected="true">31 Days</a>
                                            </li>
                                                                                    </ul>
                                        <div class="tab-content" id="pills-tabContent">
                                           <div class="tab-pane active show fade" id="pills-first8" role="tabpanel" aria-labelledby="pills-first-tab">
                                                <h5 class="font-weight-700 pb-2 mb-0">8 days, 1.5GB, 100 Minutes</h5>
                                                <p class="text-justify"></p>
                                                <div class="row">
                                                    <form>
                                                        <div class="col-12">
                                                            <table class="table table-borderless pnl-tb mb-1 plan-tbl">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="font-weight-500">Plan  Charge</th>
                                                                        <td class="font-weight-500 ">$10                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="font-weight-500" colspan="2">
                                                                            <ul class="m-0 tbl ul">
                                                                            <li>Data - 1.5 GB</li>
                                                                            <li>Voice - 100 Mins</li>
                                                                             <li>Validity - 8 Days</li>
                                                                            </ul>
                                                                        </td>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <input type="hidden" class="usd8" value="10">
                                                                         <tr class=" ">
                                                                        <th class="font-weight-500">
                                                                        <span class="display-activa8" style="text-decoration: line-through !important;color:red;padding-right:7px">Activation Charge</span></th>
                                                                        <td class="font-weight-500  text-right esimamt8 display-activa8" style="text-decoration: line-through !important;color:red;padding-right:7px">$6                                                                                                                                                        <input type="hidden" class="activation8" value="6">
                                                                        </td>
                                                                    </tr>
                                                                                                                                        <tr class="display-esim8 ">
                                                                        <th class="font-weight-500"><span class="">Keep your eSIM alive</span></th>
                                                                        <td class="font-weight-500  text-right esimamt8 ">$1                                                                                                                                                        <input type="hidden" class="esim-amt8" value="1">
                                                                        </td>
                                                                    </tr>
                                                                        <tr>
                                                                        <th class="font-weight-600 " style="border-top:1px solid">Total Charge</th>
                                                                        <td class="font-weight-600 text-right total-pr" style="border-top:1px solid">$<input type="text" class="total total8" name="charge" id="totalValue_8" value="17">
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <div class="col-12 pl-4">
                                                            <div class="form-check my-2 w-80">
                                                                <input class="form-check-input esim" type="checkbox" value="8" name="esim" id="esim8" checked="">
                                                                <label class="form-check-label" for="esim">
                                                                   eSim (keep alive with a $1/month charge, cancel after three months). And get the $6 activation charge waived.                                                                </label>
                                                            </div>
                                                            <!--<p>You must agree to the following to complete you order:</p>-->
                                                            <div class="form-check mb-2">
                                                                <input class="form-check-input compatibility compatibility8" type="checkbox" value="8">
                                                                <label class="form-check-label">
                                                                    I understand that in order to use an eSIM, I need an eSIM compatible phone (please see <a href="https://gsm2go.com/esim-phones" target="blank">list</a> here).
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input agree agree8" type="checkbox" value="8">
                                                                <label class="form-check-label">
                                                                    I am ok with the <font color="blue">gsm</font><font color="green">2go</font> eSIM <a href="https://gsm2go.com/tnc" target="blank">Term and Conditions and Privacy Policy</a>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-md-6 mx-auto">
                                                            <input type="hidden" name="direct" value="8">
                                                            <!-- <button id="buybutton_8" class="btn btn-block buybutton btn-round btn-md btn-primary mx-2 mt-4 mx-lg-3 buy-now8" disabled mb-0>Buy Now</button> -->
                                                                                                                        <button type="submit" formaction="https://gsm2go.com/signup" id="8" class="btn btn-block buybutton btn-round btn-md btn-primary mx-2 mt-4 mx-lg-3 mb-4 buy-now8" disabled="">Proceed</button>
                                                                                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                            
                                            
                                               <div class="tab-pane fade" id="pills-first9" role="tabpanel" aria-labelledby="pills-first-tab">
                                              
                                            </div>
                                               
                                               <div class="tab-pane fade " id="pills-first10" role="tabpanel" aria-labelledby="pills-first-tab">
                                             
                                            </div>
                                               </div>
                                    </div>
                                    
                                </div>
        
                            </div>
    </div>                        
    </div> <!-- col md 5 closed -->
    
    </div> <!-- row closed -->
    
        </div>
    </div>

</div>

<?php include("includes/footer.php"); ?>

<!-- Go to top -->
<div class="go-to-top">
    <a href="#" class="rounded-circle"><i class="fas fa-chevron-up"></i></a>
</div>
<script src="https://activations.gsm2go.com/js/vendor/jquery.min.js"></script>
<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="components/navik-navigation-menu/dist/js/navik.menu.js"></script>
<script src="node_modules/isotope-layout/dist/isotope.pkgd.min.js"></script>
<script src="node_modules/imagesloaded/imagesloaded.pkgd.min.js"></script>
<script src="node_modules/%40fancyapps/fancybox/dist/jquery.fancybox.min.js"></script>
<script src="node_modules/owl.carousel/dist/owl.carousel.min.js"></script>
<script src="node_modules/jquery-circle-progress/dist/circle-progress.min.js"></script>
<script src="assets/js/custom.js"></script>
</body>
</html>