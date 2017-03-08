<?php
session_start();
include('../subsites/header.php');
$user = $_GET['user'];
$oldpw = hash("sha256", $_POST['old']);
$newpw ="";
if($_POST['new1']===$_POST['new2'] && $_POST['new1']!="" && $_POST['new1']!=null){
	$newpw = hash("sha256", $_POST['new1']);
$getPWnow = mysql_query("SELECT passwort FROM User WHERE idUser=$idUser");
$pwNow = mysql_fetch_object($getPWnow) -> passwort;
if($oldpw===$pwNow){
	mysql_query("UPDATE User SET passwort='$newpw' WHERE idUser=$idUser");
	setcookie("chpwStatus", 1, time()+3, "/");
	setcookie("chpwMessage", "Passwort wurde geändert!", time()+3, "/");
}else{
	setcookie("chpwStatus", 0, time()+3, "/");
}
}else{
	setcookie("chpwStatus", 0, time()+3, "/");
}
header("Location: ../subsites/einstellungen.php?user=$user");
?>