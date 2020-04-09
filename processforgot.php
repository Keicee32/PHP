<?php session_start();

$errorCount = 0;

$email = $_POST['email'] != "" ? $_POST['email'] : $errorCount++;
$_SESSION['email'] = $email;

if($errorCount > 0)
{
    $_SESSION['error'] = "You have " . $errorCount . " error(s) in your form submission";
    header("Location:forgot.php");
} else {

    $users = scandir("db/users/Patient");
    $users1 = scandir("db/users/Medical");
    $countUsers = count($users);
    $countUsers1 = count($users1);

    for($counter = 0; $counter < $countUsers; $counter++)
    {
        $currentUser = $users[$counter];
        $currentUser1 = $users1[$counter];

        if($currentUser == $email . ".json")
        { 
            //$to = "";
            $subject = "Password Reset";
            $message = "A password forgot request was sent from this email, if this isn't from you, kindly ignore this message else visit the link: localhost/Task 2/reset.php";
            $headers = "no-reply@task2.com" . "\r\n" . 
            "CC: Keicee32@Task2.com ";

            $try = mail($email,$subject,$message,$headers);
            if($try)
            {
                $_SESSION['message'] = "Password Reset has been sent to your email " . $email;
                header("Location: reset.php");
            } 
            else
            {
                $_SESSION['error'] = "Something went wrong, we could not send password reset to: " . $email;
                header("Location: forgot.php");
            }
            
            die();
        } 
        
        else if($currentUser1 == $email . ".json")
        { 
            //$to = "";
            $subject = "Password Reset";
            $message = "A password forgot request was sent from this email, if this isn't from you, kindly ignore this message else visit the link: localhost/Task 2/reset.php";
            $headers = "no-reply@task2.com" . "\r\n" . 
            "CC: Keicee32@Task2.com ";

            $try = mail($email,$subject,$message,$headers);
            if($try)
            {
                $_SESSION['message'] = "Password Reset has been sent to your email " . $email;
                header("Location: reset.php");
            } 
            else
            {
                $_SESSION['error'] = "Something went wrong, we could not send password reset to: " . $email;
                header("Location: forgot.php");
            }

            die();
        }
    }      
    $_SESSION['error'] = "Email not registered with us " . $email;
    header("Location: forgot.php");
}

?>
