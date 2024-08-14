<?php
session_start();

if (! isset($_SESSION['userName']))
{
    header("Location:LoginPage.php");
}
$ID = 0;
$FirstName = 0;
$LastName = 0;
$E_mail = 0;
$Phone = 0;
$Username = 0;
$Password = 0;
$confPass = 0;
$userLevel = 0;
$salary = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CarEra | Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="../images/logo.png">
    <!--bootstrap CDN-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!--font awsome CDN-->
    <script src="https://kit.fontawesome.com/f77f0e307d.js" crossorigin="anonymous"></script>

    <!--AOS-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" />
    <script>
        AOS.init();
    </script>

    <!--Style sheet-->
    <link rel="stylesheet" href="../CSS/users.css">
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
                    <a href="LoginPage.php" id="loginLogo"><i class="fa-regular fa-circle-user" style="margin-right:  7px; font-size: 32px; color: rgb(201, 201, 201); font-weight: lighter;"></i></a>
                    <a href="logOut.php" id="logOutbtn"><i class="fa-solid fa-arrow-right-from-bracket" style="color: #dcdcdc; margin-right:7px; font-size: 28px"></i></a>

                    <?php
                    if(isset($_SESSION['userName']))
                    {
                        echo "<script>document.getElementById('logOutbtn').style.display = 'block' </script>";
                        echo "<script>document.getElementById('loginLogo').style.display = 'none' </script>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </nav>

    <h2 class="text-light" id="heading">CarERA Employees</h2>
    <div class="container-fluid d-flex flex-row flex-wrap align-items-center justify-content-start" style="position: relative" id="usersContainer">
        <?php
            $FirstName = 0;
            $LastName = 0;
            $E_mail = 0;
            $Phone = 0;
            $Username = 0;
            $salary = 0;

        try {
            $db = new mysqli('localhost', 'root', '', 'webProj');
            if($db->connect_errno)
            {
                echo "<script>alert('unable to connect')</script>";
            }
            $selectQry = "SELECT * FROM `members`";
            $result = $db->query($selectQry);

            for($i = 0; $i < $result->num_rows; $i++)
            {
                $row = $result->fetch_row();
                if(str_contains($row[7], '@emp') or str_contains($row[7], '@admin'))
                {
                    $FirstName = $row[1];
                    $LastName = $row[2];
                    $E_mail = $row[3];
                    $Phone = $row[5];
                    $Username = $row[7];
                    $salary = $row[8];
           ?>
        <!--div used to display the employee data-->
        <div id='userDiv' data-aos="zoom-out" data-aos-duration="1500" class="card d-flex justify-content-start flex-wrap">

            <svg xmlns="http://www.w3.org/2000/svg" width="96" height="96" fill="white" class="bi bi-person-circle card-img-top" viewBox="0 0 16 16">
                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
            </svg>
            <div class="card-body">
                <form method="post" action="../PHP/usersProc.php">
                    <?php
                        $Name = $FirstName." ".$LastName;
                        $salaryFormat = $salary."$";
                        echo "<input type='text' name='name' readonly class='h3' value='$Name'>";
                        echo "<input type='text' name='email' readonly value='$E_mail'>";
                        echo "<input type='text' name='username' readonly value='$Username'>";
                        echo "<input type='hidden' name='phone' readonly value='$Phone'>";
                        echo "<input type='text' name='salary' readonly value='$salaryFormat'>";
                        echo "<input type='submit' name='update1' class='btn btn-outline-warning'  value='Update'>";
                        echo "<input type='submit' name='delete' class='btn btn-outline-danger' value='Delete'>";
                    ?>
                </form>
            </div>
        </div>
        <!--end of user card-->

        <?php
                }//end of if statement (to search for employees and admins)
            }//end of for loop
        }//end of try
        catch (Exception $e)
        {
            $error = $e->getMessage();
        }
        ?>

    </div>

    <!--Displaying client info-->
<h2 class="text-light" id="heading" style="margin-top: 0px">CarERA Clients</h2>
<div class="container-fluid d-flex flex-row flex-wrap align-items-center justify-content-start" id="usersContainer">
    <?php
    $FirstName = 0;
    $LastName = 0;
    $E_mail = 0;
    $Phone = 0;
    $Username = 0;
    $salary = 0;

    try {
    $db = new mysqli('localhost', 'root', '', 'webProj');
    if($db->connect_errno)
    {
        echo "<script>alert('unable to connect')</script>";
    }
    $selectQry = "SELECT * FROM `members`";
    $result = $db->query($selectQry);

    for($i = 0; $i < $result->num_rows; $i++)
    {
    $row = $result->fetch_row();
    if(!str_contains($row[7], '@emp') and !str_contains($row[7], '@admin'))
    {
    $FirstName = $row[1];
    $LastName = $row[2];
    $E_mail = $row[3];
    $Phone = $row[5];
    $Username = $row[7];
    $salary = $row[8];
    ?>
        <!--div used to display the employee data-->
        <div id='userDiv' data-aos="zoom-out" data-aos-duration="1500" class="card d-flex justify-content-start flex-wrap">

            <svg xmlns="http://www.w3.org/2000/svg" width="96" height="96" fill="white" class="bi bi-person-circle card-img-top" viewBox="0 0 16 16">
                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
            </svg>
            <div class="card-body">
                <form method="post" action="../PHP/usersProc.php">
                    <?php
                    $Name = $FirstName." ".$LastName;
                    $salaryFormat = $salary."$";
                    echo "<input type='text' name='name' readonly class='h3' value='$Name'>";
                    echo "<input type='text' name='email' readonly value='$E_mail'>";
                    echo "<input type='text' name='username' readonly value='$Username'>";
                    echo "<input type='hidden' name='phone' readonly value='$Phone'>";
                    ?>
                </form>
            </div>
        </div>
        <!--end of user card-->

        <?php
    }//end of if statement (to search for employees and admins)
    }//end of for loop
    }//end of try
    catch (Exception $e)
    {
        $error = $e->getMessage();
    }
    ?>
</div><!--end of user card-->

    <!--AOS-->
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>