<?php
include("db.php");
$id=$_GET['id'];
$sql="UPDATE `bokking` SET`states`='Accepted' WHERE id='$id'";
$result = mysqli_query($conn, $sql);
header("location: teacherhome.php");
?>