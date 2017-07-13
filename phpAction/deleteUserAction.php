<?php
session_start();
include ('../subsites/header.php');
$user = $_GET['user'];
if (isset($_POST['no'])) {
    header("Location: ../subsites/einstellungen.php?user=$user");
} else if (isset($_POST['yes'])) {
    $deluser = $_POST['select'];
    $deluserInfo = mysqli_query($db, "SELECT * FROM User WHERE vorname = '$deluser'");
    if (mysqli_num_rows($deluserInfo) === 1) {
        $row = mysqli_fetch_object($deluserInfo);
        $delID = $row->idUser;
        mysqli_query($db, "DELETE FROM zeit WHERE user_id = $delID");
        mysqli_query($db, "DELETE FROM Noten WHERE User_idUser = $delID");
        mysqli_query($db, "DELETE FROM Aufgaben WHERE User_idUser = $delID");
        mysqli_query($db, "DELETE FROM User_has_Schulfach WHERE User_idUser = $delID");
        mysqli_query($db, "DELETE FROM User WHERE idUser = $delID");
        setcookie("delUser", true, time() + 3, "/");
        header("Location: ../subsites/einstellungen.php?user=$user");
    }
}

?>