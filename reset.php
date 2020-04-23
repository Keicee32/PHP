<?php 

include_once("lib/header.php");
require_once('functions/alert.php');
require_once('functions/user.php');

include_once("lib/footer.php");

if(!isset($_SESSION['loggedIn'])  && !isset($_GET['token']) && !isset($_SESSION['token'])){
    $_SESSION["error"] = "You are not authorized to view that page";
    header("Location:login.php");

    //Check that the token matches
}


// if(!is_user_loggedIn() && !is_token_set()){
//         $_SESSION["error"] = "You are not authorized to view that page";
//         header("Location:login.php");
    
//         //Check that the token matches
//     }


?>

<h3> Reset Password</h3>
<p> Reset Password associated with this account : {email}</p>

        <form action="processreset.php" method="POST">

            <p>
                <?php print_error(); ?>
            </p> 

            <?php if(!isset($_SESSION['loggedIn'])) /*if(!is_user_loggedIn())*/ { ?>

                <input 

                    <?php
                       if(isset($_SESSION['token'])){
                           echo "value=" . $_SESSION['token']. "";
                       }else{
                           echo "value=" . $_GET['token'] . "";
                       }
                    ?>

                type="hidden" name="token" />
            <?php } ?>
                
            <p>
                <label>Email</label></br>
                <input 
                
                    <?php
                       if(isset($_SESSION['email'])){
                           echo "value=" . $_SESSION['email']. "";
                       }
                    ?>

                type="email" name="email" placeholder="Email" />
            </p>

            <p>
                <label>Enter New Password</label></br>
                <input type="password" name="password" placeholder="Password" />
            </p>

            <button type="submit"> Send Reset Code</button>

            </form>