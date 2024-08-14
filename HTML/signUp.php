<?php
$FirstName = 0;
$LastName = 0;
$E_mail = 0;
$Phone = 0;
$Username = 0;
$Password = 0;
$confPass = 0;
$userLevel = 0;
$db = 0;
$added = 0;
if(isset($_POST["password"]) and isset($_POST["confPassword"]))
{
    if($_POST["password"] == $_POST["confPassword"])
    {
        $FirstName = $_POST["firstName"];
        $LastName = $_POST["lastName"];
        $E_mail = $_POST["email"];
        $Phone = $_POST["telephone"];
        $Username = $_POST["username"];
        $Password = $_POST["password"];
        if(str_contains($_POST['username'],'@admin'))
            $userLevel = 1;
        elseif(str_contains($_POST['username'],'@emp'))
            $userLevel = 2;
        else
            $userLevel = 3;
        try
        {
            $db = new mysqli('localhost','root','','webproj');
            if ($db->connect_errno)
                echo $db->connect_error;
            $qry1 = "select * from members where userName = '".$Username."';";
            $result1 = $db->query($qry1);
            if($result1->num_rows > 0)
                echo '<script>alert("Use another username")</script>';

            $qry2 = "INSERT INTO `members` (`ID`, `firstName`, `LastName`, `Email`, `Password`, `telephone`, `memberLevel`, `userName`) VALUES (NULL, '".$FirstName."', '".$LastName."', '".$E_mail."', SHA1('".$Password."'), '".$Phone."', '".$userLevel."', '".$Username."')";
            if ($db->query($qry2) === TRUE) {
                header("location:LoginPage.php");
            } else {
                echo "Error: " . $qry2 . "<br>" . $db->error;
            }
            $db->commit();
            $added = 1;
            echo 'added succefully!';
            $db->close();
        }//end of try
        catch(Exception $e)
        {
            echo $e->getMessage();
        }
        }//end of password == confirm password
        else
        {

        }//if password not equal confirm password
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="icon" type="image/x-icon" href="../images/logo.png">
      <title>CarERA | Sign up</title>
      <link rel="stylesheet" href="../CSS/signUp.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
      <style>
        body {
            background-color: black;
        }
        .registration-form {
          max-width: 700px;
          margin: 50px auto;
          background-color: black;
          padding: 20px;
          border-radius: 25px;
          border: 1px rgb(60, 60, 60) solid;
          box-shadow: 0px 0px 10px 0px rgba(255, 255, 255, 0.2);
        }
  </style>
</head>
<body>

<div class="container">
    <div class="d-flex flex-wrap justify-content-center align-items-center" style="padding-top: 100px;">
        <img class="img img-fluid" src="../images/logo.png" height="75px" width="75px">
        <h2 class="text-center text-light d-inline mb-4">CarEra</h2>
    </div>
  <div class="registration-form text-light">
    <form action="signUp.php" method="post">
      <fieldset class="border p-4">
        <legend class="w-auto p-2">Personal Information</legend>
        <div class="form-group">
            <label for="firstName">First Name:</label>
            <input type="text" class="form-control col" id="firstName" name="firstName">
          </div>
          <div class="form-group">
            <label for="lastName">Last Name:</label>
            <input type="text" class="form-control col" id="lastName" name="lastName">
          </div>
      </fieldset>
      <fieldset class="border p-4">
        <legend class="w-auto p-2">Contact Information</legend>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email">
          </div>
          <div class="form-group">
            <label for="telephone">Telephone:</label>
            <input type="tel" class="form-control" id="telephone" name="telephone">
          </div>
      </fieldset>
      
      <fieldset class="border p-4">
        <legend class="w-auto p-2">Login Information</legend>
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" class="form-control" id="username" name="username">
          </div>
          <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" id="password" name="password">
          </div>
          <div class="form-group">
            <label for="confPassword">Confirm Password:</label>
            <input type="password" class="form-control" id="confPassword" name="confPassword">
          </div>
      </fieldset>
      <button type="submit" class="btn btn-outline-light" style="width: 50%; margin: 20px 25%; border-radius: 25px">Sign up</button>
    </form>
  </div>
</div>
</body>
</html>