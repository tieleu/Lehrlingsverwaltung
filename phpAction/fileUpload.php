<?php 
	if (isset($_POST['submit'])) {
		$name= @$_FILES['file']['name'];
		$tmp_name= @$_FILES['file']['tmp_name'];

		if (!empty($name)) {
		$location ='../java-tests/';
		 if(move_uploaded_file($tmp_name, $location.$name)) {
		 	echo "Erfolgreich hochgeladen";
		 } else { 
		 echo "Etwas ist schief gelaufen";
		}
	}
}
 ?>