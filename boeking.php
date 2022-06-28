<?php
    include("./Assets/header.php"); //insert to bootstrap and other java scripts
    
    if(session_id() === null){
        session_start();
    }

    if(isset($_SESSION["name"])){
        $naam = $_SESSION["name"];

        $sql = "SELECT * FROM `klanten` WHERE `klanten`.`Naam` ='" . $naam . "'";
        $result = mysqli_query($link, $sql);
        while($row = mysqli_fetch_array($result)){
            $klantID = $row['ID'];
        }
    }
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
                            <td>omschrijving:</td>
                            <td><input type="text" placeholder="omschrijving" name="Omschrijving" required></td>
                        </tr>
                        <tr>
                            <td>route:</td>
                            <td><input type="text" placeholder="route" name="Route" required></td>
                        </tr>
                        <tr>
                            <td>aantaldagen:</td>
                            <td><input type="text" placeholder="aantaldagen" name="Aantaldagen" required></td>
                        </tr>
                        <?php
                        if(isset($klantID)){
                            echo '<tr>
                                    <td><input type="hidden" value="'. $klantID .'" name="FKklantenID" required></td>
                                </tr>';
                        }
                        else{
                            echo '<tr>
                                    <td>FKklantenID:</td>
                                    <td><input type="text" placeholder="FKklantenID" name="FKklantenID" required></td>
                                </tr>';
                        }
                        ?>
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

                $sql = "INSERT INTO `tochten`(`Omschrijving`, `Route`, `Aantaldagen`) VALUES (?,?,?)";
                if($stmt = mysqli_prepare($link, $sql)){
                    mysqli_stmt_bind_param($stmt, "sss", $param_Omschrijving, $param_Route, $param_Aantaldagen);

                    $param_Omschrijving = $_POST['Omschrijving'];
                    $param_Route = $_POST['Route'];
                    $param_Aantaldagen = $_POST['Aantaldagen'];

                    mysqli_stmt_execute($stmt);
                }
                $result_tochten = mysqli_query($link, "SELECT ID FROM `tochten` WHERE Omschrijving = '".$param_Omschrijving."';");

                while ($row = mysqli_fetch_assoc($result_tochten)){
                    $param_FKtochtenID = $row["ID"];
                }

                $sql = "INSERT INTO `boekingen`(`Startdatum`, `PINCode`, `FKtochtenID`, `FKklantenID`, `FKstatussenID`) VALUES (?,?,?,?,?)";
                if($stmt = mysqli_prepare($link, $sql)){
                    mysqli_stmt_bind_param($stmt, "sssss", $param_startdatum, $param_PINCode, $param_FKtochtenID, $param_FKklantenID, $param_FKstatussenID);

                    $param_startdatum = $_POST['startdatum'];
                    $param_PINCode = $_POST['PINCode'];
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