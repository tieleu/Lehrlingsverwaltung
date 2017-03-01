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
			$erreichtTotal = 0;
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

			$idUser;
			$getId = mysql_query("SELECT idUser FROM User WHERE username = '$user'", $conn);
			while($row = mysql_fetch_object($getId)){
				$idUser = $row -> idUser;
			}
			$getContent = mysql_query("SELECT User_has_zeit.User_idUser, zeit.date, zeit.endzeit, zeit.zeit_differenz FROM User_has_zeit JOIN zeit ON User_has_zeit.zeit_id=zeit.id WHERE User_has_zeit.User_idUser=$idUser ORDER BY zeit.date", $conn);
			while($row1 = mysql_fetch_object($getContent)){
				$erreichtTotal += $row1 -> endzeit;
				$date = $row1 -> date;
				$zeittotal = minToTime($row1 -> endzeit);
				$differenz = minToTime($row1 -> zeit_differenz);
				echo "<tr id='zeile'><td><input type='text' class='form-control' placeholder='Datum' value='$date' readonly></td><td><input type='text' class='form-control' placeholder='erreichte Zeit' value='$zeittotal' readonly></td><td><input type='text' class='form-control' placeholder='Sollzeit' value='8:24 h' readonly></td><td><input type='text' class='form-control' placeholder='Differenz Zeit' value='$differenz' readonly></td></tr>";
			}
			$sollTotal = mysql_num_rows($getContent)*504;
			?>
			<tr id='zeile'>
			<td colspan="3"></td>
			<td><label class="form-control"><?php echo "Total: " . minToTime($erreichtTotal-$sollTotal); ?></label></td>
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
		   <td><input type="date" id="date_input" name="date_input" class="inputandsubmitbtn form-control" value="<?php echo date('Y-m-d');?>" readonly></td>
		   <td><input type="time" id="starttime_input" name="starttime_input" class="inputandsubmitbtn form-control"></td>
		    <td><input type="time" id="endtime_input" name="endtime_input" class="inputandsubmitbtn form-control"></td>
		    <td><button id="savetime" name="savetime" class="inputandsubmitbtn btn">Save</button></td>
		</form>
		</tr>
		</table>
	</div>
	<!-- test des timestampts -->
	<div>
		<form action="../phpAction/zeitAction.php?user=<?php echo $user ?>" method="post"><button id="savetimestamp" name="timestamp" class="inputandsubmitbtn btn">TIME</button></form>
	</div>
	
	<script src="../js/zeiterfassung.js"></script>
</body>
</html>