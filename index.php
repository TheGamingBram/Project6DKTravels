<?php 
        include("./Assets/config.php"); //connection to database and some test functions
        include("./Assets/header.php"); //insert to bootstrap and other java scripts

        prettyprint($_POST);

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
                                maxime placeate facere assumenda est.
                            </p>
                        </div>
                    </div>
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
                    <div id="Login-Cont">
                        <form action="" method="post" class="form-login">
                            <ul class="login-nav">
                                <li class="login-nav__item active" id="LOGIN_LI">
                                    <a href="#">Login</a>
                                </li>
                                <li class="login-nav__item" id="REGIST_LI">
                                    <a href="#">Registreren</a>
                                </li>
                            </ul>
                            <label for="login-input-user" class="login__label">Username</label>
                            <input id="login-input-user" name="Username" class="login__input" type="text" />

                            <label for="login-input-password" class="login__label">Password</label>
                            <input id="login-input-password" name="Password" class="login__input" type="password" />
                            <input type="hidden" name="submitval" value="inloggen" />
                            <button type="submit" class="login__submit">Sign in</button>
                        </form>
                        <a href="#" class="login__forgot">Forgot Password?</a>
                    </div>
                    <div id="Regist-Cont">

                    </div>
                    
                </div>
              </div>
            </div>
          </div>

        
</body>