<?php
session_start();

$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "donkeytravel";

$con = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

if(isset($_POST['updatebtn']))
{
    $ID = $_POST['edit_ID'];
    $name = $_POST['edit_name'];
    $email = $_POST['edit_email'];
    $phone = $_POST['edit_phone'];
    $password = $_POST['edit_password'];

    $query = "UPDATE klanten SET Naam='$name', Email='$email', Telefoon='$phone', Wachtwoord='$password' WHERE ID='$ID' ";

    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['success'] = "Your Data is Updated";
        header('Location: index.php'); 
    }
    else
    {
        $_SESSION['status'] = "Your Data is NOT Updated";
        header('Location: index.php'); 
    }
}



if(isset($_POST['delete_btn']))
{
    $ID = $_POST['delete_ID'];

    $query = "DELETE FROM klanten WHERE ID='$ID' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['success'] = "Your Data is Deleted";
        header('Location: index.php'); 
    }
    else
    {
        $_SESSION['status'] = "Your Data is NOT DELETED";       
        header('Location: index.php'); 
    }    
}
?>