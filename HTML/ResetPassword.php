
<?php
require '../vendor/autoload.php';
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
$conn = new mysqli("localhost", "root", "", "webProj");
$verificationCode = rand(100000, 999999);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}else {
if (isset($_POST['SendVerificatoionCode'])) {
     $email = $_POST['Email'];
    $sql = "SELECT * FROM members WHERE email = '$email'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Replace with your SMTP server
        $mail->Port = 587;
        $mail->SMTPAuth = true;
        $mail->Username = 'carera1111111@gmail.com'; // Replace with your email
        $mail->Password = 'wpzt djww zvhs zlhs'; // Replace with your email password
        $mail->SMTPSecure = 'tls'; // Enable encryption

        $mail->setFrom('carera1111111@gmail.com', 'CarEra');
        $mail->addAddress($email);
        $mail->Subject = 'CarEra Password Reset Verification';
        $mail->isHTML(true); // Set email format to HTML

        $body = "<h3>Your CarEra Password Reset Verification Code</h3>";
        $body .= "<p>Here is your verification code to reset your password: <strong>$verificationCode</strong></p>";
        $body .= "<p>Please enter this code on the CarEra password reset page.</p>";
        $mail->Body = $body;


        $_SESSION['verification_code'] = $verificationCode;
        $_SESSION['email_for_verification'] = $email;
         if (!$mail->send()) {
             echo "<script>alert('Mailer Error: ' . $mail->ErrorInfo);</script>";
         } else {
             echo "<script>alert('Verification code sent to your email.');</script>";
         }

  } else {
    echo 'Email address not found.';
  }

    }

}if (isset($_POST['Verify'])){
    $enteredCode = $_POST['RecivedCode'];
    $storedCode = $_SESSION['verification_code'];
    $storedEmail = $_SESSION['email_for_verification'];
    // Check if email and verification code match
    $sql = "SELECT * FROM `members` WHERE `Email` = ? ";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $storedEmail);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Successful verification: update password with a secure hash

        //$hashedPassword = sha1("321", true); // Hash the password

       // $updateSql = "UPDATE `members` SET `Password` = ?, `VerificationCode` = NULL WHERE `email` = ?";
       // $updateStmt = $conn->prepare($updateSql);
       // $updateStmt->bind_param("ss", $hashedPassword, $storedEmail);
       // $updateStmt->execute();

        echo "<script> location.href = 'Resittingform.php';</script>";
    } else {
        echo "<script>alert('Invalid verification code.');</script>";
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CarERA | Reset Password</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="../images/logo.png">

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
                <h3 class="text-xl font-semibold leading-6 tracking-tighter">CarEra Is Missing You</h3>
                <p class="mt-1.5 text-sm font-medium text-white/50">Return Your Account  </p>
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
                             text-gray-400">Your Email that Belongs for that aacount</label>
                                    <div class="absolute right-3 translate-y-2 text-green-200">

                                    </div>
                                </div>
                                <input type="text" name="Email" placeholder="Email"
                                       autocomplete="off"
                                       class="block w-full border-0 bg-transparent p-0 text-sm file:my-1
                        file:rounded-full file:border-0 file:bg-accent file:px-4 file:py-2
                        file:font-medium placeholder:text-muted-foreground/90 focus:outline-none focus:ring-0
                         sm:leading-7 text-foreground">
                            </div>
                        </div>
                    </div>

                    <div class="mt-4 flex items-center justify-end gap-x-2">

                        <button name="SendVerificatoionCode" id="SendVerificatoionCode"
                            class="font-semibold hover:bg-black hover:text-white
                hover:ring hover:ring-white transition duration-300 inline-flex items-center
                justify-center rounded-md text-sm focus-visible:outline-none focus-visible:ring-2
                focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-white
                text-black h-10 px-4 py-2"
                            type="submit">Send Verification Code </button>
                    </div>
                </form>
                <br>

                <!--The Second Verifing Form-->
                <form method="post">
                    <div>
                        <div>
                            <div
                                class="group relative rounded-lg border focus-within:border-sky-200 px-3 pb-1.5 pt-2.5 duration-200
                    focus-within:ring focus-within:ring-sky-300/30">
                                <div class="flex justify-between">
                                    <label
                                        class="text-xs font-medium text-muted-foreground group-focus-within:text-white
                             text-gray-400">The Rcived CODE</label>
                                    <div class="absolute right-3 translate-y-2 text-green-200">

                                    </div>
                                </div>
                                <input type="text" name="RecivedCode" placeholder="Enter The code you Have Recived Via Your Email"
                                       autocomplete="off" id="RecivedCode"
                                       class="block w-full border-0 bg-transparent p-0 text-sm file:my-1
                        file:rounded-full file:border-0 file:bg-accent file:px-4 file:py-2
                        file:font-medium placeholder:text-muted-foreground/90 focus:outline-none focus:ring-0
                         sm:leading-7 text-foreground">
                            </div>
                        </div>
                    </div>
                    <br>

                        <button name="Verify" id="Verify"
                                class="font-semibold hover:bg-black hover:text-white
                hover:ring hover:ring-white transition duration-300 inline-flex items-center
                justify-center rounded-md text-sm focus-visible:outline-none focus-visible:ring-2
                focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-white
                text-black h-10 px-4 py-2"
                                type="submit">Verify </button>
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