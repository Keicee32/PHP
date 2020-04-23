<?php 
include_once("lib/header.php");
require_once('functions/alert.php');

if(isset($_SESSION['loggedIn']) && !empty($_SESSION['loggedIn'])){
    //header("Location:dashboard.php");
}


include_once("lib/patientfooter.php");

?>
<h3> Book Appointment </h3>

<br/>
    <form method="POST" action="processappointment.php">

        <p>
            <?php print_error();?>
        </p>

        <p>
            <label>Date of Appointment</label></br>
            <input type="date" name="date" />
        </p> <br/>

        <p>
            <label>Time of Appointment</label></br>
            <input type="time" name="time" />
        </p> <br/>

        <p>
            <label>Nature of Appointment</label></br>
                <select name="nature">
                    <option value="">Select Nature of Appointment</option>
                    <option>Critical</option>
                    <option>Urgent</option>
                    <option>Important</option>
                </select>   
        </p> <br/>

        <p>
        <label>Initial Complaint</label><br/>
        <textarea name="message" class="form-control" placeholder="Initial Complaint"></textarea>
        </p> <br/>

        <p>
            <label>Department</label></br>
                <select name="department">
                    <option value="">Select Department</option>
                    <option>Optometry</option>
                    <option>Gynaecology</option>
                    <option>Dentistry</option>
                    <option>Dermatology</option>
                    <option>General Health</option>
                </select>   
        </p> <br/>


        <p>
                <button type="submit">Submit</button>
        </p>


    </form>

