<?php 
        include("./Assets/config.php"); //connection to database and some test functions
        include("./Assets/header.php"); //insert to bootstrap and other java scripts


        if(isset($_post['PINCode'])){
                $sql = "INSERT INTO `boekingen`(`Startdatum`, `PINCode`, `FKtochtenID`, `FKklantenID`, `FKstatussenID`) VALUES (?,?,?,?,?)";
                if($stmt = mysqli_prepare($link, $sql)){
                        mysqli_stmt_bind_param($stmt, "sssss", $param_startdatum, $param_PINCode, $param_FKtochtenID, $param_FKklantenID, $param_FKstatussenID);
                        $param_startdatum = date("y/m/d");
                        $param_PINCode = 1;
                        $param_FKtochtenID = 1;
                        $param_FKklantenID = 1;
                        $param_FKstatussenID = 1;

                        if(mysqli_stmt_execute($stmt)){
                               PHP_allert("nieuwe boeking voltooit");
                        }
                }
        }
        
