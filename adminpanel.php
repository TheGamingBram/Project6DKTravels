<?php
    $PageName = "Admin Panel";
    include("./Assets/config.php");
    session_start();

    if($_SESSION['email'] != "Admin@donkeytravel.nl"){
        header("location: portal.php");
        exit;
    }


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

    include("PAGE_FRAMEWORK.php"); //connection to database and some test functions

?>
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