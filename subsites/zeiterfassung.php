<!DOCTYPE html>
<html>
<?php  
session_start();
$cookieName = $_SESSION['login_user'];
$nameOfUser = $_GET['user'];
 if($nameOfUser == $cookieName){ 

 ?>
<head>
	<link rel="stylesheet" type="text/css" href="../css/zeiterfassung.css">
	<?php 
		include("header.php");
	 ?>
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
			<tr id="zeile">
			    <td><input type="text" class="form-control" placeholder="Datum" readonly></td>
			    <td><input type="text" class="form-control" placeholder="erreichte Zeit" readonly></td>
			    <td><input type="text" class="form-control" placeholder="Sollzeit" readonly></td>
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
		   <td><input type="date" id="date_input" class="inputandsubmitbtn"></td>
		   <td><input type="time" id="starttime_input" class="inputandsubmitbtn"></td>
		    <td><input type="time" id="endtime_input" class="inputandsubmitbtn form-control"></td>
		    <td><button id="savetime" class="inputandsubmitbtn btn">Save</button></td>
		</tr>
		</table>
	</div>
</body>
<?php  
}else {	
	echo "access denied! Please log in";
}
?>
</html>