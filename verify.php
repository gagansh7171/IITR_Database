<?php

require 'db.php';
session_start();

if(isset($_POST["verify"]))
{
    if ($_POST["link"] == $_SESSION["link"]){       //on typing the correct link

        $first_name = $_SESSION['fname'] ;
        $last_name = $_SESSION['lname'] ;
        $email = $_SESSION['email']  ;
        $password = $_SESSION['password']  ;
        $enroll = $_SESSION['enroll']  ;
        $hash = $_SESSION['hash']  ;



        $sql= "insert into users( fname,lname, email, password, enroll, hash) values ('$first_name','$last_name','$email','$password','$enroll','$hash')";
        $result = $mysqli->query($sql);          

        $_SESSION['message']="Your account has been activated.";
        $mysqli->query("UPDATE users SET active='1' WHERE email='$email' ") or die($mysqli->error);
        $_SESSION['active']=1;
        header("location: success.php");

    }

    



    else{
        $_SESSION['message']="Invalid parameters provided for validation.";
        header("location: error.php");
       //just for message
    }

}


?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <title>IITR Database</title>
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

       
                                                      
            <div class="container text-white" ><br><br><h1 ><center>Account Verification!</center></h1><br>
               <div style="margin-left:150px;"> <form action="verify.php" method="post" autocomplete="on">
                   <br>Enter the link sent to your email
                   <br>
                    <input type="text" name="link" placeholder="link" required size=30 style="padding: 8px 20px;
                                                                                                  border: 2px solid #ccc;
                                                                                                  border-radius: 5px;
                                                                                                  background-color: darkblue;
                                                                                                  color:white;">
                <br>
                
                <br>
               <div style="margin-left:140px;"><button type="submit" class="button button-block" name="verify" style="background-color: darkcyan;
                                                                                                                    border:none; 
                                                                                                                    color: white;
                                                                                                                    padding: 10px 32px;
                                                                                                                    text-align: center;
                                                                                                                    font-size: 16px; 
                                                                                                                    border-radius: 5px;">Verify
                                                                                                                    </button>   </form>
                

            </div>
            </div>
            </div>>

          </div>



    </div>


    </body>
</html>