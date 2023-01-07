<?php
include("db.php");
$id=$_GET['id'];
echo $id;
$sql="UPDATE `project_faculty` SET`status`='Verified' WHERE id='$id'";
$result = mysqli_query($conn, $sql);
header("location: facultyprojetrequest.php");
?>