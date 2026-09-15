<?php
// Keep error pages out of search indexes while allowing crawlers to follow useful recovery links.
// This shared guard applies automatically to templates that set a 404 status before including head.php.
if (http_response_code() === 404): ?>
<meta name="robots" content="noindex,follow">
<?php endif; ?>
<link rel="apple-touch-icon" href="assets/images/fav-orange.png">
<link rel="icon" type="image/png" href="assets/images/fav-orange.png">
<link rel="shortcut icon" type="image/png" href="assets/images/fav-orange.png">
<!-- Bootstrap v4.4.1 css -->
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
<!-- font-awesome css -->
<link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
<!-- animate css -->
<link rel="stylesheet" type="text/css" href="assets/css/animate.css">
<!-- owl.carousel css -->
<link rel="stylesheet" type="text/css" href="assets/css/owl.carousel.css">
<!-- slick css -->
<link rel="stylesheet" type="text/css" href="assets/css/slick.css">
<!-- off canvas css -->
<link rel="stylesheet" type="text/css" href="assets/css/off-canvas.css">
<!-- linea-font css -->
<link rel="stylesheet" type="text/css" href="assets/fonts/linea-fonts.css">
<!-- flaticon css  -->
<link rel="stylesheet" type="text/css" href="assets/fonts/flaticon.css">
<!-- magnific popup css -->
<link rel="stylesheet" type="text/css" href="assets/css/magnific-popup.css">
<!-- Main Menu css -->
<link rel="stylesheet" href="assets/css/rsmenu-main.css">
<!-- spacing css -->
<link rel="stylesheet" type="text/css" href="assets/css/rs-spacing.css">
<!-- style css -->
<link rel="stylesheet" type="text/css" href="style.css"> <!-- This stylesheet dynamically changed from style.less -->
<!-- responsive css -->
<link rel="stylesheet" type="text/css" href="assets/css/responsive.css">
<!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
<style>
    /* Footer Course Directory Fix */
    .je-footer-directory {
        margin-top: 55px;
        padding: 32px 30px;
        background: #111111;
        border-top: 4px solid #ff5a00;
        border-radius: 10px;
    }

    .je-footer-directory h4 {
        margin-bottom: 14px;
        color: #ffffff !important;
        font-size: 16px;
        font-weight: 700;
    }

    .je-footer-directory a {
        display: block;
        margin-bottom: 9px;
        color: #d4d4d4 !important;
        font-size: 13px;
        line-height: 1.5;
    }

    .je-footer-directory a:hover {
        color: #ff5a00 !important;
        padding-left: 4px;
    }

    @media (max-width:991px) {
        .je-footer-directory>.row>div {
            margin-bottom: 25px;
        }
    }

    @media (max-width:767px) {
        .je-footer-directory {
            padding: 25px 20px;
        }
    }

    .je-footer-directory h4 {
        color: #ff5a00 !important;
    }

    .je-footer-directory a {
        color: #fff !important;
    }

    .je-footer-directory a:hover {
        color: #ff5a00 !important;
    }
</style>