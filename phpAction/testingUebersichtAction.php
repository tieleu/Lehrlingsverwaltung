<style>
table {
	width: 80%;
	margin:  0 auto;
}

td, th {
	text-align: center;
}

th {
	
	padding: 4%;
	background-color: #f5f5f5;
	font-size: 1.5em;
}

td {
	padding: 1em;
	font-size: 1.250em;
}

tr {
	border: 0.2em solid black;
}

</style>


<?php 
include("../db/db_connection.php");
$value = $_POST["chooseTest"];
$user = $_GET['user'];
$rowsuser = mysqli_query($db, "SELECT idUser FROM User WHERE username = '$user'");
$idUser = 0;
while($row = mysqli_fetch_object($rowsuser)){
	$idUser = $row -> idUser;
}

if ($value === "auswahl") {
		echo "Bitte etwas auswählen";
		return;
}

if(!empty($value)) {

	
	$select = "SELECT javafile.comment, javafile.path, testresult.testresult, status.status, test.id FROM javafile
	INNER JOIN test on javafile.test_idfs= test.id
	INNER JOIN testresult on testresult.javafile_idfs = javafile.id
	INNER JOIN status on testresult.status_idfs = status.id
	INNER JOIN User on javafile.user_idfs = User.idUser
	WHERE test.id =$value and user_idfs = $idUser";

$executeResults= mysqli_query($db, $select);
	if (mysqli_num_rows($executeResults)> 0) {
echo "<table align=center>
		<tr>
			<th>Status:</th>
			<th>Testergebnis:</th>
			<th>Kommentar:</th>
			<th>Link:</th>
		</tr>";
while ($row = mysqli_fetch_array($executeResults)) {
			if ($row['status'] === "passed") {
				$color = "#81ed53";
			} else {
				$color = "#ff000c";
			}

		echo "<tr  bgcolor =".$color.">";
		echo "<td><b>" . $row['status'] . "</b></td>";
		echo "<td><b>" . $row['testresult'] . "</b></td>";
		echo "<td><b>" . $row['comment'] . "</b></td>";
		echo "<td><a href=<?php $row[path]?>" . "zum File" . "</a></td>";
		echo "</tr>";

}
echo "</table>";
} else {
	echo "Es gibt keine Resultate für diesen Test";
	return;
}
} 
 ?>
