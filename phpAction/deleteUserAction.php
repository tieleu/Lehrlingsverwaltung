<?php
session_start();
include('../subsites/header.php');
$user = $_GET['user'];
if (isset($_POST['no'])) {
	echo "no";
}else if(isset($_POST['yes'])){
	echo "yes";
}
	
?>