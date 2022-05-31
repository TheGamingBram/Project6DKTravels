<?php 
        include("./Assets/config.php"); //connection to database and some test functions
        include("./Assets/header.php"); //insert to bootstrap and other java scripts

        $randomgen = rand(0, 100);

        $username = $password = $telephone = $email = "";
        $username_err = $password_err = $tel_err = $email_err = "";

        if($_SERVER["REQUEST_METHOD"] == "POST"){
            if($_POST['submitval'] == "Registreer"){

                if(empty(trim($_POST["Username"]))){
                    $username_err = "Vul aub een naam in";
                }elseif(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["Username"]))){
                    $username_err = "Namen kunnen alleen maar bestaan uit letters, cijfers!";
                }else{
                    $username = trim($_POST["Username"]);
                }

                if(empty(trim($_POST["Email"]))){
                    $email_err = "Please enter a email.";
                } else{
                    // Prepare a select statement
                    $sql = "SELECT id FROM users WHERE email = ?";
                    
                    if($stmt = mysqli_prepare($link, $sql)){
                        // Bind variables to the prepared statement as parameters
                        mysqli_stmt_bind_param($stmt, "s", $param_email);
                        
                        // Set parameters
                        $param_email = trim($_POST["Email"]);
                        
                        // Attempt to execute the prepared statement
                        if(mysqli_stmt_execute($stmt)){
                            /* store result */
                            mysqli_stmt_store_result($stmt);
                            
                            if(mysqli_stmt_num_rows($stmt) == 1){
                                $email_err = "This email is already taken.";
                            } else{
                                $email = trim($_POST["Email"]);
                            }
                        } else{
                            $email_err = "Oops! Something went wrong. Please try again later.";
                        }
            
                        // Close statement
                        mysqli_stmt_close($stmt);
                    }
                }

                if(empty(trim($_POST["Password"]))){
                    $password_err = "Please enter a password.";     
                } elseif(strlen(trim($_POST["Password"])) < 6){
                    $password_err = "Password must have atleast 6 characters.";
                } else{
                    $password = trim($_POST["Password"]);
                }

                if(empty(trim($_POST["phone"]))){
                    $tel_err = "Please enter a phone number.";
                }else{
                    $telephone = trim($_POST["phone"]);
                }

                if(empty($username_err) && empty($password_err) && empty($tel_err) && empty($email_err)){
                    
                    $sql = "INSERT INTO klanten (Naam, Email, Telefoon, Wachtwoord) VALUES (?, ?, ?, ?)";

                    if($stmt = mysqli_prepare($link, $sql)){
                        mysqli_stmt_bind_param($stmt, "ssss", $param_username, $param_email, $param_tel, $param_password);

                        $param_username = $username;
                        $param_email = $email;
                        $param_tel = $telephone;
                        $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash

                        // Attempt to execute the prepared statement
                        if(mysqli_stmt_execute($stmt)){
                            // Redirect to login page
                            header("location: index.php");
                        } else{
                            PHP_Allert("Oops! Something went wrong. Please try again later.");
                        }

                        // Close statement
                        mysqli_stmt_close($stmt);
                    }

                }else{
                    if(!empty($username_err)){
                        PHP_Allert($username_err);
                    }
                    if(!empty($password_err)){
                        PHP_Allert($password_err);
                    }
                    if(!empty($tel_err)){
                        PHP_Allert($tel_err);
                    }
                    if(!empty($email_err)){
                        PHP_Allert($email_err);
                    }
                }

            }
            elseif ($_POST['submitval'] == "inloggen") {
                
            }else{
                PHP_Allert("how did you get here?");
            }
            
            
        }

?>

<head>
    <link rel="stylesheet" href="./Assets/Css/app.min.css"> 
    <link rel="stylesheet" href="./Assets/Css/Login.css">
