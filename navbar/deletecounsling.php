<?php
$id=$_GET['id'];
session_start();
if(!isset($_SESSION['student_id'])){
    header("location: ../index.php");
    exit;
  }
  include("db.php");
  $sql="DELETE FROM `bokking` WHERE id=$id";
  mysqli_query($conn, $sql);
  header("location: counsilling.php");

?>