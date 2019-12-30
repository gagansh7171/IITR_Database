<?php
    include 'db.php';
    $filess = $_POST['file_select'];
    $result = $mysqli->query('SELECT * from doc where files = "'.$filess.'"');
    $row = $result->fetch_assoc();
    $downloads = $row['downloads'];
    $downloads += 1;

    $r = $mysqli->query('UPDATE doc set downloads = '.$downloads.' where files = "'.$filess.'"');


    
    echo '
            <button style="border:none;background-color: #111 ;opacity:0.5;color:#ffffff" onclick="Nav()"><h2>>></h2></button>
            <h2><center>Top Gems</center></h2><br>';

            $result = $mysqli->query('SELECT * from doc order by downloads desc Limit 10');
            while ($row = $result->fetch_assoc()){ 
                //$filesss = $row['files'] ;
                echo '<p><div class="row"><div class="col-sm-8"><div style="margin-left:24px;">'.substr($row['files'],12).'</div> </div> <div class="col-sm-2" style="float:right">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp'.$row['downloads'].'</div> <div class="col-sm-2" onclick="tryitalso(\''.$row['files'].'\')" style="float:right;">&nbsp&nbsp&nbsp&nbsp<a href="'.$row['files'].'" download ><i class="material-icons" >file_download</i></a></div></div>';
            }

?>

