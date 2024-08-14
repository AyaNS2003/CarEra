<?php

session_start();
if(! isset($_SESSION["userName"]))
{
    header('location:vehicles.php');
}
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
$car_type = 0;
$imgPath = 'helllllllllooooooo';

if (isset($_POST['submit'])) {

    $cylinder = $_POST["cylinders"];
    $doors = $_POST["doors"];
    $fuel_type = $_POST["fuel_type"];
    $gears = $_POST["gears"];
    $max_power = $_POST["max_power"];
    $model = $_POST["model"];
    $price = $_POST["price"];
    $qty = $_POST["qty"];
    $seats = $_POST["seats"];
    $transmission = $_POST["transmission"];
    $car_type = $_POST["car_type"];


    if (isset($_FILES["imgPath"])) {
        $basePath = '';
        if ($car_type == '1')
            $basePath = '../images/EVcars/';
        elseif ($car_type == '2')
            $basePath = '../images/SUVcars/';
        elseif ($car_type == '3')
            $basePath = '../images/trucks/';
        elseif ($car_type == '4')
            $basePath = '../images/SedanCars/';
        elseif ($car_type == '5')
            $basePath = '../images/hybrid/';

        $imgPath = $basePath . basename($_FILES["imgPath"]["name"]);
        echo $imgPath;
    }
    if ($_FILES["imgPath"]["size"] > 500000) {
        echo 'file is too large';
    }//file size is big
    elseif (file_exists($imgPath))
    {
        echo 'file already exists';
    }
    else
    {

            echo "<script>alert('trying to add the car!')</script>";

            try {
                echo basename($_FILES["imgPath"]["name"]);

                $db = new mysqli('localhost', 'root', '', 'webproj');

                $qry1 = "INSERT INTO `car` (`cylinders`, `doors`, `fuel type`, `gears`, `max power`, `Model`, `price`, `Qty`, `seats`, `transmission`, `car_type`, `imagePath`) " .
                    "VALUES ('" . $cylinder . "', '" . $doors . "', '" . $fuel_type . "', '" . $gears . "', '" . $max_power . "', '" . $model . "', '" . $price . "', '" . $qty . "', '" . $seats . "', '" . $transmission . "', '" . $car_type . "', '" . $imgPath . "');";

                echo $qry1;
                if ($db->query($qry1) === TRUE) {
                    move_uploaded_file($_FILES["imgPath"]["tmp_name"], $imgPath);
                    header("location:vehicles.php");
                } else {
                    echo "Error: " . $qry1 . "<br>" . $db->error;
                }
                $db->commit();
                $added = 1;


                $db->close();

            }//end of try
            catch (Exception $e) {
                echo $e->getMessage();
            }
    }//added successfully

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../images/logo.png">
    <title>CarERA | Add New Car</title>

    <!--bootstrap CDN-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <style>

        body {
            background-color: #121212;
            color: #fff;
        }

        form
        {
            max-width: 700px;
            min-width: 400px;
            margin: 50px auto;
            background-color: black;
            padding: 50px;
            border-radius: 25px;
            border: 1px rgb(60, 60, 60) solid;
            box-shadow: 0px 0px 10px 0px rgba(255, 255, 255, 0.2);
        }
        input[type=submit]
        {
            width: 50%;
            margin-left: 25%;
        }
    </style>
</head>
<body class="bg-black">

<div class="container">
    <div class="d-flex flex-wrap justify-content-center align-items-center" style="padding-top: 100px;">
        <img class="img img-fluid" src="../images/logo.png" height="75px" width="75px">
        <h2 class="text-center text-light d-inline mb-4">CarEra</h2>
    </div>
    <div class=" text-light">
        <form action="addNewCar.php" method="post" style="width: 50%" enctype="multipart/form-data">

            <div class="bg-black form-floating mb-3">
                <input type="text" class="bg-black text-light form-control" id="model" name="model" placeholder="Mercedes G-class">
                <label for="model">Model</label>
            </div>


            <div class="bg-black form-floating mb-3">
                <input type="text" class="bg-black text-light form-control" id="doors" placeholder="doors" name="doors">
                <label for="doors">Number Of Doors</label>
            </div>


            <div class="bg-black form-floating mb-3">
                <input type="text" class="bg-black text-light form-control" id="seats" placeholder="seats" name="seats">
                <label for="seats">Number Of Seats</label>
            </div>


            <div class="bg-black form-floating mb-3">
                <input type="text" class="bg-black text-light form-control" id="cylinders" placeholder="cylinders" name="cylinders">
                <label for="cylinders">Number Of Cylinders</label>
            </div>


            <div class="bg-black form-floating mb-3">
                <input type="text" class="bg-black text-light form-control" id="speeds" placeholder="speeds" name="gears">
                <label for="speeds">Number Of speeds</label>
            </div>


            <div class="bg-black form-floating mb-3">
                <input type="text" class="bg-black text-light form-control" id="fuel_type" placeholder="fuel_type" name="fuel_type">
                <label for="fuel_type">Fuel Type</label>
            </div>


            <div class="mb-3">
                <p>Car Type</p>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="car_type" id="EV" value="1">
                    <label class="form-check-label" for="EV">EV</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="car_type" id="SUV" value="2">
                    <label class="form-check-label" for="SUV">SUV</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="car_type" id="Truck" value="3">
                    <label class="form-check-label" for="Truck">Truck</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="car_type" id="Sedan" value="4">
                    <label class="form-check-label" for="Sedan">Sedan</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="car_type" id="Hybrid" value="5">
                    <label class="form-check-label" for="Hybrid">Hybrid</label>
                </div>
            </div>


            <div class="bg-black form-floating mb-3">
                <input type="text" class="bg-black text-light form-control" id="max_power" placeholder="max_power" name="max_power">
                <label for="max_power">Max Power</label>
            </div>


            <div class="bg-black form-floating mb-3">
                <input type="text" class="bg-black text-light form-control" id="qty" placeholder="qty" name="qty">
                <label for="qty">Quantity</label>
            </div>


            <div class="mb-3">
                <p>Transmission</p>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="transmission" id="Automatic" value="Automatic">
                    <label class="form-check-label" for="Automatic">Automatic</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="transmission" id="Manual" value="Manual">
                    <label class="form-check-label" for="Manual">Manual</label>
                </div>
            </div>
            <div class="bg-black form-floating mb-3">
                <input type="text" class="bg-black text-light form-control" id="price" placeholder="price" name="price">
                <label for="price">Price</label>
            </div>
            <div class="mb-5">
                <input type="hidden" name="MAX_FILE_SIZE" value="2000000" />
                <label for="imgPath" class="bg-black text-light form-label">Upload an image for the car</label>
                <input class="bg-black text-light form-control form-control-lg" id="imgPath" name="imgPath" type="file" accept="image/*">
            </div>
            <input type="submit" class="btn btn-outline-light" name="submit" value="Add car">
        </form>
    </div>
</div>
</body>
</html>