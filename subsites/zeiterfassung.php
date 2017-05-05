<!DOCTYPE html>
<html>
<?php 
include("header.php");
$solltime = 500;
$feiertagMal500 = 0;
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

						function totalColor($exact_solltime){
						$totcolor = "";
						//echo $totalTime." ,".$exact_solltime.",<br>";
						if ($totalTime-$exact_solltime<0) {
							$totcolor = "#E53427";
						}else{
							$totcolor="#3FB13F";
						}
						return $totcolor;
							
						}
				$getdates = mysql_query("SELECT date_format(zeit, '%Y-%m-%d') as date FROM zeit WHERE user_id=$idUser GROUP BY date_format(zeit, '%Y-%m-%d') ORDER BY date_format(zeit, '%Y-%m-%d') DESC");
				$totalTimeAll = 0;
				$numOfTimes = 0;
				while($rowgetdates = mysql_fetch_object($getdates)){

					$date = $rowgetdates -> date;
					echo "<tr><td>"."<input class='form-control' type='text' name='date' value='$date' placeholder='date' readonly>"."</td><td style='display:flex;'>";
					$dateplus = date('Y-m-d', strtotime($date . ' +1 day'));

					$totalTime=0;
					$counter=0;
					$select = mysql_query("SELECT id, user_id, date_format(zeit, '%H:%i') AS zeit, date_format(zeit, '%Y-%m-%d') AS datum FROM zeit WHERE zeit>='$date' AND zeit<'$dateplus' AND user_id=$idUser ORDER BY zeit");

					while ($row = mysql_fetch_object($select)) {
						$counter++;
						$id = $row -> id;
						$user_id = $row -> user_id;
						$datum = $row -> datum;
						$zeit = $row -> zeit;
						if(mysql_num_rows($select)%2===0){
							$totalWhileTimerRun = 0;
							if($counter%2===0){
								$totalTime+=zeitZuDez($zeit);
								$zeiten = $zeiten.$zeit;
								echo $zeiten."' readonly>";
							}else{
								$totalTime-=zeitZuDez($zeit);
								$zeiten = "";
								$zeiten = $zeit." bis ";
								echo "<input type='text' class='form-control inputzeiten' value='";
							}}else{$totalWhileTimerRun = $solltime;}
							$numOfTimes += 1;

						}
						echo "</td><td><input class='form-control' type='text'  value='";
						echo minToTime($totalTime)." h' readonly></td>";



						

						if($date =="2017-04-24"){
							$color = totalColor($solltime-250);
							echo ",test".$totalTime." ,";
							echo "<br>solltime".$solltime-250;
							echo "<td><input class='form-control' type='text' value='04:10 h' readonly></td>";
							echo "<td><input class='form-control' type='text' value='".minToTime($totalTime-250)." h' readonly style='border: solid 2px ".$color.";'></td></tr>";
							$totalTimeAll += $totalTime-250;
							$feiertagMal500 += 500;
						}else if($date =="2017-04-13"){
							echo "<td><input class='form-control' type='text' value='06:15 h' readonly></td>";
							echo "<td><input class='form-control' type='text' value='".minToTime($totalTime-375)." h' readonly style='border: solid 2px ".";'></td></tr>";
							$totalTimeAll += $totalTime-375;
							$feiertagMal500 += 500;
						}else{
							echo "<td><input class='form-control' type='text' value='08:20 h' readonly></td>";
							echo "<td><input class='form-control' type='text' value='".minToTime($totalTime-$solltime)." h' readonly style='border: solid 2px ".";'></td></tr>";
							$totalTimeAll += $totalTime;
						}					
					}

					$totAllColor = "";
					if($numOfTimes%2===0){
						$totalWhileTimerRun=0;
					}
					else{
						$totalWhileTimerRun=$solltime;
					}
					if($totalTimeAll-mysql_num_rows($getdates)*$solltime+$feiertagMal500+$totalWhileTimerRun<0){
						$totAllColor = "#E53427";
					}else{
						$totAllColor="#3FB13F";
					}

					?>

				</div>
			</table>
		</div>
		<div id="placeholder"></div>
		<div align="center" id="input_container">
			<form action="../phpAction/zeitAction.php?user=<?php echo $user ?>" method="post"><button id="savetimestamp" name="timestamp" class="inputandsubmitbtn btn">TIMER</button></form>
			<div id="totalTimeWrap"><?php echo "<input type='text' class='form-control' value='Total: ".minToTime($totalTimeAll-mysql_num_rows($getdates)*$solltime+$totalWhileTimerRun+$feiertagMal500)." h' readonly style='background-color: ".$totAllColor."; font-weight: bold;'>"
				?></div>
			</div>
		</body>
		</html>