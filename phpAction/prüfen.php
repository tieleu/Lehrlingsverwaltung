<!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 

 </head>
 <body>

<?php
include('../subsites/header.php');
$user = $_GET['user'];


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
require("../subsites/zurPruefung.php?user=$user");

  ?>

 </body>
 </html>