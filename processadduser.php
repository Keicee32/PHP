<?php session_start();

date_default_timezone_set("Africa/Lagos");

$errorCount = 0;


$first_name = $_POST['first_name'] != "" ? $_POST['first_name'] : $errorCount++;
$last_name = $_POST['last_name'] != "" ? $_POST['last_name'] : $errorCount++;
$email = $_POST['email'] != "" ? $_POST['email'] : $errorCount++;
$password = $_POST['password'] != ""  ? $_POST['password'] : $errorCount++;
$gender = $_POST['gender'] != "" ? $_POST['gender'] : $errorCount++;
$designation = $_POST['designation'] != "" ? $_POST['designation'] : $errorCount++;
$department = $_POST['department'] != ""  ? $_POST['department'] : $errorCount++;

$_SESSION['first_name'] = $first_name;
$_SESSION['last_name'] = $last_name;
$_SESSION['email'] = $email;
$_SESSION['password'] = $password;
$_SESSION['gender'] = $gender;
$_SESSION['designation'] = $designation;
$_SESSION['department'] = $department;

if($errorCount > 0){

    $session_error = "You have " . $errorCount . "  error";
  
   
    if($errorCount > 1){
        $session_error .= "s";
    }  
    
    $session_error .= " in your submission";
    $_SESSION['error'] = $session_error; 
    header("Location: adduser.php");
  
  } 
else
{

    //Count Users
    $user = scandir("db/users/");
    $countUser = count($user);

    $newUserId = ($countUser - 1);

    $userObject = 
    [
        'id'=>$newUserId,
        'first_name'=>$first_name,
        'last_name'=>$last_name,
        'email'=>$email,
        'password'=>password_hash($password, PASSWORD_DEFAULT), // The password_harsh() encrypts password
        'gender'=>$gender,
        'designation'=>$designation,
        'department'=>$department,
        'date'=>date("Y/m/d"),
        'time'=>date("h:i:sa"),
    ];

        //Look into user array and check if an email already exists
        for($counter = 0; $counter < $countUser; $counter++)
        {
            $currentUser = $user[$counter];

            if($currentUser == $email . ".json")
            {
                $_SESSION['error'] = "Registration failed. User exists";
                header("Location:adduser.php");
                die();
            }
        }

    file_put_contents("db/users/". $email . ".json",json_encode($userObject));
    $_SESSION['message'] = "New user added successfully!";
    header("Location:admindash.php");
}
    // This saves to the folder db/users/Patient if the designation choice is Patient..


// Validating email entry
  if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo("$email is a valid email address");
  } else {
    $_SESSION["error"] = "Invalid Email address" ;
      header("Location: adduser.php");
  }
  // validate first name 
  if (!preg_match("/^[a-zA-Z ]*$/",$first_name)) {
    $_SESSION["error"] = "For names Only letters and white space allowed" ;
      header("Location: adduser.php");
  }
  // validate second name
  if (!preg_match("/^[a-zA-Z ]*$/",$last_name)) {
    $_SESSION["error"] = "For names Only letters and white space allowed" ;
    header("Location: adduser.php");}
?>