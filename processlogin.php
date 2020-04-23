<?php session_start();

$errorCount = 0;

$email = $_POST['email'] != "" ? $_POST['email'] : $errorCount++;
$password = $_POST['password'] != ""  ? $_POST['password'] : $errorCount++;

$_SESSION['email'] = $email;

if($errorCount > 0)
{
    $_SESSION["error"] = "You have " . $errorCount . " error(s) in your form submission";
    header('location:login.php?');
    die();

} else
{
    $user = scandir("db/users/");
    $countUser = count($user);
    
    for($counter = 0; $counter < $countUser; $counter++)
    {
        $currentUser = $user[$counter];
        
        if($currentUser == $email . ".json")
        {
            $userString = file_get_contents("db/users/". $currentUser);
            $userObject = json_decode($userString);
            $passwordFromDB = $userObject -> password;

            $passwordFromUser = password_verify($password, $passwordFromDB);

            if($passwordFromDB == $passwordFromUser){
                    $_SESSION['loggedIn'] = $userObject->id;
                    $_SESSION['email'] = $userObject->email;
                    $_SESSION['fullname'] = $userObject->first_name . " " . $userObject->last_name;
                    $_SESSION['role'] = $userObject->designation;
                    $_SESSION['time'] = $userObject->time;
                    $_SESSION['date'] = $userObject->date;
                    $_SESSION['deparment'] = $userObject->department;
                    if ($_SESSION["role"] == "Patient"){
        
                        header('location:patientdash.php');
                        die();
                      } elseif ($_SESSION["role"] == "Admin") {
                        header("Location: admindash.php");
                      } else {
                        header("Location: meddash.php");
                       }
            } else{
                $_SESSION['error'] = "Invalid email or password";
                header("Location:login.php");
                
            } die();
        }
    }  
}

    $_SESSION['error'] = "Invalid email or password";
    header("Location:login.php");
    die();


?>