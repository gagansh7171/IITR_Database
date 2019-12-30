<?php
require 'db.php';
session_start();

if ($_SESSION['email']==null){
    $_SESSION['message']="Try to access your account through the login page.";
    header("location: error.php");
}
if(isset($_POST['submit'])){
    $enroll=$_SESSION['enroll'];
    $fileName = "uploads/profile_photo/photo".$enroll;
    $file_tmper = basename($_FILES["photo"]["name"]);
    $fileType = pathinfo($file_tmper,PATHINFO_EXTENSION);
    $targetFilePath = $fileName.".".$fileType;

    if(isset($_POST["submit"]) && !empty($_FILES["photo"]["name"])){
        // Allow certain file formats
        $allowTypes = array('jpg','png','jpeg','gif','JPG','PNG','JPEG','GIF');
        if(in_array($fileType, $allowTypes)){
            
            //Delete any previo profile_photo
            $delete_prev = $mysqli->query("SELECT * FROM users where profile_photo ='".$fileName.".jpg' OR profile_photo ='".$fileName.".png' OR profile_photo ='".$fileName.".jpeg' OR profile_photo ='".$fileName.".gif' OR profile_photo ='".$fileName.".JPG' OR profile_photo ='".$fileName.".PNG' OR profile_photo ='".$fileName.".JPEG' OR profile_photo ='".$fileName.".GIF' ");
            if ($delete_prev->num_rows > 0){
                $user = $delete_prev->fetch_assoc();
                unlink($user['profile_photo']);
                echo "done";
            }

            // Upload file to server
            if(move_uploaded_file($_FILES["photo"]["tmp_name"], $targetFilePath)){
                // Insert image file name into database
                $insert = $mysqli->query("UPDATE users SET profile_photo ='".$targetFilePath."'WHERE enroll='".$enroll."'");
                if($insert){
                    $_SESSION['message'] = "The profile photo has been updated successfully.";
                    header("location: success_on_profile.php");
                }else{
                    $_SESSION['message'] = "File upload failed, please try again.";
                    header("location: error_on_profile.php");
                } 
            }else{
                $_SESSION['message'] = "Sorry, there was an error uploading your file. Try reducing size of your file.";
                header("location: error_on_profile.php");
            }
        }else{
            $_SESSION['message'] = 'Sorry, only jpg, jpeg, png & gif files are allowed to upload.';
            header("location: error_on_profile.php");
        }
    }else{
        $_SESSION['message'] = 'Please select a file to upload.';
        header("location: error_on_profile.php");
    }
}
?>


<html>

<head><title>Update profile photo</title></head>
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
                                   top:150px;
                                   width:700px;
                                   height: 500px;
                                   background-color: darkblue;
                                   box-shadow: 4px 4px 13px 8px grey;
                                   display: block;">

        <br><br>
        <h1><center><font color="white">Update Profile Photo</font></center></h1><br>
        <br>
        <form action="profile_photo.php" method="POST" enctype="multipart/form-data">
            <center><input type="file" name= "photo" style="color:white;"><br><br><br>
            <button name="submit" type="submit" style="border:none;
                                                       border-radius: 4px;
                                                       padding: 8px 240px;
                                                       background-color: darkcyan;
                                                       color:white;">Upload</button></center>

        </form>

    </div>


</body>

</html>