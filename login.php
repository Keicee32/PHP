<?php
if(isset($_SESSION['loggedIn']) && !empty($_SESSION['loggedIn'])){
    header("Location:dashboard.php");
}
include_once("lib/header.php");
include_once("lib/footer.php");?>
    <p>
        <?php
            if(isset($_SESSION['message']) && !empty($_SESSION['message']))
            {
                echo "<span style='color:green'>" . $_SESSION['message'] . "</span>";
                session_destroy();
            }
        ?>
    </p>
    
        <h2>Login here</h2>

            <form method="POST" action="processlogin.php">
            
            <p>
                <?php
                    if(isset($_SESSION['error']) && !empty($_SESSION['error']))
                    {
                        echo "<span style='color:red'>" . $_SESSION['error'] . "</span>";
                        session_destroy();
                     }
                ?>
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

            <button type="submit">Submit</button>
            </form>