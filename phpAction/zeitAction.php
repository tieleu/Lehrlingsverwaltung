<?php
$user = $_GET['user'];

 	$servername = "172.16.44.5";
 	$username = "lehrling";
 	$password = "sec1.01";

 	$conn =mysql_connect($servername, $username, $password) 	
 	or die("Fehler im System");

 	mysql_select_db("Lehrverwaltung");
		if(isset($_POST['savetime'])){
			$starttime = $_POST['starttime_input'];
			$endtime = $_POST['endtime_input'];
			$date = $_POST['date_input']; 
			mysql_query("INSERT INTO zeit (zeit_morgen, zeit_nachmittag,endzeit,zeit_differenz) VALUES ('$starttime', '$endtime', 8,0 )");
		}
		header("Location: ../subsites/zeiterfassung.html");
?>