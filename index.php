<?php
    session_start();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CarEra</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="images/logo.png">
    <!--bootstrap CDN-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!--font awsome CDN-->
    <script src="https://kit.fontawesome.com/f77f0e307d.js" crossorigin="anonymous"></script>
    <!--Style sheet-->
    <link rel="stylesheet" href="CSS/style.css">
</head>
<body id="main-page">
        <nav class="navbar navbar-expand-lg " style="background-color: #000000; position: fixed; width: 90%; z-index: 1;">
            <div class="container-fluid">
                <img class="img-fluid" src="images/logo.png" height="45px" width="45px" style="margin-left: 5%;">
                <a class="navbar-brand fw-bold" href="main-page" style="color: white; margin-left: 0;">CarERA</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" style ="color: white;">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent" style="float: right; ">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link fake" href="index.php" style = "color:black;">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="index.php" style = "color: white; ">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="HTML/vehicles.php" style = "color: white;">Vehicles </a>
                        </li>
                        <li class="nav-item dropdown">
                            <button class="btn btn-secondary dropdown-toggle bg-black  border-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Services
                            </button>
                            <ul class="dropdown-menu dropdown-menu-dark">
                                <li><a class="dropdown-item active" href="HTML/Services.php#fill-tabpanel-1">Get Your Car</a></li>
                                <li><a class="dropdown-item" href="HTML/Services.php#fill-tabpanel-1">Book a Test Drive</a></li>
                                <li><a class="dropdown-item" href="HTML/Services.php#fill-tabpanel-1">Maintenance</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="#">Special offers... </a></li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="HTML/about.php" style = "color: white;">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#locationMap" style = "color: white;">Contact Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link adminButtons" id="adminButtons1" href="HTML/users.php" style = "color: white;">Users Info</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link adminButtons" id="adminButtons2" href="HTML/Statics.php" style = "color: white;">Statistics</a>
                        </li>
                        <?php
                        if(isset($_SESSION['userName'])){
                            if(str_contains($_SESSION['userName'],"@admin")) {
                                echo "<script>document.getElementById('adminButtons1').style.display = 'block' </script>";
                                echo "<script>document.getElementById('adminButtons2').style.display = 'block' </script>";
                            }
                            else
                            {
                                echo "<script>document.getElementById('adminButtons1').style.display = 'none' </script>";
                                echo "<script>document.getElementById('adminButtons2').style.display = 'none' </script>";
                            }
                        }
                        else
                        {
                            echo "<script>document.getElementById('adminButtons1').style.display = 'none' </script>";
                            echo "<script>document.getElementById('adminButtons2').style.display = 'none' </script>";
                        }
                        ?>
                    </ul>
                    <div id="loginSection">
                        <a href="HTML/LoginPage.php" id="loginLogo"><i class="fa-regular fa-circle-user" style="margin-right:  7px; font-size: 32px; color: rgb(201, 201, 201); font-weight: lighter;"></i></a>
                        <a href="HTML/logOut.php" id="logOutbtn"><i class="fa-solid fa-arrow-right-from-bracket" style="color: #dcdcdc; margin-right:7px; font-size: 28px"></i></a>

                        <?php
                            if(isset($_SESSION['userName']))
                            {
                                echo "<script>document.getElementById('logOutbtn').style.display = 'block' </script>";
                                echo "<script>document.getElementById('loginLogo').style.display = 'none' </script>";
                            }
                            else
                            {
                                echo "<script>document.getElementById('logOutbtn').style.display = 'none' </script>";
                                echo "<script>document.getElementById('loginLogo').style.display = 'block' </script>";
                            }
                        ?>
                    </div>
                </div>
            </div>
        </nav>

        <!--Videos-->
        

        <div class="container-fluid d-flex justify-content-center align-items-center first-view" >
            <div>
                <img class="img-fluid" src="images/logo.png" width="150px" style="margin-left: 40%;">
                <h2 class="text-light text-wrap">CarERA, Explore the world of cars</h2>
                <video autoplay loop muted id="introVideo">
                    <source src="videos/Untitled video - Made with Clipchamp.mp4">
                </video>
            </div>
        </div>
        <script>
            window.onload = () => { myFunction( ) };
            
            function myFunction( event ) 
            {
             let myvid = document.getElementById("introVideo");
             
             //# if BIGGER THAN the 800 pixels
             if ( screen.width > 1200) { introVideo.src = "videos/Untitled video - Made with Clipchamp.mp4"; }
             
             //# if SMALLER THAN or EQUAL-TO the 800 pixels
             if ( screen.width <= 1200 ) { introVideo.src = "videos/portraitVideo.mp4"; }
             
             //# load URL (for playback)
             myvid.load();
            }
            
        </script>

        <!--animated panels-->
        <div class="container-fluid d-flex align-items-center justify-content-center flex-wrap" style="height: auto; margin-top:50px; width: 90%;">
            <div class="panel active" style="background-image: url(images/vision.jpg);">
                <p>Our vision is to redefine the automotive experience by offering a curated selection of the world’s finest automobile brands under one roof. We envision a future where every driver finds their perfect match.</p>
                <h2>Our vision</h2>
            </div>
            <div class="panel" style="background-image: url(images/modern-car-futuristic-road.jpg);" >
                <p>With our state-of-the-art workshop, talented and experienced team of technicians, and host of manufacturer-approved parts and accessories, we are able to help keep your vehicle running at its best for longer.</p>
                <h2>Our services</h2>
            </div>
            <div class="panel" style="background-image: url(images/testDrive.jpg);">
                <a class="btn btn-outline-light" style="width: 20%; border-radius: 50px;" href="HTML/Services.php">Read More</a>
                <p>Now is the time to book a test drive and experience life behind the wheel. There’s no better way to really get to know if a vehicle is right for you than by taking it for a spin.</p>
                <h2>Have a test drive</h2>
            </div>
            <div class="panel" style="background-image: url(images/visionCar.png);">
                <a class="btn btn-outline-light" style="width: 20%; border-radius: 50px;" href="HTML/vehicles.php">See More</a>
                <p>A place where you can find New and limited editions from different companies</p>
                <h2>Up-To-Date models</h2>
            </div>
            
        </div>
        <script src="JS/main.js"></script>

        <!--our partners-->
        <div class="container-fluid d-flex text-light partners">
            <div class="container-fluid d-flex flex-wrap partners-content">
                <div style="padding: 50px;">
                    <h2>Our partners</h2>
                    <p>The whole world cars experience gathered in one place</p>
                    <p>A grand automotive congress, where every car shares its tale of the open road.</p>
                </div>
    
                <div class="container-fluid col" >
                    <table >
                        <tr>
                            <td><img src="images/carsLogo/mercedesLogo.png" class="img-fluid" width="200px" style="padding: 15px;" ></td>
                            <td><img src="images/carsLogo/bmwLogo.png" class="img-fluid" width="200px" style="padding: 15px;" ></td>
                            <td><img src="images/carsLogo/skodaLogo.png" class="img-fluid" width="200px" style="padding: 15px;" ></td>
                        </tr>
                        <tr>
                            <td><img src="images/carsLogo/citroenLogo.png" class="img-fluid" width="200px" style="padding: 15px;" ></td>
                            <td><img src="images/carsLogo/hyundaiLogo.png" class="img-fluid" width="200px" style="padding: 15px;" ></td>
                            <td><img src="images/carsLogo/kiaLogo.png" class="img-fluid" width="200px" style="padding: 15px;" ></td>
                        </tr>
                    </table>
                </div> <!--end of table div-->
            </div>
        </div>

        <!--in numbers-->
        <div class="container-fluid d-flex flex-wrap inNumbers justify-content-center" style="background-image: url(images/istockphoto-1407818511-2048x2048.jpg)">
            <div class="text-light inNumbers-content">
                <h1 class="text-center">CarERA in Numbers</h1>
                <div class="container-fluid d-flex justify-content-center flex-wrap" >
                    <div class="inNumber-item">
                        <i class="fa-solid fa-user-tie text-center inNumbersIcon"></i>
                        <h4 class="text-center" id="empNum">200</h4>
                        <h5 class="text-center">EMPLOYEE</h5>
                    </div>
                    <div class="inNumber-item">
                        <i class="fa-solid fa-users-line inNumbersIcon"></i>
                        <h4 class="text-center" id="teams">7</h4>
                        <h5 class="text-center">CORE TEAMS</h5>
                    </div>
                    <div class="inNumber-item">
                        <i class="fa-solid fa-hand-holding-dollar inNumbersIcon"></i>
                        <h4 class="text-center " id="capital">200,000</h4>
                        <h5 class="text-center">CAPITAL</h5>
                    </div>
                    <div class="inNumber-item">
                        <i class="fa-regular fa-handshake inNumbersIcon"></i>
                        <h4 class="text-center" id="customer">3620</h4>
                        <h5 class="text-center">CUSTOMER</h5>
                    </div>
                    
                </div>
            </div>
        </div>
        <!-- Map AS AFOOTER -->
        <div style="height: 50vh; width: 100%" id="locationMap">
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d14565.709704187067!2d35.382288634912065!3d32.32513037573407!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sar!2s!4v1716392377643!5m2!1sar!2s"
                    width="100%" height="100%" style="border:0; filter: invert(100%); "
                    allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>

        <!-- Footer -->
        <footer class=" text-center bg-light" style="width: 100%">
            <!-- Grid container -->
            <div class="container p-4 text-sm-center ">

                <!-- Section: Social media -->
                <section class="mb-4">
                    <!-- Facebook -->
                    <a class="btn btn-primary btn-floating m-1" style="background-color: #3b5998" href="#!" role="button"><i class="fab fa-facebook-f"></i></a>

                    <!-- Twitter -->
                    <a class="btn btn-primary btn-floating m-1" style="background-color: #55acee" href="#!" role="button"><i class="fab fa-twitter"></i></a>

                    <!-- Google -->
                    <a class="btn btn-primary btn-floating m-1" style="background-color: #dd4b39" href="#!" role="button"><i class="fab fa-google"></i></a>

                    <!-- Instagram -->
                    <a class="btn btn-primary btn-floating m-1" style="background-color: #ac2bac" href="#!" role="button"><i class="fab fa-instagram"></i></a>

                    <!-- Linkedin -->
                    <a class="btn btn-primary btn-floating m-1" style="background-color: #0082ca" href="#!" role="button"><i class="fab fa-linkedin-in"></i></a>
                    <!-- Github -->
                    <a class="btn btn-primary btn-floating m-1" style="background-color: #333333" href="#!" role="button"><i class="fab fa-github"></i></a>
                </section>
                <!-- Section: Social media -->


                <!-- Section: Form -->
                <section class="">
                    <form action="">
                        <!--Grid row-->
                        <div class="row d-flex justify-content-center">
                            <!--Grid column-->
                            <div class="col-auto">
                                <p class="pt-2">
                                    <strong>Sign up to get in touch </strong>
                                </p>
                            </div>
                            <!--Grid column-->

                            <!--Grid column-->
                            <div class="col-md-5 col-12">
                                <!-- Email input -->
                                <div class="form-outline mb-4">
                                    <input type="email" id="form5Example2" class="form-control " placeholder="Email address" />

                                </div>
                            </div>
                            <!--Grid column-->

                            <!--Grid column-->
                            <div class="col-auto">

                                <!-- Submit button -->
                                <button type="submit" class="btn btn-primary mb-4">
                                    Subscribe
                                </button>
                            </div>
                            <!--Grid column-->
                        </div>
                        <!--Grid row-->
                    </form>
                </section>
                <!-- Section: Form -->


                <!-- Section: Text -->
                <section class="mb-4">
                    <p>
                        Get updates on fun stuff you probably want to know about Cars world !!
                    </p>
                </section>
                <!-- Section: Text -->


                <!-- Section: Links -->
                <section class="mb-4">
                    <!--Grid row-->
                    <div class="row">
                        <!--Grid column-->
                        <div class="col-lg-3 col-md-6 mb-4 mb-md-0" >
                            <h5 class="text-uppercase">Menu</h5>

                            <ul class="list-unstyled mb-0">
                                <li>
                                    <a href="#!" class="text-dark">Home
                                    </a>
                                </li>
                                <li>
                                    <a href="#!" class="text-dark">Services</a>
                                </li>
                                <li>
                                    <a href="#!" class="text-dark">About Us</a>
                                </li>
                                <li>
                                    <a href="#!" class="text-dark">Careers</a>
                                </li>

                                </li>
                            </ul>
                        </div>
                        <!--Grid column-->

                        <!--Grid column-->
                        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                            <h5 class="text-uppercase"> Partnerships </h5>
                            <ul class="list-unstyled mb-0">
                                <li>
                                    <a href="#!" class="text-dark">Mercedes-Benz</a>
                                </li>
                                <li>
                                    <a href="#!" class="text-dark">BMW</a>
                                </li>
                                <li>
                                    <a href="#!" class="text-dark">Ferrari</a>
                                </li>
                                <li>
                                    <a href="#!" class="text-dark">KIA</a>
                                </li>
                            </ul>

                        </div>
                        <!--Grid column-->

                        <!--Grid column-->
                        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                            <h5 class="text-uppercase">Support</h5>
                            <ul class="list-unstyled mb-0">
                                <li>
                                    <a href="#!" class="text-dark">Shipping & Returns</a>
                                </li>
                                <li>
                                    <a href="#!" class="text-dark">Help & FAQ</a>
                                </li>
                                <li>
                                    <a href="#!" class="text-dark">Terms & Conditions</a>
                                </li>
                                <li>
                                    <a href="#!" class="text-dark">Privacy Policy</a>
                                </li>
                            </ul>

                        </div>
                        <!--Grid column-->

                        <!--Grid column-->
                        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                            <h5 class="text-uppercase"> Complains </h5>
                            <ul class="list-unstyled mb-0">
                                <li>
                                    <a href="#!" class="text-dark">Any Suggestions </a>
                                </li>
                                <li>
                                    <a href="#!" class="text-dark"> Why CarEra</a>
                                </li>

                            </ul>

                        </div>
                        <!--Grid column-->
                    </div>
                    <!--Grid row-->
                </section>
                <!-- Section: Links -->

            </div>
            <!-- Grid container -->

            <!-- Copyright -->
            <div class="text-center p-3" style="background-color: rgb(0, 0, 0); color:white;">
                <a class="text-bg-darks" style=" color:white;"> &copy; 2024 CarERA. All rights reserved</a>
            </div>
            <!-- Copyright -->

        </footer>
        <!-- Footer -->
</body>
</html>