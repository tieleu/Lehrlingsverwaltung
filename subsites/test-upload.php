<!DOCTYPE html>
<html>
<head>
	<?php 
	include("header.php");
	$user = $_GET['user'];
	 ?>
	 <link rel="stylesheet" type="text/css" href="../css/test-upload.css">
	<title>Lehrverwaltung - Test hochladen</title>
</head>
<body>
	<main>
		<h1 id="title">Test hochladen</h1>
		<hr>

		<div class="form-group"> 
		<label>Test auswählen:</label>
		<select required="true" place class="form-control" name="test-auswaehlen">
			<option value="-" disabled selected hidden>-</option>
			<option value="SingleElementFinderTest">SingleElementFinderTest</option>
			<option value="ArraySorterTest">ArraySorterTest</option>
		</select>
		</div>

		<div class="form-group">
			<label>Name:</label>
			<input type="text" required="true" name="testname" class="form-control" placeholder="Name für den Test eingeben" >
		</div>

		<div class="form-group">
			<label>Kommentar:</label>
			<input type="text" name="comment" class="form-control" placeholder="Kommentar eingeben">
		</div>
		<input type="file" name="file-choose" id="upload-file">
		<div id="save-button">
		<button type="submit" name="erteilen" class="btn btn-default">Upload</button>
		</div>
	</main>

</body>
</html>