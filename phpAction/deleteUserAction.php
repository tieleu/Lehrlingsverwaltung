<?php
session_start();
include('../subsites/header.php');
$user = $_GET['user'];
if (isset($_POST['no'])) {
	header("Location: ../subsites/einstellungen.php?user=$user");
}else if(isset($_POST['yes'])){
	$deluser = $_POST['select'];
	$deluserInfo = mysql_query("SELECT * FROM User WHERE vorname = '$deluser'");
	if (mysql_num_rows($deluserInfo)===1) {
		$row = mysql_fetch_object($deluserInfo);
		$delID = $row -> idUser;
		mysql_query("DELETE FROM zeit WHERE user_id = $delID");
		mysql_query("DELETE FROM Noten WHERE User_idUser = $delID");
		mysql_query("DELETE FROM Aufgaben WHERE User_idUser = $delID");
		mysql_query("DELETE FROM User_has_Schulfach WHERE User_idUser = $delID");
		mysql_query("DELETE FROM User WHERE idUser = $delID");
		setcookie("delUser", true, time() + 3, "/");
		header("Location: ../subsites/einstellungen.php?user=$user");
	}
}
	
?>