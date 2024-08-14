<?php
session_start();


    $cylinder = 0;
    $doors = 4;
    $fuel_type = 0;
    $gears = 5;
    $max_power = 0;
    $model = 0;
    $price = 0;
    $qty = 0;
    $seats = 4;
    $transmission = 'automatic';


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

    <script>

    </script>
</head>
<body id="vehiclesPage">
    <!--navbar-->
    <div class="container-fluid d-block">
        <nav class="navbar navbar-expand-lg " style="position: fixed;  z-index: 1;">
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
    </div>
    <div class="container-fluid main-con" style="width: 100%; ">
        <h2 style="color: white" >Our vehicles</h2>


        <!--categories-->
        <div class="container-fluid d-flex justify-content-around flex-wrap category" style="margin-bottom: 30px; width: 100%;">
            <div data-aos="zoom-in-up" data-aos-duration="700" >
                <img src="../images/EV_icon.png">
                <a class="d-block text-center btn" onclick="selectEV()">EV</a>
            </div>
            <div data-aos="zoom-in-up" data-aos-duration="700" >
                <img src="../images/suv_icon.png">
                <a class="d-block text-center btn" onclick="selectSUV()">SUV</a>
            </div>

            <div data-aos="zoom-in-up" data-aos-duration="700" >
                <img src="../images/pick_up_icon.png">
                <a class="d-block text-center btn" onclick="selectTruck()">Truck</a>
            </div>

            <div data-aos="zoom-in-up" data-aos-duration="700" >
                <img src="../images/sedan_icon.png">
                <a class="d-block text-center btn" onclick="selectSedan()">Sedan</a>
            </div>

            <div data-aos="zoom-in-up" data-aos-duration="700" >
                <img src="../images/hybrid_icon.png">
                <a class="d-block text-center btn" onclick="selectHybrid()">Hybrid</a>
            </div>
        </div>

        <div class="d-flex justify-content-between align-self-center">
            <h2 style="color: white">Featured Cars</h2>
            <a class="btn text-light text-end" href="addNewCar.php" id="addCarBTN"><svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
                </svg></a>
            <?php
                if(isset($_SESSION['userName']))
                {
                    echo "<script>alert(".$_SESSION['userName'].")</script>";

                    if (str_contains($_SESSION['userName'], '@admin'))
                    {
                        echo "<script>document.getElementById('addCarBTN').style.display = 'flex'</script>";
                    }
                }
            ?>
        </div>
        <div class="container-fluid d-flex justify-content-start flex-wrap" style="width: 2000px; ">
            <p class="text-center text-light" id="no-available" style=" width: 100%; display: none;">No available cars</p>
        <!--cars cards-->
        <?php
            try{
                $db = new mysqli("localhost", "root", "", "webProj");
                $selectQry = "select * from car order by price desc ";

                $result = $db->query($selectQry);

                for ($i = 0 ;  $i < $result->num_rows ; $i++)
                {
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

                    if($i >= 3)
                    {
                        if ($car_type == 1)
                        {
                            ?>
                            <!--car card-->
                            <form action="carInfo.php" method="post">
                                <div class="card bg-dark text-light collapse multi-collapse hidden-car car EV" id="carDiv">
                                    <?php echo '<img src="'.$imgPath.'" class="card-img-top" alt="..." height="50%">' ?>
                                    <div class="card-body">
                                        <form action="carInfo.php" method="post">
                                            <?php echo '<input type="hidden" name="model" value="'.$model.'">'?>
                                        </form>
                                        <?php echo '<h5 name="model">'.$model.'</h5>'?>
                                        <?php echo '<p class="card-text">'.$price.' $</p>'?>
                                        <button class="btn btn-primary car-info" type="submit" name="moreInfoBTN" id="gClassBTN">Read more</button>
                                    </div>
                                </div>
                            </form>
                            <?php
                        }// car type = 1 -> ev car
                        elseif($car_type == 2)
                        {
                            ?>
                            <!--car card-->
                            <form action="carInfo.php" method="post">
                                <div class="card bg-dark text-light collapse multi-collapse hidden-car car SUV" id="carDiv">
                                    <?php echo '<img src="'.$imgPath.'" class="card-img-top" alt="..." height="50%">' ?>
                                    <div class="card-body">
                                        <form action="carInfo.php" method="post">
                                            <?php echo '<input type="hidden" name="model" value="'.$model.'">'?>
                                        </form>
                                        <?php echo '<h5>'.$model.'</h5>'?>
                                        <?php echo '<p class="card-text">'.$price.' $</p>'?>
                                        <button class="btn btn-primary car-info" type="submit" name="moreInfoBTN" id="gClassBTN">Read more</button>
                                    </div>
                                </div>
                            </form>
                            <?php
                        }// car type = 2 -> suv car
                        elseif($car_type == 3)
                        {
                            ?>
                            <!--car card-->
                            <form action="carInfo.php" method="post">
                                <div class="card bg-dark text-light collapse multi-collapse hidden-car car truck" id="carDiv">
                                    <?php echo '<img src="'.$imgPath.'" class="card-img-top" alt="..." height="50%">' ?>
                                    <div class="card-body">
                                        <form action="carInfo.php" method="post">
                                            <?php echo '<input type="hidden" name="model" value="'.$model.'">'?>
                                        </form>
                                        <?php echo '<h5>'.$model.'</h5>'?>
                                        <?php echo '<p class="card-text">'.$price.' $</p>'?>
                                        <button class="btn btn-primary car-info" type="submit" name="moreInfoBTN" id="gClassBTN">Read more</button>
                                    </div>
                                </div>
                            </form>
                            <?php
                        }// car type = 3 -> truck
                        elseif($car_type == 4)
                        {
                            ?>
                            <!--car card-->
                            <form action="carInfo.php" method="post">
                                <div class="card bg-dark text-light collapse multi-collapse hidden-car car sedan" id="carDiv">
                                    <?php echo '<img src="'.$imgPath.'" class="card-img-top" alt="..." height="50%">' ?>
                                    <div class="card-body">
                                        <form action="carInfo.php" method="post">
                                            <?php echo '<input type="hidden" name="model" value="'.$model.'">'?>
                                        </form>
                                        <?php echo '<h5>'.$model.'</h5>'?>
                                        <?php echo '<p class="card-text">'.$price.' $</p>'?>
                                        <button class="btn btn-primary car-info" type="submit" name="moreInfoBTN" id="gClassBTN">Read more</button>
                                    </div>
                                </div>
                            </form>
                            <?php
                        }// car type = 4 -> sedan
                        elseif($car_type == 5)
                        {
                            ?>
                            <!--car card-->
                            <form action="carInfo.php" method="post">
                                <div class="card bg-dark text-light collapse multi-collapse hidden-car car hybrid" id="carDiv">
                                    <?php echo '<img src="'.$imgPath.'" class="card-img-top" alt="..." height="50%">' ?>
                                    <div class="card-body">
                                        <form action="carInfo.php" method="post">
                                            <?php echo '<input type="hidden" name="model" value="'.$model.'">'?>
                                        </form>
                                        <?php echo '<h5>'.$model.'</h5>'?>
                                        <?php echo '<p class="card-text">'.$price.' $</p>'?>
                                        <button class="btn btn-primary car-info" type="submit" name="moreInfoBTN" id="gClassBTN">Read more</button>
                                    </div>
                                </div>
                            </form>
                            <?php
                        }// car type = 5 ->hybrid
                    }//end of if statements for the hidden cars

                    else
                    {
                        if ($car_type == 1)
                        {
                            ?>
                            <!--car card-->
                            <form action="carInfo.php" method="post">
                                <div class="card bg-dark text-light car EV" id="carDiv">
                                    <?php echo '<img src="'.$imgPath.'" class="card-img-top" alt="..." height="50%">' ?>
                                    <div class="card-body">
                                        <form action="carInfo.php" method="post">
                                            <?php echo '<input type="hidden" name="model" value="'.$model.'">'?>
                                        </form>
                                        <?php echo '<h5>'.$model.'</h5>'?>
                                        <?php echo '<p class="card-text">'.$price.' $</p>'?>
                                        <button class="btn btn-primary car-info" type="submit" name="moreInfoBTN" id="gClassBTN">Read more</button>
                                    </div>
                                </div>
                            </form>
                            <?php
                        }// car type = 1 -> ev car
                        elseif($car_type == 2)
                        {
                            ?>
                            <!--car card-->
                            <form action="carInfo.php" method="post">
                                <div class="card bg-dark text-light car SUV" id="carDiv">
                                    <?php echo '<img src="'.$imgPath.'" class="card-img-top" alt="..." height="50%">' ?>
                                    <div class="card-body">
                                        <form action="carInfo.php" method="post">
                                            <?php echo '<input type="hidden" name="model" value="'.$model.'">'?>
                                        </form>
                                        <?php echo '<h5>'.$model.'</h5>'?>
                                        <?php echo '<p class="card-text">'.$price.' $</p>'?>
                                        <button class="btn btn-primary car-info" type="submit" name="moreInfoBTN" id="gClassBTN">Read more</button>
                                    </div>
                                </div>
                            </form>
                            <?php
                        }// car type = 2 -> suv car
                        elseif($car_type == 3)
                        {
                            ?>
                            <!--car card-->
                            <form action="carInfo.php" method="post">
                                <div class="card bg-dark text-light car truck" id="carDiv">
                                    <?php echo '<img src="'.$imgPath.'" class="card-img-top" alt="..." height="50%">' ?>
                                    <div class="card-body">
                                        <form action="carInfo.php" method="post">
                                            <?php echo '<input type="hidden" name="model" value="'.$model.'">'?>
                                        </form>
                                        <?php echo '<h5>'.$model.'</h5>'?>
                                        <?php echo '<p class="card-text">'.$price.' $</p>'?>
                                        <button class="btn btn-primary car-info" type="submit" name="moreInfoBTN" id="gClassBTN">Read more</button>
                                    </div>
                                </div>
                            </form>
                            <?php
                        }// car type = 3 -> truck
                        elseif($car_type == 4)
                        {
                            ?>
                            <!--car card-->
                            <form action="carInfo.php" method="post">
                                <div class="card bg-dark text-light car sedan" id="carDiv">
                                    <?php echo '<img src="'.$imgPath.'" class="card-img-top" alt="..." height="50%">' ?>
                                    <div class="card-body">
                                        <form action="carInfo.php" method="post">
                                            <?php echo '<input type="hidden" name="model" value="'.$model.'">'?>
                                        </form>
                                        <?php echo '<h5>'.$model.'</h5>'?>
                                        <?php echo '<p class="card-text">'.$price.' $</p>'?>
                                        <button class="btn btn-primary car-info" type="submit" name="moreInfoBTN" id="gClassBTN">Read more</button>
                                    </div>
                                </div>
                            </form>
                            <?php
                        }// car type = 4 -> sedan
                        elseif($car_type == 5)
                        {
                            ?>
                            <!--car card-->
                            <form action="carInfo.php" method="post">
                                <div class="card bg-dark text-light car hybrid" id="carDiv">
                                    <?php echo '<img src="'.$imgPath.'" class="card-img-top" alt="..." height="50%">' ?>
                                    <div class="card-body">
                                        <form action="carInfo.php" method="post">
                                            <?php echo '<input type="hidden" name="model" value="'.$model.'">'?>
                                        </form>
                                        <?php echo '<h5>'.$model.'</h5>'?>
                                        <?php echo '<p class="card-text">'.$price.' $</p>'?>
                                        <button class="btn btn-primary car-info" type="submit" name="moreInfoBTN" id="gClassBTN">Read more</button>
                                    </div>
                                </div>
                            </form>
                            <?php
                        }// car type = 5 ->hybrid
                    }//end of else statements for the visible cars

                    $_SESSION['model']  = $model;
                }//end of for loop

                ?>

            <?php
            }//end of try block
            catch(Exception $e)
            {
                echo "Error:".$e->getMessage();
            }
            ?>

            <!--see more button-->
            <div class="card text-light justify-content-center" id="show-btn" style="width: 12rem; background-color: rgb(10, 10, 10);">
                <button class="btn btn-dark see-more-less" data-bs-toggle="collapse" data-bs-target=".hidden-car" aria-expanded="false" aria-controls="carDiv" onclick="showMore()">
                    <h4 id="seeMoreTxt">See More</h4>
                </button>
            </div>
            <script>
                flag = 1;
                function showMore()
                {

                    const arrow = document.getElementById('arrowBTN');
                    if (flag)
                    {
                        document.getElementById('seeMoreTxt').innerText = 'See Less';
                        flag = 0;
                    }
                    else
                    {
                        document.getElementById('seeMoreTxt').innerText = 'See More';
                        flag = 1;
                    }
                }
            </script>


        </div>
    </div>

    <div class="text-center p-3" style="background-color: rgb(10, 10, 10); color:white;">
        <a class="text-bg-darks" style=" color:white; text-decoration: none;"> &copy; 2024 CarERA. All rights reserved</a>
    </div>
</div>

    <!--AOS-->
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>

    <script src="../JS/vehicles.js"></script>
</body>