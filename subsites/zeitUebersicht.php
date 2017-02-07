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
	<div class="panel panel-default">
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

				<table class="table">
					<tr>
						    <th>Datum</th>
						    <th>Erreichte Zeit</th>
						    <th>Sollzeit</th>
							<th>Differenz</th>
					  </tr>

					<?php

					function minToTime($time){
						$rest = $time%60;
						$hours = ($time-$rest)/60;
						if($hours<10){
							$hours = 0 . $hours;
						}
						if($rest<10){
							$rest = 0 . $rest;
						}
						return $hours . ":" . $rest;
					}

					$getUserID ="SELECT idUser from User where vorname='$selectOption'";
					$ergebnisOfUserID = mysql_query($getUserID);	

					$userID =0;
					while($row = mysql_fetch_object($ergebnisOfUserID)){
						$userID = $row -> idUser;
					}
					$ausgabe = "SELECT User_has_zeit.User_idUser, zeit.date, zeit.endzeit, zeit.zeit_differenz FROM User_has_zeit JOIN zeit ON User_has_zeit.zeit_id=zeit.id WHERE User_has_zeit.User_idUser=$userID ORDER BY zeit.date";
					$ergebniss = mysql_query($ausgabe);

					while ($row = mysql_fetch_object($ergebniss)) {
						$date = $row-> date;
						$endzeit = minToTime($row -> endzeit);
						$differenz = minToTime($row -> zeit_differenz);
						?>
						
				
						<tr id="zeile">
							<td><input type='text' class='form-control' placeholder='Datum' value="<?php echo $date; ?>" readonly></td>
							<td><input type='text' class='form-control' placeholder='erreichte Zeit' value="<?php echo $endzeit; ?>" readonly></td>
							<td><input type='text' class='form-control' placeholder='Sollzeit' value='8:24 h' readonly></td>
							<td><input type='text' class='form-control' placeholder='Differenz Zeit' value="<?php echo $differenz; ?>" readonly></td>						
						</tr>
								<?php }?>
							</table>
						</div>



	
	<script src="../js/zeitUebersicht.js"></script>
</body>
</html>