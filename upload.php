<?php
require 'db.php';
session_start();

if ($_SESSION['email']==null){
    $_SESSION['message']="Try to access your account through the login page.";
    header("location: error.php");
}

if(isset($_POST['submit'])){
    $subject = $_POST['subject'];
    $branch = $_SESSION['branch'];
    $year = $_SESSION['year'];
    $semester = $_SESSION['semester'];
    $fileName = "uploads/doc/";
    $uploaded_name = basename($_FILES["file"]["name"]);
    $targetFilePath = $fileName.$uploaded_name;
    $fileType = pathinfo(basename($_FILES["file"]["name"]),PATHINFO_EXTENSION);

    $a=1;

    if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"])){
        // Allow certain file formats
        $allowTypes = array('jpg','png','jpeg','gif','doc','docx','ppt','pptx','pdf','txt','JPG','PNG','JPEG','GIF','DOC','DOCX','PPT','PPTX','PDF','TXT');
        if(in_array($fileType, $allowTypes)){
            
            //check any file with same name
            $prev = $mysqli->query("SELECT * FROM doc where files = '".$targetFilePath."'");
            if ($prev->num_rows > 0){
                $_SESSION['message'] = "A file with the same name already exists. First check the existing documents to save duplication. If your file is distinct then try renaming your file to specify its contents or inserting (2) or so before the extension.";
                header("location: error_on_profile.php");
                
            }
            else
            {
                            // Upload file to server
                if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
                    // Inserte file name into database
                    $insert = $mysqli->query("INSERT into doc (branch,year,semester,files,subject,downloads)  values('".$branch."','".$year."','".$semester."','".$targetFilePath."','".$subject."',0)");
                    if($insert){
                        //echo '<script>window.alert("Success! \n Your file has been uploaded successfully");</script>';
                        $_SESSION['message'] = "The file has been uploaded successfully. ";
                        header("location: success_on_profile.php");
                    }else{
                        $_SESSION['message'] = "File upload failed, please try again.";
                        header("location: error_on_profile.php");
                    } 
                }else{
                    $_SESSION['message'] = "Sorry, there was an error uploading your file. Try reducing size of your file to below 2 MB.";
                    header("location: error_on_profile.php");
                }
                
            }

            

        }else{
            $_SESSION['message'] = 'Sorry, only jpg, jpeg, png, doc, docx, ppt & pptx  files are allowed to upload.';
            header("location: error_on_profile.php");
        }
    }else{
        $_SESSION['message'] = 'Please select a file to upload.';
        header("location: error_on_profile.php");
    }
}
?>

<html>
    <head>
        <title>Upload</title>
    </head>



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
    
        <div id="login" class="container " style="margin-left:25%;
                                       position:relative;
                                       margin-top:5%;
                                       width:700px;
                                       height: 500px;
                                       background-color: darkblue;
                                       box-shadow: 4px 4px 13px 8px grey;
                                       display: block;">
    
            <br><br>
            <h1><center><font color="white">Upload your file</font></center></h1><br>
            <br>
            <font color="white">The file you are going to upload will be saved as a downloadable file for students of your department and year and current semester. If you stumbled upon a file that may be beneficial for your seniors or juniors(of maybe different departments) then you can change your credentials accordingly to upload it.<font>
            <br><br><form action="upload.php" method="POST" enctype="multipart/form-data">
                <center><input type="file" name= "file" style="color:white;"><br><br>
                <input list="subject" name="subject" placeholder="Select the subject" required size=30 style="padding: 8px 20px;
                                                                                                            border: 2px solid #ccc;
                                                                                                            border-radius: 5px;
                                                                                                            background-color: darkblue;
                                                                                                            color:white;">
                <datalist id="subject">
                    <?php
                        $branch = $_SESSION['branch'];
                        $year = $_SESSION['year'];
                        $semester= $_SESSION['semester'];
                        $result = $mysqli->query("SELECT * from subjects where branch = '".$branch."' and year ='".$year."' and semester ='".$semester."'");
                        $row = $result->fetch_assoc();
                        $i = 0;
                        for(;$i<$row['number'];){
                            $i++;
                            $sub = $row['subject_'.$i.''];
                            echo '<option value = "'.$sub.'">';
                        }
                    ?>
                    <option value = "Extras">
                </datalist>
                <br><br>
                <button name="submit" type="submit" style="border:none;
                                                           border-radius: 4px;
                                                           padding: 8px 240px;
                                                           background-color: darkcyan;
                                                           color:white;">Upload</button></center>
    
            </form>
            <br>
        <br><br><br><br><br><br>
        </div>
       
    </body>
</html>