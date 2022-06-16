<style>
.styled-table {
    border-collapse: collapse;
    margin: 25px 0;
    font-size: 0.9em;
    font-family: sans-serif;
    min-width: 400px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
}
.styled-table thead tr {
    background-color: #009879;
    color: #ffffff;
    text-align: left;
}
.styled-table th,
.styled-table td {
    padding: 12px 15px;
}
.styled-table tbody tr {
    border-bottom: 1px solid #dddddd;
}

.styled-table tbody tr:nth-of-type(even) {
    background-color: #f3f3f3;
}
</style>
<?php 
        include("./Assets/config.php"); //connection to database and some test functions
        include("./Assets/header.php"); //insert to bootstrap and other java scripts
        if(isset($_POST['submit'])){
                
                $sql = "UPDATE `tochten` SET `Omschrijving` = '" .$_POST['Omschrijving'] . "', `Route` ='" .$_POST['Route'] . "', `Aantaldagen` = '" .$_POST['Aantaldagen'] . "' WHERE `tochten`.`ID` = '" .$_POST['id'] . "';";
                if (mysqli_query($link, $sql)) {}
        }
        if(isset($_GET['aktie'])) {

                $ID = $_GET['id'];
                $sql = "SELECT * FROM `boekingen` WHERE `boekingen`.`ID` ='" . $ID . "'";
                        $result2 = mysqli_query($link, $sql);
                        while($row2 = mysqli_fetch_array($result2)){
                                $tochtenID = $row2['FKtochtenID'];
                        }


                if($_GET['aktie'] == "Update"){
                        $sql = "SELECT * FROM `tochten` WHERE `tochten`.`ID` ='" . $tochtenID . "'";
                        $result = mysqli_query($link, $sql);

                        echo "<table class='styled-table'>";
                        echo "<tr>
                                <th>ID</th>
                                <th>Omschrijving status</th>
                                <th>Route</th>
                                <th>Aantaldagen</th>
                                <th>veranderen</th>
                        </tr>";
                        while($row = mysqli_fetch_array($result)){
                                echo "<tr><form action='boekingBeheer.php' method='post'>
                                        <td><input type='hidden' value='" . $row['ID'] . "' name='id' ><input type='text' value=" . $row['ID'] . " name='id' disabled></td>
                                        <td><input type='text' value='" . $row['Omschrijving'] . "' name='Omschrijving' required></td>
                                        <td><input type='text' value='" . $row['Route'] . "' name='Route' required></td>
                                        <td><input type='text' value='" .  $row['Aantaldagen'] . "' name='Aantaldagen' required></td>
                                        <td><input type='submit' name='submit' value='versturen' /></form></td>";
                        }
                        echo "</table>";
                }
                if($_GET['aktie'] == "Delete"){

                        $sql = "DELETE FROM `tochten` WHERE `tochten`.`ID` ='" . $tochtenID . "'";
                        if (mysqli_query($link, $sql)) {
                            }
                        $sql = "DELETE FROM `boekingen` WHERE `boekingen`.`ID` ='" . $ID . "'";
                        if (mysqli_query($link, $sql)) {
                            }
                        
                }
        }

        $query = "SELECT * FROM boekingen";
        $result = mysqli_query($link, $query);

        echo "<table class='styled-table'>";
        echo "<tr>
                <th>ID</th>
                <th>startdatum</th>
                <th>Omschrijving status</th>
                <th>Route</th>
                <th>Aantaldagen</th>
                <th>klant naam</th>
                <th>update</th>
                <th>delete</th>
        </tr>";
        while($row = mysqli_fetch_array($result)){
                echo "<tr><td>" . $row['ID'] . "</td><td>" . $row['Startdatum'] . "</td>";
                $sql = "SELECT * FROM `tochten` WHERE `tochten`.`ID` ='" . $row['FKtochtenID'] . "'";
                $result2 = mysqli_query($link, $sql);
                while($row2 = mysqli_fetch_array($result2)){
                        echo "<td>" . $row2['Omschrijving'] . "</td>
                        <td>" . $row2['Route'] . "</td>
                        <td>" .  $row2['Aantaldagen'] . "</td>";
                }
                $sql = "SELECT * FROM `klanten` WHERE `klanten`.`ID` ='" . $row['FKklantenID'] . "'";
                $result2 = mysqli_query($link, $sql);
                while($row2 = mysqli_fetch_array($result2)){
                        echo "<td>" . $row2['Naam'] . "</td>
                        <td>" . $row2['Email'] . "</td>
                        <td>" . $row2['Telefoon'] . "</td>";
                }
                echo "<td>" . '<a href="http://localhost/Project6DKTravels/boekingBeheer.php?aktie=Update&id='.$row['ID'].'">Update</a>'
                . "</td><td>" . '<a href="http://localhost/Project6DKTravels/boekingBeheer.php?aktie=Delete&id='.$row['ID'].'">delete</a>'. "</td></tr>";

        }
        echo "</table>";

        

        
