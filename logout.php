<?php
require 'db.php';
session_start();
session_destroy();

?>

<html>
    <head>
        <title>success</title>

        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="reset.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
      
        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        
        <!-- Popper JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        
        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    </head>
    <body>
        <center><div class="container">
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
                                <br><br>
                                <h1><center><font color="white">Log Out</font></center></h1><br>

                                <br><center> <font color='white'>You have logged out successfully</font></center>
                                
                                

                                <div class="container col-lg  text-white"  style="margin-top:140px;margin-left:100px;"><a href="index.html"><button style="border:none;
                                    border-radius: 4px;
                                    padding: 8px 200px;
                                    background-color: darkcyan;
                                    color:white;" >
                                    <center><h4>Home</h4></center></button></a>
                                </div>
            </div>


    </body>
</html>