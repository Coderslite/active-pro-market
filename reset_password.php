<?php

$email = $_GET['email'];


?>

<!DOCTYPE html>
<html>
<!-- Mirrored from Autoglobalfx.com/ by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 09 May 2021 10:25:20 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=utf-8">
<!-- /Added by HTTrack -->

<head>
    <!-- <script>
        if(document.location.protocol == 'http:' || document.location.protocol != "https:"){
        location.href='https://'+document.location.host+document.location.pathname;    
}
    </script> -->
    <meta charset="UTF-8">
    <meta name="title" content="Autoglobalfx - Best Online Trading Platform">
    <meta name="description" content="Autoglobalfx - the most convenient online trading interface. &lt;br> Instant access to trade options more than 150 assets of currencies, cryptocurrencies and companies shares.">
    <meta name="keywords" content="online trading service on financial markets">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta property="og:url" content="en/index.php">
    <meta property="og:title" content="Autoglobalfx - Best Online Trading Platform">
    <meta property="og:type" content="website">
    <meta property="og:description" content="Autoglobalfx broker">
    <meta property="og:image" content="img/logo_dark.png">
    <meta property="og:image:secure_url" content="img/logo_dark.png">
    <link rel="shortcut icon" type="image/png" href="images/fav.png">
    <link rel="stylesheet" media="all" href="css/bootstrap.min7eda.css">
    <script src="https://kit.fontawesome.com/7ada3682d8.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" media="all" href="css/flaticon7eda.css">

    <link rel="stylesheet" media="all" href="css/owl.carousel.min7eda.css">
    <link rel="stylesheet" media="all" href="css/owl.theme.default.min7eda.css">
    <link rel="stylesheet" media="all" href="css/slicknav7eda.css">
    <link rel="stylesheet" media="all" href="css/style7eda5e1f5e1f.css?v=2">
    <link rel="stylesheet" media="all" href="css/responsive7eda.css">
    <link rel="stylesheet" media="all" href="css/custom7eda.css">
    <link href="css/Components/ajax-progress.module7eda.css" rel="stylesheet" type="text/css">
    <link href="css/Components/tree-child.module7eda.css" rel="stylesheet" type="text/css">
    <link href="css/Components/autocomplete-loading.module7eda.css" rel="stylesheet" type="text/css">
    <link href="css/Components/clearfix.module7eda.css" rel="stylesheet" type="text/css">
    <link href="css/Components/container-inline.module7eda.css" rel="stylesheet" type="text/css">
    <link href="css/Components/details.module7eda.css" rel="stylesheet" type="text/css">
    <link href="css/Components/fieldgroup.module7eda.css" rel="stylesheet" type="text/css">
    <link href="css/Components/hidden.module7eda.css" rel="stylesheet" type="text/css">
    <link href="css/Components/item-list.module7eda.css" rel="stylesheet" type="text/css">
    <link href="css/Components/js.module7eda.css" rel="stylesheet" type="text/css">
    <link href="css/Components/nowrap.module7eda.css" rel="stylesheet" type="text/css">
    <link href="css/Components/position-container.module7eda.css" rel="stylesheet" type="text/css">
    <link href="css/Components/progress.module7eda.css" rel="stylesheet" type="text/css">
    <link href="css/Components/reset-appearance.module7eda.css" rel="stylesheet" type="text/css">
    <link href="css/Components/resize.module7eda.css" rel="stylesheet" type="text/css">
    <link href="css/Components/sticky-header.module7eda.css" rel="stylesheet" type="text/css">
    <link href="css/Components/system-status-counter7eda.css" rel="stylesheet" type="text/css">
    <link href="css/Components/system-status-report-counters7eda.css" rel="stylesheet" type="text/css">
    <link href="css/Components/system-status-report-general-info7eda.css" rel="stylesheet" type="text/css">
    <link href="css/Components/tabledrag.module7eda.css" rel="stylesheet" type="text/css">
    <link href="css/Components/tablesort.module7eda.css" rel="stylesheet" type="text/css">
    <script src="js/assets/jquery-3.3.1.min7eda.js" type="text/javascript"></script>
    <script src="js/jquery.cookie.js" type="text/javascript"></script>
    <link rel="stylesheet" href="maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.html">
    <style type="text/css">
        .trans {
            display: none;
            width: 150px;
            position: absolute;
            z-index: 9999;

            top: 25px;
            left: -webkit-calc(60%);
            left: -moz-calc(60%);
            left: calc(60%);
        }

        .setP {
            display: none;
        }

        .mobile {
            display: none;
        }

        @media(max-width:760px) {
            .trans {
                left: 25%;
                top: 75px;
            }

            .setP {
                display: block;
                position: fixed;
                top: 145px;
                z-index: 9999999;
                right: 155px;
            }

            .mobile {
                display: block;
                position: absolute;
                top: 25%;
                right: 70px;
            }
        }

        .tranToggle {}
    </style>
    <meta name="theme-color" content="#0a3041">
    <style type="text/css">
        .login_area {
            width: fit-content;
            margin-left: auto;
            margin-right: auto;
            margin-top: -10px;
        }

        @media(max-width:760px) {
            .login_area {

                margin-top: 5px;
            }
        }

        .login_area ul {
            display: flex;
            width: max-content;
        }

        .login_area ul li {
            margin-left: 10px;
        }

        .bonus_area {
            position: fixed;
            top: 50%;
            right: 0;
            width: 180px;
            border-radius: 5px 0 0 5px;
            z-index: 99999998;
            -webkit-transform: translateY(-50%) translateX(100%);
            -ms-transform: translateY(-50%) translateX(100%);
            transform: translateY(-50%) translateX(100%);
            -webkit-transition: all 1s ease;
            -o-transition: all 1s ease;
            transition: all 1s ease;
        }

        @media(max-width:760px) {
            .bonus_area {
                width: 150px;
            }
        }

        .bonus_area.show {
            -webkit-transform: translateY(-50%) translateX(0%);
            -ms-transform: translateY(-50%) translateX(0%);
            transform: translateY(-50%) translateX(0%);
            -webkit-box-shadow: 0 0 50px rgba(0, 0, 0, 0.3);
            box-shadow: 0 0 50px rgba(0, 0, 0, 0.3);
        }

        .bonus_area .inner_area {
            background: -webkit-gradient(linear, left top, left bottom, from(#5d84e3), to(#080f20));
            background: -webkit-linear-gradient(top, #0a3041 0%, #06415c 100%);
            background: -o-linear-gradient(top, #0a3041 0%, #06415c 100%);
            background: linear-gradient(to bottom, #0a3041 0%, #06415c 100%);
            border-radius: 5px 0 0 0;
            padding: 18px 0 23px;
            position: relative;
            text-align: center;
        }

        .bonus_area .inner_area .icon {
            display: block;
            padding-left: 33px;
            margin-bottom: 15px;
            text-align: left;
        }

        .inner_area .close-btn {
            position: absolute;
            cursor: pointer;
            height: 20px;
            background: none;
            outline: none;
            border: none;
            z-index: 30;
            top: 28px;
            width: 10px;
            height: 15px;
            right: 20px;
        }

        .inner_area .title {
            display: block;
            font-size: 23px;
            text-transform: uppercase;
            font-weight: bold;
            color: #fff;
            margin-bottom: 0px !important;
        }

        .inner_area .price {
            display: block;
            padding-bottom: 6px;
            color: #fff;
            font-size: 38px;
            margin-left: -14px;
            line-height: 40px;
        }

        .inner_area .price em {
            display: inline-block;
            font-size: 16px;
            line-height: 19px;
            vertical-align: top;
            font-weight: normal;
            font-style: normal;
            padding-top: 10px;
            padding-right: 4px;
        }

        .inner_area .subtitle {
            display: block;
            text-transform: uppercase;
            font-size: 10px;
            color: #fff;
            font-weight: bold;
            letter-spacing: 5px;
            font-size: 14px;
        }

        .bonus_area .get-btn {
            -webkit-transition: all 0.3s ease;
            -o-transition: all 0.3s ease;
            transition: all 0.3s ease;
            display: block;
            width: 100%;
            background-color: #0d3f57;
            color: #fff;
            text-align: center;
            padding: 20px 0 20px;
            border-radius: 0 0 0 5px;
        }

        .bonus_area .get-btn:hover {
            background: #0a3041;
            text-decoration: none;
            color: #fff;
            -webkit-box-shadow: 0 0 30px rgba(0, 0, 0, 0.8);
            box-shadow: 0 0 30px rgba(0, 0, 0, 0.8);
        }

        .global-close-btn:before,
        .global-close-btn:after {
            content: "";
            display: block;
            clear: both;
            height: 2px;
            background-color: #fff;
            -webkit-transform: rotate(45deg);
            -ms-transform: rotate(45deg);
            transform: rotate(45deg);
            position: absolute;
            left: 0;
            width: 135%;
            top: 0;
            margin-top: 8px;
            margin-left: -3px;
            -webkit-transition: all 0.3s ease;
            -o-transition: all 0.3s ease;
            transition: all 0.3s ease;
        }

        .global-close-btn:after {
            -webkit-transform: rotate(-45deg);
            -ms-transform: rotate(-45deg);
            transform: rotate(-45deg);
        }

        .mypop {
            position: fixed;
            left: 10px;
            bottom: 30px;
            background: #f5f6f6;
            border: 1px solid #0d3f57;
            border-radius: 4px;
            width: fit-content;
            z-index: 999;
            padding: 5px 10px 5px 10px;
            -webkit-transform: translateY(-50%) translateX(-120%);
            -ms-transform: translateY(-50%) translateX(-120%);
            transform: translateY(-50%) translateX(-120%);
            -webkit-transition: all 1s ease;
            -o-transition: all 1s ease;
            transition: all 1s ease;
        }

        .mypop.show {
            -webkit-transform: translateY(-50%) translateX(0%);
            -ms-transform: translateY(-50%) translateX(0%);
            transform: translateY(-50%) translateX(0%);
            -webkit-box-shadow: 0 0 50px rgba(0, 0, 0, 0.3);
            box-shadow: 0 0 50px rgba(0, 0, 0, 0.3);
        }

        .mypop .mymsg {
            color: #000;
            font-size: 15px;
        }

        .mypop a {
            text-align: center;
            color: #403c3c;
            text-decoration: none;
            display: block;
            border-radius: 4px;
            font-size: 15px;
            line-height: 12px;
            padding: 4px 8px;
            background-color: rgba(48, 153, 245, .3);
            border: 1px solid #3099f5;
        }

        .mypop .close {
            float: right;
            cursor: pointer;
        }

        .mypop .close i {
            color: red;
            font-size: 15px;
        }

        .mobile-s {
            display: none !important;
        }

        @media(max-width:760px) {
            .mypop {
                bottom: 35px;
                width: 95%;
            }

            .mobile-s {
                display: block !important;
            }
        }

        .goog-te-banner-frame.skiptranslate {
            display: none !important;
        }

        body {
            top: 0px !important;
        }

        .goog-te-combo {
            background-color: transparent;
            background-image: url(img/translator.png);
            background-size: 20px;
            background-repeat: no-repeat;
            background-position: center left;
            border: 1px solid #aaa;
            border-radius: 10px;
            box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.1);
            color: #cac4c4;
            font-size: 15px;
            padding-left: 24px;
            padding-top: 2px;
            padding-bottom: 2px;
            text-overflow: ellipsis;
            white-space: nowrap;
            width: 130px;
        }

        div#google_translate_element {
            height: 30px;
            overflow: hidden;
        }
    </style>
    <title>Home - Autoglobalfx</title>
    <script src="js/jquery.waypoints.js" type="text/javascript"></script>
    <style type="text/css">
        img.img-fluid.curve-img {
            width: 60px;
        }

        .curve {
            background: #ffffff;

            padding: 20px;
        }
    </style>
    <title></title>
</head>

<body id="body" class="toolbar-themes toolbar-no-tabs toolbar-no-icons toolbar-themes-admin-theme--seven path-node page-node-type-full-page">
    <!-- preloader section start -->
    <div class="loader-container">
        <div class="loader">
            <img src="img/logo_light.png" alt="preloader" width="500px">
        </div>
    </div>
    <!-- preloader section end -->
        <div>
            <div class="dialog-off-canvas-main-canvas" data-off-canvas-main-canvas>
                <!--   header area start   -->
                <div class="header-area header-absolute">
                    <div class="container">
                       
                        <script type="text/javascript">
                            $.cookie('googtrans', '/en/en');
                        </script>
                        <div class="trans" id="mytran" style="display:block;">
                            <script type="text/javascript">
                                function googleTranslateElementInit() {
                                    new google.translate.TranslateElement({
                                        pageLanguage: 'en'
                                    }, 'google_translate_element');
                                }
                            </script>
                            <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
                        </div>
                        <script type="text/javascript">
                            function showL() {

                                var x = document.getElementById("mytran");
                                if (x.style.display === "none") {
                                    x.style.display = "block";
                                } else {
                                    x.style.display = "none";
                                }
                            }
                        </script>
                        <div class="header-navbar">
                            <div class="row">
                                <div class="col-lg-2 col-6">
                                    <div class="logo-wrapper">
                                        <div>
                                            <a href="index.php" title="Home" rel="home">
                                                <img src="img/logo_light.png" id="logo" alt="Home">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-10 col-6 text-right position-static">
                                    <div>
                                        <nav role="navigation" aria-labelledby="block-mainnavigation-menu" id="block-mainnavigation">
                                            <h2 class="visually-hidden" id="block-mainnavigation-menu">Main navigation</h2>
                                            <ul class="main-menu" id="mainMenu">
                                                <li>
                                                    <a href="index.php">Home</a>
                                                </li>
                                                <li>
                                                    <a href="about.php" data-drupal-link-system-path="node/21">About Us</a>
                                                </li>
                                                <li>
                                                    <a href="assets.php">Trading Assets</a>
                                                </li>
                                                <li>
                                                    <a href="faq.php">FAQ</a>
                                                </li>
                                                <li class="expanded dropdown">
                                                    <a href="#">Documents</a>
                                                    <ul class="dropdown-lists">
                                                        <li>
                                                            <a href="terms-and-conditions.php" data-drupal-link-system-path="node/31">Terms and Conditions</a>
                                                        </li>
                                                        <li>
                                                            <a href="privacy-policy.php" data-drupal-link-system-path="node/16">Privacy Policy</a>
                                                        </li>
                                                        <li>
                                                            <a href="payment-policy.php" data-drupal-link-system-path="node/16">Payments Policy</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <a href="contact.php" data-drupal-link-system-path="contact">Contact</a>
                                                </li>
                                                <li class="mobile-s">
                                                    <a href="signup.html" data-drupal-link-system-path="contact">Sign Up</a>
                                                </li>
                                                <li class="mobile-s">
                                                    <a href="login.html" data-drupal-link-system-path="contact">Login</a>
                                                </li>
                                            </ul>
                                        </nav>
                                    </div>
                                    <div id="mobileMenu"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--   header area end   -->

                <svg version="1.1" id="L4" class="hidden" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 100" enable-background="new 0 0 0 0" xml:space="preserve">
                    <circle fill="#f3f3f3" stroke="none" cx="40" cy="25" r="2">
                        <animate attributeName="opacity" dur="1s" values="0;1;0" repeatCount="indefinite" begin="0.1" />
                    </circle>
                    <circle fill="#fff" stroke="none" cx="50" cy="25" r="2">
                        <animate attributeName="opacity" dur="1s" values="0;1;0" repeatCount="indefinite" begin="0.2" />
                    </circle>
                    <circle fill="#fff" stroke="none" cx="60" cy="25" r="2">
                        <animate attributeName="opacity" dur="1s" values="0;1;0" repeatCount="indefinite" begin="0.3" />
                    </circle>
                </svg>
                <div>
                    <div id="block-finlance-page-title">



                        <h1><span>Account Login</span>
                        </h1>


                    </div>
                    <div id="block-finlance-content">



                        <div>

                            <div class="paragraph paragraph--type--block paragraph--view-mode--default">
                                <div class="about-bg breadcrumb-area about account-bg">
                                    <div class="container">
                                        <div class="service breadcrumb-txt">
                                            <div class="row">
                                                <div class="col-xl-7 col-lg-8 col-sm-10">
                                                    <h1>Reset Password</h1>

                                                    <ul class="breadcumb">
                                                        <li><a href="index.php">Home</a></li>
                                                        <li>Reset Password</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                            </div>
                            <div class="new reg-area bg-gray pbp" id="">

                                <div class="container p-3">
                                    <form id="resetPassword">
                                        <div class="frm-wrapper login-form">
                                            <h1 class="pt-3 pb-1">Reset Password</h1>
                                            <div class="form-group">
                                                <!-- <label for="email">Email</label> -->
                                                <input type="hidden" class="form-control" name="email" id="email" placeholder="Enter Email" value="<?php echo $email ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="password">Password</label>
                                                <input type="password" class="form-control" name="password" id="password" placeholder="Enter password" required="">
                                            </div>
                                            <div class="form-group">
                                                <label for="password">Confirm Password</label>
                                                <input type="password" class="form-control" name="c_password" id="password" placeholder="Confirm password" required="">
                                            </div>
                                            <div class="form-row">

                                                <input type="submit" value="Submit" class="btn btn-sm btn-success" />
                                            </div>

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="paragraph paragraph--type--block paragraph--view-mode--default">
                    <div class="cta-section cta-bg">
                        <div class="container">
                            <div class="cta-content">
                                <div class="row">
                                    <div class="col-md-9 col-lg-7">
                                        <h3>Need help with your trading account?</h3>
                                    </div>

                                    <div class="col-md-3 col-lg-5 contact-btn-wrapper"><a class="boxed-btn contact-btn" href="contact.html"><span>Contact Us</span></a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <section id="trusted-award" data-api="trusted-award" class="ava-lazy loaded">
                    <div class="lds-ellipsis" style="display: none;">
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                    </div>
                    <div class="section-wrap" style="opacity: 1;">
                        <div class="clearfix">
                            <div class="trusted">
                                <h4>Trusted By</h4>
                                <img src="img/services/trusted-by38603860.png?v=1" alt="trusted by">
                            </div>
                            <div class="award">
                                <h4>Award Winner</h4>
                                <img src="img/services/award-winner-2020.png" alt="award winner">
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Main Footer -->
                <footer class="footer-section">
                    <div class="container">
                        <div class="top-footer-section">
                            <div class="row">
                                <div class="col-lg-5 col-md-12">
                                    <div>
                                        <div id="block-footercolumn1">
                                            <div class="footer-logo-wrapper">
                                                <a href="index.php">
                                                    <img src="img/logo_light.png" alt="">
                                                </a>
                                            </div>
                                            <p class="footer-txt">Our goal is to prioritise a seamless customer service experience to our customers, who are paramount to our business. We are committed to offering our clients a reliable and secure service so as to build a complete financial portfolio that empowers them to achieve financial freedom.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-3">
                                    <div>
                                        <div id="block-footercolumn2">
                                            <h4>Useful Links</h4>
                                            <ul class="footer-links">
                                                <li>
                                                    <a href="index.php">Home</a>
                                                </li>
                                                <li>
                                                    <a href="about.php">About us</a>
                                                </li>
                                                <li>
                                                    <a href="signup.html">Register</a>
                                                </li>
                                                <li>
                                                    <a href="login.html">Login</a>
                                                </li>
                                                <li>
                                                    <a href="contact.php">Contact</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-3">
                                    <div>
                                        <div id="block-footercolumn3">
                                            <h4>Documents</h4>
                                            <ul class="footer-links">
                                                <li>
                                                    <a href="terms-and-conditions.php">Terms and Conditions</a>
                                                </li>
                                                <li>
                                                    <a href="privacy-policy.php">Privacy Policy</a>
                                                </li>
                                                <li>
                                                    <a href="assets.php">Trading Assets</a>
                                                </li>
                                                <li>
                                                    <a href="payment-policy.php">Payments Policy</a>
                                                </li>
                                                <li>
                                                    <a href="faq.php">FAQ</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6">
                                    <div>
                                        <div id="block-footercolumn4">
                                            <h4>Contact Us</h4>
                                            <div class="footer-contact-info">
                                                <ul>
                                                    <li>
                                                        <i class="fa fa-home"></i>
                                                        <span>
                                                            28 Fletcher Place
                                                            Coupeville, WA, 98239 United States
                                                        </span>
                                                    </li>
                                                    <li>
                                                        <i class="fa fa-home"></i>
                                                        <span>1741 Wit Rd, Johannesburg, Gauteng, South Africa</span>
                                                    </li>
                                                    <li>
                                                        <i class="far fa-envelope"></i>
                                                        <a href="mailto:Support@Autoglobalfx.com">
                                                            <span>Support@Autoglobalfx.com</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="copyright-section">
                            <div class="row">
                                <div class="col-sm-7">
                                    <p class="text-left">
                                    <div>
                                        <div id="block-copyright">
                                            © Copyrights 2022. All rights reserved.
                                        </div>
                                    </div>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div style="height:50px;"></div>
                    </div>
                </footer>
                <!--    footer section end   -->
                <div class="tradingview-widget-container" style="position: fixed;
bottom: 0%;
background: #23212d;
opacity: 0.9; z-index: 999;">
                    <div class="tradingview-widget-container__widget"></div>
                    <script type="text/javascript" src="../s3.tradingview.com/external-embedding/embed-widget-ticker-tape.js" async>
                        {
                            "symbols": [{
                                    "proName": "FOREXCOM:SPXUSD",
                                    "title": "S&P 500"
                                },
                                {
                                    "proName": "FOREXCOM:NSXUSD",
                                    "title": "Nasdaq 100"
                                },
                                {
                                    "proName": "FX_IDC:EURUSD",
                                    "title": "EUR/USD"
                                },
                                {
                                    "proName": "BITSTAMP:BTCUSD",
                                    "title": "BTC/USD"
                                },
                                {
                                    "proName": "BITSTAMP:ETHUSD",
                                    "title": "ETH/USD"
                                }
                            ],
                            "colorTheme": "dark",
                            "isTransparent": true,
                            "displayMode": "adaptive",
                            "locale": "en"
                        }
                    </script>
                    <div class="bonus_area">
                        <div class="inner_area">
                            <button class="global-close-btn close-btn" data-dismiss="modal">
                                <span></span>
                            </button>
                            <div class="icon">
                                <img src="img/get-free-box.png" alt="" style="width: 54.5px;">
                            </div>
                            <span class="title">Get FREE</span>
                            <strong class="price">
                                10<em>%</em>
                            </strong>
                            <span class="subtitle">on R500 deposit</span>
                        </div>
                        <a href="signup.html" class="get-btn">Get Now</a>
                    </div>
                </div>
                <!-- back to top area start -->
                <div class="back-to-top">
                    <i class="fas fa-chevron-up"></i>
                </div>
                <!--back to top area end -->
                <!--  <a href="https://api.whatsapp.com/send?phone=1(862)8007184" class="float" target="_blank"> -->
                <!--<i class="fa fa-whatsapp my-float"></i> -->
                <!--</a> -->
    <script src="js/main30f430f4.js?v=3" type="text/javascript"></script>
    <script src="js/assets/bootstrap.min3860.js" type="text/javascript"></script>
    <script src="js/assets/YTPlayer.min3860.js" type="text/javascript"></script>
    <script src="js/assets/google-map-activate3860.js" type="text/javascript"></script>
    <script src="js/assets/isotope.pkgd.min3860.js" type="text/javascript"></script>
    <script src="js/assets/jquery-3.3.1.min7eda.js" type="text/javasAcript"></script>
    <script src="js/assets/jquery.ripples-min3860.js" type="text/javascript"></script>
    <script src="js/assets/jquery.slicknav.min3860.js" type="text/javascript"></script>
    <script src="js/assets/main3860.js" type="text/javascript"></script>
    <script src="js/assets/owl.carousel.min3860.js" type="text/javascript"></script>
    <script src="js/assets/parallax.min3860.js" type="text/javascript"></script>
    <script src="js/assets/particles.min3860.js" type="text/javascript"></script>
    <script src="js/assets/popper.min3860.js" type="text/javascript"></script>
    <!-- <script src="j.js" type="text/javascript"></script> -->
    <!-- <script> -->
    <!-- $('document').ready(function(){ -->
    <!-- $.post('contact.php',null,function(data){ -->
    <!-- $('.footer-contact-info').html(data); -->
    <!-- }); -->
    <!-- }); -->
    <!-- </script> -->
</body>
<!-- Mirrored from Autoglobalfx.com/ by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 09 May 2021 10:26:38 GMT -->

</html>



<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.4/dist/sweetalert2.all.js"></script>

<script>
    $("#resetPassword").submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            url: 'php/reset_password.php',
            type: 'POST',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function() {
                Swal.fire({
                    html: '<div style="font-size: 15px; width:4rem; height:4rem;" class="spinner-border"></div>',
                    showConfirmButton: false
                });

            },
            success: function(data) {
                if (data.trim() == 'success') {

                    Swal.fire({
                        icon: 'success',
                        html: '<div class="">Password Changed Successfully</div>',
                        showConfirmButton: true,
                        allowOutsideClick: true
                    }).then((result) => {
                        location.href = "login.html";

                    })
                }
                 else if (data.trim() == 'failed') {

                    Swal.fire({
                        icon: 'error',
                        html: '<div class=""> Fail to change password</div>',
                        showConfirmButton: true,
                        allowOutsideClick: true
                    })
                } else {
                    Swal.fire({
                        icon: 'error',
                        html: '<div> something went wrong</div>',
                        allowOutsideClick: true
                    });
                }
            },
            error: function() {},
        });
    });
</script>