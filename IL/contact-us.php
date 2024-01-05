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
    <title>gsm2go eSIM | Contact Us</title>
    <?php include("includes/logrocket.php"); ?>
    <link rel="stylesheet" href="node_modules/%40fortawesome/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="node_modules/animate.css/animate.min.css">
    <link rel="stylesheet" href="node_modules/%40fancyapps/fancybox/dist/jquery.fancybox.min.css">
    <link rel="stylesheet" href="node_modules/owl.carousel/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="node_modules/owl.carousel/dist/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="node_modules/build/css/intlTelInput.css">
    <link rel="stylesheet" href="assets/css/style.min.css">
    <link rel="stylesheet" href="assets/css/btn.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;subset=latin-ext" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i,900,900i&amp;subset=latin-ext" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
     <!-- new css link start -->
    
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- new css link end  -->

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
        #subject { border-top-right-radius:1.6875rem;border-bottom-right-radius:1.6875rem; }
        .text-block {
        position: absolute;
        bottom: 0;
        background: rgb(0, 0, 0);/* Fallback color */
        background: rgba(0, 0, 0, 0.5);/* Black background with opacity */
        color: #ffffff;
        width: 100%;
        padding: 20px;
      }
        @media only screen and (min-width: 992px){
            .fixed-footer{ position:fixed !important;left:0!important;right:0!important;bottom:0!important;}
        }
        body{ font-family: Calibri, sans-serif;
        font-size:11pt; }

        .navik-header-container{
    display:flex;
    align-items: center;
    justify-content: space-between;
}
.section.mt-5 .container{
    max-width: 1260px;
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
                        <div id="error-msg"></div>
                        <h3 class="section-title-3 text-left mb-0">Write to us</h3>
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
                                <div class="form-group col-md-12">
                                    <div class="input-group">
                                        <div class="input-group-prepend border-0">
                                            <span class="input-group-text">
                                                <?php
                                                if(isset($_POST['value']))
                                                {
                                                    echo $val = ucwords($_POST['value']);
                                                }
                                                else{ echo $val = "Contact Us"; }
                                                ?>
                                            </span>
                                        </div>
                                        <input type="text" id="subject" tabindex="5" class="form-control form-control-lg" placeholder="Subject *" >
                                        <input type="hidden" id="prefix" value="<?php echo $val; ?>">
                                    </div>
                                </div>
                                <!--<div class="form-group col-12">-->
                                <!--    <input type="text" id="subject" tabindex="5" class="form-control form-control-lg" placeholder="Subject *" required>-->
                                <!--</div>-->
                                <div class="form-group col-12 ">
                                    <textarea id="message" tabindex="6" class="form-control form-round form-control-lg py-3" rows="7" placeholder="Your message *" required></textarea>
                                </div>
                                <div class="col-md-6 col-lg-12 col-xl-6 mx-auto text-center">
                                    <svg class="svg--template loader">
                                        <circle class="circle1" stroke="none" stroke-width="4" fill="none" r="25" cx="25" cy="25"/>
                                    </svg>
                                    <svg class="svg--template checkmark" viewBox="0 0 50 50">
                                        <g class="checkmark1">
                                            <path class="line1" d="M20.8,36l-4,4c-0.7,0.7-1.7,0.7-2.4,0L0.8,26.4c-0.7-0.7-0.7-1.7,0-2.4l4-4c0.7-0.7,1.7-0.7,2.4,0l13.6,13.6
                                        C21.5,34.3,21.5,35.4,20.8,36z"/>
                                        <path class="line2" d="M14.5,39.9l-4-4c-0.7-0.7-0.7-1.7,0-2.4L43.4,0.6c0.7-0.7,1.7-0.7,2.4,0l4,4c0.7,0.7,0.7,1.7,0,2.4L16.9,39.9
                                        C16.3,40.6,15.2,40.6,14.5,39.9z"/>
                                      </g>
                                    </svg>
                                    
                                    <svg class="svg--template" viewBox="0 0 304 305" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg">
                                        <symbol id="shadow--logo-dribbble">
                                    		<path id="SVGID_1_" d="M152,298.2C73,298.2,8.7,234,8.7,155.1C8.7,76.2,73,12,152,12c79,0,143.3,64.2,143.3,143.1
                                    			C295.3,234,231,298.2,152,298.2L152,298.2z M272.8,174.7c-4.2-1.3-37.9-11.4-76.2-5.2c16,43.9,22.5,79.7,23.8,87.1
                                    			C247.8,238.1,267.4,208.7,272.8,174.7L272.8,174.7z M199.8,267.8c-1.8-10.7-8.9-48.1-26.1-92.7c-0.3,0.1-0.5,0.2-0.8,0.3
                                    			c-69,24-93.8,71.8-96,76.3c20.8,16.2,46.8,25.8,75.1,25.8C168.9,277.5,185.1,274.1,199.8,267.8L199.8,267.8z M61.1,237
                                    			c2.8-4.7,36.4-60.3,99.5-80.7c1.6-0.5,3.2-1,4.8-1.5c-3.1-6.9-6.4-13.9-9.9-20.7C94.3,152.4,35,151.7,29.7,151.6
                                    			c0,1.2-0.1,2.5-0.1,3.7C29.6,186.7,41.5,215.4,61.1,237L61.1,237z M32.2,130.3c5.5,0.1,55.9,0.3,113.1-14.9
                                    			c-20.3-36-42.1-66.3-45.4-70.7C65.7,60.8,40.1,92.3,32.2,130.3L32.2,130.3z M123.3,36.5c3.4,4.5,25.6,34.8,45.7,71.5
                                    			c43.5-16.3,61.9-41,64.1-44.1c-21.6-19.1-50-30.8-81.1-30.8C142.1,33.1,132.5,34.3,123.3,36.5L123.3,36.5z M246.7,78
                                    			c-2.6,3.5-23.1,29.7-68.3,48.2c2.8,5.8,5.6,11.7,8.1,17.7c0.9,2.1,1.8,4.2,2.6,6.3c40.7-5.1,81.2,3.1,85.2,3.9
                                    			C274.1,125.3,263.8,98.8,246.7,78L246.7,78z"/>
                                        </symbol>
                                    </svg>
                                    
                                    <div id="browserAlert" style="display: none"><span></span></div>
                                    <button type="button" id="contact-btn" tabindex="7" class="btn btn-block btn-round btn-lg btn-primary btnSubmit"><font="arial">Send your message</font></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-lg-5 bg-img mobile-none">
                    <div class="contact-box h-100 px-4 py-5 text-white-75 bg-image" data-img-src="assets/images/upload/contactus.jpg">
                        <div class="px-xl-3 py-4">
                     <div class="text-block">
                            <!--<h3 class="section-title-3 title-light-1 text-left font-weight-700 mb-4">Contact Info</h3>-->

                            <!--<div class="row contact-info-list pt-4 mb-5">-->

                                <!--<div class="col-md-6 col-lg-12 contact-info-item">-->
                                <!--    <div class="icon-info-1">-->
                                <!--        <div class="icon-element text-white pt-1">-->
                                <!--            <i class="fas fa-map-marker-alt fa-2x"></i>-->
                                <!--        </div>-->
                                <!--        <div class="icon-info-text pl-2">-->
                                <!--            <h6 class="mb-1 font-weight-700 text-white">Address</h6>-->
                                <!--            <p class="mb-0">310 Mountain View Ave, San Rafeael,<br>California, 98901. USA</p>-->
                                <!--        </div>-->
                                <!--    </div>-->
                                <!--</div>-->

                                <!--<div class="col-md-6 col-lg-12 contact-info-item">-->
                                <!--    <div class="icon-info-1">-->
                                <!--        <div class="icon-element text-white pt-1">-->
                                <!--            <i class="fas fa-mobile-alt fa-2x"></i>-->
                                <!--        </div>-->
                                <!--        <div class="icon-info-text pl-2">-->
                                <!--            <h6 class="mb-1 font-weight-700 text-white">Phone</h6>-->
                                <!--            <p class="mb-0">+1 (917) 210-1232</p>-->
                                <!--        </div>-->
                                <!--    </div>-->
                                <!--</div>-->

                                <!--<br><br><br><br><br><br><br><br><br><br><br><br><div class="col-md-6 col-lg-12 contact-info-item">-->
                                <!--    <div class="icon-info-1">-->
                                <!--        <div class="icon-element text-white pt-1">-->
                                <!--            <i class="fas fa-paper-plane fa-2x"></i>-->
                                <!--        </div>-->
                                <!--        <div class="icon-info-text pl-2">-->
                                <!--            <h6 class="mb-1 font-weight-700 text-white">Email</h6>-->
                                <!--            <a href="mailto:website-inquiry@gsm2go.com" class="text-white-75">website-inquiry@gsm2go.com</a><br>-->
                                            <!--<a href="mailto:info@yourdomain.com" class="text-white-75">info@yourdomain.com</a>-->
                                <!--        </div>-->
                                <!--    </div>-->
                                <!--    </div>-->
                                <!--</div>-->

                                <!--<div class="col-md-6 col-lg-12 contact-info-item">-->
                                <!--    <div class="icon-info-1">-->
                                <!--        <div class="icon-element text-white pt-1">-->
                                <!--            <i class="fas fa-globe fa-2x"></i>-->
                                <!--        </div>-->
                                <!--        <div class="icon-info-text pl-2">-->
                                <!--            <h6 class="mb-1 font-weight-700 text-white">Website</h6>-->
                                <!--            <a href="https://gsm2go.com" class="text-white-75">https://gsm2go.com</a>-->
                                <!--        </div>-->
                                <!--    </div>-->
                                <!--</div>-->

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
<!-- Button trigger modal -->

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Select languages</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex flex-wrap">
                    <div class="row">
                        <div class="col-3 d-flex">
                            <a href="https://dev.mysimaccess.com/" class="select-languages">
                                <h2>English</h2>
                            </a>
                            <a href="https://dev.mysimaccess.com/IL/index" class="select-languages">
                                <h2>Hebrew</h2>
                            </a>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include("includes/footer.php"); ?>
    
<!-- jQuery -->
<script src="assets/js/vendor/jquery-3.5.1.min.js"></script>
<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="components/navik-navigation-menu/dist/js/navik.menu.js"></script>
<script src="node_modules/isotope-layout/dist/isotope.pkgd.min.js"></script>
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
    var prefix  = $("#prefix").val();
    var message = $("#message").val();
    var email_regex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i;
    
    if( fname.length > 1 && lname.length > 1 && message.length > 9 && subject.length > 4 ){
        btnfunction(); 
    }
    $.ajax({
        url: "ajax/contact-us.php",
        type: "POST",
        data: { fname:fname,lname:lname,mobile:mobile,email:email,subject:subject,prefix:prefix,message:message },
        success:function(data,status)
        {
            $("#error-msg").html(data);
        }
    });
});
</script>
<script>
function btnfunction() {

    var $btn = $("button.btnSubmit");
    var $loaderTemplate = $("svg.loader");
    var $checkmarkTemplate = $("svg.checkmark");

    if ($("button").hasClass('clicked')) return;
    $("button").addClass('clicked');
    var self = $("button");
    var timeout1 = 500,
      timeout2 = 2500,
      timeout3 = 3000;
    setTimeout(function() {
    
      self.append($loaderTemplate.clone());
      self.find('svg').removeClass('svg--template');
      self.find('svg').css('display', 'initial');
    }, timeout1);
    setTimeout(function() {
      self.text('');
      self.find('svg').remove();
      self.append($checkmarkTemplate.clone());
      self.find('svg').css('display', 'initial');
      self.find('svg').removeClass('svg--template');
      self.addClass('done');
    }, timeout1 + timeout2);
    setTimeout(function() {
      self.find('svg').remove();
      self.text('Submit');
      self.removeClass('clicked');
      self.removeClass('done');
      location.replace('https://gsm2go.com/thanks.php');
    }, timeout1 + timeout2 + timeout3);

};
</script>
</body>
</html>