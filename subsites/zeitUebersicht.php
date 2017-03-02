<!DOCTYPE html>
<html>
<?php 
include("header.php");
$user = $_GET['user'];
?>
<head>
	<link rel="stylesheet" type="text/css" href="../css/zeitUebersicht.css">
	<script type="text/javascript" href="../jquery/jquery-3.1.1.js"></script>
	

	<title>Lehrverwaltung - Zeit Übersicht</title>
</head>
<body>
	<div class="panel panel-default" id="uebersicht_container">
		<div class="panel-heading">
			<?php
			$ausgabe = "SELECT vorname, username from User where status = 'lehrling'";
			$ergebniss = mysql_query($ausgabe);
			?>
			<form action="" method="post">
				<select id="select" name="select" onchange="this.form.submit()" style="width: 170px; height: 35px;">
					<option disabled hidden selected="selected">Auswahl</option>
					<?php

					$selectOption = $_POST['select'];
					
					while ($row = mysql_fetch_object($ergebniss)) {
						$vorname = $row -> vorname;
						
						if($vorname == $selectOption){
							?>
							<div class="panel-heading">
								<option selected="selected"><?php echo  $vorname  ?></option>
							</div>
							<?php
						} else {
							?>	
							<div class="panel-heading">
								<option><?php echo  $vorname  ?></option>
							</div>
							<?php } ?>

							<?php } ?>

						</select>
					</form>
				</div>

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


$getUserID ="SELECT idUser from User where vorname='$selectOption'";
					$ergebnisOfUserID = mysql_query($getUserID);	

					$userID =0;
					while($row = mysql_fetch_object($ergebnisOfUserID)){
						$userID = $row -> idUser;
					}


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

	$getdates = mysql_query("SELECT date_format(zeit, '%Y-%m-%d') as date FROM zeit WHERE user_id=$userID GROUP BY date_format(zeit, '%Y-%m-%d')");
	while($rowgetdates = mysql_fetch_object($getdates)){

		$date = $rowgetdates -> date;
		echo "<tr><td>"."<input class='form-control' type='text' name='date' value='$date' placeholder='date' readonly>"."</td><td style='display:flex;'>";
		#echo strtotime($date)->modify('+1 day');
		$dateplus = date('Y-m-d', strtotime($date . ' +1 day'));

	$timetotal=0;
	$counter=0;
	$select = mysql_query("SELECT id, user_id, date_format(zeit, '%H:%i') AS zeit, date_format(zeit, '%Y-%m-%d') AS datum FROM zeit WHERE zeit>='$date' AND zeit<'$dateplus' AND user_id=$userID");

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
			echo "<input type='text' class='form-control' value='";
		}}
	}
	echo "</td><td><input class='form-control' type='text'  value='";
		echo minToTime($timetotal)." h' readonly></td>";
		echo "<td><input class='form-control' type='text' value='08:20 h' readonly></td>";
		echo "<td><input class='form-control' type='text' value='".minToTime($timetotal-500)." h' readonly></td></tr>";

}

	?>
		</div>
	</table>
	<div align="center">
		<table>
			<tr>
				<th>Datum</th>
				<th>Startzeit</th>
				<th>Endzeit</th>
				<th><th>
			</tr>
			<tr>
				<form action="../phpAction/zeitUebersichtAction.php?user=<?php echo $user ?>" method="post">
				<td><input class="form-control" type="date" name="date" value="<?php date('Y-m-d');?>" placeholder=""></td>
				<td><input class="form-control" type="time" name="starttime" value="" placeholder=""></td>
				<td><input class="form-control" type="time" name="endtime" value="" placeholder=""></td>
				<td><button id="savetime" class="inputandsubmitbtn btn" name="savetime">SAVE</button><input type="number" name="id" value="<?php echo $userID;?>" placeholder="" hidden></td>
				</form>
			</tr>
		</table>
	</div>
</div>




				<script src="../js/zeitUebersicht.js"></script>
			</body>
			</html>