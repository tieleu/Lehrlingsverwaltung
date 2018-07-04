<?php 
include("../db/db_connection.php");
$value = $_POST["chooseTest"];
$user = $_GET['user'];
$rowsuser = mysqli_query($db, "SELECT idUser FROM User WHERE username = '$user'");
$idUser = 0;
while($row = mysqli_fetch_object($rowsuser)){
	$idUser = $row -> idUser;
}

function getSpecificTest($value, $idUser, $db) {
	$select = "SELECT javafile.comment, javafile.path, testresult.testresult, status.status, test.id FROM javafile
	INNER JOIN test on javafile.test_idfs= test.id
	INNER JOIN testresult on testresult.javafile_idfs = javafile.id
	INNER JOIN status on testresult.status_idfs = status.id
	WHERE test.id =$value and user_idfs = $idUser";

$executeResults= mysqli_query($db, $select);
	if (mysqli_num_rows($executeResults)> 0) {
		echo"<table class='table'>
		<tr>
			<th>Status:</th>
			<th>Testergebnis:</th>
			<th>Kommentar:</th>
			<th>Link:</th>
		</div></tr>";
while ($row = mysqli_fetch_array($executeResults)) {
	switch ($row['status']) {
		case 'passed':
			$color = "#dff0d8";
			break;
		case 'failed':
			$color = "#f2dede";
			break;
		default:
			$color = "#fcf8e3";
			break;
		}
		echo "<tr  bgcolor =".$color.">";
		echo "<td><input type='label' class='form-control' placeholder='$row[status]' readonly></td>";
		echo "<td><input type='label' class='form-control' placeholder='$row[testresult]' readonly></td>";
		echo "<td><input type='label' class='form-control' placeholder='$row[comment]' readonly></td>";
		echo "<td><a href='$row[path]'>" . "zum File" . "</a></td>";
		echo "</tr>";
	}
echo "</table>";
	} else {
		echo "Es gibt keine Resultate für diesen Test";
		return;
	}
}


function getGesamtuebersicht($idUser, $db) {
	$idOfTest = 0;
	$selectRowOfTests= mysqli_query($db, "SELECT id FROM test");
	$rowsOfTests= mysqli_num_rows($selectRowOfTests);
		echo "<table class='table'>
				<tr>
					<th>Testname:</th>
					<th>Kommentar:</th>
					<th>Testergebnis:</th>
					<th>Link:</th>
				</tr>";


	for ($i=0; $i < $rowsOfTests ; $i++) { 
	$selectTest = "SELECT id FROM test limit " . $i . ",1";
	$findId = mysqli_query($db, $selectTest);

		while ($row = mysqli_fetch_object($findId)) {
			$idOfTest = $row -> id;
		}
	$selectResults= "SELECT javafile.comment, javafile.path, testresult.testresult, test.testname, status.status FROM javafile
	INNER JOIN test on test.id = javafile.test_idfs
	INNER JOIN testresult on testresult.javafile_idfs = javafile.id
	INNER JOIN status on status.id = testresult.status_idfs
	WHERE test_idfs = $idOfTest and user_idfs = $idUser and status= 'passed' 
	ORDER BY testresult DESC
	LIMIT 1";

	$executeResults = mysqli_query($db, $selectResults);
	if (mysqli_num_rows($executeResults)>0) {
		while ($row = mysqli_fetch_array($executeResults)) {
			echo "<tr>";
			echo "<td><input type='label' class='form-control' placeholder='$row[testname]' readonly></td>";
			echo "<td><input type='label' class='form-control' placeholder='$row[comment]' readonly></td>";
			echo "<td><input type='label' class='form-control' placeholder='$row[testresult]' readonly></td>";
			echo "<td><a href='$row[path]'>" . "zum File" . "</a></td>";
			echo "</tr>";
		} 
	}
	}
		echo "</table";


}

if(!empty($value)) {
switch ($value) {
		case "auswahl":
		echo "Bitte etwas auswählen";
			break;
		case "gesamtuebersicht":
			getGesamtuebersicht($idUser, $db);
			break;
		default:
		getSpecificTest($value, $idUser, $db);
			break;
	}	
} 
 ?>