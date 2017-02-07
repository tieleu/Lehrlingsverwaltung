<!DOCTYPE html>
<html>
	<?php 
include("header.php");
$user = $_GET['user'];
 ?>
<head>
	<link rel="stylesheet" type="text/css" href="../css/zeiterfassung.css">
	<script type="text/javascript" href="../jquery/jquery-3.1.1.js"></script>
	

	<title>Lehrverwaltung - Lehrplan</title>
</head>
<body>
<div id="uebersicht">
   <table class="table">
      <tr>
    <th>Datum</th>
    <th>Erreichte Zeit</th>
    <th>Sollzeit</th>
    <th>Differenz</th>
  </tr>
		<div id="zeile">
			<?php
				function minToTime($time){
					$rest = $time%60;
					$hours = ($time-$rest)/60;
					return $hours . ":" . $rest;
				} 
				$idUser;
				$getId = mysql_query("SELECT idUser FROM User WHERE username = '$user'", $conn);
				while($row = mysql_fetch_object($getId)){
					$idUser = $row -> idUser;
				}
				$getContent = mysql_query("SELECT User_has_zeit.User_idUser, zeit.date, zeit.endzeit, zeit.zeit_differenz FROM User_has_zeit JOIN zeit ON User_has_zeit.zeit_id=zeit.id WHERE User_has_zeit.User_idUser=$idUser", $conn);
				while($row1 = mysql_fetch_object($getContent)){
					$date = $row1 -> date;
					$zeittotal = minToTime($row1 -> endzeit);
					$differenz = minToTime($row1 -> zeit_differenz);
					echo "<tr id='zeile'><td><input type='text' class='form-control' placeholder='Datum' value='$date' readonly></td><td><input type='text' class='form-control' placeholder='erreichte Zeit' value='$zeittotal' readonly></td><td><input type='text' class='form-control' placeholder='Sollzeit' value='8:24 h' readonly></td><td><input type='text' class='form-control' placeholder='Differenz Zeit' value='$differenz' readonly></td></tr>";

				}
			?>
			<tr id="zeile">
			    <td><input type="text" class="form-control" placeholder="Datum" readonly></td>
			    <td><input type="text" class="form-control" placeholder="erreichte Zeit" readonly></td>
			    <td><input type="text" class="form-control" placeholder="Sollzeit" value="8.4 h" readonly></td>
			    <td><input type="text" class="form-control" placeholder="Differenz Zeit" readonly></td>
			</tr>
		</div>
	</table>
</div>
	<div align="center" id="input_container">
	   <table>
	      <tr>
		    <th>Datum</th>
	    	<th>von</th>
	    	<th>bis</th>
	   	</tr>
		<tr>
		<form action="../phpAction/zeitAction.php?user=<?php echo $user ?>" method="post">
		   <td><input type="date" id="date_input" name="date_input" class="inputandsubmitbtn form-control"></td>
		   <td><input type="time" id="starttime_input" name="starttime_input" class="inputandsubmitbtn form-control"></td>
		    <td><input type="time" id="endtime_input" name="endtime_input" class="inputandsubmitbtn form-control"></td>
		    <td><button id="savetime" name="savetime" class="inputandsubmitbtn btn">Save</button></td>
		</form>
		</tr>
		</table>
	</div>
	
	<script src="../js/zeiterfassung.js"></script>
</body>
</html>