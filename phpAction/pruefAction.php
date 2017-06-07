<!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 
 </head>
 <body>

<?php 
include('../subsites/header.php');
$user = $_GET['user'];
 	if(isset($_POST['pruefen'])){

	

	 $query = "UPDATE Aufgaben SET pruefen = 1 WHERE idAufgaben=$aufgabenID";
   	 $result = mysqli_query($db, $query);


}
   	 if($result){
   	 echo "Succesful";
   	 echo "<BR>";
 	}

 	else {
 		echo "ERROR";
 	}

?>

<?php

header("Location: ../subsites/aufgaben.php?user=$user");

 ?>
 </body>
 </html> 