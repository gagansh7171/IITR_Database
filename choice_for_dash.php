<?php

require 'db.php';
session_start();

if ($_SESSION['email']==null){
    $_SESSION['message']="Try to access your account through the login page.";
    header("location: error.php");
}
if (isset($_POST['b-tech'])){
    $year = $_POST['year'];
    $semester = $_POST['semester'];
    $branch = $_POST['branch'];
    $email=$_SESSION['email'];
    $_SESSION['year'] = $_POST['year'];
    $_SESSION['semester'] = $semester;
    $_SESSION['branch'] = $branch ;
    $sql = $mysqli->query("UPDATE users SET  semester = '".$semester."', year ='".$year."',branch ='".$branch."' where email='".$email."'");
    $_SESSION['message']='Your credentials have been updated';
    header("location: success_on_profile.php");

}

?>

<html>

<head><title>Update your credentials</title></head>
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

        <!-- google icons -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<body>

    <div class="container-fluid row">                                                                                                              
        <div class="col-md"><a ><h1 class="display-3" style="color:blue"><img src="logo.jpeg"  style="height:80px;">IITR Database</h1></a></div>
        
        <br><div class="col-md"><br>
                <div class="dropdown" style="margin-left:550px;">
                    <button class="btn btn-secondary btn-light " type="button"  data-toggle="dropdown" >
                        <i class="material-icons" style="font-size:40px;color:blue">account_box</i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" >
                        <a class="dropdown-item" href="profile.php">Account</a>
                        <a class="dropdown-item" href="choice_for_dash.php">Update credentials</a>
                        <a class="dropdown-item" href="profile_photo.php">Update Profile Photo</a>
                        <a class="dropdown-item" href="dashboard.php">Dashboard</a>
                        <a class="dropdown-item" href="logout.php">Log Out</a>
                    </div>
                </div>
            </div>
        
    </div> 
    <hr size=30>

    <div id="login" class="container " style="left:350px;
                                   position:absolute;
                                   top:250px;
                                   width:700px;
                                   height: 500px;
                                   background-color: darkblue;
                                   box-shadow: 4px 4px 13px 8px grey;
                                   display: block;">

        <br><br>
        <h1><center><font color="white">For B.Tech. students</font></center></h1><br>
        <br>
        <form action="choice_for_dash.php" method="POST" enctype="multipart/form-data">
            <center><input type="text" name="year" placeholder="Enter your year" required size=30 style="padding: 8px 20px;
                                                                                                            border: 2px solid #ccc;
                                                                                                            border-radius: 5px;
                                                                                                            background-color: darkblue;
                                                                                                            color:white;"><br>
                    <input type="text" name="semester" placeholder="Enter your semester" required size=30 style="padding: 8px 20px;
                                                                                                            border: 2px solid #ccc;
                                                                                                            border-radius: 5px;
                                                                                                            background-color: darkblue;
                                                                                                            color:white;"><br>
                    <input list="branches" name="branch" placeholder="Select your department" required size=30 style="padding: 8px 20px;
                                                                                                            border: 2px solid #ccc;
                                                                                                            border-radius: 5px;
                                                                                                            background-color: darkblue;
                                                                                                            color:white;">
                    <datalist id="branches" >
                        <?php
                            $result = $mysqli->query("SELECT DISTINCT branch from subjects");
                            $num = $result->num_rows;
                            $resul = $result->fetch_assoc();
                            for($i=0;$i<$num;$i++){
                                $put = $resul['branch'] ;
                                echo "<option value='".$put."'>";
                                $resul = $result->fetch_assoc();
                            }
                        ?>
                        
                    </datalist> 
                    <br><br><br>
                <button name="b-tech" type="submit" style="border:none;
                                                       border-radius: 4px;
                                                       padding: 8px 240px;
                                                       background-color: darkcyan;
                                                       color:white;">Submit</button>
            </center>

        </form>

    </div>


</body>
</html>

