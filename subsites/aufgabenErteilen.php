<html>
<head>
	<?php 
	include("header.php");
	?>
	
	<meta name="description" content="Free Web tutorials">
	<meta name="author" content="Hege Refsnes">

	<link rel="stylesheet" type="text/css" href="../css/aufgabe_erteilen.css">

	<title>Lehrlingsverwaltung - Aufgabe Erteilen</title>
</head>
<body>		
	<div id="erteilenDiv" align="center">
		<div align="left">
			<h2>Aufgabe erteilen</h2><hr>
			<form id="erteilenForm" action="../phpAction/erteilen.php?user=<?php echo $nameOfUser?>" method="post">


				<div class="form-group">
					<?php
					$ausgabe = "select vorname, idUser from User where status = 'lehrling'";
					$ergebniss = mysql_query($ausgabe);
					?>
					<label for="exampleInputEmail1">Lehrling</label>
					<select required="true" class="form-control" name="Lehrlinge">
						<option value="" disabled selected hidden></option>
						<?php
						while ($row = mysql_fetch_object($ergebniss)) {
							?>
							<div class="form-group">
								<option><?php echo  $row-> vorname  ?>  </option>
							</div>
							<?php
						}
						?>
					</select>
				</div>


				<div class="form-group">
					<label for="exampleInputEmail1">Priorität</label>
					<select required="true" place class="form-control" name="Prioritaet">
						<option value="" disabled selected hidden></option>
						<option value="dringend">dringend</option>
						<option value="medium">medium</option>
						<option value="nicht-dringend">nicht-dringend</option>
					</select>
				</div>

				<div class="form-group">
					<label for="meeting">zu erledigen bis: </label>
					<input required="true" name="erledigenBis" class="form-control" id="meeting" type="date" value="2016-08-01"/>
				</div>
				<?php
				$ausgabe = "select name, idUebung from Uebung";
				$ergebniss = mysql_query($ausgabe);
				?>
				<label for="exampleInputEmail1">Übungen</label>
				<select place class="form-control" name="uebungen">
					<option value=" " disabled selected hidden></option>

					<?php
					while ($row = mysql_fetch_object($ergebniss)) {
						?>
						<div class="form-group">
							<option><?php echo  $row-> name  ?>  </option>
						</div>
						<?php
					}
					?>
				</select>
				<br> <div class="form-group">
				<label for="exampleInputPassword1">Kommentar</label>
				<input required="true" name="comment" class="form-control" id="exampleInputPassword1" placeholder="comment">
			</div>
			<div align="left"> 
				<button type="submit" name="erteilen" class="btn btn-default">erteilen</button><br/>
			</div>
		</form>
		

	</div>
</div>
</body>

</html>
