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
    <title>Welcome to Vatican Investment Limited</title>

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
    <header class="header-area"id="index">

        <!-- Navbar Area -->
        <div class="cryptos-main-menu">
            <div class="classy-nav-container breakpoint-off">
                <div class="container">
                    <!-- Menu -->
                    <nav class="classy-navbar justify-content-between" id="cryptosNav">

                        <!-- Logo -->
                        <a class="nav-brand d-md-none" href="home"><img src="img/logo.png" alt="" width="100px"/></a>

                        <a class="nav-brand d-none d-md-block" href="home"><img src="img/logo.png" alt="" width="200px"/></a>

    

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
                                    <li><a href="#index">Home</a></li>
                                    <li><a href="#aboutUs">About-us</a></li>
                                    <li><a href="#plans">Plans</a></li>
                                    <li><a href="#testimonials">Testimonials</a></li>
                                    <li><a href="#contact">Contact</a></li>
                                </ul>

                             
                                    <?php if (isset($_SESSION["role"])) {
                                        echo '  <a href="../account" class=" btn btn-link btn-sm text-primary">
                                                    <i class="fa fa-user"> </i> Dashboard
                                                </a>';
                                    }else{
                                        echo '
                                            <a href="../register" class="btn btn-secondary btn-md mx-4 text-white">Register</a>
                                            <a href="../login" class="btn btn-primary btn-md mx-4 text-white">Login</a>
                                        ';
                                    } ?>

                            </div>
                            <!-- Nav End -->
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>


   
<?php include 'inc/modals.php'; ?>