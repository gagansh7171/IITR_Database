<?php            //use it to add subjects to subject table for incorporating the website even for other branches
$host = "localhost";
$user = "test" ;
$pass = "helloiitr";
$db = "accounts";
$mysqli = new mysqli($host, $user, $pass,$db) or die($mysqli->error);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>BLob file</title>
    </head>
<body>
    <?php
    session_start();
    
    $semester = array(array("MA-001","PH-005","CE-105","HS-001","HS-002","CS-103","EC-101"),array("PH-006","MA-002","CS-102","EC-104","MA-006","EE-112"),array("ME-108","EC-203","EC-242","CS-221","EC-291"),array("MT-105","EC-205","EC-212","EC-222","EC-232","EC-252"),array("EC-311","EC-331","EC-333","EC-341","EC-351","EC-391"),array("EC-300","EC-312","EC-342","EC-352","EC-354","EC-399"),array("EC-400A","EC-499"),array("EC-400B"));
    $branch = "electronics and communication engineering";
    $sem=0;
    $year = 0;
    for($i=0;$i<count($semester);$i++){
        if ($i%2==0){ $sem = 1;}
        else { $sem = 2;}
        $year = intdiv($i,2) + 1;
        $sq = "INSERT into subjects (branch,year,semester,number) values ('".$branch."','".$year."','".$sem."','".count($semester[$i])."')";
        $R = $mysqli->query($sq);
        if($R){echo $sq."\n" ;}
        for($j=0;$j<count($semester[$i]);){
            
            $sub = $semester[$i][$j];
            ++$j;
            $sql = "UPDATE subjects SET subject_".$j." = '".$sub."' WHERE branch='".$branch."' and year ='".$year."'and semester = '".$sem."' " ;
            echo $sql."\n";
            $S = $mysqli->query($sql);
            if ($S){echo "success\n";}

        }
    }
    ?>
</p>
</body>

</html>