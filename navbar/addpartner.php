<?php 
session_start();
$id=$_GET['id'];
$name=$_GET['name'];
$proid=$_GET['proid'];
include("db.php");



$query="INSERT INTO `project_partner`(`project_id`, `partnerName`, `partnerID`) VALUES ('$proid','$name','$id')";
$result1 = mysqli_query($conn, $query);
header("location: studentprofile.php");




?>