<?php

$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "donkeytravel";

$con = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];

    $query = "INSERT INTO klanten (Naam, Email, Telefoon, Wachtwoord) VALUES ('$name','$email', '$phone','$password')";
    mysqli_query($con, $query);
    header("location: index.php?signup=success");
?>