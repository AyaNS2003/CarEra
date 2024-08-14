<?php
    session_start();

    $doors = 0;
    $fuel_type = 0;
    $gears = 0;
    $max_power = 0;
    $model = 0;
    $price = 0;
    $qty = 0;
    $seats = 0;
    $transmission = 0;
    $imgPath = 0;


    if (isset($_POST['moreInfoBTN']))
    {
        $model = $_POST['model'];
        $db = new mysqli('localhost','root','','webProj');
        if ($db->connect_error)
            echo "Connection failed: " . $db->connect_error;
        else
        {
            $selectQry = "SELECT * FROM `car` WHERE model = '$model'";
            $result = mysqli_query($db,$selectQry);

            $row = $result->fetch_row();

            $cylinder = $row[0];
            $doors = $row[1];
            $fuel_type = $row[2];
            $gears = $row[3];
            $max_power = $row[4];
            $model = $row[5];
            $price = $row[6];
            $qty = $row[7];
            $seats = $row[8];
            $transmission = $row[9];
            $car_type = $row[10];
            $imgPath = $row[11];
        }
    }
    else{
        header("location:vehicles.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CarERA | Vehicles</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="../images/logo.png">
    <!--bootstrap CDN-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!--font awsome CDN-->
    <script src="https://kit.fontawesome.com/f77f0e307d.js" crossorigin="anonymous"></script>

    <!--AOS-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" />

    <!--Style sheet-->
    <link rel="stylesheet" href="../CSS/vehiclesStyle.css">

    <style>
        tr {
            font-size: 18px;
            border-bottom: #b3b3b3 1px solid;
            margin: 5px;
        }
        td{
            padding-top: 10px;
        }
    </style>
</head>
<body class="bg-black">
<div class="container-fluid d-block">
    <nav class="navbar navbar-expand-lg " style="position: fixed; margin: 10px 5%; z-index: 1;">
        <div class="container-fluid">
            <img class="img-fluid" src="../images/logo.png" height="45px" width="45px" style="margin-left: 5%;">
            <a class="navbar-brand fw-bold" href="main-page" style="color: white; ">CarERA</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" style ="color: white;">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent" style="float: right; ">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link fake" href="javascript: void(0)" style = "color:black;">Home</a>
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
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2 " type="search" placeholder="Search" aria-label="Search" style="opacity:40%; border-radius: 40px">
                    <button class="btn btn-outline-secondary search-btn" type="button">Search</button>
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
                </form>
            </div>
        </div>

    </nav>
    <div class="container-fluid" style="width: 70%; padding-top: 100px">
        <div>
            <div class="container-fluid row" style="width: 100%; height:auto;">
                <h2 class="d-inline text-light col" id="carName"><?php echo $model?></h2>
            </div>
            <div class="container-fluid row">
                <table class="text-light" style="width: 100%; background-color: black;">
                    <tr>
                        <td>Vehicle</td>
                        <?php echo "<td id='model'>".$model."</td>" ?>
                    </tr>
                    <tr>
                        <td>Doors</td>
                        <?php echo "<td id='doors'>".$doors."</td>" ?>
                    </tr>
                    <tr>
                        <td>Seats</td>
                        <?php echo "<td id='doors'>".$seats."</td>" ?>
                    </tr>
                    <tr>
                        <td>Cylinders</td>
                        <?php echo "<td id='Cylinders'>".$cylinder."</td>" ?>
                    </tr>
                    <tr>
                        <td>Gears</td>
                        <?php echo "<td id='speeds'>".$gears."</td>" ?>
                    </tr>
                    <tr>
                        <td>Transmission</td>
                        <?php echo "<td id='Transmission'>".$transmission."</td>" ?>
                    </tr>
                    <tr>
                        <td>Fuel type</td>
                        <?php echo "<td id='Fuel'>".$fuel_type."</td>" ?>
                    </tr>
                    <tr>
                        <td>Max power</td>
                        <?php echo "<td id='power'>".$max_power."</td>" ?>
                    </tr>
                </table>
                <?php echo '<a onclick="openPopUp()"><img src='.$imgPath.' id="info_Img" class="img-fluid"></a>' ?>
            </div>
            <script>
                function openPopUp()
                {
                    window.open('https://www.youtube.com/watch?v=66fkfXwPp2c', 'Kia Sorento', 'height=400, width=600, left=300px, top=200px');
                }
            </script>
            <button class="btn btn-outline-light text-center" style="margin: 25px 25%; width: 50%" onclick="location.href='Services.php'">Have a test drive</button>
        </div>
    </div>
</body>