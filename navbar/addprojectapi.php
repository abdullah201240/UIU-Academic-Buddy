<?php


session_start();
include("db.php");
$sid=$_SESSION['student_id'];
$sname=$_SESSION['student_name'];
echo $sname;

    
    $project_name=$_SESSION['pname'] ;
    $project_dis=$_SESSION['pd'];
    $project_link=$_SESSION['pl'];
    


    
    
    
    $sql="INSERT INTO `project`(`project_name`, `project_dis`, `project_link`, `sid`, `sname`) VALUES ('$project_name','$project_dis','$project_link','$sid','$sname')";
    $result = mysqli_query($conn, $sql);
    header("location:studentprofile.php");

?>