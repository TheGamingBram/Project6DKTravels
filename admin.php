<?php
$PageName = "Admin Pagina";
include("PAGE_FRAMEWORK.php"); //connection to database and some test functions

$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "donkeytravel";

$con = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

$query = "SELECT * FROM klanten";
$query_run = mysqli_query($con, $query);

?>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin</title>
</head>
<body>

</body>
</html>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Naam</th>
            <th>E-mail</th>
            <th>Gewijzigd</th>
            <th>Bewerken</th>
            <th>Verwijderen</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if(mysqli_num_rows($query_run) > 0)
        {
            while ($row = mysqli_fetch_assoc($query_run)) 
            {
        ?>
        <tr>
            <td><?php echo $row['ID'] ?></td>
            <td><?php echo $row['Naam']?></td>
            <td><?php echo $row['Email']?></td>
            <td><?php echo $row['Telefoon']; ?></td>
            <td><?php echo $row['Wachtwoord']; ?></td>
            <td><?php echo $row['Gewijzigd']; ?></td>
            <td>
                <form action="adminbewerken.php" method="post">
                    <input type="hidden" name="edit_ID" value="<?php echo $row['ID'] ?>">
                    <button type="sumbit" name="edit_btn" class="btn btn-primary"> Bewerken</button>
                </form>
            </td>
            <td>
                <form action="code.php" method="post">
                <input type="hidden" name="delete_ID" value="<?php echo $row['ID']?>">
                <button type="sumbit" name="delete_btn" class="btn btn-danger"> Verwijderen</button>
                </form>
            </td>
        </tr>
        <?php
            }

        }
        else{
            echo "No Record Found";
        }

        ?>  
    </tbody>
</table>
