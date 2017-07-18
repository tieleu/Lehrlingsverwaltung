<?php
include ('../subsites/header.php');
$user = $_GET['user'];

$servername = "172.16.44.5";
$username = "lehrling";
$password = "sec1.01";

$conn = mysqli_connect($servername, $username, $password) or die("Fehler im System");

mysqli_select_db("Lehrverwaltung");

echo file_get_contents('http://172.16.44.5/lehrlingsverwaltung/subsites/notendossier.php');

if (isset($_POST['save'])) {
    
    $id = $_GET['aufgaben'];
    
    $query = "UPDATE Aufgaben SET pruefen = 1 WHERE idAufgaben=$id";
    $result = mysqli_query($db, $query);
}
if ($result) {
    echo "Succesful";
} 
else {
    echo "ERROR";
}

?>