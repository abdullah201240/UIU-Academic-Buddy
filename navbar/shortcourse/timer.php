<?php
session_start();
$name=$_GET['name'];
$time=$_GET['time'];

$_SESSION['time']=$time;
date_default_timezone_set("Bangladesh/Dhaka");
$_SESSION['start_time']=date("Y-m-d H:i:s");
$end_time=$end_time=date('Y-m-d H:i:s',strtotime('+'.$_SESSION['time'].'minutes',strtotime($_SESSION['start_time'])));
$_SESSION['end_time']=$end_time;
if($_GET['id']==1){
    header("location: mcqexam.php?name=$name");
}
if($_GET['id']==2){
    header("location: precode.php?name=$name");
}


?>