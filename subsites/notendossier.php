<!DOCTYPE html>
<html>
<head>
	<?php 
	include("header.php");
	$servername = "172.16.44.5";
	$username = "lehrling";
	$password = "sec1.01";

	$conn = mysql_connect($servername, $username, $password)
	or die("Fehler im System");
	mysql_select_db("Lehrverwaltung");
	$select ="SELECT * from Noten where User_idUser=1";
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

	</div>
	<div align="center" id="input_container">
		<form action="" method="post">
			<table width="50%">
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
							<select class="inputandsubmitbtn form-control" name="schulfachselect">
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
						<td><input class="inputandsubmitbtn form-control" type="number" name="grade" placeholder="6" min="1" max="6"></td>
						<td><button class="inputandsubmitbtn btn" name="savetest" id="Eingabe">save</button></td>
					</tr>
				</tbody>
			</table>
		</form>
			<?php
			if (isset($_POST['savetest'])) {
				$test = $_POST['schulfachselect'];
				echo $test;
			}
			?>
	</div>
	<footer id="footer">
	</footer>


</body>
</html>