<!DOCTYPE html>
<html>
<head>
	<?php 
	include("header.php");
	$user = $_GET['user'];

	$idUser;
	$getId = mysql_query("SELECT idUser FROM User WHERE username = '$user'", $conn);
	while($row = mysql_fetch_object($getId)){
		$idUser = $row -> idUser;
	}
	?>
	<link rel="stylesheet" type="text/css" href="../css/noten.css">
	<script type="text/javascript" href="../jquery/jquery-3.1.1.js"></script>
	<script  type="text/javascript" src="../js/notendossier.js" defer></script>


	<title>Lehrverwaltung - Noten Dossier</title>

</head>
<body>
	<div id="uebersicht">
		<h1>Notendossier</h1>
		<hr>
		<table class="table" id="modul">
			<thead>
				<tr>
					<th colspan="2">Modul-Unterricht</th>
				</tr>
				<tr>
					<th>Fach</th>
					<th>Noten</th>
				</tr>
			</thead>
			<tbody>
				<?php
				#Die IDs der Fächer in denen ein bestimmter Nutzer noten gespeichert hat holen.
					$getfaecher = mysql_query("SELECT * FROM Noten JOIN Schulfach ON Noten.Schulfach_idSchulfach=Schulfach.idSchulfach WHERE User_idUser=$idUser GROUP BY idSchulfach");
					while($row = mysql_fetch_object($getfaecher)){
						$schulfachID = $row -> idSchulfach;
						$fachname = $row -> Name;
						echo "<tr><td><input class='form-control' type='text' value='$fachname' readonly></td><td>";
						#Die Schulnoten der einzelnen fächer holen
						$getNoten = mysql_query("SELECT * FROM Noten JOIN Schulfach ON Noten.Schulfach_idSchulfach=Schulfach.idSchulfach WHERE User_idUser=$idUser AND idSchulfach=$schulfachID ORDER BY idSchulfach");
						while($row1 = mysql_fetch_object($getNoten)){
							$note = $row1 -> note;
							echo "<input class='col-2' type='number' value='$note' readonly>";
						}
						echo "</td></tr>";
					}

				?>
			</tbody>
		</table>

	</div>
	<div align="center" id="input_container">
		<form action="" method="post">
			<table id="inputtable" width="50%">
				<thead>
					<tr>
						<th>Schulfach</th>
						<th>Note</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>
							<select class="inputandsubmitbtn form-control" id="selectfach" name="schulfachselect">
								<?php
								$faecher = mysql_query("SELECT * FROM Schulfach");
								while ($row = mysql_fetch_object($faecher)) {
								$fach = $row -> Name;
								$id = $row -> idSchulfach;
								?>
								<option value="<?php echo $id; ?>"><?php echo $fach; ?></option>
								<?php } ?>
							</select>	
						</td>
						<td><input class="inputandsubmitbtn form-control" id="input_note" type="number" name="grade" placeholder="6" min="1" max="6"></td>
						<td><button class="inputandsubmitbtn btn" name="savenote" id="Eingabe">save</button></td>
					</tr>
				</tbody>
			</table>
		</form>
			<?php
			if (isset($_POST['savenote'])) {
				$auswahl = $_POST['schulfachselect'];
				$note = $_POST['grade'];
				mysql_query("INSERT INTO Noten (note,Schulfach_idSchulfach,User_idUser) VALUES ($note,$auswahl,$idUser)");
				
			}
			?>
	</div>
	<footer id="footer">
	</footer>


</body>
</html>