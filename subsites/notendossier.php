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
	<div id="container1">
		<h1>Notendossier</h1>
		    <div class="panel" id="scroll">
				<ul class="nav nav-tabs">
					<li role="presentation"><a href="#">Lehrjahr1 Sem.1</a></li>
					<li role="presentation"><a href="#">Lehrjahr1 Sem.2</a></li>
					<li role="presentation"><a href="#">Lehrjahr2 Sem.1</a></li>
					<li role="presentation"><a href="#">Lehrjahr2 Sem.2</a></li>
					<li role="presentation"><a href="#">Lehrjahr3 Sem.1</a></li>
					<li role="presentation"><a href="#">Lehrjahr3 Sem.2</a></li>
					<li role="presentation"><a href="#">Lehrjahr4 Sem.1</a></li>
					<li role="presentation"><a href="#">Lehrjahr4 Sem.2</a></li>
				</ul>

				<br>
				<br>


		 <button id="Eingabe">Eingabe</button>
				
 				<div id="schulfach"><br>
 				
				</div>

				</div>
    		</div>
  		<form action="" method="post">
  		<select name="schulfachselect">
  			<?php
  				$faecher = mysql_query("SELECT * FROM Schulfach");
  				while ($row = mysql_fetch_object($faecher)) {
  					$fach = $row -> Name;
  					$id = $row -> idSchulfach;
  				
  			?>
  			<option value="<?php echo $id; ?>"><?php echo $fach; ?></option>
  			<?php } ?>
  		</select><label for="grade">Note:</label><input type="number" name="grade" placeholder="6" min="1" max="6" style="width: 50px;">
  		<button name="savetest">save</button>
  		</form>
  		<?php
  		if (isset($_POST['savetest'])) {
  			$test = $_POST['schulfachselect'];
  			echo $test;
  		}
  		?>
	<footer id="footer">
</footer>


</body>
</html>