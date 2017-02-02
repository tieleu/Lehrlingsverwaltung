<!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 

 </head>
 <body>

<?php
$id = $_POST['userID'];

$user = $_GET['user'];
 	$servername = "172.16.44.5";
 	$username = "lehrling";
 	$password = "sec1.01";

 	$conn =mysql_connect($servername, $username, $password) 
 	or die("Fehler im System");

 	mysql_select_db("Lehrverwaltung");

 	if(isset($_POST['erfüllt'])){

	 $query = "DELETE FROM Aufgaben WHERE idAufgaben=$id";
   	 $result = mysql_query($query);


}
   	 if($result){
 		echo "Successful";
 	}

 	else {
 		echo "ERROR";
 	}
 	?>
 	<?php
 	if(isset($_POST['nichtErfüllt'])){

	$id1 = $_GET['aufgaben'];

	 $query1 = "UPDATE Aufgaben SET pruefen = 0 WHERE idAufgaben=$id1";
   	 $result1 = mysql_query($query1);


}
   	 if($result1){
 		echo "Successful";
 	}

 	else {
 		echo "ERROR";
 	}
?>
<?php
require("../subsites/zurPruefung.php");

  ?>

 </body>
 </html>