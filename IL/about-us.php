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
    <title>gsm2go eSIM | About Us</title>
    <?php include("includes/logrocket.php"); ?>
    <link rel="stylesheet" href="node_modules/%40fortawesome/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="node_modules/animate.css/animate.min.css">
    <link rel="stylesheet" href="node_modules/%40fancyapps/fancybox/dist/jquery.fancybox.min.css">
    <link rel="stylesheet" href="node_modules/owl.carousel/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="node_modules/owl.carousel/dist/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="assets/css/style.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;subset=latin-ext" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i,900,900i&amp;subset=latin-ext" rel="stylesheet">
   
      <!-- new css link start -->
    
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- new css link end  -->
   
   
   
   <style>
        font-family: Calibri, sans-serif;
        font-size:11pt;
        @media only screen and (min-width: 992px){
            .fixed-footer{ position:fixed !important;left:0!important;right:0!important;bottom:0!important;}
        }


        /* rtl start  */

            /* rtl start  */

            .navik-header-container{
    display:flex;
    align-items: center;
    justify-content: space-between;
}
.topcorner {
    position: absolute;
    top: 15px;
    left: 0;
}
.shoppingbasket {
    width: 40px;
    height: 40px;
    background-color: #fff;
    top: 10px;
}
nav.navik-menu ul {
    direction: rtl;
}
.container-fluid.d-none1 .row{
    justify-content: right;
}
/* .footer-bottom-container {
    direction: rtl;
} */
.col-lg-6.text-center.text-lg-right {
    display: flex;
    justify-content: end;
    direction: rtl;
}
.col-lg-6.text-center.text-lg-left.mb-2.mb-lg-0 {
    display: flex;
    align-items: start;
    direction: rtl;
}
.navik-header.sticky .logo{
    padding: 0;
}
.card .row .col-12{
    text-align: right;
}
.about-rtl{
    direction: rtl;
}
.about-detail-rtl{
    text-align: start; 
}

        /* rtl end  */

        @media(max-width: 1280px){
    .topcorner {
    left: 100px;
}
.navik-menu {
    background-color: #fff;
    position: absolute;
    z-index: 1;
    width: 100%;
    left: 0;
    top: 0;
}
.navik-header-container {
    justify-content: stretch;
}
nav.navik-menu ul {
    direction: rtl;
    padding-top: 70px;
}
.navik-header .logo img {
    width: 150px;
    margin-left: 0;
}
.body-fixed-sidebar, .navik-header, .navik-header-overlay{
        padding: 0 !important;
    }
        }

        @media(max-width: 991px){
.col-lg-6.text-center.text-lg-left.mb-2.mb-lg-0 {
    justify-content: center;
}
.col-lg-6.text-center.text-lg-right {
    justify-content: center;
}
}

        @media(max-width: 575px){
    .col-lg-6.text-center.text-lg-left.mb-2.mb-lg-0{
        justify-content: center !important;
    }
    .footer-bottom-container .row{
        margin: 0 !important;
    }
    .body-fixed-sidebar, .navik-header, .navik-header-overlay{
        padding: 0 !important;
    }
    .info-section{
        padding: 0 !important;
    }
 }

  /* new css start  */

  @media(min-width: 1400px){
            .container{
                max-width: 1260px;
            }
        }
        @media(max-width: 1199px){
            .topcorner {
            right: -10px !important;
        }
        }
        .navik-header-container {
        padding-right: 40px !important;
        }
@media(max-width: 991px){
    .topcorner {
    left: 65%;
}
}
@media(max-width: 575px){
    .topcorner {
    left: 43%;
}
}
@media(max-width: 400px){
    .topcorner {
    left: 33%;
}
}
  /* new css end  */


    </style>
</head>
<body>
<?php include("includes/header.php"); ?>
<?php
$select = mysqli_query($con, "Select * from pages where id='3'");
$row = mysqli_fetch_assoc($select);
?>
<!-- Page title -->
<div class="container">
<div class="d-flex flex-column w-100">
    <div class="page-title d-flex align-items-center bg-image" data-img-src="assets/images/banner/<?php echo $row['image']; ?>">
        <div class="container page-title-container">
            <div class="row">
                <div class="col text-center">
                    <h1 class="display-5 font-weight-800 text-white mb-0">
                        <?php echo $row['title']; ?>
                    </h1>
                </div>
            </div>
        </div>
    </div>
</div>
    </div>

