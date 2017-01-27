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
		<input type="date" id="date_input" class="inputandsubmitbtn">
		<input type="radio" name="morning" value="morning"> Morgen <br/>
  		<input type="radio" name="afternoon" value="afternoon">Nachmittag
		<input type="time" id="starttime_input" class="inputandsubmitbtn">
		<input type="time" id="endtime_input" class="inputandsubmitbtn">
		<button id="savetime" class="inputandsubmitbtn">Save</button>
	</div>
	<div id="uebersicht"></div>


</body>
<?php  

}else {	
	echo "access denied! Please log in";
}
?>
</html>