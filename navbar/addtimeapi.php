<?php


session_start();
include("db.php");
$tid=$_SESSION['teacher_id'];
    
    $start=$_SESSION['starttime'];
    $end=$_SESSION['endtime'];
    $day=$_SESSION['day'];


    
    $tname=$_SESSION['teacher_name'];
    
    $sql="INSERT INTO `time_schedule`(`tid`, `tname`, `day`, `start`, `end`) VALUES ('$tid','$tname','$day','$start','$end')";
    $result = mysqli_query($conn, $sql);
    header("location:addtimeschedule.php");

?>