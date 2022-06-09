<?php
    $PageName = "Admin Panel";
    include("PAGE_FRAMEWORK.php"); //connection to database and some test functions

    if($_SESSION['Email'] != "Admin@donkeytravel.nl"){
        header("location: portal.php");
        exit;
    }
?>