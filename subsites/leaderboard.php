<!DOCTYPE html>
<html>
<head>
		<?php
		include("header.php");
		$user = $_GET['user'];
	  ?>
	  <link rel="stylesheet" type="text/css" href="../css/leaderboard.css">
	  <script type="text/javascript" src="../js/leaderboard.js"></script>
	<title>Lehrverwaltung - Leaderboard</title>
</head>
<body>
<main>
	<select  id="chooseTest" onchange="myFunction(this.value, '<?= $user ?>')">
		<option value="auswahl">Auswahl</option>
        <option value="gesamtuebersicht">Gesamtübersicht</option>
		<optgroup></optgroup>
		<?php 
		$selectTests= "SELECT * FROM test";
		$executeResults= mysqli_query($db, $selectTests);

		while ($row= mysqli_fetch_object($executeResults)) {
		 ?>
		 <option value=<?php echo $row -> id; ?>><?php echo $row -> testname; ?></option>
		 <?php } ?>
	</select>
	<h1 id="title"></h1>


	<div id="resultDiv"></div>


</main>

</body>
</html>