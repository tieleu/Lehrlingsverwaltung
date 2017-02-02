 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>

 </head>
 <body>
 	<?php  

$user = $_GET['user'];

 	$servername = "172.16.44.5";
 	$username = "lehrling";
 	$password = "sec1.01";

 	$conn =mysql_connect($servername, $username, $password) 	
 	or die("Fehler im System");

 	mysql_select_db("Lehrverwaltung");


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


	$result=mysql_query($query);
 		}
 		 if($result){
 		echo "Successful";
 	}

 	else {
 		echo "ERROR";
 	}
 	?>

 	<?php 

 	require("../subsites/aufgabenErteilen.php");
 	 ?>
 </body>
 </html>

