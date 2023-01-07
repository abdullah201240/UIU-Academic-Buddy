<?php
$name=$_GET['name'];
$week=$_GET['week'];
//echo $name.$week;

session_start();
if(!isset($_SESSION['student_id'])){
    header("location: ../index.php");
    exit;
  }
  include("db.php");
  $sql="DELETE FROM `mcq` WHERE ename='$name' AND week='$week'";
  mysqli_query($conn, $sql);
  header("location: shortcourseexam.php");

?>