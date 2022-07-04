<?php
    $PageName = "Admin Panel";
    include("./Assets/config.php");
    session_start();

    if($_SESSION['email'] != "Admin@donkeytravel.nl"){
        header("location: portal.php");
        exit;
    }

    if(isset($_GET['aktie'])) {

        $ID = $_GET['id'];
        $sql = "SELECT * FROM `boekingen` WHERE `boekingen`.`ID` ='" . $ID . "'";
                $result2 = mysqli_query($link, $sql);
                while($row2 = mysqli_fetch_array($result2)){
                        $tochtenID = $row2['FKtochtenID'];
                        $FKklantenID = $row2['FKklantenID'];
                }


        if($_GET['aktie'] == "Update"){
                $sql = "SELECT * FROM `tochten` WHERE `tochten`.`ID` ='" . $tochtenID . "'";
                $result = mysqli_query($link, $sql);

                $sql2 = "SELECT * FROM `klanten` WHERE `klanten`.`ID` ='" . $FKklantenID . "'";
                $result2 = mysqli_query($link, $sql2);

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
                                <td><input type='submit' name='submit' value='versturen' /></form><td>";
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
    //Klanten
    if(isset($_GET['deluser'])){
        $delid = $_GET['deluser'];
        $query = "DELETE FROM klanten WHERE ID='$delid' ";
        $query_run = mysqli_query($con, $query);
        if($query_run){
            header("location: adminpanel.php");
        }
    }

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if($_POST['type'] == "edit_user"){
            $ID = $_POST['id'];
            $name = $_POST['Username'];
            $email = $_POST['Email'];
            $phone = $_POST['tel'];
            $query = "UPDATE klanten SET Naam='$name', Email='$email', Telefoon='$phone' WHERE ID='$ID' ";
            
            $query_run = mysqli_query($con, $query);
            if($query_run){
                exit(header("location: adminpanel.php"));
            }
            else{
                exit(header("location: adminpanel.php"));
            }
        }
    }

    //Herberg
    if(isset($_GET['delherberg'])){
        $delid = $_GET['delherberg'];
        $query = "DELETE FROM herbergen WHERE ID='$delid' ";
        $query_run = mysqli_query($con, $query);
        if($query_run){
            header("location: adminpanel.php");
        }
    }

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if($_POST['type'] == "edit_herberg"){
            $ID = $_POST['id'];
            $name = $_POST['Naam'];
            $adres = $_POST['Adres'];
            $email = $_POST['Email'];
            $phone = $_POST['tel'];
            $coor = $_POST['Coordinaten'];
            $query = "UPDATE herbergen SET Naam='$name', Adres='$adres', Email='$email', Telefoon='$phone', Coordinaten='$coor' WHERE ID='$ID' ";
            
            $query_run = mysqli_query($con, $query);
            if($query_run){
                exit(header("location: adminpanel.php"));
            }
            else{
                exit(header("location: adminpanel.php"));
            }
        }
    }

    //Restaurants
    if(isset($_GET['delrestaurant'])){
        $delid = $_GET['delrestaurant'];
        $query = "DELETE FROM restaurants WHERE ID='$delid' ";
        $query_run = mysqli_query($con, $query);
        if($query_run){
            header("location: adminpanel.php");
        }
    }

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if($_POST['type'] == "edit_restaurant"){
            $ID = $_POST['id'];
            $name = $_POST['Naam'];
            $adres = $_POST['Adres'];
            $email = $_POST['Email'];
            $phone = $_POST['tel'];
            $coor = $_POST['Coordinaten'];
            $query = "UPDATE restaurants SET Naam='$name', Adres='$adres', Email='$email', Telefoon='$phone', Coordinaten='$coor' WHERE ID='$ID' ";
            
            $query_run = mysqli_query($con, $query);
            if($query_run){
                exit(header("location: adminpanel.php"));
            }
            else{
                exit(header("location: adminpanel.php"));
            }
        }
    }

    //Tochten
    if(isset($_GET['deltocht'])){
        $delid = $_GET['deltocht'];
        $query = "DELETE FROM tochten WHERE ID='$delid' ";
        $query_run = mysqli_query($con, $query);
        if($query_run){
            header("location: adminpanel.php");
        }
    }

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if($_POST['type'] == "edit_tocht"){
            $ID = $_POST['id'];
            $scription = $_POST['Omschrijving'];
            $route = $_POST['Route'];
            $days = $_POST['Aantaldagen'];
            $query = "UPDATE tochten SET Omschrijving='$scription', Route='$route', Aantaldagen='$days' WHERE ID='$ID' ";
            
            $query_run = mysqli_query($con, $query);
            if($query_run){
                exit(header("location: adminpanel.php"));
            }
            else{
                exit(header("location: adminpanel.php"));
            }
        }
    }
    //Status
    if(isset($_GET['delstatus'])){
        $delid = $_GET['delstatus'];
        $query = "DELETE FROM statussen WHERE ID='$delid' ";
        $query_run = mysqli_query($con, $query);
        if($query_run){
            header("location: adminpanel.php");
        }
    }

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if($_POST['type'] == "edit_status"){
            $ID = $_POST['id'];
            $code = $_POST['Statuscode'];
            $status = $_POST['Status'];
            $deletable = $_POST['Verwijderbaar'];
            $PIN = $_POST['PINtoekennen'];
            $query = "UPDATE statussen SET Statuscode='$code', Status='$status', Verwijderbaar='$deletable', PINtoekennen='$PIN'  WHERE ID='$ID' ";
            
            $query_run = mysqli_query($con, $query);
            if($query_run){
                exit(header("location: adminpanel.php"));
            }
            else{
                exit(header("location: adminpanel.php"));
            }
        }
    }


    include("PAGE_FRAMEWORK.php"); //connection to database and some test functions

