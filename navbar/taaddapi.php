<?php
include("db.php");
$id = $_GET['id'];
$sname = $_GET['name'];
$cname = $_GET['cname'];
$cid = $_GET['cid'];
$section = $_GET['section'];
$tid=$_GET['tid'];
$sql1 = "SELECT * FROM `ta` WHERE cid='$cid' AND section='$section'";
$r = mysqli_query($conn, $sql1);
$row = mysqli_fetch_array($r);
if ($row) {
    echo "<script type='text/javascript'>if (window.confirm('Allready Added'))
    {
    window.open('teacherhome.php','teacherhome.php');
    
    }
    else{
        window.open('teacherhome.php','teacherhome.php');
    };</script>";

} else {






    $sql = "INSERT INTO `ta`( `sname`, `sid`, `cname`, `cid`, `section`,status,tid) VALUES ('$sname','$id','$cname','$cid','$section','Pending','$tid')";
    mysqli_query($conn, $sql);
    header("location:t_ss.php?id=$cid&&section=$section");
}


?>