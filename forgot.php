<?php 
include_once("lib/header.php");
require_once('functions/alert.php');

include_once("lib/footer.php");

?>

<h3> Forgot Password</h3>
<p> Provide the email associated with this account </p>

        <form action="processforgot.php" method="POST">

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

            <button type="submit"> Send Reset Code</button>

            </form>