<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../images/logo.png">
    <title>CarERA | Services</title>
    <link rel="stylesheet" href="../CSS/Serving.css">
    <!--bootstrap CDN-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!--font awsome CDN-->
    <script src="https://kit.fontawesome.com/f77f0e307d.js" crossorigin="anonymous"></script>
</head>
<body class="bg-black">
<nav class="navbar navbar-expand-lg " style="background-color: #00000099; position: fixed; width: 90%; height: 55px; z-index: 100000000;">
    <div class="container-fluid">
        <img class="img-fluid" src="../images/logo.png" height="45px" width="45px" style="margin-left: 5%;">
        <a class="navbar-brand fw-bold" href="main-page" style="color: white;">CarERA</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" style ="color: white;">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent" style="float: right; ">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link fake" href="#" style = "color: #00000099;"></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="../index.php" style = "color: white; ">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="vehicles.php" style = "color: rgba(255, 255, 255, 0.858);">Vehicles </a>
                </li>
                <li class="nav-item dropdown">
                    <button class="btn btn-secondary dropdown-toggle   border-0" style="background-color:  #00000060;" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Services
                    </button>
                    <ul class="dropdown-menu dropdown-menu-dark">
                        <li><a class="dropdown-item active" href="#fill-tabpanel-1">Get Your Car</a></li>
                        <li><a class="dropdown-item" href="#fill-tabpanel-0">Book a Test Drive</a></li>
                        <li><a class="dropdown-item" href="#fill-tabpanel-3">Maintenance</a></li>
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
                <a href="LoginPage.php" id="loginLogo"><i class="fa-regular fa-circle-user" style="margin-right:  7px; font-size: 32px; color: rgb(201, 201, 201); font-weight: lighter;"></i></a>
                <a href="logOut.php" id="logOutbtn"><i class="fa-solid fa-arrow-right-from-bracket" style="color: #dcdcdc; margin-right:7px; font-size: 28px"></i></a>

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

