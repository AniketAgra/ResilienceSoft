<?php
session_start();
include("include/config.php"); 
include("ip.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="assets/favicon.ico">
    <title>gsm2go | Contact Us</title>
    <link rel="stylesheet" href="node_modules/%40fortawesome/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="node_modules/animate.css/animate.min.css">
    <link rel="stylesheet" href="node_modules/%40fancyapps/fancybox/dist/jquery.fancybox.min.css">
    <link rel="stylesheet" href="node_modules/owl.carousel/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="node_modules/owl.carousel/dist/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="node_modules/build/css/intlTelInput.css">
    <link rel="stylesheet" href="assets/css/style.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;subset=latin-ext" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i,900,900i&amp;subset=latin-ext" rel="stylesheet">
    <style>
        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
          -webkit-appearance: none;
          margin: 0;
        }
        
        /* Firefox */
        input[type=number] {
          -moz-appearance: textfield;
        }
        @media only screen and (max-width: 768px) {
            .bg-img { display:none; }
        }
    </style>
</head>
<body>

<?php include("includes/header.php"); ?>

<!-- Content -->
<div class="main-content pb-0">

    <div class="section mt-5">
        <div class="container">

            <!-- Contact form box -->
            <div class="row no-gutters overflow-hidden mt-up75 mb-5 shadow-lg rounded-xl">
                <div class="col-lg-7 bg-white px-3 py-5 p-md-5">
                    <div class="px-3">
                        <h3 class="section-title-3 text-left font-weight-700 mb-0" id="error-msg">Let us know...</h3>
                        <form class="pt-4">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <input type="text" id="fname" tabindex="1" class="form-control form-round form-control-lg" placeholder="First Name *" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="text" id="lname" tabindex="2" class="form-control form-round form-control-lg" placeholder="Last Name *" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <input id="mobile" tabindex="3" type="number" placeholder=" " oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" class="form-control form-control-lg" minlength="11" maxlength="13" style="border-radius:22px">
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="email" id="email" tabindex="4" class="form-control form-round form-control-lg" placeholder="Email *" required>
                                </div>
                                <div class="form-group col-12">
                                    <input type="text" id="subject" tabindex="5" class="form-control form-round form-control-lg" placeholder="Subject *" required>
                                </div>
                                <div class="form-group col-12 ">
                                    <textarea id="message" tabindex="6" class="form-control form-round form-control-lg py-3" rows="7" placeholder="Your message *" required></textarea>
                                </div>
                                <div class="col-md-6 col-lg-12 col-xl-6">
                                    <button type="button" id="contact-btn" tabindex="7" class="btn btn-block btn-round btn-lg btn-primary">Send your message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-lg-5 bg-img">
                    <div class="contact-box h-100 px-4 py-5 text-white-75" style="background:black">
                        <div class="px-xl-3 py-4">

                            <h3 class="section-title-3 title-light-1 text-left font-weight-700 mb-4">Contact Info</h3>

                            <div class="row contact-info-list pt-4 mb-5">

                                <div class="col-md-6 col-lg-12 contact-info-item">
                                    <div class="icon-info-1">
                                        <div class="icon-element text-white pt-1">
                                            <i class="fas fa-arrow-right fa-2x"></i>
                                        </div>
                                        <div class="icon-info-text pl-2">
                                            <h6 class="mb-1 font-weight-700 text-white">Do you need a special plan? Going somewhere for a few months?</h6>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 col-lg-12 contact-info-item">
                                    <div class="icon-info-1">
                                        <div class="icon-element text-white pt-1">
                                            <i class="fas fa-arrow-right fa-2x"></i>
                                        </div>
                                        <div class="icon-info-text pl-2">
                                            <h6 class="mb-1 font-weight-700 text-white">Are  you home but you need to receive incoming calls on a UK/USA/Other phone number?</h6>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 col-lg-12 contact-info-item">
                                    <div class="icon-info-1">
                                        <div class="icon-element text-white pt-1">
                                            <i class="fas fa-arrow-right fa-2x"></i>
                                        </div>
                                        <div class="icon-info-text pl-2">
                                            <h6 class="mb-1 font-weight-700 text-white">Are you home and need to make international calls for a fraction of the cost your operator charges?</h6>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 col-lg-12 contact-info-item">
                                    <div class="icon-info-1">
                                        <div class="icon-element text-white pt-1">
                                            <i class="fas fa-arrow-right fa-2x"></i>
                                        </div>
                                        <div class="icon-info-text pl-2">
                                            <h6 class="mb-1 font-weight-700 text-white">Any bespoke telecom app/project? Talk to us…</h6>
                                        </div>
                                    </div>
                                </div>

                            </div>


                        </div>
                    </div>
                </div>
            </div>
            <div data-height="20px"></div>
        </div>
    </div>


   
</div>

<!-- Footer -->
<div class="bg-viridian-500 text-white-50">

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
<script src="node_modules/build/js/intlTelInput.js"></script>
<script>
function nospaces(t){
    if(t.value.match(/\s/g)){
        t.value=t.value.replace(/\s/g,'');
    }
}

