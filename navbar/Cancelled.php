<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

include("db.php");
$id=$_GET['id'];
$sql="UPDATE `bokking` SET`states`='Cancelled' WHERE id='$id'";
$result = mysqli_query($conn, $sql);

if($result){

    $sql2="SELECT * FROM `bokking` WHERE id='$id'";
    $result2 = mysqli_query($conn, $sql2);
    $data2 = $result2->fetch_assoc();
    if ($result2) {
       $sid=$data2['sid'];
       $tname=$data2['tname'];
       $start=$data2['start'];
       $end=$data2['end'];
       $date=$data2['date'];
    }


    $sql3="SELECT * FROM `student` WHERE id='$sid'";
    $result3 = mysqli_query($conn, $sql3);
    $data3 = $result3->fetch_assoc();
    if ($result3) {
       $email = $data3['email'];
      
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
    $mail->Subject="Teacher Name is $tname  Cancelled a counseling";
    $mail->Body="Teacher Name is $tname  Cancelled a counseling $ok Date: $date $ok Time : $start to $end";
    $mail->send();



}
header("location: teacherhome.php");
?>