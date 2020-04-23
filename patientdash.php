<?php
include_once("lib/header.php");
require_once('functions/alert.php');

if(!isset($_SESSION['loggedIn'])){
   // header("Location:login.php");
}
?>

<?php 
include_once("lib/patientfooter.php");
?> 

<p>
  <?php print_error(); print_message(); ?>
</p>

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
                $email = $_SESSION['email'];
                $alldate = scandir("date/");

                $countAllUsers = count($alldate);

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

</div>


    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
        <h3 class="display-4">Welcome to SNH: Hospital for the ignorant</h3><br/>
        <p class="lead">This is a specialist hospital to cure ignorance.</p>
        <p class="lead">Come as you are, its completely free!</p>
    </div>