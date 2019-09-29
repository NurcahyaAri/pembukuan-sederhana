<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>
        <?php echo $page_title;?>
    </title>

    <!-- Fontfaces CSS-->
    <link href="<?=base_url()?>assets/css/font-face.css" rel="stylesheet" media="all">
    <link href="<?=base_url()?>/assets/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="<?=base_url()?>/assets/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="<?=base_url()?>/assets/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="<?=base_url()?>/assets/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="<?=base_url()?>/assets/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="<?=base_url()?>/assets/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="<?=base_url()?>/assets/vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="<?=base_url()?>/assets/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="<?=base_url()?>/assets/vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="<?=base_url()?>/assets/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="<?=base_url()?>/assets/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Jquery JS-->
    <script src="<?=base_url()?>/assets/vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="<?=base_url()?>/assets/vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="<?=base_url()?>/assets/vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="<?=base_url()?>/assets/vendor/slick/slick.min.js">
    </script>
    <script src="<?=base_url()?>/assets/vendor/wow/wow.min.js"></script>
    
    <script src="<?=base_url()?>/assets/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="<?=base_url()?>/assets/vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="<?=base_url()?>/assets/vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="<?=base_url()?>/assets/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="<?=base_url()?>/assets/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="<?=base_url()?>/assets/vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="<?=base_url()?>/assets/vendor/select2/select2.min.js">
    </script>
    <script src="<?=base_url()?>/assets/vendor/animsition/animsition.min.js"></script>
    <!-- Main JS-->
    <script src="<?=base_url()?>/assets/js/main.js"></script>

    <script src="<?=base_url()?>/assets/js/jquery.serializeObject.js"></script>
    <!-- Main CSS-->
    <link href="<?=base_url()?>/assets/css/theme.css" rel="stylesheet" media="all">

    <link href="<?=base_url()?>/assets/css/dataTables.bootstrap.css" rel="stylesheet" media="all">
    <script src="<?=base_url()?>/assets/js/datatables.js"></script>
    <script src="<?=base_url()?>/assets/js/datatablesBootstrap.js"></script>
    
    <link href="<?=base_url()?>/assets/css/fontAwesome.css" rel="stylesheet" media="all">

    <!-- daterangepicker -->
    <script src="<?=base_url()?>/assets/js/moment.js"></script>
    <script src="<?=base_url()?>/assets/js/daterangepicker.js"></script>
    <link href="<?=base_url()?>/assets/css/daterangepicker.css" rel="stylesheet" media="all">

    <!-- datepicker -->
    <link href="<?=base_url()?>/assets/css/datepicker.css" rel="stylesheet" media="all">
    <script src="<?=base_url()?>/assets/js/datepicker.js"></script>
    <!-- include summernote css/js -->
    <link href="<?=base_url()?>/assets/css/summernote.css" rel="stylesheet" media="all">
    <script src="<?=base_url()?>/assets/js/summernote.js"></script>
    
    <style>
        .modal-body{
            max-height: 100%;
            overflow-y: auto;
        }

        .modal-lg{
            width : 95%;
        }
    </style>
</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="index.html">
                            <h1>SALON ANNA</h1>
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li class="active">
                            <a class="js-arrow" href="<?=base_url()?>">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li>
                        <li>
                            <a href="<?=base_url()?>peminjaman">
                                <i class="fas fa-table"></i>Peminjaman</a>
                        </li>
                        <li>
                            <a href="<?=base_url()?>pengembalian">
                                <i class="fas fa-chart-bar"></i>Pemgenbalian</a>
                        </li>
                        <li>
                            <a href="<?=base_url()?>history">
                                <i class="far fa-check-square"></i>History</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <center>
                <h1>
                    ANNA SALON
                </h1>
            </center>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="active">
                            <a class="js-arrow" href="<?=base_url()?>">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li>
                        <li>
                            <a href="<?=base_url()?>peminjaman">
                                <i class="fas fa-table"></i>Peminjaman</a>
                        </li>
                        <li>
                            <a href="<?=base_url()?>pengembalian">
                                <i class="fas fa-chart-bar"></i>Pemgenbalian</a>
                        </li>
                        <li>
                            <a href="<?=base_url()?>history">
                                <i class="far fa-check-square"></i>History</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->


        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <div class="au-input au-input--xl"></div>
                            <div class="account-wrap">
                                <div class="account-item clearfix js-item-menu">
                                    <div class="image">
                                        <img src="<?=base_url()?>/assets/images/icon/avatar-01.jpg" alt="User">
                                    </div>
                                    <div class="content">
                                        <a class="js-acc-btn" href="#">Admin</a>
                                    </div>
                                    <div class="account-dropdown js-dropdown">
                                        <div class="info clearfix">
                                            <div class="image">
                                                <a href="#">
                                                    <img src="<?=base_url()?>/assets/images/icon/avatar-01.jpg" alt="User">
                                                </a>
                                            </div>
                                            <div class="content">
                                                <h5 class="name">
                                                    <a href="#">Admin</a>
                                                </h5>
                                                <span class="email"></span>
                                            </div>
                                        </div>
                                        <!-- <div class="account-dropdown__body">
                                            <div class="account-dropdown__item">
                                                <a href="#">
                                                    <i class="zmdi zmdi-account"></i>Account</a>
                                            </div>
                                            <div class="account-dropdown__item">
                                                <a href="#">
                                                    <i class="zmdi zmdi-settings"></i>Setting</a>
                                            </div>
                                            <div class="account-dropdown__item">
                                                <a href="#">
                                                    <i class="zmdi zmdi-money-box"></i>Billing</a>
                                            </div>
                                        </div> -->
                                        <div class="account-dropdown__footer">
                                            <a href="<?=base_url()?>/logout">
                                                <i class="zmdi zmdi-power"></i>Logout</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->
