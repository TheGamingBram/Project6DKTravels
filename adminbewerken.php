<?php
    include("PAGE_FRAMEWORK.php"); //connection to database and some test functions
?>
<html>
<head>
    <title>Bewerken</title>
</head>
<body>
        <?php
        $dbServername = "localhost";
        $dbUsername = "root";
        $dbPassword = "";
        $dbName = "donkeytravel";

        $con = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);


        if (isset($_POST['edit_btn']))
        {
            $ID = $_POST['edit_ID'];
        
            $query = "SELECT * FROM klanten WHERE ID='$ID'";
            $query_run = mysqli_query($con, $query);

            foreach ($query_run as $row) 
            {
        ?>

        <form action="admincode.php" method="POST">

        <input type="hidden" name="edit_ID" value="<?php echo $row['ID'] ?>">
        <div class="form-group">
            <label> Naam </label>
            <input type="text" name="edit_name" value="<?php echo $row['Naam']?>" class="form-control"placeholder="Voer in naam">
        </div>
        <div class="form-group">
            <label>E-mail</label>
            <input type="email" name="edit_email" value="<?php echo $row['Email']?>" class="form-control" placeholder="Voer in e-mail">
            </div>
            <div class="form-group">
                <label>Telefoonnummer</label>
                <input type="text" name="edit_phone" value="<?php echo $row['Telefoon']?>" class=" form-control" placeholder="Voer in Adres">
            </div>
            <div class="form-group">
                <label>Wachtwoord</label>
                <input type="text" name="edit_password" value="<?php echo $row['Wachtwoord']?>" class=" form-control" placeholder="Voer in uw nieuwe Wachtwoord">
            </div>
            <br>
                <button type="submit" name="updatebtn" class="btn btn-primary"> Bewerken </button>
                <a href="admin.php" class="btn btn-danger"> Annuleren </a>

                </form>

            <?php
            }
        }
        ?>

</body>
</html>