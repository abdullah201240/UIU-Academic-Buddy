<?php
$id=$_GET['id'];
$weak=$_GET['week'];
session_start();

  include("db.php");
  $sql="DELETE FROM `coursevideo` WHERE id=$id";
  mysqli_query($conn, $sql);
  echo$weak;
  header("location: shortcoursehome1.php?weak=$weak");

?>