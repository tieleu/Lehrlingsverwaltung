<!DOCTYPE html>
<html>
	<?php 
include("header.php");
$user = $_GET['user'];
 ?>
<head>
	<link rel="stylesheet" type="text/css" href="../css/zeiterfassung.css">
	<script type="text/javascript" href="../jquery/jquery-3.1.1.js"></script>
	

	<title>Lehrverwaltung - Lehrplan</title>
</head>
<body>
<div id="uebersicht">
   <table class="table">
      <tr>
    <th>Datum</th>
    <th>zeiten</th>
    <th>Erreichte Zeit</th>
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

	$getdates = mysql_query("SELECT date_format(zeit, '%Y-%m-%d') as date FROM zeit GROUP BY date_format(zeit, '%Y-%m-%d')");
	while($rowgetdates = mysql_fetch_object($getdates)){

		$date = $rowgetdates -> date;
		echo "<tr><td>"."<input class='form-control' type='text' name='date' value='$date' placeholder='date' readonly>"."</td><td><input class='form-control' type='text' value='";
		#echo strtotime($date)->modify('+1 day');
		$dateplus = date('Y-m-d', strtotime($date . ' +1 day'));

	$timetotal=0;
	$counter=0;
	$select = mysql_query("SELECT id, user_id, date_format(zeit, '%H:%i') AS zeit, date_format(zeit, '%Y-%m-%d') AS datum FROM zeit WHERE zeit>='$date' AND zeit<'$dateplus' AND user_id=3");

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
			echo $zeit."|";
		}else{
			$timetotal-=zeitZuDez($zeit);
			echo $zeit." bis ";
		}}
	}
	echo "' readonly></td><td><input class='form-control' type='text'  value='";
		echo minToTime($timetotal)." timetotal' readonly></td></tr>";

}

	?>
		</div>
	</table>
</div>
	<div align="center" id="input_container">
	   <table>
	      <tr>
		    <th>Datum</th>
	    	<th>von</th>
	    	<th>bis</th>
	   	</tr>
		<tr>
		<form action="../phpAction/zeitAction.php?user=<?php echo $user ?>" method="post">
		   <td><input type="date" id="date_input" name="date_input" class="inputandsubmitbtn form-control" value="<?php echo date('Y-m-d');?>" readonly></td>
		   <td><input type="time" id="starttime_input" name="starttime_input" class="inputandsubmitbtn form-control"></td>
		    <td><input type="time" id="endtime_input" name="endtime_input" class="inputandsubmitbtn form-control"></td>
		    <td><button id="savetime" name="savetime" class="inputandsubmitbtn btn">Save</button></td>
		</form>
		</tr>
		</table>
	</div>
	<!-- test des timestampts -->
	<div>
		<form action="../phpAction/zeitAction.php?user=<?php echo $user ?>" method="post"><button id="savetimestamp" name="timestamp" class="inputandsubmitbtn btn">TIME</button></form>
	</div>
	
	<script src="../js/zeiterfassung.js"></script>
</body>
</html>