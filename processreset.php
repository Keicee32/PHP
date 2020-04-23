<?php session_start();

$errorCount = 0;

if(!$_SESSION['loggedIn']){
    $token = $_POST['token'] != "" ? $_POST['token'] : $errorCount++;
    $_SESSION['token'] = $token;
}


$email = $_POST['email'] != "" ? $_POST['email'] : $errorCount++;
$password = $_POST['password'] != "" ? $_POST['password'] : $errorCount++;

$_SESSION['email'] = $email;

if($errorCount > 0){

    $session_error = "You have " . $errorCount . "  error";

   
    if($errorCount > 1){
        $session_error .= "s";
    }  
    
    $session_error .= " in your submission";
    $_SESSION['error'] = $session_error; 
    header("Location: reset.php");
} else {
    
    $userToken = scandir("db/token/");
    $countUserToken = count($userToken);

    for($counter = 0; $counter < $countUserToken; $counter++)
    { 
        $currentTokenFile = $userToken[$counter];

        if($currentTokenFile == $email . ".json")
        {
            $tokenContent = file_get_contents("db/token/". $currentTokenFile);
            $tokenObject = json_decode($tokenContent);
            $tokenFromDB = $tokenObject -> token; 

            if($_SESSION['loggedIn']){
                $checkToken = true;
            } else {
                $checkToken = $tokenFromDB == $token;
            }

            
            if($checkToken){

                $user = scandir("db/users/");
                $countUser = count($user);
                
                for($counter = 0; $counter < $countUser; $counter++)
                {
                    $currentUser = $user[$counter];
                    
                    if($currentUser == $email . ".json")
                    {
                        $userString = file_get_contents("db/users/". $currentUser);
                        $userObject = json_decode($userString);
                        $userObject -> password = password_hash($password, PASSWORD_DEFAULT);

                        unlink("db/users/". $currentUser);

                        file_put_contents("db/users/". $email . ".json", json_encode($userObject));

                        $_SESSION['message'] = "Password Reset Successful. You can login";

                        $subject = "Password Reset Successful";
                        $message = "Your account on snh has been updated, your password has changed. If you didn't initiate this, please visit snh.org and reset your password immediately";
                        $headers = "From: no-reply@snh.org" . "\r\n" .
                        "CC: seyi@snh.org";

                        $try= mail($email,$subject,$message,$headers);


                        header("Location:login.php");
                        die(); 
                    }
                }
            }
        }
    }

    $_SESSION['error'] = "Password Reset failed, token/email invalid or expired";
    header("Location:login.php");
}

?>