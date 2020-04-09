<?php 
if(isset($_SESSION['loggedIn']) && !empty($_SESSION['loggedIn'])){
    header("Location:dashboard.php");
}
include_once("lib/header.php");
include_once("lib/footer.php");
?>

    <h2>Register here</h2><br/>
    <p><strong>Welcome, Please Register</strong></p>
    <p>All fields are Required</p><br/>



        <form method="POST" action="processadduser.php">
            <p>
                <?php
                    if(isset($_SESSION['error']) && !empty($_SESSION['error'])){
                        echo "<span style='color: red'>" . $_SESSION['error'] . "</span>";

                       // session_unset();
                        session_destroy();
                    }
                ?>
            </p>

            <p>
                <label>First Name:</label><br/>
                <input type="text" name="first_name" pattern="[a-zA-Z]{2,}" title="Name must not be less than 2 or left blank" placeholder="Enter First Name" />
            </p>

            <p>
                <label>Last Name</label></br>
                <input type="text" name="last_name" pattern="[a-zA-Z]{2,}" title="Name must not be less than 2 or left blank" placeholder="Enter Last Name" />
            </p>

            <p>
                <label>Email</label></br>
                <input type="email" name="email" placeholder="Email" />
            </p>

            <p>
                <label>Password</label></br>
                <input type="password" name="password" placeholder="Password" />
            </p>

            <p>
                <label>Gender</label>
                <select name="gender" >
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
                <select name="designation" >
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
                
                type="text" name="department" placeholder="Department" />
            </p>

            <p>
                <button type="submit">Submit</button>
            </p>

        </form>

