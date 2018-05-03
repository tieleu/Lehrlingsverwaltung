<!DOCTYPE html>
<html>
<head>
		<?php
		include("header.php");
		$user = $_GET['user'];
	  ?>

	<title>Lehrverwaltung - Testing</title>
	<script type="text/javascript" src="../js/testing.js"></script>
	<link rel="stylesheet" type="text/css" href="../css/testing.css ">
</head>
<body>

	<main>
		<h1 id="title">Wähle einen Test aus</h1>
		<table>
			<th>
				<tr>
					<td colspan="3"><b>Name des Tests:</b></td>
				</tr>
			</th>
		<tbody>	
			<?php
				$ausgabe = "SELECT * FROM test";
				$ergebnis = mysqli_query($db, $ausgabe);
				while ($row = mysqli_fetch_object($ergebnis)) {	
		 	?>
				<tr>
					<td><input type="text" class="field" placeholder="<?php echo $row-> name ?>" readonly></td>
					<td><input type="file" class="fileUpload"></td>
					<td><button>Testen</button></td>
				</tr>

			<?php } ?>
		</tbody>
		</table>
	</main>
		<!--	
	  <form action="../phpAction/fileUpload.php?user=<?= $user ?>" enctype="multipart/form-data" method="POST">
	  	<br><input type="file" name="file"><br>
	  	<input type="submit" name="submit">
	  </form>
	-->
</body>
</html>