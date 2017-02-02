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
	<div id="input_container">
		Datum
		<input type="date" id="date_input" class="inputandsubmitbtn">
		von:
		<input type="time" id="starttime_input" class="inputandsubmitbtn">
		bis:
		<input type="time" id="endtime_input" class="inputandsubmitbtn">
		<button id="savetime" class="inputandsubmitbtn">Save</button>
	</div>
	<div id="uebersicht">
   <table class="table table-hover">
<div id="zeile">
<tr id="zeile">
    <td><input type="text" class="form-control" placeholder="Datum" readonly></td>
    <td><input type="text" class="form-control" placeholder="erreichte Zeit" readonly></td>
    <td><input type="text" class="form-control" placeholder="Sollzeit" readonly></td>
    <td><input type="text" class="form-control" placeholder="Differenz Zeit" readonly></td>
</tr>
    <td><input type="text" class="form-control" placeholder="Gesamtdifferenz" readonly></td>
</div>
</table>
</div>

</body>
<?php  

}else {	
	echo "access denied! Please log in";
}
?>
</html>