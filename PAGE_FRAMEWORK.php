<?php 
        include("./Assets/config.php"); //connection to database and some test functions
        include("./Assets/header.php"); //insert to bootstrap and other java scripts

        session_start();

        if(!isset($PageName)){
            $PageName = "Template Page";
        }

        if(isset($_GET['distroy'])){
            unset($_SESSION);
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
                                    <span class="account-user-name"><?=$USERNAME?></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated topbar-dropdown-menu profile-dropdown" aria-labelledby="topbar-userdrop">
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
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
                                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-apps" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="uil-apps me-1"></i>Apps <div class="arrow-down"></div>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="topnav-apps">
                                            <a href="apps-calendar.html" class="dropdown-item">Calendar</a>
                                            <a href="apps-chat.html" class="dropdown-item">Chat</a>
                                            <div class="dropdown active">
                                                <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-crm" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    CRM <div class="arrow-down"></div>
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="topnav-crm">
                                                    <a href="crm-dashboard.html" class="dropdown-item active">Dashboard</a>
                                                    <a href="crm-projects.html" class="dropdown-item">Project</a>
                                                    <a href="crm-orders-list.html" class="dropdown-item">Orders List</a>
                                                    <a href="crm-clients.html" class="dropdown-item">Clients</a>
                                                    <a href="crm-management.html" class="dropdown-item">Management</a>
                                                </div>
                                            </div>
                                            <div class="dropdown">
                                                <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-ecommerce" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Ecommerce <div class="arrow-down"></div>
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="topnav-ecommerce">
                                                    <a href="apps-ecommerce-products.html" class="dropdown-item">Products</a>
                                                    <a href="apps-ecommerce-products-details.html" class="dropdown-item">Products Details</a>
                                                    <a href="apps-ecommerce-orders.html" class="dropdown-item">Orders</a>
                                                    <a href="apps-ecommerce-orders-details.html" class="dropdown-item">Order Details</a>
                                                    <a href="apps-ecommerce-customers.html" class="dropdown-item">Customers</a>
                                                    <a href="apps-ecommerce-shopping-cart.html" class="dropdown-item">Shopping Cart</a>
                                                    <a href="apps-ecommerce-checkout.html" class="dropdown-item">Checkout</a>
                                                    <a href="apps-ecommerce-sellers.html" class="dropdown-item">Sellers</a>
                                                </div>
                                            </div>
                                            <div class="dropdown">
                                                <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-project" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Projects <div class="arrow-down"></div>
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="topnav-project">
                                                    <a href="apps-projects-list.html" class="dropdown-item">List</a>
                                                    <a href="apps-projects-details.html" class="dropdown-item">Details</a>
                                                    <a href="apps-projects-gantt.html" class="dropdown-item">Gantt</a>
                                                    <a href="apps-projects-add.html" class="dropdown-item">Create Project</a>
                                                </div>
                                            </div>
                                            <a href="apps-social-feed.html" class="dropdown-item">Social Feed</a>
                                            <div class="dropdown">
                                                <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-tasks" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Tasks <div class="arrow-down"></div>
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="topnav-tasks">
                                                    <a href="apps-tasks.html" class="dropdown-item">List</a>
                                                    <a href="apps-tasks-details.html" class="dropdown-item">Details</a>
                                                    <a href="apps-kanban.html" class="dropdown-item">Kanban Board</a>
                                                </div>
                                            </div>
                                            <a href="apps-file-manager.html" class="dropdown-item">File Manager</a>
                                        </div>
                                    </li>
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
                            
