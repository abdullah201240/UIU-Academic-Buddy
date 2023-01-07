<?php 

if (isset($_POST['submit']) && isset($_FILES['my_image'])) {
	session_start();
	include("db.php");
	//$tid = $_SESSION['student_id'];
	
	$cid = $_SESSION['cid'];
	$weak = $_GET['weak'];
	$title=$_POST['title'];

	echo "<pre>";
	print_r($_FILES['my_image']);
	echo "</pre>";

	$img_name = $_FILES['my_image']['name'];
	$img_size = $_FILES['my_image']['size'];
	$tmp_name = $_FILES['my_image']['tmp_name'];
	$error = $_FILES['my_image']['error'];

	if ($error === 0) {
		
			$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
			$img_ex_lc = strtolower($img_ex);

			$allowed_exs = array("mp4", "mov", "wmv","avi","mkv","webm"); 

			if (in_array($img_ex_lc, $allowed_exs)) {
				$new_img_name = uniqid("VIDEO-", true).'.'.$img_ex_lc;
				$img_upload_path = 'uploads/'.$new_img_name;
				move_uploaded_file($tmp_name, $img_upload_path);

				// Insert into Database
				$sql="INSERT INTO `coursevideo`(`name`, `cid`, `weak`,title) VALUES ('$new_img_name','$cid','$weak','$title')";
				//$sql = "UPDATE `student` SET image='$new_img_name' WHERE id='$tid'";
				
				
				
				
				mysqli_query($conn, $sql);
				header("Location: shortcoursehome1.php?weak=$weak");
			}else {
				$em = "You can't upload files of this type";
		        header("Location: shortcoursehome1.php?error=$em");
			}
		
	}else {
		$em = "unknown error occurred!";
		header("Location: shortcoursehome1.php?error=$em");
	}

}else {
	header("Location: shortcoursehome1.php");
}