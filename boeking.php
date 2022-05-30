<?php
    include("./Assets/config.php"); //connection to database and some test functions
    include("./Assets/header.php"); //insert to bootstrap and other java scripts
?>
<html>
    <head>
        <title>Monkey travels</title>
    </head>
    <body>
        <div>
            <h1>Monkey travels</h1>
            <div> 
                <form action="boeking.php" method="post">
                    <table width="500px">
                        <tr>
                            <td>startdatum:</td>
                            <td><input type="date" name="startdatum" min="24-5-2020" required></td>
                        </tr>
                        <tr>
                            <td>PINCode:</td>
                            <td><input type="text" placeholder="PINCode" name="PINCode" required></td>
                        </tr>
                        <tr>
                            <td>FKtochtenID:</td>
                            <td><input type="text" placeholder="FKtochtenID" name="FKtochtenID" required></td>
                        </tr>
                        <tr>
                            <td>FKklantenID:</td>
                            <td><input type="text" placeholder="FKklantenID" name="FKklantenID" required></td>
                        </tr>
                        <tr>
                            <td>FKstatussenID:</td>
                            <td><input type="text" placeholder="FKstatussenID" name="FKstatussenID" required></td>
                        </tr>
                        <tr>
                            <td colspan="2" align="right"><input type="submit" value="Registreer" name="toevoegen"></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
        <?php
            if(isset($_POST['toevoegen'])){
                
                $sql = "INSERT INTO `boekingen`(`Startdatum`, `PINCode`, `FKtochtenID`, `FKklantenID`, `FKstatussenID`) VALUES (?,?,?,?,?)";
                if($stmt = mysqli_prepare($link, $sql)){
                    mysqli_stmt_bind_param($stmt, "sssss", $param_startdatum, $param_PINCode, $param_FKtochtenID, $param_FKklantenID, $param_FKstatussenID);

                    $param_startdatum = $_POST['startdatum'];
                    $param_PINCode = $_POST['PINCode'];
                    $param_FKtochtenID = $_POST['FKtochtenID'];
                    $param_FKklantenID = $_POST['FKklantenID'];
                    $param_FKstatussenID = $_POST['FKstatussenID'];

                    if(mysqli_stmt_execute($stmt)){
                           PHP_allert("nieuwe boeking voltooit");
                    }
                }
            }
        ?>
    </body>
</html>