<!DOCTYPE html>
<html>
<?php 
include("header.php");
$user = $_GET['user'];
?>
<head>
	<link rel="stylesheet" type="text/css" href="../css/zeitUebersicht.css">
	<script type="text/javascript" href="../jquery/jquery-3.1.1.js"></script>
	

	<title>Lehrverwaltung - Lehrplan</title>
</head>
<body>


	<div id="uebersicht">

		<ul id="nav">
			<li><a href="#">Ruben</a>
				<section>
					<table class="table">
						<tr>
							    <th>Datum</th>
							    <th>Erreichte Zeit</th>
							    <th>Sollzeit</th>
							<th>Differenz</th>
						  </tr>
						<?php
						$getContent = mysql_query("SELECT User_has_zeit.User_idUser, zeit.date, zeit.endzeit, zeit.zeit_differenz FROM User_has_zeit JOIN zeit ON User_has_zeit.zeit_id=zeit.id WHERE User_has_zeit.User_idUser=1", $conn);
						while($row1 = mysql_fetch_object($getContent)){
							$date = $row1 -> date;
							$zeittotal = minToTime($row1 -> endzeit);
							$differenz = minToTime($row1 -> zeit_differenz);
							echo "<tr id='zeile'><td><input type='text' class='form-control' placeholder='Datum' value='$date' readonly></td><td><input type='text' class='form-control' placeholder='erreichte Zeit' value='$zeittotal' readonly></td><td><input type='text' class='form-control' placeholder='Sollzeit' value='8:24 h' readonly></td><td><input type='text' class='form-control' placeholder='Differenz Zeit' value='$differenz' readonly></td></tr>";
						}
						?>
						
					</table>
				</section>
			</li>
			<li><a href="#">Luca</a>
				<section>
					<table class="table">
						<tr>
							    <th>Datum</th>
							    <th>Erreichte Zeit</th>
							    <th>Sollzeit</th>
							<th>Differenz</th>
						  </tr>
						<?php
						$getContent = mysql_query("SELECT User_has_zeit.User_idUser, zeit.date, zeit.endzeit, zeit.zeit_differenz FROM User_has_zeit JOIN zeit ON User_has_zeit.zeit_id=zeit.id WHERE User_has_zeit.User_idUser=2", $conn);
						while($row1 = mysql_fetch_object($getContent)){
							$date = $row1 -> date;
							$zeittotal = minToTime($row1 -> endzeit);
							$differenz = minToTime($row1 -> zeit_differenz);
							echo "<tr id='zeile'><td><input type='text' class='form-control' placeholder='Datum' value='$date' readonly></td><td><input type='text' class='form-control' placeholder='erreichte Zeit' value='$zeittotal' readonly></td><td><input type='text' class='form-control' placeholder='Sollzeit' value='8:24 h' readonly></td><td><input type='text' class='form-control' placeholder='Differenz Zeit' value='$differenz' readonly></td></tr>";
						}
						?>
						
					</table>
				</section>
			</li>
			<li><a href="#">Jan</a>
				<section>
					<table class="table">
						<tr>
							    <th>Datum</th>
							    <th>Erreichte Zeit</th>
							    <th>Sollzeit</th>
							<th>Differenz</th>
						  </tr>
						<?php
						$getContent = mysql_query("SELECT User_has_zeit.User_idUser, zeit.date, zeit.endzeit, zeit.zeit_differenz FROM User_has_zeit JOIN zeit ON User_has_zeit.zeit_id=zeit.id WHERE User_has_zeit.User_idUser=3", $conn);
						while($row1 = mysql_fetch_object($getContent)){
							$date = $row1 -> date;
							$zeittotal = minToTime($row1 -> endzeit);
							$differenz = minToTime($row1 -> zeit_differenz);
							echo "<tr id='zeile'><td><input type='text' class='form-control' placeholder='Datum' value='$date' readonly></td><td><input type='text' class='form-control' placeholder='erreichte Zeit' value='$zeittotal' readonly></td><td><input type='text' class='form-control' placeholder='Sollzeit' value='8:24 h' readonly></td><td><input type='text' class='form-control' placeholder='Differenz Zeit' value='$differenz' readonly></td></tr>";
						}
						?>
						
					</table>   
				</section>
			</li>
		</ul>


	</div>


	
	<script src="../js/zeiterfassung.js"></script>
</body>
</html>