<?php
session_start();
include ('../subsites/header.php');
$user = $_GET['user'];
mysqli_query($db, "INSERT INTO zeit (user_id) VALUES ($idUser)");
header("Location: ../subsites/zeiterfassung.php?user=$user");
?>