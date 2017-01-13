<!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 
 </head>
 <body>

<?php 

$user = $_GET['user'];

		$aufgabenID = $_POST['idAufgaben'];



 	$servername = "172.16.44.5";
 	$username = "lehrling";
 	$password = "sec1.01";

 	$conn =mysql_connect($servername, $username, $password) 
 	or die("Fehler im System");

 	mysql_select_db("Lehrverwaltung");

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
require("../subsites/aufgaben.php");

 ?>
 </body>
 </html> 