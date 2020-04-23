<?php session_start();

date_default_timezone_set("Africa/Lagos");

$errorCount = 0;


$date = $_POST['date'] != "" ? $_POST['date'] : $errorCount++;
$time = $_POST['time'] != "" ? $_POST['time'] : $errorCount++;
$nature = $_POST['nature'] != "" ? $_POST['nature'] : $errorCount++;
$message = $_POST['message'] != ""  ? $_POST['message'] : $errorCount++;
$department = $_POST['department'] != ""  ? $_POST['department'] : $errorCount++;

$_SESSION['date'] = $date;
$_SESSION['time'] = $time;
$_SESSION['nature'] = $nature;
$_SESSION['message'] = $message;
$_SESSION['department'] = $department;


if($errorCount > 0){

    $session_error = "You have " . $errorCount . "  error";

   
    if($errorCount > 1){
        $session_error .= "s";
    }  
    
    $session_error .= " in your submission";

    set_alert('error', $session_error);

    header("Location: appointment.php");
} else
{
        //Count Users
        $user = scandir("db/appointment");
        
        $countUser = count($user);
    
        $newUserId = ($countUser - 1);
    
        $userObject = 
        [
            'id'=>$newUserId,
            'fullname'=>$_SESSION['fullname'],
            'date'=>$date,
            'time'=>$time,
            'nature'=>$nature,
            'message'=>$message,
            'department'=>$department,
        ];

        for($counter = 0; $counter < $countUser; $counter++)
        {
            $currentUser = $user[$counter];
        }

    file_put_contents("db/appointment/". $email . ".json",json_encode($userObject));
    $_SESSION['message'] = "Appointment Booked " . $first_name . ". Thank You.";
    header("Location:patientdash.php");
}

?>