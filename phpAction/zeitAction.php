<?php
session_start();
include('../subsites/header.php');
$user = $_GET['user'];

mysql_select_db("Lehrverwaltung");
if(isset($_POST['savetime'])){
	$starttime = $_POST['starttime_input'];
	$endtime = $_POST['endtime_input'];
	$date = $_POST['date_input']; 
	$rowsuser = mysql_query("SELECT idUser FROM User WHERE username = '$user'", $conn);
	$idUser = 0;
	while($row = mysql_fetch_object($rowsuser)){
		$idUser = $row -> idUser;
	}
	echo "userId: " . $idUser;
	$worktime = $endtime - $starttime;
	echo $worktime;

	$check = mysql_query("SELECT User_has_zeit.User_idUser, User_has_zeit.zeit_id, zeit.date, zeit.id From User_has_zeit JOIN zeit ON User_has_zeit.zeit_id=zeit.id WHERE zeit.date='$date' AND User_has_zeit.User_idUser=$idUser;");
	if(mysql_num_rows($check)!=1){


	mysql_query("INSERT INTO zeit (zeit_morgen, date) VALUES ('$worktime', '$date' )", $conn);
	$rowstime = mysql_query("SELECT MAX(id) AS id FROM zeit", $conn);
	echo $user; 

	$idTime = 0;

	while($row1 = mysql_fetch_object($rowstime)){
		$idTime = $row1 -> id;
	}
	echo "timeId: " . $idTime;
	mysql_query("INSERT INTO User_has_zeit (User_idUser, zeit_id) VALUES ($idUser,$idTime)", $conn);
}
}
	header("Location: ../subsites/zeiterfassung.php?user=$user");
?>