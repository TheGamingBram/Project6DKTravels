<?php
    $PageName = "Admin Panel";
    include("PAGE_FRAMEWORK.php"); //connection to database and some test functions

    if($_SESSION['Email'] != "Admin@donkeytravel.nl"){
        header("location: portal.php");
        exit;
    }
?>
<div class="card">
  <div class="card-body">
    <h5 class="card-title">Users</h5>
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
                            <form action="adminbewerken.php" method="post">
                                <input type="hidden" name="edit_ID" value="<?php echo $row['ID'] ?>">
                                <button type="sumbit" name="edit_btn" class="btn btn-primary"> Bewerken</button>
                            </form>
                            <form action="admincode.php" method="post">
                            <input type="hidden" name="delete_ID" value="<?php echo $row['ID']?>">
                            <button type="sumbit" name="delete_btn" class="btn btn-danger"> Verwijderen</button>
                            </form>
                        </td>
                    </tr>
                    <?php
                }
            ?>
        </tbody>
    </table>
  </div>
</div>

<script>
    $(document).ready( function () {
        $('#user_table').DataTable();
    } );
</script>