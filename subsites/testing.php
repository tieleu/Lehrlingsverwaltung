<!DOCTYPE html>
<html>
<head>
		<?php
		include("header.php");
		$user = $_GET['user'];
	  ?>

	<title>Lehrverwaltung - Testing</title>
	<script type="text/javascript" src="../js/testing.js"></script>
</head>
<body>

	  <form action="../phpAction/fileUpload.php?user=<?= $user ?>" enctype="multipart/form-data" method="POST">
	  	<br><input type="file" name="file"><br>
	  	<input type="submit" name="submit">
	  </form>

</body>
</html>
