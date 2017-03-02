<?php
include('../subsites/header.php');
$user = $_GET['user'];
$id = $_POST['id'];
$startzeit = $_POST['date']." ".$_POST['starttime'];
if(isset($_POST['endtime'])){
mysql_query("INSERT INTO zeit (user_id, zeit) VALUES ($id, '$startzeit')");
}
$endzeit = $_POST['date']." ".$_POST['endtime'];
if(isset($_POST['endtime'])){
mysql_query("INSERT INTO zeit (user_id, zeit) VALUES ($id, '$endzeit')");
}
header("Location: ../subsites/zeitUebersicht.php?user=$user");


?>