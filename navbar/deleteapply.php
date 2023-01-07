<?php
$id=$_GET['id'];


  include("db.php");
  $sql="DELETE FROM `apply` WHERE   id=$id";
  mysqli_query($conn, $sql);
  header("location: applyua.php");

?>