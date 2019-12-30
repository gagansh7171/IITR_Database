
<?php

require 'db.php';
session_start();

if ($_SESSION['email']==null){
    $_SESSION['message']="Try to access your account through the login page.";
    header("location: error.php");
}
if (isset($_SESSION["year"])){
    $year = $_SESSION["year"];
    $sem = $_SESSION["semester"];
    $branch = $_SESSION["branch"];

}
else{
    $_SESSION['message']="Please update your credentials first.";
    header("location: error_on_profile.php");
}

?>
<!DOCTYPE html>
<html>
    <head><title>dashboard</title></head>
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

        <!-- google icons -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <style>

        /*//////*/

        .category-card {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .genre-header {
            display: inline-block;
            border-bottom: 1px black dotted;
        }

        .genre-header, .genre-header:hover{
            color:black;
            text-decoration:none;
        }

        .genre-header::after{
            content: '';
            display: block;
            width: 0;
            height: 1px;
            background: black;
            transition: width .5s;
        }

        .genre-header:hover::after{
            width: 100%;
        }



        .download_button {
            float: right;
        }

        /*/////*/

        .sidepanel  {   
            width: 0;
            position: absolute;
            opacity: 0.5;
            height: 745px;
            top: 30%;
            right: 0px;
            background-color: #111;
            overflow-x: hidden;
            transition: 0.5s;
            padding-top: 10px;
        }

        .sidepanel a {
            
            text-decoration: none;
            font-size: 25px;
            color: #818181;
            display: inline;
            transition: 0.3s;
        }

        .sidepanel p:hover a:hover {
            color: #f1f1f1;
        }

        /*sticky navbar */
        .sticky {
            position: fixed;
            top: 0;
            width: 100%;
            z-index:1;
            
        }
    
    </style>
    
    <body >

        <div class="container-fluid row">
            <div class="col-md"><a ><h1 class="display-3" style="color:blue;"><img src="logo.jpeg"  style="height:80px;">IITR Database</h1></a></div>
            
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
        <div class="row" id ="navbar" >
            <div class="col-md-1" style = "padding-left:26px;padding-bottom: 10px;">
                <br><a href="notes.php"><button class="btn btn-primary bg-light"style="color:blue;border-color:black;padding-bottom:0px;align:right;"  data-toggle="tooltip" title="Notes log" ><font size="5px"><i class="material-icons" >book</i></font></button></a>
            </div>
            <div class="col-md-9">
                <nav class="navbar navbar-expand-md " style="padding:8px ;">
                    
                <button class="navbar-toggler" type="button"style="color:blue;background:white;border-color:black;padding:12px 20px;" data-toggle="collapse" data-target="#collapsibleNavbar"><i class="material-icons" >home</i>  </button>
                        
                    <div class="collapse navbar-collapse" id="collapsibleNavbar">
                        <ul class="nav navbar-nav ">

                            <?php 
                                $result = $mysqli->query("SELECT * from subjects where year='".$year."' and semester='".$sem."' and branch = '".$branch."'");
                                $sub = $result->fetch_assoc();
                                for($i=0;$i<$sub['number'];){
                                    $choices = $sub['subject_'.++$i.''];
                                    echo '<li class="nav-item" >
                                            <a class="nav-link"  ><button  class="btn btn-primary bg-light" 
                                            style="color:blue;background:white;border-color:black;padding:12px 20px;" id="subjectc_b_'.$i.'"  onclick="s_'.$i.'()" >'.$choices.'</button></a>
                                        </li>';

                                }
                            ?>

                            <li class="nav-item" >
                                <a class="nav-link"  ><button  class="btn btn-primary bg-light" 
                                            style="color:blue;background:white;border-color:black;padding:12px 20px;" id="subjectc_b_0"  onclick="s_0()" >Extras</button></a>
                            </li>

                        </ul>
                    </div>
                </nav>
                
            </div>
                <div class="col-md-2">
                    <br> <a href="upload.php"><button class="btn btn-primary bg-light"style="color:blue;border-color:black;padding-bottom:0px;;align:right;" data-toggle="tooltip" title="Upload a file"><font size="5px"><i class="material-icons" >file_upload</i> </font></button></a>
                        <button class="btn btn-primary bg-light"style="color:blue;border-color:black;padding-bottom:0px;align:right;" onclick="Nav()" data-toggle="tooltip" title="Leaderboard"><font size="5px"><div id="bars">☰</div> </font></button>  
                </div>
        </div>
        
        <center><div id="login" class="container " style="
                                   margin-top:5%;
                                   width:30%;
                                   height: 30%;
                                   background-color: darkblue;
                                   box-shadow: 4px 4px 13px 8px grey;
                                   display: block;">
                                   <font size=+1 color="white">Click on the subjects to review their database.If you want to contribute to the database, you can do so by uploading it at <i class="material-icons" >file_upload</i>. </font>
                </div></center>


        <?php 


        

        echo 
        '<div style = "display:block;width:80%;margin-left:10%;">'."\n";
        for($i=-1;$i<$sub['number'];)
        {$i++;
            if ($i>0){
                $choices = $sub['subject_'.$i.''];
            }
            else{
                $choices = 'Extras';
            }
            
            $downloadables = $mysqli->query("SELECT * from doc where branch = '".$branch."' and year = '".$year."' and semester = '".$sem."' and subject ='".$choices."'");
            
            if ($downloadables->num_rows){
    
                echo '<div id = "subjectc_'.$i.'" style = "display:none;">';
                echo '<h4>'.$choices.'</h4>';
                while ($row = $downloadables->fetch_assoc()){  
                    echo '<div  style="margin-top:1%;">
                            
                                <div class="card">
                                    <div class="card-body category-card">
                                        <div>
                                            <a class="genre-header" href="'.$row['files'].'" target="_blank" data-toggle="tooltip" title="Preview File">
                                                '.substr($row['files'],12).'
                                            </a>
                                        </div>
                                        <div class="download_button" onclick = "tryitalso(\''.$row['files'].'\')" ><a href="'.$row['files'].'" download ><button  class="btn btn-secondary btn-light " type="submit" data-toggle="tooltip" title="Download" style = "border-radius:50%;"><i class="material-icons"style = "color:blue;" >file_download</i></button></a>
                                        </div>
                                    </div>
                                </div>
                            
                        </div>';

                }
                echo '</div>';
            }
            else{
                echo '<center><div id="subjectc_'.$i.'" class="container " style="
                                                                                    margin-top:5%;
                                                                                    width:30%;
                                                                                    height: 30%;
                                                                                    background-color: darkblue;
                                                                                    box-shadow: 4px 4px 13px 8px grey;
                                                                                    display: none;">
                <font size=+1 color="white"> Currently we do not have any data of this topic. </font>
</div></center>';
            }
        }
            
        echo '</div> <br><br><br><br>'; 
        
        ?> 

        <div id="mySidepanel" class="sidepanel" style="color:#ffffff ;">
            <button style="border:none;background-color: #111 ;opacity:0.5;color:#ffffff" onclick="Nav()"><h2>>>></h2></button>
            <h2><center>Top Gems</center></h2><br>
            <?php
                $result = $mysqli->query('SELECT * from doc order by downloads desc Limit 10');
                while ($row = $result->fetch_assoc()){ 
            
                    echo '<p><div class="row"><div class="col-sm-7"><div style="margin-left:24px;">'.substr($row['files'],12).'</div> </div> <div class="col-sm-2" style="float:right">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp'.$row['downloads'].'</div> <div class="col-sm-3" onclick="tryitalso(\''.$row['files'].'\')" style="float:right;">&nbsp&nbsp&nbsp&nbsp<a href="'.$row['files'].'" download ><i class="material-icons" >file_download</i></a></div></div>';
                }
            ?>
            <!--p><div class="row"><div class="col-sm-10">1. CSN_101 exams</div> <div class="col-sm-2" style="text-align:right;"><i class="material-icons" >file_download</i></div></div>
            <p><div class="row"><div class="col-sm-10">1. CSN_101 exams</div> <div class="col-sm-2" style="text-align:right;"><i class="material-icons" >file_download</i></div></div>
            <p><div class="row"><div class="col-sm-10">1. CSN_101 exams</div> <div class="col-sm-2" style="text-align:right;"><i class="material-icons" >file_download</i></div></div>
            <p><div class="row"><div class="col-sm-10">1. CSN_101 exams</div> <div class="col-sm-2" style="text-align:right;"><i class="material-icons" >file_download</i></div></div>        
            <p><div class="row"><div class="col-sm-10">1. CSN_101 exams</div> <div class="col-sm-2" style="text-align:right;"><i class="material-icons" >file_download</i></div></div-->        
        </div>
        

<br>
<br>
<br>
<br>
<br>
<br>
        <script src="dashboard.js"></script>
        <script>       
        
        //no of downloads check ajax

            function tryitalso(str){
                //alert("you");
                var xhttp;
                xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("mySidepanel").innerHTML =  this.responseText;
                    }
                }

                xhttp.open("POST", "ajax.php", true);
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhttp.send("file_select="+str+"");
            }

        

        </script>

    </body>
</html>