<?php
//$massages=$_GET['massages'];
//echo $massages;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

    $mail=new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host='smtp.gmail.com';
    $mail->SMTPAuth=true;
    $mail->Username='abdullahalsakib7075@gmail.com';
    $mail->Password='wziexugvyibeyled';
    $mail->SMTPSecure='ssl';
    $mail->Port=465;
    $mail->setFrom('abdullahalsakib7075@gmail.com');
    $mail->addAddress('sakibdob@gmail.com');
    $mail->Subject="sakib";
    $mail->Body="http://localhost/faculty_member/";
    $mail->send();
    echo"Mail Send man";



?>