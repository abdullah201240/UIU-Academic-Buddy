<?php
session_start();
include("db.php");
$cid=$_GET['cid'];
$fid=$_GET['fid'];
$fname=$_GET['fname'];
$cname=$_GET['cname'];
echo$fname;
echo$cname;
// $date=$_SESSION['date'] ;
// $sname=$_SESSION['student_name'];
// 		$sid=$_SESSION['student_id'];
// $sql="SELECT * FROM `time_schedule` WHERE id=$nid";
// $result = mysqli_query($conn, $sql);
// $data = $result->fetch_assoc();
// if ($result) {
//     $id=$data['id'];
//     $day = $data['day'];
//     $start = $data['start'];
//     $end = $data['end'];
//     $tid=$data['tid'];
//     $tname = $data['tname'];
// }

$query="INSERT INTO `shortcoursefaculty`( `fname`, `fid`, `cid`, `cname`) VALUES ('$fname','$fid','$cid','$cname')";
$result1 = mysqli_query($conn, $query);
header("location:shortcourseedit.php?id=$cid");
?>