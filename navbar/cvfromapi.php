<?php

$id=$_GET['id'];
session_start();
if(!isset($_SESSION['student_id'])){
    header("location: ../index.php");
    exit;
  }
  include("db.php");
  $sql="UPDATE `education` SET `hide`='0' WHERE  sid=$id";
  mysqli_query($conn, $sql);

  $sql="UPDATE `achievements` SET `hide`='0' WHERE  sid=$id";
  mysqli_query($conn, $sql);

  $sql="UPDATE `experience` SET `hide`='0' WHERE  sid=$id";
  mysqli_query($conn, $sql);

  $sql="UPDATE `project` SET `hide`='0' WHERE  sid=$id";
  mysqli_query($conn, $sql);
  header("location: formetresume.php");

?>