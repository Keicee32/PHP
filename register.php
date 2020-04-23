<?php 

include_once("lib/header.php");
require_once('functions/alert.php');

if(isset($_SESSION['loggedIn']) && !empty($_SESSION['loggedIn'])){
    //header("Location:patientdash.php");
}

include_once("lib/footer.php");
?>


<div class="container">
    <div class="row col-6">
        <h2>Register here</h2><br/>
    </div>

    <div class="row col-6">
        <p><strong>Welcome, Please Register</strong></p>
    </div>

    <div class="row col-6">
        <p>All fields are Required</p><br/>
    </div>


    <div class="row col-6">
        <form method="POST" action="processregister.php">
            <p>
                <?php print_error(); ?>
            </p>

            <p>
                <label>First Name:</label><br/>
                <input type="text" name="first_name" class="form-control" pattern="[a-zA-Z]{2,}" title="Name must not be less than 2 or left blank" placeholder="Enter First Name" />
            </p>

            <p>
                <label>Last Name</label></br>
                <input type="text" name="last_name" class="form-control" pattern="[a-zA-Z]{2,}" title="Name must not be less than 2 or left blank" placeholder="Enter Last Name" />
            </p>

            <p>
                <label>Email</label></br>
                <input type="email" class="form-control" name="email" placeholder="Email" />
            </p>

            <p>
                <label>Password</label></br>
                <input type="password" class="form-control" name="password" placeholder="Password" />
            </p>

            <p>
                <label>Gender</label>
                <select class="form-control" name="gender" >
                    <option value="">Select gender</option>
                    <option
                        <?php
                            if(isset($_SESSION['gender']) && $_SESSION['gender'] == 'Male'){
                                echo "selected";
                            }
                        ?>
                    >Male</option>
                    <option
                    
                        <?php
                            if(isset($_SESSION['gender']) && $_SESSION['gender'] == 'Female'){
                                echo "selected";
                            }
                        ?>
                    >Female</option>
                </select>
            </p>
            
            <p>
                <label>Designation:</label>
                <select class="form-control" name="designation" >
                    <option value="">Select designation</option>
                    <option
                        <?php
                            if(isset($_SESSION['designation']) && $_SESSION['designation'] == 'Medical Team'){
                                echo "selected";
                            }
                        ?>
                    >Medical Team</option>
                    <option
                        <?php
                            if(isset($_SESSION['designation']) && $_SESSION['designation'] == 'Patient'){
                                echo "selected";
                            }
                        ?>
                    >Patient</option>
                </select>
            </p>

            <p>
                <label>Department</label><br/>
                <input 
                    <?php
                        if(isset($_SESSION['department'])){
                            echo "value=" . $_SESSION['department'];
                        }
                    ?>
                
                type="text" class="form-control" name="department" placeholder="Department" />
            </p>

            <p>
                <button class="btn btn-success" type="submit">Register</button>
            </p>

            <p>
                <a href="forgot.php">Forgot Password</a><br/>
                <a href="login.php">Already have an account? Login</a>
            </p>

        </form>

    </div>

</div>