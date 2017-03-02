<?php
include('../subsites/header.php');
$user = $_GET['user'];
$id = $_POST['id'];
$startzeit = $_POST['date']." ".$_POST['starttime'];
mysql_query("INSERT INTO zeit (user_id, zeit) VALUES ($id, $startzeit)");
$endzeit = $_POST['date']." ".$_POST['endtime'];
mysql_query("INSERT INTO zeit (user_id, zeit) VALUES ($id, $endzeit)");
header("Location: ../subsites/zeitUebersicht.php");


?>