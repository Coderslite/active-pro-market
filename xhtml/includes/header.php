<?php
session_start();                  
include "php/security.php";
$email = $_SESSION['email'];
include "php/db_config.php";


$userquery = mysqli_query($con, "SELECT* FROM users WHERE email = '$email'");
if (mysqli_num_rows($userquery) > 0) {
    while ($row = mysqli_fetch_assoc($userquery)) {
        $fname = $row['fullName'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from makaanlelo.com/tf_products_007/Autoglobalfx/xhtml/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 26 Jul 2022 17:26:45 GMT -->
<head>
    <!-- Smartsupp Live Chat script -->
<script type="text/javascript">
var _smartsupp = _smartsupp || {};
_smartsupp.key = '987e04ff5f3a8c18b44f94618da41d7025e33557';
window.smartsupp||(function(d) {
  var s,c,o=smartsupp=function(){ o._.push(arguments)};o._=[];
  s=d.getElementsByTagName('script')[0];c=d.createElement('script');
  c.type='text/javascript';c.charset='utf-8';c.async=true;
  c.src='https://www.smartsuppchat.com/loader.js?';s.parentNode.insertBefore(c,s);
})(document);
</script>

    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="admin, dashboard" />
	<meta name="author" content="DexignZone" />
	<meta name="robots" content="index, follow" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Autoglobalfx : Crypto Admin Dashboard  Bootstrap 5 Template" />
	<meta property="og:title" content="Autoglobalfx : Crypto Admin Dashboard  Bootstrap 5 Template" />
	<meta property="og:description" content="Autoglobalfx : Crypto Admin Dashboard  Bootstrap 5 Template" />
	<meta property="og:image" content="../../../../Autoglobalfx.dexignzone.com/xhtml/social-image.png"/>
	<meta name="format-detection" content="telephone=no">
    <title>Activeglobalfx -  User Dashboard </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
	<link rel="stylesheet" href="vendor/chartist/css/chartist.min.css">
    <link href="vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
	<link href="vendor/owl-carousel/owl.carousel.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<bod>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <!-- <a href="index.php" class="brand-logo" >
    <h2>Autoglobalfx</h2> 
            </a> -->

            <div class="nav-control" style="margin-right: 50px;">
                <div class="hamburger">
                    <span class="line" ></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->
		<!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
               
                        <a href="index.php" class="brand-logo mr-5" >
    <h2>Autoglobalfx</h2> 
            </a>
                        <ul class="navbar-nav header-right mr-5">

                            <li class="nav-item dropdown header-profile">
                                <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown">
                                    <img src="images/profile/pic1.jpg" width="20" alt=""/>
									<div class="header-info">
										<!-- <span>Abraham Great</span> -->
										<span><?php echo $fname;?></span>
									</div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a href="profile.php" class="dropdown-item ai-icon">
                                        <svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                        <span class="ms-2">Profile </span>
                                    </a>
                                    <a href="" class="dropdown-item ai-icon">
                                        <svg id="icon-inbox" xmlns="http://www.w3.org/2000/svg" class="text-success" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                                        <span class="ms-2">Inbox </span>
                                    </a>
                                    <a href="" class="dropdown-item ai-icon">
                                    <form action="php/logout.php" method="POST">
                        <button type="submit" name="logout" class="btn btn-danger btn-block" aria-expanded="false">
							<i class="flaticon-381-network"></i>
                            <span class="ms-2">Logout </span>
                        </button>
                        </form>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="deznav">
            <div class="deznav-scroll">
				<ul class="metismenu" id="menu">
                    <li><a class="ai-icon" href="index.php" aria-expanded="false">
							<i class="flaticon-381-networking"></i>
							<span class="nav-text">Live Position</span>
						</a>

                    </li>
                    <li><a class="ai-icon" href="exchange.php" aria-expanded="false">
						<i class="flaticon-381-television"></i>
							<span class="nav-text">Exchange</span>
						</a>
                    </li>
                    <li><a class="ai-icon" href="deposit.php" aria-expanded="false">
							<i class="flaticon-381-controls-3"></i>
							<span class="nav-text">Deposit</span>
						</a>
                    </li>
                    <li><a class="ai-icon" href="withdraw.php" aria-expanded="false">
							<i class="flaticon-381-internet"></i>
							<span class="nav-text">Withdraw</span>
						</a>
                        
                    </li>
                    <!-- <li><a class="ai-icon" href="trade_history.php" aria-expanded="false">
							<i class="flaticon-381-heart"></i>
							<span class="nav-text">Trading History</span>
						</a>
                    </li> -->
                    <li><a class="ai-icon" href="mailto:support@Autoglobalfx.net" aria-expanded="false">
							<i class="flaticon-381-notepad"></i>
							<span class="nav-text">Support</span>
						</a>
                        
                    </li>
                    <li><a class="ai-icon" href="profile.php" aria-expanded="false">
							<i class="flaticon-381-network"></i>
							<span class="nav-text">Profile</span>
						</a>
                    </li>
                    <li class="py-5">
                        <form action="php/logout.php" method="POST">
                        <button type="submit" name="logout" class="btn btn-danger btn-block" aria-expanded="false">
							<i class="flaticon-381-network"></i>
							<span class="nav-text">Logout</span>
                        </button>
                        </form>
                    </li>
                   
                </ul>
        
			</div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->