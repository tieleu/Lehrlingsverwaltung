<?php
session_start();
include('../subsites/header.php');
$user = $_GET['user'];
$vorname = $_POST['vorname'];
$nachname = $_POST['nachname'];
$username = $_POST['benutzername'];
$status = $_POST['status'];
$passwort ="";
if($_POST['new1']===$_POST['new2']){
	$passwort = hash("sha256", $_POST['new1']);
	mysql_query("INSERT INTO User (name, vorname, username, passwort, status) VALUES ($nachname, $vorname, $username, $passwort, $status)");
}
header("Location: ../subsites/einstellungen.php?user=$user");

?>