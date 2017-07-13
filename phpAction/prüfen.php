<?php
include ('../subsites/header.php');
$user = $_GET['user'];

if (isset($_POST['erfüllt'])) {
    
    $query = "DELETE FROM Aufgaben WHERE idAufgaben=$id";
    $result = mysqli_query($db, $query);
}
if ($result) {
    echo "Successful";
} 
else {
    echo "ERROR";
}
if (isset($_POST['nichtErfüllt'])) {
    
    $id1 = $_GET['aufgaben'];
    
    $query1 = "UPDATE Aufgaben SET pruefen = 0 WHERE idAufgaben=$id1";
    $result1 = mysqli_query($db, $query1);
}

header("Location: ../subsites/zurPruefung.php?user=$user");

?>
