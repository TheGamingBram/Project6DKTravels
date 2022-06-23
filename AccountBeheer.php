<?php
    $PageName = "Account Beheer";
    include("./Assets/config.php");
    session_start();

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        prettyprint($_POST);

        if($_POST['UpdateUserInfo'] == "true"){
            $ID = $_POST['ID'];
            $name = $_POST['naam'];
            $phone = $_POST['phone'];
            $query = "UPDATE klanten SET Naam='$name', Telefoon='$phone' WHERE ID='$ID' ";

            $query_run = mysqli_query($con, $query);

            $_SESSION["name"] = $name;

            if($query_run){
                exit(header("location: AccountBeheer.php"));
            }
        }
        if($_POST['DelAccount'] == "true"){
            $ID = $_POST['ID'];
            $query = "DELETE FROM klanten WHERE ID='$ID' ";
            $query_run = mysqli_query($con, $query);
            if($query_run){
                unset($_SESSION);
                session_destroy();
                header("location: index.php");
            }
        }
    }

    $query_run = mysqli_query($con, "SELECT * FROM klanten WHERE Email = '$_SESSION[email]' LIMIT 1");
    while ($row = mysqli_fetch_assoc($query_run)){
        $id = $row['ID'];
        $Naam = $row['Naam'];
        $Email = $row['Email'];
        $Telefoon = $row['Telefoon'];
        $Aangemaakt = $row['Gewijzigd'];
    }

    include("PAGE_FRAMEWORK.php"); //connection to database and some test functions
?>
<div class="container">
    <div class="row">
        <div class="col-lg-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Algemene Informatie</h5>
                    <hr>
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control" disabled value="<?=$Email?>">
                    <label class="form-label">Account Aangemaakt Op</label>
                    <input type="datetime" class="form-control" disabled value="<?=$Aangemaakt?>">
                    <hr>
                    <form method="post">
                        <input type="hidden" value="<?=$id?>" name="ID">
                        <input type="hidden" value="true" name="DelAccount">
                        <button type="submit" class="btn btn-danger">Verwijder Account</button>
                    </form>
                </div>
            </div>
          </div>
          <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Aanpasbare Informatie</h5>
                    <hr>
                    <form method="post">
                        <label class="form-label">Gebruikers Naam</label>
                        <input required type="text" class="form-control" name="naam" value="<?=$Naam?>">
                        <label class="form-label">Telefoonnummer</label>
                        <input required name="phone" class="form-control" type="tel" value="<?=$Telefoon?>" pattern="[0-9]{10}" />
                        <hr>
                        <input type="hidden" value="true" name="UpdateUserInfo">
                        <input type="hidden" value="<?=$id?>" name="ID">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
          </div>
    </div>
</div>