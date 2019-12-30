<?php

require 'db.php';
session_start();

if ($_SESSION['email']==null){
    $_SESSION['message']="Try to access your account through the login page.";
    header("location: error.php");
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

        /*/////*/
    
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
<div class="container" style="align-self: center;">
        <form >
            <div class="form-group">
                <label for="myText">Enter a note:</label>
                <textarea class="form-control col-lg-6" cols="100" rows="5" name="note" id="myText"></textarea><br>
                <button name="submit" onclick="tryitalso()" type="submit" style="border:none;
                                                       border-radius: 4px;
                                                       padding: 8px 220px;
                                                       background-color: darkcyan;
                                                       color:white;">Add in the queue.</button></center>
              </div>
        </form>

</div>
    <div id="show_here" style = "display:block;width:80%;margin-left:10%;">
        <div  style = "display:block;">
            <h4>Notes</h4>
            <div id="prepend_here">
            <?php
            
            $type = 'note';
            $parent = 'no_parent';
        
            $notes_to_view = $mysqli->query("SELECT * from personalize where type='$type' and parent='$parent' order by occur desc");
                    
                    if ($notes_to_view->num_rows){

                        while ($row = $notes_to_view->fetch_assoc()){  
                            echo '<div  style="margin-top:1%;">
                                    
                                        <div class="card">
                                            <div class="card-body category-card">
                                                <div >
                                                    <a  data-toggle="tooltip" title="Noted on '.$row['occur'].'">
                                                        '.$row['data'].'
                                                    </a>
                                                </div>
                                        
                                            </div>
                                        </div>
                                    
                                </div>';
        
                        }

                    }
                    else{
                        echo '<center><div class="container " style="
                                                                    margin-top:5%;
                                                                    width:30%;
                                                                    height: 30%;
                                                                    background-color: darkblue;
                                                                    box-shadow: 4px 4px 13px 8px grey;
                                                                    display: none;">
                        <font size=+1 color="white"> Currently you have no notes. </font>
                        </div></center>';
                    }

            ?>
            </div>
        </div>    
    </div> <br><br><br><br>


<script>
    function tryitalso(){
                //alert("you");
                var type = "note";
                var parent = "no_parent";
                var note = document.getElementById("myText").value;
                //alert(note);
                var xhttp;
                xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        $("prepend_here").prepend(this.responseText);
                        //document.getElementById("show_here").innerHTML =  this.responseText;
                        //alert(this.responseText);
                    }
                }

                xhttp.open("POST", "ajax_for_note.php", true);
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhttp.send("type="+type+"&parent="+parent+"&note="+note);
            }


</script>

    </body>

</html>