<?php
$conn = new mysqli("localhost", "root", "", "webProj");
session_start();
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}else{
    if (isset($_POST['Submissionnewpassword'])){
        if ($_POST['password']===$_POST['password1']){
            $Email = $_SESSION['email_for_verification'];
            $password=$_POST['password'];
            $hashedPassword = sha1($password); // Hash the password

            $updateSql = "UPDATE `members` SET `Password` = ? WHERE `email` = ?";
            $updateStmt = $conn->prepare($updateSql);
            $updateStmt->bind_param("ss", $hashedPassword, $Email); // Correct binding

            if ($updateStmt->execute()){
                session_destroy();
                echo "<script>alert('New password is reseted '); location.href = 'Services.php';</script>";
            }

        }
        else{
            echo "<script>alert('The two psswords are different ');</script>";
        }


    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!--font awsome CDN-->
    <script src="https://kit.fontawesome.com/f77f0e307d.js" crossorigin="anonymous"></script>
    <!-- TailWind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

</head>
<body>

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
                <h3 class="text-xl font-semibold leading-6 tracking-tighter">Reset Your Password </h3>
                <p class="mt-1.5 text-sm font-medium text-white/50"> enter your New Password to continue. </p>
            </div>
            <div class="p-6 pt-0">
                <form method="post">
                    <div>
                        <div>
                            <div
                                class="group relative rounded-lg border focus-within:border-sky-200 px-3 pb-1.5 pt-2.5 duration-200
                    focus-within:ring focus-within:ring-sky-300/30">
                                <div class="flex justify-between">
                                    <label
                                        class="text-xs font-medium text-muted-foreground group-focus-within:text-white
                             text-gray-400">Password</label>

                                </div>
                                <input type="password" name="password1" placeholder="Password"
                                       autocomplete="off"
                                       class="block w-full border-0 bg-transparent p-0 text-sm file:my-1
                        file:rounded-full file:border-0 file:bg-accent file:px-4 file:py-2
                        file:font-medium placeholder:text-muted-foreground/90 focus:outline-none focus:ring-0
                         sm:leading-7 text-foreground">
                            </div>
                        </div>
                    </div>
                    <div class="mt-4">
                        <div>
                            <div
                                class="group relative rounded-lg border focus-within:border-sky-200 px-3
                    pb-1.5 pt-2.5 duration-200 focus-within:ring focus-within:ring-sky-300/30">
                                <div class="flex justify-between">
                                    <label
                                        class="text-xs font-medium text-muted-foreground group-focus-within:text-white
                            text-gray-400"> Reenter the new Password</label>
                                </div>
                                <div class="flex items-center">
                                    <input type="password" name="password"
                                           class="block w-full border-0 bg-transparent p-0 text-sm
                             file:my-1 placeholder:text-muted-foreground/90 focus:outline-none
                             focus:ring-0 focus:ring-teal-500 sm:leading-7 text-foreground">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4 flex items-center justify-end gap-x-2">
                        <button name="Submissionnewpassword"
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