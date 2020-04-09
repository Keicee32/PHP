<?php
include_once("lib/header.php");

if(!isset($_SESSION['loggedIn'])){
    header("Location:login.php");
}
?>

<?php
include_once("lib/footer.php");
?>

   <!-- Welcome, <?php echo $_SESSION['fullname']?>. You are logged in as (<?php echo $_SESSION['role']?>)
    and your ID is <?php echo $_SESSION['loggedIn']?> -->
    <h3> DashBoard </h3>
    
