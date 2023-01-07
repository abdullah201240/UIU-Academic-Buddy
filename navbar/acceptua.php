<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

$id=$_GET['id'];
$emails=$_GET['email'];
$section=$_GET['section'];
$cname=$_GET['cname'];
$name=$_GET['name'];


  include("db.php");
  $sql="UPDATE `ta` set status='Accept',oid='1' WHERE   id=$id";
   mysqli_query($conn, $sql);
  $email = $emails;
  $mail=new PHPMailer(true);
  $mail->isSMTP();
  $mail->Host='smtp.gmail.com';
  $mail->SMTPAuth=true;
  $mail->Username='abdullahalsakib7075@gmail.com';
  $mail->Password='wziexugvyibeyled';
  $mail->SMTPSecure='ssl';
  $mail->Port=465;
  $mail->setFrom('abdullahalsakib7075@gmail.com');
  $mail->addAddress($emails);
  $mail->Subject="Congratulations on selected for UA";
  $mail->Body="Congratulations $name.
  You have been appointed as Under Graduate Assistant in $cname Section $section.
  You should contact your course teacher.
  Best wishes for You.";
  $mail->send();






  header("location: myua.php");

?>