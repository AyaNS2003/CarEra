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
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <!--font awsome CDN-->
    <script src="https://kit.fontawesome.com/f77f0e307d.js" crossorigin="anonymous"></script>
    <!--Style sheet-->
    <link rel="stylesheet" href="../CSS/statics.css">
</head>
<body>
<!--navbar-->
<nav class="navbar navbar-expand-lg " style="background-color: #000000; position: fixed; width: 90%; z-index: 10; border-radius: 35px; margin: 1% 5%">
    <div class="container-fluid">
        <img class="img-fluid" src="../images/logo.png" height="45px" width="45px" style="margin-left: 5%;">
        <a class="navbar-brand fw-bold" href="../index.php" style="color: white; margin-left: 0; font-family: 'Exo 2';">CarERA</a>
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
                        <li><a class="dropdown-item active" href="Services.php#fill-tabpanel-1">Get Your Car</a></li>
                        <li><a class="dropdown-item" href="Services.php#fill-tabpanel-1">Book a Test Drive</a></li>
                        <li><a class="dropdown-item" href="Services.php#fill-tabpanel-1">Maintenance</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Special offers... </a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.php" style = "color: white;">About</a>
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
                }
                else
                {
                    echo "<script>document.getElementById('adminButtons1').style.display = 'none' </script>";
                    echo "<script>document.getElementById('adminButtons2').style.display = 'none' </script>";
                }
                ?>
            </ul>
            <div id="loginSection">
                <a href="LoginPage.php" id="loginLogo"><i class="fa-regular fa-circle-user" style="margin-left:  7px; font-size: 36px; color: rgb(201, 201, 201); font-weight: lighter;"></i></a>
                <a href="logOut.php" id="logOutbtn"><i class="fa-solid fa-arrow-right-from-bracket" style="color: #dcdcdc; margin-left:7px; font-size: 28px"></i></a>

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
<br>
<br>
<br>
<main >
    <h2 style="color: white;">Incomes and outcomes  </h2>

    <div id="bar-chart"></div>
    <br>
    <br>
    <h5 style="color: white">Share price Over Time</h5>
    <div id="line-chart"></div>
    <br>
    <br>
    <br>
    <br>
    <h5 style="color: white">Buy Times </h5>
    <div id="pie-chart"></div>

</main>
</div>
<div class="text-center p-3" style="background-color: rgb(10, 10, 10); color:white;">
    <a class="text-bg-darks" style=" color:white; text-decoration: none;"> &copy; 2024 CarERA. All rights reserved</a>
</div>
<script src="../JS/statics.js"></script>
</body>
</html>