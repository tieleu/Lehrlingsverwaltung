<?php
session_start();
include('../subsites/header.php');
$user = $_GET['user'];
/*
mysql_select_db("Lehrverwaltung");

function zeitZuDez($time){
	$floatTime = str_replace(':', '.', $time);
	$min = substr($floatTime, 3);
	$stund = substr($floatTime, 0,2)*60;
	$dezmin = 100/60*$min/100;
	$dezZeit = $stund+$min;
	return $dezZeit;
}

if(isset($_POST['savetime'])){
	$starttime = $_POST['starttime_input'];
	echo $starttime;
	$endtime = $_POST['endtime_input'];
	$date = $_POST['date_input']; 
	$rowsuser = mysql_query("SELECT idUser FROM User WHERE username = '$user'", $conn);
	$idUser = 0;
	#$idTime = 0;
	while($row = mysql_fetch_object($rowsuser)){
		$idUser = $row -> idUser;
	}
	echo "userId: " . $idUser;
	$worktime = zeitZuDez($endtime) - zeitZuDez($starttime);
	echo $worktime;
	

	$check = mysql_query("SELECT User_has_zeit.User_idUser, User_has_zeit.zeit_id, zeit.date, zeit.id, zeit.zeit_morgen From User_has_zeit JOIN zeit ON User_has_zeit.zeit_id=zeit.id WHERE zeit.date='$date' AND User_has_zeit.User_idUser=$idUser;");
	if(mysql_num_rows($check)!=1){


		$morningExact = "Von ".$starttime." bis ".$endtime;
		mysql_query("INSERT INTO zeit (zeit_morgen, date) VALUES ('$worktime', '$date' )", $conn);
		mysql_query("INSERT INTO Zeit_exact (exact_morgen, exact_date) VALUES ('$morningExact', '$date')", $conn);
		$rowexact = mysql_query("SELECT MAX(idExact) AS idExact FROM Zeit_exact", $conn);
		$rowstime = mysql_query("SELECT MAX(id) AS id FROM zeit", $conn);
		echo $user; 
		$idExact;
		while($row = mysql_fetch_object($rowexact)){
			$idExact = $row -> idExact;
		}


		while($row1 = mysql_fetch_object($rowstime)){
			$idTime = $row1 -> id;
		}
		echo "timeId: " . $idTime;
		mysql_query("INSERT INTO User_has_zeit (User_idUser, zeit_id, exact_id) VALUES ($idUser,$idTime, $idExact)", $conn);
	}else{
		while($row2 = mysql_fetch_object($check)){
			$zeit_morgen = $row2 -> zeit_morgen;
			$idTime = $row2 -> id;
		}

		$differenz = $zeit_morgen+$worktime-504;
		$timetotal = $zeit_morgen+$worktime;
		$namiExact = "Von ".$starttime." bis ".$endtime;
		mysql_query("UPDATE zeit SET zeit_nachmittag=$worktime,endzeit=$timetotal,zeit_differenz=$differenz WHERE id=$idTime", $conn);
		$getExactId = mysql_query("SELECT exact_id FROM User_has_zeit WHERE zeit_id=$idTime");
		$exactID;
		while($row = mysql_fetch_object($getExactId)){
			$exactID = $row -> exact_id;
		}
		mysql_query("UPDATE Zeit_exact SET exact_nachmittag='$namiExact' WHERE idExact=$exactID", $conn);

	}
}*/


mysql_query("INSERT INTO zeit (user_id) VALUES ($idUser)");
$date = date("Y-m-d");
$dateplus = date('Y-m-d', strtotime($date . ' +1 day'));
$check = mysql_query("SELECT * FROM zeit WHERE zeit>='$date' AND zeit<'$dateplus' AND user_id=$idUser");
if(mysql_num_rows($check)>0 && mysql_num_rows($check)!=null){
	if(mysql_num_rows($check)%2===0){
		setcookie("timer","green", time() + (86400 ), "/");
	}else{
		setcookie("timer", "red", time() + (86400), "/");
	}
}



header("Location: ../subsites/zeiterfassung.php?user=$user");
?>