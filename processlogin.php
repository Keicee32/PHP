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
    $user = scandir("db/users/Patient");
    $users = scandir("db/users/Medical");
    $countUser = count($user);
    $countUsers = count($users);
    

    for($counter = 0; $counter < $countUser; $counter++)
        {
            $currentUser = $user[$counter];
            $currentUser1 = $users[$counter];

            if($currentUser == $email . ".json")
            {
                $userstring = file_get_contents("db/users/Patient/".$currentUser);
                $userObject = json_decode($userstring);
                $passwordFromDB = $userObject->password;

                $passwordFromUser = password_verify($password, $passwordFromDB);

                if($passwordFromDB == $passwordFromUser)
                {
                    $_SESSION['loggedIn'] = $userObject->id;
                    $_SESSION['fullname'] = $userObject->first_name . " " . $userObject->last_name;
                    $_SESSION['role'] = $userObject->designation;
                    $_SESSION['time'] = $userObject->time;
                    $_SESSION['date'] = $userObject->date;
                    header('location:patientdash.php');
                    die();
                }
                
            }
            else if($currentUser1 == $email . ".json")
            {
                $userstring1 = file_get_contents("db/users/Medical/".$currentUser1);
                $userObject = json_decode($userstring1);
                $passwordFromDB = $userObject->password;

                $passwordFromUser = password_verify($password, $passwordFromDB);

                if($passwordFromDB == $passwordFromUser)
                {
                    $_SESSION['loggedIn'] = $userObject->id;
                    $_SESSION['fullname'] = $userObject->first_name . " " . $userObject->last_name;
                    $_SESSION['role'] = $userObject->designation;
                    $_SESSION['time'] = $userObject->time;
                    $_SESSION['date'] = $userObject->date;
                    header('location:meddash.php');
                    die();
                }
                
            }
        }

    $_SESSION['error'] = "Invalid email or password";
    header("Location:login.php");
    die();
}

?>