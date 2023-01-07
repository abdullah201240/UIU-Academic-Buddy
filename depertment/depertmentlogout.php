<?php
session_start();
unset($_SESSION['depertment_name']);

header("location: depertmentlogin.php");


?>