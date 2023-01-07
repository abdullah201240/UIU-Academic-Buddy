<?php 
session_start();
$id=$_GET['id'];
$name=$_GET['name'];
$proid=$_GET['proid'];
include("db.php");



$query="INSERT INTO `project_faculty`(`project_id`, `name`, `fid`,status) VALUES ('$proid','$name','$id','Pending')";
$result1 = mysqli_query($conn, $query);

header("location: studentprofile.php");




?>