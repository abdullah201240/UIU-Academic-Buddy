<?php
include("db.php");
$id=$_GET['id'];
$sql="DELETE FROM `book` WHERE id='$id'";

mysqli_query($conn, $sql);
header("Location:mybook.php");









?>