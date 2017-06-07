<?php
session_start();
include('../subsites/header.php');
$user = $_GET['user'];
$date = $_POST['deleteDate'];
$dateplus = date('Y-m-d', strtotime($date . ' +1 day'));
$id = $_POST['id'];
mysqli_query($db, "DELETE FROM zeit WHERE zeit>='$date' AND zeit<'$dateplus' AND user_id=$id");
setcookie("delTimeStatus", 1, time() + 3, "/");
setcookie("delTimeMessage", "Alle Einträge am ".$date." des gewünschten Benutzers wurden gelöscht!", time() + 3, "/");
header("Location: ../subsites/zeitUebersicht.php?user=$user");
?>