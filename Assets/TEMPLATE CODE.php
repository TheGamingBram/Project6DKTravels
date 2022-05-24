<!-- TEMPLATE CODE -->

<!-- Registratie Pagina Template -->

<?php 
        if($_SERVER["REQUEST_METHOD"] == "POST"){

            $sql = "INSERT INTO klanten (Naam, Email, Telefoon, Wachtwoord) VALUES (?, ?, ?, ?)";

            if($stmt = mysqli_prepare($link, $sql)){
                mysqli_stmt_bind_param($stmt, "ssss", $param_username, $param_email, $param_Tel, $param_password);

                $param_username = $_POST['username'];
                $param_email = $_POST['email'];
                $param_Tel = $_POST['telefoon'];
                $param_password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Creates a password hash

                if(mysqli_stmt_execute($stmt)){
                    // header("location: index.php");
                } else{
                    echo "Oops! Something went wrong. Please try again later.";
                }

                // Close statement
                mysqli_stmt_close($stmt);
            }

        }
?>

<form action="" method="post" class="form" id="form1">
    <h2 class="form__title">Registreer</h2>
        <input type="text" name="username" placeholder="Gebruiksnaam" class="input" />
        <input type="text" name="telefoon" placeholder="Achternaam" class="input" />
        <input type="email" name="email" placeholder="Email" class="input" />
        <input type="password"  name="password" placeholder="Password" class="input" />
        <input type="submit" value="Aanmelden" class="btn" />
</form>

<!-- END Registratie Pagina Template -->