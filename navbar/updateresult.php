<?php

include("db.php");
$sid=$_GET["id"];
$name=$_GET["ename"];
$weak = $_GET["week"];
$tamark = $_GET["mark"];
$total = $_GET["total"];
$cid = $_GET["cid"];
    $sq = "INSERT INTO `mark`( `ename`, `week`, `sid`, `mark`, `tmark`, `cid`) VALUES ('$name','$weak','$sid','$tamark','$total','$cid')";


    mysqli_query($conn, $sq);
    header("location: showresult.php?id=$sid");


        ?> 