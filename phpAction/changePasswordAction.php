<?php
session_start();
include ('../subsites/header.php');
$user = $_GET['user'];
$oldpw = hash("sha256", $_POST['old']);
$newpw = "";
if ($_POST['new1'] === $_POST['new2'] && $_POST['new1'] != "" && $_POST['new1'] != null) {
    $newpw = hash("sha256", $_POST['new1']);
    $getPWnow = mysqli_query($db, "SELECT passwort FROM User WHERE idUser=$idUser");
    $pwNow = mysqli_fetch_object($getPWnow)->passwort;
    if ($oldpw === $pwNow) {
        mysqli_query($db, "UPDATE User SET passwort='$newpw' WHERE idUser=$idUser");
        setcookie("chpwStatus", 1, time() + 3, "/");
        setcookie("chpwMessage", "Passwort wurde geändert!", time() + 3, "/");
    } else {
        setcookie("chpwStatus", 0, time() + 3, "/");
    }
} else {
    setcookie("chpwStatus", 0, time() + 3, "/");
}
header("Location: ../subsites/einstellungen.php?user=$user");
?>