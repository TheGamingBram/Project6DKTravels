<?php 
        if(!isset($PageName)){
            $PageName = "Template Page";
        }

        if(isset($_GET['distroy'])){
            unset($_SESSION);
            session_destroy();
        }
        
        if(!isset($_SESSION["loggedin"])){
            header("location: index.php");
            exit;
        }else {
            $USERNAME = $_SESSION['name'];
        }
       
        if(!isset($USERNAME)){
            $USERNAME = "Template";
        }
        include("./Assets/header.php"); //insert to bootstrap and other java scripts
?>
<head>
    <link rel="stylesheet" href="./Assets/Css/app-creative.min.css"> 
</head>
<body class="" data-layout-color="light" data-layout="topnav" data-layout-mode="fluid" data-rightbar-onstart="true" data-leftbar-compact-mode="condensed">
    <!-- Begin page -->
    <div class="wrapper">

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <div class="content">
                <!-- Topbar Start -->
                <div class="navbar-custom topnav-navbar topnav-navbar-dark">
                    <div class="container-fluid">

                        <!-- LOGO -->
                        <a href="index.php" class="topnav-logo">
                            <span class="topnav-logo-lg">
                                <img src="Assets/Img/Logo.png" alt="" height="50">
                            </span>
                            <span class="topnav-logo-sm">
                                <img src="Assets/Img/Logo.png" alt="" height="50">
                            </span>
                        </a>

                        <ul class="list-unstyled topbar-menu float-end mb-0">

                            <li class="dropdown notification-list">
                                <a class="nav-link dropdown-toggle nav-user arrow-none me-0" data-bs-toggle="dropdown" id="topbar-userdrop" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                    <span class="account-user-name"><?php echo $USERNAME?></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated topbar-dropdown-menu profile-dropdown" aria-labelledby="topbar-userdrop">
                                    <!-- item-->
                                    <a href="AccountBeheer.php" class="dropdown-item notify-item">
                                        <i class="mdi mdi-account-circle me-1"></i>
                                        <span>My Account</span>
                                    </a>

                                    <!-- item-->
                                    <a href="?distroy=true" class="dropdown-item notify-item">
                                        <i class="mdi mdi-logout me-1"></i>
                                        <span>Logout</span>
                                    </a>

                                </div>
                            </li>

                        </ul>
                    </div>
                </div>
                <!-- end Topbar -->

                <div class="topnav shadow-sm">
                    <div class="container-fluid">
                        <nav class="navbar navbar-light navbar-expand-lg topnav-menu">
    
                            <div class="collapse navbar-collapse active" id="topnav-menu-content">
                                <ul class="navbar-nav">
                                    <li class="nav-item dropdown active">
                                        <a class="nav-link dropdown-toggle arrow-none" href="portal.php" id="topnav-apps" role="button">
                                        Home
                                        </a>
                                    </li>
                                    <!-- <li class="nav-item dropdown active">
                                        <a class="nav-link dropdown-toggle arrow-none" href="portal.php" id="topnav-apps" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="uil-apps me-1"></i>Apps<div class="arrow-down"></div>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="topnav-apps">
                                            <a href="portal.php" class="dropdown-item">Home</a>
                                        </div>
                                    </li> -->

                                    <?php if($_SESSION['email'] == "Admin@donkeytravel.nl"){
                                        ?> 
                                            <li class="nav-item dropdown active">
                                                <a class="nav-link dropdown-toggle arrow-none" href="adminpanel.php" id="topnav-apps" role="button">
                                                    Admin Pannel
                                                </a>
                                            </li>
                                        <?php
                                    } ?>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>

                
                <!-- Start Content-->
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <h4 class="page-title"><?=$PageName?></h4>
                            </div>
                        </div>
                        <div class="col-12">
                            
