<?php
include("db.php");
 use PHPMailer\PHPMailer\PHPMailer;
 use PHPMailer\PHPMailer\Exception;
 require 'PHPMailer-master/src/Exception.php';
 require 'PHPMailer-master/src/PHPMailer.php';
 require 'PHPMailer-master/src/SMTP.php';

$sq1 = "SELECT * FROM `ta`";
    
   $result1 = mysqli_query($conn, $sq1);
while ($row1 = mysqli_fetch_array($result1)) {


    $id = $row1['id'];
$name=$row1['sname'];
$sid=$row1['sid'];
$cname=$row1['cname'];
$section=$row1['section'];
    $s = "<br>";
$sql = "SELECT * FROM `student` WHERE id='$sid'";
    
   $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_array($result)) {
        $email = $row['email'];
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
        $mail->Subject="Congratulations on selected for UA";
        $mail->Body="Congratulations $name.
        You have been appointed as Under Graduate Assistant in $cname Section $section.
        You should contact your course teacher.
        Best wishes for You.";
        $mail->send();

    }




    
    echo"Mail Send man";




}

header("Location:ua.php");


?>