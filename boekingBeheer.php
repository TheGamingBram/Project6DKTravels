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

.styled-table tbody tr:last-of-type {
    border-bottom: 2px solid #009879;
}
</style>
<?php 
        include("./Assets/config.php"); //connection to database and some test functions
        include("./Assets/header.php"); //insert to bootstrap and other java scripts


        $query = "SELECT * FROM tochten"; //You don't need a ; like you do in SQL
        $result = mysqli_query($link, $query);

        echo "<table class='styled-table'>"; // start a table tag in the HTML
        echo "<tr>
                <th>ID</th>
                <th>Omschrijving</th>
                <th>Route</th>
                <th>Aantaldagen</th>
                <th>update</th>
                <th>delete</th>
        </tr>";
        while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results
                echo "<tr><td>" . $row['ID'] . "</td><td>" . $row['Omschrijving'] . "</td><td>" . $row['Route'] . "</td><td>" .  $row['Aantaldagen'] . "</td><td>" . '<a href="http://localhost/Project6DKTravels/boekingBeheer.php?aktie=wijzigen&id='.$row['ID'].'">Update</a>' . "</td><td>" . '<a href="http://localhost/Project6DKTravels/boekingBeheer.php?aktie=delete&id='.$row['ID'].'">delete</a>'. "</td></tr>";
        }
        echo "</table>";

        if(isset($_POST['update'])) {
                echo "This is Button1 that is selected";
        }

        
