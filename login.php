<?php
require 'db.php';
session_start();
$enroll= $mysqli->escape_string($_POST['enroll']);
$_SESSION['enroll'] = $enroll;
$password= $mysqli->escape_string($_POST['password']);
$result = $mysqli->query("SELECT * FROM users where enroll='$enroll'");
if ($result->num_rows == 0){
    $_SESSION['message']="User with this enrollment number is not registered.";     //check if a user with these users is registered or not
    header("location: error.php");
}
else{
    $user=$result->fetch_assoc();                                                    //if new user
    if(password_verify($_POST['password'], $user['password'])){

        
        
        $_SESSION['last_name'] = $user['lname'];

        $_SESSION['active'] = $user['active'];

        $_SESSION['email'] = $user['email'];

        $_SESSION['first_name'] = $user['fname'];

        $_SESSION['logged_in'] = true;

        $_SESSION['year'] = $user['year'];

        $_SESSION['branch'] = $user['branch'];

        $_SESSION['semester'] = $user['semester'];

        if ($_SESSION['active']){

        header("location: profile.php");
        }
        else{
            $_SESSION['message']="Your account has not been activated by you yet.";
            header("location: error.php");
        }
    
    }

    else{
        $_SESSION['message']="You entered a wrong password, try again.";
        header("location: error.php");
    }
}
?>