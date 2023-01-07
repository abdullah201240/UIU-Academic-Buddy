<?php
include("db.php");
$id=$_GET['id'];
$week=$_GET['week'];
$sql="DELETE FROM `shortcoursemetarial` WHERE cid='$id' AND week='$week'";
mysqli_query($conn, $sql);
header("location:shortcoursehome.php?id=$id ");

?>