var input = document.querySelector("#mobile");
window.intlTelInput(input, {
    // geoIpLookup: function(callback) {
    //     $.get("http://ipinfo.io", function() {}, "jsonp").always(function(resp) {
    //         var countryCode = (resp && resp.country) ? resp.country : "";
    //         callback(countryCode);
    //     });
    // },
    //hiddenInput: "full_number",
    initialCountry: "<?php echo $countryCode; ?>",
    //localizedCountries: { 'de': 'Deutschland' },
    nationalMode: true,
    // onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
    //placeholderNumberType: "MOBILE",
    preferredCountries: ['IL','US','GB','IN'],
    separateDialCode: true,
    utilsScript: "node_modules/build/js/utils.js",
});
</script>
<script type="text/javascript">
$("#fname").focus();
$("#fname").keyup(function(){
    var fname    = $("#fname").val();
  
    if( fname.length == 0 ){
        $("#fname").attr("style", "border-color: ##2196f3 !important;");
    }
    else if(fname.length < 2)
    {
        $("#fname").attr("style", "border-color: #fe0000 !important;");
    }
    else{
        $("#fname").attr("style", "border-color: #66bb6a !important;");
    }
});
$("#fname").focusin(function(){
    $("#fname").attr("style", "border-color: #2196f3 !important;");
});
$("#fname").focusout(function(){
    $("#fname").attr("style", "border-color: #e0e0e0 !important;");
});

$("#lname").keyup(function(){
    var lname    = $("#lname").val();
  
    if( lname.length == 0 ){
        $("#lname").attr("style", "border-color: ##2196f3 !important;");
    }
    else if(lname.length < 2)
    {
        $("#lname").attr("style", "border-color: #fe0000 !important;");
    }
    else{
        $("#lname").attr("style", "border-color: #66bb6a !important;");
    }
});
$("#lname").focusin(function(){
    $("#lname").attr("style", "border-color: #2196f3 !important;");
});
$("#lname").focusout(function(){
    $("#lname").attr("style", "border-color: #e0e0e0 !important;");
});

$('#mobile').keyup(function() {
    var mobile  = $("#mobile").val().length;
    
    if(mobile == 0)
    {
        $("#mobile").attr("style", "border-color: ##2196f3 !important;border-radius: 22px;padding-left:80px;");
    }
    else if(mobile >7 && mobile < 13)
    {
        $("#mobile").attr("style", "border-color: #66bb6a !important;border-radius: 22px;padding-left:80px;");
    }
    else
    {
        $("#mobile").attr("style", "border-color: #fe0000 !important;border-radius: 22px;padding-left:80px;");
    }
});
$("#mobile").focusin(function(){
    $("#mobile").attr("style", "border-color: #2196f3 !important;border-radius: 22px;padding-left:80px;");
});
$("#mobile").focusout(function(){
    $(this).attr("style", "border-color: #e0e0e0 !important;border-radius: 22px;padding-left:80px;");
});

$("#email").keyup(function(){
    var email    = $("#email").val();
    email_regex  = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i;
  
    if( email.length==0 ){
        //$(".error1").text("Please Enter Email");
        //$(".error1").attr("style", "color: #e53935 !important");
        $("#email").attr("style", "border-color: ##2196f3 !important;");
    }
    else if(!email_regex.test(email)){ 
        // $(".error1").text("Please Enter Valid Email");
        // $(".error1").attr("style", "color: #e53935 !important");
        $("#email").attr("style", "border-color: #fe0000 !important;");
    }
    else{
        $("#email").attr("style", "border-color: #66bb6a !important;");
    }
});
$("#email").focusin(function(){
    $("#email").attr("style", "border-color: #2196f3 !important;");
});
$("#email").focusout(function(){
    $("#email").attr("style", "border-color: #e0e0e0 !important;");
});

$("#subject").keyup(function(){
    var subject    = $("#subject").val();
  
    if( subject.length == 0 ){
        $("#subject").attr("style", "border-color: ##2196f3 !important;");
    }
    else if(subject.length < 5)
    {
        $("#subject").attr("style", "border-color: #fe0000 !important;");
    }
    else{
        $("#subject").attr("style", "border-color: #66bb6a !important;");
    }
});
$("#subject").focusin(function(){
    $("#subject").attr("style", "border-color: #2196f3 !important;");
});
$("#subject").focusout(function(){
    $("#subject").attr("style", "border-color: #e0e0e0 !important;");
});

$("#message").keyup(function(){
    var message    = $("#message").val();
  
    if( message.length == 0 ){
        $("#message").attr("style", "border-color: ##2196f3 !important;");
    }
    else if(message.length < 10)
    {
        $("#message").attr("style", "border-color: #fe0000 !important;");
    }
    else{
        $("#message").attr("style", "border-color: #66bb6a !important;");
    }
});
$("#message").focusin(function(){
    $("#message").attr("style", "border-color: #2196f3 !important;");
});
$("#message").focusout(function(){
    $("#message").attr("style", "border-color: #e0e0e0 !important;");
});

$("#contact-btn").click(function(){
    $('#contact-btn').attr("disabled", "disabled");
    
    var fname   = $("#fname").val();
    var lname   = $("#lname").val();
    var mobile  = $(".iti__selected-dial-code").text()+$("#mobile").val();
    var email   = $("#email").val();
    var subject = $("#subject").val();
    var message = $("#message").val();
    
    $.ajax({
        url: "ajax/contact-us.php",
        type: "POST",
        data: { fname:fname,lname:lname,mobile:mobile,email:email,subject:subject,message:message },
        success:function(data,status)
        {
            $("#error-msg").html(data);
        }
    });
});
</script>
</body>
</html>