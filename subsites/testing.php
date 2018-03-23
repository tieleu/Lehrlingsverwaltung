
		<?php
		include("header.php");
		$user = $_GET['user'];
	  ?>

	  <form action="../phpAction/fileUpload.php" enctype="multipart/form-data" method="POST">
	  	<br><input type="file" name="file"><br>
	  	<input type="submit" name="submit">
	  </form>