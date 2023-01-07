<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $ename = $_POST['ename'];
    $_SESSION['ename'] = $ename;
    $time= $_POST['time'];
    $_SESSION['time'] = $time;
    $q1 = $_POST['q1'];
    if($q1=="Mcq"){

        header("location:mcq.php");
    }
    if($q1=="Code"){
        header("location:code.php");

        
    }
}


?>