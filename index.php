<?php include_once("lib/header.php");
 include_once("lib/footer.php");?>
<p>WELCOME</p>
<p>
        <?php
            if(isset($_SESSION['message']) && !empty($_SESSION['message']))
            {
                echo "<span style='color:blue'>" . $_SESSION['message'] . "</span>";
                session_destroy();
            }
        ?>
    </p>