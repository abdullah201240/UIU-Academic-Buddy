

<?php
session_start();
			
$name=$_SESSION["examname"];
$len = $_SESSION['len'];
$id = $_GET["id"];

	$languageID=$len;
        error_reporting(0);


	if($_FILES["file"]["name"]!="")
	{
		include "compilers/make.php";
	}
	else
	{
		switch($languageID)
			{
				case "C":
				{
					include("compilers/c.php?id=$id");
					header("location: codeexam.php?name=$name");
					break;
				}
				case "cpp":
				{
					include("compilers/cpp.php");
					break;
				}

				case "cpp11":
				{
					include("compilers/cpp11.php");
					break;
				}
				case "java":
				{	
					include("compilers/java.php");
					break;
				}
				case "python2.7":
				{
					include("compilers/python27.php");
					break;
				}
				case "python3.2":
				{
					include("compilers/python32.php");
					break;
				}
			}
	}
?>


