<?php  
$servername = "172.16.44.5";
$username = "lehrling";
$password = "sec1.01";

$db =mysqli_connect($servername, $username, $password);
if(!$db)
{
  exit("Verbindungsfehler: ".mysqli_connect_error());
}else{

mysqli_select_db($db,"lehrverwaltung");
}

?>
