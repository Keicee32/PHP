<?php
include_once("lib/header.php");
require_once('functions/user.php');
require_once('functions/alert.php');


include_once("lib/medfooter.php");

?>


<div class="container">
    <div class="row col-6">
        <h3> Appointment Schedules </h3>
    </div>
            <!-- <div class="row col-6">
                <p>
                    <table>
                        <tr>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Nature of Appointment</th>
                            <th>Initial Complaint</th>
                            <th>Department</th>
                        </tr>
                        <?php $tableContent = showappointment();
                        echo $tableContent; ?>
                    </table>
                </p>
            </div> -->
</div>

<table class="table table-sm table-bordered center">

<p>
    <?php print_message(); ?>
</p>

    <thead class="thead-dark">
        <tr>
            <th >#</th>
            <th >Name</th>
            <th >Date</th>
            <th >Time</th>
            <th >Nature</th>
            <th >Complaint</th>
            <th >Department</th>
        </tr>
  </thead>
  <?php $tableContent = showAppointment();
  echo $tableContent; ?>
</table>