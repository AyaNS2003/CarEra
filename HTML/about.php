<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CarERA | About</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="../images/logo.png">
    <!--bootstrap CDN-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!--font awsome CDN-->
    <script src="https://kit.fontawesome.com/f77f0e307d.js" crossorigin="anonymous"></script>
    <!--Style sheet-->
    <link rel="stylesheet" href="../CSS/about.css">

    <!--AOS-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" />
    <script>
        AOS.init();
    </script>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Exo+2:ital,wght@0,100..900;1,100..900&display=swap');
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg " style="background-color: #000000; position: fixed; width: 90%; z-index: 1; border-radius: 50px; margin-left: 5%; margin-top: 1%;">
    <div class="container-fluid">
        <img class="img-fluid" src="../images/logo.png" height="45px" width="45px" style="margin-left: 5%;">
        <a class="navbar-brand fw-bold" href="main-page" style="color: white; margin-left: 0; font-family: 'Exo 2';">CarERA</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" style ="color: white;">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent" style="float: right; ">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link fake" href="#" style = "color:black;">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="../index.php" style = "color: white; ">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="vehicles.php" style = "color: white;">Vehicles </a>
                </li>
                <li class="nav-item dropdown">
                    <button class="btn btn-secondary dropdown-toggle bg-black  border-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Services
                    </button>
                    <ul class="dropdown-menu dropdown-menu-dark">
                        <li><a class="dropdown-item active" href="Services.php">Get Your Car</a></li>
                        <li><a class="dropdown-item" href="Services.php">Book a Test Drive</a></li>
                        <li><a class="dropdown-item" href="Services.php">Maintenance</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="Services.php">Special offers... </a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.html" style = "color: white;">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../index.php#locationMap" style = "color: white;">Contact Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link adminButtons" id="adminButtons1" href="users.php" style = "color: white;">Users Info</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link adminButtons" id="adminButtons2" href="Statics.php" style = "color: white;">Statistics</a>
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
            <form class="d-flex" role="search">
                <input class="form-control me-2 " type="search" placeholder="Search" aria-label="Search" style="opacity:40%; border-radius: 40px">
                <button class="btn btn-outline-secondary search-btn" type="button" style="border-radius: 25px;">Search</button>
            </form>
        </div>
    </div>
</nav>
<!--first view-->
<div >
    <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active" data-bs-interval="500">
            <img src="../images/1.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption text-light d-none d-md-block">
                <h3><img src="../images/logo.png">CarERA</h3>
                <p>At CarERA, we work hard to provide our customers with the very best vehicles and exceptional service they can rely on.</p>
              </div>
          </div>
          <div class="carousel-item" data-bs-interval="250">
            <img src="../images/2.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption text-light d-none d-md-block">
                <h3><img src="../images/logo.png">CarERA</h3>
                <p>At CarERA, we work hard to provide our customers with the very best vehicles and exceptional service they can rely on.</p>
              </div>
          </div>
          <div class="carousel-item">
            <img src="../images/3.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption text-light d-none d-md-block">
                <h3><img src="../images/logo.png">CarERA</h3>
                <p>At CarERA, we work hard to provide our customers with the very best vehicles and exceptional service they can rely on.</p>
              </div>
          </div>
        </div>
      </div>
</div>
<div style="position: relative; width: 90%; margin: 5%;">
    <!--who we are-->
    <div class="container-fluid d-flex flex-wrap content" id="whoWeAre" >
        <img class="img-fluid col" src="../images/LexuryCars.jpeg" data-aos="fade-right" data-aos-duration="3000" width="300px" style="border-radius: 50px;">
        <div class="container-fluid text-light col justify-content-center align-self-center" data-aos="fade-left" data-aos-duration="3000" id="whoWeAreTXT">
            <h3>Who we are?</h3>
            <p>CarERA is a play den for car enthusiasts, dealing in high-end luxury cars, from the classics of yesteryear to the demos and concepts of the future. With more than 30 years of combined experience in the Gulf market, the co-founder of CarERA invites you to come down to the showroom and take a look at the CarERA showroom collection of cars; you will never cease to be amazed.</p>
            <br>
            <p>We strongly believe that we have one of the most professional, experienced, knowledgeable, and friendly staffs in the industry. We are not in the business of having one-time customers and instead work to ensure our first contact with you is the start of a long-lasting relationship. In Tubas’s luxury car market, this could not be achieved without maintaining the high standards that we set for ourselves from the beginning.</p>
        </div>
    </div>

    <!--vision of reality-->
    <div class="container-fluid d-flex flex-wrap-reverse content" id="visionToReality">
        <div class="container-fluid text-light col justify-content-center align-self-center" data-aos="fade-right" data-aos-duration="3000" id="visionToRealityTXT">
            <h3>Vision to reality</h3>
            <p>In 1988, the concept of CarERA began taking shape and immediately it became clear that the transition of vision to reality is no walk in the park.</p>
            <br>
        </div>
        <img class="img-fluid col" src="../images/oldShowroom.jpg" data-aos="fade-left" data-aos-duration="3000" width="500px" style="border-radius: 50px;">
    </div>

    <!--showroom lunch-->
    <div class="container-fluid d-flex flex-wrap content" id="showRoomLunch" >
        <img class="img-fluid col" src="../images/showRoom.jpg" data-aos="fade-right" data-aos-duration="3000" style="border-radius: 50px; width: 300px;">
        <div class="container-fluid text-light col justify-content-center align-self-center" data-aos="fade-left" data-aos-duration="3000" id="showRoomLunchTXT">
            <h3>Showroom Lunch</h3>
            <p>Finally opening the showroom doors in the summer of 2017, CV AUTOMOBILE has already proven to be amongst the best in Customer Service and supplying Quality Vehicles to a loyal and new customer base.</p>
            <br>
        </div>
    </div>
</div>

<div class="text-center p-3" style="background-color: rgb(10, 10, 10); color:white;">
    <a class="text-bg-darks" style=" color:white; text-decoration: none;"> &copy; 2024 CarERA. All rights reserved</a>
</div>

<!--AOS-->
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script>
    AOS.init();
</script>
</body>