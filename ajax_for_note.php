<?php

    include 'db.php';
    session_start();
    if ($_SESSION['email']==null){
        $_SESSION['message']="Try to access your account through the login page.";
        header("location: error.php");
    }


        $note=$_POST['note'];
        $email = $_SESSION['email'];
        $result = $mysqli->query("INSERT into personalize values ('".$email."','".$note."','note','no_parent',NOW())");


    $type = $_POST['type'];
    $parent = $_POST['parent'];

    $notes_to_view = $mysqli->query("SELECT * from personalize where type='".$type."' and parent='".$parent."' order by occur desc");
            
            if ($result){
    
                $row = $notes_to_view->fetch_assoc();

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

