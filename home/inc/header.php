<?php 
session_start();

if (isset($_GET["regx"])) {
    $_SESSION["harsh"] = $_GET["regx"];
    // echo $_SESSION["harsh"];
}else{
    $_SESSION["harsh"] = "00000";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <!-- Title -->
    <title>Welcome to Matrixcapitals</title>

    <!-- Favicon -->
<link rel="icon" href="img/core-img/favicon.ico">
    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <!-- ##### Preloader ##### -->
    <div id="preloader">
        <i class="circle-preloader"></i>
    </div>
    <!-- ##### Header Area Start ##### -->
    <header class="header-area">

        <!-- Top Header Area -->
        <div class="top-header">
            <div class="container h-100">
                <div class="row h-100">
                    <div class="col-12 h-100">
                        <div class="top-header-content h-100 d-flex align-items-center justify-content-between">
                            <!-- Top Headline -->
                            <div class="top-headline">
                                <p>Welcome to <span>Matrixcapitals</span></p>
                            </div>
                            <!-- Top Login & Faq & Earn Monery btn -->
                            <div class="login-faq-earn-money">
                                <!-- <a href="#">Login | Register</a>
                                <a href="#">FAQ</a>
                                <a href="#" class="active">Earn Money</a> -->


 <?php if (isset($_SESSION["role"])) {
    echo '<a href="../account" class=" btn btn-link btn-sm text-primary">
                        <i class="fa fa-user"> </i> Dashboard
                    </a>';
}else{
    echo '
        
        <a href="../register" class="btn btn-danger btn-sm">Register</a>
        <a href="../login" class="btn btn-primary btn-sm">Login</a>

    ';
} ?>




                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Navbar Area -->
        <div class="cryptos-main-menu">
            <div class="classy-nav-container breakpoint-off">
                <div class="container">
                    <!-- Menu -->
                    <nav class="classy-navbar justify-content-between" id="cryptosNav">

                        <!-- Logo -->
                        <a class="nav-brand" href="home"><img src="img/core-img/logo.png" alt=""></a>

                        <!-- Navbar Toggler -->
                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"><span></span><span></span><span></span></span>
                        </div>

                        <!-- Menu -->
                        <div class="classy-menu">

                            <!-- close btn -->
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>

                            <!-- Nav Start -->
                            <div class="classynav">
                                <ul>
                                    <li><a href="index">Home</a></li>
                               
                                    <li><a href="../about-us">About-us</a></li>
                                    <li><a href="../faqs">FAQs</a></li>
                                    <li><a href="../terms-and-conditions">Contact</a></li>
                                    <li><a href="../affiliate-program">Program</a></li>
                                   <!--  <li><a href="../register">Re</a></li>
                                    <li><a href="../login">Contact</a></li> -->
                                    <!-- <li>
                <a href="#" >
                    <button type="button" class=" btn btn-link btn-sm text-success"  data-toggle="modal" data-target="#myModal" onclick="toggledis(\'signupform\', \'signinform\')">
                        <i class="fa fa-sign-in"></i> Signin
                    </button>
                </a>

                                </li>
                                    <li><a href="#">
                    <button type="button" class=" btn btn-link btn-sm text-danger" data-toggle="modal"  data-target="#myModal" onclick="toggledis(\'signinform\', \'signupform\')" tabindex="-1" role="dialog" aria-labelledby="scrollmodalLabel" >
                        <i class="fa fa-user"> </i> Register
                    </button>
                                    </a></li> -->
                                </ul>

                                <!-- Newsletter Form -->
                                <div class="header-newsletter-form">
                                    <form action="#" method="post" onsubmit="event.preventDefault(); alert('Thanks for subscripting to our Newsletter');">
                                        <input type="email" name="email" id="email" placeholder="Newsletter">
                                        <button type="submit">Subscribe</button>
                                    </form>
                                </div>

                            </div>
                            <!-- Nav End -->
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>


   
<?php include 'inc/modals.php'; ?>