<div class="body1">
    <div class="container">
        <div class="sidebar">
            <div
                    style="
                  background: linear-gradient(229.99deg, #d58628 -26%, #e17323 145%);" >
                <h1>PORSCHE </h1>
                <p>Model 911 , Special For Our Customers </p>
            </div>
            <div
                    style="
                  background: linear-gradient(215.32deg, #a87407 -1%, #6a62b2 124%);">
                <h1>Audi </h1>
                <p> Engine Model TTRS </p>
            </div>
            <div
                    style="background: linear-gradient(221.87deg, #f0ec23 1%, #c2cb5e 128%);">
                <h1>Lamborghini </h1>
                <p>Four Wheel drive</p>
            </div>
            <div
                    style="background: linear-gradient(220.16deg, #254b1f -8%, #27531f 138%);" >
                <h1>BMW</h1>
                <p>Always be a Winner </p>
            </div>
        </div>
        <div class="main-slider">
            <div
                    class="slide"
                    style="background-image: url('https://images.unsplash.com/photo-1603741330658-fd9b8002958d?q=80&w=1887&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');">
            </div>
            <div
                    class="slide"
                    style="
                  background-image: url('https://images.unsplash.com/photo-1507767439269-2c64f107e609?q=80&w=1887&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');">
            </div>
            <div class="slide" style="background-image: url('https://images.unsplash.com/photo-1610880846497-7257b23f6138?q=80&w=1921&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');">
            </div>
            <div class="slide"  style="  background-image: url('https://images.unsplash.com/photo-1617646131875-0986960a4fb7?q=80&w=1854&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');"
            ></div>
        </div>
        <div class="controls">
            <button class="down-button">
                <i class="fas fa-arrow-down"></i>
            </button>
            <button class="up-button">
                <i class="fas fa-arrow-up"></i>
            </button>
        </div>
    </div>
</div>

<div style="align-items: center ;justify-content: center; display: flex; padding: 50px;">

    <h2 id="form-title" class="text-white">Book A service </h2>

</div>
<!--NavigationTabs-->
<ul class="nav nav-fill nav-tabs" role="tablist">
    <li class="nav-item" role="presentation">
        <a class="nav-link active" id="fill-tab-0" data-bs-toggle="tab" href="#fill-tabpanel-0" role="tab" aria-controls="fill-tabpanel-0" aria-selected="true"> Test Drive </a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link" id="fill-tab-1" data-bs-toggle="tab" href="#fill-tabpanel-1" role="tab" aria-controls="fill-tabpanel-1" aria-selected="false"> Finance Your Vehicle </a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link" id="fill-tab-2" data-bs-toggle="tab" href="#fill-tabpanel-2" role="tab" aria-controls="fill-tabpanel-2" aria-selected="false">MAINTAIN MY VEHICLE</a>
    </li>
</ul>

<div class="tab-content pt-5" id="tab-content">
    <div class="tab-pane active" id="fill-tabpanel-0" role="tabpanel" aria-labelledby="fill-tab-0"> <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <!--test drive form-->
                <form id="TestDrievForm" name="TestDrievForm" class="form"  method="POST" action="Services.php">

                    <div class="form-group">
                        <label class="form-label" id="nameLabel1" for="TestDriverbook"></label>
                        <input type="text" class="form-control" id="TestDriverbook" name="TestDrivername" placeholder="Your name" tabindex="1">
                    </div>

                    <div class="form-group">
                        <label class="form-label" id="emailLabel1" for="testdriveemail"></label>
                        <input type="email" class="form-control" id="testdriveemail" name="testdriveemail" placeholder="Your Email" tabindex="2">
                    </div>
                    <div class="form-group">
                        <label class="form-label" id="PhoneLabel1" for="testdrivephone"></label>
                        <input type="text" class="form-control" id="testdrivephone" name="TestDrivePhoneNumber" placeholder="Phone Number (+970)123456789" tabindex="3">
                    </div>

                    <div class="form-group">
                        <label class="form-label text-light" id="ModeltLabel1" for="Model"> Car Model </label>
                        <?php
                        $conn = new mysqli("localhost", "root", "", "webProj");
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }

                        $sql = "SELECT Model FROM car";
                        $stmt = $conn->prepare($sql);
                        $stmt->execute();
                        $result = $stmt->get_result();
                        if ($result->num_rows > 0) {

                            echo "<select class='form-control' id='Modeltestdrive' name='Modeltestdrive' placeholder='MODEL OF INTEREST' tabindex='4'>";
                            while ($row = $result->fetch_assoc()) {
                                echo "<option value='" . $row["Model"] . "'>" . $row["Model"] . "</option>";
                            }
                            echo "</select>";
                        } else {
                            echo "<option value=''>No models found</option>";
                        }
                        $conn->close();
                        ?>

                    </div>
                    <!-- Book A barnch -->
                    <div class="form-group">
                        <label class="form-label" id="BranchLabel1" for="BranchPickingTestDrive"></label>
                        <select class="form-control" id="BranchPickingTestDrive" name="BranchPickingTestDrive" placeholder="Please choose nearest branch for you" tabindex="5">
                            <option value=" " >Please select the Nearest Branch</option>
                            <option>Jerusalem</option>
                            <option>Hebron</option>
                            <option >Nablus</option>
                            <option >Tubas</option>
                            <option >Jenin</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label" id="DateForaTestDriveLabel" for="DateForaTestDrive"></label>
                        <input type="datetime-local" rows="6" cols="60"  class="form-control" id="DateForaTestDrive" name="DateForaTestDrive" placeholder="Your prefared Date & Time" tabindex="6"></input>
                    </div>
                    <div class="form-group">
                        <label class="form-label" id="messageLabel1" for="TestDriveMessage"></label>
                        <textarea rows="4" cols="60" name="TestDriveMessage" class="form-control" id="TestDriveMessage" placeholder="Your message" tabindex="4"></textarea>
                    </div>
                    <br>

                    <div class="text-center margin-top-25">
                        <button type="submit" class="btn btn-mod btn-border btn-large bg-light-subtle"name="submit_testDrive">Send Message</button>
                    </div>

                    <?php
                        if(isset($_SESSION['userName']))
                        {
                            echo "<script>document.getElementById('TestDriverbook').value = '".$_SESSION['fName'] ." ".$_SESSION['lName']."'</script>";
                            echo "<script>document.getElementById('testdriveemail').value = '".$_SESSION['email']."'</script>";
                            echo "<script>document.getElementById('testdrivephone').value = '".$_SESSION['phone']."'</script>";

                            /*
                        $_SESSION['fName'] = $resRow[1];
                        $_SESSION['lName'] = $resRow[2];
                        $_SESSION['email'] = $resRow[3];
                        $_SESSION['phone'] = $resRow[5];
                             * */
                        }
                    ?>
                    <?php
                    $conn = new mysqli("localhost", "root", "", "webProj");
                    if ($conn->connect_error) {
                        die("Connection failed: ". $conn->connect_error);
                    } else {
                        if (isset($_POST['submit_testDrive'])) {
                            $name = mysqli_real_escape_string($conn, $_POST["TestDrivername"]);
                            $email = mysqli_real_escape_string($conn, $_POST["testdriveemail"]);
                            $phone_number = mysqli_real_escape_string($conn, $_POST["TestDrivePhoneNumber"]);
                            $model = mysqli_real_escape_string($conn, $_POST["Modeltestdrive"]);
                            $branch = mysqli_real_escape_string($conn, $_POST["BranchPickingTestDrive"]);
                            $date_time = mysqli_real_escape_string($conn, $_POST["DateForaTestDrive"]);
                            $message = mysqli_real_escape_string($conn, $_POST["TestDriveMessage"]);


                            $check_user_sql = "SELECT ID FROM members WHERE Email = '$email'";
                            $result = $conn->query($check_user_sql);

                            if ($result->num_rows > 0) {
                                $row = $result->fetch_assoc();
                                $user_id = $row['ID'];

                                $sql_insert = "INSERT INTO `testdrivebooks` (`Name`, `Email`, `Phone Number`, `Car Model`, `Branch`, `Date and Time`, `Message`, `CustomerID`) VALUES (?,?,?,?,?,?,?,?)";
                                $stmt_insert = $conn->prepare($sql_insert);
                                $stmt_insert->bind_param("ssssssss", $name, $email, $phone_number, $model, $branch,$date_time,$message, $user_id);
                                if ($stmt_insert->execute()) {
                                    echo "<script>alert('Data saved successfully!');</script>";
                                    $stmt_insert->close(); // Close prepared statement
                                } else {
                                    echo "Error saving data: ". $conn->error;
                                    $stmt_insert->close(); // Close prepared statement
                                }

                            } else {
                                echo "<script>alert('User not found. Please register first!'); window.location = 'signUp.php';</script>";
                            }

                        }
                        $conn->close();
                    }

                    ?>
                    <br>
                </form><!-- End form -->

            </div><!-- End col -->

        </div><!-- End row -->
    </div>

    <div class="tab-pane" id="fill-tabpanel-1" role="tabpanel" aria-labelledby="fill-tab-1"> <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <!--deal form-->
                <form id="CarBuyForm" name="CarBuyForm" class="form"  method="POST" action="Services.php" enctype="multipart/form-data">
                    <div >
                        <img src="../images/logo.png" alt="Our Logo" style="float:left ; margin: 10px ;">
                        <p style="text-align: justify;font-size: 25px;" class="text-white"><b>CarEra</b> - the exclusive agent for many Car brands
                            in Palestine - provides different payment solutions,
                            whether in cash, checks or through banks within a clear,
                            encouraging and convenient financing policy.
                        </p>
                    </div>
                    <br>
                    <br>
                    <!--Picking the model -->
                    <div class="form-group">
                        <label class="form-label text-white" id="ModelLabelBuy" for="ModelToBuy" >MODEL OF INTEREST</label>
                        <?php
                        $conn = new mysqli("localhost", "root", "", "webProj");
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }

                        $sql = "SELECT Model FROM car";
                        $stmt = $conn->prepare($sql);
                        $stmt->execute();
                        $result = $stmt->get_result();
                        if ($result->num_rows > 0) {

                            echo "<select class='form-control' id='ModelToBuy' name='ModelToBuy' placeholder='MODEL OF INTEREST' tabindex='0'>";                          while ($row = $result->fetch_assoc()) {
                                echo "<option value='" . $row["Model"] . "'>" . $row["Model"] . "</option>";
                            }
                            echo "</select>";
                        } else {
                            echo "<option value=''>No models found</option>";
                        }
                        $conn->close();
                        ?>

                    </div>
                    <!--End of Model Picking -->

                    <div class="form-group">
                        <label class="form-label text-light" id="FinancingLabel" for="Financing" >Financing Method </label>
                        <select class="form-control" id="Financing" name="Financing" placeholder="Financing Method" tabindex="1">
                            <option value="البنك العربي"> البنك العربي</option>
                            <option value="البنك الإسلامي الفلسطيني">البنك الإسلامي الفلسطيني</option>
                            <option value="mercedes">الشركة الفلسطينية للتاجير والتاجير العالمي </option>
                            <option value="بنك القاهرة عمان">بنك القاهرة عمان</option>

                        </select>
                    </div>
                    <br>
                    <p style="font-size: 20px ;align-items: center ;justify-content: center; display: flex;" class=" text-light"><b>INSTALLMENT</b></p>

                    <p style="font-size: 15px ;" class="text-light">Choose your convenient payment method to get automated details about the value of the first payment and the
                        amount of the monthly payment according to the number of years of installments</p>
                    <div style="text-align: center;">
                        <div class="form-group">
                            <label class="form-label text-light" id="Down payment Label" for="Downpayment">Down payment:
                            </label>
                            <input  type="number" style=" float: right ; margin-right: 20px ;display: flex; width: 40%;" class="form-control" id="Downpayment" name="Downpayment" placeholder="Down Payment" tabindex="3" step="1000" value="5000" >
                        </div>
                        <div class="form-group">
                            <label class="form-label text-light" id="DurationofInstalmentsLabel" for="DurationofInstalments">Duration of Instalments: </label>
                            <input  type="number" style="margin-right: 20px ;display: flex; width: 40%; float: right;" class="form-control" id="DurationofInstalments:" name="DurationofInstalments" placeholder="DurationofInstalments" tabindex="4" step="1" value="30" >
                        </div>
                        <br>
                        <br>
                    </div>
                    <div>
                        <br>
                        <p style="font-size: 20px ;align-items: center ;justify-content: center; display: flex;"class="text-light"><b>Personal Information</b></p><br>
                        <p style="font-size: 15px ;" class="text-light">Fill in your data and send the required information
                            and documents so you will be contacted by our agent to confirm the application
                            details within a high level of confidentiality and privacy.
                        </p>
                        <div>
                            <div class="form-group">
                                <label class="form-label" id="emailLabel" for="FinanceEmail"></label>
                                <input type="email" class="form-control" id="FinanceEmail" name="FinanceEmail" placeholder="Your Email" tabindex="5">
                            </div>
                            <div class="form-group">
                                <label class="form-label" id="PhoneLabel" for="Financephonenumber"></label>
                                <input type="text" class="form-control" id="Financephonenumber" name="Financephonenumber" placeholder="Phone Number (+970)123456789" tabindex="6">
                            </div>
                            <?php
                            if(isset($_SESSION['userName']))
                            {
                                echo "<script>document.getElementById('FinanceEmail').value = '".$_SESSION['email']."'</script>";
                                echo "<script>document.getElementById('Financephonenumber').value = '".$_SESSION['phone']."'</script>";
                            }
                            ?>
                            <div class="form-group">
                                <label class="form-label" id="FinanceBranchlLabel" for="Model"></label>
                                <select class="form-control" id="FinanceBranch" name="FinanceBranch" placeholder="Please choose nearest branch for you" value ="Please choose nearest branch for you" tabindex="5">
                                    <option value=" " >Please select the Nearest Branch</option>
                                    <option>Jerusalem</option>
                                    <option>Hebron</option>
                                    <option >Nablus</option>
                                    <option >Tubas</option>
                                    <option >Jenin</option>
                                </select>
                            </div>
                            <!-- Jop Type -->
                            <div class="form-group">
                                <label class="form-label" id="JopTypeLabel" for="JopType"></label>
                                <select class="form-control" id="JopType" name="JopType" placeholder="Jop Type" tabindex="6">
                                    <option value=" "> Jop Type </option>
                                    <option>موظف قطاع خاص </option>
                                    <option>موظف قطاع عام </option>
                                    <option >عمال الداخل</option>
                                    <option >تجارة عامة</option>
                                </select>
                            </div>
                            <div class="financeinf">
                                <br><br>
                                <p style="font-size: 20px ;align-items: center ;justify-content: center; display: flex;" class="text-light"><b>Finance Information:</b></p><br>
                                <div class="form-group">
                                    <label class="form-label text-light" id="MonthlyIncomeLabel" for="MonthlyIncome">Monthly Income:
                                    </label>
                                    <input  type="number" style=" float: right ; margin-right: 20px ;display: flex; width: 40%;" class="form-control" id="MonthlyIncome" name="MonthlyIncome"  tabindex="3" step="100" value="3000" >
                                </div>
                                <br>
                                <div class="form-group">
                                    <label class="form-label text-light" id="otherLoansLabel" for="No_Radio">Any Other Loans ?
                                    </label>

                                    <input type="radio" id="No_Radio" name="OtherLoans"  value="No">
                                    <label for="No_Radio"class="text-light">No</label>
                                    <input type="radio" id="Yes_Radio" name="OtherLoans" value="Yes">
                                    <label for="Yes_Radio" class="text-light">Yes</label>

                                </div>

                                <div class="DOCUMENT" >

                                    <p style="font-size: 20px ;align-items: center ;justify-content: center; display: flex;" class="text-light"><b>DOCUMENTS</b></p><br>
                                    <label class="form-label text-light" id="IDFileUploadLabel" for="IDFileUpload"> ID: </label>
                                    <input type="file" name="IDFileUpload" id="IDFileUpload" class="form-control" placeholder="Upload Your ID as PDF ">
                                    <label class="form-label text-light" id="Latestsalarysliplabel" for="Latestsalaryslip"> Latest salary slip: </label>
                                    <input type="file" name="Latestsalaryslip" id="Latestsalaryslip" class="form-control" placeholder="Latest salary slip ">
                                    <label class="form-label text-light" id="SalaryTransferLetterlabel" for="SalaryTransferLetter"> Salary Transfer Letter: </label>
                                    <input type="file" name="SalaryTransferLetter" id="SalaryTransferLetter" class="form-control" placeholder="Salary Transfer Letter ">
                                    <label class="form-label text-light" id="IDFileUpload" for="WorkPermit"> Work Permit: </label>
                                    <input type="file" name="WorkPermit" id="WorkPermit" class="form-control" placeholder="Work Permit">
                                    <br>
                                    <div style="align-items: center ;justify-content: center; display: flex;">  <a href="../images/Autherization.jpg" download="AutherizationImg.jpg"><button type="button" class="btn btn-primary"class="btn btn-danger" role="button" targer="_blank">Autherization Letter Download </button></a>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label" id="DateofBuyLabel" for="DateOfBuy"></label>
                        <input type="datetime-local" rows="6" cols="60" name="DateOfBuy" class="form-control" id="DateOfBuy" placeholder="Your prefared Date & Time" tabindex="6"></input>
                    </div>
                    <div class="form-group">
                        <label class="form-label" id="messageLabel" for="MessageofBuy"></label>
                        <textarea rows="4" cols="60" name="MessageofBuy" class="form-control" id="MessageofBuy" placeholder="Your message" tabindex="4"></textarea>
                    </div>
                    <br>
                    <div class="text-center margin-top-25">
                        <button type="submit" class="btn btn-mod btn-border btn-large bg-light-subtle" name="SubmitFinance">Send Message</button>
                    </div>
                    <br>

                    <?php

                    if (isset($_POST['SubmitFinance'])) {
                        $conn = new mysqli("localhost", "root", "", "webProj");
                        if ($conn->connect_error) {
                            die("Connection failed: ". $conn->connect_error);
                        }

                        else{
                            if ($_SERVER["REQUEST_METHOD"] == "POST") {

                                $ModelToBuy = $_POST["ModelToBuy"];
                                $Financing = $_POST["Financing"];
                                $Downpayment = $_POST["Downpayment"];
                                $DurationofInstalments = $_POST["DurationofInstalments"];
                                $FinanceEmail = $_POST["FinanceEmail"];
                                $Financephonenumber = $_POST["Financephonenumber"];
                                $FinanceBranch = $_POST["FinanceBranch"];
                                $JopType = $_POST["JopType"];
                                $MonthlyIncome = $_POST["MonthlyIncome"];
                                $Loans1 = $_POST["OtherLoans"];
                                $DateOfBuy = $_POST["DateOfBuy"];
                                $MessageofBuy = $_POST["MessageofBuy"];

                                $check_user_sql = "SELECT ID FROM members WHERE Email = '$FinanceEmail'";
                                $result = $conn->query($check_user_sql);
                                if ($result->num_rows > 0) {
                                    $row = $result->fetch_assoc();
                                    $user_id = $row['ID'];
                                    $IDFileUpload = $_FILES["IDFileUpload"];
                                    $Latestsalaryslip = $_FILES["Latestsalaryslip"];
                                    $SalaryTransferLetter = $_FILES["SalaryTransferLetter"];
                                    $WorkPermit = $_FILES["WorkPermit"];

                                    // Create a directory for the user's files
                                    $username = $FinanceEmail;
                                    $directory = "uploads/" . $username;
                                    if (!file_exists($directory)) {
                                        mkdir($directory, 0777, true);
                                    }

                                    // Save the uploaded files
                                    $IDFileUpload_path = $directory . "/" . $IDFileUpload["name"];
                                    $Latestsalaryslip_path = $directory . "/" . $Latestsalaryslip["name"];
                                    $SalaryTransferLetter_path = $directory . "/" . $SalaryTransferLetter["name"];
                                    $WorkPermit_path = $directory . "/" . $WorkPermit["name"];

                                    move_uploaded_file($IDFileUpload["tmp_name"], $IDFileUpload_path);
                                    move_uploaded_file($Latestsalaryslip["tmp_name"], $Latestsalaryslip_path);
                                    move_uploaded_file($SalaryTransferLetter["tmp_name"], $SalaryTransferLetter_path);
                                    move_uploaded_file($WorkPermit["tmp_name"], $WorkPermit_path);

                                    // Insert the data into the database
                                    $sql = "INSERT INTO `deals` (`FinancingMethod`, `DownPayment`,
                                                                `Duration`, `CustomerID`, 
                                                                `Branch`, `jobType`, 
                                                                `MonthlyIncome`,`OtherLoans`, 
                                                                `Identity`, `LatestSalarySlip`, 
                                                                `SalaryTransferLetter`, `WorkPermit`,
                                                                `TIME`, `Message`, 
                                                                `Model`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
                                    $stmt = $conn->prepare($sql);
                                    $stmt->bind_param("sssssssssssssss", $Financing, $Downpayment,
                                        $DurationofInstalments, $user_id,
                                        $FinanceBranch, $JopType,
                                        $MonthlyIncome,$Loans1,
                                        $IDFileUpload_path, $Latestsalaryslip_path,
                                        $SalaryTransferLetter_path, $WorkPermit_path,
                                        $DateOfBuy, $MessageofBuy,$ModelToBuy);

                                    if ( $stmt->execute()) {
                                        echo "<script>alert('Data saved successfully!');</script>";
                                    } else {
                                        echo "Error: " . $sql . "<br>" . $conn->error;
                                    }
                                }else {
                                    echo "<script>alert('User not found. Please register first!'); location.href = 'signUp.php';</script>";

                                }
                                // Close the connection
                                $conn->close();
                            }
                        }
                    }

                    ?>

                </form><!-- End form -->

            </div><!-- End col -->

        </div><!-- End row -->
    </div>

    <div class="tab-pane" id="fill-tabpanel-2" role="tabpanel" aria-labelledby="fill-tab-2"> <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <!--maintenance form-->
                <form id="contact-form" name="MaintenanceForm" class="form" action="Services.php"  method="POST" >

                    <div class="form-group">
                        <label class="form-label" id="nameLabel" for="Maintenancename"></label>
                        <input type="text" class="form-control" id="Maintenancename" name="Maintenancename" placeholder="Your name" tabindex="1">
                    </div>

                    <div class="form-group">
                        <label class="form-label" id="emailLabel" for="MaintenanceEmail"></label>
                        <input type="email" class="form-control" id="MaintenanceEmail" name="MaintenanceEmail" placeholder="Your Email" tabindex="2">
                    </div>
                    <div class="form-group">
                        <label class="form-label" id="PhoneLabel" for="Mintenancephonenumber"></label>
                        <input type="text" class="form-control" id="Mintenancephonenumber" name="Mintenancephonenumber" placeholder="Phone Number (+970)123456789" tabindex="3">
                    </div>
                    <div class="form-group">
                        <label class="form-label text-light margin-top-25 margin-right-25" id="Label11" for="Down payment" >Did the journey of your car's adventure begin with us at CarEra?
                        </label>
                        <input type="radio" id="No_Radio1" name="OurCar" value="No">
                        <label for="No_Radio1"class="text-light">No</label>
                        <input type="radio" id="Yes_Radio1" name="OurCar" value="Yes">
                        <label for="Yes_Radio1" class="text-light">Yes</label>
                    </div>
                    <div class="form-group">
                        <label class="form-label text-light" id="ModeltLabel" for="ModelMintenance"> Car Model </label>
                        <?php
                        if(isset($_SESSION['userName']))
                        {
                            echo "<script>document.getElementById('Maintenancename').value = '".$_SESSION['fName'] ." ".$_SESSION['lName']."'</script>";
                            echo "<script>document.getElementById('MaintenanceEmail').value = '".$_SESSION['email']."'</script>";
                            echo "<script>document.getElementById('Mintenancephonenumber').value = '".$_SESSION['phone']."'</script>";

                            /*
                        $_SESSION['fName'] = $resRow[1];
                        $_SESSION['lName'] = $resRow[2];
                        $_SESSION['email'] = $resRow[3];
                        $_SESSION['phone'] = $resRow[5];
                             * */
                        }
                        ?>
                        <?php
                        $conn = new mysqli("localhost", "root", "", "webProj");
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }

                        $sql = "SELECT Model FROM car";
                        $stmt = $conn->prepare($sql);
                        $stmt->execute();
                        $result = $stmt->get_result();
                        if ($result->num_rows > 0) {

                            echo "<select class='form-control' id='ModelMintenance' name='ModelMintenance' placeholder='MODEL OF INTEREST' tabindex='4'>";
                            while ($row = $result->fetch_assoc()) {
                                echo "<option value='" . $row["Model"] . "'>" . $row["Model"] . "</option>";
                            }
                            echo "<option value='" . "Other" . "'>" . "Other" . "</option>";
                            echo "</select>";
                        } else {
                            echo "<option value=''>No models found</option>";
                        }
                        $conn->close();
                        ?>
                    </div>
                    <!-- Book A barnch -->
                    <div class="form-group">
                        <label class="form-label" id="ModeltLabel" for="BranchMaintenance"></label>
                        <select class="form-control" id="BranchMaintenance" name="BranchMaintenance" placeholder="Please choose nearest branch for you" tabindex="5">
                            <option value=" " >Please select the Nearest Branch</option>
                            <option>Jerusalem</option>
                            <option>Hebron</option>
                            <option >Nablus</option>
                            <option >Tubas</option>
                            <option >Jenin</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label" id="Date" for="MaintenanceDate"></label>
                        <input type="datetime-local" rows="6" cols="60" name="MaintenanceDate" class="form-control" id="MaintenanceDate" placeholder="Your prefared Date & Time" tabindex="6"></input>
                    </div>
                    <div class="form-group">
                        <label class="form-label" id="messageLabel" for="messageMenenance"></label>
                        <textarea rows="4" cols="60" name="messageMenenance" class="form-control" id="messageMenenance" placeholder="Your message" tabindex="4"></textarea>
                    </div>
                    <br>
                    <div class="text-center margin-top-25">
                        <button type="submit" name="MaintenanceSubmit" class="btn btn-mod btn-border btn-large bg-light-subtle">Send Message</button>
                    </div>
                    <br>
                    <?php

                    if (isset($_POST['MaintenanceSubmit'])) {

                        $conn = new mysqli("localhost", "root", "", "webProj");
                        if ($conn->connect_error) {
                            die("Connection failed: ". $conn->connect_error);
                        }


                        $Maintenancename = $_POST['Maintenancename'];
                        $MaintenanceEmail = $_POST['MaintenanceEmail'];
                        $Mintenancephonenumber = $_POST['Mintenancephonenumber'];
                        $OurCar = $_POST['OurCar'];
                        $ModelMintenance = $_POST['ModelMintenance'];
                        $BranchMaintenance = $_POST['BranchMaintenance'];
                        $MaintenanceDate = $_POST['MaintenanceDate'];
                        $messageMenenance = $_POST['messageMenenance'];

                        $check_user_sql = "SELECT ID FROM members WHERE Email = '$MaintenanceEmail'";
                        $result = $conn->query($check_user_sql);

                        if ($result->num_rows > 0) {
                            $row = $result->fetch_assoc();
                            $user_id = $row['ID'];
                            // Insert the data into the maintenance table
                            $sql = "INSERT INTO  `maintenance` ( `CustomerId`, `OurCar`, `Model`, `Branch`, `Date`, `Message`) 
                         VALUES ('$user_id', '$OurCar', '$ModelMintenance', '$BranchMaintenance', '$MaintenanceDate', '$messageMenenance')";

                            if ($conn->query($sql) === TRUE) {
                                echo "<script>alert('Data saved successfully!');</script>";
                            } else {
                                echo "Error: " . $sql . "<br>" . $conn->error;
                            }

                        } else {
                            echo "<script>alert('User not found. Please register first!'); window.location = 'signUp.php';</script>";

                        }

                        $conn->close();

                        // Redirect after all checks (optional, can be conditional)
                        // header('Location: success.php'); // Replace with your success page
                    }
                    ?>

                </form><!-- End form -->
            </div><!-- End col -->
        </div><!-- End row -->
    </div>



    <!-- Footer -->
    <!-- Map AS AFOOTER -->
    <div style="height: 50vh; width: 100%">
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d14565.709704187067!2d35.382288634912065!3d32.32513037573407!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sar!2s!4v1716392377643!5m2!1sar!2s"
                width="100%" height="100%" style="border:0; filter: invert(100%);"
                allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    <div class="text-center p-3" style="background-color: rgb(10, 10, 10); color:white;">
        <a class="text-bg-darks" style=" color:white; text-decoration: none;"> &copy; 2024 CarERA. All rights reserved</a>
    </div>
    <!-- Footer -->
    <script src="../JS/Serving.js"></script>
</body>
</html>