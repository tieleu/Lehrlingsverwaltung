 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>

 </head>
 <body>
 	<?php  
include('../subsites/header.php');
$user = $_GET['user'];

 	if(isset($_POST['erteilen'])){

 		$erledigenBis = $_POST['erledigenBis'];
 		$comment = $_POST['comment']; 
 		$uebungen = $_POST['uebungen']; 
 		$Prioritaet = $_POST['Prioritaet']; 
		$lehrlinge = $_POST['Lehrlinge'];


		$ausgabe = "SELECT idUser from User WHERE vorname='$lehrlinge'";
		$ergebniss = mysql_query($ausgabe);
		$idUser ="";

		while($row = mysql_fetch_object($ergebniss)){
		$idUser = $row -> idUser;

}

		$ausgabe1 = "SELECT idUebung from Uebung WHERE name='$uebungen'";
		$ergebniss = mysql_query($ausgabe1);
		$idUebung ="";

		while($row = mysql_fetch_object($ergebniss)){
		$idUebung = $row -> idUebung;

}




 		$query = "INSERT INTO Aufgaben (prioritaet, uebung, komentar, erledigt_bis, User_idUser, Uebung_idUebung) 
 		VALUES ('$Prioritaet','$uebungen','$comment' ,'$erledigenBis','$idUser','$idUebung')";

 		setcookie("erteilen_Status", "SUCCESSFUL:\nAufgabe erfolgereich erteilt!");

	$result=mysql_query($query);
 		}
 		 if($result){
 		echo "Successful";
 		setcookie("erteilen_Status", "SUCCESSFUL:\nAufgabe erfolgereich erteilt!");
 	}

 	else {
 		echo "ERROR";
 		setcookie("erteilen_Status", "ERROR:\nAufgabe erteilen Fehlgeschlagen!");
 	}
 	?>

 	<?php 

header("Location: ../subsites/aufgabenErteilen.php?user=$user");
 	 ?>
 </body>
 </html>

