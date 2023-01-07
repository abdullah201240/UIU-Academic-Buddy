<?php 

if (isset($_POST['submit']) && isset($_FILES['my_image'])) {
	session_start();
	include("db.php");
	$tid = $_SESSION['teacher_id'];

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
		    header("Location: teacherprofile.php?error=$em");
		}else {
			$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
			$img_ex_lc = strtolower($img_ex);

			$allowed_exs = array("jpg", "jpeg", "png"); 

			if (in_array($img_ex_lc, $allowed_exs)) {
				$new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
				$img_upload_path = 'uploads/'.$new_img_name;
				move_uploaded_file($tmp_name, $img_upload_path);

				// Insert into Database
				$sql = "UPDATE `teacher` SET image='$new_img_name' WHERE id='$tid'";
				
				
				
				
				mysqli_query($conn, $sql);
				header("Location: teacherprofile.php");
			}else {
				$em = "You can't upload files of this type";
		        header("Location: teacherprofile.php?error=$em");
			}
		}
	}else {
		$em = "unknown error occurred!";
		header("Location: teacherprofile.php?error=$em");
	}

}else {
	header("Location: teacherprofile.php");
}