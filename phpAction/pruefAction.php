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
   	 $result = mysql_query($query);


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
require("../subsites/aufgaben.php?user=$user");

 ?>
 </body>
 </html> 