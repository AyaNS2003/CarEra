<?php
    session_start();
    if(!isset($_SESSION['userName']) )
    {
        header("location: LoginPage.php");
    }
    $fn = 0;
    $ln = 0;
    $email = 0;
    $un = 0;
    $sal = 0;
    $phone = 0;
    $nameArr = array(0,0);
    $nameArr = explode(" ", $_SESSION['Name']);

    $oldUName = $_SESSION['Username'];
    echo $oldUName;

    try
    {
        if(str_contains($_SESSION['userName'], '@admin')) {

            if (isset($_POST['submit'])) {
                $fn = $_POST['empFname'];
                $ln = $_POST['empLname'];
                $email = $_POST['empEmail'];
                $phone = $_POST['empPhone'];
                $un = $_POST['empUName'];
                $sal = $_POST['empSal'];

                $salFinal = explode('$', $sal);
                $db = new mysqli('localhost', 'root', '', 'webProj');
                $updateQry = "UPDATE `members` SET `firstName` = '" . $fn . "', `LastName` = '" . $ln . "', `Email` = '" . $email . "', `telephone`= '" . $phone . "', `userName` = '" . $un . "', `salary` = " . $salFinal[0] . "  WHERE `members`.`userName` = '" . $oldUName . "';";

                if ($db->query($updateQry) === true) {
                    echo 'updated successfully';
                    header("location:users.php");
                }
            }
        }
        else
        {
            echo "<script>alert('You don't have permission to update data!')</script>";
            echo "<script>document.getElementById('submitBTN').disabled = true </script>";
        }
    }
    catch (Exception $e)
    {
        echo $e->getMessage();
    }
?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>CarEra | Update Info</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="../images/logo.png">
    <!--bootstrap CDN-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!--font awsome CDN-->
    <script src="https://kit.fontawesome.com/f77f0e307d.js" crossorigin="anonymous"></script>

    <!--Style sheet-->
    <link rel="stylesheet" href="../CSS/updateInfo.css">
</head>
<body style="background-color: black" >
<div class="container">
    <div class="d-flex flex-wrap justify-content-center align-items-center" style="padding-top: 100px;">
        <img class="img img-fluid" src="../images/logo.png" height="75px" width="75px">
        <h2 class="text-center text-light d-inline mb-4">CarEra</h2>
    </div>
<!--pop up window that contains employee information-->
<div id="empInfoContainer" class="d-flex text-light justify-content-center align-items-center">
    <div id="empInfo" class="d-flex text-light justify-content-center align-items-center" >
        <form id="updateEmpForm " method="post" action="updateInfo.php">
            <table>
                <tr>
                    <td><label class="text-light" for="fn">First Name: </label></td>
                    <?php
                        echo '<td><input type="text" id="fn" style="width: 250px; border-radius: 25px; margin: 5px; padding: 5px; border: none" name="empFname" value="'.$nameArr[0].'"></td>';
                    ?>
                </tr>
                <tr>
                    <td><label class="text-light" for="ln">Last Name: </label></td>
                    <?php
                        echo '<td><input type="text" id="ln" style="width: 250px; border-radius: 25px; margin: 5px; padding: 5px; border: white" name="empLname" value="'.$nameArr[1].'"></td>';
                    ?>
                </tr>
                <tr>
                    <td><label class="text-light" for="email_field">Email: </label></td>
                    <?php
                    echo '<td><input type="email" id="email_field" style="width: 250px; border-radius: 25px; margin: 5px; padding: 5px; border: white" name="empEmail" value="'.$_SESSION['Email'].'"></td>';
                    ?>
                </tr>
                <tr>
                    <td><label class="text-light" for="phone_field">Phone Number: </label></td>
                    <?php
                    echo '<td><input type="tel" id="phone_field" style="width: 250px; border-radius: 25px; margin: 5px; padding: 5px; border: white" name="empPhone" value="'.$_SESSION['Phone'].'"></td>';
                    ?>
                </tr>
                <tr>
                    <td><label class="text-light" for="un">Username: </label></td>
                    <?php
                    echo '<td><input type="text" id="un" style="width: 250px; border-radius: 25px; margin: 5px; padding: 5px; border: white" name="empUName" value="'.$_SESSION['Username'].'"></td>';
                    ?>
                </tr>
                <tr>
                    <td><label class="text-light" for="sal">Salary: </label></td>
                    <?php
                    echo '<td><input type="text" id="sal" style="width: 250px; border-radius: 25px; margin: 5px; padding: 5px; border: white" name="empSal" value="'.$_SESSION['Salary'].'"></td>';
                    ?>
                </tr>
                <tr>
                    <td><br></td>
                    <td><br></td>
                </tr>
                <tr>
                    <td class="text-center" colspan="2"><input type="submit" name="submit" style="border-radius: 25px; width: 50%" class="btn btn-outline-light" value="Update"></td>
                </tr>
            </table>
        </form>
    </div>
</div>
<!--end of pop up window that contains employee information-->
</div>
</body>