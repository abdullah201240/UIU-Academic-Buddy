<?php
$id=$_GET['id'];
session_start();
if(!isset($_SESSION['student_id'])){
    header("location: ../index.php");
    exit;
  }
  include("db.php");
  $sql="UPDATE `project` SET `hide`='1' WHERE  project_id='$id'";
  mysqli_query($conn, $sql);
  header("location: formetresume.php");

?>