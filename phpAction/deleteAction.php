<?php
session_start();
include('../subsites/header.php');
$user = $_GET['user'];
$date = $_POST['deleteDate'];
$dateplus = date('Y-m-d', strtotime($date . ' +1 day'));
$id = $_POST['id'];
mysql_query("DELETE FROM zeit WHERE zeit>='$date' AND zeit<'$dateplus' AND user_id=$id");
setcookie("delTimeStatus", 1, time() + 10, "/");
setcookie("delTimeMessage", "Alle Einträge am ".$date." des gewünschten Benutzers wurden gelöscht!", time() + 10, "/");
header("Location: ../subsites/zeitUebersicht.php?user=$user");
?>