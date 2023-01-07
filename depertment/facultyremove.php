<?php
$pid=$_GET['pid'];
$cid=$_GET['cid'];
session_start();
include("db.php");


$sql="DELETE FROM `shortcoursefaculty` WHERE id=$pid";
mysqli_query($conn, $sql);
header("location:shortcourseedit.php?id=$cid");

?>