<?php
session_start();
include ('../subsites/header.php');
$user = $_GET['user'];

$uebungsname = $_POST['uebungsname'];
$thema = $_POST['thema'];
$voraussetzung = $_POST['voraussetzung'];
$pfad = $_POST['pfad'];

mysqli_query($db, "INSERT INTO Uebung (name, Thema, Voraussetzung, Link) VALUES ('$uebungsname', '$thema', '$voraussetzung', '$pfad')") or die("ERROR");

setcookie("createUebung", true, time() + 3, "/");

header("Location: ../subsites/uebungen.php?user=$user");

?>