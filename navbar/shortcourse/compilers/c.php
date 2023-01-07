<?php

include 'db.php';
//session_start();

$name = $_SESSION["examname"];

// $id = $_GET["id"];
// $sql = "SELECT * FROM `code` WHERE id='$id'";
// $result = mysqli_query($conn, $sql);
// $data = $result->fetch_assoc();
// $num = mysqli_num_rows($result);
// if ($num == 1) {
// 	$input1 = $data['input1'];
// }

putenv("PATH=C:\Program Files\CodeBlocks\MinGW\bin");
$CC = "gcc";
$out = "a.exe";
$code = $sakib;

if($i==1){
	$input =$input1;
}
else if($i==2){
	$input =$input2;
}
else if($i==3){
	$input =$input3;
}





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
		//$_SESSION['outcode'] = $output;
		//header("location: codeexam.php?name=$name");
	} else {
		$out = $out . " < " . $filename_in;
		$output = shell_exec($out);
		//$_SESSION['outcode'] = $output;
		//header("location: codeexam.php?name=$name");
	}
	//echo "<pre>$output</pre>";
	


	// if($output=="Hello, World!"){
		//echo$output;

	// }


	//echo "<textarea id='div' class=\"form-control\" name=\"output\" rows=\"10\" cols=\"50\">$output</textarea><br><br>";
} else if (!strpos($error, "error")) {
	//echo "<pre>$error</pre>";
	//$_SESSION['outcode'] = $error;
	if (trim($input) == "") {
		$output = shell_exec($out);
		//$_SESSION['outcode'] = $output;
		//header("location: test.php?name=$name");
	} else {
		$out = $out . " < " . $filename_in;
		$output = shell_exec($out);
		$_SESSION['outcode'] = $output;
		//header("location: test.php?name=$name");
	}
	//echo "<pre>$output</pre>";
	$_SESSION['outcode'] = $output;
	//header("location: test.php?name=$name");

	//echo$output;
	
	
	//echo "<textarea id='div' class=\"form-control\" name=\"output\" rows=\"10\" cols=\"50\">$output</textarea><br><br>";
} else {
	//echo "<pre>$error</pre>";
	//$_SESSION['outcode'] = $error;
}
exec("del $filename_code");
exec("del *.o");
exec("del *.txt");
exec("del $executable");

	



?>