</head>
<body class="">

        <!-- NAVBAR START -->
        <nav class="navbar navbar-expand-lg py-lg-3 navbar-dark">
            <div class="container">

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="mdi mdi-menu"></i>
                </button>

                <!-- menus -->
                <div class="collapse navbar-collapse" id="navbarNavDropdown">

                    <!-- left menu -->
                    <ul class="navbar-nav me-auto align-items-center">
                        <li class="nav-item mx-lg-1">
                            <a class="nav-link active" href="">Home</a>
                        </li>
                        <li class="nav-item mx-lg-1">
                            <a class="nav-link" style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#exampleModal">Login / Registreren</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- NAVBAR END -->

        <!-- START HERO -->
        <section class="hero-section">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-5">
                        <div class="mt-md-4">
                                <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
                                        <div class="carousel-inner">
                                          <div class="carousel-item active" data-bs-interval="10000">
                                            <img src="Assets/Img/rotate1.png" class="d-block w-100 ImageCarosel " alt="">
                                          </div>
                                          <div class="carousel-item" data-bs-interval="2000">
                                            <img src="Assets/Img/rotate2.png" class="d-block w-100 ImageCarosel" alt="">
                                          </div>
                                          <div class="carousel-item">
                                            <img src="Assets/Img/rotate3.png" class="d-block w-100 ImageCarosel" alt="">
                                          </div>
                                          <div class="carousel-item">
                                            <img src="Assets/Img/rotate4.png" class="d-block w-100 ImageCarosel" alt="">
                                          </div>
                                          <div class="carousel-item">
                                            <img src="Assets/Img/rotate5.png" class="d-block w-100 ImageCarosel" alt="">
                                          </div>
                                            <?php 
                                                if($randomgen == "69"){
                                                    echo '
                                                    <div class="carousel-item">
                                                        <img src="https://c.tenor.com/x8v1oNUOmg4AAAAd/rickroll-roll.gif" class="d-block w-100 ImageCarosel" alt="">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img src="https://c.tenor.com/_i3mzMaGZh8AAAAC/quandale-quandale-dingle.gif" class="d-block w-100 ImageCarosel" alt="">
                                                    </div>
                                                    ';
                                                }
                                            ?>
                                        </div>
                                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                          <span class="visually-hidden">Previous</span>
                                        </button>
                                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                          <span class="visually-hidden">Next</span>
                                        </button>
                                      </div>
                        </div>
                    </div>
                    <div class="col-md-5 offset-md-2">
                        <div class="text-md-end mt-3 mt-md-0">
                            <img src="Assets/Img/Logo.png" alt="" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- END HERO -->

        <!-- START SERVICES -->
        <section class="py-5">
            <div class="container">
                <div class="row py-4">
                    <div class="col-lg-12">
                        <div class="text-center">
                            <h1 class="mt-0"><i class="mdi mdi-infinity"></i></h1>
                            <h3>Welkom bij <span class="text-primary">Donkey Travels</span>!</h3>
                            <p class="text-muted mt-2">The clean and well commented code allows easy customization of the
                                theme.It's designed for
                                <br>describing your app, agency or business.</p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="text-center p-2 p-sm-3">
                            <div class="avatar-sm m-auto">
                                <span class="avatar-title bg-primary-lighten rounded-circle">
                                    <i class="uil uil-desktop text-primary font-24"></i>
                                </span>
                            </div>
                            <h4 class="mt-3">Responsive Layouts</h4>
                            <p class="text-muted mt-2 mb-0">Et harum quidem rerum as expedita distinctio nam libero tempore
                                cum soluta nobis est cumque quo.
                            </p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="text-center p-2 p-sm-3">
                            <div class="avatar-sm m-auto">
                                <span class="avatar-title bg-primary-lighten rounded-circle">
                                    <i class="uil uil-vector-square text-primary font-24"></i>
                                </span>
                            </div>
                            <h4 class="mt-3">Based on Bootstrap UI</h4>
                            <p class="text-muted mt-2 mb-0">Temporibus autem quibusdam et aut officiis necessitatibus saepe
                                eveniet ut sit et recusandae.
                            </p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="text-center p-2 p-sm-3">
                            <div class="avatar-sm m-auto">
                                <span class="avatar-title bg-primary-lighten rounded-circle">
                                    <i class="uil uil-presentation text-primary font-24"></i>
                                </span>
                            </div>
                            <h4 class="mt-3">Creative Design</h4>
                            <p class="text-muted mt-2 mb-0">Nam libero tempore, cum soluta a est eligendi minus id quod
                                maxime placeate facere assumenda est.
                            </p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="text-center p-2 p-sm-3">
                            <div class="avatar-sm m-auto">
                                <span class="avatar-title bg-primary-lighten rounded-circle">
                                    <i class="uil uil-apps text-primary font-24"></i>
                                </span>
                            </div>
                            <h4 class="mt-3">Multiple Applications</h4>
                            <p class="text-muted mt-2 mb-0">Et harum quidem rerum as expedita distinctio nam libero tempore
                                cum soluta nobis est cumque quo.
                            </p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="text-center p-2 p-sm-3">
                            <div class="avatar-sm m-auto">
                                <span class="avatar-title bg-primary-lighten rounded-circle">
                                    <i class="uil uil-shopping-cart-alt text-primary font-24"></i>
                                </span>
                            </div>
                            <h4 class="mt-3">Ecommerce Pages</h4>
                            <p class="text-muted mt-2 mb-0">Temporibus autem quibusdam et aut officiis necessitatibus saepe
                                eveniet ut sit et recusandae.
                            </p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="text-center p-2 p-sm-3">
                            <div class="avatar-sm m-auto">
                                <span class="avatar-title bg-primary-lighten rounded-circle">
                                    <i class="uil uil-grids text-primary font-24"></i>
                                </span>
                            </div>
                            <h4 class="mt-3">Multiple Layouts</h4>
                            <p class="text-muted mt-2 mb-0">Nam libero tempore, cum soluta a est eligendi minus id quod
                                maxime placeate facere assumenda est. <p style="color: white;">Try to get the randomizer to 69, Rn it is: <?= $randomgen ?></p>
                            </p>
                        </div>
                    </div>

                    <?php 
                    if($_SERVER["REQUEST_METHOD"] == "POST"){
                        if ($_POST['Username'] == "sus" || $_POST['Username'] == "Imposter" || $_POST['Username'] == "Gay") {
                            
                            echo '
                                <div class="col-lg-4 col-md-6">
                                    <div class="text-center p-2 p-sm-3">
                                        <div class="avatar-sm m-auto">
                                            <span class="avatar-title bg-primary-lighten rounded-circle">
                                                <i class="uil uil-grids text-primary font-24"></i>
                                            </span>
                                        </div>
                                        ';
                                        printamongus();
                                        echo '
                                    </div>
                                </div>';
                        }
                    }

                    if($randomgen == "69"){
                        echo '
                        <div class="col-lg-4 col-md-6">
                            <div class="text-center p-2 p-sm-3">
                                <div class="avatar-sm m-auto">
                                    <span class="avatar-title bg-primary-lighten rounded-circle">
                                        <i class="uil uil-grids text-primary font-24"></i>
                                    </span>
                                </div>
                                <h4 class="mt-3">Bee Movie</h4>
                                <p class="text-muted mt-2 mb-0">
                                ';
                                $content = file_get_contents('https://gist.githubusercontent.com/MattIPv4/045239bc27b16b2bcf7a3a9a4648c08a/raw/2411e31293a35f3e565f61e7490a806d4720ea7e/bee%2520movie%2520script');
                                echo $content;
                                echo'
                                </p>
                            </div>
                        </div>
                        ';
                    }
                    ?>
                </div>

            </div>
        </section>
        <!-- END SERVICES -->

        



        <!-- START FOOTER -->
        <footer class="bg-dark py-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <img src="./Assets/Img/Logo.png" alt="" class="logo-dark" height="50">
                        <p class="text-muted  text-center">© 2022 - <script>document.write(new Date().getFullYear())</script> Donky Travels.</p>
                    </div>
                </div>

                
            </div>
        </footer>
        <!-- END FOOTER -->

        <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Launch demo modal
          </button> -->
          
          <!-- Login / Registreer Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="login-container" id="LoginContainer">
                    <div id="Login-Cont" style="display: block;">
                        <form action="" method="post" class="form-login">
                            <ul class="login-nav">
                                <li class="login-nav__item active" id="LOGIN_LI">
                                    <a href="#" onclick="ToggleLogin()">Login</a>
                                </li>
                                <li class="login-nav__item" id="REGIST_LI">
                                    <a href="#" onclick="ToggleRegist()">Registreren</a>
                                </li>
                            </ul>
                            <label for="login-input-user" class="login__label">Gebruikers Naam</label>
                            <input id="login-input-user" required name="Username" class="login__input" type="text" />

                            <label for="login-input-password" class="login__label">Password</label>
                            <input id="login-input-password" required name="Password" class="login__input" type="password" />
                            <input type="hidden" name="submitval" value="inloggen" />
                            <button type="submit" class="login__submit">Sign in</button>
                        </form>
                    </div>
                    <div id="Regist-Cont" style="display: none;">
                        <form action="" method="post" class="form-login">
                            <ul class="login-nav">
                                <li class="login-nav__item" id="LOGIN_LI">
                                    <a href="#" onclick="ToggleLogin()">Login</a>
                                </li>
                                <li class="login-nav__item active" id="REGIST_LI">
                                    <a href="#" onclick="ToggleRegist()">Registreren</a>
                                </li>
                            </ul>
                            <label for="login-input-user" class="login__label">Naam</label>
                            <input id="login-input-user" required name="Username" class="login__input" type="text" />

                            <label for="login-input-user" class="login__label">Email</label>
                            <input id="login-input-user" required name="Email" class="login__input" type="email" />

                            <label for="login-input-user" class="login__label">Telefoonnummer</label>
                            <input id="login-input-user" required name="phone" class="login__input" type="tel" pattern="[0-9]{10}" />

                            <label for="login-input-password" class="login__label">Password</label>
                            <input id="login-input-password" required name="Password" class="login__input" type="password" />
                            <input type="hidden" name="submitval" value="Registreer" />
                            <button type="submit" class="login__submit">Registreren</button>
                        </form>
                    </div>
                </div>
              </div>
            </div>
          </div>

        
</body>

<script>

    function ToggleLogin() {
        var DIV_Login = document.getElementById("Login-Cont");
        var DIV_Regist = document.getElementById("Regist-Cont");

        DIV_Login.style.display = "block";
        DIV_Regist.style.display = "none";
    }
    function ToggleRegist() {
        var DIV_Login = document.getElementById("Login-Cont");
        var DIV_Regist = document.getElementById("Regist-Cont");

        DIV_Login.style.display = "none";
        DIV_Regist.style.display = "block";
    }

</script>