?>

<div class="card">
    <div class="card-body">
        <h5 class="card-title">Boeking Beheer</h5>
        <table id="boeking_table" class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Startdatum</th>
                    <th>Omschrijving status</th>
                    <th>Aantaldagen</th>
                    <th>klant naam</th>
                    <th>klant E-mail</th>
                    <th>klant telefoonnummer</th>
                    <th>Opties</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                
                $query_Boeking = "SELECT * FROM boekingen";
                $Result_Boeking = mysqli_query($link, $query_Boeking);
                while($row_Boeking = mysqli_fetch_array($Result_Boeking)){
                    echo "<tr><td>" . $row_Boeking['ID'] . "</td><td>" . $row_Boeking['Startdatum'] . "</td>";
                    $sql_TochtINFO = "SELECT * FROM `tochten` WHERE `tochten`.`ID` ='" . $row_Boeking['FKtochtenID'] . "'";
                    $Result_TochtINFO= mysqli_query($link, $sql_TochtINFO);
                    while($row_tochtinfo = mysqli_fetch_array($Result_TochtINFO)){
                            echo "<td>" . $row_tochtinfo['Omschrijving'] . "</td>
                            <td>" .  $row_tochtinfo['Aantaldagen'] . "</td>";
                    }
                    $sql_KLANT = "SELECT * FROM `klanten` WHERE `klanten`.`ID` ='" . $row_Boeking['FKklantenID'] . "'";
                    $result_KLANT = mysqli_query($link, $sql_KLANT);
                    while($row_KLANT = mysqli_fetch_array($result_KLANT)){
                            echo "<td>" . $row_KLANT['Naam'] . "</td>
                            <td>" . $row_KLANT['Email'] . "</td>
                            <td>" . $row_KLANT['Telefoon'] . "</td>";
                    }
                    echo "<td><a href='?aktie=Update&id=".$row_Boeking['ID']."'>
                        <button type='button' class='btn btn-warning' data-bs-toggle='modal'>
                            <i class='fas fa-pen'></i>
                        </button>
                    </a>
                    <a href='?aktie=Delete&id=".$row_Boeking['ID']."'>
                        <button type='button' class='btn btn-danger' data-bs-toggle='modal'>
                            <i class='fas fa-trash-can'></i>
                        </button>
                    </a></td>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<div class="card">
  <div class="card-body">
    <h5 class="card-title">Klant Beheer</h5>
    <table id="user_table" class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Naam</th>
                <th>E-mail</th>
                <th>Telefoon</th>
                <th>Registratiedatum</th>
                <th>Opties</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $query_run = mysqli_query($con, "SELECT * FROM klanten");
                while ($row = mysqli_fetch_assoc($query_run)) 
                {
                    ?>
                    <tr>
                        <td><?=$row['ID']?></td>
                        <td><?=$row['Naam']?></td>
                        <td><?=$row['Email']?></td>
                        <td><?=$row['Telefoon'] ?></td>
                        <td><?=$row['Gewijzigd'] ?></td>
                        <td>
                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#edit_<?=$row['ID']?>">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </button>
                            <a href="?deluser=<?=$row['ID']?>">
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal">
                                    <i class="fas fa-trash-can"></i>
                                </button>
                            </a>
                            

                            <div class="modal fade" id="edit_<?=$row['ID']?>" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog">
                                    <form method="post" autocomplete="off">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Klant Beheer</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <input type="hidden" name="id" value="<?=$row['ID']?>">
                                            <input type="hidden" name="type" value="edit_user">
                                            <div class="mb-3">
                                                <label for="Username" class="form-label">Gebruikersnaam</label>
                                                <input type="text" class="form-control" id="Username" name="Username" value="<?=$row['Naam']?>">
                                            </div>
                                            <div class="mb-3">
                                                <label for="Email" class="form-label">E-mail</label>
                                                <input type="email" class="form-control" id="Email" name="Email" value="<?=$row['Email']?>">
                                            </div>
                                            <div class="mb-3">
                                                <label for="tel" class="form-label">Telefoonnummer</label>
                                                <input type="tel" class="form-control" id="tel" pattern="[0-9]{10}" name="tel" value="<?=$row['Telefoon']?>">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-success">Opslaan</button>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <!-- <form action="adminbewerken.php" method="post">
                                <input type="hidden" name="edit_ID" value="<?php echo $row['ID'] ?>">
                                <button type="sumbit" name="edit_btn" class="btn btn-primary"> Bewerken</button>
                            </form>
                            <form action="admincode.php" method="post">
                            <input type="hidden" name="delete_ID" value="<?php echo $row['ID']?>">
                            <button type="sumbit" name="delete_btn" class="btn btn-danger"> Verwijderen</button>
                            </form> -->
                    <?php
                }
            ?>
        </tbody>
    </table>
  </div>
</div>

<div class="card">
  <div class="card-body">
    <h5 class="card-title">Herberg Beheer</h5>
    <table id="user_table" class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Naam</th>
                <th>Adres</th>
                <th>E-mail</th>
                <th>Telefoon</th>
                <th>Coordinaten</th>
                <th>Registratiedatum</th>
                <th>Opties</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $query_run = mysqli_query($con, "SELECT * FROM herbergen");
                while ($row = mysqli_fetch_assoc($query_run)) 
                {
                    ?>
                    <tr>
                        <td><?=$row['ID']?></td>
                        <td><?=$row['Naam']?></td>
                        <td><?=$row['Adres']?></td>
                        <td><?=$row['Email']?></td>
                        <td><?=$row['Telefoon'] ?></td>
                        <td><?=$row['Coordinaten']?></td>
                        <td><?=$row['Gewijzigd'] ?></td>
                        <td>
                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#edit_<?=$row['ID']?>">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </button>
                            <a href="?delherberg=<?=$row['ID']?>">
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal">
                                    <i class="fas fa-trash-can"></i>
                                </button>
                            </a>
                            

                            <div class="modal fade" id="edit_<?=$row['ID']?>" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog">
                                    <form method="post" autocomplete="off">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Herberg Beheer</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <input type="hidden" name="id" value="<?=$row['ID']?>">
                                            <input type="hidden" name="type" value="edit_herberg">
                                            <div class="mb-3">
                                                <label for="Naam" class="form-label">Naam</label>
                                                <input type="text" class="form-control" id="Naam" name="Naam" value="<?=$row['Naam']?>">
                                            </div>
                                            <div class="mb-3">
                                                <label for="Adres" class="form-label">Adres</label>
                                                <input type="text" class="form-control" id="Adres" name="Adres" value="<?=$row['Adres']?>">
                                            </div>
                                            <div class="mb-3">
                                                <label for="Email" class="form-label">E-mail</label>
                                                <input type="email" class="form-control" id="Email" name="Email" value="<?=$row['Email']?>">
                                            </div>
                                            <div class="mb-3">
                                                <label for="tel" class="form-label">Telefoonnummer</label>
                                                <input type="tel" class="form-control" id="tel" pattern="[0-9]{10}" name="tel" value="<?=$row['Telefoon']?>">
                                            </div>
                                            <div class="mb-3">
                                                <label for="Coordinaten" class="form-label">Coordinaten</label>
                                                <input type="text" class="form-control" id="Coordinaten" name="Coordinaten" value="<?=$row['Coordinaten']?>">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-success">Opslaan</button>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <?php
                }
            ?>
        </tbody>
    </table>
  </div>
</div>

<div class="card">
  <div class="card-body">
    <h5 class="card-title">restaurant Beheer</h5>
    <table id="user_table" class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Naam</th>
                <th>Adres</th>
                <th>E-mail</th>
                <th>Telefoon</th>
                <th>Coordinaten</th>
                <th>Registratiedatum</th>
                <th>Opties</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $query_run = mysqli_query($con, "SELECT * FROM restaurants");
                while ($row = mysqli_fetch_assoc($query_run)) 
                {
                    ?>
                    <tr>
                        <td><?=$row['ID']?></td>
                        <td><?=$row['Naam']?></td>
                        <td><?=$row['Adres']?></td>
                        <td><?=$row['Email']?></td>
                        <td><?=$row['Telefoon'] ?></td>
                        <td><?=$row['Coordinaten']?></td>
                        <td><?=$row['Gewijzigd'] ?></td>
                        <td>
                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#edit_<?=$row['ID']?>">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </button>
                            <a href="?delrestaurant=<?=$row['ID']?>">
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal">
                                    <i class="fas fa-trash-can"></i>
                                </button>
                            </a>
                            

                            <div class="modal fade" id="edit_<?=$row['ID']?>" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog">
                                    <form method="post" autocomplete="off">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Restaurant Beheer</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <input type="hidden" name="id" value="<?=$row['ID']?>">
                                            <input type="hidden" name="type" value="edit_restaurant">
                                            <div class="mb-3">
                                                <label for="Naam" class="form-label">Naam</label>
                                                <input type="text" class="form-control" id="Naam" name="Naam" value="<?=$row['Naam']?>">
                                            </div>
                                            <div class="mb-3">
                                                <label for="Adres" class="form-label">Adres</label>
                                                <input type="text" class="form-control" id="Adres" name="Adres" value="<?=$row['Adres']?>">
                                            </div>
                                            <div class="mb-3">
                                                <label for="Email" class="form-label">E-mail</label>
                                                <input type="email" class="form-control" id="Email" name="Email" value="<?=$row['Email']?>">
                                            </div>
                                            <div class="mb-3">
                                                <label for="tel" class="form-label">Telefoonnummer</label>
                                                <input type="tel" class="form-control" id="tel" pattern="[0-9]{10}" name="tel" value="<?=$row['Telefoon']?>">
                                            </div>
                                            <div class="mb-3">
                                                <label for="Coordinaten" class="form-label">Coordinaten</label>
                                                <input type="text" class="form-control" id="Coordinaten" name="Coordinaten" value="<?=$row['Coordinaten']?>">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-success">Opslaan</button>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <?php
                }
            ?>
        </tbody>
    </table>
  </div>
</div>

<div class="card">
  <div class="card-body">
    <h5 class="card-title">Tocht Beheer</h5>
    <table id="user_table" class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Omschrijving</th>
                <th>Route</th>
                <th>Aantal dagen</th>
                <th>Opties</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $query_run = mysqli_query($con, "SELECT * FROM tochten");
                while ($row = mysqli_fetch_assoc($query_run)) 
                {
                    ?>
                    <tr>
                        <td><?=$row['ID']?></td>
                        <td><?=$row['Omschrijving']?></td>
                        <td><?=$row['Route']?></td>
                        <td><?=$row['Aantaldagen'] ?></td>
                        <td>
                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#edit_<?=$row['ID']?>">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </button>
                            <a href="?deltocht=<?=$row['ID']?>">
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal">
                                    <i class="fas fa-trash-can"></i>
                                </button>
                            </a>
                            

                            <div class="modal fade" id="edit_<?=$row['ID']?>" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog">
                                    <form method="post" autocomplete="off">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Tocht Beheer</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <input type="hidden" name="id" value="<?=$row['ID']?>">
                                            <input type="hidden" name="type" value="edit_tocht">
                                            <div class="mb-3">
                                                <label for="Omschrijving" class="form-label">Omschrijving</label>
                                                <input type="text" class="form-control" id="Omschrijving" name="Omschrijving" value="<?=$row['Omschrijving']?>">
                                            </div>
                                            <div class="mb-3">
                                                <label for="Route" class="form-label">Route</label>
                                                <input type="text" class="form-control" id="Route" name="Route" value="<?=$row['Route']?>">
                                            </div>
                                            <div class="mb-3">
                                                <label for="Aantaldagen" class="form-label">Aantal dagen</label>
                                                <input type="text" class="form-control" id="Aantaldagen" name="Aantaldagen" value="<?=$row['Aantaldagen']?>">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-success">Opslaan</button>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <?php
                }
            ?>
        </tbody>
    </table>
  </div>
</div>

<div class="card">
  <div class="card-body">
    <h5 class="card-title">Status Beheer</h5>
    <table id="user_table" class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Statuscode</th>
                <th>Status</th>
                <th>Verwijderbaar</th>
                <th>Pintoekennen</th>
                <th>Opties</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $query_run = mysqli_query($con, "SELECT * FROM statussen");
                while ($row = mysqli_fetch_assoc($query_run)) 
                {
                    ?>
                    <tr>
                        <td><?=$row['ID']?></td>
                        <td><?=$row['Statuscode']?></td>
                        <td><?=$row['Status']?></td>
                        <td><?=$row['Verwijderbaar'] ?></td>
                        <td><?=$row['PINtoekennen'] ?></td>
                        <td>
                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#edit_<?=$row['ID']?>">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </button>
                            <a href="?delstatus=<?=$row['ID']?>">
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal">
                                    <i class="fas fa-trash-can"></i>
                                </button>
                            </a>
                            

                            <div class="modal fade" id="edit_<?=$row['ID']?>" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog">
                                    <form method="post" autocomplete="off">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Status Beheer</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <input type="hidden" name="id" value="<?=$row['ID']?>">
                                            <input type="hidden" name="type" value="edit_status">
                                            <div class="mb-3">
                                                <label for="Statuscode" class="form-label">Statuscode</label>
                                                <input type="text" class="form-control" id="code" name="code" value="<?=$row['Statuscode']?>">
                                            </div>
                                            <div class="mb-3">
                                                <label for="Status" class="form-label">Status</label>
                                                <input type="text" class="form-control" id="Status" name="Status" value="<?=$row['Status']?>">
                                            </div>
                                            <div class="mb-3">
                                                <label for="Verwijderbaar" class="form-label">Verwijderbaar</label>
                                                <input type="text" class="form-control" id="Verwijderbaar" name="Verwijderbaar" value="<?=$row['Verwijderbaar']?>">
                                            </div>
                                            <div class="mb-3">
                                                <label for="PINtoekennen" class="form-label">Pintoekennen</label>
                                                <input type="text" class="form-control" id="PIN" name="PIN" value="<?=$row['PINtoekennen']?>">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-success">Opslaan</button>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <!-- <form action="adminbewerken.php" method="post">
                                <input type="hidden" name="edit_ID" value="<?php echo $row['ID'] ?>">
                                <button type="sumbit" name="edit_btn" class="btn btn-primary"> Bewerken</button>
                            </form>
                            <form action="admincode.php" method="post">
                            <input type="hidden" name="delete_ID" value="<?php echo $row['ID']?>">
                            <button type="sumbit" name="delete_btn" class="btn btn-danger"> Verwijderen</button>
                            </form> -->
                    <?php
                }
            ?>
        </tbody>
    </table>
  </div>
</div>

<script>
    $('#user_table').DataTable({
        paging: true,
        "info": false,
        "lengthChange":false,
        "pageLength": 5,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.11.5/i18n/nl-NL.json" // adds dutch language support
        },
        "columnDefs": [
          {
              "targets": [0],
              "visible": false,
              "searchable": false
          }
        ]
    });
    $('#boeking_table').DataTable({
        paging: true,
        "info": false,
        "lengthChange":false,
        "pageLength": 5,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.11.5/i18n/nl-NL.json" // adds dutch language support
        },
        "columnDefs": [
          {
              "targets": [0],
              "visible": false,
              "searchable": false
          }
        ]
    });
</script>