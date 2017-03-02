<!DOCTYPE html>
<html>
	<?php 
include("header.php");
$user = $_GET['user'];
$date = date("Y-m-d");
$dateplus = date('Y-m-d', strtotime($date . ' +1 day'));
$check = mysql_query("SELECT * FROM zeit WHERE zeit>='$date' AND zeit<'$dateplus' AND user_id=$idUser");
if(mysql_num_rows($check)>0 && mysql_num_rows($check)!=null){
	if(mysql_num_rows($check)%2===0){
		setcookie("timer","green", time() + (3600*12 ), "/");
	}else{
		setcookie("timer", "red", time() + (3600*12), "/");
	}
}

 ?>
<head>
	<link rel="stylesheet" type="text/css" href="../css/zeiterfassung.css">
	<script type="text/javascript" src="../js/zeiterfassung.js"></script>
	<script type="text/javascript" href="../jquery/jquery-3.1.1.js"></script>
	

	<title>Lehrverwaltung - Lehrplan</title>
</head>
<body>
<div id="uebersicht">
   <table class="table">
      <tr>
    <th>Datum</th>
    <th>Uhrzeiten</th>
    <th>Erreichte Zeit</th>
	<th>Sollzeit</th>
	<th>Differenz</th>
  </tr>
		<div id="zeile">
<?php

function zeitZuDez($time){
	$floatTime = str_replace(':', '.', $time);
	$min = substr($floatTime, 3);
	$stund = substr($floatTime, 0,2)*60;
	$dezmin = 100/60*$min/100;
	$dezZeit = $stund+$min;
	return $dezZeit;
}
function minToTime($time){
						$rest = $time%60;
						$hours = ($time-$rest)/60;
						if($hours<-9){
							$hours = $hours/-1;
						}else if($hours<0){
							$hours = 0 . $hours/-1;
						}else if($hours<10){
							$hours = 0 . $hours;
						}
						if($rest<(-9)){
							$rest = $rest/-1;
							$hours = "-".$hours;
						}else if($rest<0){
							$rest = 0 . ($rest/(-1));
							$hours = "-".$hours;
						}else if($rest<10){
							$rest = 0 . $rest;
						}
						return $hours . ":" . $rest;
					}

	$getdates = mysql_query("SELECT date_format(zeit, '%Y-%m-%d') as date FROM zeit WHERE user_id=$idUser GROUP BY date_format(zeit, '%Y-%m-%d')");
	while($rowgetdates = mysql_fetch_object($getdates)){

		$date = $rowgetdates -> date;
		echo "<tr><td>"."<input class='form-control' type='text' name='date' value='$date' placeholder='date' readonly>"."</td><td style='display:flex;'>";
		#echo strtotime($date)->modify('+1 day');
		$dateplus = date('Y-m-d', strtotime($date . ' +1 day'));

	$timetotal=0;
	$counter=0;
	$select = mysql_query("SELECT id, user_id, date_format(zeit, '%H:%i') AS zeit, date_format(zeit, '%Y-%m-%d') AS datum FROM zeit WHERE zeit>='$date' AND zeit<'$dateplus' AND user_id=$idUser ORDER BY zeit");

	while ($row = mysql_fetch_object($select)) {
		$counter++;
		#echo $counter."   ";
		$id = $row -> id;
		$user_id = $row -> user_id;
		$datum = $row -> datum;
		$zeit = $row -> zeit;
		#echo $id."|".$user_id."|".$datum."|".$zeit."<br>";
		if(mysql_num_rows($select)%2===0){
		if($counter%2===0){
			$timetotal+=zeitZuDez($zeit);
			$zeiten = $zeiten.$zeit;
			echo $zeiten."' readonly>";

		}else{
			$timetotal-=zeitZuDez($zeit);
			$zeiten = "";
			$zeiten = $zeit." bis ";
			echo "<input type='text' class='form-control inputzeiten' value='";
		}}
	}
	echo "</td><td><input class='form-control' type='text'  value='";
		echo minToTime($timetotal)." h' readonly></td>";
		echo "<td><input class='form-control' type='text' value='08:20 h' readonly></td>";
		echo "<td><input class='form-control' type='text' value='".minToTime($timetotal-500)." h' readonly></td></tr>";

}

$selectAll = mysql_query("SELECT id, user_id, date_format(zeit, '%H:%i') AS zeit, date_format(zeit, '%Y-%m-%d') AS datum FROM zeit WHERE user_id=$idUser ORDER BY zeit");
$timetotalAll = "";
$counterAll = 0;
while ($row = mysql_fetch_object($selectAll)) {
		$counterAll++;
		$zeit = $row -> zeit;
if(mysql_num_rows($selectAll)%2===0){
		if($counterAll%2===0){
			$timetotalAll+=zeitZuDez($zeit);
		}else{
			$timetotal-=zeitZuDez($zeit);
		}}
	}

echo "<tr><td></td><td></td><td></td><td></td><td><input type='text' class='form-control' value='Total: ".minToTime($timetotalAll-mysql_num_rows($selectAll)*500)." h' readonly></td></tr>";

	?>
		</div>
	</table>
</div>
	<div align="center" id="input_container">
		<form action="../phpAction/zeitAction.php?user=<?php echo $user ?>" method="post"><button id="savetimestamp" name="timestamp" class="inputandsubmitbtn btn">TIMER</button></form>
	   
	</div>
	
</body>
</html>