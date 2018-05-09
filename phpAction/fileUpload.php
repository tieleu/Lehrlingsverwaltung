<?php 
	session_start();
	include ('../subsites/header.php');
	$user= $_GET['user'];
	if (isset($_POST['submit'])) {
		$name= @$_FILES['file']['name'];
		$tmp_name= @$_FILES['file']['tmp_name'];
		$type = $_FILES['file']['type'];
		
		if (!empty($name)) {
		$location ='../java-tests/';
			if ($type == 'application/octet-stream') {
		 if(move_uploaded_file($tmp_name, $location.$name)) {
		 	setcookie("fileUploading", "true", time() + 10, "/");
		 	header("Location: ../subsites/testing.php?user=$user");
		 	}
		} else {
			setcookie("fileUploading", "false", time() + 10, "/");
			header("Location: ../subsites/testing.php?user=$user");
		}
	}
}
 ?>