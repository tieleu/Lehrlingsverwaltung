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
<input type="date" id="date_input">
<input type="time" id="starttime_input">
<input type="time" id="endtime_input">
<button id="savetime">Save</button>
<div id="uebersicht"></div>


</body>
<?php  

}else {	
	echo "access denied! Please log in";
}
?>
</html>