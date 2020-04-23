<?php session_start();
require_once('functions/alert.php');

//Collecting the data

$errorCount = 0;

$email = $_POST['email'] != "" ? $_POST['email'] : $errorCount++;


$_SESSION['email'] = $email;

if($errorCount > 0){

    $session_error = "You have " . $errorCount . "  error";

   
    if($errorCount > 1){
        $session_error .= "s";
    }  
    
    $session_error .= " in your submission";

    $_SESSION['error'] = $session_error;  

    header("Location: forgot.php");

} else {

    $user = scandir("db/users/");
    
    $countUser = count($user);


    for($counter = 0; $counter < $countUser ; $counter++){

        $currentUser = $user[$counter];

        if($currentUser == $email . ".json"){

            /*Generating random strings*/
            $token = "";
            $alphabets = ['a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z','A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'];

            for($i=0; $i < 26; $i++){
                //Generate random number
                $index = mt_rand(0,count($alphabets)-1);
                $token .= $alphabets[$index];
                
            }
           


            $subject = "Password Reset Link";
            $message = "A password reset has been requested from your account, if you did not submit this request, please ignore this message, otherwise, visit: localhost/System/reset.php?token=" . $token;
            $headers = "From: no-reply@snh.org" . "\r\n" .
            "CC: seyi@snh.org";

            file_put_contents("db/token/". $email . ".json",json_encode(['token'=>$token]));

            $try= mail($email,$subject,$message,$headers);


            if ($try){
                    //send a success message
                    $_SESSION["message"] = "Password reset has been sent to your email: " . $email;
                    header("Location: login.php");

            } else {
                //display error message
                $_SESSION["error"] = "Something went wrong, we could not send password reset to : " . $email;
                header("Location: forgot.php");
            }
            die();
        }
    }
    $_SESSION["error"] = "Email not registered with us " . $email;
    header("Location: forgot.php");

}