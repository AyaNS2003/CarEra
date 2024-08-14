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

    if(isset($_POST["Password"]) and isset($_POST["confPass"]))
    {
        if($_POST["Password"] == $_POST["confPass"])
        {
            $first_name = $_POST["FirstName"];
            $last_name = $_POST["LastName"];
            $E_mail = $_POST["E_mail"];
            $Phone = $_POST["Phone"];
            $Username = $_POST["Username"];
            $Password = $_POST["Password"];
            $ID = $_POST["ID"];
            if($_POST['Username']->contains('@admin'))
                $userLevel = 1;
            elseif($_POST['Username']->contains('@emp'))
                $userLevel = 2;
            else
                $userLevel = 3;
            try
            {
                $db = new mysqli('localhost','root','','carera');
                $qry1 = "select * from members where ID = $ID";
                if($db->query($qry1))
                    echo 'unacceptable ID, try another one!';
                $qry2 = "INSERT INTO `members` (`ID`, `firstName`, `lastName`, `Email`, `Password`, `tel`, `memberLevel`, `userName`) ".
                        "VALUES ('".$ID."', '".$first_name."', '".$last_name."','".$E_mail."', SHA1('".$Password."'), '".$Phone."',".$userLevel.",'".$Username."');";
                $db->commit();
                $db->close();

                echo 'added succefully!';

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
    <title>CarERA | Register</title>
    <link rel="icon" type="image/x-icon" href="../images/logo.png">
    
    <!--font awsome CDN-->
    <script src="https://kit.fontawesome.com/f77f0e307d.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../CSS/Register.css">
     <!-- TailWind CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
    
</head>
<body>

  <!-- the login form -->
  <div class="bg-black text-white flex min-h-screen flex-col items-center pt-16 sm:justify-center sm:pt-0">
      <a href="#">
          <div class="text-foreground font-semibold text-2xl tracking-tighter mx-auto flex items-center gap-2">
              <div>
                  <img class="" width="50px"  height="50px" src="../images/logo.png">
              </div>
              CarEra
          </div>
      </a>
      <div class="relative mt-12 w-full max-w-lg sm:mt-10">
      <div class="relative -mb-px h-px w-full bg-gradient-to-r from-transparent via-sky-300 to-transparent" bis_skin_checked="1"></div>

      <div class="mx-5 border dark:border-b-white/50 dark:border-t-white/50
                  border-b-white/20 sm:border-t-white/20 shadow-[20px_0_20px_20px] 
                  shadow-slate-500/10 dark:shadow-white/20 rounded-lg border-white/20
                  border-l-white/20 border-r-white/20 sm:shadow-sm lg:rounded-xl lg:shadow-none">
      <div class="flex flex-col p-6">
          <h3 class="text-xl font-semibold leading-6 tracking-tighter">Register</h3>
          <p class="mt-1.5 text-sm font-medium text-white/50"> Gear Up for Exclusive Deals – Join CarEra ! </p>
      </div>

      <!--form div-->
      <div class="p-6 pt-0">
        <form id="regForm" action="Register.php" method="post">
          
              <!-- One "tab" for each step in the form: -->
              <!--first name aand last name-->
              <div class="tab">
                <h1>Personal Information</h1>
                <br>
                <div>
                  <div class="group relative rounded-lg border focus-within:border-sky-200 px-3 pb-1.5 pt-2.5 duration-200 focus-within:ring focus-within:ring-sky-300/30">
                      <div class="flex justify-between">
                          <label class="text-xs font-medium text-muted-foreground group-focus-within:text-white text-gray-400">First Name</label>
                      </div>
                      <input type="text" name="FirstName" oninput="this.className = ''" placeholder="First Name"
                          autocomplete="off" required
                             class="block w-full border-0 bg-transparent p-2 text-sm file:my-1
                              file:rounded-full file:border-0 file:bg-accent file:px-4 file:py-2
                              file:font-medium placeholder:text-muted-foreground/90 focus:outline-none focus:ring-0
                               sm:leading-7 text-foreground">
                  </div>
              </div>
              <br>
              <div>
                <div
                    class="group relative rounded-lg border focus-within:border-sky-200 px-3 pb-1.5 pt-2.5 duration-200
                    focus-within:ring focus-within:ring-sky-300/30">
                    <div class="flex justify-between">
                        <label class="text-xs font-medium text-muted-foreground group-focus-within:text-white text-gray-400">Last Name </label>
                        <div class="absolute right-3 translate-y-2 text-green-200">

                        </div>
                    </div>
                    <input type="text" name="LastName" oninput="this.className = ''" placeholder="Last Name"
                        autocomplete="off" required
                        class="block w-full border-0 bg-transparent p-0 text-sm file:my-1
                        file:rounded-full file:border-0 file:bg-accent file:px-4 file:py-2
                        file:font-medium placeholder:text-muted-foreground/90 focus:outline-none focus:ring-0
                         sm:leading-7 text-foreground">
                    </div>
               </div>
              </div>

              <!--email and phone number-->
              <div class="tab">
                <h1>Contact Info:</h1>
                <br>
                <div>
                  <div
                      class="group relative rounded-lg border focus-within:border-sky-200 px-3 pb-1.5 pt-2.5 duration-200
                      focus-within:ring focus-within:ring-sky-300/30">
                      <div class="flex justify-between">
                          <label
                              class="text-xs font-medium text-muted-foreground group-focus-within:text-white
                               text-gray-400">"E-mail</label>
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
                      <input type="email" name="E-mail" oninput="this.className = ''" placeholder="E-mail..."
                          autocomplete="off" style="border-style: none;border-color: black;"
                          class="block w-full border-0 bg-transparent p-0 text-sm file:my-1
                          file:rounded-full file:border-0 file:bg-accent file:px-4 file:py-2
                          file:font-medium placeholder:text-muted-foreground/90 focus:outline-none focus:ring-0
                           sm:leading-7 text-foreground" >
                  </div>
              </div>
              <br>
              <div>
                <div
                    class="group relative rounded-lg border focus-within:border-sky-200 px-3 pb-1.5 pt-2.5 duration-200
                    focus-within:ring focus-within:ring-sky-300/30">
                    <div class="flex justify-between">
                        <label
                            class="text-xs font-medium text-muted-foreground group-focus-within:text-white
                             text-gray-400">Phone Number</label>
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
                    <input type="tel" name="Phone" oninput="this.className = ''" placeholder="+970 (056/9 *** ****)"
                        autocomplete="off"
                        class="block w-full border-0 bg-transparent p-0 text-sm file:my-1
                        file:rounded-full file:border-0 file:bg-accent file:px-4 file:py-2
                        file:font-medium placeholder:text-muted-foreground/90 focus:outline-none focus:ring-0
                         sm:leading-7 text-foreground" style="border-style: none;border-color: black;">
                    </div>
               </div>
              </div>

              <!--ID, username and password-->
              <div class="tab">
                <h1>Login Info:</h1>
                <br>

                <div>
                    <!--ID-->
                    <div
                            class="group relative rounded-lg border focus-within:border-sky-200 px-3 pb-1.5 pt-2.5 duration-200
                      focus-within:ring focus-within:ring-sky-300/30">
                        <div class="flex justify-between">
                            <label
                                    class="text-xs font-medium text-muted-foreground group-focus-within:text-white
                               text-gray-400">ID</label>
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
                        <input type="text" name="ID" oninput="this.className = ''" placeholder="User Name"
                               autocomplete="off"
                               class="block w-full border-0 bg-transparent p-0 text-sm file:my-1
                          file:rounded-full file:border-0 file:bg-accent file:px-4 file:py-2
                          file:font-medium placeholder:text-muted-foreground/90 focus:outline-none focus:ring-0
                           sm:leading-7 text-foreground"style="border-style: none; border-color: black;">
                    </div>
                    <!--username-->
                    <div
                          class="group relative rounded-lg border focus-within:border-sky-200 px-3 pb-1.5 pt-2.5 duration-200
                          focus-within:ring focus-within:ring-sky-300/30">
                          <div class="flex justify-between">
                              <label
                                  class="text-xs font-medium text-muted-foreground group-focus-within:text-white
                                   text-gray-400">User Name</label>
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
                          <input type="text" name="Username" oninput="this.className = ''" placeholder="User Name"
                              autocomplete="off"
                              class="block w-full border-0 bg-transparent p-0 text-sm file:my-1
                              file:rounded-full file:border-0 file:bg-accent file:px-4 file:py-2
                              file:font-medium placeholder:text-muted-foreground/90 focus:outline-none focus:ring-0
                               sm:leading-7 text-foreground"style="border-style: none; border-color: black;">
                      </div>
                    <!--password-->
                    <div
                            class="group relative rounded-lg border focus-within:border-sky-200 px-3 pb-1.5 pt-2.5 mb-5 duration-200
                        focus-within:ring focus-within:ring-sky-300/30">
                        <div class="flex justify-between">
                            <label
                                    class="text-xs font-medium text-muted-foreground group-focus-within:text-white
                                 text-gray-400">Password</label>
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
                        <input type="password" name="pass" oninput="this.className = ''" placeholder="Password..."
                               autocomplete="off"
                               class="block w-full border-0 bg-transparent p-0 text-sm file:my-1
                            file:rounded-full file:border-0 file:bg-accent file:px-4 file:py-2
                            file:font-medium placeholder:text-muted-foreground/90 focus:outline-none focus:ring-0
                             sm:leading-7 text-foreground" style="border-style: none; border-color: black;">
                    </div>
                    <!--confirm password-->
                    <div
                            class="group relative rounded-lg border focus-within:border-sky-200 px-3 pb-1.5 pt-2.5 duration-200
                    focus-within:ring focus-within:ring-sky-300/30">
                        <div class="flex justify-between">
                            <label
                                    class="text-xs font-medium text-muted-foreground group-focus-within:text-white
                             text-gray-400">Confirm Password</label>
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
                        <input type="password" name="confPass" oninput="this.className = ''" placeholder="Confirm Password..."
                               autocomplete="off"
                               class="block w-full border-0 bg-transparent p-0 text-sm file:my-1
                        file:rounded-full file:border-0 file:bg-accent file:px-4 file:py-2
                        file:font-medium placeholder:text-muted-foreground/90 focus:outline-none focus:ring-0
                         sm:leading-7 text-foreground" style="border-style: none; border-color: black;">
                    </div>
                </div><!--End of form-->
              </div> <!--end of tab-->


              <div class="tab" >
                <div style=" display: flex;justify-content: center;">
                  <br>
                  <h1 style="font-size: 40px; font-family: Raleway;">Now You Can Buy Your Dream Car...... </h1>
                  <br>
                  <br>
                </div>
              </div>
              <div style="overflow:auto;">
              <div style="float:left; padding: 20px;">

                <button type="button"class="font-semibold hover:bg-black hover:text-white
                hover:ring hover:ring-white transition duration-300 inline-flex items-center
                justify-center rounded-md text-sm focus-visible:outline-none focus-visible:ring-2
                focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-white
                text-black h-10 px-4 py-2" id="prevBtn" onclick="nextPrev(-1)">Previous</button>

                <button type="button" class="font-semibold hover:bg-black hover:text-white
                hover:ring hover:ring-white transition duration-300 inline-flex items-center
                justify-center rounded-md text-sm focus-visible:outline-none focus-visible:ring-2
                focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-white
                text-black h-10 px-4 py-2" id="nextBtn" onclick="nextPrev(1)">Next</button>

                  <input type="submit" id="submitBTN" value="Register Now!">
              </div>
            </div>
             <!-- Circles which indicates the steps of the form: -->
            <div style="text-align:center;margin-top:40px;">
              <span class="step"></span>
              <span class="step"></span>
              <span class="step"></span>
              <span class="step"></span>
            </div>

        </form>
      </div>
                     </div>
                </div>
            </div>
       </div>
   <div>
</div>
  
        <script src="../JS/Register.js"></script>
</body>
</html>