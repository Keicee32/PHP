<?php

function print_error(){

    if(isset($_SESSION['error']) && !empty($_SESSION['error']))
    {
        echo "<span style='color:red'>" . $_SESSION['error'] . "</span>";
        session_destroy();
    }

}

function print_alert(){

    $types = ['message','info', 'error'];
    for($i = 0; $i < count($types); $i++){

        if(isset($_SESSION[$types[$i]]) && !empty($_SESSION[$types[$i]]) ){
            echo "<span style = 'color:green'>" . $_SESSION[$types[$i]] . "</span>"; 
            session_destroy();
        }
    }
    session_destroy();
}

function print_message(){

    if(isset($_SESSION['message']) && !empty($_SESSION['message']))
    {
        echo "<span style='color:green'>" . $_SESSION['message'] . "</span>";
        session_destroy();
    }

}

function set_alert($type = "message", $content = ""){

    switch(type){
        case "message":
            $_SESSION['message'] = $content;
        break;
        case "error":
            $_SESSION['error'] = $content;
        break;
        case "info":
            $_SESSION['info'] = $content;
        break;
        default:
        $_SESSION['message'] = $content;
    }

}