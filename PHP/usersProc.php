<?php
    if(isset($_POST['update1'])) {
        echo "<script>alert('you pressed on update btn')</script>";
        session_start();

        $_SESSION['Name'] = $_POST['name'];
        $_SESSION['Email'] = $_POST['email'];
        $_SESSION['Phone'] = $_POST['phone'];
        $_SESSION['Salary'] = $_POST['salary'];
        $_SESSION['Username'] = $_POST['username'];
        header("location:../HTML/updateInfo.php");
    }

    if(isset($_POST['delete']))
    {
        echo "<script>alert('you pressed on delete btn')</script>";
        session_start();

        $db = new mysqli('localhost','root','','webProj');
        $deleteQry = "DELETE FROM `members` WHERE username = '".$_POST['username']."';";

        if($db->query($deleteQry) === true)
        {
            header("location:../HTML/users.php");
        }
    }