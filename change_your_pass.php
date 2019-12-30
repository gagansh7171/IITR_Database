<?php
    require 'db.php';
    session_start();
if (isset($_SESSION['hash_it']))
    {
    if (isset($_POST['new'])){
        $email = $_SESSION['email_it'];
        $password = $mysqli->escape_string(password_hash($_POST['new_password'],PASSWORD_BCRYPT));
        $sql ="UPDATE users SET password = '".$password."' where email = '$email'";
        $result = $mysqli->query($sql);
        if ($result){
            $_SESSION['message'] = 'Your password is updated successfully.';
            header('location: success_on_pass.php');

        }
        else{
            $_SESSION['message'] = 'Sorry! your password update failed. Please try again.';
            header("location: error.php");
        }
    }
    }
else{
    $_SESSION['message'] = 'Please first go to forgot password on the home page';
    header("location: error.php");
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>IITR Database</title>
        <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="reset.css">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    </head>

    <body><center><div class="container">
        <a href ="index.html"><h1 class="display-3">IITR Database</h1></a>
    </div></center><hr size=30>

    <div id="login" class="container " style="left:350px;
                                   position:absolute;
                                   top:150px;
                                   width:700px;
                                   height: 500px;
                                   background-color: darkblue;
                                   box-shadow: 4px 4px 13px 8px grey;
                                   display: block;">

       
                                                      
            <div class="container text-white" ><br><br><h1 ><center>Set new password</center></h1><br>
               <div style="margin-left:150px;"> <form action="change_your_pass.php" method="post" autocomplete="on">
                   <br>
                   <br>
                    <input type="text" name="new_password" placeholder="New Password here" required size=30 style="padding: 8px 20px;
                                                                                                  border: 2px solid #ccc;
                                                                                                  border-radius: 5px;
                                                                                                  background-color: darkblue;
                                                                                                  color:white;">
                <br>
                
                <br>
               <div style="margin-left:140px;"><button type="submit" class="button button-block" name="new" style="background-color: darkcyan;
                                                                                                                    border:none; 
                                                                                                                    color: white;
                                                                                                                    padding: 10px 32px;
                                                                                                                    text-align: center;
                                                                                                                    font-size: 16px; 
                                                                                                                    border-radius: 5px;">Update password
                                                                                                                    </button>   </form>
                

            </div>
            </div>
            </div>

          </div>



    </div>


    </body>
</html>

