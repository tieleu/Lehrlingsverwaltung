<?php
include ('../subsites/header.php');
$user = $_GET['user'];

if (isset($_POST['erteilen'])) {
    
    $erledigenBis = $_POST['erledigenBis'];
    $comment = $_POST['comment'];
    $uebungen = $_POST['uebungen'];
    $Prioritaet = $_POST['Prioritaet'];
    $lehrlinge = $_POST['Lehrlinge'];
    
    $ausgabe = "SELECT idUser from User WHERE vorname='$lehrlinge'";
    $ergebniss = mysqli_query($db, $ausgabe);
    $idUser = "";
    
    while ($row = mysqli_fetch_object($ergebniss)) {
        $idUser = $row->idUser;
    }
    
    $ausgabe1 = "SELECT idUebung from Uebung WHERE name='$uebungen'";
    $ergebniss = mysqli_query($db, $ausgabe1);
    $idUebung = "";
    
    while ($row = mysqli_fetch_object($ergebniss)) {
        $idUebung = $row->idUebung;
    }
    
    $query = "INSERT INTO Aufgaben (prioritaet, uebung, komentar, erledigt_bis, User_idUser, Uebung_idUebung) 
 		VALUES ('$Prioritaet','$uebungen','$comment' ,'$erledigenBis','$idUser','$idUebung')";
    
    setcookie("erteilenStatus", "SUCCESSFUL:\nAufgabe erfolgereich erteilt!", time() + (86400 * 30), "/lehrlingsverwaltung");
    
    $result = mysqli_query($db, $query);
}
if ($result) {
    echo "Successful";
    setcookie("erteilenStatus", "SUCCESSFUL:\nAufgabe erfolgereich erteilt!", time() + (86400 * 30), "/lehrlingsverwaltung");
} else {
    echo "ERROR";
    setcookie("erteilenStatus", "ERROR:\nAufgabe erteilen Fehlgeschlagen!", time() + (86400 * 30), "/lehrlingsverwaltung");
}
header("Location: ../subsites/aufgabenErteilen.php?user=$user");
?>

