<?php 

if (isset($_POST['submit']) && isset($_FILES['my_image'])) {
	session_start();
	include("db.php");
	$coursename=$_POST['coursename'];
	$title=$_POST['title'];
	//echo$coursename;
	$tid = $_SESSION['student_id'];

	echo "<pre>";
	print_r($_FILES['my_image']);
	echo "</pre>";

	$img_name = $_FILES['my_image']['name'];
	$img_size = $_FILES['my_image']['size'];
	$tmp_name = $_FILES['my_image']['tmp_name'];
	$error = $_FILES['my_image']['error'];

	if ($error === 0) {
		if ($img_size > 215000000) {
			$em = "Sorry, your file is too large.";
		    header("Location: mybook.php?error=$em");
		}else {
			$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
			$img_ex_lc = strtolower($img_ex);

			$allowed_exs = array("zip", "pdf", "doc","pptx"); 

			if (in_array($img_ex_lc, $allowed_exs)) {
				$new_img_name = uniqid($title, true).'.'.$img_ex_lc;
				$img_upload_path = 'uploads/'.$new_img_name;
				move_uploaded_file($tmp_name, $img_upload_path);

				// Insert into Database
				$sql = "INSERT INTO `book`( `name`, `sid`,coursename) VALUES ('$new_img_name','$tid','$coursename')";
	
				
				
				
				
				mysqli_query($conn, $sql);
				header("Location: mybook.php");
			}else {
				$em = "You can't upload files of this type";
		        header("Location: mybook.php?error=$em");
			}
		}
	}else {
		$em = "unknown error occurred!";
		header("Location: mybook.php?error=$em");
	}

}else {
	header("Location: mybook.php");
}