<!-- Content -->
<div class="main-content py-0">

    <!-- Info section -->
    <div class="section py-5 mt-4 mb-5 info-section">
        <div class="container">

            <!-- <div class="row py-5">
                <div class="col-md-10 offset-md-1 col-lg-8 offset-lg-2">
                    <div class="text-center">

                        <div data-height="3px"></div>

                        <h2 class="h1 section-title-4 font-weight-800">
                            Explore Our Projects
                            <div class="title-divider-round"></div>
                        </h2>

                    </div>
                </div>
            </div> -->

            <div class="row py-4 about-rtl">

                <div class="col-lg-6">
                    <div class="text-center mb-3 mb-lg-0">
                        <img src="assets/images/upload/<?php echo $row['content_img']; ?>" alt="image" class="img-fluid">
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="pl-xl-5 about-detail-rtl">
                        <p><font face="Arial"><font color="blue">gsm</font><font color="green"><i>2go</i></font>, Inc היא חברת סלולר, רשומה במדינת דלוואר, ארה"ב</font></p>

<p><font face="Arial">אנחנו מספקים שירותי סלולר וטלקום בינלאומיים מאז 2009.
	<br>התשתית שלנו נמצאת באנגליה.  משרדי החברה בארה"ב, בארץ ובהודו.</font></p>


<p><font face="Arial">לאורך השנים מאז הקמתה של החברה סיפקנו שירותים בעיקר דרך מפיצים.
	<br>בארץ gsm2go מוכרת יותר לחברות הי טק.  אנחנו מספקים שירות איכותי ואמין במיוחד לכמה ומבין הבולטות מבניהן.
</font></p>



<p><font face="Arial">ב 2020 התחלנו בדיקות של ה eSIM החדש שלנו.</font></p>

<p><font face="Arial">החל מ 2021 התחלנו להפיץ את מוצר ושירות ה eSIM שלנו בקרב לקוחותינו, חברות הי טק בארץ ובעולם.</font></p>

<p><font face="Arial">עמלנו רבות להכין תשתית מתאימה לתת שירות ישירות ללקוחות סופיים כאן בארץ. (זה אתם).  אנחנו גאים להשיק את שירות ה eSIM של <font color="blue">gsm</font><font color="green"><i>2go</i></font> באמצעות אתר האינטרנט ובשיתוף פעולה עם שלמה Sixt. 
</font></p>


<p><font face="Arial">gsm2go עומדת מאחורי השירות והמוצר שלה.  אנחנו לא בשוק ה"סרוק וזרוק".  אנחנו מאמינים במוצר איכותי ושירות איכותי מאחוריו.
<br>אותו שירות שסיפקנו (ועודנו מספקים גם כיום) למיטב חברות ההי טק בארץ, אנחנו מחויבים לספק גם לכם, באופן פרטני.
</font></p>

<p><font face="Arial">לא כל הסימים ולא כל האי-סימים שווים.
<br>התשתית שלנו והסכמי הנדידה שלנו יקרים. אנחנו לא מחפשים איך לחסוך על חשבונכם.
<br> מאחורי השירות של <font color="blue">gsm</font><font color="green"><i>2go</i></font> תמצאו:




<ul>
<li>הסכמי נדידה עם כפל רשתות ברוב המדינות</li>
<li>הסכמים עם הרשתות החזקות (ולא המשניות) ברוב המדינות (AT&T בארה"ב וודאפון באירופה, לדוגמא)</li>
<li>מהירויות שינוע נתונים בנדידה גבוהות במיוחד – לעיתים קרובות מעל 40 מגביט</li>
<li>איכות שיחה (בשיחת טלפון אמיתית) גבוהה ואמינה ועם מינימום השהייה</li>
<li>שיחה מזוהה יוצאת ונכנסת</li>
<li>אנחנו מאמינים במערכות יחסים ארוכות ואנחנו עובדים קשה בשביל זה.</li>	
</ul>
</font></p>


<p><font face="Arial">Most of our customers keep our SIMs (and now, our eSIMs) and remain our customers, for years on end.</font></p>
<p><font face="Arial">
רוב לקוחותינו מחזיקים את הסימים (או eSIMs), שומרים אותם לנסיעה הבאה.
</font></p>
					


<p><font face="Arial">תוכלו לצפות מאיתנו לשירות לקוחות ומסור, תמיכה טכנית אפקטיבית, , מענה מהיר וענייני.

.</font></p>
<p><font face="Arial">אנחנו לרשותכם.</font></p>						
                    </div>
                </div>

            </div>

        </div>
    </div>



</div>

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
<script src="node_modules/imagesloaded/imagesloaded.pkgd.min.js"></script>
<script src="node_modules/%40fancyapps/fancybox/dist/jquery.fancybox.min.js"></script>
<script src="node_modules/owl.carousel/dist/owl.carousel.min.js"></script>
<script src="node_modules/jquery-circle-progress/dist/circle-progress.min.js"></script>
<script src="assets/js/custom.js"></script>
</body>
</html>