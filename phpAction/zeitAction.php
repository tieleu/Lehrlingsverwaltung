<?php
session_start();
include('../subsites/header.php');
$user = $_GET['user'];

mysql_select_db("Lehrverwaltung");

function zeitZuDez($time){
	$floatTime = str_replace(':', '.', $time);
	$min = substr($floatTime, 3);
	$stund = substr($floatTime, 0,2);
	$dezmin = 100/60*$min/100;
	$dezZeit = $stund+round($dezmin, 2);
	return $dezZeit;
}

if(isset($_POST['savetime'])){
	$starttime = $_POST['starttime_input'];
	echo $starttime;
	$endtime = $_POST['endtime_input'];
	$date = $_POST['date_input']; 
	$rowsuser = mysql_query("SELECT idUser FROM User WHERE username = '$user'", $conn);
	$idUser = 0;
	$idTime = 0;
	while($row = mysql_fetch_object($rowsuser)){
		$idUser = $row -> idUser;
	}
	echo "userId: " . $idUser;
	$worktime = zeitZuDez($endtime) - zeitZuDez($starttime);
	echo $worktime;
	

	$check = mysql_query("SELECT User_has_zeit.User_idUser, User_has_zeit.zeit_id, zeit.date, zeit.id, zeit.zeit_morgen From User_has_zeit JOIN zeit ON User_has_zeit.zeit_id=zeit.id WHERE zeit.date='$date' AND User_has_zeit.User_idUser=$idUser;");
	if(mysql_num_rows($check)!=1){


	mysql_query("INSERT INTO zeit (zeit_morgen, date) VALUES ('$worktime', '$date' )", $conn);
	$rowstime = mysql_query("SELECT MAX(id) AS id FROM zeit", $conn);
	echo $user; 
	


	while($row1 = mysql_fetch_object($rowstime)){
		$idTime = $row1 -> id;
	}
	echo "timeId: " . $idTime;
	mysql_query("INSERT INTO User_has_zeit (User_idUser, zeit_id) VALUES ($idUser,$idTime)", $conn);
}else{
	while($row2 = mysql_fetch_object($check)){
		$zeit_morgen = $row2 -> zeit_morgen;
		$idTime = $row2 -> id;
	}
	$worktime = zeitZuDez($worktime);

	$differenz = $zeit_morgen+$worktime-8.4;
	$timetotal = $zeit_morgen+$worktime;
	
	mysql_query("UPDATE zeit SET zeit_nachmittag=$worktime,endzeit=$timetotal,zeit_differenz=$differenz WHERE id=$idTime", $conn);

}
}
	#header("Location: ../subsites/zeiterfassung.php?user=$user");
?>