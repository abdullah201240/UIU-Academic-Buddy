

<?php
include("db.php");
session_start();
$id = $_GET['id'];
$sname = $_SESSION['student_name'];
$sid = $_SESSION['student_id'];
$s = "Select * from course where id ='$id'";
$result = mysqli_query($conn, $s);
while ($row = mysqli_fetch_array($result)) {

    $cname = $row['cname'];
    $cid = $row['cid'];
    $tname = $row['tname'];
    $department = $row['department'];
    $section = $row['section'];
    $classroom = $row["Room"];
    $ctimes = $row["ctimestart"];
    $ctimee = $row["ctimeend"];
}

$sp = "Select * from take_courses where cid ='$cid' and section='$section' and sid='$sid'";
$r = mysqli_query($conn, $sp);
$row = mysqli_fetch_array($r);
if ($row) {
    echo "<script type='text/javascript'>if (window.confirm('Already added this course'))
    {
    window.open('studenthome.php','studenthome.php');
    
    }
    else{
        window.open('studenthome.php','studenthome.php');
    };</script>";
    
} else {
    $query = "insert into take_courses (cname,cid,department,section,tname,sid,sname,Room,ctimestart,ctimeend) values ('$cname','$cid','$department','$section','$tname','$sid','$sname','$classroom','$ctimes','$ctimee')";
    $result = mysqli_query($conn, $query);
    header("location: studenthome.php");
}
