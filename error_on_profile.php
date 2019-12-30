
<html>
    <head>
        <title>error</title>

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
            <a><h1 class="display-3" style="color:blue;"><img src="logo.jpeg"  style="height:80px;">IITR Database</h1></a>
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
                                <h1><center><font color="white">Error!!!</font></center></h1><br>

                                <?php 
                                session_start();
                                echo "<br><center> <font color='white'>".$_SESSION['message']."</font></center>";
                                ?>
                                

                                <div class="container col-lg  text-white"  style="margin-top:140px;margin-left:100px;"><a href="profile.php"><button style="border:none;
                                    border-radius: 4px;
                                    padding: 8px 200px;
                                    background-color: darkcyan;
                                    color:white;" >
                                    <center><h4>Account</h4></center></button></a>
                                </div>
            </div>


    </body>
</html>