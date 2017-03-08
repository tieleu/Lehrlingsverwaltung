<?php
include('../subsites/header.php');
$user = $_GET['user'];
$id = $_POST['id'];
$zeit = $_POST['date']." ".$_POST['time'];
mysql_query("INSERT INTO zeit (user_id, zeit) VALUES ($id, '$zeit')");
setcookie("saveTimeStatus", 1, time() + 3, "/");
setcookie("saveTimeMessage", "Zeit wurde erfolgreich gespeichert!", time() + 3, "/");
header("Location: ../subsites/zeitUebersicht.php?user=$user");


?>