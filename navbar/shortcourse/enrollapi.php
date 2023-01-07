<?php
include("db.php");
session_start();
$id = $_GET["id"];
$sid = $_SESSION['student_id'];

$sa = "SELECT * FROM enroll where cid='$id' and sid='$sid'";
$result = mysqli_query($conn, $sa);
$data = $result->fetch_assoc() ;
	$num = mysqli_num_rows($result);
    if($num){
        echo "<script type='text/javascript'>if (window.confirm('Already added this course'))
    {
    window.open('index.php','index.php');
    
    }
    else{
        window.open('index.php','index.php');
    };</script>";

    }
    else{
        $sql = "INSERT INTO `enroll`(`cid`, `sid`) VALUES ('$id','$sid')";
        mysqli_query($conn, $sql);
        header("location: mycourse.php");
        

    }




