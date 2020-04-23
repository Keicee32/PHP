<?php
include_once("lib/header.php");
require_once('functions/user.php');

if(!isset($_SESSION['loggedIn'])){ 
    header("Location:login.php");
}
include_once("lib/adminfooter.php");
?>


<table class="table table-sm table-bordered center">

    <thead class="thead-dark">
        <tr>
            <th >#</th>
            <th >First Name</th>
            <th >Last Name</th>
            <th >Email</th>
            <th >Department</th>
        </tr>
  </thead>
  <?php $tableContent = showPatient();
  echo $tableContent; ?>
</table>