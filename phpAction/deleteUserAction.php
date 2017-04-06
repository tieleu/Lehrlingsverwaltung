<?php
session_start();
include('../subsites/header.php');
$user = $_GET['user'];
if (isset($_POST['no'])) {
	echo $_POST['select'];
}else if(isset($_POST['yes'])){
	echo "yes";
}
	
?>