<?php
include_once("lib/header.php");
require_once('functions/alert.php');

if(!isset($_SESSION['loggedIn'])){ 
    //header("Location:login.php");
}

include_once("lib/adminfooter.php");
?>



<div class="container">

  <div class="row col-6">
    <h3> DashBoard </h3>
  </div>

    <p>Welcome, <?php echo $_SESSION['fullname']?>. You are logged in as (<?php echo $_SESSION['role']?>).
    Your account was created on <?php echo $_SESSION['date']?> by <?php echo $_SESSION['time']?>.
   
    <!--and your ID is <?php echo $_SESSION['loggedIn']?>-->
    </p>

    <p>
        Last Login
        <?php

            $alldate = scandir("date/");
            $countAllUsers = count($alldate);

            $email = $_SESSION['email'];

            for ($counter = 0; $counter < $countAllUsers; $counter++ ){

                $currentdate = $alldate[$counter];

                 if($currentdate == ".json"){
                    $userString = file_get_contents("date/". $currentdate);
                    $userdate = json_decode($userString);
                    $_SESSION ["lastLogin"] = $userdate -> lastLogin;
                    echo $_SESSION["lastLogin"];
                    die();
                }
            }
        ?>
    </p>

</div>

    
