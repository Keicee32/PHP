<?php

include_once("lib/header.php");
require_once('functions/alert.php');

if(isset($_SESSION['loggedIn']) && !empty($_SESSION['loggedIn'])){
    //header("Location:dashboard.php");
}

include_once("lib/footer.php");
?>
    <p>
        <?php print_message(); ?>
    </p>
    
    <div class="container">

        <div class="row col-6">
            <h3>Login here</h3>
        </div>

        <div class="row col-6">
            <form method="POST" action="processlogin.php">
            
            <p>
                <?php print_error(); ?>
            </p>

            <p>
                <label>Email</label></br>
                <input 
                    <?php
                        if(isset($_SESSION['email'])){
                            echo "value=" . $_SESSION['email'];
                        }
                    ?>
                
                type="email" name="email" placeholder="Email" />
            </p>

            <p>
                <label>Password</label></br>
                <input type="password" name="password" placeholder="Password" />
            </p>

            <button class="btn btn-primary" type="submit">Submit</button> 
           

            <p>
                <a href="forgot.php">Forgot Password</a><br/>
                <a href="register.php">Not Registered? Register</a>
            </p>

            </form>

         </div>

    </div>