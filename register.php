
<?php
include 'db.php';
session_start();
$first_name = $mysqli->escape_string($_POST['fname']);
$last_name = $mysqli->escape_string($_POST['lname']);
$email = $mysqli->escape_string($_POST['email']);
$password = $mysqli->escape_string(password_hash($_POST['password'],PASSWORD_BCRYPT));      //encrypt password
$enroll = $mysqli->escape_string($_POST['enroll']);
$hash = $mysqli->escape_string(md5(rand(0,1000)));




$result = $mysqli->query("SELECT * FROM users where email='$email' or enroll='$enroll' ") or die($mysqli->error());
if ($result->num_rows > 0){
    $_SESSION['message']='User with these credentials already exists!';                                                            ///check if user is already registered or not 
    header("location: error.php");
}
else{ 
        $_SESSION['fname'] = $first_name;
        $_SESSION['lname'] = $last_name;
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $password;
        $_SESSION['enroll'] = $enroll;
        $_SESSION['hash'] = $hash;
        $_SESSION["active"] = 0;
        $_SESSION["logged_in"] = true;
        $_SESSION["link"] = "http://localhost/login_system/verify.php?email=$email&hash=$hash";
       
        $to=$email;
        $Subject="Account Verification (IITR Database)";
        $message_body = "
        Hello $first_name,
        Thank you for signing up!
        Please click this link to activate your account:
        http://localhost/login_system/verify.php?email=$email&hash=$hash .
        ";
        mail($to,$Subject,$message_body);                                                                                   //send verification link to email of the user
        
        header("location: verify.php");   


}



?>