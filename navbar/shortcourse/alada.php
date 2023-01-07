<?php

include("db.php");



$go = $_SESSION['len'];


$name = $_SESSION["examname"];
$cid = $_SESSION['cid'];
$qid = $_SESSION['qid'];
$sweak = $_SESSION['sweak'];
$qus = $_SESSION['q'];
$ans = $_SESSION["codeing"];
$_SESSION["coder"] = $ans;
$tid = $_SESSION['student_id'];
			$tname = $_SESSION['student_name'];

switch ($go) {



	case "C": {


			
			putenv("PATH=C:\Program Files\CodeBlocks\MinGW\bin");
			$CC = "gcc";
			$out = "a.exe";
			$code = $_SESSION["codeing"];

			$input = $_SESSION['in'];



			$filename_code = "main.c";
			$filename_in = "input.txt";
			$filename_error = "error.txt";
			$executable = "a.exe";
			$command = $CC . " -lm " . $filename_code;
			$command_error = $command . " 2>" . $filename_error;

			//if(trim($code)=="")
			//die("The code area is empty");

			$file_code = fopen($filename_code, "w+");
			fwrite($file_code, $code);
			fclose($file_code);
			$file_in = fopen($filename_in, "w+");
			fwrite($file_in, $input);
			fclose($file_in);
			exec("cacls  $executable /g everyone:f");
			exec("cacls  $filename_error /g everyone:f");

			shell_exec($command_error);
			$error = file_get_contents($filename_error);

			if (trim($error) == "") {
				if (trim($input) == "") {
					$output = shell_exec($out);
				} else {
					$out = $out . " < " . $filename_in;
					$output = shell_exec($out);
				}
				//echo "<pre>$output</pre>";
				// if($output=="Hello, World!"){
				//echo "$output";
				// }
				if ($_SESSION['ou'] != $output) {
					$sql100 = "INSERT INTO `codeans`( `ename`, `cid`, `week`, `qus`, `ans`, `sid`, `sname`, `qid`) VALUES ('$name','$cid','$sweak','$qus','$ans','$tid','$tname','$qid')";
					$sa = mysqli_query($conn, $sql100);

				}
				else{

					$sql200 = "INSERT INTO `codemark`( `ename`, `eid`, `week`, `qus`, `ans`, `sid`, `sanme`, `qid`, `mark`) VALUES ('$name','$cid','$sweak','$qus','$ans','$tid','$tname','$qid','$mark')";
					mysqli_query($conn, $sql200);
				}

				//echo "<textarea id='div' class=\"form-control\" name=\"output\" rows=\"10\" cols=\"50\">$output</textarea><br><br>";
			} else if (!strpos($error, "error")) {
				echo "<pre>$error</pre>";
				if (trim($input) == "") {
					$output = shell_exec($out);
				} else {
					$out = $out . " < " . $filename_in;
					$output = shell_exec($out);
				}
				//echo "<pre>$output</pre>";
				//echo "$output";
				//echo "<textarea id='div' class=\"form-control\" name=\"output\" rows=\"10\" cols=\"50\">$output</textarea><br><br>";
			} else {
				//echo "<pre>$error</pre>";
			}
			exec("del $filename_code");
			exec("del *.o");
			exec("del *.txt");
			exec("del $executable");
			break;

		}
		case "cpp": {
		

    putenv("PATH=C:\Program Files\CodeBlocks\MinGW\bin");
	$CC="g++";
	$out="a.exe";
	$code=$_SESSION["codeing"];
	$input=$_SESSION['in'];
	$filename_code="main.cpp";
	$filename_in="input.txt";
	$filename_error="error.txt";
	$executable="a.exe";
	$command=$CC." -lm ".$filename_code;	
	$command_error=$command." 2>".$filename_error;

	//if(trim($code)=="")
	//die("The code area is empty");
	
	$file_code=fopen($filename_code,"w+");
	fwrite($file_code,$code);
	fclose($file_code);
	$file_in=fopen($filename_in,"w+");
	fwrite($file_in,$input);
	fclose($file_in);
	exec("cacls  $executable /g everyone:f"); 
	exec("cacls  $filename_error /g everyone:f");	

	shell_exec($command_error);
	$error=file_get_contents($filename_error);

	if(trim($error)=="")
	{
		if(trim($input)=="")
		{
			$output=shell_exec($out);
		}
		else
		{
			$out=$out." < ".$filename_in;
			$output=shell_exec($out);
		}
		//echo "<pre>$output</pre>";
		//echo "$output";
		if ($_SESSION['ou'] != $output) {
			$sql100 = "INSERT INTO `codeans`( `ename`, `cid`, `week`, `qus`, `ans`, `sid`, `sname`, `qid`) VALUES ('$name','$cid','$sweak','$qus','$ans','$tid','$tname','$qid')";
			$sa = mysqli_query($conn, $sql100);

		}
		else{

			$sql200 = "INSERT INTO `codemark`( `ename`, `eid`, `week`, `qus`, `ans`, `sid`, `sanme`, `qid`, `mark`) VALUES ('$name','$cid','$sweak','$qus','$ans','$tid','$tname','$qid','$mark')";
			mysqli_query($conn, $sql200);
		}
              //echo "<textarea id='div' class=\"form-control\" name=\"output\" rows=\"10\" cols=\"50\">$output</textarea><br><br>";
	}
	else if(!strpos($error,"error"))
	{
		echo "<pre>$error</pre>";
		if(trim($input)=="")
		{
			$output=shell_exec($out);
		}
		else
		{
			$out=$out." < ".$filename_in;
			$output=shell_exec($out);
		}
		//echo "$output";
		                //echo "<textarea id='div' class=\"form-control\" name=\"output\" rows=\"10\" cols=\"50\">$output</textarea><br><br>";
	}
	else
	{
		//echo "<pre>$error</pre>";
	}
	exec("del $filename_code");
	exec("del *.o");
	exec("del *.txt");
	exec("del $executable");


		}

}
?>
























