<?php
session_start();
$cur=date("Y-m-d H:i:s");
$from_time1=date('Y-m-d H:i:s');
$to_time1=$_SESSION['end_time'];

$timefirst=strtotime($from_time1);
$timesecond=strtotime($to_time1);
$differenceinseconds=$timesecond-$timefirst;

    



   // header("location: mcqans.php");

    echo "<h1 style='color:aliceblue;background-color:cadetblue;text-align:center;'> Time: ".gmdate("i:s </h1>",$differenceinseconds);
  



?>