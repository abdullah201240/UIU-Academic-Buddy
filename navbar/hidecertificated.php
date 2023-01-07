<?php
$id=$_GET['id'];
session_start();
if(!isset($_SESSION['student_id'])){
    header("location: ../index.php");
    exit;
  }
  include("db.php");
  $sql="UPDATE `achievements` SET `hide`='1' WHERE  id=$id";
  mysqli_query($conn, $sql);
  header("location: formetresume.php");

?>