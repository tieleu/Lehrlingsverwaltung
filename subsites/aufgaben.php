<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../css/aufgaben.css">

	<?php 
	include("header.php");
	
	?>

	<title>Lehrverwaltung - Aufgaben Übersicht</title>
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
						    <th>Link zur Übung:</th>
						    <th>Kommentar:</th>
						    <th>zu erledigen bis:</th>
							<th>zur Prüfung:</th>
					  </tr>

					<?php
					$getUserID ="SELECT idUser from User where vorname='$selectOption'";
					$ergebnisOfUserID = mysql_query($getUserID);	

					$userID =0;
					while($row = mysql_fetch_object($ergebnisOfUserID)){
						$userID = $row -> idUser;
					}
					$ausgabe = "SELECT * from Aufgaben where User_idUser=$userID";
					$ergebniss = mysql_query($ausgabe);

					while ($row = mysql_fetch_object($ergebniss)) {
						$prio = $row-> prioritaet;
						$id = $row -> idAufgaben;
						?>
						
				
						<tr class="<?php echo $prio ?>">
							<td><a href="<?php  echo $row-> Link ?>">Link</a></td>
							<td><input type="label" class="form-control" placeholder="<?php  echo $row-> komentar?>" readonly></td>
							<td><input type="label" class="form-control" placeholder="<?php  echo $row-> erledigt_bis?>" readonly></td>
							<form action="../phpAction/pruefAction.php?user=<?php echo $nameOfUser?>" method="post">

							  <td hidden ><input readonly type="text" class="form-control"  name="idAufgaben"  value="<?php echo $id?>" placeholder="<?php  echo $id ?>"></td>

							<td><button type="submit" id="pruefungsButton" name="pruefen" style="width: 100px; height: 30px;">Prüfen</button></td>
			
							</form>
						</tr>
 
								
								<?php }?>
							</table>
						</div>
					</body>
					</html>
