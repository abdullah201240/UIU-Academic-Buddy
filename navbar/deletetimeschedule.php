<?php
session_start();
include("db.php");
$id=$_GET['id'];
$sql="DELETE FROM `time_schedule` WHERE id=$id";
$result = mysqli_query($conn, $sql);
    header("location:addtimeschedule.php");
?>