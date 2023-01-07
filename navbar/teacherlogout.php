<?php
session_start();
unset($_SESSION['teacher_name']);
unset($_SESSION['teacher_id']);
header("location: ../index.php");


?>