<?php
session_start();
unset($_SESSION['student_id']);
unset($_SESSION['student_name']);
header("location: ../index.php");


?>