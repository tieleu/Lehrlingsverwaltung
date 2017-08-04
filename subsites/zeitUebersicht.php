<!DOCTYPE html>
<html>
<?php 
include("header.php");
include("../phpAction/timeCalcFunction.php");
$user = $_GET['user'];
$feiertagMal500 = 0;
const SOLLTIME = 500;
?>
<head>
	<link rel="stylesheet" type="text/css" href="../css/zeitUebersicht.css">
	<script type="text/javascript" href="../jquery/jquery-3.1.1.js"></script>
	<script type="text/javascript" src="../js/zeitUebersicht.js"></script>
	

	<title>Lehrverwaltung - Zeit Übersicht</title>
</head>
<body>
	<?php
		$status = mysqli_query($db, "SELECT status from User where username=\"$user\"");
		$status = mysqli_fetch_object($status) -> status;
		if($status == 'lehrling'){
			header("Location: zeiterfassung.php?user=$user");
		}
	?>

	<div class="panel panel-default" id="uebersicht_container">
			<div class="panel-heading">
				<?php
				$ausgabe = "SELECT vorname, username from User where status = 'lehrling'";
				$ergebniss = mysqli_query($db, $ausgabe);
				?>
				<form action="" method="post">
					<select id="select" name="select" onchange="this.form.submit()" style="width: 170px; height: 35px;">
						<option disabled hidden selected="selected">Auswahl</option>
						<?php
	
						$selectOption = $_POST['select'];
						
						while ($row = mysqli_fetch_object($ergebniss)) {
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
								$ergebnisOfUserID = mysqli_query($db, $getUserID);	
	
								$userID =0;
								while($row = mysqli_fetch_object($ergebnisOfUserID)){
									$userID = $row -> idUser;
								}
	
	
								$getdates = mysqli_query($db, "SELECT date_format(zeit, '%Y-%m-%d') as date FROM zeit WHERE user_id=$userID GROUP BY date_format(zeit, '%Y-%m-%d') ORDER BY date_format(zeit, '%Y-%m-%d') DESC");
								$totalTimeAll = 0;
								$numOfTimes = 0;
								while($rowgetdates = mysqli_fetch_object($getdates)){
	
									$date = $rowgetdates -> date;
									echo "<tr><td>"."<input class='form-control' type='text' name='date' value='$date' placeholder='date' readonly>"."</td><td style='display:flex;'>";
									$dateplus = date('Y-m-d', strtotime($date . ' +1 day'));
	
									$totalTime=0;
									$counter=0;
									$select = mysqli_query($db, "SELECT id, user_id, date_format(zeit, '%H:%i') AS zeit, date_format(zeit, '%Y-%m-%d') AS datum FROM zeit WHERE zeit>='$date' AND zeit<'$dateplus' AND user_id=$userID ORDER BY zeit");
	
									while ($row = mysqli_fetch_object($select)) {
										$counter++;
										$id = $row -> id;
										$user_id = $row -> user_id;
										$datum = $row -> datum;
										$zeit = $row -> zeit;
										if(mysqli_num_rows($select)%2===0){
											$totalWhileTimerRun = 0;
											if($counter%2===0){
												$totalTime+=zeitZuDez($zeit);
												$zeiten = $zeiten.$zeit;
												echo $zeiten."' readonly>";
	
											}else{
												$totalTime-=zeitZuDez($zeit);
												$zeiten = "";
												$zeiten = $zeit." bis ";
												echo "<input type='text' class='form-control' value='";
											}}else{$totalWhileTimerRun = SOLLTIME;}
											$numOfTimes +=1;
										}
										echo "</td><td><input class='form-control' type='text'  value='";
										echo minToTime($totalTime)." h' readonly></td>";
	
	
										if($date =="2017-04-24"){
											$color = totalColor(SOLLTIME-250, $totalTime);
											echo "<td><input class='form-control' type='text' value='04:10 h' readonly></td>";
											echo "<td><input class='form-control' type='text' value='".minToTime($totalTime-250)." h' readonly style='border: solid 2px ".$color.";'></td></tr>";
											$totalTimeAll += $totalTime-250;
											$feiertagMal500 += SOLLTIME;
										}else if($date =="2017-04-13" || $date == "2017-05-24"){
											$color = totalColor(SOLLTIME-375, $totalTime);
											echo "<td><input class='form-control' type='text' value='06:15 h' readonly></td>";
											echo "<td><input class='form-control' type='text' value='".minToTime($totalTime-375)." h' readonly style='border: solid 2px ".$color.";'></td></tr>";
											$totalTimeAll += $totalTime-375;
											$feiertagMal500 += SOLLTIME;
										}else{
											$color = totalColor(SOLLTIME, $totalTime);
											echo "<td><input class='form-control' type='text' value='08:20 h' readonly></td>";
											echo "<td><input class='form-control' type='text' value='".minToTime($totalTime-SOLLTIME)." h' readonly style='border: solid 2px ".$color.";'></td></tr>";
											$totalTimeAll += $totalTime;
										}	
									}
	
									$totAllColor = "";
									if($numOfTimes%2===0){$totalWhileTimerRun=0;}else{
										$totalWhileTimerRun=SOLLTIME;
									}
									if($totalTimeAll-mysqli_num_rows($getdates)*SOLLTIME+$feiertagMal500+$totalWhileTimerRun<0){
										$totAllColor = "#E53427";
									}else{
										$totAllColor="#3FB13F";
									}
	
									
	
	
									echo "<tr><td></td><td></td><td></td><td></td><td><input type='text' class='form-control' value='Total: ".minToTime($totalTimeAll-mysqli_num_rows($getdates)*SOLLTIME+$totalWhileTimerRun+$feiertagMal500)." h' readonly style='background-color: ".$totAllColor."; font-weight: bold;'></td></tr>";
	
									?>
								</div>
							</table>
							<div style="display: flex; justify-content: space-around;">
								<table style="margin-bottom: 10px;">
									<tr>
										<th>Datum</th>
										<th>Zeit</th>
										<th></th>
										</tr>
										<tr>
											<form action="../phpAction/zeitUebersichtAction.php?user=<?php echo $user ?>" method="post">
												<td><input id="saveDate" class="form-control" type="date" name="date" value="<?php date('d.m.Y');?>" placeholder=""></td>
												<td><input id="timeInput" class="form-control" type="time" name="time" value="" placeholder=""></td>
												<td><button id="savetime" class="inputandsubmitbtn btn" name="savetime">SAVE</button><input type="number" name="id" value="<?php echo $userID;?>" placeholder="" hidden></td>
											</form>
										</tr>
									</table>
									<table style="margin-bottom: 10px;">
										<tr>
											<th>Datum</th>
											<th></th>
										</tr>
										<tr>
											<form action="../phpAction/deleteAction.php?user=<?php echo $user ?>" method="post">
												<td><input id="delDate" class="form-control" type="date" name="deleteDate" value="<?php date('d.m.Y');?>" placeholder=""></td>
												<td><button id="delEntry" class="inputandsubmitbtn btn" name="delEntry">DELETE</button><input type="number" name="id" value="<?php echo $userID;?>" placeholder="" hidden></td>
											</form>
										</tr>
									</table>
								</div>
							</div>
						</div>
					

					</body>
					</html>