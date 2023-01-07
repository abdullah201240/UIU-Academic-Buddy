<?php


session_start();
include("db.php");
$sid=$_SESSION['student_id'];
$sname=$_SESSION['student_name'];
echo $sname;

    
    $project_name=$_SESSION['pname'] ;
    $project_dis=$_SESSION['pd'];
    $project_link=$_SESSION['pl'];
 


    
    
    
    $sql="INSERT INTO `achievements`( `name`, `dis`, `sid`, `sname`,link) VALUES ('$project_name','$project_dis','$sid','$sname','$project_link')";
    $result = mysqli_query($conn, $sql);
    header("location:studentprofile.php");

?>