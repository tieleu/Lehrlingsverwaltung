<?php
include('../subsites/header.php');
$user = $_GET['user'];
$id = $_POST['id'];
$zeit = $_POST['date']." ".$_POST['time'];
mysql_query("INSERT INTO zeit (user_id, zeit) VALUES ($id, '$zeit')");
header("Location: ../subsites/zeitUebersicht.php?user=$user");


?>