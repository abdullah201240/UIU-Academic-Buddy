<?php
$id=$_GET['id'];
session_start();

  include("db.php");
  $sql="DELETE FROM `mcq` WHERE   id=$id";
  mysqli_query($conn, $sql);
  header("location: mcq.php");

?>