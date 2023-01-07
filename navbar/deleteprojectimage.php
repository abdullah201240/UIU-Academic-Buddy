<?php
include("db.php");
$id=$_GET['id'];
$pid=$_GET['pid'];
$sql="DELETE FROM `project_image` WHERE imageid=$id";
mysqli_query($conn, $sql);
header("location: projectedit.php?id=$pid");

?>