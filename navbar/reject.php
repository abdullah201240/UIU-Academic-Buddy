<?php
$id=$_GET['id'];


  include("db.php");
  $sql="UPDATE `ta` set status='Reject',oid='2' WHERE   id=$id";
  mysqli_query($conn, $sql);
  header("location: myua.php");

?>