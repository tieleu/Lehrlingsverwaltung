<?php
session_start();
include('../subsites/header.php');
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
	mysql_query("INSERT INTO zeit (zeit_morgen, zeit_nachmittag,endzeit,zeit_differenz) VALUES ('$starttime', '$endtime', 8,0 )", $conn);
	$rowstime = mysql_query("SELECT MAX(id) FROM zeit", $conn);


	$rowsuser = mysql_query("SELECT idUser FROM User WHERE username = '$user'", $conn);

echo $user; 

	$idUser = 0;
	$idTime = 0;

	while($row = mysql_fetch_object($rowsuser)){
		$idUser = $row -> idUser;
	}

echo "userId: " . $idUser;


		while($row1 = mysql_fetch_object($rowstime)){
		$idTime = $row1 -> MAX(id);
		}
echo "timeId: " . $idTime;

	mysql_query("INSERT INTO User_has_zeit (User_idUser, zeit_id) VALUES ($idUser,$idTime)");
}
#header("Location: ../subsites/zeiterfassung.php?user=$user");
?>