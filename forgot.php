<?php 
include_once("lib/header.php");
include_once("lib/footer.php");?>

        <h1>Forgot password? </h1>
        <p>Provide the email address associated with the account</p>
            <p>
                <?php
                    if(isset($_SESSION['error']) && !empty($_SESSION['error']))
                    {
                        echo "<span style='color: red'>" . $_SESSION['error'] . "</span>";
                        session_destroy();
                    }
                ?>
            </p>

                <form action="processforgot.php" method="POST">
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

                    <p> <button type="submit"> Submit</button></p>
                </form>