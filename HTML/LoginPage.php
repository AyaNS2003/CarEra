
<?php
session_start();

$db = 0;
$isValid = 0;
if(isset($_POST['userName']) && isset($_POST['userPassword']))
{
    if (!is_null($_POST['userName']) && !is_null($_POST['userPassword']))
    {
        $userName = $_POST['userName'];
        $userPassword = $_POST['userPassword'];



        //start of database connection
        try
        {
            $db = new mysqli('localhost', 'root', '', 'webProj');
            $qry = "select * from members";
            $result = $db->query($qry);

            for ($i = 0; $i < $result->num_rows; $i++)
            {
                $resRow = $result->fetch_row();
                if($resRow[7] == $userName )
                {
                    if(sha1($userPassword) == $resRow[4])
                    {
                        $isValid = 1;
                        $_SESSION['ID'] = $resRow[0];
                        $_SESSION['fName'] = $resRow[1];
                        $_SESSION['lName'] = $resRow[2];
                        $_SESSION['email'] = $resRow[3];
                        $_SESSION['phone'] = $resRow[5];
                        $_SESSION['userName'] = $resRow[7];

                        $_SESSION['userName'] = $userName;

                        if (str_contains($userName,'@admin'))
                            header("location:users.php");
                        elseif (str_contains($userName,'@emp'))
                            header("location:vehicles.php");
                        else
                            header("location:../index.php");
                    }
                    else
                    {
                        echo "<script>alert('Incorrect Password!')</script>";
                    }//incorrect password
                }
                else
                {

                }//incorrect username
            }//end of for loop

        }//end of try
        catch (Exception $ex)
        {
             echo $ex;
        }
    }// end of not empty if statement

}//end of isset if statement
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CarERA | login</title>
    <link rel="icon" type="image/x-icon" href="../images/logo.png">
     <!--font awsome CDN-->
     <script src="https://kit.fontawesome.com/f77f0e307d.js" crossorigin="anonymous"></script>
    <!-- TailWind CDN -->
  <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet" href="../CSS/login.css">
</head>
<body>
    <!-- the login form -->
    <div class="bg-black text-white flex min-h-screen flex-col
    items-center pt-16 sm:justify-center sm:pt-0">
        <a href="#">
        <div class="text-foreground font-semibold text-2xl tracking-tighter mx-auto flex items-center gap-2">
            <div>
                <img class="fa-brands fa-wolf-pack-battalion fa-xl" width="50px"  height="50px" src="../images/logo.png">
            
            </div>
            CarEra 
        </div>
        </a>
        <div class="relative mt-12 w-full max-w-lg sm:mt-10">
        <div class="relative -mb-px h-px w-full bg-gradient-to-r from-transparent
        via-sky-300 to-transparent" bis_skin_checked="1">
        </div>
        <div class="mx-5 border dark:border-b-white/50 dark:border-t-white/50
                    border-b-white/20 sm:border-t-white/20 shadow-[20px_0_20px_20px] 
                    shadow-slate-500/10 dark:shadow-white/20 rounded-lg border-white/20
                    border-l-white/20 border-r-white/20 sm:shadow-sm lg:rounded-xl lg:shadow-none">
        <div class="flex flex-col p-6">
            <h3 class="text-xl font-semibold leading-6 tracking-tighter">Login</h3>
            <p class="mt-1.5 text-sm font-medium text-white/50">Welcome back, enter your credentials to continue. </p>
    </div>
    <div class="p-6 pt-0">
    <form action="LoginPage.php" method="post">
        <div>
            <div>
                <div
                    class="group relative rounded-lg border focus-within:border-sky-200 px-3 pb-1.5 pt-2.5 duration-200 
                    focus-within:ring focus-within:ring-sky-300/30">
                    <div class="flex justify-between">
                        <label
                            class="text-xs font-medium text-muted-foreground group-focus-within:text-white
                             text-gray-400">Username</label>
                        <div class="absolute right-3 translate-y-2 text-green-200">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                        fill="currentColor" class="w-6 h-6">
                                        <path fill-rule="evenodd"
                                            d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75
                                             9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75
                                              0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25
                                               2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                    </div>
                    <input type="text" name="userName" placeholder="Username" id="uNameTXT"
                        autocomplete="off"
                        class="block w-full bg-transparent p-0 text-sm file:my-1
                        file:rounded-full file:border-0 file:bg-accent file:px-4 file:py-2 
                        file:font-medium placeholder:text-muted-foreground/90 focus:outline-none focus:ring-0
                         sm:leading-7 text-foreground">
                </div>
            </div>
        </div>

        <div class="mt-4" id="passwordDiv">
            <div>
                <div
                    class="group relative rounded-lg border focus-within:border-sky-200 px-3 
                    pb-1.5 pt-2.5 duration-200 focus-within:ring focus-within:ring-sky-300/30" >
                    <div class="flex justify-between">
                        <label
                            class="text-xs font-medium text-muted-foreground group-focus-within:text-white 
                            text-gray-400">Password</label>
                    </div>
                    <div class="flex items-center">
                        <input type="password" name="userPassword"
                            class="block w-full border-0 bg-transparent p-0 text-sm
                             file:my-1 placeholder:text-muted-foreground/90 focus:outline-none 
                             focus:ring-0 focus:ring-teal-500 sm:leading-7 text-foreground">
                    </div>
                </div>
            </div>
        </div>
        <script>
            function incorrectPass()
            {
                document.getElementById('passwordDiv').style.borderColor = 'red';
            }
        </script>
        <div class="mt-4 flex items-center justify-between">
            <label class="flex items-center gap-2">
                <input type="checkbox" name="remember"
                    class="outline-none focus:outline focus:outline-sky-300">
                <span class="text-xs">Remember me</span>
            </label>
            <a class="text-sm font-medium text-foreground underline" href="ResetPassword.php">Forgot
                password?</a>
        </div>
        <div class="mt-4 flex items-center justify-end gap-x-2">
            <a class="inline-flex items-center justify-center rounded-md text-sm 
            font-medium transition-all focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 hover:bg-accent hover:ring hover:ring-white h-10 px-4 py-2 duration-200"
                href="signUp.php">Register</a>
            <button
                class="font-semibold hover:bg-black hover:text-white 
                hover:ring hover:ring-white transition duration-300 inline-flex items-center 
                justify-center rounded-md text-sm focus-visible:outline-none focus-visible:ring-2 
                focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-white 
                text-black h-10 px-4 py-2"
                type="submit">Log in</button>
        </div>
    </form>
    </div>
    </div>
    </div>
    </div>
        </div>
        <div>
        
    </div>
    
</body>
</html>