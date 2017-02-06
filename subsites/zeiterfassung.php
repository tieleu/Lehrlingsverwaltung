<!DOCTYPE html>
<html>
	<?php 
include("header.php");

 $cookieName = $_SESSION['login_user'];
 $nameOfUser = $_GET['user'];
 
 if($nameOfUser == $cookieName){ 
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
		<form action="../phpAction/zeitAction.php" method="post">
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
<?php  
}else {	
	echo "access denied! Please log in";
	header("Location: ../login.html");
}
?>
</html>