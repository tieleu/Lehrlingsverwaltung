<?php  
$servername = "172.16.44.5";
$username = "lehrling";
$password = "";

$conn =mysql_connect($servername, $username, $password)
or die("Fehler im System");

mysql_select_db("Lehrverwaltung");
mysql_query("SET NAMES 'utf8'",$conn);

?>