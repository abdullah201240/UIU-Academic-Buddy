<?php
$pid=$_GET['pid'];
session_start();
include("db.php");
if (!isset($_SESSION['student_id'])) {
    header("location: ../index.php");
    exit;
}

$sql="DELETE FROM `project_faculty` WHERE id=$pid";
mysqli_query($conn, $sql);
header("location: studentprofile.php");

?>