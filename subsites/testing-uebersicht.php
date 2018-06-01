<!DOCTYPE html>
<html>
<head>
		<?php
		include("header.php");
		$user = $_GET['user'];
	  ?>
	  <link rel="stylesheet" type="text/css" href="../css/testing-uebersicht.css">
	  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
 	  <script type="text/javascript" src="../js/testing-uebersicht.js"></script>




	<title>Lehrverwaltung - Testing-Übersicht</title>
</head>
<body>
	<main>
		<h1 id="title">Übersicht</h1>
		<hr>
		 <select id="chooseTest" onchange="myFunction(this.value, '<?= $user ?>')">
		 	<option selected="selected" value="auswahl">Auswahl</option>
		<?php 
		$selectTests= "SELECT * from test";
		$loadTests = mysqli_query($db, $selectTests);
		while ($row = mysqli_fetch_object($loadTests)) {
		 ?>
		 <option value=<?php echo $row -> id; ?>><?php echo $row -> testname; ?></option>
		<?php } ?>
		</select>

		<button class="btn btn-default" id="buttonGesamtuebersicht">Gesamtübersicht</button>

		<div id="resultDiv">
			
		</div>
	</main>

</body>
</html>