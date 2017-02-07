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
		
						
	</table>
</div>
				

	
	<script src="../js/zeiterfassung.js"></script>
</body>
</html>