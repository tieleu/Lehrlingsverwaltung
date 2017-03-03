<?php
session_start();
include('../subsites/header.php');
$user = $_GET['user'];
mysql_query("INSERT INTO zeit (user_id) VALUES ($idUser)");
header("Location: ../subsites/zeiterfassung.php?user=$user");
?>