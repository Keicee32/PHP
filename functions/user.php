<?php 

function is_user_loggedIn(){

    if(isset($_SESSION['loggedIn']) && !empty($_SESSION[' '])){
        return true;
    }
    return false;
}

function is_token_set(){

    return is_token_set_in_session() || is_token_set_in_get();
    
}

function is_token_set_in_session(){

    return isset($_SESSION['token']);

}

function is_token_set_in_get(){

    return isset($_GET['token']);
    
}

function findUser($email = ""){
    
    if(!$email){
        set_alert("error", "User Email is not set");
    }

    $user = scandir("db/users/");
    $countUser = count($user);

    for($counter = 0; $counter < $countUser; $counter++)
    {
        $currentUser = $user[$counter];
        
        if($currentUser == $email . ".json")
        {
            $userString = file_get_contents("db/users/". $currentUser);
            $userObject = json_decode($userString);
            
            return $userObject;
            
        }

    }

    return false;
    
}


function showAppointment(){

    $user = scandir("db/appointment/");
    $countUser = count($user);

    $empty = "";

    for($counter = 2; $counter < $countUser; $counter++){

        $currentAppointment = $user[$counter];

        $userString = file_get_contents("db/appointment/". $currentAppointment);
        $userappointment = json_decode($userString);
        //$_SESSION ["appointment"] = $userappointment -> appointment;

        if($_SESSION['deparment'] == $userappointment->department){
            $empty .= "<tr> 
            <td>$userappointment->id </td>
            <td>$userappointment->fullname</td>
            <td>$userappointment->date </td>
            <td>$userappointment->time </td>
            <td>$userappointment->nature </td>
            <td>$userappointment->message </td>
            <td>$userappointment->department </td>";
        } 
        
    } 

    return $empty;
    
}


function showStaff(){
    $showstaffs = "";

    $userStaff = scandir("db/users/");
    $countUser = count($userStaff);

    for($counter = 2; $counter < $countUser; $counter++){

        $currentStaff = $userStaff[$counter];
        $staff = file_get_contents("db/users/". $currentStaff);
        $staffUser = json_decode($staff);

        if($staffUser -> designation == "Medical Team"){
                   $showstaffs .="<tr> 
                    <td>$staffUser->id </td>
                    <td>$staffUser->first_name</td>
                    <td>$staffUser->last_name </td>
                    <td>$staffUser->email </td>
                    <td>$staffUser->department </td>";
                

        }
     
    } 
    return $showstaffs;
}


function showPatient(){
    $showPatients = "";

    $userStaff = scandir("db/users/");
    $countUser = count($userStaff);

    for($counter = 2; $counter < $countUser; $counter++){

        $currentStaff = $userStaff[$counter];
        $staff = file_get_contents("db/users/". $currentStaff);
        $staffUser = json_decode($staff);

        if($staffUser -> designation == "Patient"){
                   $showPatients .="<tr> 
                    <td>$staffUser->id </td>
                    <td>$staffUser->first_name</td>
                    <td>$staffUser->last_name </td>
                    <td>$staffUser->email </td>
                    <td>$staffUser->department </td>";
                

        }
     
    } 
    return $showPatients;
}