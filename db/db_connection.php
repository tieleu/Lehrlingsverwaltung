<?php  
/* wert kommt von login.php */
$nameOfUser = $_GET['user']; 	

$servername = "172.16.44.5";
$username = "lehrling";
$password = "sec1.01";

$conn =mysql_connect($servername, $username, $password)
	or die("Fehler im System");
	mysql_select_db("Lehrverwaltung");
mysql_query("SET NAMES 'utf8'",$conn);
?>