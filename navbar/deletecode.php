<?php
$id=$_GET['id'];
session_start();

  include("db.php");
  $sql="DELETE FROM `code` WHERE   id=$id";
  mysqli_query($conn, $sql);
  header("location: code.php");

?>