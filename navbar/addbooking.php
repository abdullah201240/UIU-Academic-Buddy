<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';
session_start();
include("db.php");
$nid=$_GET['nid'];
$date=$_SESSION['date'] ;
$sname=$_SESSION['student_name'];
		$sid=$_SESSION['student_id'];
$sql="SELECT * FROM `time_schedule` WHERE id=$nid";
$result = mysqli_query($conn, $sql);
$data = $result->fetch_assoc();
if ($result) {
    $id=$data['id'];
    $day = $data['day'];
    $start = $data['start'];
    $end = $data['end'];
    $tid=$data['tid'];
    $tname = $data['tname'];
}


$query="INSERT INTO `bokking`( bid,`date`, `day`, `tid`, `tname`, `sid`, `sname`, `start`, `end`, `states`) VALUES ('$id','$date','$day','$tid','$tname','$sid','$sname','$start','$end','pending')";
$result1 = mysqli_query($conn, $query);
if($result1){

    $sql2="SELECT * FROM `teacher` WHERE id='$tid'";
    $result2 = mysqli_query($conn, $sql2);
    $data2 = $result2->fetch_assoc();
    if ($result2) {
       $email=$data2['email'];
    }















$ok="\n";
    $mail=new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host='smtp.gmail.com';
    $mail->SMTPAuth=true;
    $mail->Username='abdullahalsakib7075@gmail.com';
    $mail->Password='wziexugvyibeyled';
    $mail->SMTPSecure='ssl';
    $mail->Port=465;
    $mail->setFrom('abdullahalsakib7075@gmail.com');
    $mail->addAddress($email);
    $mail->Subject="Name is $sname and ID is $sid booking a counseling";
    $mail->Body="Name is $sname and ID is $sid booking a counseling $ok Date: $date $ok Time : $start to $end";
    $mail->send();
    

}
header("location:counsilling.php");
?>